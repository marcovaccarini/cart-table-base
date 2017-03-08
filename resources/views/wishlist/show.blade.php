@extends('layouts.app')

@section('title', 'Wishlist')

@section('metadescription', '')

@section('og_title', 'Wishlist')

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
                <a href="#">My Wishlist</a>
            </div>
        </div>
    </div>

    <div class="wide-center">
        <div class="content-push">

            <div class="information-blocks">
                <div class="row">
                    <div class="col-sm-9 col-sm-push-3">
                        <div class="block-title size-3">My Wishlist</div>
                        <div class="wishlist-header hidden-xs">
                            <div class="title-1">Product Name</div>
                            <div class="title-2">Purchase Product</div>
                        </div>
                        <div class="wishlist-box">
                            @forelse($wishes as $wish)
                                <div class="wishlist-entry">
                                    <div class="column-1">
                                        <div class="traditional-cart-entry">
                                            <a class="image" href="{{$wish->product->path}}"><img alt="{{$wish->product->product_name}}" src="/img/small/{{$wish->ProductImages->filename}}" /></a>
                                            <div class="content">
                                                <div class="cell-view">
                                                    <?php
                                                    $subcategory_path = dirname($wish->product->path);
                                                    ?>
                                                    <a class="tag" href="{{ $subcategory_path }}">{{$wish->product->category_name}}</a>
                                                    <a class="title" href="{{$wish->product->path}}">{{$wish->product->product_name}}</a>
                                                    <div class="inline-description">Product code: {{ $wish->product->specification }}</div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="column-2">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <a class="button style-17 open-product" id="getUser" data-id="{{$wish->product->id}}"><i class="fa fa-shopping-bag"></i>Add to bag</a>
                                            </div>
                                            <div class="col-sm-4">
                                                <form class="cart-form" method="POST" action="/wishlist/{{$wish->id}}" accept-charset="UTF-8">
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="button style-20 delete-page-cart-item"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3 class="cart-column-title size-1 no-item">You have no items in your Wishlist.</h3>
                                <a class="button style-10">Continue shopping</a>
                            @endforelse

                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-pull-9 blog-sidebar">
                        <div class="information-blocks">
                            <div class="categories-list account-links">
                                @if (Auth::guest())
                                    <a href="#" class="sale-entry vertical">
                                        <span class="hot-mark yellow">hot</span>
                                        <span class="sale-price"><span>-40%</span> Valentine <br> Underwear Sale</span>
                                        <span class="sale-description">Lorem ipsum dolor sitamet, conse adipisc sed do eiusmod tempor.</span>
                                        <img src="img/text-widget-image-3.jpg" class="sale-image" style="" alt="">
                                    </a>
                                @else
                                    <div class="block-title size-3">Client account</div>
                                    @include ('partials._accountMenu')
                                @endif

                            </div>
                            <div class="article-container">
                                <br/>Custom CMS block displayed below the one page account panel block. Put your own content here.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="information-blocks">
                @include ('partials._base')
            </div>
        </div>
    </div>
@stop