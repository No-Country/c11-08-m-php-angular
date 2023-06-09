<?php

namespace App\Services;
use App\Models\Payment;

class PaymentService
{

    public function createSubscription(array $array)
    {
        try {
            $start_date = date_create('now');
            if($array['plan']['id'] == 1){
                $frequency = 3 + $array['plan']['free_months'];
                $end_date = date_add(date_create('now'), date_interval_create_from_date_string("4 months"));
            }
            else if($array['plan']['id'] == 2){
                $frequency = 6 + $array['plan']['free_months'];
                $end_date = date_add(date_create('now'), date_interval_create_from_date_string("8 months"));
            }
            else if($array['plan']['id'] == 3){
                $frequency = 12 + $array['plan']['free_months'];
                $end_date = date_add(date_create('now'), date_interval_create_from_date_string("15 months"));
            }

            $url = 'https://api.mercadopago.com/preapproval';
            
            $body = [
                "reason"=> "Plan ". $array['plan']['type'],
                "auto_recurring" => [
                    "frequency" => $frequency,
                    "frequency_type" => "months",
                    "start_date" => date_format($start_date, 'Y-m-d\TH:i:s.v\Z'), // fecha actual
                    "end_date" => date_format($end_date, 'Y-m-d\TH:i:s.v\Z'),
                    "transaction_amount" => $array['plan']['price'],
                    "currency_id" => "ARS",
                ],
                "back_url" => "https://tunexo-08.web.app/payment/confirm-data",
                // "payment_methods" => [
                //     "installments" => 3
                // ],
                "payer_email" => $array['payer_email'] //"test_user_608638063@testuser.com",
                // "notification_url" => "https://www.your-site.com/ipn",
            ];
            $data = json_encode($body, true);
            $defaults = array(
                CURLOPT_URL => $url,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => ["Content-Type: application/json","Authorization: Bearer ".env('ACCESS_TOKEN')]
            );

            $ch = curl_init();
            curl_setopt_array($ch, ($defaults));
            $response = curl_exec($ch);

            if(curl_errno($ch)) echo curl_error($ch);
            else $decoded = json_decode($response, true);

            curl_close($ch);
            return $decoded;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getPayments()
    {
        try {
            return Payment::all();
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getPayment(Payment $payment)
    {
        try {
            return $payment;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function createPayment(array $request)
    {
        try {
            $payment = Payment::create(
                [
                    'plan_id' => $request['plan_id'],
                    'teacher_id' => $request['teacher_id'],
                    'fee' => $request['fee'],
                    'total_paid' => $request['total_paid'],
                    'start_date' => $request['start_date'],
                    'end_date' => $request['end_date'],
                ]
            );
            return $payment;
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updatePayment(array $request, Payment $payment)
    {
        try {
            $payment->update($request);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deletePayment(Payment $payment)
    {
        try {
            $payment->delete();
        } catch (\Exception $e) {
            throw $e;
        }
    }

}