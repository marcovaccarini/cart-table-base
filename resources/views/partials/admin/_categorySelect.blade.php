<!-- Left col -->
<div class="col-md-4">
    <div class="form-group{{ $errors->has('main_category') ? ' has-error' : '' }}">
        <label for="title">Select main category:</label>
        <select name="main_category" class="form-control" required>
            <option>Select main category</option>
            @if (isset($product->id))
                @inject('mainCategories', 'App\Services\CategoriesService')
                @inject('mainCategoryId', 'App\Services\CategoriesService')
                @foreach ($mainCategories->main_categories() as $mainCategory)
                    <option value="{{ $mainCategory->id }}"{{ $mainCategoryId->main_category_id($product->id) == old('main_category', $mainCategory->id) ? ' selected' : '' }}>{{ $mainCategory->title }}</option>
                @endforeach
            @else
                @inject('categoriesMenu', 'App\Services\CategoriesMenuService')
                @foreach($categoriesMenu->get_categories_menu() as $categoryMenu)
                    <option value="{{ $categoryMenu->id }}">{{ $categoryMenu->title }}</option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('main_category'))
            <span class="help-block">
                <strong>{{ $errors->first('main_category') }}</strong>
            </span>
        @endif
    </div>
</div>
<!-- /.col -->

<!-- Center col -->
<div class="col-md-4">
    <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
        <label for="category">Select Category:</label>

        <select name="category" class="form-control" required>
            @if (isset($product->id))
                @inject('categories', 'App\Services\CategoriesService')
                @inject('categoryId', 'App\Services\CategoriesService')
                @foreach ($categories->categories($product->id) as $category)

                    <option value="{{ $category->id }}"{{ $categoryId->category_id($product->id) == old('category', $category->id) ? ' selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('category'))
            <span class="help-block">
                <strong>{{ $errors->first('category') }}</strong>
            </span>
        @endif
    </div>
</div>
<!-- /.col -->


<!-- Right col -->
<div class="col-md-4">
    <div class="form-group{{ $errors->has('sub_category') ? ' has-error' : '' }}">
        <label for="sub_category">Select Sub Category:</label>
        <select name="sub_category" class="form-control" required>
            @if (isset($product->id))
                @inject('allSubCategories', 'App\Services\CategoriesService')
                @inject('subCategoryId', 'App\Services\CategoriesService')
                @foreach ($allSubCategories->all_sub_categories($product->id) as $category)
                    <option value="{{ $category->id }}"{{ $subCategoryId->sub_category_id($product->id) == old('sub_category', $category->id) ? ' selected' : '' }}>{{ $category->title }}</option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('sub_category'))
            <span class="help-block">
                            <strong>{{ $errors->first('sub_category') }}</strong>
                        </span>
        @endif
    </div>
</div>
<!-- /.col -->