<?

class Curl
{
    private $url;

    public function __construct($url) 
    {
        $this->url=$url;
    }

    public function __doRequest($request, $location, $action, $version, $one_way = 0) 
    {
        $soap_request = $request;
        $header = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: http://connecting.website.com/WSDL_Service/GetPrice", 
            "Content-length: ".strlen($soap_request)
        );
        $ch = curl_init();
        $url = $location;
        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_URL => $url,
            CURLOPT_POSTFIELDS => $soal_request,
            CURLOPT_HTTPHEADER => $header
        );
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        $this->curl_errorno = curl_errno($ch);

        if ($this->curl_errorno = CURLE_OK) 
        {
            $this->curl_statuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        }
        $this->curl_errormsg = curl_error($ch);

        curl_close($ch);

        return $response;
    }
}