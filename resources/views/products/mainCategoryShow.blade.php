@extends('layouts.app')

@section('title', $mainCategory->title)

@section('metadescription', $mainCategory->title)

@section('og_title', $mainCategory->title)

@section('og_description', $mainCategory->description)

@section('og_url', $url)

@section('content')

    <div class="row nopadding" style="height: 100px; background: #292929;margin-bottom: 24px;">

    </div>
    <div class="wide-center">
        <div class="content-push">

            <div class="navigation-banner-swiper">
                <div class="swiper-container" data-autoplay="5000" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide active" data-val="0">
                            <div class="navigation-banner-wrapper light-text align-3" style="background-image: url(img/mini-1.jpg); background-position: center center;">
                                <div class="navigation-banner-content">
                                    <div class="cell-view">
                                        <h2 class="subtitle">new special collection</h2>
                                        <h1 class="title">Minimal Collection</h1>
                                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="swiper-slide" data-val="1">
                            <div class="navigation-banner-wrapper light-text align-3" style="background-image: url(img/mini-2.jpg); background-position: center center;">
                                <div class="navigation-banner-content">
                                    <div class="cell-view">
                                        <h2 class="subtitle">new special collection</h2>
                                        <h1 class="title">Minimal Collection</h1>
                                        <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="pagination"></div>
                </div>
            </div>
            <div class="information-blocks">
                <div class="tabs-container">
                    <div class="swiper-tabs tabs-switch">
                        <div class="block-title tab-switcher active">{{ $mainCategory->slug }}'s categories</div>
                        <div class="clear"></div>
                    </div>
                    <div>
                        <div class="tabs-entry">
                            <div class="products-swiper">
                                <div class="swiper-container" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="2" data-int-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                    <div class="swiper-wrapper">
                                        @inject('categories', 'App\Services\CategoriesService')
                                        @foreach($categories->get_categories($mainCategory->slug) as $category)
                                            <div class="swiper-slide">
                                                <div class="paddings-container">
                                                    <div class="product-slide-entry">

                                                        <a class="title" href="/{{ $mainCategory->slug }}/{{ $category->slug }}"><b>{{ $category->title }}</b></a>
                                                        <ul class="list-type-1">
                                                            @if(count($category->childs))
                                                                @include('partials._manageChild',['childs' => $category->childs])
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-header">
                    <h3 class="title">Our favorite products</h3>
                    <div class="description">Lorem ipsum dolor sit amet, consectetur adipisc elit. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</div>
                </div>
                @include('partials._slideProducts')
            </div>
{{--TODO: make a partial to share with the home page the slide of products--}}


            @include('partials._beforeFooter')
        </div>
            <div class="clear"></div>
        </div>
@stop