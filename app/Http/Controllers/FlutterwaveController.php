<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class FlutterwaveController extends Controller
{
    public function initialize()
    {

        //This generates a payment reference
        $reference = Flutterwave::generateReference();

        // Enter the details of the payment
        $data = [
            'payment_options' => 'card,banktransfer,momo,ach_payment,voucher_payment,mobile_money_ghana',
            'amount' => request()->amount,
            'email' => request()->email,
            'tx_ref' => $reference,
            'currency' => "USD",
            'redirect_url' => route('rave-callback'),
            'customer' => [
                'email' => request()->email
            ],
            'meta' => [
                'userid'=> request()->userid,
                'credits'=> request()->item_number
            ],
            "customizations" => [
                "Hits" => request()->item_name,
            ]
        ];



        //* Ca;; f;iterwave emdpoint
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer FLWSECK_TEST-129585cb95c46701a1fe16c111b1be71-X',
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $res = json_decode($response);
        if ($res->status == 'success') {
            $link = $res->data->link;
            header('Location: ' . $link);
        } else {
            echo 'We can not process your payment';
        }

        return response()->json($res);

        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['link']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback()
    {


        $status = request()->status;

        //if payment is successful
        if ($status ==  'successful') {
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            $txid = $_GET['transaction_id'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/transactions/{$txid}/verify",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer FLWSECK_TEST-129585cb95c46701a1fe16c111b1be71-X"
                ),
            ));

            $response = curl_exec($curl);
            
            
            curl_close($curl);
            
            $res = json_decode($response);
            
            if ($res->status) {
                
                $credits = $res->data->meta->credits;
                
                User::where('id','=' ,Auth::user()->id)->increment('credits', $credits);
                
                
                return redirect()->route('credits')->with('success_msg', 'Transaction success! Added '. $credits . " credits to your account.");
                
            } else {
                return redirect()->route('credits')->with('success_msg', 'Can not process payment');             
            }

        } elseif ($status ==  'cancelled') {
            return redirect()->route('credits')->with('error_msg', 'Transaction cancelled!');
        } else {
            return redirect()->route('credits')->with('error_msg', 'Transaction failed!');
            //Put desired action/code after transaction has failed here
        }
        // Get the transaction from your DB using the transaction reference (txref)
        // Check if you have previously given value for the transaction. If you have, redirect to your successpage else, continue
        // Confirm that the currency on your db transaction is equal to the returned currency
        // Confirm that the db transaction amount is equal to the returned amount
        // Update the db transaction record (including parameters that didn't exist before the transaction is completed. for audit purpose)
        // Give value for the transaction
        // Update the transaction to note that you have given value for the transaction
        // You can also redirect to your success page from here

    }
}
