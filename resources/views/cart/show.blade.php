@extends('layouts.app')

@section('title', 'Shopping cart')

@section('metadescription', '')

@section('og_title', 'Shopping cart')

@section('og_description', '')

{{--@section('og_url', $url)--}}

@section('content')


    <div class="row nopadding" style="background: #262626; height: 115px">

    </div>

    <div class="wide-center">
        <div class="content-push">
            <div class="breadcrumb-box" style="margin: 36px 0;">
                <a href="#">Home</a>
                <a href="#">Shop</a>
                <a href="#">Shopping Cart</a>
            </div>
        </div>
    </div>


    <div class="wide-center">
        <div class="content-push">
            <div class="information-blocks">
                <div class="row">
                <div class="col-sm-9 information-entry">
                    <h3 class="cart-column-title size-1">Shopping Cart</h3>
                    @forelse($cart_items as $cart_item)
                        <div class="traditional-cart-entry style-1">
                            <a class="image" href="{{$cart_item->product->path}}"><img alt="" src="/img/{{$cart_item->ProductImages->filename}}"></a>
                            <div class="content">
                                <div class="cell-view">
                                    <a class="tag" href="#">woman clothing</a>
                                    {{--TODO: add link to category--}}
                                    <a class="title" href="{{$cart_item->product->path}}">{{$cart_item->product->product_name}}</a>
                                    <div class="inline-description">Product code: {{ $cart_item->product->specification }} </div>
                                    <div class="inline-description">Size {{$cart_item->sizenames->name}} </div>
                                    <div class="price">
                                        @if($cart_item->product->custom_discount != null)
                                            <div class="prev">${{$cart_item->product->price*$cart_item->qty}}</div> |
                                            <span class="sale-price" style="color: #d50f02;margin:0 10px;"> -{{number_format($cart_item->product->custom_discount, 0)}}%</span>
                                            <div class="current">${{ number_format(($cart_item->product->price - (($cart_item->product->price/100) * $cart_item->product->custom_discount))*$cart_item->qty, 2) }}</div>
                                        @else
                                            <div class="current">${{$cart_item->product->price}}</div>
                                        @endif

                                    </div>
                                    <div id="{{$cart_item->id}}" data-sale_price="{{$cart_item->product->price}}" data-current_price="{{number_format($cart_item->product->price - (($cart_item->product->price/100) * $cart_item->product->custom_discount), 2)}}" class="quantity-selector detail-info-entry">
                                        <div class="detail-info-entry-title">Quantity</div>
                                        <div class="entry number-minus">&nbsp;</div>
                                        <div class="entry number">{{$cart_item->qty}}</div>
                                        <div class="entry number-plus">&nbsp;</div>
                                        <a class="button style-15">Edit size</a>
                                        {{--<a class="button style-17">remove</a> --}}
                                        <div class="button style-20"><i class="fa fa-trash"></i></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="cart-column-title size-1">You have no items in your shopping cart.</h3>
                    @endforelse





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
                <div class="row">
                <div class="col-sm-4 information-entry">
                    <h3 class="block-title inline-product-column-title">Featured products</h3>
                    <div class="inline-product-entry">
                        <a href="#" class="image"><img alt="" src="img/product-image-inline-1.jpg"></a>
                        <div class="content">
                            <div class="cell-view">
                                <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                                <div class="price">
                                    <div class="prev">$199,99</div>
                                    <div class="current">$119,99</div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="inline-product-entry">
                        <a href="#" class="image"><img alt="" src="img/product-image-inline-2.jpg"></a>
                        <div class="content">
                            <div class="cell-view">
                                <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                                <div class="price">
                                    <div class="prev">$199,99</div>
                                    <div class="current">$119,99</div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="inline-product-entry">
                        <a href="#" class="image"><img alt="" src="img/product-image-inline-3.jpg"></a>
                        <div class="content">
                            <div class="cell-view">
                                <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                                <div class="price">
                                    <div class="prev">$199,99</div>
                                    <div class="current">$119,99</div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="col-sm-4 information-entry">
                    <h3 class="block-title inline-product-column-title">Featured products</h3>
                    <div class="inline-product-entry">
                        <a href="#" class="image"><img alt="" src="img/product-image-inline-1.jpg"></a>
                        <div class="content">
                            <div class="cell-view">
                                <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                                <div class="price">
                                    <div class="prev">$199,99</div>
                                    <div class="current">$119,99</div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="inline-product-entry">
                        <a href="#" class="image"><img alt="" src="img/product-image-inline-2.jpg"></a>
                        <div class="content">
                            <div class="cell-view">
                                <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                                <div class="price">
                                    <div class="prev">$199,99</div>
                                    <div class="current">$119,99</div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="inline-product-entry">
                        <a href="#" class="image"><img alt="" src="img/product-image-inline-3.jpg"></a>
                        <div class="content">
                            <div class="cell-view">
                                <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                                <div class="price">
                                    <div class="prev">$199,99</div>
                                    <div class="current">$119,99</div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="col-sm-4 information-entry">
                    <h3 class="block-title inline-product-column-title">Featured products</h3>
                    <div class="inline-product-entry">
                        <a href="#" class="image"><img alt="" src="img/product-image-inline-1.jpg"></a>
                        <div class="content">
                            <div class="cell-view">
                                <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                                <div class="price">
                                    <div class="prev">$199,99</div>
                                    <div class="current">$119,99</div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="inline-product-entry">
                        <a href="#" class="image"><img alt="" src="img/product-image-inline-2.jpg"></a>
                        <div class="content">
                            <div class="cell-view">
                                <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                                <div class="price">
                                    <div class="prev">$199,99</div>
                                    <div class="current">$119,99</div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="inline-product-entry">
                        <a href="#" class="image"><img alt="" src="img/product-image-inline-3.jpg"></a>
                        <div class="content">
                            <div class="cell-view">
                                <a href="#" class="title">Ladies Pullover Batwing Sleeve Zigzag</a>
                                <div class="price">
                                    <div class="prev">$199,99</div>
                                    <div class="current">$119,99</div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>







@stop