<?php
require_once('../../stripe-php-13.5.0/init.php');
$stripe = new \Stripe\StripeClient('sk_test_51MjevdFeQlmQ6S3iTIvOB3N8CjWyhC0kmn851nsfxg1kO74uv5qF9iEBWcTX9qEZAWnWjxneRkP3xB7BTcjPsepm00JaRsIISk');


$session = $stripe->checkout->sessions->create([
    'payment_method_types' => ['card'],
    'line_items' => [
        [
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Reservation',
                ],
                'unit_amount' => $prixTotal * 100,
            ],
            'quantity' => 1,
        ],
    ],
    'mode' => 'payment',
    'success_url' => 'http://localhost/mouhanned/views/front/ajouterTicket.php?idReservation=' . $id . '&matricule=' . $matricule . '&prixTotale=' . $prixTotal,
    'cancel_url' => 'http://example.com/cancel',
]);

// Redirigez automatiquement l'utilisateur vers l'URL générée par Stripe
header('Location: ' . $session->url);
exit;

?>