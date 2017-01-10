@extends('layouts.app')

@section('title', 'Marco.tk - Shop')

@section('metadescription', 'metadescription')

@section('og_title', 'Marco.tk Shop')

@section('og_description', 'description')

@section('og_url', 'http:shop.marco.tk')



@section('content')


        <div class="parallax-slide">
            <div class="parallax-clip">
                <div class="fixed-parallax" style="background-image: url(img/parallax-1.jpg);">

                </div>
                <div class="position-center">
                    <div class="parallax-vertical-align">
                        <div class="parallax-article">
                            <h2 class="subtitle">Check out this weekend</h2>
                            <h1 class="title">BEST SELLING PRODUCTS</h1>
                            <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</div>
                            <div class="info">
                                <a class="button style-6" href="#">shop now</a>
                                <a class="button style-7" href="#">features</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row nopadding">
            <div class="col-sm-4 nopadding creative-square-box">
                <div class="background-box" style="background-image: url(img/wide-4.jpg);"></div>
                <div class="cell-view">
                    <div class="parallax-article">
                        <h2 class="subtitle">product category</h2>
                        <h1 class="title">for him</h1>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</div>
                        <div class="info">
                            <a href="#" class="button style-8">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 nopadding creative-square-box">
                <div class="background-box" style="background-image: url(img/wide-5.jpg);"></div>
                <div class="cell-view">
                    <div class="parallax-article">
                        <h2 class="subtitle">Best quality products</h2>
                        <h1 class="title">handmade</h1>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</div>
                        <div class="info">
                            <a href="#" class="button style-8">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 nopadding creative-square-box">
                <div class="background-box" style="background-image: url(img/wide-6.jpg);"></div>
                <div class="cell-view">
                    <div class="parallax-article">
                        <h2 class="subtitle">product category</h2>
                        <h1 class="title">for her</h1>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</div>
                        <div class="info">
                            <a href="#" class="button style-8">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wide-center">
            <div class="content-push">
                <div class="information-blocks">
                    <div class="block-header">
                        <h3 class="title">Our favorite products</h3>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisc elit. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</div>
                    </div>
                    <div class="products-swiper">
                        <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                            <div class="swiper-wrapper">
                                @foreach($featureds as $featured)
                                    <div class="swiper-slide">
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">

                                                    <img src="/img/{{$featured->featured_image->filename}}" alt="{{$featured->product_name}}" />

                                                    @if($featured->custom_discount != null)
                                                        <div class="product-image-label type-2"><span>{{number_format($featured->custom_discount), 0}}% OFF</span></div>
                                                    @endif

                                                    <a class="top-line-a right"><i class="fa fa-heart"></i> </a>
                                                    <a href="{{$featured->path}}" class="top-line-a left quick-view">Details <i class="fa fa-search-plus"></i></a>
                                                    <div class="bottom-line">
                                                        <a class="bottom-line-a open-product" data-id="{{$featured->id}}"><i class="fa fa-shopping-cart"></i> Add to bag</a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">{{$featured->category->title}}</a>
                                                {{--TODO: add link to category page--}}
                                                <a class="title"  href="{{$featured->path}}">{{$featured->product_name}}</a>
                                                <div class="price">
                                                    @if($featured->custom_discount != null)
                                                        <div class="prev">${{$featured->price}}</div> |
                                                        <div class="current">${{ number_format($featured->price - (($featured->price/100) * $featured->custom_discount), 2) }}</div>
                                                    @else
                                                        <div class="current">${{$featured->price}}</div>
                                                    @endif
                                                </div>
                                                <div class="information-blocks">
                                                    <a class="button style-17 open-product" id="getUser" data-id="{{$featured->id}}"><i class="fa fa-shopping-bag"></i>Add to bag</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination"></div>
                        </div>
                    </div>
                </div>

                <div class="information-blocks">


                </div>

                <div class="clear"></div>
            </div>
        </div>
        <div class="parallax-slide">
            <div class="parallax-clip">
                <div class="fixed-parallax" style="background-image: url(img/parallax-2.jpg);">

                </div>
                <div class="position-center">
                    <div class="parallax-vertical-align">
                        <div class="parallax-article">
                            <h2 class="subtitle">Lorem ipsum dolor sit amet, consectetur</h2>
                            <h1 class="title">Etiam venenatis</h1>
                            <div class="description">Morbi pulvinar turpis arcu, non fringilla lorem dapibus at. Duis ornare risus vel massa ornare, quis auctor sapien convallis. </div>
                            <div class="info">
                                <a class="button style-7" href="#">shop now</a>
                                <a class="button style-6" href="#">features</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wide-center">
            <div class="content-push">
                <div class="hidden-sm hidden-xs" style="height: 30px;"></div>
                <div class="mozaic-banners-wrapper type-2">
                    <div class="row">
                        <div class="banner-column col-sm-6">
                            <a style="background-image: url(img/mini-3.jpg); background-size: cover; background-position: right top;" class="mozaic-banner-entry type-3">
                                <span class="mozaic-banner-content">
                                    <span class="subtitle">New Collection</span>
                                    <span class="title">For Him</span>
                                    <span class="view">read more</span>
                                </span>
                            </a>
                        </div>
                        <div class="banner-column col-sm-6">
                            <a style="background-image: url(img/mini-4.jpg); background-size: cover; background-position: right top;" class="mozaic-banner-entry type-3">
                                <span class="mozaic-banner-content">
                                    <span class="subtitle">New Collection</span>
                                    <span class="title">For Her</span>
                                    <span class="view">read more</span>
                                </span>
                            </a>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="information-blocks">
                    <div class="block-header">
                        <h3 class="title">New arrivals</h3>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisc elit. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</div>
                    </div>
                    <div class="products-swiper">
                        <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                            <div class="swiper-wrapper">
                                @foreach($newarrivals as $newarrival)
                                    <div class="swiper-slide">
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">

                                                    <img src="/img/{{$newarrival->featured_image->filename}}" alt="{{$newarrival->product_name}}" />

                                                    @if($newarrival->custom_discount != null)
                                                        <div class="product-image-label type-2"><span>{{number_format($newarrival->custom_discount), 0}}% OFF</span></div>
                                                    @endif

                                                    <a class="top-line-a right"><i class="fa fa-heart"></i> </a>
                                                    <a href="{{$newarrival->path}}" class="top-line-a left quick-view">Details <i class="fa fa-search-plus"></i></a>
                                                    <div class="bottom-line">
                                                        <a class="bottom-line-a open-product" data-id="{{$newarrival->id}}"><i class="fa fa-shopping-cart"></i> Add to bag</a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">{{$newarrival->category->title}}</a>
                                                {{--TODO: add link to category page--}}
                                                <a class="title"  href="{{$newarrival->path}}">{{$newarrival->product_name}}</a>
                                                <div class="price">
                                                    @if($newarrival->custom_discount != null)
                                                        <div class="prev">${{$newarrival->price}}</div> |
                                                        <div class="current">${{ number_format($newarrival->price - (($newarrival->price/100) * $newarrival->custom_discount), 2) }}</div>
                                                    @else
                                                        <div class="current">${{$newarrival->price}}</div>
                                                    @endif
                                                </div>
                                                <div class="information-blocks">
                                                    <a class="button style-17 open-product" id="getUser" data-id="{{$newarrival->id}}"><i class="fa fa-shopping-bag"></i>Add to bag</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="parallax-slide">
            <div class="parallax-clip">
                <div class="fixed-parallax" style="background-image: url(img/parallax-3.jpg);">

                </div>
                <div class="position-center">
                    <div class="parallax-vertical-align">
                        <div class="parallax-article">
                            <h2 class="subtitle">Ut semper lorem id sed ornare</h2>
                            <h1 class="title">dolor non, faucibus purus</h1>
                            <div class="description">In laoreet iaculis ipsum, et varius arcu sagittis non. Suspendisse ornare pharetra tortor, in semper tortor aliquet nec. Curabitur a varius ex.</div>
                            <div class="info">
                                <a class="button style-6" href="#">shop now</a>
                                <a class="button style-7" href="#">features</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wide-center">
            <div class="content-push">
                <div class="information-blocks">
                    <div class="block-header">
                        <h3 class="title">Our favorite categories</h3>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisc elit. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="mozaic-banners-wrapper type-2">
                    <div class="row">
                        <div class="banner-column col-sm-4">
                            <a style="background-image: url(img/mini-3.jpg); background-size: cover; background-position: right top;" class="mozaic-banner-entry type-3">
                                    <span class="mozaic-banner-content">
                                        <span class="subtitle">Category</span>
                                        <span class="title">Leather</span>
                                        <span class="view">view category</span>
                                    </span>
                            </a>
                        </div>
                        <div class="banner-column col-sm-4">
                            <a style="background-image: url(img/mini-4.jpg); background-size: cover; background-position: right top;" class="mozaic-banner-entry type-3">
                                <span class="mozaic-banner-content">
                                    <span class="subtitle">New Collection</span>
                                    <span class="title">For Her</span>
                                    <span class="view">read more</span>
                                </span>
                            </a>
                        </div>
                        <div class="banner-column col-sm-4">
                            <a style="background-image: url(img/mini-3.jpg); background-size: cover; background-position: right top;" class="mozaic-banner-entry type-3">
                                <span class="mozaic-banner-content">
                                    <span class="subtitle">New Collection</span>
                                    <span class="title">For Him</span>
                                    <span class="view">read more</span>
                                </span>
                            </a>
                        </div>


                        <div class="clear"></div>
                    </div>
                    <div class="row">
                        <div class="banner-column col-sm-4">
                            <a style="background-image: url(img/mini-3.jpg); background-size: cover; background-position: right top;" class="mozaic-banner-entry type-3">
                                    <span class="mozaic-banner-content">
                                        <span class="subtitle">Category</span>
                                        <span class="title">Leather</span>
                                        <span class="view">view category</span>
                                    </span>
                            </a>
                        </div>
                        <div class="banner-column col-sm-4">
                            <a style="background-image: url(img/mini-4.jpg); background-size: cover; background-position: right top;" class="mozaic-banner-entry type-3">
                                <span class="mozaic-banner-content">
                                    <span class="subtitle">New Collection</span>
                                    <span class="title">For Her</span>
                                    <span class="view">read more</span>
                                </span>
                            </a>
                        </div>
                        <div class="banner-column col-sm-4">
                            <a style="background-image: url(img/mini-3.jpg); background-size: cover; background-position: right top;" class="mozaic-banner-entry type-3">
                                <span class="mozaic-banner-content">
                                    <span class="subtitle">New Collection</span>
                                    <span class="title">For Him</span>
                                    <span class="view">read more</span>
                                </span>
                            </a>
                        </div>


                        <div class="clear"></div>
                    </div>





                </div>
                <div class="information-blocks">
                    <div class="block-header">
                        <h3 class="title">Promotions</h3>
                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipisc elit. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</div>
                    </div>
                    <div class="products-swiper">
                        <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="5" data-add-slides="5">
                            <div class="swiper-wrapper">
                                @foreach($promotions as $promotion)
                                    <div class="swiper-slide">
                                        <div class="paddings-container">
                                            <div class="product-slide-entry">
                                                <div class="product-image">

                                                    <img src="/img/{{$promotion->featured_image->filename}}" alt="{{$promotion->product_name}}" />

                                                    @if($promotion->custom_discount != null)
                                                        <div class="product-image-label type-2"><span>{{number_format($promotion->custom_discount), 0}}% OFF</span></div>
                                                    @endif

                                                    <a class="top-line-a right"><i class="fa fa-heart"></i> </a>
                                                    <a href="{{$promotion->path}}" class="top-line-a left quick-view">Details <i class="fa fa-search-plus"></i></a>
                                                    <div class="bottom-line">
                                                        <a class="bottom-line-a open-product" data-id="{{$promotion->id}}"><i class="fa fa-shopping-cart"></i> Add to bag</a>
                                                    </div>
                                                </div>
                                                <a class="tag" href="#">{{$promotion->category->title}}</a>
                                                {{--TODO: add link to category page--}}
                                                <a class="title"  href="{{$promotion->path}}">{{$promotion->product_name}}</a>
                                                <div class="price">
                                                    @if($promotion->custom_discount != null)
                                                        <div class="prev">${{$promotion->price}}</div> |
                                                        <div class="current">${{ number_format($promotion->price - (($promotion->price/100) * $promotion->custom_discount), 2) }}</div>
                                                    @else
                                                        <div class="current">${{$promotion->price}}</div>
                                                    @endif
                                                </div>
                                                <div class="information-blocks">
                                                    <a class="button style-17 open-product" id="getUser" data-id="{{$promotion->id}}"><i class="fa fa-shopping-bag"></i>Add to bag</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="pagination"></div>
                        </div>
                    </div>
                    <div class="hidden-sm hidden-xs" style="height: 30px;"></div>
                </div>
            </div>
        </div>





        <div class="parallax-slide">
            <div class="parallax-clip">
                <div class="fixed-parallax" style="background-image: url(img/parallax-4.jpg);">

                </div>
                <div class="position-center">
                    <div class="parallax-vertical-align">
                        <div class="parallax-article">
                            <h2 class="subtitle">Curabitur elementum justo id urna euismod mattis</h2>
                            <h1 class="title">Class aptent taciti</h1>
                            <div class="description">Quisque urna lorem, ullamcorper ac lacinia ac, consequat a ligula. Phasellus et feugiat leo. Aenean facilisis velit justo, ut viverra sapien blandit sed. </div>
                            <div class="info">
                                <a class="button style-7" href="#">shop now</a>
                                <a class="button style-6" href="#">features</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wide-center">
            <div class="content-push">
                <div class="column-article-wrapper">
                    <div class="row nopadding">
                        <div class="col-sm-4 information-entry left-border nopadding">
                            <div class="column-article-entry">
                                <a class="title" href="#">About Store</a>
                                <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                <a class="read-more">Read more <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-4 information-entry left-border nopadding">
                            <div class="column-article-entry">
                                <a class="title" href="#">Delivery</a>
                                <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                <a class="read-more">Read more <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-4 information-entry left-border nopadding">
                            <div class="column-article-entry">
                                <a class="title" href="#">Sale terms</a>
                                <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                <a class="read-more">Read more <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
