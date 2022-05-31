@extends('layouts.admin_layouts')
@section('title','create-page')
@section('custom_js')
    <script src="/admin/admi.js"></script>
@endsection
@section('custom_css')
    <link href="/styles/prod.css" rel="stylesheet">
@endsection
@section('content')

    <div role="main" class="right_col  ">
        <div class="">

            <div>
                @if(session('danger'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4>{{session('danger')}}</h4>
                    </div>
                @endif
            </div>
            <div>
                @if(session('message'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        <h4><i class="icon fa fa-check"></i>{{session('message')}}</h4>
                    </div>
                @endif
            </div>

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Детально про: {{$product->title}}</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="dropdown">
                                    <a style="color: #00aeef" href="{{route('Product.edit',$product->id)}}"><i class="fa fa-plus-square-o"></i> Редагувати</a>

                                </li>
                                <li class="dropdown">
                                    <a style="color: #00aeef" href="{{route('/prod-images',$product->id)}}"><i class="fa fa-plus-square-o"></i> Картинки/кольори</a>

                                </li>

                            </ul>
                            <div class="clearfix"></div>

                        </div>
                        <div class="x_content">

                            <div class="col-md-7 col-sm-7 ">
                                <div class="col-sm-6">
                                <div class="product-image">

                                    <img style="width: 100%; height: 100%" src="/{{$product->images}}" alt="...">

                                </div>
                                <div class="product_gallery">
                                    @foreach($imgProd as $image)
                                    <a>
                                        <img src="/{{$image->path}}" alt="...">
                                    </a>
                                    @endforeach
                                </div>

                            </div>
                            </div>

                            <div class="col-md-5 col-sm-5 " style="border:0px solid #e5e5e5;">

                                <h3 class="prod_title">{{$product->title}}</h3>

                                <p>{{$product->description}}</p>
                                <br>

                                <div class="">
                                    <h2>Кольори</h2>
                                    <ul class="list-inline prod_color display-layout">
                                       @foreach($colorProd as $color)
                                        <li>
                                            <div style="background-color: {{$color->color}}" class="color bg "></div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <br>

                                <div class="">
                                    <h2>Детальна інформація</h2>
                                    <ul class="list-inline prod_size">
                                        @if($product->brand != null)
                                            <li>
                                                Бренд

                                                <button type="button" class="btn btn-default btn-xs">{{$product->brand->name}}</button>

                                            </li>
                                        @endif
                                            @if($product->system != null)
                                        <li>

                                            Операційна система
                                            <button type="button" class="btn btn-default btn-xs">{{$product->system->title}}</button>
                                        </li>
                                            @endif
                                            @if($product->subcategory != null)
                                        <li>
                                            Підкатегорія
                                            <button type="button" class="btn btn-default btn-xs">{{$product->subcategory->title}}</button>
                                        </li>
                                            @endif
                                            @if($product->category != null)
                                        <li>
                                            Категорія
                                            <button type="button" class="btn btn-default btn-xs">{{$product->category->title}}</button>
                                        </li>
                                            @endif
                                     </ul>
                                </div>
                                <br>

                                <div class="">
                                    <div class="product_price">
                                        <h1 class="price">Ціна: {{$product->price}} грн</h1>

                                    </div>
                                </div>

                            </div>


                            <div class="col-md-12">

                                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Детальна інформація</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        {{$product->information}}
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>develop by webAbssent




        </div>
    </div>
@endsection




