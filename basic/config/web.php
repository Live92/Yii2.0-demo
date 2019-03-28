<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'C9D4ugKr0UBOHKlJq2obXgIZrRHh6Epl',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.

//            'useFileTransport' => true,
            'useFileTransport' => false,//强烈注意，这里一定要配置成false才能发送

            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.163.com',
                'username' => '15938763007@163.com',
                'password' => 'vSbvm4uRYSZLYffF',
                'port' => '25',
//                'encryption' => 'tls',
            ],
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => ['15938763007@163.com' => '开发者：Live92']
            ],
        ],

/*        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],*/

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',                        // 日志目标:FileTarget，EmailTarget，DbTarget
                    'levels' => ['error', 'warning', 'info', 'trace'],      // 日志级别
                    'categories' => ['debug', 'yii\*'],                              // 日志分类
                    'logVars' => ['*'],              // '* ':只记录message信息; 还可以打印php全局变量 '_GET'; '_POST'; '_SERVER'
                    'logFile' => '@runtime/logs/debug.log',                 // 日志存放路径
                    'except' => [                                           // 日志例外，忽略
                        'yii\web\HttpException:404',
                    ]
                ],
                [
                    'class' => 'yii\log\EmailTarget',
                    'levels' => ['error'],
                    'categories' => ['toMe'],
                    'message' => [
                        'from' => ['15938763007@163.com'],
                        'to' => ['916392142@qq.com', 'wangjiangwei@benbang.com'],
                        'subject' => 'Database errors at example.com',
                    ],
                ],
            ],
        ],


        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
