<div class="popup-container">
    @include ('partials._cartItems')
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
            <a class="button style-4 open-subscribe">checkout</a>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>