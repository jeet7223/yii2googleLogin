<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
    'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            'google' => [
                'class' => 'yii\authclient\clients\Google',
                'clientId' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'clientSecret' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            ],
            'facebook' => [
                'class' => 'yii\authclient\clients\Facebook',
                'clientId' => 'xxxxxxxxxxxxxxxxxxx',
                'clientSecret' => 'xxxxxxxxxxxxxxxxxxxxx',
            ],
            'instagram' => [
                'class' => 'kotchuprik\authclient\Instagram',
                'clientId' => 'xxxxxxxxxxxxxxxxxxx',
                'clientSecret' => 'xxxxxxxxxxxxxxxxxxxxxxxxx',
            ],
            'linkedin' => [
                'class' => 'yii\authclient\clients\LinkedIn',
                'clientId' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'clientSecret' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxx',
            ],
           'twitter' => [
                'class' => 'yii\authclient\clients\Twitter',
                'attributeParams' => [
                    'include_email' => 'true'
                ],
                'consumerKey' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
                'consumerSecret' => 'xxxxxxxxxxxxxxxxxxxxxxxxxxx',
            ],
        ],
    ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => $baseUrl,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
];
