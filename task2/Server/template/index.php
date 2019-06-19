<?php
ini_set('soap.wsdl_cache_enabled', 0); 
ini_set('soap.wsdl_cache_ttl', 0);
include('config.php');
include('libs/AutoStore.php');
$server = new SoapServer("http://192.168.0.15/~user4/soap/task4/server/soapServer.wsdl");
$server->setClass("AutoStore");
$server->handle();