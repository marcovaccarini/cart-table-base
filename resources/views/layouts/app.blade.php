<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui"/>
    <link href="/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/css/idangerous.swiper.css" rel="stylesheet" type="text/css" />
    <link href="/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700%7CDancing+Script%7CMontserrat:400,700%7CMerriweather:400,300italic%7CLato:400,700,900' rel='stylesheet' type='text/css' />
    <link href="/css/style.css" rel="stylesheet" type="text/css" />
    <!--[if IE 9]>
    <link href="/css/ie9.css" rel="stylesheet" type="text/css" />
    <![endif]-->
    {{--TODO change the favicon--}}
    <link rel="shortcut icon" href="//img/favicon-4.ico" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>

    <meta name="description" content="@yield('metadescription')">

    <meta property="og:title" content="@yield('og_title')">
    <meta property="og:description" content="@yield('og_description')">
    <meta property="og:site_name" content="{{ config('app.name', 'Laravel') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="@yield('og_url')">
    <meta property="fb:app_id" content="{{ config('app.fb_app_id') }}" >

    <!-- Styles -->


    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="style-14" style="background: #fafafa;">
<!-- LOADER -->
<div id="loader-wrapper">
    <div class="bubbles">
        <div class="title">loading</div>
        <span></span>
        <span id="bubble2"></span>
        <span id="bubble3"></span>
    </div>
</div>
<div id="content-block">
    <!-- HEADER -->
    {{--TODO: change the heigth of the header--}}
    <div class="position-center">
        <div class="header-wrapper style-5">
            <header class="type-2">
                <div class="navigation-vertical-align">
                    <div class="cell-view logo-container">
                        {{--TODO: change the logo in white--}}
                        <a id="logo" href="#"><img src="/img/logo.svg" alt="" /></a>
                    </div>
                    <div class="cell-view nav-container">
                        <div class="navigation">
                            <div class="navigation-header responsive-menu-toggle-class">
                                <div class="title">Navigation</div>
                                <div class="close-menu"></div>
                            </div>
                            <div class="nav-overflow">
                                <nav>
                                    <ul>
                                        <li class="full-width">
                                            <a href="#" class="active">Home</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <div class="full-width-menu-items-right">
                                                    <div class="menu-slider-arrows">
                                                        <a class="left"><i class="fa fa-chevron-left"></i></a>
                                                        <a class="right"><i class="fa fa-chevron-right"></i></a>
                                                    </div>
                                                    <div class="submenu-list-title"><a href="#">Reccomended Products</a><span class="toggle-list-button"></span></div>
                                                    <div class="menu-slider-out">
                                                        <div class="menu-slider-in">
                                                            <div class="menu-slider-entry">
                                                                <div class="product-slide-entry">
                                                                    <div class="product-image">
                                                                        <img src="/img/product-minimal-1.jpg" alt="" />
                                                                        <div class="bottom-line left-attached">
                                                                            <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#" class="title">1.Pullover Batwing Sleeve Zigzag</a>
                                                                    <div class="price">
                                                                        <div class="prev">$199,99</div>
                                                                        <div class="current">$119,99</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="menu-slider-entry">
                                                                <div class="product-slide-entry">
                                                                    <div class="product-image">
                                                                        <img src="/img/product-minimal-2.jpg" alt="" />
                                                                        <div class="bottom-line left-attached">
                                                                            <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#" class="title">2.Pullover Batwing Sleeve Zigzag</a>
                                                                    <div class="price">
                                                                        <div class="prev">$199,99</div>
                                                                        <div class="current">$119,99</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="menu-slider-entry">
                                                                <div class="product-slide-entry">
                                                                    <div class="product-image">
                                                                        <img src="/img/product-minimal-3.jpg" alt="" />
                                                                        <div class="bottom-line left-attached">
                                                                            <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#" class="title">3.Pullover Batwing Sleeve Zigzag</a>
                                                                    <div class="price">
                                                                        <div class="prev">$199,99</div>
                                                                        <div class="current">$119,99</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="menu-slider-entry">
                                                                <div class="product-slide-entry">
                                                                    <div class="product-image">
                                                                        <img src="/img/product-minimal-4.jpg" alt="" />
                                                                        <div class="bottom-line left-attached">
                                                                            <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#" class="title">4.Pullover Batwing Sleeve Zigzag</a>
                                                                    <div class="price">
                                                                        <div class="prev">$199,99</div>
                                                                        <div class="current">$119,99</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="menu-slider-entry">
                                                                <div class="product-slide-entry">
                                                                    <div class="product-image">
                                                                        <img src="/img/product-minimal-5.jpg" alt="" />
                                                                        <div class="bottom-line left-attached">
                                                                            <a class="bottom-line-a square"><i class="fa fa-shopping-cart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-heart"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-retweet"></i></a>
                                                                            <a class="bottom-line-a square"><i class="fa fa-expand"></i></a>
                                                                        </div>
                                                                    </div>
                                                                    <a href="#" class="title">5.Pullover Batwing Sleeve Zigzag</a>
                                                                    <div class="price">
                                                                        <div class="prev">$199,99</div>
                                                                        <div class="current">$119,99</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="full-width-menu-items-left">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="submenu-list-title"><a href="index-wide.html">Homepages <span class="menu-label blue">new</span></a><span class="toggle-list-button"></span></div>
                                                            <ul class="list-type-1 toggle-list-container">
                                                                <li><a href="index-wide.html"><i class="fa fa-angle-right"></i>Mango - Wide Header</a></li>
                                                                <li><a href="index-electronic.html"><i class="fa fa-angle-right"></i>Mango - Electronic</a></li>
                                                                <li><a href="index-everything.html"><i class="fa fa-angle-right"></i>Mango - Everything</a></li>
                                                                <li><a href="index-fullwidthheader.html"><i class="fa fa-angle-right"></i>Mango - Fullwidth Header</a></li>
                                                                <li><a href="index-food.html"><i class="fa fa-angle-right"></i>Mango - Food</a></li>
                                                                <li><a href="index-underwear.html"><i class="fa fa-angle-right"></i>Mango - Underwear</a></li>
                                                                <li><a href="index-bags.html"><i class="fa fa-angle-right"></i>Mango - Bags</a></li>
                                                                <li><a href="index-fullwidth-noslider.html"><i class="fa fa-angle-right"></i>Mango - Fullwidth No Slider</a></li>
                                                                <li><a href="index-lookbook.html"><i class="fa fa-angle-right"></i>Mango - Lookbook</a></li>
                                                                <li><a href="index-wine-left.html"><i class="fa fa-angle-right"></i>Mango - Wine</a></li>
                                                                <li><a href="index-fullwidth.html"><i class="fa fa-angle-right"></i>Mango - Fullwidth</a></li>
                                                                <li><a href="index-fullwidth-left.html"><i class="fa fa-angle-right"></i>Mango - Fullwidth Left Sidebar</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="submenu-list-title"><a href="index-wide.html">Homepages <span class="menu-label blue">new</span></a><span class="toggle-list-button"></span></div>
                                                            <ul class="list-type-1 toggle-list-container">
                                                                <li><a href="index-parallax.html"><i class="fa fa-angle-right"></i>Mango - Parallax</a></li>
                                                                <li><a href="index-grid.html"><i class="fa fa-angle-right"></i>Mango - Grid Light</a></li>
                                                                <li><a href="index-leftsidebar.html"><i class="fa fa-angle-right"></i>Mango - Grid Left Sidebar</a></li>
                                                                <li><a href="index-minimal.html"><i class="fa fa-angle-right"></i>Mango - Minimal</a></li>
                                                                <li><a href="index-toys.html"><i class="fa fa-angle-right"></i>Mango - Toys</a></li>
                                                                <li><a href="index-furniture.html"><i class="fa fa-angle-right"></i>Mango - Furniture</a></li>
                                                                <li><a href="index-jewellery.html"><i class="fa fa-angle-right"></i>Mango - Jewellery</a></li>
                                                                <li><a href="index-mini.html"><i class="fa fa-angle-right"></i>Mango - Mini</a></li>
                                                                <li><a href="index-presentation.html"><i class="fa fa-angle-right"></i>Mango - Presentation</a></li>
                                                                <li><a href="index-parallax-fullwidth.html"><i class="fa fa-angle-right"></i>Mango - Parallax Fullwidth</a></li>
                                                                <li><a href="index-parallax-boxed.html"><i class="fa fa-angle-right"></i>Mango - Parallax Boxed</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submenu-links-line">
                                                    <div class="submenu-links-line-container">
                                                        <div class="cell-view">
                                                            <div class="line-links"><b>Quicklinks:</b>  <a href="#">Blazers</a>, <a href="#">Jackets</a>, <a href="#">Shoes</a>, <a href="#">Bags</a>, <a href="#">Special offers</a>, <a href="#">Sales and discounts</a></div>
                                                        </div>
                                                        <div class="cell-view">
                                                            <div class="red-message"><b>-20% sale only this week. Don’t miss buy something!</b></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="full-width-columns">
                                            <a href="#">Pages</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <div class="product-column-entry">
                                                    <div class="image"><img alt="" src="/img/product-menu-2.jpg"></div>
                                                    <div class="submenu-list-title"><a href="contact.html">Contact Us</a><span class="toggle-list-button"></span></div>
                                                    <div class="description toggle-list-container">
                                                        <ul class="list-type-1">
                                                            <li><a href="contact.html"><i class="fa fa-angle-right"></i>Contact Us 1</a></li>
                                                            <li><a href="contact-2.html"><i class="fa fa-angle-right"></i>Contact Us 2</a></li>
                                                            <li><a href="contact-3.html"><i class="fa fa-angle-right"></i>Contact Us 3</a></li>
                                                            <li><a href="contact-4.html"><i class="fa fa-angle-right"></i>Contact Us 4</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="hot-mark">hot</div>
                                                </div>
                                                <div class="product-column-entry">
                                                    <div class="image"><img alt="" src="/img/product-menu-4.jpg"></div>
                                                    <div class="submenu-list-title"><a href="about-1.html">About Us</a><span class="toggle-list-button"></span></div>
                                                    <div class="description toggle-list-container">
                                                        <ul class="list-type-1">
                                                            <li><a href="about-1.html"><i class="fa fa-angle-right"></i>About Us Fullwidth 1</a></li>
                                                            <li><a href="about-2.html"><i class="fa fa-angle-right"></i>About Us Fullwidth 2</a></li>
                                                            <li><a href="about-3.html"><i class="fa fa-angle-right"></i>About Us Fullwidth 3</a></li>
                                                            <li><a href="about-4.html"><i class="fa fa-angle-right"></i>About Us Sidebar 1</a></li>
                                                            <li><a href="about-5.html"><i class="fa fa-angle-right"></i>About Us Sidebar 2</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="hot-mark yellow">sale</div>
                                                </div>
                                                <div class="product-column-entry">
                                                    <div class="image"><img alt="" src="/img/product-menu-3.jpg"></div>
                                                    <div class="submenu-list-title"><a href="cart.html">Cart</a><span class="toggle-list-button"></span></div>
                                                    <div class="description toggle-list-container">
                                                        <ul class="list-type-1">
                                                            <li><a href="cart.html"><i class="fa fa-angle-right"></i>Cart</a></li>
                                                            <li><a href="cart-traditional.html"><i class="fa fa-angle-right"></i>Cart Traditional</a></li>
                                                            <li><a href="checkout.html"><i class="fa fa-angle-right"></i>Checkout</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="product-column-entry">
                                                    <div class="image"><img alt="" src="/img/product-menu-5.jpg"></div>
                                                    <div class="submenu-list-title"><a href="teaser-background.html">Coming Soon</a><span class="toggle-list-button"></span></div>
                                                    <div class="description toggle-list-container">
                                                        <ul class="list-type-1">
                                                            <li><a href="teaser-background.html"><i class="fa fa-angle-right"></i>Coming Soon 1</a></li>
                                                            <li><a href="teaser-background-2.html"><i class="fa fa-angle-right"></i>Coming Soon 2</a></li>
                                                            <li><a href="teaser-simple.html"><i class="fa fa-angle-right"></i>Coming Soon 3</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="hot-mark">hot</div>
                                                </div>
                                                <div class="product-column-entry">
                                                    <div class="image"><img alt="" src="/img/product-menu-2.jpg"></div>
                                                    <div class="submenu-list-title"><a href="shop.html">Products</a><span class="toggle-list-button"></span></div>
                                                    <div class="description toggle-list-container">
                                                        <ul class="list-type-1">
                                                            <li><a href="shop.html"><i class="fa fa-angle-right"></i>Shop</a></li>
                                                            <li><a href="product.html"><i class="fa fa-angle-right"></i>Product</a></li>
                                                            <li><a href="product-nosidebar.html"><i class="fa fa-angle-right"></i>No Sidebar</a></li>
                                                            <li><a href="product-tabnosidebar.html"><i class="fa fa-angle-right"></i>Tab No Sidebar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="submenu-links-line">
                                                    <div class="submenu-links-line-container">
                                                        <div class="cell-view">
                                                            <div class="line-links"><b>Quicklinks:</b>  <a href="shop.html">Blazers</a>, <a href="shop.html">Jackets</a>, <a href="shop.html">Shoes</a>, <a href="shop.html">Bags</a>, <a href="shop.html">Special offers</a>, <a href="shop.html">Sales and discounts</a></div>
                                                        </div>
                                                        <div class="cell-view">
                                                            <div class="red-message"><b>-20% sale only this week. Don’t miss buy something!</b></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="simple-list">
                                            <a href="shop.html">Products</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <ul class="simple-menu-list-column">
                                                    <li><a href="shop.html"><i class="fa fa-angle-right"></i>Shop</a></li>
                                                    <li><a href="product.html"><i class="fa fa-angle-right"></i>Product</a></li>
                                                    <li><a href="product-nosidebar.html"><i class="fa fa-angle-right"></i>No Sidebar</a></li>
                                                    <li><a href="product-tabnosidebar.html"><i class="fa fa-angle-right"></i>Tab No Sidebar</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="column-1">
                                            <a href="portfolio-default.html">Portfolio</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <div class="full-width-menu-items-left">
                                                    <img class="submenu-background" src="/img/product-menu-7.jpg" alt="" />
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="submenu-list-title"><a href="portfolio-default.html">Our Portfolio</a><span class="toggle-list-button"></span></div>
                                                            <ul class="list-type-1 toggle-list-container">
                                                                <li><a href="portfolio-default.html"><i class="fa fa-angle-right"></i>Portfolio Default</a></li>
                                                                <li><a href="portfolio-simple.html"><i class="fa fa-angle-right"></i>Portfolio Simple</a></li>
                                                                <li><a href="portfolio-custom.html"><i class="fa fa-angle-right"></i>Portfolio Custom</a></li>
                                                                <li><a href="portfolio-customfullwidth.html"><i class="fa fa-angle-right"></i>Fullwidth Custom</a></li>
                                                                <li><a href="portfolio-simplefullwidth.html"><i class="fa fa-angle-right"></i>Fullwidth Simple</a></li>
                                                                <li><a href="project-default.html"><i class="fa fa-angle-right"></i>Project Default</a></li>
                                                                <li><a href="project-fullwidth.html"><i class="fa fa-angle-right"></i>Project Fullwidth</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submenu-links-line">
                                                    <div class="submenu-links-line-container">
                                                        <div class="cell-view">
                                                            <div class="line-links"><b>Quicklinks:</b>  <a href="shop.html">Blazers</a>, <a href="shop.html">Jackets</a>, <a href="shop.html">Shoes</a>, <a href="shop.html">Bags</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="column-1">
                                            <a href="blog.html">Blog</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <div class="full-width-menu-items-left">
                                                    <img class="submenu-background" src="/img/product-menu-8.jpg" alt="" />
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="submenu-list-title"><a href="blog.html">Blog <span class="menu-label blue">new</span></a><span class="toggle-list-button"></span></div>
                                                            <ul class="list-type-1 toggle-list-container">
                                                                <li><a href="blog.html"><i class="fa fa-angle-right"></i>Blog Default</a></li>
                                                                <li><a href="blog-grid.html"><i class="fa fa-angle-right"></i>Blog Grid</a></li>
                                                                <li><a href="blog-timeline.html"><i class="fa fa-angle-right"></i>Blog Timeline</a></li>
                                                                <li><a href="blog-list.html"><i class="fa fa-angle-right"></i>Blog List</a></li>
                                                                <li><a href="blog-biggrid.html"><i class="fa fa-angle-right"></i>Blog Big Grid</a></li>
                                                                <li><a href="blog-detail.html"><i class="fa fa-angle-right"></i>Single Post</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="submenu-links-line">
                                                    <div class="submenu-links-line-container">
                                                        <div class="cell-view">
                                                            <div class="line-links"><b>Quicklinks:</b>  <a href="shop.html">Blazers</a>, <a href="shop.html">Jackets</a>, <a href="shop.html">Shoes</a>, <a href="shop.html">Bags</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="simple-list">
                                            <a>More</a><i class="fa fa-chevron-down"></i>
                                            <div class="submenu">
                                                <ul class="simple-menu-list-column">
                                                    <li><a href="login.html"><i class="fa fa-angle-right"></i>Login</a></li>
                                                    <li><a href="error.html"><i class="fa fa-angle-right"></i>Error</a></li>
                                                    <li><a href="faq.html"><i class="fa fa-angle-right"></i>Faq</a></li>
                                                    <li><a href="compare.html"><i class="fa fa-angle-right"></i>Compare</a></li>
                                                    <li><a href="wishlist.html"><i class="fa fa-angle-right"></i>Wishlist</a></li>
                                                    <li><a href="shortcodes.html"><i class="fa fa-angle-right"></i>Shortcodes</a></li>
                                                    <li><a href="elements-headers.html"><i class="fa fa-angle-right"></i>Elements - Headers</a></li>
                                                    <li><a href="elements-footers.html"><i class="fa fa-angle-right"></i>Elements - Footers</a></li>
                                                    <li><a href="elements-breadcrumbs.html"><i class="fa fa-angle-right"></i>Elements - Breadcrumbs</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="fixed-header-visible">
                                            <a class="fixed-header-square-button open-search-popup"><i class="fa fa-search"></i></a>
                                            <a class="fixed-header-square-button"><i class="fa fa-heart-o"></i><span id="wishlist"> (2) </span></a>
                                            <a class="fixed-header-square-button open-cart-popup"><i class="fa fa-shopping-cart"></i>
                                                @inject('count_items', 'App\Services\CartService')
                                                <span id="cart_qty">
                                                    ({{ $count_items->get_total_qty_cart() }})
                                                </span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="clear"></div>

                                    <a class="fixed-header-visible additional-header-logo"><img src="/img/logo.svg" alt=""/></a>
                                </nav>
                                <div class="navigation-footer responsive-menu-toggle-class">
                                    <div class="socials-box">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-youtube"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                                        <div class="clear"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="responsive-menu-toggle-class">
                            <a href="#" class="header-functionality-entry menu-button"><i class="fa fa-reorder"></i></a>
                            <a href="#" class="header-functionality-entry open-cart-popup"><i class="fa fa-shopping-cart"></i></a>
                            <a href="#" class="header-functionality-entry open-search-popup"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
                <div class="close-header-layer"></div>
            </header>
            <div class="clear"></div>
        </div>
    </div>
    <div class="content-push">



        @yield('content')




        <!-- FOOTER -->
            <div class="footer-wrapper style-5">
                <footer class="type-2">
                    <div class="position-center">
                        <img class="footer-logo" src="/img/logo.svg" alt="" />
                        <div class="footer-links">
                            <a href="#">Site Map</a>
                            <a href="#">Search</a>
                            <a href="#">Terms</a>
                            <a href="#">Advanced Search</a>
                            <a href="#">Orders and Returns</a>
                            <a href="#">Contact Us</a>
                        </div>

                    </div>
                </footer>
            </div>
    </div>
</div>






<!-- MODAL FOR SEARCH BOX -->
<div class="search-box popup">
    <form>
        <div class="search-button">
            <i class="fa fa-search"></i>
            <input type="submit" />
        </div>
        <div class="search-drop-down">
            <div class="title"><span>All categories</span><i class="fa fa-angle-down"></i></div>
            <div class="list">
                <div class="overflow">
                    <div class="category-entry">Category 1</div>
                    <div class="category-entry">Category 2</div>
                    <div class="category-entry">Category 2</div>
                    <div class="category-entry">Category 4</div>
                    <div class="category-entry">Category 5</div>
                    <div class="category-entry">Lorem</div>
                    <div class="category-entry">Ipsum</div>
                    <div class="category-entry">Dollor</div>
                    <div class="category-entry">Sit Amet</div>
                </div>
            </div>
        </div>
        <div class="search-field">
            <input type="text" value="" placeholder="Search for product" />
        </div>
    </form>
</div>

<!-- MODAL FOR CART -->
<div class="cart-box popup">

    @include ('partials.cart')

</div>

<!-- MODAL FOR PRODUCT -->




<div id="product-popup" class="overlay-popup">

    <div class="overflow" id="ResponseDiv">
        <div class="table-view">
            <div class="cell-view">
                <div class="close-layer"></div>
                <div class="popup-container">
                    <div id="loader-wrapper" style="display: none; text-align: center;">
                        <div class="bubbles">
                            <div class="title">loading</div>
                            <span></span>
                            <span id="bubble2"></span>
                            <span id="bubble3"></span>
                        </div>
                    </div>

                    <div id="dynamic-content">
                        <div class="row">
                        <div class="col-sm-6 information-entry">
                            <div class="product-preview-box">
                                <div class="swiper-container product-preview-swiper" style="height: 765px;" data-autoplay="0" data-loop="1" data-speed="500" data-center="0" data-slides-per-view="1">
                                    <div class="swiper-wrapper" id="main-swiper">
                                        {{--<div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="/img/product-main-1.jpg" alt="" data-zoom="/img/zoom/zoom-product-minimal-1.jpg" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="/img/product-main-2.jpg" alt="" data-zoom="/img/zoom/zoom-product-minimal-2.jpg" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="/img/product-main-3.jpg" alt="" data-zoom="/img/zoom/zoom-product-minimal-3.jpg" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-zoom-image">
                                                <img src="/img/product-main-4.jpg" alt="" data-zoom="/img/zoom/zoom-product-minimal-4.jpg" />
                                            </div>
                                        </div>--}}
                                    </div>
                                    <div class="pagination"></div>
                                    <div class="product-zoom-container">
                                        <div class="move-box">
                                            <img class="default-image" src="/img/product-main-1.jpg" alt="" />
                                            <img class="zoomed-image" src="/img/zoom/zoom-product-minimal-1.jpg" alt="" />
                                        </div>
                                        <div class="zoom-area"></div>
                                    </div>
                                </div>
                                <div class="swiper-hidden-edges">
                                    <div class="swiper-container product-thumbnails-swiper" data-autoplay="0" data-loop="0" data-speed="500" data-center="0" data-slides-per-view="responsive" data-xs-slides="3" data-int-slides="3" data-sm-slides="3" data-md-slides="4" data-lg-slides="4" data-add-slides="4">
                                        <div class="swiper-wrapper" id="thumbnail-swiper">
                                            {{--<div class="swiper-slide selected">
                                                <div class="paddings-container">
                                                    <img src="/img/product-main-1.jpg" alt="" />
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="paddings-container">
                                                    <img src="/img/product-main-2.jpg" alt="" />
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="paddings-container">
                                                    <img src="/img/product-main-3.jpg" alt="" />
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="paddings-container">
                                                    <img src="/img/product-main-4.jpg" alt="" />
                                                </div>
                                            </div>--}}
                                        </div>
                                        <div class="pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 information-entry">
                            <div class="product-detail-box">
                                <h1 class="product-title" id="product_name"></h1>
                                <h3 class="product-subtitle" id="specification"></h3>
                                <div class="product-description detail-info-entry" id="description"> </div>
                                <div class="price detail-info-entry" id="price">
                                    <div class="prev"></div>
                                    <div class="current"></div>
                                </div>
                                <form novalidate="" method="post">

                                    <input type="hidden" id="product_id" name="product_id" value="" />
                                    <div class="size-selector detail-info-entry" id="sizes">
                                        <div class="detail-info-entry-title">Size</div>
                                        {{--<div class="entry" active> </div>--}}
                                    </div>
                                    <div class="message-box message-danger" id="size-error" style="display:none;">
                                        {{--<div class="message-icon"><i class="fa fa-times"></i></div>--}}
                                        <div class="message-text text-center"><b> Please select a size! </b></div>
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
                                        <div class="entry number" id="qty">1</div>
                                        <div class="entry number-add">&nbsp;</div>

                                        {{--<select name="qty" style="width: 100%;">--}}
                                    </div>
                                    <div class="detail-info-entry">
                                        <a class="button style-10 btn-add-to-cart"><i class="fa fa-sho"></i> Add to bag</a>
                                        <a class="button style-11"><i class="fa fa-heart"></i> Add to Wishlist</a>
                                        <div class="clear"></div>
                                    </div>
                                </form>
                                <div class="tags-selector detail-info-entry" id="tags">
                                    <div class="detail-info-entry-title">Tags:</div>
                                    {{--<a href="#">bootstrap</a> /--}}

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="close-popup"></div>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- Scripts -->

<script src="/js/app.js"></script>



<script src="/js/jquery-2.1.3.min.js"></script>

<script src="/js/idangerous.swiper.min.js"></script>
<script src="/js/global.js"></script>

<!-- custom scrollbar -->
<script src="/js/jquery.mousewheel.js"></script>
<script src="/js/jquery.jscrollpane.min.js"></script>


</body>
</html>