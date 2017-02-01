@extends('layouts.app')

@section('title', 'Create an account')

@section('metadescription', 'Create an account')

@section('og_title', 'Create an account')

@section('og_description', 'Create an account')

@section('content')
    <div class="row nopadding" style="background: #262626; height: 115px">

    </div>

    <div class="wide-center">
        <div class="content-push">
            <div class="breadcrumb-box" style="margin: 36px 0;">
                <a href="/">Home</a>
                <a href="#">Register</a>
            </div>
        </div>
    </div>
    <div class="wide-center">
        <div class="content-push">
            <div class="information-blocks">
                <div class="row">
                    <div class="col-sm-9 information-entry">
                        <h3 class="cart-column-title size-1" id="shopping-bag">Create an Account</h3>
                        <form role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{--<label for="name" class="col-md-4 control-label">Name</label>--}}


                                    <input id="name" type="text" class="simple-field" name="name" placeholder="Name (required)" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}


                                    <input id="email" type="email" class="simple-field" placeholder="Email (required)" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                {{--<label for="password" class="col-md-4 control-label">Password</label>--}}


                                    <input id="password" type="password" class="simple-field" placeholder="Password (required)" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                            </div>

                            <div class="form-group">
                            {{--    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>--}}


                                    <input id="password-confirm" type="password" class="simple-field" placeholder="Confirm password (required)" name="password_confirmation" required>

                            </div>

                            <div class="form-group">

                                    <button type="submit" class="button style-10">
                                        Register
                                    </button>

                            </div>
                        </form>

                    </div>
                    <div class="col-sm-3 information-entry">

                        <div class="information-blocks">
                            <a href="#" class="sale-entry vertical">
                                <span class="hot-mark yellow">hot</span>
                                <span class="sale-price"><span>-40%</span> Valentine <br> Underwear Sale</span>
                                <span class="sale-description">Lorem ipsum dolor sitamet, conse adipisc sed do eiusmod tempor.</span>
                                <img src="img/text-widget-image-3.jpg" class="sale-image" style="" alt="" />
                            </a>
                        </div>


                    </div>
                </div>
            </div>
            <div class="information-blocks">
                @include ('partials._base')
            </div>
        </div>
    </div>
@endsection
