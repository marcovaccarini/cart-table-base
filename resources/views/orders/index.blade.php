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
                <a href="/orders">Orders history</a>
            </div>
        </div>
    </div>
    <div class="wide-center">
        <div class="content-push">
            <div class="information-blocks">
                <div class="row">
                    <div class="col-sm-9 col-sm-push-3">


                        <div class="categories-list">
                            <div class="block-title size-3">Orders history</div>
                            <ul>
                                @foreach($orders as $order)
                                    <li><a href="/orders/{{ $order->id }}">Order No. {{ $order->id }} on {{ $order->created_at->toFormattedDateString() }} <span>({{ $order->status_name }})</span></a></li>
                                @endforeach
                                {{--<li><a href="#">Make-up &amp; beauty<span>(2)</span></a></li>
                                <li><a href="#">Accessories <span>(0)</span></a></li>
                                <li><a href="#">Fashion trends<span>(11)</span></a></li>
                                <li><a href="#">Haircuts &amp; hairstyles<span>(7)</span></a></li>--}}
                            </ul>
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