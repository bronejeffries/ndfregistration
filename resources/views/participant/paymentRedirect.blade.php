@extends('layouts.base')

@section('content')

<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Payment</h3>
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
                      <div class="x_content">

                            <div class="alert alert-{{ $type }} alert-dismissible fade in" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <strong> <i class="fa fa-info-circle fa-3x"></i>{{ $message }} </strong>
                            </div>
                            <div class="col-md-5">
                                    <a class="btn btn-success" href="{{ route('load.index') }}">
                                        finish
                                    </a>
                            </div>

                            @if ($type=='success')
                            <div class="col-md-5 pull-right">
                                    <a class="btn btn-info" href="{{ route('participants.show',[$participant]) }}">
                                        view registered participant
                                    </a>
                            </div>
                        @endif

                      </div>
                    </div>
                </div>

    </div>
</div>

@endsection


