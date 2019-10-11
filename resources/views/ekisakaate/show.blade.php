@extends('layouts.base')

@section('content')

<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>{{ $ekisakaate->name }} {{ $ekisakaate->description }}</h3>
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
                      <h2>{{ $ekisakaate->name }} {{ $ekisakaate->description }} participants <small>({{ $ekisakaate->status() }})</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                          @if ((bool)$ekisakaate->open)
                              <li>
                                  {{-- <button> --}}
                                          <a class="btn btn-success text-success" href="#" onclick="event.preventDefault();
                                                              document.getElementById('form-regForm').submit(); ">
                                            Registration Form
                                          </a>
                                          <form  id="form-regForm" action="{{ route('participants.create') }}" method="get">
                                                  <input type="hidden" value="{{ $ekisakaate->id }}" name="ekn_d">
                                          </form>
                                      {{-- </button> --}}
                                </li>
                            @endif
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-info text-info btn-outline-info" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench fa-1x"></i> Settings</a>
                            <ul class="dropdown-menu" role="menu">
                                @if ((bool)$ekisakaate->open)

                                <li>
                                  <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to close registration')){document.getElementById('form-closeForm').submit();}" class="btn btn-info" > <i class="fa fa-close"></i> Close</a>
                                  <form  id="form-closeForm" action="{{ route('ekns.update',[$ekisakaate]) }}" method="post">
                                          @csrf
                                          @method('PATCH')
                                          <input type="hidden" value=0 name="open">
                                  </form>
                                </li>
                                @else

                                <li>
                                    <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to open registration')){document.getElementById('form-openForm').submit();}" class="btn btn-success"> <i class="fa fa-folder-open-o" ></i> Open</a>
                                    <form  id="form-openForm" action="{{ route('ekns.update',[$ekisakaate]) }}" method="post">
                                          @csrf
                                          @method('PATCH')
                                          <input type="hidden" value=1 name="open">
                                  </form>
                                </li>

                                @endif
                              <li>
                                  <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to Delete')){document.getElementById('form-deleteForm').submit();}" class="btn btn-danger"> <i class="fa fa-trash-o"></i> Delete</a>
                                  <form  id="form-deleteForm" action="{{ route('ekns.destroy',[$ekisakaate]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                </form>
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
                      <br />
                      <table id="" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                  <th>#</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Age</th>
                                <th>Class</th>
                                <th>School</th>
                                <th>Residence</th>
                                <th>Religion</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($ekisakaate->participants as $key=>$participant)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $participant->name }} </td>
                                    <td>{{ $participant->gender }}</td>
                                    <td>{{ $participant->age }}</td>
                                    <td>{{ $participant->class }}</td>
                                    <td>{{ $participant->school }}</td>
                                    <td>
                                        {{ $participant->residence }}
                                    </td>
                                    <td>{{ $participant->religion }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('participants.show',[$participant]) }}">
                                            <i class="fa fa-eye"></i> view
                                        </a>
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


