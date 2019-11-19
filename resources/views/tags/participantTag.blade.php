@extends('layouts.pdfBase')

@section('content')

<div class="clearfix"></div>

<div class="" id="info-mation">
        <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6 col-md-offset-3">
                  <div class="x_panel" style="background:blue; padding:1%; color:white;">
                      <div class="">
                        <h4 class="text-center" style="color:white;" >
                            <strong>
                                EKISAAKAATE KYA NNABAGEREKA
                                <br>
                                {{ $participant->ekn->description }} {{ $participant->ekn->activeyear->name }}
                            </strong>
                        </h4>
                        <h6 class="text-center" style="color:white;">
                            <strong>
                                "{{ $participant->ekn->theme }}: {{ $participant->ekn->translation_version1 }}"
                            </strong>
                        </h6>
                        <h6 class="text-center" style="color:white;">
                            <strong>
                                "{{ $participant->ekn->theme }}: {{ $participant->ekn->translation_version2 }}"
                            </strong>
                        </h6>
                      </div>
                    <div class="text-center">

                        <div class="text-center col-md-4 col-lg-4 col-sm-4 col-xs-4">
                                <img class="pull-right" src="{{ 'assets/images/ug-buga2.jpg' }}" alt="..." style="width:50px; height:35px;">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 text-right">
                                <img src="{{ 'assets/images/kisaakateLogo.jpg' }}" alt="..." style="width:50px; height:35px;">
                          </div>
                          <div class="pb-2 col-md-8 col-sm-8 col-lg-8 col-xs-8 text-right">
                                    <img src="{{ 'assets/images/ndf.jpg' }}" alt="..." style="width:50px; height:35px;">
                          </div>

                    </div>
                    <br><br><br>
                    <div class="text-center">
                            <div class="col-md-6 text-center col-sm-6">
                                    <img src="{{ 'storage/'.$participant->image_name }}" style="width:100px  ; height:100px;" alt="photo" class=" profile_img img-rounded">
                            </div>
                            <br>
                            <div class="col-md-6 col-sm-6 py-0 col-md-offset-3">
                                <h6 style="color:white;" class="text-center text-uppercase"> <strong> {{ $participant->name }} </strong></h6>
                                <h6 style="color:white;" class=" text-center dark text-uppercase"><strong>muyizi</strong></h6>
                            </div>
                    </div>
                    <div class="form-group row mt-5 justify-content-center">
                            <div class="text-center col-md-6 col-sm-6 py-0 col-md-offset-3">
                                    <h5 style="color:white;" class="text-center"><strong>Sazza.......</strong></h5>
                            </div>
                    </div>
                    <div class="form-group row mt-5 justify-content-center">
                            <div class="text-center col-md-6 col-sm-6 py-0 col-md-offset-3">
                                    <h5 style="color:white;" class="text-center"><strong>Laba, Yiga, Kola</strong></h5>
                            </div>
                    </div>
                </div>

            </div>
                </div>
        </div>
</div>

@endsection
