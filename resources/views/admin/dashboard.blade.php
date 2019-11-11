@extends('layouts.base')


@section('content')

<div id="loader"></div>

<div id="myDiv" class="animate-bottom">
        <div class="row top_tiles">
          <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
              <div class="count" id="yearscount"></div>
              <h3>Active Years</h3>
              <p>Total Count</p>
            </div>
          </div>
          <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-comments-o"></i></div>
              <div class="count" id="eknscount"></div>
              <h3>Ebisaakaate</h3>
              <p>Total Count.</p>
            </div>
          </div>
          <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
              <div class="count" id="userscount"></div>
              <h3>System Users</h3>
              <p>Total Count</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="x_panel">

                    <div class="x_title">
                        <h2>Current Year Analysis</h2>
                        <ul class="nav navbar-right panel_toolbox">
                                <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                          <li><a href="#" onclick="event.preventDefault(); changeChartType('line');">Line Chart</a>
                                          </li>
                                          <li><a href="#" onclick="event.preventDefault(); changeChartType('bar');">Bar Chart</a>
                                          </li>
                                        </ul>
                                </li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
              <div class="x_content">
                <div class="col-md-9 col-sm-12 col-xs-12">
                  <div class="demo-container" style="height:280px">
                    <canvas id="chart_plot_02" style="width:100%; height:100%" class="demo-placeholder"></canvas>
                  </div>
                  <div class="tiles">
                    {{-- <div class="col-md-4 tile">
                      <span>Current Data Stats</span>
                    </div>
                    <div class="col-md-4 tile">
                      <span>Total Revenue</span>
                      <h2>$0.00</h2>
                    </div>
                    <div class="col-md-4 tile">
                      <span>Total Participants</span>
                      <h2>0</h2>
                    </div> --}}
                  </div>
                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div>
                    <div class="x_title">
                      <h2>Active Years</h2>
                      <div class="clearfix"></div>
                    </div>
                    <ul class="list-unstyled top_profiles scroll-view">

                        @forelse ($lastyears as $lastyear)

                            <li class="media event">
                                    <a class="pull-left border-aero profile_thumb">
                                    <i class="fa fa-users aero"></i>
                                    </a>
                                    <div class="media-body">
                                    <a class="title" href="#">{{ $lastyear->name }}</a>
                                    <p> <strong> <a href="#">Participants data analysis</a></strong></p>
                                    </div>
                            </li>

                        @empty

                        <li class="media event">
                                <p>
                                    <small>
                                        <strong>
                                            <a href="{{ route('activeyears.create') }}">
                                                Start New Year
                                            </a>
                                        </strong>
                                    </small>
                                </p>

                        </li>

                        @endforelse

                        @if (count($lastyears)>0)
                        <li class="media event">
                                <div class="media-body">
                                <p> <small> <strong> <a href="{{ route('activeyears.index') }}"> More</a></strong></small>
                                </p>
                                </div>
                        </li>
                        @endif

                    </ul>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>

</div>

@endsection

@section('footerjs_extra')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="{{ asset('assets/scripts/dashboardjs.js') }}"></script>
@endsection
