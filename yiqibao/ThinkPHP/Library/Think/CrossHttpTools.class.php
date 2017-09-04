<?php
namespace Think;
/**
 * REST接口请求工具类
 */
class CrossHttpTools{
	static private $acceptstring = "application/json";
	static private $isDebug = FALSE;
	
	static public function curl_put($resource,$formParams,$username,$access_token,$clientIp){
		$header = array();
		$accept = self::$acceptstring;
		$header[] = "Accept:". $accept;
		$appkey = C("CROSS_RESTFULL.appkey");
		$header[] = "AppKey:".$appkey;
		$header[] = "x-forwarded-for:".$clientIp;
		
		//$user_details=app()->session['user_details'];
		$authParams =  array(
			"username"=>urlencode($username),
			"access_token"=>$access_token,
			"client_id"=> C("CROSS_RESTFULL.client_id"),
			"timestamp"=>self::microtime_float()
		);
		$header[] = "Rest-Auth:".self::gs(C("CROSS_RESTFULL.restapi_URL").$resource, $authParams, $formParams);
		$header[] = "FD:".urlencode(self::getValuePair($formParams));
		$list = self::curl(C("CROSS_RESTFULL.restapi_URL").$resource, $header, $formParams, "PUT");
		
		if(self::$isDebug)
		{
			echo "==========put请求开始============<br><br>";
			echo "put请求路径：".C("CROSS_RESTFULL.restapi_URL").$resource."<br>";
			echo "鉴权头信息：".print_r($header)."<br>";
			echo "请求结果：".print_r($list)."<br><br>";
			echo "==========put请求结束============<br><br>";
		}
		
		return $list;
	} 
	
	static public function curl_post($resource,$formParams,$username,$access_token,$clientIp){
		$header = array();
		$accept = self::$acceptstring;
		$header[] = "Accept:". $accept;
		$appkey = C("CROSS_RESTFULL.appkey");
		$header[] = "AppKey:".$appkey;
		$header[] = "x-forwarded-for:".$clientIp;
	
		$authParams =  array(
				"username"=>urlencode($username),
				"access_token"=>$access_token,
				"client_id"=>C("CROSS_RESTFULL.client_id"),
				"timestamp"=>self::microtime_float()
		);
		$header[] = "Rest-Auth:".self::gs(C("CROSS_RESTFULL.restapi_URL").$resource, $authParams, $formParams);
		$header[] = "FD:".urlencode(self::getValuePair($formParams));
		$list = self::curl(C("CROSS_RESTFULL.restapi_URL").$resource, $header, $formParams, "POST");
		
		if(self::$isDebug)
		{
			echo "==========post请求开始============<br><br>";
			echo "post请求路径：".C("CROSS_RESTFULL.restapi_URL").$resource."<br>";
			echo "鉴权头信息：".print_r($header,true)."<br>";
			echo "请求结果：".print_r($list,true)."<br><br>";
			echo "==========post请求结束============<br><br>";
		}
		
		return $list;
	}
	
	static public function curl_get($resource,$bizParams,$username,$access_token,$clientIp){
	    $header = array();
	    $accept = self::$acceptstring;
	    $header[] = "Accept:". $accept;
	    $appkey = C("CROSS_RESTFULL.appkey");
	    $header[] = "AppKey:".$appkey;
	    $header[] = "x-forwarded-for:".$clientIp;
	
		$authParams =  array(
			"username"=>urlencode($username),
			"access_token"=>$access_token,
	        "client_id"=> C("CROSS_RESTFULL.client_id"),
	        "timestamp"=>self::microtime_float()
	    );
	    if(count($bizParams)>0)
	    {
	        $header[] = "Rest-Auth:".self::gs(C("CROSS_RESTFULL.restapi_URL").$resource."?".self::getValuePairToGs($bizParams),$authParams, array());
	    }
	    else
	    {
	        $header[] = "Rest-Auth:".self::gs(C("CROSS_RESTFULL.restapi_URL").$resource, $authParams, array());
	    }
	    $header[] = "FD:"."";

	    if(count($bizParams)>0)
	    {
	        $list = self::curl(C("CROSS_RESTFULL.restapi_URL").$resource."?".self::getValuePairToGs($bizParams), $header, array(), "GET");
	    }
	    else
	    {
	        $list = self::curl(C("CROSS_RESTFULL.restapi_URL").$resource, $header, array(), "GET");
	    }

	    if(self::$isDebug)
	    {
	    	echo "==========get请求开始============<br><br>";
	    	echo "get请求路径：".C("CROSS_RESTFULL.restapi_URL").$resource."<br>";
	    	echo "鉴权头信息：".print_r($header,true)."<br>";
			echo "请求结果：".print_r($list,true)."<br><br>";
	    	echo "==========get请求结束============<br><br>";
	    }
	    
	    return $list;
	}
	
	static public function curl_delete($resource,$bizParams,$username,$access_token,$clientIp){
	    $header = array();
	    $accept = self::$acceptstring;
	    $header[] = "Accept:". $accept;
	    $appkey = C("CROSS_RESTFULL.appkey");
	    $header[] = "AppKey:".$appkey;
	    $header[] = "x-forwarded-for:".$clientIp;
	    
		$authParams =  array(
			"username"=>urlencode($username),
			"access_token"=>$access_token,
	        "client_id"=> C("CROSS_RESTFULL.client_id"),
	        "timestamp"=>self::microtime_float()
	    );
	    if(count($bizParams)>0)
	    {
	        $header[] = "Rest-Auth:".self::gs(C("CROSS_RESTFULL.restapi_URL").$resource."?".self::getValuePairToGs($bizParams), $authParams, array());
	    }
	    else
	    {
	        $header[] = "Rest-Auth:".self::gs(C("CROSS_RESTFULL.restapi_URL").$resource, $authParams, array());
	    }
	    $header[] = "FD:"."";
	    
	    if(count($bizParams)>0)
	    {
	        $list = self::curl(C("CROSS_RESTFULL.restapi_URL").$resource."?".self::getValuePairToGs($bizParams), $header, array(), "DELETE");
	    }
	    else
	    {
	        $list = self::curl(C("CROSS_RESTFULL.restapi_URL").$resource, $header, array(), "DELETE");
	    }
	    
	    if(self::$isDebug)
	    {
	    	echo "==========delete请求开始============<br><br>";
	    	echo "delete请求路径：".C("CROSS_RESTFULL.restapi_URL").$resource."<br>";
	    	echo "鉴权头信息：".print_r($header,true)."<br>";
			echo "请求结果：".print_r($list,true)."<br><br>";
	    	echo "==========delete请求结束============<br><br>";
	    }
	    return $list;
	}
	
	
	/**
	 * 数组key转小写
	 * @param unknown $arryValue
	 * @return string
	 */
	static public function keyChange($arryValue)
	{
		$result =Array();
		if(!empty($arryValue)){
			foreach($arryValue as $key=>$v){
				$result[strtolower($key)]=$v;
			}
		}
		return $result;
	}
	
	/**
	 * 数组拼装成字符串参数
	 * @param unknown $arryValue
	 * @return string
	 */
	static public function getValuePair($arryValue)
	{
		$str = '';
		if(!empty($arryValue)){
			foreach($arryValue as $key=>$v){
				if(empty($str)){
					$str = $key.'='.$v;
				}else{
					$str .= '&'.$key.'='.$v;
				}
			}
		}
		return $str;
	}
		
	/**
	 * 数组拼装成字符串参数 urlencode
	 * @param unknown $arryValue
	 * @return string
	 */
	static public function getValuePairToGs($arryValue)
	{
		$str = '';
		if(!empty($arryValue)){
			foreach($arryValue as $key=>$v){
				if(empty($str)){
					$str = $key.'='.str_replace("%2C", ",", urlencode($v));
				}else{
					$str .= '&'.$key.'='.str_replace("%2C", ",", urlencode($v));
				}
			}
		}
		return $str;
	}
	
	/**
	 * 数据签名
	 * @param unknown $fullPath
	 * @param unknown $authParams
	 * @param unknown $formParams
	 * @return string
	 */
	static function gs($fullPath, $authParams,$formParams)
	{
		$lowerkeyarry=self::keyChange($formParams);
		ksort($lowerkeyarry);
		$formsort = self::getValuePair($lowerkeyarry);
		$tmsp = $authParams["timestamp"];
		$clientid=$authParams["client_id"];
		$access_token=$authParams["access_token"];
		$username=$authParams["username"];
		$bmd5 = md5($tmsp . $fullPath .$formsort);
		$amd5 = md5($clientid.$tmsp.C("CROSS_RESTFULL.appkey").$access_token.$username);
		$md = md5(substr($bmd5, 0,9).substr($amd5, 2,10).substr($bmd5, 19));
		$strstr = "username={$username},access_token={$access_token},client_id={$clientid},timestamp={$tmsp}".",signature=".$md;
		return $strstr;
	}
	
	//精确到毫秒的时间戳
	static private function microtime_float()
	{
		$time = explode(" ", microtime());
		$sec = (float)$time[1]*1000;
		$usec = (int)($time[0]*1000);
		$val = (float)$usec + (float)$sec;
		$val = number_format($val,0,'','');
		return $val;
	}
	
	//CURL提交数据
	static private function curl($URL,$headers,$params,$type='GET'){ // 模拟提交数据函数
		$ch = curl_init();
		$timeout = 5;
		curl_setopt ($ch, CURLOPT_URL, $URL); //发贴地址
		//print_r($headers);
		if($headers!=""){
			curl_setopt ($ch, CURLOPT_HTTPHEADER, $headers);
		}else {
			curl_setopt ($ch, CURLOPT_HTTPHEADER, array('Content-type: text/json'));
		}
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
		switch ($type){
			case "GET" : curl_setopt($ch, CURLOPT_HTTPGET, true);break;
			case "POST": curl_setopt($ch, CURLOPT_POST,true);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$params);break;
			case "PUT" : curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "PUT");
			curl_setopt($ch, CURLOPT_POSTFIELDS,$params);break;
			case "DELETE":curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
			curl_setopt($ch, CURLOPT_POSTFIELDS,$params);break;
		}
		$file_contents = curl_exec($ch);//获得返回值
		curl_close($ch);
		return $file_contents;
	
	}
	
	//测试工具
	function testpost()
	{
		$data = array(
					"ProductIds"=>"4322",
					"ProductSpecIds"=>"8473",
					"productsCounts"=>"1",
					"shippingway"=>"", //平邮：PY EMS:ES 快递：KD
					"plantfrom"=>"WX"
			);
		$result = self::curl_post("1.0/orders.comfirm",$data,'NULLE6FF870E8','3B5C7AADE81E3D9D1C0F174DFB6ABFD2');
		return $result;
	}
}

//var_dump(CrossHttpTools::testpost());