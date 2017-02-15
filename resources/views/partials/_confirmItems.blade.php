<div class="table-responsive">
    <table class="cart-table">
        <tr>
            <th class="column-1">Product Name</th>
            <th class="column-2">Unit Price</th>
            <th class="column-3">Qty</th>
            <th class="column-4">Subtotal</th>
        </tr>
        @forelse($latest as $cart_item)
        <tr data-id="{{ $cart_item->id }}-item"
            data-price="{{ $cart_item->product->price }}"
            data-custom_discount="{{ $cart_item->product->custom_discount }}"
            data-qty="{{ $cart_item->qty }}"
            data-sizeid="{{ $cart_item->sizenames->id }}">
            <td>
                <div class="traditional-cart-entry">

                    <a href="{{$cart_item->product->path}}" class="image"><img src="/img/small/{{$cart_item->ProductImages->filename}}" alt=""></a>
                    <div class="content">
                        <div class="cell-view">
                            <?php
                            $subcategory_path = dirname($cart_item->product->path);
                            ?>
                            <a class="tag" href="{{ $subcategory_path }}">{{$cart_item->product->category_name}}</a>
                            {{--<a href="#" class="tag">woman clothing</a>--}}
                            <a href="{{$cart_item->product->path}}" class="title">{{$cart_item->product->product_name}}</a>
                            <div class="inline-description">Size: {{$cart_item->sizenames->name}}</div>
                            {{--<div class="inline-description">Zigzag Clothing</div>--}}
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="price">
                    @if($cart_item->product->custom_discount != null)
                        <div class="prev">${{ number_format($cart_item->product->price, 2)}}</div> |
                        <div class="current">${{ $cart_item->product->discounted_price }}</div>
                    @else
                        <div class="current">${{ number_format($cart_item->product->price, 2)}}</div>
                    @endif
                </div>
            </td>
            <td>{{ $cart_item->qty }}</td>
            <td>
                <div class="subtotal">
                    @if($cart_item->product->custom_discount != null)
                        ${{ number_format($cart_item->product->discounted_price*$cart_item->qty, 2) }}
                    @else
                        ${{ number_format($cart_item->product->price*$cart_item->qty, 2)}}
                    @endif
                </div>
            </td>
        </tr>
        @empty
            <div class="summary"><div class="grandtotal text-left"><h3 class="no-item">You have no items in your shopping cart.</h3></div></div>
        @endforelse
    </table>
</div>