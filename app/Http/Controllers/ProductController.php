<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Size;
use App\Tag;
use App\ProductImage;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;



class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        return view('products.product_list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allSizes = Size::pluck('name');
        $allTags = Tag::pluck('title');
        return view('admin.products.createProduct', compact('allSizes', 'allTags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'sub_category' => 'required',
            'product_name' => 'required|min:2',
            'specification' => 'required|min:2',
            'inputKE1' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|min:2',
            'sizes' => 'required',
        ]);

        $slugLibrary = new \App\Services\Slug();
        $slug = $slugLibrary->createSlug(request('product_name'));

        $new = (request('new')) ? true : false;
        $featured = (request('featured')) ? true : false;
        $promotion = (request('promotion')) ? true : false;

        $product = Product::create([
            'category_id' => request('sub_category'),
            'product_name' => request('product_name'),
            'slug' => $slug,
            'price' => request('price'),
            'custom_discount' => request('custom_discount'),
            'description' => request('description'),
            'specification' => request('specification'),
            'new' => $new,
            'featured' => $featured,
            'promotion' => $promotion,
        ]);

        $product->sizes()->attach(request('sizes'));
        $product->tags()->attach(request('tags'));



        //  TODO: add icon images
        //  TODO: the first image should be the featured image




        foreach (request('inputKE1') as $key => $file) {

            $extension = $file->getClientOriginalExtension();
            $filename = $this->setSlugAttribute($slug, $extension);
            $file->storeAs('img/zoom', $filename, 'local_public');

            // TODO: save as jpg if it's not?

            $resizedImageXs	= $this->resize($filename, 55, 'xs/', 60);
            $resizedImageSmall = $this->resize($filename, 70, 'small/', 60);
            $resizedImageMedium = $this->resize($filename, 210, 'medium/', 60);
            $resizedImageMain = $this->resize($filename, 570, 'main/', 60);

            if(!$resizedImageMain || !$resizedImageMedium || !$resizedImageSmall || !$resizedImageXs)
            {
                return redirect()->back()->withError('Could not resize Image');
            }

            $featured = ($key == 0 ? 1 : 0);

            ProductImage::create([
                'product_id' => $product->id,
                'filename' => $filename,
                'featured' => $featured,
            ]);


        }
        return 'OK!';
    }
    private function resize($filename, $width, $dest, $quality)
    {
        try
        {
            // resize the image to a height of $height and constrain aspect ratio (auto width)
            $img = Image::make('img/zoom/'.$filename)->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            return $img->save('img/' . $dest . $filename, $quality);
        }
        catch(Exception $e)
        {
            return false;
        }

    }

    public function setSlugAttribute($value, $extension)
    {
        $slug = str_slug($value).'.'.$extension;
        // Look for exisiting slugs
        $existingSlugs =  ProductImage::whereRaw("filename REGEXP '^{$slug}(-[0-9]*)?$'");

        // If no matching slugs were found, return early
        if ($existingSlugs->count() === 0)
            return $slug;

        $slug = str_replace('.'.$extension, '', $slug);
        // Get slugs in reversed order, and pick the first
        $lastSlugNumber = intval(str_replace($slug . '-', '', $existingSlugs->orderBy('filename', 'desc')->first()->slug));

        return $slug . '_' . ($lastSlugNumber + 1) . '.' . $extension;
    }
    /**
     * Display the product in the madal
     *
     * @param int $id
     *
     */
    public function json_show($id)
    {
        $product = Product::where('id', '=', $id)
            ->with('images')->orderBy('featured', 'desc')
            ->with('sizes')
            ->with('tags')
            ->get();

        return $product->toJson();

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($mainCategorySlug,$categorySlug,$subCategorySlug,$productSlug, Request $request)
    {

        //  man
        $mainCategory = Category::where(function($q) use ($mainCategorySlug) {
            $q->whereSlug($mainCategorySlug);
            $q->where('parent_id', '=', 0);
        })->firstOrFail();

        $mainCategoryId = $mainCategory->id;


        //  tops
        $category = Category::where(function($q) use ($categorySlug, $mainCategoryId) {
            $q->whereSlug($categorySlug);
            $q->where('parent_id', '=', $mainCategoryId);
        })->firstOrFail();

        $categoryId = $category->id;


        //  polos
        $subCategory = Category::where(function($q) use ($subCategorySlug, $categoryId) {
            $q->whereSlug($subCategorySlug);
            $q->where('parent_id', '=', $categoryId);
        })->firstOrFail();

        $subCategoryId = $subCategory->id;


        //  AND FINALLY THE PRODUCT
        $product = Product::where(function($q) use ($productSlug, $subCategoryId) {
            $q->whereSlug($productSlug);
            $q->where('category_id', '=', $subCategoryId);
        })->firstOrFail();

        $url = $request->url();

        return view('products.show',compact('mainCategory', 'category', 'subCategory', 'product', 'url'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //$product = Product::find($id);
        $product = Product::where('id', '=', $id)
            ->with('images')->orderBy('featured', 'desc')
            ->with('sizes')
            ->with('tags')
            ->first();
       // dd($product);

        $allSizes = Size::pluck('name', 'id');

        $allTags = Tag::pluck('title', 'id');

        return view('admin.products.edit', compact('product', 'allSizes', 'allTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate(request(), [
            'sub_category' => 'required',
            'product_name' => 'required|min:2',
            'specification' => 'required|min:2',
            'inputKE1' => 'required',
            'price' => 'required|numeric',
            'description' => 'required|min:2',
            'sizes' => 'required',
        ]);

        $request['new'] = isset($request['new']) ? 1 : 0;
        $request['featured'] = isset($request['featured']) ? 1 : 0;
        $request['promotion'] = isset($request['promotion']) ? 1 : 0;
        $postData = $request->all();


        Product::find($id)->update($postData);

        $product = Product::find($id);

        $product->sizes()->sync($request->input('sizes'));
        $product->tags()->sync($request->input('tags'));

        //TODO: add images


        dd($postData);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Show the list of favorite product.
     *
     *
     */
    public function featured()
    {
        $products_list = Product::where('featured', '=', 1)
            ->orderBy('product_name', 'desc')
            ->get();
        $section = 'featured';
        return view('admin.products.homePageProducts', compact('products_list', 'section'));
    }

    public function new()
    {
        $products_list = Product::where('new', '=', 1)
            ->orderBy('product_name', 'desc')
            ->get();
        $section = 'new';
        return view('admin.products.homePageProducts', compact('products_list', 'section'));
    }

    public function promotion()
    {
        $products_list = Product::where('promotion', '=', 1)
            ->orderBy('product_name', 'desc')
            ->get();
        $section = 'promotion';
        return view('admin.products.homePageProducts', compact('products_list', 'section'));
    }

    public function editFeatured(Request $request, $id)
    {
        $item = Product::where('id', '=', $id)->firstOrFail();
        $featured = (request('featured') == 'on') ? 1 : 0;
        $item->featured = $featured;
        $item->save();

    }

    public function editNew(Request $request, $id)
    {
        $item = Product::where('id', '=', $id)->firstOrFail();
        $new = (request('new') == 'on') ? 1 : 0;
        $item->new = $new;
        $item->save();
    }

    public function editPromotion(Request $request, $id)
    {
        $item = Product::where('id', '=', $id)->firstOrFail();

        $promotion = (request('promotion') == 'on') ? 1 : 0;

        $item->promotion = $promotion;

        $item->save();

    }




}
