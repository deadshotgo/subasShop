@extends('layouts.admin_layouts')
@section('title','Home')
@section('content')
    <div class="right_col" role="main">
        <div class="row" style="display: inline-block;">
            <div class=" top_tiles" style="margin: 10px 0;">
                <div class="col-md-3 col-sm-3  tile">
                    <span>Total Sessions</span>
                    <h2>231,809</h2>
                    <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
                </div>
                <div class="col-md-3 col-sm-3  tile">
                    <span>Total Revenue</span>
                    <h2>$ 231,809</h2>
                    <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
                </div>
                <div class="col-md-3 col-sm-3  tile">
                    <span>Total Sessions</span>
                    <h2>231,809</h2>
                    <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 125px;"></canvas>
                  </span>
                </div>
                <div class="col-md-3 col-sm-3  tile">
                    <span>Total Sessions</span>
                    <h2>231,809</h2>
                    <span class="sparkline_one" style="height: 160px;">
                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                  </span>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-6 col-sm-4 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>5 останіх коментарів</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="dashboard-widget-content">

                            <ul class="list-unstyled timeline widget">
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                            </h2>
                                            <div class="byline">
                                                <span>13 hours ago</span> by <a>Jane Smith</a>
                                            </div>
                                            <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                            </h2>
                                            <div class="byline">
                                                <span>13 hours ago</span> by <a>Jane Smith</a>
                                            </div>
                                            <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="block">
                                        <div class="block_content">
                                            <h2 class="title">
                                                <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                            </h2>
                                            <div class="byline">
                                                <span>13 hours ago</span> by <a>Jane Smith</a>
                                            </div>
                                            <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                            </p>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-6 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Аналітика продажів</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px none; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                        <canvas id="mybarChart" style="width: 488px; height: 244px;" width="488" height="244"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-8 col-sm-6  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Останні 5 замовлень</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Покупець</th>
                                <th>Стан</th>
                                <th>Дата</th>
                                <th>Сума</th>
                                <th>Дія</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">5</th>
                                <td>Олег</td>
                                <td>Завершено</td>
                                <td>2021-05-02</td>
                                <td>200 грн</td>
                                <td>Переглянути</td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td>Василь</td>
                                <td>Очікується</td>
                                <td>2021-01-02</td>
                                <td>890 грн</td>
                                <td>Переглянути</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Марк</td>
                                <td>Очікується</td>
                                <td>2021-01-02</td>
                                <td>400 грн</td>
                                <td>Переглянути</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Гоша</td>
                                <td>Завершено</td>
                                <td>2021-03-02</td>
                                <td>700 грн</td>
                                <td>Переглянути</td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Михайло</td>
                                <td>Поверненя</td>
                                <td>2021-01-03</td>
                                <td>100 грн</td>
                                <td>Переглянути</td>
                            </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
