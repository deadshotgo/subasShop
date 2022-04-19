@extends('layouts.admin_layouts')
@section('title','create-page')
@section('custom_js')
    <script src="/admin/admi.js"></script>
@endsection
@section('custom_css')
    <link href="/styles/prod.css" rel="stylesheet">
@endsection
@section('content')

    <div class="right_col">
        <div>
            @if(session('danger'))
                <div class="alert alert-danger" role="alert">
                    <button type="button"  class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4>{{session('danger')}}</h4>
                </div>
            @endif
        </div>
        <div>
            @if(session('message'))
                <div class="alert alert-success" role="alert">
                    <button type="button"  class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4><i class="icon fa fa-check"></i>{{session('message')}}</h4>
                </div>
            @endif
        </div>

        <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">

            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                   aria-selected="true">Основне</a>
            </li>
        </ul>
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
                                          novalidate="" action="{{route('Category.update',$category->id)}}" method="POST">
                                       @method('PUT')
                                        @csrf
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="first-name">Назва <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input  type="text" id="title" name="title" value="{{$category->title}}" required class="form-control textArea">

                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                   for="last-name">Статус <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select name="show" class="form-control">
                                                    @if($category->show == 1)
                                                        <option value="1">Відображати</option>
                                                        <option value="0">Приховати</option>
                                                    @else
                                                        <option value="0">Приховати</option>
                                                        <option value="1">Відображати</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="item form-group right">
                                            <div class="col-md-12 col-sm-12 ">
                                                <a href="{{route('Category.index')}}" class="btn btn-primary" >Назад</a>
                                                <button class="btn btn-danger" type="reset">Скинути</button>
                                                <button class="btn btn-primary" type="submit">Зберегти</button>
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
@endsection

