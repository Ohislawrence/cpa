<?php

return [
    'cookie_name' => 'tracklia_cookie_consent',
    'expiration' => 365, // days
    'essential' => [
        'session',
        'csrf_token',
        'XSRF-TOKEN',
    ],
    'optional' => [
        'performance' => [
            'name' => 'performance_cookies',
            'description' => 'Help us improve speed and usability',
            'default' => false,
        ],
        'analytics' => [
            'name' => 'analytics_cookies',
            'description' => 'Allow us to analyze traffic and user behavior',
            'default' => false,
        ],
        'marketing' => [
            'name' => 'marketing_cookies',
            'description' => 'Used for personalized ads and campaigns',
            'default' => false,
        ],
    ],
];