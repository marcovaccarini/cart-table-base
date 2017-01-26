<div id="cart-item-container">
@forelse($latest as $cart_item)
    <div class="cart-entry" data-id="{{$cart_item->id}}-item"
         data-qty="{{$cart_item->qty}}"
         data-sizeid="{{$cart_item->sizenames->id}}"
         data-custom_discount="{{$cart_item->product->custom_discount}}"
         data-price="{{$cart_item->product->price}}">
        <a href="{{$cart_item->product->path}}" class="image"><img src="/img/small/{{$cart_item->ProductImages->filename}}" alt="" /></a>
        <div class="content">
            <a class="title" href="{{$cart_item->product->path}}">{{$cart_item->product->product_name}}</a>
            <div class="quantity">Quantity: <span>{{$cart_item->qty}}</span> | Size: {{$cart_item->sizenames->name}} </div>
            <div class="price">
                @if($cart_item->product->custom_discount != null)
                    <div class="prev">${{ number_format($cart_item->product->price*$cart_item->qty, 2)}}</div> |
                    <div class="current">${{ $cart_item->product->discounted_price }}</div>
                @else
                    <div class="current">${{ number_format($cart_item->product->price*$cart_item->qty, 2)}}</div>
                @endif
            </div>
        </div>
        <div class="button-x btn-delete-cart-item"><i class="fa fa-trash"></i></div>
    </div>
@empty
    <div class="summary"><div class="grandtotal text-left"><h3 class="no-item">You have no items in your shopping cart.</h3></div></div>
@endforelse
</div>