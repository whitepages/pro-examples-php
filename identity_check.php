<?php

require_once 'vendor/autoload.php';

$url     = 'https://proapi.whitepages.com/3.2/identity_check.json';
$headers = ['Accept' => 'application/json'];
$query   = [
            'primary.name'                    => 'Drama Number',
            'primary.phone'                   => '6464806649',
            'primary.address.street_line_1'   => '302 Gorham Ave',
            'primary.address.city'            => 'Ashland',
            'primary.address.state_code'      => 'MT',
            'primary.address.postal_code'     => '59004',
            'primary.address.country_code'    => 'US',
            'secondary.name'                  => 'Drama Number',
            'secondary.phone'                 => '6464806649',
            'secondary.address.street_line_1' => '302 Gorham Ave',
            'secondary.address.city'          => 'Ashland',
            'secondary.address.state_code'    => 'MT',
            'secondary.address.postal_code'   => '59004',
            'secondary.address.country_code'  => 'US',
            'email_address'                   => 'medjalloh1@yahoo.com',
            'ip_address'                      => '64.124.61.215',
            'api_key'                         => getenv('ID_CHECK_API_KEY'),
           ];

$response = Unirest\Request::get($url, $headers, $query);

$available_checks = [
                     'primary_phone_checks',
                     'primary_address_checks',
                     'secondary_name_checks',
                     'secondary_phone_checks',
                     'shipping_address_checks',
                     'email_address_checks',
                     'ip_address_checks',
                    ];

foreach ($available_checks as $check) {
    // Unirest decodes json by default to stdClass.
    echo json_encode($response->body->$check).PHP_EOL;
}
