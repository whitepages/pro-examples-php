<?php

require_once 'vendor/autoload.php';

$url     = 'https://proapi.whitepages.com/3.1/lead_verify.json';
$headers = ['Accept' => 'application/json'];
$query   = [
            'name'                  => 'Drama Number',
            'phone'                 => '6464806649',
            'email_address'         => 'medjalloh1@yahoo.com',
            'address_city'          => 'Ashland',
            'address.postal_code'   => '59004',
            'address.state_code'         => 'MT',
            'address.street_line_1' => '302 Gorham Ave',
            'ip_address'            => '108.194.128.165',
            'api_key'               => getenv('LEAD_VERIFY_API_KEY'),
           ];

$response = Unirest\Request::get($url, $headers, $query);

$available_checks = [
                     'name_checks',
                     'phone_checks',
                     'address_checks',
                     'email_address_checks',
                     'ip_address_checks',
                    ];

foreach ($available_checks as $check) {
    // Unirest decodes json by default to stdClass.
    echo json_encode($response->body->$check).PHP_EOL;
}
