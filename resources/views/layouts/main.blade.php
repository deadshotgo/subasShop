<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.png">

    <!-- All CSS Files -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- Nivo-slider css -->
    <link rel="stylesheet" href="/lib/css/nivo-slider.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="/css/responsive.css">
    <!-- Template color css -->
    <link href="/css/color/color-core.css" data-style="styles" rel="stylesheet">
    <!-- User style -->
    <link rel="stylesheet" href="/css/custom.css">

    <!-- Modernizr JS -->
    <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Body main wrapper start -->
<div class="wrapper">

    <!-- START HEADER AREA -->
    <header class="header-area header-wrapper">
        <!-- header-top-bar -->
        <div class="header-top-bar plr-185">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 hidden-xs">
                        <div class="call-us">
                            <p class="mb-0 roboto">(+88) 01234-567890</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="top-link clearfix">

                            <ul class="link f-right">
                                <li>

                                    <a href="{{route('/admin-home')}}">
                                        <i class="zmdi zmdi-account"></i>
                                        My Account
                                    </a>


                                </li>
                                <li>
                                    <a href="wishlist.html">
                                        <i class="zmdi zmdi-favorite"></i>
                                        Wish List (0)
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('login')}}">
                                        <i class="zmdi zmdi-lock"></i>
                                        Login
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-middle-area -->
        <div class="header-middle-area plr-185">
            <div class="container-fluid">
                <div class="full-width-mega-dropdown">
                    <div class="row">
                        <!-- logo -->
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="/img/logo/logo.png" alt="main logo">
                                </a>
                            </div>
                        </div>
                        <!-- primary-menu -->
                        <div class="col-md-8 hidden-sm hidden-xs">
                            <nav id="primary-menu">
                                <ul class="main-menu text-center">
                                    <li>
                                        <a href="{{route('/')}}">Home</a>
                                    </li>
                                    <li class="mega-parent"><a href="{{route('/shop')}}">Products</a>
                                        <div class="mega-menu-area clearfix">
                                            <div class="mega-menu-link f-left">
                                                @foreach($categories as $category)
                                                    <?php $sub_categories = \App\Models\Subcategory::query()->select(['id', 'title'])->where('category_id', $category->id)->get() ?>
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title">{{$category->title}}</li>
                                                        @foreach($sub_categories as $sub_category)
                                                            <li>

                                                                <a href="{{route('/sort-by-category',$sub_category->id)}}">{{$sub_category->title}}</a>

                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endforeach
                                            </div>
                                            <div class="mega-menu-photo f-left">
                                                <a href="#">
                                                    <img src="img/mega-menu/1.jpg" alt="mega menu image">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{route('/blog')}}">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{route('/about')}}">About us</a>
                                    </li>
                                    <li>
                                        <a href="{{route('/contact')}}">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- header-search & total-cart -->
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="search-top-cart  f-right">
                                <!-- header-search -->
                                <div class="header-search f-left">
                                    <div class="header-search-inner">
                                        <button class="search-toggle">
                                            <i class="zmdi zmdi-search"></i>
                                        </button>
                                        <form action="{{'Product.index'}}" method="get">
                                            <div class="top-search-box">
                                                <input type="text" placeholder="Search here your product...">
                                                <button type="submit">
                                                    <i class="zmdi zmdi-search"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- total-cart -->
                                <div class="total-cart f-left">
                                    <div class="total-cart-in">
                                        <div class="cart-toggler">
                                            <a href="#">
                                                <span class="cart-quantity">02</span><br>
                                                <span class="cart-icon">
                                                        <i class="zmdi zmdi-shopping-cart-plus"></i>
                                                    </span>
                                            </a>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="top-cart-inner your-cart">
                                                    <h5 class="text-capitalize">Your Cart</h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="total-cart-pro">
                                                    <!-- single-cart -->
                                                    <div class="single-cart clearfix">
                                                        <div class="cart-img f-left">
                                                            <a href="#">
                                                                <img src="img/cart/1.jpg" alt="Cart Product"/>
                                                            </a>
                                                            <div class="del-icon">
                                                                <a href="#">
                                                                    <i class="zmdi zmdi-close"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="cart-info f-left">
                                                            <h6 class="text-capitalize">
                                                                <a href="#">Dummy Product Name</a>
                                                            </h6>
                                                            <p>
                                                                <span>Brand <strong>:</strong></span>Brand Name
                                                            </p>
                                                            <p>
                                                                <span>Model <strong>:</strong></span>Grand s2
                                                            </p>
                                                            <p>
                                                                <span>Color <strong>:</strong></span>Black, White
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!-- single-cart -->
                                                    <div class="single-cart clearfix">
                                                        <div class="cart-img f-left">
                                                            <a href="#">
                                                                <img src="img/cart/1.jpg" alt="Cart Product"/>
                                                            </a>
                                                            <div class="del-icon">
                                                                <a href="#">
                                                                    <i class="zmdi zmdi-close"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="cart-info f-left">
                                                            <h6 class="text-capitalize">
                                                                <a href="#">Dummy Product Name</a>
                                                            </h6>
                                                            <p>
                                                                <span>Brand <strong>:</strong></span>Brand Name
                                                            </p>
                                                            <p>
                                                                <span>Model <strong>:</strong></span>Grand s2
                                                            </p>
                                                            <p>
                                                                <span>Color <strong>:</strong></span>Black, White
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="top-cart-inner subtotal">
                                                    <h4 class="text-uppercase g-font-2">
                                                        Total =
                                                        <span>$ 500.00</span>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="top-cart-inner view-cart">
                                                    <h4 class="text-uppercase">
                                                        <a href="#">View cart</a>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="top-cart-inner check-out">
                                                    <h4 class="text-uppercase">
                                                        <a href="#">Check out</a>
                                                    </h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER AREA -->
    <!-- START MOBILE MENU AREA -->
    <div class="mobile-menu-area hidden-lg hidden-md">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li>
                                    <a href="{{route('/')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{route('/shop')}}">Products</a>
                                </li>
                                <li>
                                    <a href="{{route('/blog')}}">Blog</a>
                                </li>
                                <li>
                                    <a href="{{route('/about')}}">About Us</a>
                                </li>
                                <li>
                                    <a href="{{route('/contact')}}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MOBILE MENU AREA -->
    <div id="quickview-wrapper">
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div id="modal-content" class="modal-content">
                    <!-- modal windows include ajax.modalProduct -->
                </div>
            </div>
        </div>
    </div>
    @yield('content')


    <footer id="footer" class="footer-area">
        <div class="footer-top">
            <div class="container-fluid">
                <div class="plr-185">
                    <div class="footer-top-inner theme-bg">
                        <div class="row">
                            <div class="col-lg-4 col-md-5 col-sm-4">
                                <div class="single-footer footer-about">
                                    <div class="footer-logo">
                                        <img src="img/logo/logo.png" alt="">
                                    </div>
                                    <div class="footer-brief">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the subas industry's standard dummy text ever since the
                                            1500s,</p>
                                        <p>When an unknown printer took a galley of type and If you are going to use a
                                            passage of Lorem Ipsum scrambled it to make.</p>
                                    </div>
                                    <ul class="footer-social">
                                        <li>
                                            <a class="facebook" href="" title="Facebook"><i
                                                    class="zmdi zmdi-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a class="google-plus" href="" title="Google Plus"><i
                                                    class="zmdi zmdi-google-plus"></i></a>
                                        </li>
                                        <li>
                                            <a class="twitter" href="" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a class="rss" href="" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 hidden-md hidden-sm">
                                <div class="single-footer">
                                    <h4 class="footer-title border-left">Shipping</h4>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle"></i><span>New Products</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i
                                                    class="zmdi zmdi-circle"></i><span>Discount Products</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle"></i><span>Best Sell Products</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i
                                                    class="zmdi zmdi-circle"></i><span>Popular Products</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle"></i><span>Manufactirers</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle"></i><span>Suppliers</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i
                                                    class="zmdi zmdi-circle"></i><span>Special Products</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3 col-sm-4">
                                <div class="single-footer">
                                    <h4 class="footer-title border-left">my account</h4>
                                    <ul class="footer-menu">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle"></i><span>My Account</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle"></i><span>My Wishlist</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle"></i><span>My Cart</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle"></i><span>Sign In</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle"></i><span>Registration</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle"></i><span>Check out</span></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-circle"></i><span>Oder Complete</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="single-footer">
                                    <h4 class="footer-title border-left">Get in touch</h4>
                                    <div class="footer-message">
                                        <form action="#">
                                            <input type="text" name="name" placeholder="Your name here...">
                                            <input type="text" name="email" placeholder="Your email here...">
                                            <textarea class="height-80" name="message"
                                                      placeholder="Your messege here..."></textarea>
                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit">submit
                                                message
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom black-bg">
            <div class="container-fluid">
                <div class="plr-185">
                    <div class="copyright">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="copyright-text">
                                    <p>&copy; <a href="https://themeforest.net/user/codecarnival/portfolio"
                                                 target="_blank">CodeCarnival</a> 2016. All Rights Reserved.</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <ul class="footer-payment text-right">
                                    <li>
                                        <a href="#"><img src="img/payment/1.jpg" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/payment/2.jpg" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/payment/3.jpg" alt=""></a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="img/payment/4.jpg" alt=""></a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER AREA -->

    <!-- START QUICKVIEW PRODUCT -->

    <!-- END QUICKVIEW PRODUCT -->

</div>
<!-- Body main wrapper end -->


<!-- Placed JS at the end of the document so the pages load faster -->

<!-- jquery latest version -->
<script src="/js/vendor/jquery-3.1.1.min.js"></script>
<!-- Bootstrap framework js -->
<script src="/js/bootstrap.min.js"></script>
<!-- jquery.nivo.slider js -->
<script src="/lib/js/jquery.nivo.slider.js"></script>
<!-- All js plugins included in this file. -->
<script src="/js/plugins.js"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="/js/main.js"></script>
<script>

    $('.product-modal').click(function () {
        let id = $(this).attr('data-order');
        $.ajax({
            type: 'GET',
            url: '{{route("/shop-modal")}}',
            data: {
                id: id,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },

            success: function (html) {
                $('#modal-content').html(html)

            }
        });

    })
</script>
@yield('section_js')
</body>

</html>
