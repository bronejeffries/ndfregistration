@extends('layouts.base')

@section('content')
<div id="loader"></div>
<div id="myDiv" class="animate-bottom">
    <div class="page-title">
      <div class="title_left">
        <h3>Participant Houses</h3>
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
                      <h2>Participant house <small>(start new)</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form id="demo-form2" method="POST" action="{{ route('participanthouses.store') }}" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="name" value="{{ old('name') }}" name="name" required class="form-control col-md-7 col-xs-12">
                            <span class="text-danger" >{{ $errors->first('name') }}</span>
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

@endsection


