<?php
/**
 * Include test library if you are using composer
 * Example: Psysh (debugging library similar to pry in Ruby)
 */
require_once dirname(__FILE__) . '/vendor/autoload.php';

require_once dirname(__FILE__) . '/vendor/midtrans/midtrans-php/Midtrans.php';
require_once dirname(__FILE__) . '/vendor/midtrans/midtrans-php/tests/Mt_Tests.php';
require_once dirname(__FILE__) . '/vendor/midtrans/midtrans-php/tests/utility/MtFixture.php';

// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-rg5FcINN_sje1gOIGjNLVOIg';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;
 
$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => 100000,
    ),
    'item_details' => array(
        array(  
            'id' => "INY-001",
            'price' => 17000,
            'quantity' => 1,
            'name' => "webinar 1"
        ),
        array(  
            'id' => "INY-002",
            'price' => 3000,
            'quantity' => 1,
            'name' => "webinar 2"
        ),
    ),
    'customer_details' => array(
        'first_name' => 'budi',
        'last_name' => 'pratama',
        'email' => 'budi.pra@example.com',
        'phone' => '08111222333',
    ),
);

$snapToken = \Midtrans\Snap::createTransaction($params);
echo $snapToken->token .'<br>';
$link = $snapToken->redirect_url;

?>

<a href="<?= $link; ?>" target="_self">Click Me untuk Bayar</a>