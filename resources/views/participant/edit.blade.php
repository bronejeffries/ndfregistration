@extends('layouts.base')

@section('content')

<div class="row page-title">
        <div class="title_left">
          <h3>REGISTRATION FORM</h3>
        </div>
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
</div>
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
                          <form class="form-label-left" action="{{ route('participants.update',[$participant]) }}" method="POST" >
                            @csrf
                            @method('PATCH')
                               <div class="form_wizard wizard_verticle">

                                <div class="row mt-3">

                                    <span class="section">
                                        <strong>
                                            1.PARTICIPANT PAYMENT DETAILS
                                        </strong>

                                    </span>

                                    <div class="form-group row">
                                        <label class="control-label col-md-2 col-sm-2">Ekns Full Fees Paid <span class="required">*</span>
                                        </label>
                                        <div class="col-md-5 col-sm-5">
                                                <input type="number" name="participation_fees_paid" value="{{ $participant->participation_fees_paid }}"  class="form-control col-md-7 col-xs-12" />
                                                <span class="text-danger">{{ $errors->first('participation_fees_paid') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 col-sm-2">Participation fees reciepts<span class="required">*</span>
                                        </label>
                                        <div class="col-md-5 col-sm-5">
                                                <input type="text" name="participation_reciepts" value="{{ $participant->participation_reciepts }}"  class="form-control col-md-7 col-xs-12" />
                                                <span class="text-danger">{{ $errors->first('participation_reciepts') }}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="control-label col-md-2 col-sm-2">Registration fees reciept <span class="required">*</span>
                                        </label>
                                        <div class="col-md-5 col-sm-5">
                                                <input type="text" name="registration_reciept" value="{{ $participant->registration_reciept }}"  class="form-control col-md-7 col-xs-12" />
                                                <span class="text-danger">{{ $errors->first('registration_reciept') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" >
                                  <span class="section">
                                      <strong>
                                          2.PARTICIPANT'S INFORMATION
                                      </strong>
                                  </span>
                                  <div class="form-group row">
                                      {{-- <div class="pull-right col-md-4"> --}}
                                          <div class="pull-right col-md-3 col-sm-3">
                                              <img src="{{ asset('storage/'.$participant->image_name) }}" style="width:130px; height:120px;" alt="photo" class="img-thumbnail profile_img">
                                          </div>
                                          {{-- <label class="control-label col-md-2 col-sm-2">Photo</label> --}}
                                      {{-- </div> --}}
                                  </div>
                                  <div class="form-group row">
                                      <label class="control-label col-md-1 col-sm-1" for="first-name">Name
                                      </label>
                                      <div class="col-md-4 col-sm-4">
                                      <input type="text" id="first-name" name="name" value="{{ old('name') ?? $participant->name }}"  class="form-control pull-left col-md-7 col-xs-12">
                                      <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                      <label class="control-label col-md-1 col-sm-1">Gender</label>
                                      <div class="col-md-2 col-sm-2">
                                        <select type="text"  name="gender" class="form-control col-md-7 col-xs-12">
                                            <option value="male" {{ $participant->gender=="male"?"selected":"" }} >Male</option>
                                            <option value="female" {{ $participant->gender=="female"?"selected":"" }}>Female</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">Age
                                      </label>
                                      <div class="col-md-1 col-sm-1">
                                        <input  class="form-control col-md-7 col-xs-12" name="age" value="{{ old('age')??$participant->age }}">
                                        <span class="text-danger">{{ $errors->first('age') }}</span>
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">Class/Grade</label>
                                      <div class="col-md-1 col-sm-1">
                                        <input class="form-control col-md-7 col-xs-12" type="text" value="{{ old('class')??$participant->class }}"  name="class">
                                        <span class="text-danger">{{ $errors->first('class') }}</span>
                                      </div>
                                  </div>

                                  <div class="form-group row ">
                                      <label class="control-label col-md-1 col-sm-1">School</label>
                                      <div class="col-md-4 col-sm-4">
                                          <input class="form-control col-md-7 col-xs-12" name="school" value="{{ old('school')??$participant->school }}"  type="text">
                                          <span class="text-danger">{{ $errors->first('school') }}</span>
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">Residence</label>
                                      <div class="col-md-3 col-sm-3">
                                          <input class="form-control col-md-7 col-xs-12" name="residence" value="{{ old('residence')??$participant->residence }}" type="text">
                                          <span class="text-danger">{{ $errors->first('residence') }}</span>
                                      </div>
                                      <label class="control-label col-md-1 col-sm-1">Religion</label>
                                      <div class="col-md-2 col-sm-2">
                                        <select class="form-control col-md-7 col-xs-12" name="religion" value="{{ old('religion') }}" required id="religionSelect">
                                            <option value="Anglican(Protestant)" {{ $participant->religion=="Anglican(Protestant)"?"selected":"" }}>Anglican(Protestant)</option>
                                            <option value="Catholic" {{ $participant->religion=="Catholic"?"selected":"" }}>Catholic</option>
                                            <option value="Moslem" {{ $participant->religion=="Moslem"?"selected":"" }}>Moslem</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('religion') }}</span>
                                      </div>
                                  </div>


                              </div>
                              <div class="row mt-3">

                                  <span class="section">
                                      <strong>
                                          3.PARTICIPANT HEALTH CHECK
                                      </strong>

                                  </span>

                                  <div class="form-group row">
                                      <p>Is there any medical condition or allergy issue that requires monitoring/medication? (Please be elaborate)</p>
                                      <label class="control-label col-md-2 col-sm-2">Health Notes <span class="required">*</span>
                                      </label>
                                      <div class="col-md-5 col-sm-5">
                                              <textarea name="health_notes"  class="form-control col-md-7 col-xs-12">
                                                      {{ old('health_notes')??$participant->health_notes }}
                                              </textarea>
                                              <span class="text-danger">{{ $errors->first('health_notes') }}</span>
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
                                          <input type="text" name="mother_name" value="{{ old('mother_name')?? $participant->mother_name }}" class="form-control col-md-7 col-xs-12" >
                                          <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                      </div>

                                      <label class="control-label col-md-2 col-sm-2">Contact
                                      </label>
                                      <div class="col-md-4 col-sm-4">
                                          <input type="text" name="mother_contact" value="{{ old('mother_contact')??$participant->mother_contact }}" class="form-control col-md-7 col-xs-12">
                                          <span class="text-danger">{{ $errors->first('mother_contact') }}</span>
                                      </div>
                                  </div>
                                  <div class="form-group row">
                                          <label class="control-label col-md-3 col-sm-3">Father’s/Guardian’s Name:
                                          </label>
                                          <div class="col-md-3 col-sm-3">
                                              <input type="text" name="father_name" value="{{ old('father_name')??$participant->father_name }}"  class="form-control col-md-7 col-xs-12">
                                              <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                          </div>

                                          <label class="control-label col-md-2 col-sm-2">Contact
                                              </label>
                                          <div class="col-md-4 col-sm-4">
                                            <input type="text" name="father_contact"  value="{{ old('father_contact')??$participant->father_contact }}" class="form-control col-md-7 col-xs-12">
                                            <span class="text-danger">{{ $errors->first('father_contact') }}</span>
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
                                          <input type="text" name="emergency_contact_name" value="{{ old('emergency_contact_name')??$participant->emergency_contact_name }}"  class="form-control col-md-7 col-xs-12">
                                          <span class="text-danger">{{ $errors->first('emergency_contact_name') }}</span>
                                          </div>

                                          <label class="control-label col-md-1 col-sm-1">Contact
                                              </label>
                                          <div class="col-md-3 col-sm-3">
                                              <input type="text" name="emergency_contact_tel" value="{{ old('emergency_contact_tel')??$participant->emergency_contact_tel }}"  class="form-control col-md-7 col-xs-12">
                                              <span class="text-danger">{{ $errors->first('emergency_contact_tel') }}</span>
                                          </div>
                                  </div>
                                  <div class="form-group row">
                                          <label class="control-label col-md-1 col-sm-1">Relationship
                                              </label>
                                              <div class="col-md-4 col-sm-4">
                                                  <input type="text" name="emergency_contact_relationship"  value="{{ old('emergency_contact_relationship')??$participant->emergency_contact_relationship }}" class="form-control col-md-7 col-xs-12">
                                                  <span class="text-danger">{{ $errors->first('emergency_contact_relationship') }}</span>
                                              </div>
                                  </div>
                              </div>
                              <div class="row" >
                                  <span class="section"> <strong>5.ANY SPECIAL ISSUE/s YOU WANT TO BE ADDRESSED DURING EKISAAKAATE KYA NNABAGEREKA?</strong></span>
                                  <div class="form-group row">
                                          <label class="control-label col-md-2 col-sm-2">Special Notes
                                              </label>
                                              <div class="col-md-4 col-sm-4">
                                                <textarea name="specialNotes"  class="form-control col-md-7 col-xs-12">
                                                        {{ old('specialNotes')??$participant->specialNotes }}
                                                </textarea>
                                                <span class="text-danger">{{ $errors->first('specialNotes') }}</span>
                                              </div>
                                  </div>
                              </div>
                              <div class="row">
                                      <span class="section"> <strong>6.HOW DID YOU GET TO KNOW ABOUT THE EKN PROGRAM?</strong> </span>

                                      <div class="form-group">
                                          <label class="control-label col-md-1 col-sm-1">Response
                                          </label>
                                          <div class="col-md-3 col-sm-3">
                                              <input type="text"  name="response" value="{{ old('response')??$participant->response }}" class="form-control col-md-7 col-xs-12">
                                              <span class="text-danger">{{ $errors->first('response') }}</span>
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
                                                                      <input type="checkbox" name="luganda_classes" value=1  {{ (bool)$participant->luganda_classes?"checked":"" }} class="flat"> Yes
                                                              </label>
                                                         </div>
                                                         <div class="checkbox">
                                                              <label>
                                                                      <input type="checkbox" name="luganda_classes" value=0  {{ (bool)$participant->luganda_classes?"":"checked" }} class="flat"> No
                                                              </label>
                                                         </div>
                                                  </li>
                                              </ul>
                                      </p>
                                      <p class="section">
                                          <button type="submit" class="btn btn-success">
                                              Save
                                          </button>
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
@endsection
