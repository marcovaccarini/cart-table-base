@extends('layouts.app')

@section('title', 'Yours orders')

@section('metadescription', 'Yours orders')

@section('og_title', 'Yours orders')

@section('og_description', 'Yours orders')



@section('content')

    <div class="row nopadding" style="background: #262626; height: 115px">

    </div>
    <div class="wide-center">
        <div class="content-push">
            <div class="breadcrumb-box" style="margin: 36px 0;">
                <a href="/">Home</a>
                <a href="#">Account</a>
                <a href="/orders">Order history</a>
                <a href="#">Order no. {{ $order->id }} on {{ $order->created_at->toFormattedDateString() }}</a>
            </div>
        </div>
    </div>



    <div class="wide-center">
        <div class="content-push">
            <div class="information-blocks">
                <div class="row">
                    <div class="col-sm-9 col-sm-push-3">


                        <div class="categories-list">
                            <div class="block-title size-3">Your order no. {{ $order->id }} on {{ $order->created_at->toFormattedDateString() }}</div>
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="cart-table">
                                        <tr>
                                            <th class="column-1">Product Name</th>
                                            <th class="column-2">Unit Price</th>
                                            <th class="column-3">Qty</th>
                                            <th class="column-4">Subtotal</th>
                                        </tr>
                                        @foreach($order->orderItems as $order_item)
                                            <tr>
                                                <td>
                                                    <div class="traditional-cart-entry">

                                                        <a href="{{ $order_item->path }}" class="image"><img src="/img/small/{{ $order_item->featured_image->filename }}" alt=""></a>

                                                        <div class="content">
                                                            <div class="cell-view">
                                                                <?php
                                                                $subcategory_path = dirname($order_item->path);
                                                                ?>
                                                                <a class="tag" href="{{ $subcategory_path }}">{{ $order_item->category_name }}</a>
                                                                {{--<a href="#" class="tag">woman clothing</a>--}}
                                                                <a href="{{ $order_item->path }}" class="title">{{ $order_item->product_name }}</a>
                                                                <div class="inline-description">Size: {{ $order_item->size_name }}</div>
                                                                {{--<div class="inline-description">Zigzag Clothing</div>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="price">
                                                        @if($order_item->custom_discount != null)
                                                            <div class="prev">${{ number_format($order_item->price, 2)}}</div> |
                                                            <div class="current">${{ $order_item->discounted_price }}</div>
                                                        @else
                                                            <div class="current">${{ number_format($order_item->price, 2) }}</div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{ $order_item->pivot->qty }}</td>
                                                <td>
                                                    <div class="subtotal">
                                                        @if($order_item->custom_discount != null)
                                                            ${{ number_format($order_item->discounted_price*$order_item->pivot->qty, 2) }}
                                                        @else
                                                            ${{ number_format($order_item->pivot->price*$order_item->pivot->qty, 2)}}
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                    </table>
                                </div>


                                <div class="col-md-12 information-entry">
                                    <div class="cart-summary-box">

                                        <div class="sub-total">Subtotal: <span class="main">${{ $order->subtotal }}</span></div>
                                        <div class="sub-total">Shipping: $<span id="tot_shipping">{{ $order->shipping_cost }}</span></div>
                                        <div class="grand-total">Grand Total $<span id="total_confirm">{{ $order->total }}</span></div>
                                    </div>
                                </div>
                                <div class="clear" style="margin-bottom: 20px"></div>
                                @foreach($order->addresses as $address)
                                <div class="col-md-6 information-entry">
                                    <div class="information-blocks">
                                        <h3 class="block-title inline-product-column-title">
                                            @if($address->id_type_address == 1)
                                                Shipping
                                            @else
                                                Billing
                                            @endif
                                            address</h3>
                                        <div class="text-widget">
                                            <div class="article-container">
                                                First Name: <b>{{ $address->first_name }}</b> <br>
                                                Last Name: <b>{{ $address->last_name }}</b> <br>
                                                Street: <b>{{ $address->street }}</b> <br>
                                                Apartment: <b>{{ $address->apartment }}</b> <br>
                                                City: <b>{{ $address->city }}</b> <br>
                                                State: <b>{{ $address->state }}</b> <br>
                                                Zip code: <b>{{ $address->zip_code }}</b> <br>
                                                Phone: <b>{{ $address->phone }}</b> <br>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach

                                <div class="clear" style="margin-bottom: 20px"></div>

                            </div>
                        </div>

                    </div>
                    <div class="col-sm-3 col-sm-pull-9 blog-sidebar">
                        <div class="information-blocks">
                            <div class="categories-list account-links">
                                <div class="block-title size-3">Client account</div>
                                @include ('partials._accountMenu')
                            </div>
                            <div class="article-container">
                                <br/>Custom CMS block displayed below the one page account panel block. Put your own content here.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('partials._beforeFooter')
        </div>
        <div class="clear"></div>
    </div>
@stop