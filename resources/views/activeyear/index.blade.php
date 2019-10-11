@extends('layouts.base')

@section('content')

<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Active Years</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Years<small>(previous)</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <li class="dropdown">
                            <a href="#" ><i class="fa fa-wrench"></i></a>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li>
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <table id="" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Name</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($activeyears as $key=>$year)
                              <tr>
                                  <td>{{ $year->name }}</td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>

    </div>
</div>

@endsection


