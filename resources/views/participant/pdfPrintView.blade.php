
@extends('layouts.pdfBase')

@section('content')


{{-- <div id="numbers" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- number -->
				<div class="col-md-3 col-sm-6">
					<div class="number">
						<i class="fa fa-smile-o"></i>
						<h3>47k</h3>
						<span>Donors</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-md-3 col-sm-6">
					<div class="number">
						<i class="fa fa-heartbeat"></i>
						<h3>154K</h3>
						<span>Children Saved</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-md-3 col-sm-6">
					<div class="number">
						<i class="fa fa-money"></i>
						<h3>785K</h3>
						<span>Donated</span>
					</div>
				</div>
				<!-- /number -->

				<!-- number -->
				<div class="col-md-3 col-sm-6">
					<div class="number">
						<i class="fa fa-handshake-o"></i>
						<h3>357</h3>
						<span>Volunteers</span>
					</div>
				</div>
				<!-- /number -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
</div> --}}

<div class="container-fluid">
        <!-- row -->
        <div class="section row">

            <!-- section title -->
            <div class="col-md-8 col-md-offset-2">
                <div class="title text-center">
                    <p class="sub-title">EKISAAKAATE KYA NNABAGEREKA {{ $participant->ekn->description }} {{ $participant->ekn->year }}</p>
                    <h4 class="title">PARTICIPANT REGISTRATION FORM</h4>
                </div>
            </div>
            <!-- section title -->
        </div>
        <!-- /row -->


        <!-- row -->
        <div class="row">
                <!-- section title -->
                <div class="col-md-8">
                    {{-- <div class="section-title"> --}}
                        <p>1.PARTICIPANT'S INFORMATION</p>
                     {{-- </div> --}}
                </div>
                <!-- section title -->

        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="pull-right col-md-3 col-sm-3">
                    <img src="{{ 'storage/'.$participant->image_name }}" style="width:195px; height:170px;" alt="photo" class="img-thumbnail">
            </div>
        </div>
        <!-- /row -->

        <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <span class="col-md-5"> <strong> Name </strong> </span>
                        <span class="col-md-3" disabled> {{ $participant->name }} </span>
                    </div>

                    <div class="col-md-4 col-sm-4 ">
                            <span> <strong> Gender </strong> </span>
                            <span disabled> {{ $participant->gender }} </span>
                    </div>

                    <div class="col-md-4 col-sm-4">
                            <span> <strong> Age </strong> </span>
                            <span disabled> {{ $participant->age }} </span>
                    </div>

                <div class="col-md-4 col-sm-4 ">
                        <span> <strong> Class </strong> </span>
                        <span disabled> {{ $participant->class }} </span>
                </div>
                <div class="col-md-12 "></div>
        </div>
        <div class="row"></div>
        <div class="row">

                <div class="col-md-4 col-sm-4 pull-left">
                        <span> <strong>School</strong> </span>
                        <span> {{ $participant->school }} </span>
                </div>

                <div class="col-md-7 col-sm-7 pull-left text-center">
                        <span> <strong>Residence</strong> </span>
                        <span> {{ $participant->residence }}</span>
                </div>

                <div class="col-md-4 col-sm-4 pull-left ">
                        <span> <strong>Religion</strong> </span>
                        <span> {{ $participant->religion }}</span>
                </div>

        </div>



    <!-- row -->
    <div class="section">

            <!-- section title -->
            <div class="col-md-8 col-md-offset-2">
                <div class="title">
                <p>2.PARTICIPANT HEALTH CHECK</p>
                    {{-- <p class="sub-title">PARTICIPANT REGISTRATION FORM</p> --}}
                </div>
            </div>
            <!-- section title -->

            <div class="row">
                <div class="col-md-12">
                        Is there any medical condition or allergy issue that requires monitoring/medication? (Please be elaborate)
                </div>
                    <div class="col-md-5 col-sm-5">
                            <label class="control-label col-md-2 col-sm-2">Health Notes <span class="required">*</span>
                            </label>
                        <span disabled class="form-control">
                                    {{ $participant->health_notes }}
                        </span>
                    </div>
            </div>

    </div>
    <!-- /row -->


    <div class="row">
            <!-- section title -->
            <div class="col-md-8 col-md-offset-2">
                    <div class="title">
                    <p>3.EKISAAKAATE KYA NNABAGEREKA ATTENDANCE</p>
                        {{-- <p class="sub-title">PARTICIPANT REGISTRATION FORM</p> --}}
                    </div>
            </div>
                <!-- section title -->

                <div class="row">
                    <div class="col-md-12">
                            Is this the participant’s first time to attend the Ekisaakaate Kya Nnabagereka?(Yes/No)
                    </div>
                        <div class="col-md-1 col-sm-1">
                        <span class="form-control" disabled >{{ $participant->first_time }}</span>
                        </div>
                </div>

                <div class="form-group row">
                        <div class="col-md-1 col-sm-1">
                            <label class="control-label col-md-1 col-sm-1">If no (Please tick the appropriate years)</label>
                            <label>0</label>
                        </div>
                </div>

    </div>
    <!-- row -->

    <div class="section">

            <div class="row">
                    <!-- section title -->
                    <div class="col-md-8 col-md-offset-2">
                        <div class="title">
                        <p>4.PARENT/GUARDIAN (PLEASE SPECIFY)</p>
                            {{-- <p class="sub-title">PARTICIPANT REGISTRATION FORM</p> --}}
                        </div>
                    </div>
                    <!-- section title -->
            </div>
            <div class="row">
                    <div class="col-md-6 pull-left">
                            <div class="row">
                                    <label class="control-label col-md-3 col-sm-3">Mother’s/Guardian’s Name:
                                    </label>
                                    <div class="col-md-3 col-sm-3">
                                    <span>{{ $participant->mother_name }}</span>
                                    </div>

                                    <label class="control-label col-md-2 col-sm-2">Contact
                                    </label>
                                    <div class="col-md-4 col-sm-4">
                                    <span>{{ $participant->mother_contact }}</span>
                                    </div>
                            </div>
                    </div>
                    <div class="col-md-6 pull-right">
                            <div class="form-group row">
                                    <label class="control-label col-md-3 col-sm-3">Father’s/Guardian’s Name:
                                    </label>
                                    <div class="col-md-3 col-sm-3">
                                        <span>{{ $participant->father_name }}</span>
                                    </div>

                                    <label class="control-label col-md-2 col-sm-2">Contact
                                        </label>
                                    <div class="col-md-4 col-sm-4">
                                        <span>{{ $participant->father_contact }}</span>
                                    </div>
                            </div>
                    </div>
            </div>

    </div>
    <!-- /row -->

    <p>
        <strong>
                IN CASE OF ANY EMERGENCY, PLEASE LIST A PERSON WE CAN CONTACT IF WE ARE UNABLE TO REACH YOU.
        </strong>
    </p>
    <p>Emergency Contact</p>

    <div class="form-group row">

        <div class="col-md-4 col-sm-4 pull-left">
                <label class="control-label col-md-1 col-sm-1">Name:
                </label>
                <div class="col-md-3 col-sm-3">
                    <span>{{ $participant->emergency_contact_name }}</span>
                </div>
        </div>

        <div class="col-md-4 col-sm-4 pull-left">
                <label class="control-label col-md-1 col-sm-1">Contact
                    </label>
                <div class="col-md-3 col-sm-3">
                    <span>{{ $participant->emergency_contact_tel }}</span>
                </div>
        </div>

        <div class="col-md-4 col-sm-4 pull-left">
                <label class="control-label col-md-1 col-sm-1">Relationship</label>
                <div class="col-md-4 col-sm-4">
                    <span>{{ $participant->emergency_contact_relationship }}</span>
                </div>
        </div>

    </div>
    <div class="row" >
            <span class="section"> <strong>5.ANY SPECIAL ISSUE/s YOU WANT TO BE ADDRESSED DURING EKISAAKAATE KYA NNABAGEREKA?</strong></span>

            <div class="form-group row text-center">
                        <div class="col-md-4 col-sm-4">
                                <span class="control-label col-md-2 col-sm-2">
                                    <strong>Special Notes</strong>
                                </span>
                            <span>{{ $participant->specialNotes }}</span>
                        </div>
            </div>
    </div>
    <div class="row">
            <span class="section"> <strong>6.HOW DID YOU GET TO KNOW ABOUT THE EKN PROGRAM?</strong> </span>

            <div class="form-group row text-center">
                    <div class="col-md-4 col-sm-4">
                            <span class="control-label col-md-2 col-sm-2">
                                <strong>Response</strong>
                            </span>
                        <span>{{ $participant->response }}</span>
                    </div>
        </div>

    </div>

    <div class="row">
            <p class="section text-center"> <strong>PARENT’S/GUARDIAN’S INFORMATION.</strong></p>
            <p>
                <p><strong>EKN FEES: 352,200/= (Three hundred fifty two thousand two hundred shillings only)</strong></p>
                <span><strong>Breakdown:</strong></span>
                <ul>
                        <li>Registration Fee: 10,000/= (paid in cash on registration)</li>
                        <li>Participation Fee: 300,000/=</li>
                        <li>EKN Uniform Fee: 40,000/=</li>
                        <li>Bank Charges: 2,200/=</li>
                </ul>
            </p>

            <p>
                    <p><strong>PAYMENTS MUST BE MADE  USING A PAYSLIP</strong></p>

                    <ul>
                            <li>Finance Trust Bank A/C Name: Nnabagereka Development Foundation A/C Number: 206252000066</li>
                            <li>DFCU Bank A/C Name: The Nnabagereka Development Foundation Ltd A/C Number: 01073522568076</li>
                            <li>Through Centemobile to Centenary Bank. A/C Name: Ekisaakaate A/C Number: 4210600091</li>

                    </ul>
                    (All payments must be receipted) Please return the office copy of the bank slip after payment to the registration centers.
            </p>


            <p>
                    <p><strong>REQUIREMENTS (PLEASE LABEL ALL PROPERTY)</strong></p>
                    Bed sheets, blanket, (NO MATTRESS), mosquito net, decent clothes, (include; a pair of black trousers for boys and a mid-calf black skirt for girls), sweater, nightwear/pajamas, sportswear & sports shoes, slippers, toothbrush, toothpaste, washing & bathing soap, sponge, vaseline, bucket or basin, towel, water bottles, a plate, cup, spoon/fork N.B: A rubber sheath (if participant wets the bed).
                    <br>
                    <strong>PROHIBITED ITEMS:</strong> electronic gadgets, make-up, skin piercing instruments, eats, drinks and pocket money.
            </p>
            <p>
                    <p><strong>SPECIAL INSTRUCTIONS AND EVENTS:</strong></p>
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
                    <p><strong>CONSCENT:</strong></p>
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
                                <span>{{ $participant->conscent_date }}</span>

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

                                <span>{{ $participant->agree_date }}</span>

                            </div>
                    </strong>
            </p>
            <p class="section text-center">
                  Ekisaakaatee {{ $participant->ekn->description }} {{ $participant->ekn->activeyear->name }} at {{ $participant->ekn->venue }}
            </p>
    </div>



</div>


@endsection
