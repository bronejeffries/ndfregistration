@extends('layouts.base')

@section('content')

<div id="loader"></div>
<div id="myDiv" class="animate-bottom">
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
                              <th>Ebisaakate</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($activeyears as $key=>$year)
                              <tr>
                                  <td>
                                        <a href="#">
                                                {{ $year->name }}
                                        </a>
                                </td>
                                <td>{{ $year->eknsCount() }}</td>
                                <td>
                                    <a data-toggle="modal" data-target=".bs-example-modal-lg" href="#" onclick="event.preventDefault(); loadYearSummary('{{ $year->getRouteKey() }}','chart_summary_plot')" class="btn btn-success">
                                        <i class="fa fa-line-chart"></i>
                                    </a>
                                    <a href="#" onclick="event.preventDefault();
                                        if(
                                            confirm('Are you sure you want to remove this year?\n All corresponding data will be lost.')
                                            ){
                                                document.getElementById('delete_year_form_{{ $year->getRouteKey()}}').submit();
                                        }" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete_year_form_{{$year->getRouteKey()}}" action="{{ route('activeyears.destroy',[$year])}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>

    </div>
</div>

{{-- summary graph modal --}}
<div id="sgrmd" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Year Analysis</h4>
            </div>
            <div class="modal-body">
                    <div id="frame_loader"></div>
                    <div class="row">
                            <div class="col-md-12">
                              <div class="x_panel">
                                <div class="x_content">
                                    <canvas id="chart_summary_plot" style="width:100%; height:100%" class="demo-placeholder"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
</div>


@endsection


@section('footerjs_extra')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="{{ asset('assets/scripts/yearsumaryjs.js') }}"></script>
@endsection
