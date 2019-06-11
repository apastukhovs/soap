<?
class Curl implements iSOAP
{
    private $client;
    private $url;
    public function __construct($url)
    {
        $this->url = $url;
    }
    public function resultSoap(){
        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <ListOfContinentsByName xmlns="http://www.oorsprong.org/websamples.countryinfo">
            </ListOfContinentsByName>
          </soap:Body>
        </soap:Envelope>';
        $headers = [
            'POST /websamples.countryinfo/CountryInfoService.wso HTTP/1.1',
            'Host: webservices.oorsprong.org',
            'Content-Type: text/xml; charset=utf-8',
            'Content-Length: '.strlen($xml_post_string)  
        ];
        $this->client = curl_init();
        curl_setopt($this->client,CURLOPT_URL,$this->url);
        curl_setopt($this->client, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->client, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->client, CURLOPT_POST, true);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($this->client, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($this->client); 
        curl_close($this->client);
        $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $response);
        $xml = new SimpleXMLElement($response);
        return $xml->soapBody->mListOfContinentsByNameResponse->mListOfContinentsByNameResult;
        
    }
    public function resultSoapClient($param){
        $xml_post_string = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Body>
            <CountryCurrencyResponse xmlns="http://www.oorsprong.org/websamples.countryinfo">
              <sISOCode>'.$param.'</sISOCode>
            </CountryCurrencyResponse>
          </soap:Body>
        </soap:Envelope>';
        $headers = [
            'POST /websamples.countryinfo/CountryInfoService.wso HTTP/1.1',
            'Host: webservices.oorsprong.org',
            'Content-Type: text/xml; charset=utf-8',
            'Content-Length: '.strlen($xml_post_string)  
        ];
        $this->client = curl_init();
        curl_setopt($this->client,CURLOPT_URL,$this->url);
        curl_setopt($this->client, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->client, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->client, CURLOPT_POST, true);
        curl_setopt($this->client, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
        curl_setopt($this->client, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($this->client); 
        curl_close($this->client);
        return $response;
    }        
}