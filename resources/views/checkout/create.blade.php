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
                <a href="#">Home</a>
                <a href="#">Checkput</a>
            </div>
        </div>
    </div>

    <div class="wide-center">
        <div class="content-push">

            <div class="information-blocks">
                <div class="row">
                    <div class="col-sm-9 information-entry">
                        <h3 class="cart-column-title size-1" id="shopping-bag">Shopping Bag</h3>
                        <div class="tabs-container style-1">
                    <div class="swiper-tabs tabs-switch">
                        <div class="title">Product info</div>
                        <div class="list">
                            <a class="tab-switcher active">SHIPPING</a>
                            <a class="tab-switcher">DELIVERY</a>
                            <a class="tab-switcher">BILLING</a>
                            <a class="tab-switcher">CONFIRM</a>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div>
                        <div class="tabs-entry">

                                    <div class="information-blocks">
                                        <h3 class="block-title main-heading">Shipping Address</h3>
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label>First Name <span>*</span></label>
                                                    <input class="simple-field" type="text" placeholder="First Name (required)" required value="" />
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Last Name <span>*</span></label>
                                                    <input class="simple-field" type="text" placeholder="Last Name (required)" required value="" />
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <label>Street Address <span>*</span></label>
                                                    <input class="simple-field" type="text" placeholder="Street address (required)" required value="" />
                                                    <label>Apartment/Suite </label>
                                                    <input class="simple-field" type="text" placeholder="Apartment/Suite" value="" />
                                                    <label>City <span>*</span></label>
                                                    <input class="simple-field" type="text" placeholder="City (required)" required value="" />
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>State <span>*</span></label>
                                                    <div class="simple-drop-down simple-field">
                                                        <select>
                                                            <option>United States</option>
                                                            <option>Great Britain</option>
                                                            <option>Canada</option>
                                                        </select>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label>Zip code <span>*</span></label>
                                                    <input class="simple-field" type="text" placeholder="Zip code (required)" required value="" />
                                                    <div class="clear"></div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <label>Phone <span>*</span></label>
                                                    <input class="simple-field" type="tel" placeholder="Phone (required)" required value="" />
                                                    <div class="clear"></div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="button style-10">Continue to delivery<input type="submit" value="" /></div>
                                                </div>
                                                {{--<div class="col-sm-6">
                                                    <label>Your Country</label>
                                                    <div class="simple-drop-down simple-field">
                                                        <select>
                                                            <option>United States</option>
                                                            <option>Great Britain</option>
                                                            <option>Canada</option>
                                                        </select>
                                                    </div>
                                                </div>--}}
                                            </div>

                                    </div>


                        </div>
                        <div class="tabs-entry">
                            <div class="information-blocks">
                                <h3 class="block-title main-heading">Delivery Method</h3>
                                <label class="checkbox-entry radio">
                                    <input type="radio" name="custom-name" /> <span class="check"></span>
                                    <div class="pull-right" style="width:95%; display: block;">
                                    <h4 class="block-title">Standard: $6,95</h4>
                                        <div class="text-widget">
                                            <div class="description">
                                                <p>Deliveries are made Monday – Friday. We aim to have your products delivered to you within seven (7) working days, Saturday delivery may be possible, but this varies by country.</p>

                                                <p>A signature is required for any packages over one hundred Dollars ($100) in value</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                </label>
                                <label class="checkbox-entry radio">
                                    <input type="radio" name="custom-name" /> <span class="check"></span>
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
                                <div class="clear" style="margin-bottom: 20px"></div>
                                <div class="button style-10">Continue to billing<input type="submit" value="" /></div>
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
                                        <input class="simple-field" type="text" placeholder="Card Number (required)" required value="" />
                                        <div class="clear"></div>
                                    </div>

                                    <div class="col-sm-3">
                                        <label>MM/YY <span>*</span></label>
                                        <input class="simple-field" type="text" placeholder="MM/YY (required)" required value="" />
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>CVC <span>*</span></label>
                                        <input class="simple-field" type="text" placeholder="CVC (required)" required value="" />
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                </div>
                                <h3 class="block-title main-heading">Billing Address</h3>

                                        <div class="accordeon">
                                            <div class="accordeon-title">
                                                <label class="checkbox-entry">
                                                    <input type="checkbox" /> <span class="check"></span>
                                                    <div class="pull-right" style="width:95%; display: block;">
                                                        Use shipping address
                                                    </div>
                                                    <div class="clear"></div>
                                                </label>
                                            </div>
                                            <div style="display: block;" class="accordeon-entry">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label>First Name <span>*</span></label>
                                                        <input class="simple-field" type="text" placeholder="First Name (required)" required value="" />
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Last Name <span>*</span></label>
                                                        <input class="simple-field" type="text" placeholder="Last Name (required)" required value="" />
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label>Street Address <span>*</span></label>
                                                        <input class="simple-field" type="text" placeholder="Street address (required)" required value="" />
                                                        <label>Apartment/Suite </label>
                                                        <input class="simple-field" type="text" placeholder="Apartment/Suite" value="" />
                                                        <label>City <span>*</span></label>
                                                        <input class="simple-field" type="text" placeholder="City (required)" required value="" />
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>State <span>*</span></label>
                                                        <div class="simple-drop-down simple-field">
                                                            <select>
                                                                <option>United States</option>
                                                                <option>Great Britain</option>
                                                                <option>Canada</option>
                                                            </select>
                                                        </div>
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label>Zip code <span>*</span></label>
                                                        <input class="simple-field" type="text" placeholder="Zip code (required)" required value="" />
                                                        <div class="clear"></div>
                                                    </div>

                                                    <div class="col-sm-12">
                                                        <label>Phone <span>*</span></label>
                                                        <input class="simple-field" type="tel" placeholder="Phone (required)" required value="" />
                                                        <div class="clear"></div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="button style-10">Continue to delivery<input type="submit" value="" /></div>
                                                    </div>
                                                    {{--<div class="col-sm-6">
                                                        <label>Your Country</label>
                                                        <div class="simple-drop-down simple-field">
                                                            <select>
                                                                <option>United States</option>
                                                                <option>Great Britain</option>
                                                                <option>Canada</option>
                                                            </select>
                                                        </div>
                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>

                                 

                                <div class="clear" style="margin-bottom: 20px"></div>
                                <div class="button style-10">Preview order<input type="submit" value="" /></div>
                                <div class="text-widget">
                                    <div class="description">
                                        <p>You will not be charged until you confirm your order</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tabs-entry">
                            <div class="article-container style-1">
                                <div class="row">
                                    <div class="col-md-6 information-entry">
                                        <h4>RETURNS POLICY</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.</p>
                                        <ul>
                                            <li>Any Product types that You want - Simple, Configurable</li>
                                            <li>Downloadable/Digital Products, Virtual Products</li>
                                            <li>Inventory Management with Backordered items</li>
                                            <li>Customer Personal Products - upload text for embroidery, monogramming</li>
                                            <li>Create Store-specific attributes on the fly</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6 information-entry">
                                        <h4>SHIPPING</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                                        <ul>
                                            <li>Any Product types that You want - Simple, Configurable</li>
                                            <li>Downloadable/Digital Products, Virtual Products</li>
                                            <li>Inventory Management with Backordered items</li>
                                            <li>Customer Personal Products - upload text for embroidery, monogramming</li>
                                            <li>Create Store-specific attributes on the fly</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                    <div class="col-sm-3 information-entry">
                        <h3 class="cart-column-title size-1" style="text-align: center;">Subtotal</h3>
                        <div class="sidebar-subtotal">
                            <div class="price-data">
                                @inject('total', 'App\Services\CartService')

                                <div class="main">${{ $total->get_total_cart() }}</div>
                                <div class="title">Excluding tax &amp; shipping</div>
                                <div class="subtitle">ORDERS WILL BE PROCESSED IN USD</div>
                            </div>
                            <div class="additional-data">
                                <div class="title"> Items Ordered <a class="continue-link pull-right" href="/cart">Edit</a></div>

                                {{--<textarea class="simple-field size-1"></textarea>
                                <a class="button style-10">Checkout</a>--}}
                                <div class="cart-box checkout">
                                    @include ('partials._cartItems')
                                    {{--@include ('partials.cart')--}}
                                </div>
                            </div>
                        </div>
                        <div class="block-title size-1">Get shipping estimates</div>
                        <form>
                            <label>Country</label>
                            <div class="simple-drop-down simple-field size-1">
                                <select>
                                    <option>United States</option>
                                    <option>Great Britain</option>
                                    <option>Canada</option>
                                </select>
                            </div>
                            <label>State</label>
                            <div class="simple-drop-down simple-field size-1">
                                <select>
                                    <option>Alabama</option>
                                    <option>Alaska</option>
                                    <option>Idaho</option>
                                </select>
                            </div>
                            <label>Zip Code</label>
                            <input type="text" value="" placeholder="Zip Code" class="simple-field size-1">
                            <div class="button style-16" style="display: block; margin-top: 10px;">calculate shipping<input type="submit"/></div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="information-blocks">
                @include ('partials._base')

            </div>
        </div>
    </div>




@stop