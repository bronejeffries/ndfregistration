@extends('layouts.base')

@section('content')

<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Ebisaakaate</h3>
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
                        <h2>Ebisaakaate <small>(previous)</small></h2>
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
                              <th>Venue</th>
                              <th>Year</th>
                              <th>Start Date</th>
                              <th>End Date</th>
                              <th>No. Of Participants</th>
                              <th>Status</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($ebkns as $key=>$ekn)
                              <tr>
                                  <td>
                                     <a href="{{ route('ekns.show',[$ekn]) }}"> {{ $ekn->name }} {{ $ekn->description }}</a>
                                    </td>
                                  <td>{{ $ekn->venue }}</td>
                                  <td>{{ $ekn->activeyear->name }}</td>
                                  <td>{{ Carbon\Carbon::parse($ekn->start_date)->format('d-M-Y') }}</td>
                                  <td>{{ Carbon\Carbon::parse($ekn->end_date)->format('d-M-Y') }}</td>
                                  <td>{{ $ekn->participantsCount() }}</td>
                                  <td>{{ $ekn->status() }}</td>
                                  <td>
                                      <button {{ $ekn->registrationOpen() }} class="btn btn-success">
                                        @if ((bool)$ekn->open)
                                        <a href="#" onclick="event.preventDefault();
                                                            document.getElementById('form-{{ $ekn->id }}').submit(); ">
                                          Registration Form
                                        </a>
                                        <form  id="form-{{ $ekn->id }}" action="{{ route('participants.create') }}" method="get">
                                                <input type="hidden" value="{{ $ekn->id }}" name="ekn_d">
                                        </form>
                                        @else
                                        Registration Form
                                        @endif
                                      </button>
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

@endsection


