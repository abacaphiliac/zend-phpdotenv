<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'Abacaphiliac\ZendPhpDotEnv\EnvLoader' =>
                '\Abacaphiliac\ZendPhpDotEnv\Loader\LoadRequiredEnvFilesFactory',
        ),
    ),
    'abacaphiliac/zend-phpdotenv' => array(
        'files' => array(
            'default' => getcwd() . '/.env',
        ),
    ),
);
