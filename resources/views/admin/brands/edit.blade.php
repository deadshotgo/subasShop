@extends('layouts.admin_layouts')
@section('title','create-page')
@section('custom_js')
    <script src="/admin/admi.js"></script>
    <!-- jQuery Smart Wizard -->
    <script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>
    <script type="text/javascript" src="/admin/colorbox-master/jquery.colorbox-min.js"></script>
    <script src="/admin/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

    <script>
        function elFinderBrowser (callback, value, meta) {
            tinymce.activeEditor.windowManager.openUrl({
                title: 'File Manager',
                url: '/elfinder/tinymce5',
                /**
                 * On message will be triggered by the child window
                 *
                 * @param dialogApi
                 * @param details
                 * @see https://www.tiny.cloud/docs/ui-components/urldialog/#configurationoptions
                 */
                onMessage: function (dialogApi, details) {
                    if (details.mceAction === 'fileSelected') {
                        const file = details.data.file;

                        // Make file info
                        const info = file.name;

                        // Provide file and text for the link dialog
                        if (meta.filetype === 'file') {
                            callback(file.url, {text: info, title: info});
                        }

                        // Provide image and alt text for the image dialog
                        if (meta.filetype === 'image') {
                            callback(file.url, {alt: info});
                        }

                        // Provide alternative source and posted for the media dialog
                        if (meta.filetype === 'media') {
                            callback(file.url);
                        }

                        dialogApi.close();
                    }
                }
            });
        }
    </script>

@endsection
@section('custom_css')
    <link href="/styles/prod.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/admin/build/css/custom.min.css" rel="stylesheet">
    <link href="/admin/colorbox-master/example1/colorbox.css" rel="stylesheet">
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
                                              novalidate="" action="{{ route('Brand.update',$brand->id)}}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                       for="first-name">Назва <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="text" name="name" value="{{$brand->name}}" id="name" required="required"
                                                           class="form-control ">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                       for="last-name">Статус <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <select name="show"  class="form-control">
                                                        @if($brand->show == 1)
                                                            <option value="1">Відображати</option>
                                                            <option value="0">Приховати</option>
                                                        @else
                                                            <option value="0">Приховати</option>
                                                            <option value="1">Відображати</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Головна картинка <span class="required">*</span></label>
                                                <div class="col-md-4 col-sm-6 ">
                                                    <input type="text"  class="form-control col" id="feature_image" name="feature_image" value="{{$brand->images}}" readonly>
                                                </div>
                                                <a href=""  class="popup_selector btn btn-primary " data-inputid="feature_image">Select Image</a>


                                            </div>
                                            <img style="display: block; width: 300px;" class="imgUploaded">


                                            <div class="ln_solid"></div>
                                            <div class="item form-group right">
                                                <div class="col-md-12 col-sm-12 ">

                                                    <button class="btn btn-danger" type="reset">Скинути</button>
                                                    <button  class="btn btn-primary" type="submit">Зберегти</button>

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
                                                    <input type="text" name="title_m" value="{{$brand->title_m}}" id="name" required="required"
                                                           class="form-control ">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                       for="first-name">Description <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <textarea class="form-control" name="description_m" >{{$brand->description_n}}</textarea>
                                                </div>
                                            </div>
                                            <div class="ln_solid"></div>
                                            <div class="item form-group ">
                                                <div class="col-md-12 col-sm-12 ">
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





