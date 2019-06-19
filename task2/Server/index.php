<?php
include 'config.php';
include 'DB.php';
include 'SoapServer.php';
$autostore = new DB;
$cars = $autostore->getListAuto();

include 'templates/index.php';
?>