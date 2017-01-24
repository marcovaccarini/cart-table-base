<div class="popup-container">
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
                            <div class="current">${{ number_format(($cart_item->product->price - $cart_item->product->price/100 * $cart_item->product->custom_discount)*$cart_item->qty, 2) }}</div>
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
    <div class="summary" id="cart_total">
        {{--<div class="subtotal">Subtotal: $990,00</div>--}}
        @inject('total', 'App\Services\CartService')
        <div class="grandtotal">Total <span>${{ $total->get_total_cart() }}</span></div>
    </div>
    <div class="cart-buttons">
        <div class="column">
            <a href="/cart" class="button style-3">view cart</a>
            <div class="clear"></div>
        </div>
        <div class="column">
            <a class="button style-4">checkout</a>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>