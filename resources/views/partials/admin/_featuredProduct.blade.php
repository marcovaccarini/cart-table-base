<div class="form-group{{ $errors->has('featured') ? ' has-error' : '' }}">
    <label>
        <input type="checkbox" name="featured" id="{{$product->id}}" class="{{$section}}"
            @if(isset($product->featured) && $product->featured == 1)
                checked
            @endif>
    </label>
    @if ($errors->has('featured'))
        <span class="help-block">
            <strong>{{ $errors->first('featured') }}</strong>
        </span>
    @endif
</div>