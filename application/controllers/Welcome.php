<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends Front_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{

		//$url = "https://www.internationalparceltracking.com/api/shipment?barcode=3STEUW9041359&country=CN&language=zh&postalCode=161000";
		//echo file_get_contents($url);
		//die();
		//echo $this->http_request($url);
		//echo http_get_data($url);
		//echo $this->curl_https($url);
		//die();
		$this->view('index');
	}

	function http_request($url,$timeout=30,$header=array()){ 
        if (!function_exists('curl_init')) { 
            throw new Exception('server not install curl'); 
        } 
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_HEADER, true); 
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout); 
        if (!emptyempty($header)) { 
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
        } 
        $data = curl_exec($ch); 
        list($header, $data) = explode("\r\n\r\n", $data); 
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE); 
        if ($http_code == 301 || $http_code == 302) { 
            $matches = array(); 
            preg_match('/Location:(.*?)\n/', $header, $matches); 
            $url = trim(array_pop($matches)); 
            curl_setopt($ch, CURLOPT_URL, $url); 
            curl_setopt($ch, CURLOPT_HEADER, false); 
            $data = curl_exec($ch); 
        } 

        if ($data == false) { 
            curl_close($ch); 
        } 
        @curl_close($ch); 
        return $data; 
	}  
	/** curl 获取 https 请求
	* @param String $url 请求的url
	* @param Array $data 要發送的數據
	* @param Array $header 请求时发送的header
	* @param int $timeout 超时时间，默认30s
	*/
	function curl_https($url, $data=array(), $header=array(), $timeout=30){
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true); // 从证书中检查SSL加密算法是否存在
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

		$response = curl_exec($ch);

		if($error=curl_error($ch)){
		die($error);
		}

		curl_close($ch);

		return $response;

	} 
	
	
}