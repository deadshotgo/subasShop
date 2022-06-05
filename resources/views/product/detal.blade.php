@extends('layouts.main')
@section('title','shop-page')
@section('content')

    <!-- BREADCRUMBS SETCTION START -->
    @include('partial.breadcrumbs')
    <!-- BREADCRUMBS SETCTION END -->

    <!-- Start page content -->
    <section id="page-content" class="page-wrapper">

        <!-- SHOP SECTION START -->
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-xs-12">
                        <!-- single-product-area start -->
                        <div class="single-product-area mb-80">
                            <div class="row">
                                <!-- imgs-zoom-area start -->
                                <div class="col-md-5 col-sm-5 col-xs-12">
                                    <div class="imgs-zoom-area">
                                        <img id="zoom_03" src="/{{$product->images}}"
                                             data-zoom-image="/{{$product->images}}" alt="">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                                    <div class="p-c">
                                                        <a href="#" data-image="/{{$product->images}}"
                                                           data-zoom-image="/{{$product->images}}">
                                                            <img class="zoom_03" src="/{{$product->images}}" alt="">
                                                        </a>
                                                    </div>
                                                    @foreach($images as $image)
                                                        <div class="p-c">
                                                            <a href="#" data-image="/{{$image->path}}"
                                                               data-zoom-image="/{{$image->path}}">
                                                                <img class="zoom_03" src="/{{$image->path}}" alt="">
                                                            </a>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- imgs-zoom-area end -->
                                <!-- single-product-info start -->
                                <div class="col-md-7 col-sm-7 col-xs-12">
                                    <div class="single-product-info">
                                        <h3 class="text-black-1">{{$product->title}} </h3>
                                        <h6 class="brand-name-2">{{$product->brand->name }}</h6>
                                        <!-- hr -->
                                        <hr>
                                        <!-- single-product-tab -->
                                        <div class="single-product-tab">
                                            <ul class="reviews-tab mb-20">
                                                <li class="active"><a href="#description"
                                                                      data-toggle="tab">description</a></li>
                                                <li><a href="#information" data-toggle="tab">information</a></li>
                                                <li><a href="#reviews" data-toggle="tab">reviews</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="description">
                                                    <p>{{$product->description}}</p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="information">
                                                    {{$product->information}}
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="reviews">
                                                    <!-- reviews-tab-desc -->
                                                    <div class="reviews-tab-desc">
                                                        <!-- single comments -->
                                                        <div class="media mt-30">
                                                            <div class="media-left">
                                                                <a href="#"><img class="media-object"
                                                                                 src="img/author/1.jpg" alt="#"></a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="clearfix">
                                                                    <div class="name-commenter pull-left">
                                                                        <h6 class="media-heading"><a href="#">Gerald
                                                                                Barnes</a></h6>
                                                                        <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <ul class="reply-delate">
                                                                            <li><a href="#">Reply</a></li>
                                                                            <li>/</li>
                                                                            <li><a href="#">Delate</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur
                                                                    adipiscing elit. Integer accumsan egestas .</p>
                                                            </div>
                                                        </div>
                                                        <!-- single comments -->
                                                        <div class="media mt-30">
                                                            <div class="media-left">
                                                                <a href="#"><img class="media-object"
                                                                                 src="img/author/2.jpg" alt="#"></a>
                                                            </div>
                                                            <div class="media-body">
                                                                <div class="clearfix">
                                                                    <div class="name-commenter pull-left">
                                                                        <h6 class="media-heading"><a href="#">Gerald
                                                                                Barnes</a></h6>
                                                                        <p class="mb-10">27 Jun, 2016 at 2:30pm</p>
                                                                    </div>
                                                                    <div class="pull-right">
                                                                        <ul class="reply-delate">
                                                                            <li><a href="#">Reply</a></li>
                                                                            <li>/</li>
                                                                            <li><a href="#">Delate</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur
                                                                    adipiscing elit. Integer accumsan egestas .</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  hr -->
                                        <hr>
                                        <!-- single-pro-color-rating -->
                                        <div class="single-pro-color-rating clearfix">
                                            <div class="sin-pro-color f-left">
                                                <p class="color-title f-left">Color</p>
                                                <div class="widget-color f-left">
                                                    <ul style="color: red">
                                                        @foreach($colors as $color)
                                                            <li style="color: #fc11ff"><a style="color: red" href="#"></a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="sin-plus-minus f-right clearfix">
                                                <p class="color-title f-left">Qty</p>
                                                <div class="cart-plus-minus f-left">
                                                    <input type="text" value="02" name="qtybutton"
                                                           class="cart-plus-minus-box">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- hr -->
                                        <hr>
                                        <!-- plus-minus-pro-action -->
                                        <div class="plus-minus-pro-action">

                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-info end -->
                            </div>
                        </div>
                        <!-- single-product-area end -->
                        <div class="related-product-area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="section-title text-left mb-40">
                                        <h2 class="uppercase">related product</h2>
                                        <h6>There are many variations of passages of brands available,</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="active-related-product">
                                    <!-- product-item start -->

                                    <!-- product-item end -->
                                    <!-- product-item start -->
                                    @foreach($related as $rel)
                                    <div class="col-xs-12">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="{{route('/det-prod/',$rel->id)}}">
                                                    <img src="/{{$rel->images}}" alt=""/>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                    <a href="{{route('/det-prod/',$rel->id)}}">{{$rel->title}}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </div>
                                                <h3 class="pro-price">@if($rel->new_price){{$rel->new_price}} грн@else{{$rel->price}} грн@endif</h3>
                                                <ul class="action-button">
                                                    <li>
                                                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                    </li>
                                                    <li>
                                                        <a  class="product-modal" data-order="{{$rel->id}}" data-toggle="modal"
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
                                    @endforeach
                                    <!-- product-item end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                    @include('partial.sidebar')
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->

    </section>
    <!-- End page content -->

@endsection
