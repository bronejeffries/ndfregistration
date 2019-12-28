@extends('layouts.base')

@section('content')
<div id="loader"></div>
<div id="myDiv" class="animate-bottom">
    <div class="page-title">
      <div class="title_left">
        <h3>Confirm Pending Payments</h3>
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
                        <p class="text-right">
                            <a class="btn btn-primary" href="{{ route('ekns.show',$ekisakaate) }}"> Back</a>
                        </p>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <br />
                      <form class="form" action="{{ route('ekns.confirmpayment') }}" method="POST">

                        @csrf

                        @foreach ($paymentsToConfirm as $payment)
                            <div class="row card">
                                <div class="col-md-4 text-left">
                                    <p>
                                        Confirm a payment of <strong>{{ $payment->amount_to_confirm }}</strong> made for <strong>{{ $payment->name }}</strong> as of {{ $payment->updated_at }}
                                    </p>
                                    <p>
                                        Participant reciepts: <strong>{{ $payment->participation_reciepts }} </strong>as of {{ $payment->updated_at }}
                                    </p>
                                </div>
                                <div class="col-md-2">
                                        <select class="form-control" name="confirmations[{{ $payment->getRouteKey() }}]">
                                            <option value="">Select choice....</option>
                                            <option value=1 data-action="conf_">Confirm</option>
                                            <option value=0 data-action="deny_">Cancel/Deny</option>
                                        </select>
                                        <i id="action_icon{{ $payment->id }}" class="fa fa-check"></i>
                                </div>
                                <div class="col-md-2 text-center">
                                        <p>
                                           <a href="#" class="expand" data-expand="expand" data-target="details{{ $payment->id }}">
                                                <i class="fa fa-plus" ></i> Expand details
                                           </a>
                                        </p>
                                </div>
                                <div id="details{{ $payment->id }}" style="display:none" class="col-md-3 text-left">
                                        <p>Name: <strong>{{ $payment->name }}</strong> </p>
                                        <p>Gender: <strong>{{ $payment->gender }}</strong></p>
                                        <p>Age: <strong>{{ $payment->age }}</strong> </p>
                                        <p>Class: <strong>{{ $payment->class  }}</strong> </p>
                                        <p>School: <strong>{{ $payment->school }}</strong> </p>
                                        <p>Residence: <strong>{{ $payment->residence }}</strong> </p>
                                        <p>Religion: <strong>{{ $payment->religion }}</strong> </p>
                                </div>
                            </div>
                            <hr>
                        @endforeach

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Done</button>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>

    </div>
</div>

@endsection


