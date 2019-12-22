@extends('layouts.base')

@section('content')

<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>REGISTRATION FORM</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  {{-- <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div> --}}
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>EKISAAKAATE KYA NNABAGEREKA {{ $ekisakaate->description }} {{ $ekisakaate->activeyear->name }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <h2>PARTICIPANT</h2>
                    <!-- Tabs -->
                    <form id="participantForm" action="{{ route('participants.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal form-label-left">
                        @csrf
                        <div id="wizard_verticle" class="form_wizard wizard_verticle">
                            <ul class="list-unstyled wizard_steps">
                                <li>
                                <a href="#step-11">
                                    <span class="step_no">1</span>
                                </a>
                                </li>
                                <li>
                                <a href="#step-22">
                                    <span class="step_no">2</span>
                                </a>
                                </li>
                                <li>
                                <a href="#step-33">
                                    <span class="step_no">3</span>
                                </a>
                                </li>
                                <li>
                                <a href="#step-44">
                                    <span class="step_no">4</span>
                                </a>
                                </li>
                                <li>
                                    <a href="#step-55">
                                        <span class="step_no">5</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-66">
                                        <span class="step_no">6</span>
                                    </a>
                                </li>
                                <li>
                                        <a href="#step-77">
                                            <span class="step_no">7</span>
                                        </a>
                                </li>
                            </ul>

                            <div id="step-11">
                                <h2 class="StepTitle">1</h2>


                                <span class="section">PARTICIPANT'S INFORMATION</span>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3" for="first-name">Name<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                        <input type="hidden" name="ekn_id" value="{{ $ekisakaate->id }}">
                                    <input type="text" id="first-name" value="{{ old('name') }}" name="name" required class="form-control col-md-7 col-xs-12">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3">Gender</label>
                                        <div class="col-md-6 col-sm-6">
                                        <div id="gender2" class="btn-group" data-toggle="buttons">
                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
                                            </label>
                                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                            <input type="radio" name="gender" value="female" checked=""> Female
                                            </label>
                                        </div>
                                        </div>
                                    </div>

                                <div class="form-group">

                                    <label class="control-label col-md-3 col-sm-3" for="Age">Age<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                    <input type="number" id="age" name="age" value="{{ old('age') }}" required class="form-control col-md-7 col-xs-12">
                                    <span class="text-danger">{{ $errors->first('age') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label for="class" class="control-label col-md-3 col-sm-3">Class/Grade</label>
                                    <div class="col-md-6 col-sm-6">
                                    <input id="class" class="form-control col-md-7 col-xs-12" required type="text" value="{{ old('class') }}" name="class">
                                    <span class="text-danger">{{ $errors->first('class') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3">School</label>
                                    <div class="col-md-6 col-sm-6">
                                    <input class="form-control col-md-7 col-xs-12" name="school" value="{{ old('school') }}" required type="text">
                                    <span class="text-danger">{{ $errors->first('school') }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3">Residence</label>
                                        <div class="col-md-6 col-sm-6">
                                        <input class="form-control col-md-7 col-xs-12" name="residence" value="{{ old('residence') }}" required type="text">
                                        <span class="text-danger">{{ $errors->first('residence') }}</span>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3">Religion</label>
                                        <div class="col-md-6 col-sm-6">
                                            <select class="form-control col-md-7 col-xs-12" name="religion" value="{{ old('religion') }}" required id="religionSelect">
                                                <option value="Anglican(Protestant)">Anglican(Protestant)</option>
                                                <option value="Catholic">Catholic</option>
                                                <option value="Moslem">Moslem</option>
                                            </select>
                                            <span class="text-danger">{{ $errors->first('religion') }}</span>
                                        </div>
                                </div>

                                <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3">Image</label>
                                        <div class="col-md-6 col-sm-6">
                                        <input class="col-md-7 col-xs-12" name="image_name" value="{{ old('image_name') }}" type="file">
                                        <span class="text-danger">{{ $errors->first('image_name') }}</span>
                                        </div>
                                </div>


                            </div>
                            <div id="step-22">
                                <h2 class="StepTitle">2</h2>
                                <span class="section">PARTICIPANT HEALTH CHECK</span>

                                <div class="form-group">
                                    <p>Is there any medical condition or allergy issue that requires monitoring/medication? (Please be elaborate)</p>
                                    <label class="control-label col-md-3 col-sm-3">Health Notes <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6">
                                    <textarea name="health_notes" required class="form-control col-md-7 col-xs-12">{{ old('health_notes') }}</textarea>
                                    <span class="text-danger">{{ $errors->first('health_notes') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div id="step-33">
                                <h2 class="StepTitle">3</h2>
                                <span class="section">EKISAAKAATE KYA NNABAGEREKA ATTENDANCE</span>
                                <div class="form-group">
                                    <div id="years" class="form-group" style="display:none">
                                        @foreach ($years as $year)
                                            <label class="control-label col-md-1 col-sm-1">
                                                    {{ $year->name }}
                                            </label>
                                            <div class="col-md-1 col-sm-1">
                                                    <input type="checkbox" name="years[]" value="{{ $year->name }}" class="form-control">
                                            </div>
                                        @endforeach
                                    </div>
                                    <label class="control-label col-md-9 col-sm-9">
                                        Is this the participant’s first time to attend the Ekisaakaate Kya Nnabagereka?(Yes/No) <span class="required">*</span>
                                    </label>
                                    <div class="col-md-2 col-sm-2">
                                    <select id="first_time" name="first_time" required class="form-control col-md-7 col-xs-12">
                                        <option value="No" data-show=false data-target="years">No</option>
                                        <option value="Yes" data-show=true data-target="years">Yes</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('first_time') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div id="step-44">
                                <h2 class="StepTitle">4</h2>
                                <span class="section">PARENT/GUARDIAN (PLEASE SPECIFY)</span>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3">Mother’s/Guardian’s Name:
                                    </label>
                                    <div class="col-md-3 col-sm-3">
                                    <input type="text" name="mother_name" value="{{ old('mother_name') }}" class="form-control col-md-7 col-xs-12">
                                    <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                    </div>

                                    <label class="control-label col-md-2 col-sm-2">Contact
                                    </label>
                                    <div class="col-md-4 col-sm-4">
                                    <input type="text" name="mother_contact" value="{{ old('mother_contact') }}" class="form-control col-md-7 col-xs-12">
                                    <span class="text-danger">{{ $errors->first('mother_contact') }}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3">Father’s/Guardian’s Name:
                                        </label>
                                        <div class="col-md-3 col-sm-3">
                                        <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-control col-md-7 col-xs-12">
                                        <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                        </div>

                                        <label class="control-label col-md-2 col-sm-2">Contact
                                            </label>
                                        <div class="col-md-4 col-sm-4">
                                        <input type="text" name="father_contact" value="{{ old('father_contact') }}" class="form-control col-md-7 col-xs-12">
                                        <span class="text-danger">{{ $errors->first('father_contact') }}</span>
                                        </div>
                                </div>

                                <div class="form-group">

                                    <label class="control-label col-md-2 col-sm-2">Contact Email</label>
                                    <div class="col-md-4 col-sm-4">
                                    <input type="email" name="contact_email" value="{{ old('contact_email') }}" required class="form-control col-md-7 col-xs-12">
                                    <span class="text-danger">{{ $errors->first('contact_email') }}</span>
                                    </div>

                                </div>

                                <p>
                                    <strong>
                                            IN CASE OF ANY EMERGENCY, PLEASE LIST A PERSON WE CAN CONTACT IF WE ARE UNABLE TO REACH YOU.
                                    </strong>
                                </p>
                                <p>Emergency Contact</p>
                                <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3">Name:
                                        </label>
                                        <div class="col-md-3 col-sm-3">
                                        <input type="text" name="emergency_contact_name" value="{{ old('emergency_contact_name') }}" required class="form-control col-md-7 col-xs-12">
                                        <span class="text-danger">{{ $errors->first('emergency_contact_name') }}</span>
                                        </div>

                                        <label class="control-label col-md-2 col-sm-2">Contact
                                            </label>
                                        <div class="col-md-4 col-sm-4">
                                        <input type="text" name="emergency_contact_tel" value="{{ old('emergency_contact_tel') }}" required class="form-control col-md-7 col-xs-12">
                                        <span class="text-danger">{{ $errors->first('emergency_contact_tel') }}</span>
                                        </div>
                                </div>
                                <div class="form-group" >
                                        <label class="control-label col-md-3 col-sm-3">Relationship
                                            </label>
                                            <div class="col-md-6 col-sm-6">
                                            <input type="text" name="emergency_contact_relationship" value="{{ old('emergency_contact_relationship') }}" required class="form-control col-md-7 col-xs-12">
                                            <span class="text-danger">{{ $errors->first('emergency_contact_relationship') }}</span>
                                            </div>
                                </div>
                            </div>
                            <div id="step-55">
                                <h2 class="StepTitle">5</h2>

                                <span class="section">ANY SPECIAL ISSUE/s YOU WANT TO BE ADDRESSED DURING EKISAAKAATE KYA NNABAGEREKA?</span>


                                <div class="form-group" >
                                        <label class="control-label col-md-2 col-sm-2">Special Notes
                                            </label>
                                            <div class="col-md-4 col-sm-4">
                                            <textarea name="specialNotes" required class="form-control col-md-7 col-xs-12">
                                                {{ old('specialNotes') }}
                                            </textarea>
                                            <span class="text-danger">{{ $errors->first('specialNotes') }}</span>
                                            </div>
                                </div>
                            </div>
                            <div id="step-66">
                                    <h2 class="StepTitle">6</h2>
                                    <span class="section">HOW DID YOU GET TO KNOW ABOUT THE EKN PROGRAM?</span>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3">Response
                                        </label>
                                        <div class="col-md-6 col-sm-6">
                                        <input type="text" required name="response" value="{{ old('response') }}" class="form-control col-md-7 col-xs-12">
                                        <span class="text-danger">{{ $errors->first('response') }}</span>
                                        </div>
                                    </div>
                            </div>
                            <div id="step-77">
                                    <h2 class="StepTitle">7</h2>
                                    <span class="section">PARENT’S/GUARDIAN’S INFORMATION.</span>
                                    <p>
                                        <h4><strong>EKN FEES: 352,200/= (Three hundred fifty two thousand two hundred shillings only)</strong></h4>
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
                                                                    <input type="checkbox" name="luganda_classes" value=1 class="flat"> Yes
                                                            </label>
                                                       </div>
                                                       <div class="checkbox">
                                                            <label>
                                                                    <input type="checkbox" name="luganda_classes" value=0 class="flat"> No
                                                            </label>
                                                            <span class="text-danger">{{ $errors->first('luganda_classes') }}</span>
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
                                                                    <input type="checkbox" name="conscent" value=1 required class="flat"> I conscent
                                                            </label>
                                                            <span class="text-danger">{{ $errors->first('conscent') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                                Date:
                                                        </label>

                                                        <fieldset>
                                                                <div class="control-group">
                                                                  <div class="controls">

                                                                      <input type="date" class="has-feedback-left" value="{{ old('conscent_date') }}" name="conscent_date">
                                                                      <span class="text-danger">{{ $errors->first('conscent_date') }}</span>
                                                                  </div>
                                                                </div>
                                                        </fieldset>

                                                    </div>
                                                    I allow EKN counsellors to offer any professional assistance needed to my child and also do follow up sessions where need be.
                                                    <div class="checkbox">
                                                            <label>
                                                                    <input type="checkbox" name="agree" value="1" class="flat"> I Agree
                                                            </label>
                                                            <span class="text-danger">{{ $errors->first('agree') }}</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>
                                                                Date:
                                                        </label>

                                                        <fieldset>
                                                                <div class="control-group">
                                                                  <div class="controls">
                                                                      <input type="date" class="has-feedback-left" value="{{ old('agree_date') }}" name="agree_date">
                                                                      <span class="text-danger">{{ $errors->first('agree_date') }}</span>
                                                                  </div>
                                                                </div>
                                                        </fieldset>

                                                        <input type="hidden" name="p_type_input" id="p_type_">

                                                    </div>
                                            </strong>
                                    </p>
                                    <p>
                                            Ekisaakaatee {{ $ekisakaate->description }} {{ $ekisakaate->activeyear->name }} at {{ $ekisakaate->venue }}
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

{{-- summary graph modal --}}
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Payment</h4>
        </div>
        <div class="modal-body">
                <div class="x_panel">
                <div class="x_content">
                        <div class="row">
                            <div class="col-md-5">
                                <button class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('p_type_').value='c'; document.getElementById('participantForm').submit(); ">Cash <br> Payment</button>
                            </div>
                            <div class="col-md-5">
                                    <button class="btn btn-default" disabled>Online <br> Payment</button>
                            </div>
                        </div>
                </div>
                </div>
        </div>

      </div>
    </div>
</div>

<script>

document.getElementById('first_time').addEventListener('click',function(e){
    Array.from(this.options).forEach(option=>{
        if (option.selected) {

            if (option.dataset.show=='true') {

                document.getElementById(option.dataset.target).style.display="block"

            }else{
                document.getElementById(option.dataset.target).style.display="none"
            }

        }
    })
})

</script>

@endsection
