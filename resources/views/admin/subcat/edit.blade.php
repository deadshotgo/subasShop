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

                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                           aria-controls="home" aria-selected="true">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                           aria-controls="profile" aria-selected="false">Meta</a>
                    </li>
                </ul>
            </div>
            <div class="row right">
                <div class="col-md-10 col-sm-10 ">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Головне </h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br>
                                        <form id="demo-form2" data-parsley-validate=""
                                              class="form-horizontal form-label-left"
                                              novalidate="" action="{{ route('SubCategory.update',$subCat->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                       for="first-name">Назва <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="text" name="title" value="{{$subCat->title}}" id="name" required="required"
                                                           class="form-control ">
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="item form-group right">
                                                <div class="col-md-12 col-sm-12 ">
                                                    <button class="btn btn-danger" type="reset">Скинути</button>
                                                </div>
                                            </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="col-md-12 col-sm-12 ">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Meta-data </h2>

                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <br>
                                        <form id="demo-form2" data-parsley-validate=""
                                              class="form-horizontal form-label-left" novalidate="">

                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                       for="first-name">Title <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="text" name="title_m" value="{{$subCat->title_m}}" id="name" required="required"
                                                           class="form-control ">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                       for="first-name">Description <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <textarea class="form-control "name="description_m" value="" >{{$subCat->description_m}}</textarea>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                       for="first-name">Keyword <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <textarea class="form-control "name="keyword_m" value="" >{{$subCat->keyword_m}}</textarea>
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="item form-group ">
                                                <div class="col-md-12 col-sm-12 ">
                                                    <button  class="btn btn-primary" type="submit">Зберегти</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection




