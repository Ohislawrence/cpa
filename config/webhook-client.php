<?php

return [
    'configs' => [
        [

            'name' => 'default',
            'signing_secret' => config('secret', '85885858858858'),
            'signature_header_name' => 'Signature',
            'signature_validator' => \Spatie\WebhookClient\SignatureValidator\DefaultSignatureValidator::class,
            'webhook_profile' => \Spatie\WebhookClient\WebhookProfile\ProcessEverythingWebhookProfile::class,
            'webhook_response' => \Spatie\WebhookClient\WebhookResponse\DefaultRespondsTo::class,
            'webhook_model' => \Spatie\WebhookClient\Models\WebhookCall::class,
            'store_headers' => [],
            'process_webhook_job' => \App\Jobs\WebhookHandler::class,
        ],

    ],

    'delete_after_days' => 180,
];
