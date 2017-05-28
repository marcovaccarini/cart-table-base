<div class="form-group{{ $errors->has('new') ? ' has-error' : '' }}">
    <label>
        <input type="checkbox" name="new" id="{{$product->id}}" class="{{$section}}"
            @if(isset($product->new) && $product->new == 1)
                checked
            @endif>
    </label>
    @if ($errors->has('new'))
        <span class="help-block">
            <strong>{{ $errors->first('new') }}</strong>
        </span>
    @endif
</div>