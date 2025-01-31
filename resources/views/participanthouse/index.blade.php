@extends('layouts.base')

@section('content')
<div id="loader"></div>
<div id="myDiv" class="animate-bottom">
    <div class="page-title">
      <div class="title_left">
        <h3>Registered houses</h3>
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
                        <h2>Houses <small>(list)</small></h2>
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
                        <table class="example table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Created On</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($houses as $key=>$house)
                              <tr>
                                  <td>
                                     <a href="{{ route('participanthouses.show',[$house]) }}"> {{ $house->name }}</a>
                                    </td>
                                  <td>{{ Carbon\Carbon::parse($house->created_at)->format('d-M-Y') }}</td>
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


