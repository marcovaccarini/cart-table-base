<div class="form-group{{ $errors->has('promotion') ? ' has-error' : '' }} ">
    <label>
        <input type="checkbox" name="promotion" id="{{$product->id}}" class="{{$section}}"
            @if(isset($product->promotion) && $product->promotion == 1)
                checked
            @endif>
    </label>
    @if ($errors->has('promotion'))
        <span class="help-block">
            <strong>{{ $errors->first('promotion') }}</strong>
        </span>
    @endif
</div>