@extends('layouts.base')

@section('content')

<div class="animate-bottom">
        <div class="page-title">
          <div class="title_left">
            <h2>Select Payment Method</h2>
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
				<div id="frame_loader"></div>
                            <iframe onload="showFrame()" src="{{ $iframe_data }}" width="100%"
                                height="620px" scrolling="auto" frameBorder="0">
                                <p>Unable to load the payment page</p>
                            </iframe>

                          </div>
                        </div>
                    </div>

        </div>
    </div>

@endsection
