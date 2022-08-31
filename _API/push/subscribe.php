<?php

use Minishlink\WebPush\VAPID;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

require '../vendor/autoload.php';
 
$vapid = (array) json_decode(file_get_contents("vapid.json"));

$webPush = new WebPush([
    "VAPID" => [
        "subject" => $vapid['subject'],
        "publicKey" => $vapid['publicKey'],
        "privateKey" => $vapid['privateKey']
    ]
]);

$subscription = Subscription::create([
    "endpoint" => 'https://fcm.googleapis.com/fcm/send/fhf80Dj-V6A:APA91bF58fI1beMoa3HB04RvgqbUJER0e6DYlgMC5JhkIwJd-vFrOQhMSOJMy88h9JzWDXmQE0iOqJW5VBQaWpdbAHdbsz1nmA-6M-eRhJr-pfB7KzXhIKF14rq9ED7XnNAuoU_KHITT',
    "contentEncoding" => "aesgcm",
    "authToken" => 'FZWKwqd1dTRkqnWPIj1Dxg',
    "keys" => [
        "auth" => 'FZWKwqd1dTRkqnWPIj1Dxg',
        "p256dh" => 'BD4i-bnLHW5wRLj-zH3gqKZNv6wyqQitapas_eKX1p8G9kRp3tFdPK5rOcuS_J5ppF9Bayg8E2eHrwsK7f4UK0Y'
    ]
]);

$result = $webPush -> sendOneNotification(
    $subscription,
    json_encode([
        "title" => "Titulo",
        "body" => "Demo notification",
        "icon" => "_icones/logo.png",
        "image" => "_icones/logo.png",
        "data" => "1",
        "actions" => [
            [
                "title" => "Abrir",
                "action" => "Abrir"
            ],
            [
                "title" => "Fechar",
                "action" => "Fechar"
            ]
        ]
    ])
);

if ($result -> isSuccess()) {
    // all good
}
else {
 
    // something went wrong
    error_log($result -> getReason());
 
    // provides raw HTTP response data
    error_log($result -> getResponse());
 
}