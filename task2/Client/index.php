<?php
include 'config.php';
include 'libs/Car.php';
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: *');
if (isset($_POST['action'])) 
{
    header('Content-Type: application/json');
    $client = new Car();
    $action = $_POST['action'];
    if ($action == 'getCarList')
    {
        echo $client->getCarList();
        var_dump($client);
    }
    else if($action == 'searchCars')
    {
        $filter = $_POST['filter'];
        echo $client->CarFilter($filter);
    }
    else if($action == 'getById')
    {
        $id = $_POST['id'];
        echo $client->getById($id);
    }
    else if($action == 'getOrderForm')
    {
        include 'template/index.php';
    }
    else if($action == 'order')
    {
        $orderData = $_POST['orderData'];
        echo $client->Order($orderData);
    }
    }
    else if (isset($_GET['action'])) 
    {
        $action = $_GET['action'];
        if($action == 'getOrderForm')
        {
            include 'template/index.php';
        }
    }
    else
    {
        header('Content-Type: text/html');
        include 'template/index.php';
    }