@extends('layouts.base')

@section('content')
<div id="loader"></div>
<div id="myDiv" class="animate-bottom">
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
                        <li>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#galleryModal">
                                    participants gallery
                                </button>
                          </li>
                          <li>
                                <a href="{{ route('participants.selecthouses',[$ekisakaate]) }}" class="btn btn-danger text-primary">
                                    Assign houses
                                </a>
                          </li>
                          <li>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#lugandaLessonModal">
                                        Luganda Lessons
                                    </button>
                          </li>
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
                        <li><a id="closeup" class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <table id="" class="example table table-striped table-bordered">
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
                                <th>House Assigned</th>
                                <th>Payment Status</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $key=>$participant)
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
                                    <td>{{ $participant->getHousename() }}</td>
                                    <td> <strong> {{ $participant->payment_status }}</strong></td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ route('participants.show',[$participant]) }}">
                                            <i class="fa fa-eye"></i>
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

{{-- gallery modal --}}
<div class="modal fade bs-example-modal-lg" id="galleryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Participants</h4>
            </div>
            <div class="modal-body">
                    <div class="row">
                            <div class="col-md-12">
                              <div class="x_panel">

                                <div class="x_content">

                                  <div class="row">

                                    @foreach ($participants as $participantArchive)

                                    <div class="col-md-55">
                                            <div class="thumbnail">
                                              <div class="image view view-first">
                                                <img style="width: 100%; display: block;" src="{{ asset('storage/'.$participantArchive->image_name) }}" alt="image" />
                                                <div class="mask">
                                                  <p>{{ $participantArchive->getRouteKey() }}</p>
                                                  <div class="tools tools-bottom">
                                                    <a href="{{ route('participants.show',[$participantArchive]) }}"><i class="fa fa-link"></i></a>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="caption">
                                                <p>{{ $participantArchive->name }}</p>
                                              </div>
                                            </div>
                                    </div>

                                    @endforeach
                                  </div>
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

{{-- Luganda Lessons modal --}}
<div class="modal fade bs-example-modal-lg" id="lugandaLessonModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Participants signed up for luganda lessons</h4>
            </div>
            <div class="modal-body">
                    <div class="row">
                            <div class="col-md-12">
                              <div class="x_panel">

                                <div class="x_content">

                                  <div class="row">
                                        <table id="" class="example table table-striped table-bordered">
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
                                                    <th>House Assigned</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($participants as $key=>$luganda_participant)
                                                        @if ((bool)$luganda_participant->luganda_classes)

                                                        <tr>
                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $luganda_participant->name }} </td>
                                                                <td>{{ $luganda_participant->gender }}</td>
                                                                <td>{{ $luganda_participant->age }}</td>
                                                                <td>{{ $luganda_participant->class }}</td>
                                                                <td>{{ $luganda_participant->school }}</td>
                                                                <td>
                                                                    {{ $luganda_participant->residence }}
                                                                </td>
                                                                <td>{{ $luganda_participant->religion }}</td>
                                                                <td>{{ $luganda_participant->getHousename() }}</td>
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
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
</div>

@endsection


