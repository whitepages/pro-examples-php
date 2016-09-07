<?php

require_once 'vendor/autoload.php';

$url     = 'https://proapi.whitepages.com/3.0/phone';
$headers = ['Accept' => 'application/json'];
$query   = [
            'phone'                  => '6464806649',
            'api_key'                => getenv('PHONE_SEARCH_API_KEY')
           ];

$response = Unirest\Request::get($url, $headers, $query);

// Unirest decodes json by default to stdClass.
echo json_encode($response->body).PHP_EOL;
