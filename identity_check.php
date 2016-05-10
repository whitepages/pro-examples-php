<?php

require_once 'vendor/autoload.php';

$url     = 'https://proapi.whitepages.com/3.1/identity_check.json';
$headers = ['Accept' => 'application/json'];
$query   = [
            'billing.name'                   => 'Drama Number',
            'billing.phone'                  => '6464806649',
            'billing.address.street_line_1'  => '302 Gorham Ave',
            'billing.address.city'           => 'Ashland',
            'billing.address.state_code'     => 'MT',
            'billing.address.postal_code'    => '59004',
            'billing.assress.country_code'   => 'US',
            'shipping.name'                  => 'Drama Number',
            'shipping.phone'                 => '6464806649',
            'shipping.address.street_line_1' => '302 Gorham Ave',
            'shipping.address.city'          => 'Ashland',
            'shipping.address.state_code'    => 'MT',
            'shipping.address.postal_code'   => '59004',
            'shipping.assress.country_code'  => 'US',
            'email_address'                  => 'medjalloh1@yahoo.com',
            'ip_address'                     => '64.124.61.215',
            'api_key'                        => getenv('ID_CHECK_API_KEY'),
           ];

$response = Unirest\Request::get($url, $headers, $query);

$available_checks = [
                     'billing_name_checks',
                     'billing_phone_checks',
                     'billing_address_checks',
                     'shipping_name_checks',
                     'shipping_phone_checks',
                     'shipping_address_checks',
                     'email_address_checks',
                     'ip_address_checks',
                    ];

foreach ($available_checks as $check) {
    // Unirest decodes json by default to stdClass.
    echo json_encode($response->body->$check).PHP_EOL;
}
