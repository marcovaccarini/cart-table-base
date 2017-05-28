@include('partials.admin._categorySelect')
<div class="col-md-4">
    <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
        <label>Product name <span>*</span></label>

        <input class="form-control" type="text" name="product_name" placeholder="Product name (required)" required value="{{ old('product_name', isset($product->product_name) ? $product->product_name : null) }}" />
        @if ($errors->has('product_name'))
            <span class="help-block">
                <strong>{{ $errors->first('product_name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-md-4">
    <div class="form-group{{ $errors->has('specification') ? ' has-error' : '' }}">
        <label>Product specification <span>*</span></label>

        <input class="form-control" type="text" name="specification" placeholder="Product specification (required)" required value="{{ old('specification', isset($product->specification) ? $product->specification : null) }}" />
        @if ($errors->has('specification'))
            <span class="help-block">
                <strong>{{ $errors->first('specification') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="col-md-2" style="margin-top: 33px">
    <div class="form-group{{ $errors->has('new') ? ' has-error' : '' }}">
        <label>
            <input type="checkbox" name="new" class="flat-red"
                @if(isset($product->new) && $product->new == 1)
                    checked
                @endif>
            New product
        </label>
        @if ($errors->has('new'))
            <span class="help-block">
                <strong>{{ $errors->first('new') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="col-md-2" style="margin-top: 33px">
    <div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }}">
        <label>
        <input type="checkbox" name="featured" class="flat-red"
            @if(isset($product->featured) && $product->featured == 1)
                checked
            @endif>
            Featured product
        </label>
        @if ($errors->has('featured'))
            <span class="help-block">
                <strong>{{ $errors->first('featured') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-md-12">
    <h1>Upload product images</h1>

    <div class="form-group">

        {{--<label for="exampleInputFile">File input</label>
        <input type="file" enctype="multipart/form-data" class="dropzone" id="book-image">--}}
        <label class="control-label">Select File</label>
        <input id="input-ke-1" name="inputKE1[]" type="file" multiple class="file-loading" accept="image">

        <p class="help-block">The first image will be setted as featured. You can drag and drop the images to rearrange the order.</p>

    </div>
    {{--<div>
        <h3>Upload Image</h3>
    </div>--}}

</div>
<div class="col-md-6">
    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
        <label>Price <span>*</span></label>
        <input class="form-control" type="text" name="price" placeholder="Price (required)" required value="{{ old('price', isset($product->price) ? $product->price : null) }}" />
        @if ($errors->has('price'))
            <span class="help-block">
                <strong>{{ $errors->first('price') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="col-md-3">
    <div class="form-group{{ $errors->has('custom_discount') ? ' has-error' : '' }}">
        <label>Custom discount </label>
        <input class="form-control" type="text" id="custom_discount" name="custom_discount" placeholder="Custom discount" value="{{ old('custom_discount', isset($product->custom_discount) ? $product->custom_discount : null) }}" />
        @if ($errors->has('custom_discount'))
            <span class="help-block">
                <strong>{{ $errors->first('custom_discount') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="col-md-3" style="margin-top: 33px">
    <div class="form-group{{ $errors->has('promotion') ? ' has-error' : '' }}">
        <label>
            <input type="checkbox" id="promotion" disabled name="promotion"
                   @if(isset($product->promotion) && $product->promotion == 1)
                   checked
                    @endif>
            Promotion in home page
        </label>
        @if ($errors->has('promotion'))
            <span class="help-block">
                <strong>{{ $errors->first('promotion') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="col-md-12">
    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
        <div class="box-body pad">
        <label>Description <span>*</span></label>

        <textarea name="description" class="textarea" placeholder="Place some text here" required style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description', isset($product->description) ? $product->description : null) }}</textarea>

    @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group{{ $errors->has('sizes') ? ' has-error' : '' }}">
        <label>Sizes</label>
        <select class="form-control select2" name="sizes[]" required multiple="multiple" data-placeholder="Select a tag" style="width: 100%;color:#000;">
            @foreach ($allSizes as $key => $value)
                <option value="{{ $key }}"
                @if(isset($product->sizes))
                    @foreach($product->sizes as $size)
                        {{ $key == $size->id ? 'selected="selected"' : '' }}
                    @endforeach
                @endif
                >{{ $value }}</option>
            @endforeach
        </select>
        @if ($errors->has('sizes'))
            <span class="help-block">
                <strong>{{ $errors->first('sizes') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label>Tags</label>
        <select class="form-control select2" name="tags[]" multiple="multiple" data-placeholder="Select a tag" style="width: 100%;color:#000;">
            @foreach ($allTags as $key => $value)
                <option value="{{ $key }}"
                @if(isset($product->tags))
                    @foreach($product->tags as $tag)
                        {{ $key == $tag->id ? 'selected="selected"' : '' }}
                    @endforeach
                @endif
                >{{ $value }}</option>
            @endforeach
        </select>
    </div>
</div>
