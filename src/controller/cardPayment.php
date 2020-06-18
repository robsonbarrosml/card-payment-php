<?php

require __DIR__  . '/../../vendor/autoload.php';

MercadoPago\SDK::setAccessToken("APP_USR-6548021211316693-032322-821a5daa8760a82ee9a4195d6827a341-533467703");

$payment = new MercadoPago\Payment();

$payment->transaction_amount = $_POST['amount'];
$payment->token = $_POST['token'];
$payment->description = "Product Title";
$payment->installments = $_POST['installmentsOption'];
$payment->payment_method_id = $_POST['paymentMethodId'];
$payment->external_reference = "ext_ref_0001";
$payment->notification_url = "https://webhook.site/8deed478-df89-41aa-96c6-06975b18a665";
$payment->additional_info = [
    "items" => [
        [
            "id" => "1",
            "title" => "test",
            "description" => "description",
            "picture_url"=> "image.jpg",
            "category_id"=> "test1",
            "quantity"=> 1,
            "unit_price"=> 100
        ],
        [
            "id" => "2",
            "title" => "test2",
            "description" => "description",
            "picture_url"=> "image2.jpg",
            "category_id"=> "test2",
            "quantity"=> 1,
            "unit_price"=> 50
        ]
    ]
];

$payer = new MercadoPago\Payer();

$payer->email = "test_user_10856037@testuser.com";
$payer->first_name = "First Name";
$payer->last_name = "Last Name";
$payer->identification = [
    "type" => "CPF",
    "number" => "12345678909"
];

$payment->payer = $payer;
$payment->save(); 

echo "<pre>";
print_r('Payment ID: ' . $payment->id . PHP_EOL 
    . 'Status: ' . $payment->status . PHP_EOL 
    . 'Status Detail: ' . $payment->status_detail);
echo "</pre>";