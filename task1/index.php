<?php

include 'libs/SOAP.php';
include 'libs/Curl.php';

$url = 'http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL';
$soap2 = new SOAP($url);
$result2 = $soap2->resultSoap()->ListOfContinentsByNameResult->tContinent;
var_dump($result2);

$soap = new SOAP($url);
$result = $soap->resultSoapClient(["sCountryISOCode"=>"BB"])->CountryCurrencyResult;
var_dump($result);


$client = new Curl($url, $options);
$options = array (
    'url' => 'http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL'
);

if (isset($_POST['ListOfContinentsByNameResult']))
{
    try
    {
        $list = $client->resultSoap()->ListOfContinentsByNameResult->tContinent;
    }
    catch (SoapFault $exception) 
    {
        echo $exception->getMessage();
    }
}



include 'templates/index.php';
