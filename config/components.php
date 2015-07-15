<?php
return [
    'myEventComponent' => [
        'class' => 'app\components\MyEventComponent',
        'prop1' => 1,
        'prop2' => 2,
    ],
    'urlManager'   => [
        //'class'=>'yii\web\UrlManager',
        'enablePrettyUrl' => true,
        'showScriptName'  => false,
        
        'rules' => [
            // ['class' => 'yii\rest\UrlRule', 'controller' => 'country'],

            // Api
            ['class' => 'yii\rest\UrlRule', 'controller' => 'api/country'],
        ],


    ],
    'request'      => [
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => 'tyFdYVQn6yejpe9tkk34zqHe2vQ8tmBi',
    ],
    //'response' => ['format'=>\yii\web\Response::FORMAT_JSON],
    //$response->format = \yii\web\Response::FORMAT_JSON;
    'cache'        => [
        'class' => 'yii\caching\FileCache',
    ],
    'user'         => [
        'identityClass'   => 'app\models\User',
        'enableAutoLogin' => true,
    ],
    'errorHandler' => [
        'errorAction' => 'site/error',
    ],
    'mailer'       => [
        'class'            => 'yii\swiftmailer\Mailer',
        // send all mails to a file by default. You have to set
        // 'useFileTransport' to false and configure a transport
        // for the mailer to send real emails.
        'useFileTransport' => true,
    ],
    'log'          => [
        'traceLevel' => YII_DEBUG ? 3 : 0,
        'targets'    => [
            [
                'class'  => 'yii\log\FileTarget',
                'levels' => ['error', 'warning'],
            ],
        /* 'email' => [
          'class' => 'yii\log\EmailTarget',
          'levels' => ['error', 'warning'],
          'message' => [
          'to' => ['test.efabrikov@gmail.com'],
          'subject' => 'Новое сообщение логгера example.com',
          ],
          ], */
        ],
    ],
    'db'           => require(__DIR__ . '/db.php'),
    'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            //VKontakte
            'vkontakte' => [
                'class' => 'yii\authclient\clients\VKontakte',
                'clientId' => '4904296',
                'clientSecret' => 'qltTFum3ImYFLPkGabZI',
            ],            
            'facebook' => [
                'class' => 'yii\authclient\clients\Facebook',
                'clientId' => '453482401472680',
                'clientSecret' => '0c007e7a5565f871b8fedfc1e43b9607',
            ],
            'google' => [
                'class' => 'yii\authclient\clients\GoogleOAuth',
                'clientId' => '1013813197506-b8e20dcdbckg8aks179vupovhud3v0ar.apps.googleusercontent.com',
                'clientSecret' => 'p4Rv7zpYj6Mrx2kJhSP4KPF8',
            ],

        ],
    ]
];
