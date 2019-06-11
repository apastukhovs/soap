<?
class SOAP implements iSOAP
{
    public function __construct($url) 
    {
        $this->url=$url;
    }

    public function resultSoap()
    {
        $client = new SoapClient($this->url);
        $result = $client->ListOfContinentsByName();
        return $result;
    }

    public function resultSoapClient($param)
    {
        $client = new SoapClient($this->url);
        $result = $client->CountryCurrency($param);
        return $result;  
    }
}