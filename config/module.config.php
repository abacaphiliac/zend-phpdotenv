<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Abacaphiliac\ZendPhpDotEnv\Diagnostics\RequireEnv' =>
                'Abacaphiliac\ZendPhpDotEnv\Diagnostics\RequireEnvFactory',
            'Abacaphiliac\ZendPhpDotEnv\Diagnostics\SuggestEnv' =>
                'Abacaphiliac\ZendPhpDotEnv\Diagnostics\SuggestEnvFactory',
        ),
        'aliases' => array(
            'Abacaphiliac\ZendPhpDotEnv\Diagnostics\CheckEnvFiles' =>
                'Abacaphiliac\ZendPhpDotEnv\Diagnostics\SuggestEnv',
        ),
    ),
    'diagnostics' => array(
        'abacaphiliac/zend-phpdotenv' => array(
            'Readable `.env` file(s)' => 'Abacaphiliac\ZendPhpDotEnv\Diagnostics\CheckEnvFiles',
        ),
    ),
    'abacaphiliac/zend-phpdotenv' => array(
        'files' => array(
            'default' => getcwd() . '/.env',
        ),
    ),
);
