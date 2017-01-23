@extends('layouts.app')

@section('title', $products_list->title)

@section('metadescription', $products_list->description)

@section('og_title', $products_list->title)

@section('og_description', $products_list->description)

@section('og_url', $url)

@section('content')





@section('content')
    {{--<div class="parallax-slide-subcategory">
        <div class="parallax-clip">
            <div class="fixed-parallax" style="background-image: url(/img/header_subcategory/{{ $products_list->tag_img }});">

            </div>
            <div class="position-center">

                <div class="parallax-vertical-align">
                    <div class="parallax-article">
                        --}}{{--<h2 class="subtitle">Check out this weekend</h2>--}}{{--

                        --}}{{--<div class="info">
                            <a class="button style-6" href="#">shop now</a>
                            <a class="button style-7" href="#">features</a>
                        </div>--}}{{--
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <div class="row nopadding" style="height: 115px; margin-bottom: 24px; background: #262626">

    </div>
    <div class="wide-center">
        <div class="content-push">
            <div class="information-blocks">
                <div class="row">
                    <div class="information-blocks">
                    <div class="center-block">
                        <img src="/img/{{ $products_list->tag_img }}" alt="" class="responsive">
                        <div class="block-header">
                            <h1 class="title">{{$products_list->title}}</h1>
                            <div class="description">{{$products_list->description}}</div>
                        </div>
                    </div>
                    </div>
                </div>
                    <div class="row shop-grid grid-view">
                    @foreach ($products_list->products as $product)
                        {{--productId: {{ $product->id }} -
                        product Name:   {{ $product->product_name }} <br>
                        featured image:   {{ $product->featured_image->filename }} <br>--}}
                        <div class="col-md-3 col-sm-4 shop-grid-item">
                            <div class="products-slider-banner">
                                <div class="paddings-container">
                                    <div class="product-slide-entry">
                                        <div class="product-image">
                                            <img src="/img/{{$product->featured_image->filename}}" alt="{{$product->product_name}}" />
                                            @if($product->custom_discount != null)
                                                <div class="product-image-label type-2"><span>{{number_format($product->custom_discount), 0}}% OFF</span></div>
                                            @elseif($product->new != null)
                                                <div class="product-image-label type-1"><span>NEW</span></div>
                                            @endif
                                            <form novalidate="" method="post">
                                                <input type="hidden" class="product_id" name="product_id" value="{{$product->id}}" />
                                                <a class="top-line-a right add-to-wishlist" data-product_id="{{$product->id}}"><i class="fa fa-heart"></i> </a>
                                            </form>
                                            <a href="{{$product->path}}" class="top-line-a left quick-view">Details <i class="fa fa-search-plus"></i></a>
                                            <div class="bottom-line">
                                                <a class="bottom-line-a open-product" data-id="{{$product->id}}"><i class="fa fa-shopping-cart"></i> Add to bag</a>
                                            </div>
                                        </div>
                                        <?php
                                        $subcategory_path = dirname($product->path);
                                        ?>
                                        <a class="tag" href="{{$subcategory_path}}">{{$product->category_id}}</a>
                                        <a class="title"  href="{{$product->path}}">{{$product->product_name}}</a>
                                        <div class="price">
                                            @if($product->custom_discount != null)
                                                <div class="prev">${{$product->price}}</div> |
                                                <div class="current">${{ number_format($product->price - (($product->price/100) * $product->custom_discount), 2) }}</div>
                                            @else
                                                <div class="current">${{$product->price}}</div>
                                            @endif
                                        </div>
                                        <div class="information-blocks">
                                            <a class="button style-17 open-product" id="getUser" data-id="{{$product->id}}"><i class="fa fa-shopping-bag"></i>Add to bag</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    @endforeach


                    </div>

            </div>
            @include('partials._beforeFooter')
        </div>
        <div class="clear"></div>
    </div>
@stop