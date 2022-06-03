@extends('layouts.main')
@section('title','shop-pag1e')
@section('section_js')
    <script>
        $(document).ready(function () {
            $('.sort-product-btn').click(function () {
                let positionParameters = location.pathname.indexOf('?')
                const orderby = $(this).data('order')
                let url = location.pathname.substring(positionParameters,location.pathname.length);
                let newURL = url + '?';
                newURL += 'orderBy=' + orderby;
                history.pushState({},'',newURL);
                $.ajax({
                    url: '{{route("/sort-by-category",$id)}}',
                    type:"GET",
                    data: {
                        orderBy: orderby,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (data) {
                        $('#table').html(data)
                    },



                });

            })
            $('.sort-product-btn').click(function () {

            })
        })
    </script>
@endsection
@section('content')

    <!-- BREADCRUMBS SETCTION START -->
    <div class="breadcrumbs-section plr-200 mb-80">
        <div class="breadcrumbs overlay-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="breadcrumbs-inner">
                            <h1 class="breadcrumbs-title">product grid view</h1>
                            <ul class="breadcrumb-list">
                                <li><a href="index.html">Home</a></li>
                                <li>product grid view</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMBS SETCTION END -->

    <!-- Start page content -->
    <div id="page-content" class="page-wrapper">

        <!-- SHOP SECTION START -->
        <div class="shop-section mb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-push-3 col-sm-12">
                        <div class="shop-content">
                            <!-- shop-option start -->
                            <div class="shop-option box-shadow mb-30 clearfix">
                                <!-- Nav tabs -->
                                <ul class="shop-tab f-left" role="tablist">
                                    <li class="active">
                                        <a href="#grid-view" data-toggle="tab"><i class="zmdi zmdi-view-module"></i></a>
                                    </li>

                                </ul>
                                <!-- short-by -->
                                <div class="short-by f-left text-center">
                                    <span>Sort by :</span>
                                    <select>
                                        <option data-order="Default"  class="sort-product-btn" >Default</option>
                                        <option data-order="Name:A-Z" class="sort-product-btn" >Name: A-Z</option>
                                        <option data-order="Name:Z-A" class="sort-product-btn" >Name: Z-A</option>
                                        <option data-order="Price:Low-High" class="sort-product-btn" >Price: Low-High</option>
                                        <option data-order="Price:High-Low" class="sort-product-btn" >Price: High-Low</option>
                                    </select>
                                </div>
                                <!-- showing -->
                                <div class="showing f-right text-right">
                                    <span>Showing : 17</span>
                                </div>
                            </div>
                            <!-- shop-option end -->
                            <!-- Tab Content start -->
                            @include('partial.productView') <!-- Product show -->
                            <!-- Tab Content end -->
                            {{$products->withQueryString()->links()}}
                            <!-- shop-pagination end -->
                        </div>
                    </div>
                    <div class="col-md-3 col-md-pull-9 col-sm-12">
                        <!-- widget-search -->
                        @include('partial.sidebar')
                    </div>
                </div>
            </div>
        </div>
        <!-- SHOP SECTION END -->

    </div>
    <!-- End page content -->

@endsection
