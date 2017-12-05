<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
                     'BasicData' => [
            'class' => 'backend\modules\BasicData\module',
        ],
        'ChemicalsManagement' => [
            'class' => 'backend\modules\ChemicalsManagement\module',
        ],
        'Reports' => [
            'class' => 'backend\modules\Reports\module',
        ],
         'StockManagement' => [
            'class' => 'backend\modules\StockManagement\module',
        ],
         'webservice' => [
            'class' => 'backend\modules\webservice\module',
        ],
         'Journal' => [
            'class' => 'backend\modules\Journal\module',
        ],
    
        
    ],
   
     
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ], */
     'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@backend/themes/new-themes/views'
             ],
         ],
    ],    
    ],
    'params' => $params,
];
