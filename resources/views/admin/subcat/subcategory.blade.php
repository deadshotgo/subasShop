@extends('layouts.admin_layouts')
@section('title','Home')
@section('content')

@section('custom_css')
    <link href="/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/admin/build/css/custom.min.css" rel="stylesheet">
@endsection
@section('custom_js')
    <!-- Datatables -->
    <script src="/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/admin/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="/admin/vendors/iCheck/icheck.min.js"></script>
    <!-- Custom Theme Scripts -->

@endsection
<div class="right_col">
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
    <div class="table-responsive">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Категорія: {{$cat_name->title}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li class="dropdown">
                            <a style="color: #00aeef" href="{{route('/sub_cat_create',$cat_name->id)}}"><i
                                    class="fa fa-plus-square-o"></i> Додати</a>

                        </li>

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content" style="display: block;">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="row">
                                <div class="col-sm-12">

                                    <table id="datatable" class="table table-striped table-bordered dataTable no-footer"
                                           style="width: 100%;" role="grid" aria-describedby="datatable_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 5px;" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">№ID
                                            </th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 44px;" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">Назва
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 53px;"
                                                aria-label="Position: activate to sort column ascending">Кількість
                                                товарів/шт
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 40px;"
                                                aria-label="Office: activate to sort column ascending">Загальна сума
                                                товарів/грн
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 25px;"
                                                aria-label="Age: activate to sort column ascending">Дата створеня
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 46px;"
                                                aria-label="Start date: activate to sort column ascending">Видалити
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                                colspan="1" style="width: 46px;"
                                                aria-label="Salary: activate to sort column ascending">Редагувати
                                            </th>
                                        </tr>
                                        </thead>


                                        <tbody>
                                        @foreach($subCats as $subCat)
                                            <?php $product = \App\Models\Product::where('subcategory_id', $subCat->id)->count();?>
                                            @if($loop->index % 2 == 0 )
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$subCat->id}}</td>
                                                    <td class="sorting_1">{{$subCat->title}}</td>
                                                    <td><?= $product ?></td>
                                                    <td>10000 грн</td>
                                                    <td>{{$subCat->created_at}}</td>
                                                    <td>
                                                        <form
                                                            action="{{route('SubCategory.destroy',$subCat->id)}}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm delete-btn"
                                                                    type="submit">Видалити
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td><a class="btn btn-primary btn-sm "
                                                           href="{{route('SubCategory.edit',$subCat->id)}}">Редагувати</a>
                                                    </td>
                                                </tr>
                                                </tr>

                                                </tr>
                                            @else
                                                <tr role="row" class="even">
                                                    <td class="sorting_1">{{$subCat->id}}</td>
                                                    <td class="sorting_1">{{$subCat->title}}</td>
                                                    <td><?= $product ?></td>
                                                    <td>10000 грн</td>
                                                    <td>{{$subCat->created_at}}</td>
                                                    <td>
                                                        <form
                                                            action="{{route('SubCategory.destroy',$subCat->id)}}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm delete-btn"
                                                                    type="submit">Видалити
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td><a class="btn btn-primary btn-sm "
                                                           href="{{route('SubCategory.edit',$subCat->id)}}">Редагувати</a>
                                                    </td>
                                                </tr>

                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

