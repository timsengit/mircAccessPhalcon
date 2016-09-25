<?php

error_reporting(E_ALL);
date_default_timezone_set('Asia/Shanghai');

define('APP_PATH', realpath('..'));
define('LIBRARY_PATH', realpath('../app/library'));
try {

    /**
     * Read the configuration
     */
    $config = include APP_PATH . "/app/config/config.php";
    // var_dump($config);die;
    if (!$config) {
        die("can not find config file.");
    }

    /**
     * Read auto-loader
     */
    include APP_PATH . "/app/config/loader.php";
    // required for autoload
    require_once APP_PATH . "/vendor/autoload.php";

    /**
     * Read services
     */
    include APP_PATH . "/app/config/main.php";

    /**
     * Handle the request
     */
    // 开启事务

    $application = new \Phalcon\Mvc\Application($di);
    $di->getLogger()->begin();
    echo $application->handle()->getContent();
    $di->getLogger()->commit();
} catch (\Phalcon\Exception $e) {
    // echo $e->getMessage() . '<br>';
    // echo '<pre>' . $e->getTraceAsString() . '</pre>';

    echo '<pre>' . get_class($e), ": ", $e->getMessage(), "<br>";
    echo " File=", $e->getFile(), "<br>";
    echo " Line=", $e->getLine(), "<br>";
    echo " Trace=", $e->getTraceAsString() . '</pre>';

}
