@extends('layouts.base')

@section('content')
<div id="loader"></div>
<div id="myDiv" class="animate-bottom">
    <div class="page-title">
      <div class="title_left">
        <h3>{{ $participanthouse->name }} since {{ Carbon\Carbon::parse($participanthouse->created_at)->format('d-M-Y') }}</h3>
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
                      <h2>{{ $participanthouse->name }} participants</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">
                                    participants gallery
                                </button>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle btn btn-info text-info btn-outline-info" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench fa-1x"></i> Settings</a>
                            <ul class="dropdown-menu" role="menu">

                              <li>
                                  <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to Delete')){document.getElementById('form-deleteForm').submit();}" class="btn btn-danger"> <i class="fa fa-trash-o"></i> Delete</a>
                                  <form  id="form-deleteForm" action="{{ route('participanthouses.destroy',[$participanthouse]) }}" method="post">
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
                      <table class="example table table-striped table-bordered">
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
                                <th>Ekisakaate</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($participanthouse->participantsAttached as $key=>$participant)
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
                                    <td>{{ $participant->ekn->description }} {{ $participant->ekn->activeyear->name }}</td>
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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
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

                                    @foreach ($participanthouse->participantsAttached as $participantArchive)

                                    <div class="col-md-55">
                                            <div class="thumbnail">
                                              <div class="image view view-first">
                                                <img style="width: 100%; display: block;" src="{{ asset('storage/'.$participantArchive->image_name) }}" alt="image" />
                                                <div class="mask">
                                                  <span>{{ $participantArchive->getRouteKey() }}</span>
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

@endsection


