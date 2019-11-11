<?php

namespace App\Http\Controllers;

use Throwable;
use App\Ekisakaate;
use App\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\ApiHelpers\OAuthConsumer;
use App\Http\Controllers\ApiHelpers\OAuthDataStore;
use App\Http\Controllers\ApiHelpers\OAuthException;
use App\Http\Controllers\ApiHelpers\OAuthRequest;
use App\Http\Controllers\ApiHelpers\OAuthServer;
use App\Http\Controllers\ApiHelpers\OAuthSignatureMethod;
use App\Http\Controllers\ApiHelpers\OAuthSignatureMethod_HMAC_SHA1;
use App\Http\Controllers\ApiHelpers\OAuthSignatureMethod_PLAINTEXT;
use App\Http\Controllers\ApiHelpers\OAuthSignatureMethod_RSA_SHA1;
use App\Http\Controllers\ApiHelpers\OAuthToken;
use App\Http\Controllers\ApiHelpers\OAuthUtil;
use \PDF;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd(request()->ekn_d);
        request()->validate([
            'ekn_d'=>'required|integer'
        ]);

        $ekisakaate = Ekisakaate::find(request()->ekn_d);

        return view('participant.create',compact('ekisakaate'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        // dd($request->all());

        try {

            $participant_data = $request->validate([
                'name'=>'required|string',
                'gender'=>'required|string',
                'age'=>'required|integer',
                'class'=>'required|string',
                'school'=>'required|string',
                'residence'=>'required|string',
                'religion'=>'required|string',
                'image_name'=>'nullable|file|image',
                'health_notes'=>'required|string',
                'first_time'=>'required|string',
                // 'years'=>'nullable|string',
                'mother_name'=>'nullable|string',
                'mother_contact'=>'nullable|string',
                'father_name'=>'nullable|string',
                'father_contact'=>'nullable|string',
                'emergency_contact_name'=>'required|string',
                'emergency_contact_tel'=>'required|string',
                'emergency_contact_relationship'=>'required|string',
                'contact_email'=>'required|email',
                'specialNotes'=>'required|string',
                'response'=>'required|string',
                'luganda_classes'=>'required|integer',
                'conscent'=>'required|integer',
                'conscent_date'=>'required|date',
                'agree'=>'required|integer',
                'agree_date'=>'required|date',
                'ekn_id'=>'required|integer'
            ]);

            $newParticipant = Participant::create($participant_data);
        } catch (ValidationException $th) {

            //  dd($th);
            throw $th;

        }catch(Throwable $th){
            return back()->with('warning','Something Went Wrong');
            // dd($th);
        }

        $this->storeImage($newParticipant);

        // check if payment is by cash
        if ($request->p_type_input=='c') {

            $newParticipant->update([

                'isPaid'=>true,

                ]);

                return redirect(route('participants.show',[$newParticipant]));

        }else{

            return $this->makeParticipantPayment($newParticipant);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function show(Participant $participant)
    {
        //
        return view('participant.show',compact('participant'));

    }


    public function generatePdf(Participant $participant)
    {

        $pdf = PDF::loadView('participant/pdfPrintView',compact('participant'));
        return $pdf->stream("participant-".$participant->id.".pdf");

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participant  $participant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Participant $participant)
    {
        //
        $ekn = $participant->ekn;
        $image_path = $participant->image_name;

        if ($image_path) {
            File::delete(public_path('storage/'.$image_path));
        }
        $participant->delete();
        return redirect(route('ekns.show',[$ekn]))->with('success','Participant removed successfully');

    }

    public function storeImage(Participant $participant)
    {
        if (request()->has('image_name')) {
            $participant->update(
                [
                    'image_name'=>request()->image_name->store('uploads','public')
                ]
            );

            // $image = Image::make(public_path('storage/'.$participant->image_name))->fit(200,180);
            // $image->save();
        }
    }

    public function signatureMethod()
    {
        return new OAuthSignatureMethod_HMAC_SHA1();
    }

    public function makeParticipantPayment(Participant $participant){

            $reference = $participant->getRouteKey();//unique order id of the transaction, generated
            $participant->update(['payment_reference'=>$reference]);

            $token = $params = NULL;
            $consumer_key = 'BLLEhnI/koKYAJ3PsJEgL3RcWRMrblU+';
            $consumer_secret='wLz4ntDRAF8D0EMaRbykZjnmlfA=';
            // $consumer_key = 'QJotK9ZtKoDTHyow6aAEHLwPUhQpa1jZ';
            // $consumer_secret='k84uKG3iCbmnRr7FqUhQAfMKt1I=';
            $signature_method = $this->signatureMethod();
            $iframelink = 'http://demo.pesapal.com/api/PostPesapalDirectOrderV4';

            // $amount = $_POST['amount'];
            $amount = "200";
            $amount = number_format($amount, 2); //format amount to 2 decimal places
            $desc = 'description';
            $type = 'MERCHANT'; //default value = MERCHANT
            $first_name = $participant->name; //[optional]
            $last_name = " ";
            $email = $participant->contact_email;
            //ONE of email or phonenumber is required
            $Currency = "UGX";

            $callback_url=route('payment.redirect');
            $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"".$amount."\"  Description=\"".$desc."\" Type=\"".$type."\" Reference=\"".$reference."\" FirstName=\"".$first_name."\" LastName=\"".$last_name."\" Email=\"".$email."\"  xmlns=\"http://www.pesapal.com\"/>";
            $post_xml = htmlentities($post_xml);

            $consumer = new OAuthConsumer($consumer_key,$consumer_secret);

            //post transaction to pesapal
            $iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token,"GET",$iframelink, $params);
            $iframe_src->set_parameter("oauth_callback", $callback_url);
            $iframe_src->set_parameter("pesapal_request_data", $post_xml);
            $iframe_src->sign_request($signature_method, $consumer, $token);

            return view('participant.paymentView',["iframe_data"=>$iframe_src]);
		// return $iframe_src;
            }

            public function paymentRedirect(Request $request)
            {

                $pesapalTrackingId = $request->pesapal_transaction_tracking_id;
                $pesapal_merchant_reference = $request->pesapal_merchant_reference;
                return redirect(route('ekn.payment_msg',["pesapalTrackingId"=>$pesapalTrackingId,"pesapal_merchant_reference"=>$pesapal_merchant_reference]));

            }

            // api request
            public function handlePaymentResponse($pesapal_transaction_tracking_id,$pesapal_merchant_reference)
            {
                $consumer_key = 'BLLEhnI/koKYAJ3PsJEgL3RcWRMrblU+';
                $consumer_secret='wLz4ntDRAF8D0EMaRbykZjnmlfA=';
                $statusrequestAPI='https://demo.pesapal.com/api/querypaymentstatus';

                $pesapalNotification ="CHANGE";
                $pesapalTrackingId =$pesapal_transaction_tracking_id;

                $participant = Participant::where('payment_reference',$pesapal_merchant_reference)->first();

                if ($pesapalNotification=="CHANGE" && $pesapalTrackingId!='') {

                    $token = $params = NULL;
                    $consumer = new OAuthConsumer($consumer_key, $consumer_secret);
                    //get transaction status
                    $request_status = OAuthRequest::from_consumer_and_token($consumer,$token, "GET", $statusrequestAPI, $params);
                    $request_status->set_parameter("pesapal_merchant_reference",$pesapal_merchant_reference);
                    $request_status->set_parameter("pesapal_transaction_tracking_id",$pesapalTrackingId);
                    $request_status->sign_request($this->signatureMethod(), $consumer, $token);

                    $ch=curl_init();
                    curl_setopt($ch,CURLOPT_URL, $request_status);
                    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch,CURLOPT_HEADER, 1);
                    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, 0);

                    if(defined('CURL_PROXY_REQUIRED')) if (CURL_PROXY_REQUIRED == 'True')
                    {
                            $proxy_tunnel_flag = (defined('CURL_PROXY_TUNNEL_FLAG') &&
                            strtoupper(CURL_PROXY_TUNNEL_FLAG) == 'FALSE') ? false : true;
                            curl_setopt ($ch, CURLOPT_HTTPPROXYTUNNEL, $proxy_tunnel_flag);
                            curl_setopt ($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
                            curl_setopt($ch, CURLOPT_PROXY, CURL_PROXY_SERVER_DETAILS);
                    }

                    $response = curl_exec($ch);

                    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                    $raw_header = substr($response, 0, $header_size - 4);
                    $headerArray = explode("\r\n\r\n", $raw_header);
                    $header= $headerArray[count($headerArray) - 1];

                    //transaction status
                    $elements = preg_split("/=/",substr($response,$header_size));
                    $status = $elements[1];

                    curl_close ($ch);

                    if ($status=="FAILED") {

                        // todo: check status if failed, clear the data from the database

                        $type = "warning";

                        $message = "Your transaction has failed please try again.";

                        $this->destroy($participant);

                        return response()->json(["participant"=>null,"type"=>$type,"message"=>$message]);

                    }else{

                        $participant->update([

                            'payment_tracking_id'=>$pesapalTrackingId,

                            'isPaid'=>true,

                            'payment_status'=>$status

                            ]);

                        $type = "success";
                        $message = "Payment Sucessfully made\nThank you.";

                        return response()->json(["participant"=>$pesapal_merchant_reference,"type"=>$type,"message"=>$message]);

                    }

                }

            }

            public function payment_message($pesapalTrackingId,$pesapal_merchant_reference)
            {

                return view('participant.paymentRedirect',compact('pesapal_merchant_reference','pesapalTrackingId'));

            }


        }
