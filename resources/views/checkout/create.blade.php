@extends('layouts.app')

@section('title', 'Checkout')

@section('metadescription', 'Checkout')

@section('og_title', 'Checkout')

@section('og_description', 'Checkout')

{{--@section('og_url', $url)--}}

@section('content')

<div class="row nopadding" style="background: #262626; height: 115px">

</div>
<div class="wide-center">
    <div class="content-push">
        <div class="breadcrumb-box" style="margin: 36px 0;">
            <a href="/">Home</a>
            <a href="#">Checkout</a>
        </div>
    </div>
</div>

<div class="wide-center">
    <div class="content-push">
        <div class="information-blocks">
            <div class="row">
                <div class="col-sm-9 information-entry">
                    <h3 class="cart-column-title size-1" id="shopping-bag">Checkout</h3>
                    <div class="tabs-container style-1">
                        <div class="swiper-tabs tabs-switch">
                            <div class="list">
                                <a class="tab-switcher active">SHIPPING</a>
                                <span class="tab-switcher">DELIVERY</span>
                                <span class="tab-switcher">CONFIRM</span>
                                <span class="tab-switcher">BILLING</span>
                                <div class="clear"></div>
                            </div>
                        </div>
                        @if($errors->any())
                            <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                            </ul>
                        @endif
                        <form id="checkout_form" method="POST" action="/orders">

                            <div class="tabs-entry form-group">
                                <div class="information-blocks">
                                    <h3 class="block-title main-heading">Shipping Address</h3>

                                    @if (Auth::guest())
                                        <input type="hidden" name="email" value="{{ $email }}">
                                    @else
                                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                    @endif

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                                <label class="control-label">First Name <span>*</span></label>
                                                <input class="form-control simple-field" autofocus type="text" name="first_name" id="first_name" placeholder="First Name (required)" required value="{{ old('first_name') }}" />
                                                @if ($errors->has('first_name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <label class="control-label">Last Name <span>*</span></label>
                                                <input class="form-control simple-field" id="last_name" name="last_name" type="text" placeholder="Last Name (required)" required value="{{ old('last_name') }}" />
                                                @if ($errors->has('last_name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group{{ $errors->has('street') ? ' has-error' : '' }}">
                                                <label class="control-label">Street Address <span>*</span></label>
                                                <input class="form-control simple-field" name="street" type="text" placeholder="Street address (required)" value="{{ old('street') }}" />
                                                @if ($errors->has('street'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('street') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label>Apartment/Suite </label>
                                                <input class="form-control simple-field" name="apartment" type="text" placeholder="Apartment/Suite" value="{{ old('apartment') }}" />
                                            </div>
                                            <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                                                <label class="control-label">City <span>*</span></label>
                                                <input class="form-control simple-field" name="city" type="text" placeholder="City (required)" required value="{{ old('city') }}" />
                                                @if ($errors->has('city'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                                                <label class="control-label">State <span>*</span></label>
                                                <div class="simple-drop-down simple-field">
                                                    <select class="form-control" name="state" required>
                                                        <option>United States</option>
                                                        <option>Great Britain</option>
                                                        <option>Canada</option>
                                                    </select>
                                                </div>
                                                @if ($errors->has('state'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('state') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('zip_code') ? ' has-error' : '' }}">
                                                <label class="control-label">Zip code <span>*</span></label>
                                                <input class="form-control simple-field" type="text" name="zip_code" placeholder="Zip code (required)" required value="{{ old('zip_code') }}" />
                                                @if ($errors->has('zip_code'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('zip_code') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label class="control-label">Phone <span>*</span></label>
                                                <input class="form-control simple-field" id="phone" name="phone" type="tel" placeholder="Phone (required)" required value="{{ old('phone') }}" />
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                                <div id="btn-shipping" class="button style-10">Continue to delivery{{--<input type="submit" value="" />--}}</div>
                            </div>
                            <div class="tabs-entry">
                                <div class="information-blocks" id="delivery_form">
                                    <h3 class="block-title main-heading">Delivery Method</h3>
                                    <div class="message-box message-danger" id="size-error" style="display:none;">
                                        <div class="message-text text-center"><b> Please select a delivery method! </b></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="checkbox-entry radio control-label">
                                            <input type="radio" value="6.95" id="method_standard" name="shipping_method" class="shipping_method form-control" /> <span class="check"></span>
                                            <div class="pull-right" style="width:95%; display: block;">
                                            <h4 class="block-title">Standard: $6.95</h4>
                                                <div class="text-widget">
                                                    <div class="description">
                                                        <p>Deliveries are made Monday – Friday. We aim to have your products delivered to you within seven (7) working days, Saturday delivery may be possible, but this varies by country.</p>
                                                        <p>A signature is required for any packages over one hundred Dollars ($100) in value</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label class="checkbox-entry radio control-label">
                                            <input type="radio" value="16.95" id="method_express" name="shipping_method" class="shipping_method form-control" /> <span class="check"></span>
                                            <div class="pull-right" style="width:95%; display: block;">
                                                <h4 class="block-title">Express: $16,95</h4>
                                                <div class="text-widget">
                                                    <div class="description">
                                                        <p>
                                                            If we receive your order by 17.30pm (GMT / BST), on a working day, we will dispatch your order the same day.
                                                        </p>
                                                        <p>
                                                            Delivery should take place within one to three working days, dependent upon destination country.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </label>
                                    </div>
                                    <div class="clear" style="margin-bottom: 20px"></div>
                                    <div class="button style-10" id="btn-delivery">Continue to confirm</div>
                                </div>
                            </div>
                            <div class="tabs-entry">
                                <div class="information-blocks">
                                    <h3 class="block-title main-heading">Confirm the order</h3>
                                    <div class="row">

                                        @include ('partials._confirmItems')

                                        <div class="col-md-12 information-entry">
                                            <div class="cart-summary-box">
                                                @inject('total', 'App\Services\CartService')
                                                <div class="sub-total">Subtotal: <span class="main">${{ $total->get_total_cart() }}</span></div>
                                                <div class="sub-total">Shipping: $<span id="tot_shipping">6.99</span></div>
                                                <div class="grand-total">Grand Total $<span id="total_confirm">{{ $total->get_total_cart() }}</span></div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 information-entry">
                                            <div class="clear" style="margin-bottom: 20px"></div>
                                            <div class="additional-data">
                                                <div class="block-title size-1">Additional Notes
                                                    <textarea name="note" class="simple-field size-1"></textarea>
                                                </div>




                                            </div>
                                        </div>
                                        <div class="clear" style="margin-bottom: 20px"></div>
                                        <div id="btn-confirm" class="button style-10">Continue to billing</div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-entry">
                                <div class="information-blocks">
                                    <h3 class="block-title main-heading">Payment Info</h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="cell-view">
                                                <div class="text-widget">
                                                    <div class="description">
                                                        We accept all major credit cards.
                                                    </div>
                                                </div>
                                                <div class="payment-methods">
                                                    <a href="#"><img src="/img/payment-method-1.png" alt="" /></a>
                                                    <a href="#"><img src="/img/payment-method-2.png" alt="" /></a>
                                                    <a href="#"><img src="/img/payment-method-3.png" alt="" /></a>
                                                    <a href="#"><img src="/img/payment-method-4.png" alt="" /></a>
                                                    <a href="#"><img src="/img/payment-method-5.png" alt="" /></a>
                                                    <a href="#"><img src="/img/payment-method-6.png" alt="" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detail-info-lines border-box" style="margin: 20px 0">
                                        <div class="row" style="margin-top: 20px">
                                            <div class="col-sm-12">

                                                <label>Name on card <span>*</span></label>
                                                <input class="simple-field" type="text" placeholder="Name on card (required)" required value="" />
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top: 20px">
                                            <div class="col-sm-6">
                                                <label>Card Number <span>*</span></label>
                                                <input class="simple-field" data-stripe="number" type="text" placeholder="Card Number (required)" required value="" />
                                                <div class="clear"></div>
                                            </div>

                                            <div class="col-sm-2">
                                                <label>Exp. MM <span>*</span></label>
                                                <input class="simple-field" data-stripe="exp-month" type="text" placeholder="MM (required)" required value="" />
                                                <div class="clear"></div>
                                            </div>
                                            <div class="col-sm-2">
                                                <label>Exp. YYYY <span>*</span></label>
                                                <input class="simple-field" data-stripe="exp-year" type="text" placeholder="YYYY (required)" required value="" />
                                                <div class="clear"></div>
                                            </div>
                                            <div class="col-sm-2">
                                                <label>CVC <span>*</span></label>
                                                <input class="simple-field" data-stripe="cvc" type="text" placeholder="CVC (required)" required value="" />
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="block-title main-heading">Billing Address</h3>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>
                                                <input type="checkbox" id="check_billing_address" name="has_billing_address" value="0" checked>
                                                {{--<input id="check_billing_address" type="checkbox" name="same_address" checked>--}}
                                                Use shipping address
                                            </label>
                                        </div>
                                    </div>
                                    <div id="container_billing_adress">
                                        <div id="billing_address" class="address-block">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group{{ $errors->has('bill_first_name') ? ' has-error' : '' }}">
                                                    <label>First Name <span>*</span></label>
                                                    <input class="simple-field" type="text" name="bill_first_name" placeholder="First Name (required)" required value="{{ old('bill_first_name') }}" />
                                                    @if ($errors->has('bill_first_name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('bill_first_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group{{ $errors->has('bill_last_name') ? ' has-error' : '' }}">
                                                    <label>Last Name <span>*</span></label>
                                                    <input class="simple-field" type="text" name="bill_last_name" placeholder="Last Name (required)" required value="{{ old('bill_last_name') }}" />
                                                    @if ($errors->has('bill_last_name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('bill_last_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group{{ $errors->has('bill_street') ? ' has-error' : '' }}">
                                                    <label>Street Address <span>*</span></label>
                                                    <input class="simple-field" type="text" name="bill_street" placeholder="Street address (required)" required value="{{ old('bill_street') }}" />
                                                    @if ($errors->has('bill_street'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('bill_street') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label>Apartment/Suite </label>
                                                    <input class="simple-field" type="text" name="bill_apartment" placeholder="Apartment/Suite" value="{{ old('bill_apartment') }}" />
                                                </div>
                                                <div class="form-group{{ $errors->has('bill_city') ? ' has-error' : '' }}">
                                                    <label>City <span>*</span></label>
                                                    <input class="simple-field" type="text" name="bill_city" placeholder="City (required)" required value="{{ old('bill_city') }}" />
                                                    @if ($errors->has('bill_city'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('bill_city') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group{{ $errors->has('bill_state') ? ' has-error' : '' }}">
                                                    <label>State <span>*</span></label>
                                                    <div class="simple-drop-down simple-field">
                                                        <select class="form-control" name="bill_state" required>
                                                            <option>United States</option>
                                                            <option>Great Britain</option>
                                                            <option>Canada</option>
                                                        </select>
                                                    </div>
                                                    @if ($errors->has('bill_state'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('bill_state') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group{{ $errors->has('bill_zip_code') ? ' has-error' : '' }}">
                                                    <label>Zip code <span>*</span></label>
                                                    <input class="simple-field" type="text" name="bill_zip_code" placeholder="Zip code (required)" required value="{{ old('bill_zip_code') }}" />
                                                    @if ($errors->has('bill_zip_code'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('bill_zip_code') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group{{ $errors->has('bill_phone') ? ' has-error' : '' }}">
                                                    <label>Phone <span>*</span></label>
                                                    <input class="simple-field" type="tel" name="bill_phone" placeholder="Phone (required)" required value="{{ old('bill_phone') }}" />
                                                    @if ($errors->has('bill_phone'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('bill_phone') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="clear" style="margin-bottom: 20px"></div>
                                    {{ csrf_field() }}
                                    {{--<div class="button style-10">Pay<input id="submitBtn" type="submit" value="" /></div>--}}
                                    <button id="submitBtn" type="submit" class="button style-10">Buy Now</button>
                                    <div class="text-widget">
                                        <div class="description">
                                            <p> </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="payment-errors" style="color: red;margin-top:10px;"></span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-sm-3 information-entry">
                    <h3 class="cart-column-title size-1" style="text-align: center;">Order Summary</h3>
                    <div class="sidebar-subtotal">
                        <div class="price-data">
                            @inject('total', 'App\Services\CartService')

                            <div class="main">${{ $total->get_total_cart() }}</div>
                            <div class="title">Excluding tax &amp; shipping</div>
                            <div class="subtitle">ORDERS WILL BE PROCESSED IN USD</div>
                        </div>
                        <div class="additional-data">
                            <div class="title"> Items Ordered <a class="continue-link pull-right" href="/cart">Edit</a></div>
                            <div class="cart-box checkout">

                                @include ('partials._checkoutItems')

                            </div>
                        </div>
                    </div>
                    <div class="block-title size-1">Get shipping estimates</div>
                </div>
            </div>
        </div>
        <div class="information-blocks">

            @include ('partials._base')

        </div>
    </div>
</div>
    <script type="text/javascript">
        function removeCartModal() {
            element = document.getElementsByClassName("open-cart-popup");
            if(element.length > 0) {
                element = element[0];
                element.parentNode.removeChild(element);
            }
        }
        window.onload = removeCartModal;
    </script>
@stop