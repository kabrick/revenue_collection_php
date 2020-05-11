<?php

use AfricasTalking\SDK\AfricasTalking;

function send_sms($number, $message) {
    $username = 'revenue_collection';
    $apiKey   = '12e8c0fe93cec4c56326710b38315979de39b9a6211546d5ada943b2c37c5452';
    $AT       = new AfricasTalking($username, $apiKey);

    // Get one of the services
    $sms = $AT->sms();

    // Use the service
    $result = $sms->send([
        'to'      => $number, // +256705003878
        'message' => $message
    ]);
}
