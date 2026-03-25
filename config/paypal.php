<?php

return [
    'mode'    => 'live', // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id'         => 'AS558l-p9WudBZlsaW5l43ARxzIcf0JYaIdNy1dHudIc7KstjZJ1XPNufGr0dtZA9ihSuem0nJfRbyVx',
        'client_secret'     => 'EAWECEgf7MppExnO03qnMudV918zjDziCO9u0LMc5QggHT6BeM48ERVc7If1b2jYa5_4rwDU4h7WDu2X',
        'app_id'            => '',
    ],
    'live' => [
        'client_id'         => 'AS558l-p9WudBZlsaW5l43ARxzIcf0JYaIdNy1dHudIc7KstjZJ1XPNufGr0dtZA9ihSuem0nJfRbyVx',
        'client_secret'     => 'EAWECEgf7MppExnO03qnMudV918zjDziCO9u0LMc5QggHT6BeM48ERVc7If1b2jYa5_4rwDU4h7WDu2X',
        'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
    ],

    'payment_action' => 'Sale',
    'currency'       => 'USD',
    'notify_url'     => 'https://your-app.com/paypal/notify',
    'locale'         => 'en_US',
    'validate_ssl'   => true,
];;