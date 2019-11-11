@extends('layouts.base')

@section('content')

<div class="row m-auto page-title">

        {{-- <div class="title_right"> --}}
          <div class="col-md-1 col-sm-1 col-xs-12 form-group pull-right">
            <div class="input-group">
              <span class="input-group-btn">
                  <a class="btn btn-primary text-white" href="{{ route('participants.show',[$participant]) }}">
                    <i class="fa fa-times" ></i>
                    Close</a>
              </span>
            </div>
          </div>
        {{-- </div> --}}

        <div class="col-md-2 col-sm-2 col-xs-12 form-group pull-right">
                <div class="input-group">
                  <span class="input-group-btn">
                      <a class="btn btn-success text-white">
                        <i class="fa fa-paste" ></i>
                        Print to pdf</a>
                  </span>
                </div>
        </div>

</div>

<div class="clearfix"></div>

<div class="" id="info-mation">
    <div class="print_out" >

        <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3">
                  <div class="x_panel bg-blue">
                      <div class="">
                          <h2 class="text-center"> <strong> EKISAAKAATE KYA NNABAGEREKA <br> {{ $participant->ekn->description }} {{ $participant->ekn->activeyear->name }}</strong></h2>
                              <h4 class="section text-center"><strong> "{{ $participant->ekn->theme }}: {{ $participant->ekn->translation_version1 }}" </strong></h4>
                              <h4 class="text-center"> <strong> "{{ $participant->ekn->theme }}: {{ $participant->ekn->translation_version2 }}" </strong></h4>
                      </div>
                      <div class="row">
                          <div class="col-md-7 col-sm-7 col-md-offset-3">
                              <div class="col-md-3 col-sm-3 col-xs-3">
                                      <div class="profile_pic">
                                          <img src="{{ asset('assets/images/kisaakateLogo.jpg') }}" alt="..." style="width:65px; height:60px;" class="profile_img">
                                      </div>
                                    </div>

                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <div class="profile_pic">
                                            <img src="{{ asset('assets/images/ug-buga2.jpg') }}" alt="..." style="width:65px; height:60px;" class="profile_img">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                          <div class="profile_pic">
                                              <img src="{{ asset('assets/images/ndf.jpg') }}" alt="..." style="width:65px; height:60px;" class="profile_img">
                                            </div>
                                    </div>
                          </div>
                        <div class="clearfix"></div>
                        <div class="clearfix"></div>
                        <div class="form-group row mt-md-2 justify-content-center">
                                <p class="col-md-6 text-center col-sm-6 col-md-offset-3">
                                </p>
                                <div class="col-md-6 text-center col-sm-6 col-md-offset-3">
                                        <img src="{{ asset('storage/'.$participant->image_name) }}" style="width:190px  ; height:190px;" alt="photo" class=" profile_img img-rounded">
                                </div>
                                <div class="col-md-6 col-sm-6 py-0 col-md-offset-3">
                                    <h2 class="text-center text-uppercase"> <strong> {{ $participant->name }} </strong></h2>
                                    <h2 class=" text-center dark text-uppercase"><strong>muyizi</strong></h2>
                                </div>
                        </div>



                    <div class="form-group row mt-5 justify-content-center">
                            <div class="col-md-6 col-sm-6 py-0 col-md-offset-3">
                                    <h2 class=" text-center"><strong>Laba, Yiga, Kola</strong></h2>
                            </div>
                    </div>
                </div>

            </div>
                </div>
        </div>

    </div>
</div>

@endsection
