@extends('layouts.base')

@section('content')
@guest
<div class="row">
        <div class="col-md-1 col-sm-1 col-xs-12 form-group pull-right">
                <div class="input-group">
                  <span class="input-group-btn">
                      <a class="btn btn-primary text-white" href="{{ route('home') }}">
                        <i class="fa fa-times" ></i>
                        Close</a>
                  </span>
                </div>
        </div>
</div>
@else
<div class="row page-title">
        <div class="title_left">
          <h3>REGISTRATION FORM</h3>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-12 form-group">
                <div class="input-group">
                        <span class="input-group-btn">
                            <a class="btn btn-success text-white" target="_blank" href="{{ route('tags.participant',[$participant]) }}">
                            <i class="fa fa-paste" ></i>
                            Generate Tag
                            </a>
                        </span>
                      </div>
        </div>
        <div class="col-md-1 col-sm-1 col-xs-12 form-group pull-right">
                <div class="input-group">
                  <span class="input-group-btn">
                      <a class="btn btn-danger text-white" onclick="event.preventDefault();
                                                                    if(confirm('Are you sure you want to delete this Participant')){
                                                                        document.getElementById('delete_form').submit();
                                                                    }"
                                                            href="#">
                      <i class="fa fa-trash" ></i>
                      remove
                      </a>
                      <form id="delete_form" action="{{ route('participants.destroy',[$participant]) }}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                  </span>
                </div>
        </div>
        {{-- <div class="title_right"> --}}
          <div class="col-md-1 col-sm-1 col-xs-12 form-group pull-right">
            <div class="input-group">
              <span class="input-group-btn">
                  <a class="btn btn-primary text-white" href="{{ route('ekns.show',[$participant->ekn]) }}">
                    <i class="fa fa-times" ></i>
                    Close</a>
              </span>
            </div>
          </div>
        {{-- </div> --}}
        @if ($participant->isPending())
        <div class="col-md-2 col-sm-2 col-xs-12 form-group pull-right">
            <div class="input-group">
                <form action="{{ route('payment.confirm',[$participant]) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-info">
                            Confirm Payment
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>
@endguest
<div class="clearfix"></div>

<div class="animate-bottom bg-light" id="info-mation">
    <div class="print_out" id="print_out" >
        <div class="page-title row bg-light">
          <div class="col-md-3 col-sm-3 col-xs-3">
            <div class="title-left profile_pic pull-left">
                <img src="{{ asset('assets/images/kisaakateLogo.jpg') }}" alt="..." style="width:100px;" class="profile_img">
            </div>
          </div>

            <div class="col-md-3 col-sm-3 align-content-center col-xs-3">
                <div class="profile_pic pull-right">
                    <img src="{{ asset('assets/images/ug-buga2.jpg') }}" alt="..." style="width:110px; height:90px;" class="profile_img">
                </div>
            </div>
          <div class="col-md-3 col-sm-3 col-xs-3 form-group pull-right top_search">
                <div class="profile_pic pull-right">
                    <img src="{{ asset('assets/images/ndf.jpg') }}" alt="..." style="width:100px;" class="profile_img">
                  </div>
          </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="bg-light">
                         <h2 class="text-center">EKISAAKAATE KYA NNABAGEREKA {{ $participant->ekn->description }} {{ $participant->ekn->year }}</h2>
                         <h2 class="section text-center"> <strong> PARTICIPANT REGISTRATION FORM </strong></h2>
                      <!-- Tabs -->
                          <form class="form-label-left" >
                               <div class="form_wizard wizard_verticle">

                                <div class="row" >
                                  <span class="section">
                                      <strong>
                                          1.PARTICIPANT'S INFORMATION
                                      </strong>

                                  </span>
                                  <div class="form-group row">
                                      {{-- <div class="pull-right col-md-4"> --}}
                                          <div class="pull-right col-md-3 col-sm-3">
                                              <img src="{{ asset('storage/'.$participant->image_name) }}" style="width:120px; height:120px;" alt="photo" class="img-thumbnail profile_img">
                                          </div>
                                          {{-- <label class="control-label col-md-2 col-sm-2">Photo</label> --}}
                                      {{-- </div> --}}
                                  </div>
                                  <div class="form-group row">
                                      <label class="control-label col-md-1 col-sm-1" for="first-name">Name
                                      </label>
                                      <div class="col-md-4 col-sm-4">
                                      <input type="text" id="first-name" name="name" value="{{ $participant->name }}" disabled class="form-control pull-left col-md-7 col-xs-12">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">Gender</label>
                                      <div class="col-md-2 col-sm-2">
                                              <input type="text" disabled value="{{ $participant->gender }}" class="form-control col-md-7 col-xs-12">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">Age
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input disabled class="form-control col-md-7 col-xs-12" value="{{ $participant->age }}">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">Class</label>
                                      <div class="col-md-1 col-sm-1">
                                      <input class="form-control col-md-7 col-xs-12" type="text" value="{{ $participant->class }}" disabled name="class">
                                      </div>
                                  </div>

                                  <div class="form-group row ">
                                      <label class="control-label col-md-1 col-sm-1">School</label>
                                      <div class="col-md-4 col-sm-4">
                                      <input class="form-control col-md-7 col-xs-12" value="{{ $participant->school }}" disabled type="text">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">Residence</label>
                                      <div class="col-md-3 col-sm-3">
                                      <input class="form-control col-md-7 col-xs-12" disabled value="{{ $participant->residence }}" type="text">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">Religion</label>
                                      <div class="col-md-2 col-sm-2">
                                      <input class="form-control col-md-7 col-xs-12" disabled value="{{ $participant->religion }}" type="text">
                                      </div>
                                  </div>


                              </div>
                              <div class="row mt-3">

                                  <span class="section">
                                      <strong>
                                          2.PARTICIPANT HEALTH CHECK
                                      </strong>

                                  </span>

                                  <div class="form-group row">
                                      <p>Is there any medical condition or allergy issue that requires monitoring/medication? (Please be elaborate)</p>
                                      <label class="control-label col-md-2 col-sm-2">Health Notes <span class="required">*</span>
                                      </label>
                                      <div class="col-md-5 col-sm-5">
                                              <textarea name="health_notes" disabled class="form-control col-md-7 col-xs-12">
                                                      {{ $participant->health_notes }}
                                              </textarea>
                                      </div>
                                  </div>
                              </div>
                              <div class="row mt-md-3">
                                  <span class="section">
                                     <strong>
                                          3.EKISAAKAATE KYA NNABAGEREKA ATTENDANCE
                                      </strong>
                                  </span>

                                  <div class="form-group row">
                                      <label class="control-label col-md-6 col-sm-6">Is this the participant’s first time to attend the Ekisaakaate Kya Nnabagereka?(Yes/No) <span class="required">*</span>
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="text" disabled class="form-control col-md-7 col-xs-12" value="{{ $participant->first_time }}">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                      <p>If no (Please tick the appropriate years)</p>
                                      <label class="control-label col-md-1 col-sm-1">
                                          2007
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2007" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2008
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2008" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2009
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2009" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2010
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2010" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2011
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2011" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2012
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2012" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2013
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2013" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2014
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2014" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2015
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2015" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2016
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2016" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2017
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2017" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2018
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2018" class="form-control">
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">
                                              2019
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                      <input type="checkbox" name="years[]" value="2019" class="form-control">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <span class="section">
                                      <strong>
                                              4.PARENT/GUARDIAN (PLEASE SPECIFY)
                                      </strong>
                                  </span>

                                  <div class="form-group row">
                                      <label class="control-label col-md-3 col-sm-3">Mother’s/Guardian’s Name:
                                      </label>
                                      <div class="col-md-3 col-sm-3">
                                      <input type="text" value="{{ $participant->mother_name }}" class="form-control col-md-7 col-xs-12" disabled>
                                      </div>

                                      <label class="control-label col-md-2 col-sm-2">Contact
                                      </label>
                                      <div class="col-md-4 col-sm-4">
                                      <input type="text" disabled value="{{ $participant->mother_contact }}" class="form-control col-md-7 col-xs-12">
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                          <label class="control-label col-md-3 col-sm-3">Father’s/Guardian’s Name:
                                          </label>
                                          <div class="col-md-3 col-sm-3">
                                          <input type="text" name="father" value="{{ $participant->father_name }}" disabled class="form-control col-md-7 col-xs-12">
                                          </div>

                                          <label class="control-label col-md-2 col-sm-2">Contact
                                              </label>
                                          <div class="col-md-4 col-sm-4">
                                          <input type="text" name="father_contact" disabled value="{{ $participant->father_contact }}" class="form-control col-md-7 col-xs-12">
                                          </div>
                                  </div>
                                  <p>
                                      <strong>
                                              IN CASE OF ANY EMERGENCY, PLEASE LIST A PERSON WE CAN CONTACT IF WE ARE UNABLE TO REACH YOU.
                                      </strong>
                                  </p>
                                  <p>Emergency Contact</p>
                                  <div class="form-group row">
                                          <label class="control-label col-md-1 col-sm-1">Name:
                                          </label>
                                          <div class="col-md-3 col-sm-3">
                                          <input type="text" name="emergency_contact_name" value="{{ $participant->emergency_contact_name }}" disabled class="form-control col-md-7 col-xs-12">
                                          </div>

                                          <label class="control-label col-md-1 col-sm-1">Contact
                                              </label>
                                          <div class="col-md-3 col-sm-3">
                                          <input type="text" name="emergency_contact_tel" value="{{ $participant->emergency_contact_tel }}" disabled class="form-control col-md-7 col-xs-12">
                                          </div>
                                  </div>
                                  <div class="form-group row">
                                          <label class="control-label col-md-1 col-sm-1">Relationship
                                              </label>
                                              <div class="col-md-4 col-sm-4">
                                              <input type="text" name="emergency_contact_relationship" disabled value="{{ $participant->emergency_contact_relationship }}" class="form-control col-md-7 col-xs-12">
                                              </div>
                                  </div>
                              </div>
                              <div class="row" >
                                  <span class="section"> <strong>5.ANY SPECIAL ISSUE/s YOU WANT TO BE ADDRESSED DURING EKISAAKAATE KYA NNABAGEREKA?</strong></span>

                                  <div class="form-group row">
                                          <label class="control-label col-md-2 col-sm-2">Special Notes
                                              </label>
                                              <div class="col-md-4 col-sm-4">
                                              <textarea name="special_notes" disabled class="form-control col-md-7 col-xs-12">
                                                      {{ $participant->specialNotes }}
                                              </textarea>
                                              </div>
                                  </div>
                              </div>
                              <div class="row">
                                      <span class="section"> <strong>6.HOW DID YOU GET TO KNOW ABOUT THE EKN PROGRAM?</strong> </span>

                                      <div class="form-group">
                                          <label class="control-label col-md-1 col-sm-1">Response
                                          </label>
                                          <div class="col-md-3 col-sm-3">
                                          <input type="text" disabled name="response" value="{{ $participant->response }}" class="form-control col-md-7 col-xs-12">
                                          </div>
                                      </div>
                              </div>
                              <div class="row">
                                      <span class="section text-center"> <strong>PARENT’S/GUARDIAN’S INFORMATION.</strong></span>
                                      <p>
                                          <h4><strong>EKN FEES: 352,200/= (Thirty-five thousand two thousand two hundred shillings only)</strong></h4>
                                          <h5><strong>Breakdown:</strong></h5>
                                          <ul>
                                                  <li>Registration Fee: 10,000/= (paid in cash on registration)</li>
                                                  <li>Participation Fee: 300,000/=</li>
                                                  <li>EKN Uniform Fee: 40,000/=</li>
                                                  <li>Bank Charges: 2,200/=</li>
                                          </ul>
                                      </p>

                                      <p>
                                              <h4><strong>PAYMENTS MUST BE MADE  USING A PAYSLIP</strong></h4>

                                              <ul>
                                                      <li>Finance Trust Bank A/C Name: Nnabagereka Development Foundation A/C Number: 206252000066</li>
                                                      <li>DFCU Bank A/C Name: The Nnabagereka Development Foundation Ltd A/C Number: 01073522568076</li>
                                                      <li>Through Centemobile to Centenary Bank. A/C Name: Ekisaakaate A/C Number: 4210600091</li>

                                              </ul>
                                              (All payments must be receipted) Please return the office copy of the bank slip after payment to the registration centers.
                                      </p>


                                      <p>
                                              <h4><strong>REQUIREMENTS (PLEASE LABEL ALL PROPERTY)</strong></h4>
                                              Bed sheets, blanket, (NO MATTRESS), mosquito net, decent clothes, (include; a pair of black trousers for boys and a mid-calf black skirt for girls), sweater, nightwear/pajamas, sportswear & sports shoes, slippers, toothbrush, toothpaste, washing & bathing soap, sponge, vaseline, bucket or basin, towel, water bottles, a plate, cup, spoon/fork N.B: A rubber sheath (if participant wets the bed).
                                              <br>
                                              <strong>PROHIBITED ITEMS:</strong> electronic gadgets, make-up, skin piercing instruments, eats, drinks and pocket money.
                                      </p>
                                      <p>
                                              <h4><strong>SPECIAL INSTRUCTIONS AND EVENTS:</strong></h4>
                                              <ul>
                                                  <li>On Saturday, 4th January 2020 drop the participant at Bulange Mmengo or Hana International School, Nsangi 15kms Off Masaka Road before 10.00a.m.</li>
                                                  <li>On Saturday, 18th January 2020 pick the participant from Hana International School, Nsangi15kms Off Masaka Road after the Closing Ceremony.</li>
                                                  <li><strong>On Saturday, 25th January 2020 every parent is requested to attend the Ekisaakaate Kya Nnabagereka Evaluation/Parenting Session from 8.30 a.m. -12.30 p.m.</strong></li>
                                                  <li>We offer Luganda classes for beginners daily from 9am-1pm at 20,000 Ugx per day. Are you interested in signing up your child
                                                         <div class="checkbox">
                                                              <label>
                                                                      <input type="checkbox" disabled {{ (bool)$participant->luganda_classes?"checked":"" }} class="flat"> Yes
                                                              </label>
                                                         </div>
                                                         <div class="checkbox">
                                                              <label>
                                                                      <input type="checkbox" disabled {{ (bool)$participant->luganda_classes?"":"checked" }} class="flat"> No
                                                              </label>
                                                         </div>
                                                  </li>
                                              </ul>
                                      </p>
                                      <p>
                                              <h4><strong>CONSCENT:</strong></h4>
                                              <strong>
                                                      I understand that no fees will be refunded unless a child is unable to participate due to an accident or illness per physician orders before Ekisaakaate. Children's’ photos and quotes may be used for publicity purposes. I give my consent for my child(ren) to part take in Ekisaakaate Kya Nnabagereka)
                                                      <div class="checkbox">
                                                              <label>
                                                                      <input type="checkbox" disabled {{ (bool)$participant->conscent?"checked":"" }} class="flat"> I conscent
                                                              </label>
                                                      </div>
                                                      <div class="form-group">
                                                          <label>
                                                                  Date:
                                                          </label>

                                                          <fieldset>
                                                                  <div class="control-group">
                                                                    <div class="controls">

                                                                        <input type="date" value="{{ $participant->conscent_date }}" class="has-feedback-left" disabled>

                                                                    </div>
                                                                  </div>
                                                          </fieldset>

                                                      </div>
                                                      I allow EKN counsellors to offer any professional assistance needed to my child and also do follow up sessions where need be.
                                                      <div class="checkbox">
                                                              <label>
                                                                      <input disabled type="checkbox" {{ (bool)$participant->agree?"checked":"" }} class="flat"> I Agree
                                                              </label>
                                                      </div>
                                                      <div class="form-group">
                                                          <label>
                                                                  Date:
                                                          </label>

                                                          <fieldset>
                                                                  <div class="control-group">
                                                                    <div class="controls">

                                                                        <input type="date" value="{{ $participant->agree_date }}" class="has-feedback-left" disabled>

                                                                    </div>
                                                                  </div>
                                                          </fieldset>

                                                      </div>
                                              </strong>
                                      </p>
                                      <p class="section text-center">
                                            Ekisaakaatee {{ $participant->ekn->description }} {{ $participant->ekn->activeyear->name }} at {{ $participant->ekn->venue }}
                                      </p>
                              </div>

                            </div>
                          </form>
                      <!-- End SmartWizard Content -->
                    </div>
                </div>
        </div>

    </div>
</div>

<div class="row mr-3" style="overflow:hidden;">
    <div class="col-md-1 col-sm-1 col-xs-12 form-group">
        <a class="btn btn-success text-white" target="_blank" href="{{ route('pdf.participant',[$participant]) }}">
                      Print to pdf
                      <i class="fa fa-paste" ></i>
                    </a>
        </div>
</div>

@endsection
