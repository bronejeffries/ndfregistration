@extends('layouts.base')

@section('content')
<div id="loader"></div>
<div id="myDiv" class="animate-bottom">
    <div class="page-title">
      <div class="title_left">
        <h3>Edit </h3>
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
                      <h2>Ekisaakaate <small>(edit)</small></h2>
                      {{-- <p class=""> --}}
                        <a class="text-right btn btn-primary" href="{{ route('ekns.index') }}"> Back</a>
                     {{-- </p> --}}
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
                      <form id="demo-form2" method="POST" action="{{ route('ekns.update',[$ekisakaate]) }}" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="description" value="{{ old('description') ?? $ekisakaate->description  }}" name="description" required class="form-control col-md-7 col-xs-12">
                            <span class="text-danger" >{{ $errors->first('description') }}</span>
                        </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="venue">Venue <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="venue" name="venue" value="{{ old('venue') ?? $ekisakaate->venue }}" required class="form-control col-md-7 col-xs-12">
                            <span class="text-danger" >{{ $errors->first('venue') }}</span>
                        </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="theme1">Theme<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="theme1" name="theme" value="{{ old('theme') ?? $ekisakaate->theme }}" required class="form-control col-md-7 col-xs-12">
                              <span class="text-danger" >{{ $errors->first('theme') }}</span>
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="translation_version1">Luganda Extension<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="translation_version1" name="translation_version1" value="{{ old('translation_version1') ?? $ekisakaate->translation_version1 }}" required class="form-control col-md-7 col-xs-12">
                              <span class="text-danger" >{{ $errors->first('translation_version1') }}</span>
                          </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="translation_version2">English Extension<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="translation_version2" name="translation_version2" value="{{ old('translation_version2') ?? $ekisakaate->translation_version2  }}" required class="form-control col-md-7 col-xs-12">
                              <span class="text-danger" >{{ $errors->first('translation_version2') }}</span>
                          </div>
                          </div>
                        <div class="form-group">
                          <label for="activeyear" class="control-label col-md-3 col-sm-3 col-xs-12">Year</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">

                            <select id="activeyear" class="form-control col-md-7 col-xs-12" type="text" name="activeyear_id">
                                @foreach ($c_years as $year)

                                <option value="{{ $year->id }}" {{ (($year->id==$ekisakaate->activeyear_id)?"selected":"") }} >{{ $year->name }}</option>

                                @endforeach
                            </select>

                            <span class="text-danger" >{{ $errors->first('activeyear_id') }}</span>

                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="start">Start Date<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date" id="start" name="start_date" value="{{ old('start_date') ?? $ekisakaate->start_date }}" required class="form-control col-md-7 col-xs-12">
                              <span class="text-danger" >{{ $errors->first('start_date') }}</span>
                          </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="end">End Date<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date" id="end" name="end_date" value="{{ old('end_date') ?? $ekisakaate->end_date }}" required class="form-control col-md-7 col-xs-12">
                              <span class="text-danger" >{{ $errors->first('end_date') }}</span>
                          </div>
                        </div>

                        <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="participation_fees">Participation Amount<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="number" id="participation_fees" name="participation_fees" value="{{ old('participation_fees') ?? $ekisakaate->participation_fees }}" required class="form-control col-md-7 col-xs-12">
                                  <span class="text-danger" >{{ $errors->first('participation_fees') }}</span>
                              </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">update</button>
                          </div>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>

    </div>
</div>

@endsection


