
@extends('layouts.admin_layouts')
@section('title','Home')
@section('content')

    @section('custom_css')
        <link href="/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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

    @endsection
    <div class="right_col" role="main">
        <div class="row" style="display: inline-block;">
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
            <div class="row right">
            <div class="table-responsive">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Додати продукт <small>по категорії</small></h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content" style="display: block;">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">

                                        <table id="datatable" class="table table-striped table-bordered dataTable no-footer dtr-inline" style="width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 101px;"
                                                    aria-label="Name: activate to sort column ascending">Назва
                                                </th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 105px;"
                                                    aria-label="Position: activate to sort column ascending"
                                                    aria-sort="descending">Статус
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 74px;"
                                                    aria-label="Office: activate to sort column ascending">Підкатегорії
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 30px;"
                                                    aria-label="Age: activate to sort column ascending">Кількість товарів
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 99px;"
                                                    aria-label="Start date: activate to sort column ascending">Дата створення

                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 85px;"
                                                    aria-label="Salary: activate to sort column ascending">Загальна сума
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                         rowspan="1" colspan="1" style="width: 115px;"
                                                         aria-label="Salary: activate to sort column ascending">Додати
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $category)
                                                <?php $product = \App\Models\Subcategory::where('category_id', $category->id)->count();?>

                                                <tr role="row" class="@if($loop->index % 2 == 0 )odd @else even @endif">
                                                    <td class="" tabindex="0">{{$category->title}}</td>
                                                    <td class="sorting_1">@if($category->show == 0) Приховано
                                                        @else Відображено  @endif</td>
                                                    <td><a href="{{route('SubCategory.show',$category->id)}}"
                                                           style="cursor: pointer;color: #0e90d2"><?= $product ?></a></td>
                                                    <td>302</td>
                                                    <td>{{$category->created_at}}</td>
                                                    <td>$145,000</td>
                                                    <td><a class="btn btn-primary btn-sm "  href="{{route('/create-prod',$category->id)}}">Додати продукт</a></td>
                                                </tr>
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

