@extends('layouts.app')

@section('title', 'Shopping cart')

@section('metadescription', '')

@section('og_title', 'Shopping cart')

@section('og_description', '')

@section('og_url', '/cart')

@section('content')


    <div class="row nopadding" style="background: #262626; height: 115px">

    </div>

    <div class="wide-center">
        <div class="content-push">
            <div class="breadcrumb-box" style="margin: 36px 0;">
                <a href="/">Home</a>
                <a href="/cart">Shopping Bag</a>
            </div>
        </div>
    </div>
    
    <div class="wide-center">
        <div class="content-push">
            <div class="information-blocks">
                <div class="row">
                <div class="col-sm-9 information-entry">
                    <h3 class="cart-column-title size-1" id="shopping-bag">Shopping Bag</h3>
                    @forelse($cart_items as $cart_item)
                        <div class="traditional-cart-entry style-1">
                            <div class="product-detail-box cart-entry"
                                 data-id="{{ $cart_item->id }}-item"
                                 data-price="{{ $cart_item->product->price }}"
                                 data-custom_discount="{{ $cart_item->product->custom_discount }}"
                                 data-qty="{{ $cart_item->qty }}"
                                 data-sizeid="{{ $cart_item->sizenames->id }}">
                                <a class="image" href="{{$cart_item->product->path}}"><img alt="" src="/img/{{$cart_item->ProductImages->filename}}"></a>
                                <div class="content">
                                    <div class="cell-view">
                                        <?php
                                        $subcategory_path = dirname($cart_item->product->path);
                                        ?>
                                        <a class="tag" href="{{ $subcategory_path }}">{{$cart_item->product->category_name}}</a>
                                        <a class="title" href="{{$cart_item->product->path}}">{{$cart_item->product->product_name}}</a>
                                        <div class="inline-description">Product code: {{ $cart_item->product->specification }} </div>
                                        <div class="inline-description">Size {{$cart_item->sizenames->name}} </div>
                                        <div class="price">
                                            @if($cart_item->product->custom_discount != null)
                                                <div class="prev">${{$cart_item->product->price*$cart_item->qty}}</div> |
                                                <span class="sale-price" style="color: #d50f02;margin:0 10px;"> -{{number_format($cart_item->product->custom_discount, 0)}}%</span>
                                                <div class="current">${{ number_format($cart_item->product->discounted_price*$cart_item->qty, 2) }}</div>
                                            @else
                                                <div class="current">${{ number_format($cart_item->product->price*$cart_item->qty, 2)}}</div>
                                            @endif
                                        </div>
                                        <div id="{{$cart_item->id}}" class="quantity-selector detail-info-entry">
                                            <div class="detail-info-entry-title">Quantity</div>
                                            <div class="entry number-minus cart-minus">&nbsp;</div>
                                            <div class="entry number">{{$cart_item->qty}}</div>
                                            <div class="entry number-add cart-add">&nbsp;</div>
                                            <a class="button style-15">Edit size</a>
                                            {{--<a class="button style-17">remove</a> --}}
                                            <form class="cart-form" method="POST" action="/cart/{{$cart_item->id}}" accept-charset="UTF-8">
                                                <input name="_method" type="hidden" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button class="button style-20 delete-page-cart-item"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="cart-column-title size-1 no-item">You have no items in your shopping cart.</h3>
                        <a class="button style-10">Continue shopping</a>
                    @endforelse




{{--TODO: what about this?--}}
                    <div class="row">
                        <div class="information-entry col-md-6">
                            <div class="sale-entry">
                                <div class="hot-mark red">hot</div>
                                <div class="sale-price"><span>-40%</span> winter Sale</div>
                                <div class="sale-description">Lorem ipsum dolor sit amet, consectetur adipisc elit, sed do</div>
                            </div>
                        </div>
                        <div class="information-entry col-md-6">
                            <div class="sale-entry">
                                <div class="hot-mark red">hot</div>
                                <div class="sale-price"><span>FREE</span> UK delivery</div>
                                <div class="sale-description">Lorem ipsum dolor sit amet, consectetur adipisc elit, sed do</div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-sm-3 information-entry">
                    <h3 class="cart-column-title size-1" style="text-align: center;">Subtotal</h3>
                    <div class="sidebar-subtotal">
                        <div class="price-data">
                            @inject('total', 'App\Services\CartService')

                            <div class="main">${{ $total->get_total_cart() }}</div>
                            <div class="title">Excluding tax &amp; shipping</div>
                            <div class="subtitle">ORDERS WILL BE PROCESSED IN USD</div>
                        </div>
                        <div class="additional-data">
                            <div class="title"><span class="inline-label red">Promotion</span> Additional Notes</div>
                            <textarea class="simple-field size-1"></textarea>
                            <a class="button style-10">Checkout</a>
                        </div>
                    </div>
                    <div class="block-title size-1">Get shipping estimates</div>
                    <form>
                        <label>Country</label>
                        <div class="simple-drop-down simple-field size-1">
                            <select>
                                <option>United States</option>
                                <option>Great Britain</option>
                                <option>Canada</option>
                            </select>
                        </div>
                        <label>State</label>
                        <div class="simple-drop-down simple-field size-1">
                            <select>
                                <option>Alabama</option>
                                <option>Alaska</option>
                                <option>Idaho</option>
                            </select>
                        </div>
                        <label>Zip Code</label>
                        <input type="text" value="" placeholder="Zip Code" class="simple-field size-1">
                        <div class="button style-16" style="display: block; margin-top: 10px;">calculate shipping<input type="submit"/></div>
                    </form>
                </div>
            </div>
            </div>

            <div class="information-blocks">
                {{--TODO: add product to this partial--}}
                @include ('partials._base')
            </div>
        </div>
    </div>







@stop