@extends('layouts.base')

@section('content')
<div id="loader"></div>
<div id="myDiv" class="animate-bottom">
    <div class="page-title">
      <div class="title_left">
        <h3>{{ $ekisakaate->name }} {{ $ekisakaate->description }}</h3>
        <h5>
            Total Registration fees paid: <strong>{{ $ekisakaate->getTotalRegistrationAmount() }}</strong>
        </h5>
        <h5>
            Total Participation fees paid: <strong>{{ $ekisakaate->getTotalParticipationAmount() }}</strong>
        </h5>

        <h5>
            Confirm pending payments <strong><a href="{{ route('ekns.getConfirm',[$ekisakaate])}}">here</a></strong>
        </h5>

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
                                                  <input type="hidden" value="{{ $ekisakaate->getRouteKey() }}" name="ekn_d">
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
                              <li>
                                <a class="btn btn-sm btn-info " href="{{ route('ekns.edit',[$ekisakaate]) }}"> <i class="fa fa-pencil"></i> Edit</a>
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
                                <th>Registration</th>
                                <th>Ekn full fees</th>
                                <th></th>
                                <th>Comment</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($participants as $key=>$participant)
                                <tr id="{{ $participant->getRouteKey() }}">
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <a href="{{ route('participants.show',[$participant]) }}">
                                                {{ $participant->name }}
                                        </a>
                                     </td>
                                    <td>{{ $participant->getGenderForDisplay() }}</td>
                                    <td>{{ $participant->age }}</td>
                                    <td>{{ $participant->class }}</td>
                                    <td>{{ $participant->school }}</td>
                                    <td>
                                        {{ $participant->residence }}
                                    </td>
                                    <td>{{ $participant->religion }}</td>
                                    <td>{{ $participant->getHousename() }}</td>
                                    <td> <strong> {{ ((bool)$participant->isPending())?$participant->payment_status:$participant->registration_reciept }}</strong></td>
                                    <td class="confirm">{{ $participant->participation_fees_paid }}</td>
                                    <td>
                                        @if ($participant->hasFullyPaid()||(bool)$participant->isCleared)
                                                {{ $participant->participation_reciepts }}
                                        @else
                                            <ul class="nav navbar-right">

                                                    <li class="dropdown">
                                                        <button class="dropdown-toggle btn btn-info text-info btn-outline-info" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench fa-1x"></i></button>
                                                        <ul class="dropdown-menu" role="menu">

                                                            <li>
                                                                <a href="#" class="j_a btn btn-info" data-participant="{{ $participant->getRouteKey() }}" data-toggle="modal" data-target="#paymentModal" >
                                                                    <i class="fa fa-check">
                                                                    </i>
                                                                    Make Payment
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#" class="j_a btn btn-success" data-participant="{{ $participant->getRouteKey() }}" data-toggle="modal" data-target="#clearModal">
                                                                    <i class="fa fa-check"></i>
                                                                    Mark Cleared
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                            </ul>
                                        @endif
                                    </td>
                                    <td class="reason">
                                        {{ $participant->reason }}
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
              <h4 class="modal-title" id="myModalLabelGallery">Participants</h4>
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
              <h4 class="modal-title" id="myModalLabelLuganda">Participants signed up for luganda lessons</h4>
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

{{-- payment modal --}}
<div class="modal fade bs-example-modal-sm" id="paymentModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabelPayment">Make Payment</h4>
            </div>
            <div class="modal-body">
                    <div class="row">
                            <div class="col-md-12">
                              <div class="x_panel">

                                <div class="x_content">
                                        <div id="demo-form2-loader" style="display:none;" class="modal_loader"></div>
                                  <div class="row">
                                        <form id="demo-form2"  method="POST" action="{{ route('ekns.makePendingPayment') }}" data-parsley-validate class="j form-horizontal form-label-left">
                                                @csrf
                                                <input type="hidden" name="participant_selected">
                                                <div class="form-group">
                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="amount">Amount<span class="required">*</span>
                                                  </label>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <input type="number" id="amount" name="amount" required class="form-control col-md-7 col-xs-12">
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reciept">Reciept<span class="required">*</span>
                                                    </label>
                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input type="text" id="reciept" name="payment_reciept" required class="form-control col-md-7 col-xs-12">
                                                    </div>
                                                </div>
                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                  </div>
                                                </div>
                                        </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default cl" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
</div>

{{-- clear modal --}}
<div class="modal fade bs-example-modal-sm" id="clearModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Confirm</h4>
            </div>
            <div class="modal-body">
                    <div class="row">
                            <div class="col-md-12">

                              <div class="x_panel">

                                <div class="x_content">

                                    <div id="demo-form-loader" style="display:none;" class="modal_loader"></div>

                                  <div class="row">
                                        <form id="demo-form"  method="POST" action="{{ route('ekns.makePendingPayment') }}" data-parsley-validate class="j form-horizontal form-label-left">
                                                @csrf
                                                <input type="hidden" name="participant_selected">
                                                <input type="hidden" name="clear" value=1>
                                                <div class="form-group">
                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reason">Reason<span class="required">*</span>
                                                  </label>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <textarea id="reason" name="reason" required class="form-control col-md-7 col-xs-12">
                                                    </textarea>
                                                </div>
                                                </div>
                                                <div class="ln_solid"></div>
                                                <div class="form-group">
                                                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                    <button type="submit" class="btn btn-success">Submit</button>
                                                  </div>
                                                </div>
                                        </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default cl" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
</div>

@endsection


