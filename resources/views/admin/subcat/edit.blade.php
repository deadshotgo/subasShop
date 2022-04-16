
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


        <div class="tab-content" id="myTabContent">


            <div class="tab-pane fade active show col-sm-8" id="home" role="tabpanel" aria-labelledby="home-tab">
                <form action="{{ route('SubCategory.update',$subCat->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div style="border-bottom: 3px #0f0f0f" class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Назва підкатегрії
                        </label>
                        <div class="col-md-8 col-sm-6 ">
                            <input  type="text" id="title" name="title" value="{{$subCat->title}}" required class="form-control textArea">
                        </div>
                    </div>
                    <hr>
                    <div style="border-bottom: 3px #0f0f0f" class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Meta title <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 ">
                            <input  type="text" id="title" name="title_m" value="{{$subCat->title_m}}"  class="form-control textArea">
                        </div>
                    </div>
                    <hr>
                    <div style="border-bottom: 3px #0f0f0f" class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Meta description <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 ">
                            <textarea class="form-control "name="description_m">{{$subCat->description_m}}</textarea>
                        </div>
                    </div>
                    <hr>
                    <div style="border-bottom: 3px #0f0f0f" class="item form-group">
                        <label class="col-form-label col-md-2 col-sm-2 label-align" for="first-name">Meta keyword <span class="required">*</span>
                        </label>
                        <div class="col-md-8 col-sm-6 ">
                            <textarea class="form-control "name="keyword_m">{{$subCat->keyword_m}}</textarea>
                        </div>
                    </div>
                    <div style="justify-content: center;"  class="item form-group mb-1">
                        <button type="submit" class="btn btn-primary ">Зберегти</button>
                </form>

            </div>
        </div>
    </div>
    </div>
@endsection



