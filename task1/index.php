<?php
include 'libs/iSOAP.php';
include 'libs/SOAP.php';
include 'libs/Curl.php';


$url = 'http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL';
$soap2 = new SOAP($url);
$result2 = $soap2->resultSoap()->ListOfContinentsByNameResult->tContinent;

$soap = new SOAP($url);
$result = $soap->resultSoapClient(["sCountryISOCode"=>"BB"])->CountryCurrencyResult->sName;


$wsdlfile = 'http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL';
$options = array(
    'url' => 'http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso'
);


if (isset($_POST['ListOfContinentsByNameResult']))
{
    try
    {
        $list = $soap2->resultSoap()->ListOfContinentsByNameResult->tContinent;
    }
    catch (SoapFault $exception) 
    {
        echo $exception->getMessage();
    }
}

if(isset($_POST['resultSoapClient']))
{	
	$code = htmlspecialchars($_POST['resultSoapClient']);
	try {
        $currency = $soap->resultSoapClient(["sCountryISOCode"=> $code ])->CountryCurrencyResult->sName;
	} catch (SoapFault $exception) {  
	    echo $exception->getMessage();        
	}
}

$client = new Curl($url);
$response = $client->resultSoap();
var_dump($response);




include 'templates/index.php';
