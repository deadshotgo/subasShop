@extends('layouts.admin_layouts')
@section('title','create-page')
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
    <script src="/admin/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
@endsection
@section('custom_css')
    <!-- Bootstrap Colorpicker -->
    <link href="/admin/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="/admin/vendors/cropper/dist/cropper.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="/admin/build/css/custom.min.css" rel="stylesheet">
    <link href="/styles/prod.css" rel="stylesheet">
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


            </div>
        <div class="col-sm-12">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <form method="POST" action="{{route('/save-images')}}">
                            @csrf
                            <input value="{{$prod->id}}" name="prod_id" hidden>
                            <div class="form-group row">
                                 <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Добавити картинку <span class="required">*</span></label>
                            <div class="col-md-4 col-sm-6 ">
                                <input type="text" class="form-control col" id="feature_image" name="feature_image" value="" readonly>
                            </div>
                                <a href=""  class="popup_selector btn btn-primary " data-inputid="feature_image">Select Image</a>
                                 <button class="btn btn-success" type="submit">Зберегти</button>
                            </div>
                        </form>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            @foreach($images as $img)
                            <div class="col-md-55">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; height: 100%; display: block;" src="/{{$img->path}}" alt="image">
                                        <div class="mask">
                                            <p>Your id {{$img->id}}</p>


                                                <form
                                                    action="{{route('/delete-images',$img->id)}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="color: white; font-size: 16px" class=" btn  delete-btn" type="submit">Видалити</button>
                                                </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <!-- new tab-->
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <form method="POST" action="{{route('/save-color')}}">
                            @csrf
                            <input value="{{$prod->id}}" name="prod_id" hidden>
                            <div class="form-group row">

                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Добавити колір <span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6  ">
                                    <div class="input-group demo2 colorpicker-element">
                                        <input type="text" name="color" value="#e01ab5" class="form-control">
                                        <span class="input-group-addon"><i></i></span>
                                    </div>
                                </div>
                                   <button class="btn btn-success" type="submit">Зберегти</button>
                            </div>
                        </form>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="row">
                            @foreach($colors as $color)
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                        <div class="image view view-first">
                                            <div style="background-color: {{$color->color}}; width: 100%; height: 100%"></div>
                                            <div class="mask">
                                                <p>Your id {{$color->id}}</p>
                                                <form
                                                    action="{{route('/delete-color',$color->id)}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="color: white; font-size: 16px" class=" btn  delete-btn" type="submit">Видалити</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>create by WebAbssent
        </div>

        </div>
    </div>
@endsection





