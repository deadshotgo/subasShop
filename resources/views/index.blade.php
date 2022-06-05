@extends('layouts.main')
@section('title','home-page')
@section('content')

    <!-- START SLIDER AREA -->
    <div style="background-image: url('images/bg/home.jpg') ;"
         class="slider-area bg-3 bg-opacity-black-60 ptb-150 mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider-desc-3 slider-desc-4  text-center">
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                            <h1 class="slider2-title-2 cd-headline clip is-full-width">
                                <span>New brand</span>
                                <span class="cd-words-wrapper">
                                        <b class="is-visible">Samsung</b>
                                    @foreach($brandCours as $brand)
                                        <b>{{$brand->name}}</b>
                                    @endforeach
                                    </span>
                            </h1>
                        </div>
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                            <h2 class="slider2-title-3">Samsung grand 6</h2>
                        </div>
                        <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.5s">
                            <a href="#" class="button extra-small button-white">
                                <span class="text-uppercase">Buy now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SLIDER AREA -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">

        <!-- UP COMMING PRODUCT SECTION START -->

        <!-- UP COMMING PRODUCT SECTION END -->

        <!-- BY BRAND SECTION START-->
        <div class="by-brand-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-left ">
                            <h2 class="uppercase">By Brands</h2>
                            <h6 class="mb-40">There are many variations of passages of brands available,</h6>
                        </div>
                    </div>
                </div>
                <div class="by-brand-product">
                    <div class="row active-by-brand slick-arrow-2">
                        <!-- single-brand-product start -->
                        @foreach($brandCours as $brand)
@if($brand->images)
                            <div class="col-xs-12">
                                <div class="single-brand-product">
                                    <a><img  style="height: 200px" src="{{$brand->images}}" alt=""></a>
                                    <h3 class="brand-title text-gray">
                                        <a href="#">{{$brand->name}}</a>
                                    </h3>
                                </div>
                            </div>
@endif
                        @endforeach
                        <!-- single-brand-product end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- BY BRAND SECTION END -->

        <!-- FEATURED PRODUCT SECTION START -->
        <div class="featured-product-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-left mb-40">
                            <h2 class="uppercase">Featured product</h2>
                            <h6>There are many variations of passages of brands available,</h6>
                        </div>
                    </div>
                </div>
                <div class="featured-product">
                    <div class="row active-featured-product slick-arrow-2">
                        <!-- product-item start -->
                        @foreach($randProducts as $randProduct)
                            <div class="col-xs-12">
                                <div class="product-item">
                                    <div class="product-img">
                                        <a href="single-product.html">
                                            <img style="width: 270px; height: 300px" src="/{{$randProduct->images}}"
                                                 alt=""/>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <h6 class="product-title">
                                            <a href="{{route('/det-prod/',$randProduct->id)}}">{{$randProduct->title}}</a>
                                        </h6>
                                        <div class="pro-rating">
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                            <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                        </div>
                                        <h3 class="pro-price">@if($randProduct->new_price != null){{$randProduct->new_price}} грн @else {{$randProduct->price}} грн@endif </h3>
                                        <ul class="action-button">
                                            <li>
                                                <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                            </li>
                                            <li>
                                                <a  class="product-modal" data-order="{{$randProduct->id}}" data-toggle="modal"
                                                    data-target="#productModal" title="Quickview"><i
                                                        class="zmdi zmdi-zoom-in"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" title="Add to cart"><i
                                                        class="zmdi zmdi-shopping-cart-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- product-item end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- FEATURED PRODUCT SECTION END -->

        <!-- PRODUCT TAB SECTION START -->
        <div class="product-tab-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="section-title text-left mb-40">
                            <h2 class="uppercase">product list</h2>
                            <h6>There are many variations of passages of brands available,</h6>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="pro-tab-menu text-right">
                            <!-- Nav tabs -->
                            <ul class="">
                                <li class="active"><a href="#popular-product" data-toggle="tab">Останні товари </a></li>
                                <li><a href="#new-arrival" data-toggle="tab">Акційні товари</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="product-tab">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- popular-product start -->
                        <div class="tab-pane active" id="popular-product">
                            <div class="row">
                                <!-- product-item start -->
                                @foreach($oldproducts as $oldproduct)
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="single-product.html">
                                                    <img style="width: 270px; height: 300px"
                                                         src="/{{$oldproduct->images}}" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                    <a href="{{route('/det-prod/',$oldproduct->id)}}">{{$oldproduct->title}}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </div>
                                                <h3 class="pro-price">@if($oldproduct->new_price != null){{$oldproduct->new_price}} грн @else {{$oldproduct->price}} грн@endif</h3>
                                                <ul class="action-button">
                                                    <li>
                                                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                    </li>
                                                    <li>
                                                        <a  class="product-modal" data-order="{{$oldproduct->id}}" data-toggle="modal"
                                                            data-target="#productModal" title="Quickview"><i
                                                                class="zmdi zmdi-zoom-in"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Compare"><i
                                                                class="zmdi zmdi-refresh"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Add to cart"><i
                                                                class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- popular-product end -->
                        <!-- new-arrival start -->
                        <div class="tab-pane" id="new-arrival">
                            <div class="row">
                                @foreach($newProducts as $newProduct)
                                    @if($newProduct->new_price)
                                        <!-- product-item start -->
                                        <div class="col-md-3 col-sm-4 col-xs-12">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <a href="single-product.html">
                                                        <img style="width: 270px; height: 300px"
                                                             src="/{{$newProduct->images}}" alt=""/>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <h6 class="product-title">
                                                        <a href="{{route('/det-prod/',$newProduct->id)}}">{{$newProduct->title}}</a>
                                                    </h6>
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                    </div>
                                                    <h3 class="pro-price">{{$newProduct->new_price}} грн</h3>
                                                    <ul class="action-button">
                                                        <li>
                                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                        </li>
                                                        <li>
                                                            <a  class="product-modal" data-order="{{$newProduct->id}}" data-toggle="modal"
                                                                data-target="#productModal" title="Quickview"><i
                                                                    class="zmdi zmdi-zoom-in"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Compare"><i
                                                                    class="zmdi zmdi-refresh"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="Add to cart"><i
                                                                    class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- product-item end -->

                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!-- special-offer end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- PRODUCT TAB SECTION END -->

        <!-- BLOG SECTION START -->
        <div class="blog-section mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-left mb-40">
                            <h2 class="uppercase">Latest blog</h2>
                            <h6>There are many variations of passages of brands available,</h6>
                        </div>
                    </div>
                </div>
                <div class="blog">
                    <div class="row active-blog">
                        <!-- blog-item start -->
                        <div class="col-xs-12">
                            <div class="blog-item">
                                <img src="img/blog/1.jpg" alt="">
                                <div class="blog-desc">
                                    <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                    <p>There are many variations of passages of psum available, but the majority have
                                        suffered alterat on in some form, by injected humour, randomis words which don't
                                        look even slightly.</p>
                                    <div class="read-more">
                                        <a href="single-blog.html">Read more</a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- blog-item end -->
                        <!-- blog-item start -->
                        <div class="col-xs-12">
                            <div class="blog-item">
                                <img src="img/blog/2.jpg" alt="">
                                <div class="blog-desc">
                                    <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                    <p>There are many variations of passages of psum available, but the majority have
                                        suffered alterat on in some form, by injected humour, randomis words which don't
                                        look even slightly.</p>
                                    <div class="read-more">
                                        <a href="single-blog.html">Read more</a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- blog-item end -->
                        <!-- blog-item start -->
                        <div class="col-xs-12">
                            <div class="blog-item">
                                <img src="img/blog/3.jpg" alt="">
                                <div class="blog-desc">
                                    <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                    <p>There are many variations of passages of psum available, but the majority have
                                        suffered alterat on in some form, by injected humour, randomis words which don't
                                        look even slightly.</p>
                                    <div class="read-more">
                                        <a href="single-blog.html">Read more</a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- blog-item end -->
                        <!-- blog-item start -->
                        <div class="col-xs-12">
                            <div class="blog-item">
                                <img src="img/blog/1.jpg" alt="">
                                <div class="blog-desc">
                                    <h5 class="blog-title"><a href="single-blog.html">dummy Blog name</a></h5>
                                    <p>There are many variations of passages of psum available, but the majority have
                                        suffered alterat on in some form, by injected humour, randomis words which don't
                                        look even slightly.</p>
                                    <div class="read-more">
                                        <a href="single-blog.html">Read more</a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-favorite"></i>89 Like</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-comments"></i>59 Comments</a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="zmdi zmdi-share"></i>29 Share</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- blog-item end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- BLOG SECTION END -->
    </section>
    <!-- End page content -->
@endsection
