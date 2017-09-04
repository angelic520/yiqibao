<?php
/**
 * 工具类
 */
namespace Think;
class HappigoUtils {
    
	/**
	 * 获取微信JS-SDK分享信息
	 * @param unknown $jsApiList
	 * @return multitype:string NULL unknown
	 */
	public static function getWxShareConfig($jsApiList=array("checkJsApi","onMenuShareTimeline","onMenuShareAppMessage","onMenuShareQQ","onMenuShareWeibo")) {
		$config = HappigoUtils::getWxJSSDKConfig($jsApiList);
		return $config;
	}
	
	/**
	 * 获取微信JS-SDK配置信息
	 */
	public static function getWxJSSDKConfig($jsApiList=array()){
		$data = Api::getJsonApiTicket();
		$jsapi_ticket = "";
		if ($data["returnCode"] == "ok") {
			$jsapi_ticket = $data["ticket"];
		}
		$config = array(
			"nonceStr" => uniqid(),
			"jsapi_ticket" => $jsapi_ticket,
			"timestamp" => time(),
			"url"=>HappigoUtils::get_url()
		);
		$config["signature"] = HappigoUtils::getWxJSSDKConfigSign($config);
		$config['appId'] = C("WX.APPID");
		$config['jsApiList'] = $jsApiList;
		//$config['debug'] = 'true';
		unset($config['jsapi_ticket']);
		unset($config['url']);
		return $config;
	}
	
	/**
	 * 获取微信JS-SDK签名
	 * @param unknown $param
	 * @return string
	 */
	private static function getWxJSSDKConfigSign($config){
		//微信要求key小写
		$temp_config = array();
		foreach($config as $key => $value){
			$temp_config[strtolower($key)] = $value;
		}
		$config = $temp_config;
		ksort($config);
		$result = '';
		foreach($config as $key => $value){
			$result .= '&' . $key . '=' . $value;
		}
		$result = substr($result, 1);
		$result = sha1( $result );
		return $result;
	}
	
	/**
	 * 判断用户是否关注公众号, 如果已关注则返回用户基本信息
	 * @param unknown $openid
	 */
	public static function isSubscribe($openid="") {
		$wxinfo = session("wxinfo");
		if ($wxinfo["openid"] && $wxinfo["subscribe"]) {
			return true;
		}
		
		if (!$openid) {
			$openid = $wxinfo["openid"];
		}
		$data = Api::getUnionID($openid);
		if ($data["subscribe"] == "1") {
			return true;
		}
		return false;
	}
	
	/**
	 * 跳转到微信关注页面
	 */
	public static function toSubscribePage() {
		$url = 'http://mp.weixin.qq.com/s?__biz=MjM5MzEwMDkyMA==&mid=208553395&idx=1&sn=81265fbf9c8b474b9741ab0c9dd81091#rd'; //关注页面的RUL
		header("Location: $url");
		exit;
	}
	
	/**
	 * 获取url签名地址
	 * @return string
	 */
	private function get_url(){
		$url = '/';
		if ($_SERVER['REQUEST_URI']){
			$url = $_SERVER['REQUEST_URI'];
		}
		elseif ($GLOBALS['_ENV']['REQUEST_URI']){
			$url = $_SERVER['REQUEST_URI'];
		}
		if (substr($url, 0, 1) == '/'){
			$url = substr($url, 1);
		}
		return 'http://'.$_SERVER['HTTP_HOST'] .'/'. $url;
	}
}