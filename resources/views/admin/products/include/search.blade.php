
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

            <div class="col-12 col-sm-12 ">
                <div class="table-responsive">

                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Продукти <small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="dropdown">

                                </li>
                            </ul>
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
                                                    rowspan="1" colspan="1" style="width: 111px;"
                                                    aria-label="Name: activate to sort column ascending">Назва
                                                </th>


                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 100px;"
                                                    aria-label="Age: activate to sort column ascending">Операційна система
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 69px;"
                                                    aria-label="Start date: activate to sort column ascending">Бренд

                                                </th>
                                                <th class="sorting_desc" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 105px;"
                                                    aria-label="Position: activate to sort column ascending"
                                                    aria-sort="descending">Ціна
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 54px;"
                                                    aria-label="Office: activate to sort column ascending">Кількість/шт
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                    rowspan="1" colspan="1" style="width: 55px;"
                                                    aria-label="Salary: activate to sort column ascending">Видалити
                                                </th><th class="sorting" tabindex="0" aria-controls="datatable-buttons"
                                                         rowspan="1" colspan="1" style="width: 55px;"
                                                         aria-label="Salary: activate to sort column ascending">Реагувати
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)

                                                <tr role="row" class="odd">
                                                    <td class="" tabindex="0">{{$product->title}}</td>
                                                    @if($product->system != null)
                                                        <td>{{$product->system->title}}</td>
                                                    @else
                                                        <td> - </td>
                                                    @endif
                                                    @if($product->brand != null)
                                                        <td>{{$product->brand->name}}</td>
                                                    @else
                                                        <td> -</td>
                                                    @endif
                                                    @if($product->price != null)
                                                        <td>{{$product->price}}</td>
                                                    @else
                                                        <td> -</td>
                                                    @endif

                                                    @if($product->QTY == 0)<td style="background-color: red">{{$product->QTY}}</td>
                                                    @else <td>{{$product->QTY}}</td>
                                                    @endif
                                                    <td><form
                                                            action="{{route('Product.destroy',$product->id)}}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger btn-sm delete-btn" type="submit">Видалити</button>
                                                        </form></td>
                                                    <td><a class="btn btn-primary btn-sm "  href="{{route('Product.show', $product->id)}}" >Детально</a></td>
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
@endsection

