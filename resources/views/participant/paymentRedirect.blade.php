@extends('layouts.base')

@section('content')
<div id="frame_loader"></div>
<div class="animate-bottom">
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
                <div style="display:none;" class="x_panel">
                      <div class="x_content">

                            <div id="message_alert" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <strong><i class="fa fa-info-circle fa-3x"></i><span id="message_holder" >$message</span></strong>
                            </div>

                                <div style="display:none;" id="msbn" class="col-md-5">
                                    <a id="finish"  href="{{ route('load.index') }}">
                                        finish
                                    </a>
                                </div>

                                <div style="display:none;" id="psbn" class="col-md-5 pull-right">
                                            <a class="btn btn-info" id="pSl" href="#">
                                                view registered participant
                                            </a>
                                </div>

                      </div>
                    </div>
                </div>

    </div>
</div>

<form style="display:none;" action="#">
    <input type="hidden" name="" id="prRef_holder" value="{{ $pesapal_merchant_reference }}">
    <input type="hidden" name="" id="tid_holder" value="{{ $pesapalTrackingId }}">
</form>

@endsection

@section('footerjs_extra')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('assets/scripts/handlePjs.js') }}"></script>

@endsection
