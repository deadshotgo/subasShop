
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
                file_picker_callback : elFinderBrowser,
                title: 'Вставка текста',
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

            <div class="clearfix"></div>

            <div class="row right">

                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Редагувати продукт <small>: {{$product->title}}</small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <form id="wizard" class="form_wizard wizard_horizontal" action="{{route('Product.update',$product->id)}}" method="POST">
                                @csrf
                                @method('PUT')
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
                                            <input type="text" value="{{$product->title}}" id="first-name" name="title" required="required" class="form-control  ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Кількість/шт.
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" id="last-name" value="{{$product->QTY}}" name="QTY" required="required" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Ціна </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="middle-name" value="{{$product->price}}" class="form-control col" type="text" name="price">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Нова ціна</label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input id="middle-name" class="form-control col" placeholder="не обовязково" value="{{$product->new_price}}" type="text" name="new_price">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Під категорія <span class="required">*</span> </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="select2_single form-control" name="sub_category_id" tabindex="-1">
                                                @if($product->subcategory != null)
                                                    <option value="{{$product->subcategory->id}}">
                                                        {{$product->subcategory->title}}
                                                    </option>

                                                @endif
                                                    <option></option>
                                                @foreach($sub_categories as $sub_category)
                                                    <option value="{{$sub_category->id}}">{{$sub_category->title}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="middle-name"  class="col-form-label col-md-3 col-sm-3 label-align">Бренд <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="select2_single form-control" name="brand_id" tabindex="-1">
                                                @if($product->brand != null)
                                                    <option value="{{$product->brand->id}}">
                                                        {{$product->brand->name}}
                                                    </option>

                                                @endif
                                                    <option></option>
                                                @foreach($brand as $brand)
                                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Операційна система <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <select class="select2_single form-control" name="system_id" tabindex="-1">
                                                @if($product->system != null)
                                                    <option value="{{$product->system->id}}">
                                                        {{$product->system->title}}
                                                    </option>
                                                @endif
                                                    <option></option>
                                                @foreach($system as $system)
                                                    <option value="{{$system->id}}">{{$system->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Головна картинка <span class="required">*</span></label>
                                        <div class="col-md-4 col-sm-6 ">
                                            <input type="text" class="form-control col" id="feature_image" name="feature_image" value="{{$product->images}}" readonly>
                                        </div>
                                        <a href=""  class="popup_selector btn btn-primary " data-inputid="feature_image">Select Image</a>


                                    </div>
                                    <img  style="display: block; width: 300px;" src="/{{$product->images}}" class="imgUploaded">

                                </div>
                                <div id="step-2">
                                    <textarea name="description">{{$product->description}}</textarea>
                                </div>
                                <div id="step-3">
                                    <textarea name="information">{{$product->information}}</textarea>
                                </div>

                                <div id="step-4">
                                    <h2 class="StepTitle">Крок 4</h2>
                                    <p>
                                        Натисніть на кнопку "finish", після чого продукт буде відредаговано.<BR> Вас
                                        перенаправить на сторінку де Ви будете мати змогу продовжити редагувати інші поля до продукта,і
                                        а саме картинки та кольори, після цього Вам буде доступно набори мета-данних.
                                        <strong >Ці данні не обов'язкові і Ви можите їх пропустити</strong>.
                                    </p>
                                    <input hidden value="{{$product->category_id}}" name="category_id">
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


