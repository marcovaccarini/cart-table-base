@extends('layouts.app')

@section('title', 'Log in')

@section('metadescription', 'Log in')

@section('og_title', 'Log in')

@section('og_description', 'Log in')

{{--@section('og_url', $url)--}}

@section('content')
    <div class="row nopadding" style="background: #262626; height: 115px">

    </div>

    <div class="wide-center">
        <div class="content-push">
            <div class="breadcrumb-box" style="margin: 36px 0;">
                <a href="/">Home</a>
                <a href="#">Log in</a>
            </div>
        </div>
    </div>
    <div class="wide-center">
        <div class="content-push">
            <div class="information-blocks">
                <div class="row">
                    <div class="col-sm-9 information-entry">
                        <h3 class="cart-column-title size-1" id="shopping-bag">Log In As Existing Customer</h3>
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                {{--<label for="email" class="col-md-4 control-label">E-Mail Address</label>--}}


                                    <input id="email" type="email" class="simple-field" placeholder="Email (required)" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif

                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
{{--                                <label for="password" class="col-md-4 control-label">Password</label>--}}


                                    <input id="password" type="password" class="simple-field" placeholder="Password (required)" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif

                            </div>

                            <div class="form-group">

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>

                            </div>
                            <br><br>
                            <div class="form-group">

                                    <button type="submit" class="button style-10">
                                        Login
                                    </button>
                            </div>
                        </form>
                        <br><br>
                        <a class="forgot-password" href="{{ url('/password/reset') }}">
                            Forgot Your Password?
                        </a>
                        <a class="forgot-password" href="{{ url('/register') }}">
                            Create a new account
                        </a>

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

{{--@endsection--}}
@stop