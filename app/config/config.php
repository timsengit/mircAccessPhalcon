<?php

return new \Phalcon\Config([
    'version'      => '1.0',
    'printNewLine' => true,
    'debug'        => true, //是否开启调试模式
    'database'     => [
        'adapter'  => 'Mysql',
        'host'     => '192.168.105.128',
        'username' => 'ycf',
        'password' => 'b50unl',
        'dbname'   => 'ycfdb',
        'charset'  => 'utf8',
        'port'     => '3306',
    ],

    'application'  => [
        'controllersDir' => APP_PATH . '/app/controllers/',
        'modelsDir'      => APP_PATH . '/app/models/',
        //'migrationsDir'  => APP_PATH . '/app/migrations/',
        'viewsDir'       => APP_PATH . '/app/views/',
        'pluginsDir'     => APP_PATH . '/app/plugins/',
        'libraryDir'     => APP_PATH . '/app/library/',
        'cacheDir'       => APP_PATH . '/app/runtime/cache/',
        'baseUri'        => '/',
    ],
    'logger'       => [
        'application' => APP_PATH . '/app/runtime/application.log',
        'sql'         => APP_PATH . '/app/runtime/sql.log',
    ],
]);
