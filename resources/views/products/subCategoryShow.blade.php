@extends('layouts.app')

@section('title', $subCategory->title)

@section('metadescription', $subCategory->title)

@section('og_title', $subCategory->title)

@section('og_description', $subCategory->title)

@section('og_url', $url)

@section('content')
    <div class="parallax-slide-subcategory">
        <div class="parallax-clip">
            <div class="fixed-parallax" style="background-image: url(/img/header_subcategory/{{$subCategory->header_image}});">

            </div>
            <div class="position-center">
                <div class="parallax-vertical-align">
                    <div class="parallax-article">
                        {{--<h2 class="subtitle">Check out this weekend</h2>--}}
                        <h1 class="title">{{$subCategory->title}}</h1>
                        {{--<div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</div>
                        <div class="info">
                            <a class="button style-6" href="#">shop now</a>
                            <a class="button style-7" href="#">features</a>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row nopadding" style="height: 30px">

</div>
<div class="wide-center">
        <div class="content-push">

            <div class="breadcrumb-box">
                <a href="/">Home</a>
                <a href="/{{ $mainCategory->slug }}/" class="text-uppercase">{{ $mainCategory->title }}</a>
                <a href="/{{ $mainCategory->slug }}/{{ $category->slug }}/">{{ $category->title }}</a>
                <a href="/{{ $mainCategory->slug }}/{{ $category->slug }}/{{ $subCategory->slug }}/">{{ $subCategory->title }}</a>
            </div>

            <div class="information-blocks">
                <div class="row">
                    <div class="col-md-9 col-md-push-3 col-sm-8 col-sm-push-4">

                        <div class="row shop-grid grid-view">
                            @foreach($products as $product)
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
                                            {{--<a class="tag" href="#">{{$product->category->title}}</a>--}}

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
                        <div class="page-selector">
                            <div class="description">Showing: 1-3 of 16</div>
                            <div class="pages-box">
                                <a href="#" class="square-button active">1</a>
                                <a href="#" class="square-button">2</a>
                                <a href="#" class="square-button">3</a>
                                <div class="divider">...</div>
                                <a href="#" class="square-button"><i class="fa fa-angle-right"></i></a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-pull-9 col-sm-4 col-sm-pull-8 blog-sidebar">
                        <div class="information-blocks categories-border-wrapper">
                            @include('partials._categories')
                    </div>{{--end accordeon categories--}}


                </div>
            </div>

        </div>
    <div class="clear"></div>
</div>
@stop