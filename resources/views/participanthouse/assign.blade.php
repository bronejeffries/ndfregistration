@extends('layouts.base')

@section('content')
<div id="loader"></div>
<div id="myDiv" class="animate-bottom">
    <div class="page-title">
      <div class="title_left">
        <h3>Assign houses</h3>
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
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form class="form" action="{{ route('participants.assignhouses') }}" method="POST">

                        @csrf

                        @foreach ($participantsToAssign as $participant)
                            <div class="row card">
                                <div class="col-md-55">
                                    <div class="thumbnail">
                                      <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="{{ asset('storage/'.$participant->image_name) }}" alt="image" />
                                        <div class="mask">
                                          <p>{{ $participant->getRouteKey() }}</p>
                                          <div class="tools tools-bottom">
                                            <a href="{{ route('participants.show',[$participant]) }}"><i class="fa fa-link"></i></a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="caption">
                                        <p>{{ $participant->name }}</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-5 text-left">
                                    <p>Name: <strong>{{ $participant->name }}</strong> </p>
                                    <p>Gender: <strong>{{ $participant->gender }}</strong></p>
                                    <p>Age: <strong>{{ $participant->age }}</strong> </p>
                                    <p>Class: <strong>{{ $participant->class  }}</strong> </p>
                                    <p>School: <strong>{{ $participant->school }}</strong> </p>
                                    <p>Residence: <strong>{{ $participant->residence }}</strong> </p>
                                    <p>Religion: <strong>{{ $participant->religion }}</strong> </p>
                                </div>
                                <div class="col-md-2">
                                    <select class="form-control" name="houses_selected[{{ $participant->getRouteKey() }}]">
                                        <option value="">Select house....</option>
                                        @foreach ($participanthouses as $house)
                                            <option value="{{ $house->getRouteKey() }}">
                                                {{ $house->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Done</button>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>

    </div>
</div>

@endsection


