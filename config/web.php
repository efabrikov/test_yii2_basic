<?php
$params = require(__DIR__ . '/params.php');

$config = [
    'id'         => 'basic',
    'basePath'   => dirname(__DIR__),
    'bootstrap'  => ['log'],
    'timeZone'   => 'Europe/Kiev',
    'modules'    => [
        'forum'       => [
            'class' => 'app\modules\forum\Module',
        // ... другие настройки модуля ...
        ],
        'api'         => [
            'class' => 'app\modules\api\Module',
        // ... другие настройки модуля ...
        ],
        'externalapi' => [
            'class' => 'app\modules\externalapi\Module',
        // ... другие настройки модуля ...
        ],
    ],
    'aliases'    => [
        'google-link' => 'http://google.com',
    ],
    'components' => require(__DIR__ . '/components.php'),
    'params'     => $params,
];

/* \Yii::$container->set('yii\data\ActiveDataProvider',
  ['pagination' => ['pageSize' => 5]]); */

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
    $config['modules']['utility'] = [
            'class' => 'c006\utility\migration\Module',
        ];
}

return $config;
