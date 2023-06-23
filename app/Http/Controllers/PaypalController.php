<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{

    public function payment()
    {
        $data = [];
        $data['items'] = [
            [
                'name'=>'product1',
                'price'=>1000,
                'desc'=>'product1 description',
                'qty'=>2,
            ],
            [
                'name'=>'product2',
                'price'=>300,
                'desc'=>'product2 description',
                'qty'=>2,
            ],
        ];
        $data['invoice_id'] = 1;
        $data['invoice_description'] = 1;
        $data['return_url'] = 'http://127.0.0.1:8000/payment.sucess';
        $data['cancel_url'] = 'http://127.0.0.1:8000';
        $data['total'] = 2600;

        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data,true);

        return Redirect::to($response['paypal_link']);
    }


    public function success(Request $request)
    {
        $token = $request->get('token');
        $payerId = $request->get('PayerID');
        $provider = new ExpressCheckout; // create a new instance of the PayPal provider
        $response = $provider->getExpressCheckoutDetails($token);

        if ($response['ACK'] == 'Success') {
            $payment = $provider->doExpressCheckoutPayment($response,$token,$payerId);

            if ($payment['ACK'] == 'Success') {
                // Payment was successful, process it here
                return dd("Success order"); // use a view instead of dd() to show the success message
            } else {
                // Payment was not successful, redirect to cancel URL
                return dd("cancel order");
            }
        } else {
            // Payment was not successful, redirect to cancel URL
            return dd("cancel order");
        }
    }

    public function cancel()
    {
        // Handle canceled payment here
        return dd("cancel order"); // use a view instead of dd() to show the cancellation message
    }
}
