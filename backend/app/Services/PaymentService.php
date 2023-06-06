<?php

namespace App\Services;


class PaymentService
{

    public function createSubscription(array $array)
    {
        try {
            $start_date = date_create('now');
            if($array['id'] == 1){
                $frequency = 3 + $array['free_months'];
                $end_date = date_add(date_create('now'), date_interval_create_from_date_string("4 months"));
            }
            else if($array['id'] == 2){
                $frequency = 6 + $array['free_months'];
                $end_date = date_add(date_create('now'), date_interval_create_from_date_string("8 months"));
            }
            else if($array['id'] == 3){
                $frequency = 12 + $array['free_months'];
                $end_date = date_add(date_create('now'), date_interval_create_from_date_string("15 months"));
            }

            $url = 'https://api.mercadopago.com/preapproval';
            
            $body = [
                "reason"=> "Plan ". $array['type'],
                "auto_recurring" => [
                    "frequency" => $frequency,
                    "frequency_type" => "months",
                    "start_date" => date_format($start_date, 'Y-m-d\TH:i:s.v\Z'), // fecha actual
                    "end_date" => date_format($end_date, 'Y-m-d\TH:i:s.v\Z'),
                    "transaction_amount" => $array['price'],
                    "currency_id" => "ARS",
                ],
                "back_url" => "https://tunexo-08.web.app/payment/confirm-data",
                // "payment_methods" => [
                //     "installments" => 3
                // ],
                "payer_email" => "test_user_608638063@testuser.com",
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

}