<?php
require "vendor/autoload.php";

$api = new \API2Client\Api('api2.templatemonsterdev.com', 'motopress', 'F7BB4C0D1F1D53CF32A0E482028EC284F72F4C3A');

$subscriptionId = '5rggFgMdUm12dn5757Yz';

$data = $api->getCustomerManagementPortalLink($subscriptionId);
// @todo debug
echo '<pre>';
print_r(
    [
        'file' => __FILE__,
        '$api' => $api,
        '$data' => $data,
    ]
);
echo '</pre>';
die();
