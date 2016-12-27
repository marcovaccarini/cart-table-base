@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="span12">
            <div class="row">
                @if (session('errors'))
                    con errors:
                    <div class="alert alert-danger">
                        {{ session('errors') }}
                    </div>
                @endif

                @if (session('status'))
                    con status:
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <ul class="thumbnails">
                    @foreach($products as $product)
                        <li class="span4">
                            <div class="thumbnail">
                                {{--<img src="/images/{{$product->cover}}" alt="ALT NAME">--}}
                                <div class="caption">
                                    <h3>{{$product->product_name}}</h3>
                                    {{--<p>Author : <b>{{$book->author->name}} {{$book->author->surname}}</b></p>--}}
                                    <p>Price : <b>{{$product->price}}</b></p>
                                    <p>Product ID : <b>{{$product->id}}</b></p>
                                    <form action="/cart" name="add_to_cart" method="post" accept-charset="UTF-8">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="product_id" value="{{$product->id}}" />
                                        <select name="qty" style="width: 100%;">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <p align="center"><button class="btn btn-info btn-block">Add to Cart</button></p>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@stop