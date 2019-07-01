<?php
require_once 'config.php';
require_once 'libs/Sql.php';
require_once 'libs/MySql.php';
require_once 'libs/AutoStore.php';
ini_set("soap.wsdl_cache_enabled", 0);
if(array_key_exists('wsdl', $_GET))
{
    header("Content-Type: text/xml; charset=utf-8");
    header('Cache-Control: no-store, no-cache');
    header('Expires: '.date('r'));
    echo file_get_contents(WSDL_PATH);
    exit;
}
else
{
    $server = new SoapServer(WSDL_PATH);
    $server->setClass("AutoStore");
    $server->handle();
}


