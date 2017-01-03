@extends('layouts.app')

@section('title', $product->product_name)

@section('metadescription', $product->description)

@section('og_title', $product->product_name)

@section('og_description', $product->description)

@section('og_url', $url)

@section('content')



    <div class="row nopadding" style="background: #262626; height: 115px">

    </div>
    <div class="wide-center">
        <div class="content-push">
            <div class="breadcrumb-box" style="margin: 36px 0;">
                <a href="/">Home</a>
                <a href="/{{ $mainCategory->slug }}/" class="text-uppercase">{{ $mainCategory->title }}</a>
                <a href="/{{ $mainCategory->slug }}/{{ $category->slug }}/">{{ $category->title }}</a>
                <a href="/{{ $mainCategory->slug }}/{{ $category->slug }}/{{ $subCategory->slug }}/">{{ $subCategory->title }}</a>
                <a href="#">{{ $product->product_name }}</a>
            </div>
        </div>
    </div>
    <div class="wide-center">
        <div class="content-push">
            <div class="information-blocks">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-sm-6 information-entry">
                        <div class="product-preview-box">
                            <div class="swiper-container product-preview-swiper" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                                <div class="swiper-wrapper">

                                    @foreach($product->images as $image)
                                    <div class="swiper-slide">
                                        <div class="product-zoom-image">
                                            <img src="/img/main/{{$image->filename}}" alt="{{ $product->product_name }}" data-zoom="/img/zoom/{{$image->filename}}" />
                                        </div>
                                    </div>
                                    @endforeach

                                </div>
                                <div class="pagination"></div>
                                <div class="product-zoom-container">
                                    <div class="move-box">
                                        <img class="default-image" src="/img/main/{{$image->filename}}" alt="{{ $product->product_name }}" />
                                        <img class="zoomed-image" src="/img/zoom/{{$image->filename}}" alt="{{ $product->product_name }}" />
                                    </div>
                                    <div class="zoom-area"></div>
                                </div>
                            </div>
                            <div class="swiper-hidden-edges">
                                <div class="swiper-container product-thumbnails-swiper" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="3" data-int-slides="3" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                    <div class="swiper-wrapper">
                                        @foreach($product->images as $image)
                                        <div class="swiper-slide @if ($loop->first)
                                                selected
                                            @endif">
                                            <div class="paddings-container">
                                                <img src="/img/main/{{$image->filename}}" alt="{{ $product->product_name }}" />
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                    <div class="pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 information-entry">
                        <div class="product-detail-box">
                            <h1 class="product-title">{{ $product->product_name }}</h1>
                            <h3 class="product-subtitle">Product code: {{ $product->specification }}</h3>

                            <div class="product-description detail-info-entry">{{ $product->description }}</div>
                            <div class="price detail-info-entry">
                                @if($product->custom_discount != null)
                                    <div class="prev">${{ $product->price }}</div>

                                    <span class="sale-price" style="color: #d50f02;margin:0 10px;"> -{{number_format($product->custom_discount), 0}}%</span>
                                    <div class="current">
                                        ${{ number_format($product->price - (($product->price/100) * $product->custom_discount), 2) }}
                                    </div>

                                @else
                                    <div class="current">${{ $product->price }}</div>
                                @endif
                            </div>
                            <form novalidate="" method="post">
                                <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}" />
                            <div class="size-selector detail-info-entry" id="sizes">
                                <div class="detail-info-entry-title">Size</div>
                                <div class="message-box message-danger" id="size-error" style="display:none;">
                                    {{--<div class="message-icon"><i class="fa fa-times"></i></div>--}}
                                    <div class="message-text text-center"><b> Please select a size! </b></div>
                                </div>
                                @foreach($product->sizes as $size)
                                    <div class="entry" data-sizeid="{{$size->id}}"  {{--@if ($loop->first)
                                            active
                                        @endif--}}">{{$size->name}}</div>
                                @endforeach
                                    {{--<div class="entry">s</div>
                                    <div class="entry">m</div>
                                    <div class="entry">l</div>
                                    <div class="entry">xl</div>
                                    <div class="spacer"></div>--}}

                            </div>
                            {{--<div class="color-selector detail-info-entry">
                                <div class="detail-info-entry-title">Color</div>
                                <div class="entry active" style="background-color: #d23118;">&nbsp;</div>
                                <div class="entry" style="background-color: #2a84c9;">&nbsp;</div>
                                <div class="entry" style="background-color: #000;">&nbsp;</div>
                                <div class="entry" style="background-color: #d1d1d1;">&nbsp;</div>
                                <div class="spacer"></div>
                            </div>--}}
                            <div class="quantity-selector detail-info-entry">
                                <div class="detail-info-entry-title">Quantity</div>
                                <div class="entry number-minus">&nbsp;</div>
                                <div id="qty" class="entry number">1</div>
                                <div class="entry number-plus">&nbsp;</div>
                            </div>
                            <div class="detail-info-entry">
                                <a class="button style-10" id="btn-add-to-cart">Add to cart</a>
                                <a class="button style-11"><i class="fa fa-heart"></i> Add to Wishlist</a>
                                <div class="clear"></div>
                            </div>
                            </form>
                            <div class="tags-selector detail-info-entry">
                                <div class="detail-info-entry-title">Tags:</div>
                                @foreach($product->tags as $tag)
                                    <a href="/special/{{$tag->slug}}">{{$tag->title}}</a> /
                                @endforeach
                            </div>
                            <div class="share-box detail-info-entry">
                                <div class="title">Share in social media</div>
                                <div class="socials-box">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="accordeon">

                            <div class="accordeon-title">shipping</div>
                            <div class="accordeon-entry">
                                <div class="article-container style-1">
                                    <p>For details on shipping times and methods see our <a href="#">SHIPPING METHODS</a> detail page. </p>

                                </div>
                            </div>
                            <div class="accordeon-title">RETURNS POLICY</div>
                            <div class="accordeon-entry">
                                <div class="article-container style-1">
                                    <p>If you are not satisfied with your purchase, you have 14 days from the date you receive your order in which to return the purchased products.</p>
                                    <p>See more details on our <a href="#">RETURNS POLICY</a> page. </p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>




@stop