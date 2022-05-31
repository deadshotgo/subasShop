@extends('layouts.admin_layouts')
@section('title','Home')
@section('content')

    @section('custom_css')

        <!-- Custom Theme Style -->
        <link href="/admin/build/css/custom.min.css" rel="stylesheet">
        <link href="/admin/colorbox-master/example1/colorbox.css" rel="stylesheet">
    @endsection
    @section('custom_js')
        <!-- jQuery Smart Wizard -->
        <script type="text/javascript" src="/packages/barryvdh/elfinder/js/standalonepopup.js"></script>
        <script type="text/javascript" src="/admin/colorbox-master/jquery.colorbox-min.js"></script>
        <script src="/admin/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <script src="https://cdn.tiny.cloud/1/ndfyu8qqunhfne0kdbhbwe2woikwbhaqt96iv07x71ssa3ge/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: 'textarea',
                plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
                toolbar_mode: 'floating',
                file_picker_callback : elFinderBrowser
            });
        </script>
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
    <!-- page content -->
    <div class="right_col" role="main">
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
        <div class="">

            <div class="clearfix"></div>

            <div class="row right">

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Додати продукт <small>до категорії: {{$category->title}}</small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <form id="wizard" class="form_wizard wizard_horizontal" action="{{route('Product.store')}}" method="POST">
                               @csrf
                                <ul class="wizard_steps">
                                    <li>
                                        <a href="#step-1">
                                            <span class="step_no">1</span>
                                            <span class="step_descr">
                                              Крок 1<br />
                                              <small>Головна інформація</small>
                                          </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-2">
                                            <span class="step_no">2</span>
                                            <span class="step_descr">
                                              Крок 2<br />
                                              <small>Опис продукту</small>
                                          </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-3">
                                            <span class="step_no">3</span>
                                            <span class="step_descr">
                                              Крок 3<br />
                                              <small>Додаткова інформація</small>
                                          </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#step-4">
                                            <span class="step_no">4</span>
                                            <span class="step_descr">
                                              Крок  4<br />
                                              <small>Збереження/Продовження</small>
                                          </span>
                                        </a>
                                    </li>
                                </ul>
                                <div id="step-1">

                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Назва
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="first-name" name="title" required="required" class="form-control  ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Кількість/шт.
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="last-name" name="QTY" required="required" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ціна </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input id="middle-name" class="form-control col" type="text" name="price">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Під категорія <span class="required">*</span> </label>
                                            <div class="col-md-6 col-sm-6 ">
                                            <select class="select2_single form-control" name="sub_category_id" tabindex="-1">
                                                <option></option>
                                                @foreach($sub_category as $sub_category)
                                                <option value="{{$sub_category->id}}">{{$sub_category->title}}</option>
                                                @endforeach

                                            </select>
                                                    <a style="color: #00aeef" href="{{route('/sub_cat_create',$category->id)}}"><i class="fa fa-plus-square-o"></i> Добавити підкатегорію</a>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="middle-name"  class="col-form-label col-md-3 col-sm-3 label-align">Бренд <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select class="select2_single form-control" name="brand_id" tabindex="-1">
                                                    <option></option>
                                                    @foreach($brand as $brand)
                                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                    @endforeach
                                                </select>
                                                <a style="color: #00aeef" href="{{route('Brand.create')}}"><i class="fa fa-plus-square-o"></i> Добавити бренд</a>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Операційна система <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <select class="select2_single form-control" name="system_id" tabindex="-1">
                                                    <option></option>
                                                    @foreach($system as $system)
                                                        <option value="{{$system->id}}">{{$system->title}}</option>
                                                    @endforeach
                                                </select>
                                                <a style="color: #00aeef" href="{{route('System.create')}}"><i class="fa fa-plus-square-o"></i> Добавити систему</a></div>
                                        </div>
                                    <div class="form-group row">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Головна картинка <span class="required">*</span></label>
                                        <div class="col-md-4 col-sm-6 ">
                                            <input type="text" class="form-control col" id="feature_image" name="feature_image" value="" readonly>
                                        </div>
                                        <a href=""  class="popup_selector btn btn-primary " data-inputid="feature_image">Select Image</a>


                                    </div>
                                    <img style="display: block; width: 300px;" class="imgUploaded">
                                        <input name="category_id" value="{{$category->id}}" hidden>




                                </div>
                                            <div id="step-2">
                                              <textarea name="description"></textarea>
                                          </div>
                                             <div id="step-3">
                                          <textarea name="information"></textarea>
                                             </div>

                                       <div id="step-4">
                                             <h2 class="StepTitle">Крок 4</h2>
                                             <p>
                                        Натисніть на кнопку "finish", після чого продукт буде збережено.<BR> Вас
                                        перенаправить на сторінку де Ви будете мати змогу продовжити добавляти інші поля до продукта,і
                                        а саме картинки та кольори, після цього Вам буде доступно набори мета-данних.
                                        <strong >Ці данні не обов'язкові і Ви можите їх пропустити</strong>.
                                             </p>
                                         </div>

                        </form>
                            </div>

                            <!-- End SmartWizard Content -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection


