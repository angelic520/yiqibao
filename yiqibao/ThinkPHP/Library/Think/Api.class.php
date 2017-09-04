<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Think;
/**
 * ThinkPHP 应用程序类 执行应用过程管理
 */
class Api {

    /**
     * 应用程序初始化
     * @access public
     * @return void
     */
	//获取直播列表
	static public function getTvList($dayType,$pagesize,$pageindex){
		$name = 'tvlist_'.$dayType;
		$data = S($name);
		if($data['returnCode']!='ok'){
			$requestData = array(
					"uri"=>"1.0/ec.tv.live",
					"type"=>"get",
					"param"=>array(
							"dayType" => "{$dayType}",
							"pagesize" => $pagesize,
							"pageindex"	=> $pageindex,
							"platform"	=>'klgwx'
					)
			);
			$data = self::sendHttp($requestData);
			S($name, $data, 600);
		}
		return $data;		
	}
	
	/**
	 * 获取限时抢分组
	 * @return Ambigous <\Think\Ambigous, string, mixed, unknown>
	 */
	static public function getLimitGroup(){
		$name = 'limitGroup';
		$data = S($name);
		if($data['returnCode']!='ok'){
			$requestData = array(
					"uri"=>"1.0/ec.goods.rush",
					"type"=>"get",
					"param"=>array(
							"platform"	=>'klgwx'
					)
			);
			$data = self::sendHttp($requestData);
			S($name, $data, 600);
		}
		return $data;		
	}
	
	/**
	 * 获取限时抢分组商品
	 * @param int $groupid
	 */
	static public function getLimitGoods($groupid){
		$requestData = array(
				"uri"=>"1.0/ec.goods.rush/{$groupid}",
				"type"=>"get",
				"param"=>array(
						"platform"	=>'klgwx'
				)
		);
		$result = self::sendHttp($requestData);
		return $result;		
	}
	
	/**
     * 应用程序初始化
     * @access public
     * @return void
     */
	//获取商品列表
	static public function getProductList($pagesize, $pageindex, $storeid=0,$searchkey='',$cid=0,$bid=0,$orderby='',$orderdirection='', $Platform='klgwx')
	{
		$data = array(
				"uri"=>"1.0/ec.goods",
				"type"=>"get",
				"param"=>array(
					"pagesize" => $pagesize,
					"pageindex"	=> $pageindex,
					"storeid"	=>$storeid,
					"searchkey"	=>"$searchkey",
					"cid" 	=>$cid,
					"bid"	=>$bid,
					"orderby" 	=>$orderby,
					"orderdirection"	=>$orderdirection,
					"Platform"	=>$Platform
				)
		);
		$result = self::sendHttp($data);
		return $result;
	}	
	
	//获取推荐商品分类
	static public function getProductCategroy(){
		$data = array(
			"uri"=>"1.0/ec.app.recommend.goodsclass",
			"type"=>"get"			
		);
		$result = self::sendHttp($data);
		return $result;
	}
	//获取推荐品牌分类
	static public function getBrandCategroy($pageindex,$pagesize){
		$data = array(
			"uri"=>"1.0/ec.app.recommend.brand",
			"type"=>"get",
			"param"=>array(
				"pageindex"	=>$pageindex,
				"pagesize"	=>$pagesize
			)
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//获取热门搜索词
	static public function getsearchkey(){
		$data = array(
			"uri"=>"1.0/ec.app.hot.searchkey",
			"type"=>"get"			
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//获取默认搜索词
	static public function getdefaultsearch(){
		$data = array(
				"uri"=>"1.0/ec.cms.defaultsearch",
				"type"=>"get",
				"param"=>array(
					"platform" => 'klgwx'
				)
		);
		$result = self::sendHttp($data);
		return $result;
	}	
	
	//获取购物车商品
	static public function getCartGoods($pageindex=0,$pagesize=50,$platform='klgwx'){
		$data = array(
			"uri"=>"1.0/ec.shoppingcart",
			"type"=>"get",
			"param"=>array(
				"pageindex"=>$pageindex,
				"pagesize" =>$pagesize,
				"platform" =>$platform
			)
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//添加商品到购物车
	static public function addCartGoods($productId,$productCount,$productSuitId,$productPlatform="klgwx"){
		$data = array(
			"uri"=>"1.0/ec.shoppingcart",
			"type"=>"post",
			"param"=>array(
				"productId"=>$productId,
				"productCount" =>$productCount,
				"productSuitId" =>$productSuitId,
				"productPlatform"=>$productPlatform
			)
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//修改购物车
	static public function editCartGoods($cartid,$count){
		$data = array(
			"uri"=>"1.0/ec.shoppingcart/{$cartid}",
			"type"=>"PUT",
			"param"=>array(
				"count" =>$count				
			)
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//删除购物车
	static public function delCartGoods($cartid=0,$cartids){
		$data = array(
			"uri"=>"1.0/ec.shoppingcart/{$cartid}",
			"type"=>"DELETE",
			"param"=>array(
				"cartids" =>$cartids				
			)
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	/**
	 * 获取商品详情
	 * @param unknown $hid
	 * @return Ambigous <\Think\Ambigous, string, mixed, unknown>
	 */
	static public function getProductDetail($hid)
	{
		$data = array(
				"uri"=>"1.0/ec.goods/{$hid}",
				"type"=>"get",
				"param"=>array(
						"platform" => 'klgwx'
				)
		);
		$result = self::sendHttp($data);
		return $result;
	}

	/**
	 * 根据CRM item_code 获取商品详情
	 * @param unknown $hid
	 * @return Ambigous <\Think\Ambigous, string, mixed, unknown>
	 */
	static public function getProductDetailByItemcode($itemCode)
	{
		$data = array(
				"uri"=>"1.0/ec.goods/{$itemCode}",
				"type"=>"get",
				"param"=>array(
						"idtype" => 'hid',
						"platform" => 'klgwx'
				)
		);
		$result = self::sendHttp($data);
		return $result;
	}
		
	/**
	 * 获取商品店铺优惠促销
	 * @param unknown $storeId
	 * @return Ambigous <\Think\Ambigous, string, mixed, unknown>
	 */
	static public function getPromotions($storeId)
	{
		$data = array(
				"uri"=>"1.0/ec.store.promotions/{$storeId}",
				"type"=>"get",
				"param"=>array(
						"platform" => 'klgwx',
						"ptype" => 'ALL'
				)
		);
		$result = self::sendHttp($data);
		return $result;
	}

	/**
	 * 获取商品赠品信息
	 * @param unknown $hid
	 * @return Ambigous <string, mixed, unknown>
	 */
	static public function getGoodGift($hid)
	{
		$data = array(
				"uri"=>"1.0/ec.goods.gift/{$hid}",
				"type"=>"get",
				"param"=>array(
						"platform" => 'klgwx',
				)
		);
		$result = self::sendHttp($data);
		return $result;
	}

	/**
	 * 获取商品评论信息 
	 * @param number $hid
	 * @param number $pageIndex 分页索引，从0开始
	 * @param number $pageSize  每页记录数
	 * @return Ambigous <string, mixed, unknown>
	 */
	static public function getGoodComment($hid, $pageIndex=0, $pageSize=10)
	{
		$data = array(
				"uri"=>"1.0/ec.goods.comments",
				"type"=>"get",
				"param"=>array(
						"pageindex" => "{$pageIndex}",
						"pagesize" => "{$pageSize}",
						"goodsid" => "{$hid}",
						"platform" => 'klgwx'
				)
		);
		$result = self::sendHttp($data);
		return $result;
	}
		
	/**
	 * 获取推荐商品信息
	 * @param unknown $hid
	 * @return Ambigous <string, mixed, unknown>
	 */
	static public function getRecommendGood($hid)
	{
		$name = 'RecommendGood_'.$hid;
		$data = S($name);
		if($data['returnCode']!='ok'){		
			$requestData = array(
				"uri"=>"1.0/ec.goods.recommend/{$hid}",
				"type"=>"get",
				"param"=>array(
						"platform" => 'klgwx'
						)
			);
			$data = self::sendHttp($requestData);
			S($name,$data,86400);
		}
		return $data;
	}

	/**
	 * 立即订购订单确认
	 * @param unknown $params
	 * @return Ambigous <string, mixed, unknown>
	 */
	static public function comfirmOrder($params=array()) //$specId,$buyNum,$wxno,$paymentWay='Online',$pointAmount='0',$addressNumber=''
	{
		$data = array(
				"uri"=>"1.0/ec.orders.confirm",
				"type"=>"post",
				"param"=>$params
		);
		$result = self::sendHttp($data);
		return $result;
	}

	/**
	 * 购物车订单确认
	 * @param unknown $params
	 * @return Ambigous <string, mixed, unknown>
	 */
	static public function comfirmCartOrder($params=array())
	{
		$data = array(
				"uri"=>"1.0/ec.orders.confirm",
				"type"=>"post",
				"param"=>$params
		);
		$result = self::sendHttp($data);
		return $result;
	}

	/**
	 * 订单提交
	 * @param unknown $params
	 * @return Ambigous <string, mixed, unknown>
	 */
	static public function submitOrder($params=array())
	{
		$data = array(
				"uri"=>"1.0/ec.orders",
				"type"=>"post",
				"param"=>array(
						'shopingCarIds' => "{$params['shopingCarIds']}",
						'addressNumber' => "{$params['addressNumber']}",
						'InvoiceTitle' => "{$params['InvoiceTitle']}",
						'paymentWayCode' => "{$params['paymentWayCode']}",
						'voucherIds' => "{$params['voucherIds']}",
						'pointAmounts'=>"{$params['pointAmounts']}",
						'GiftSelected'=>"{$params['GiftSelected']}",
						'shippingway'=>'PY',
						'vid' => "{$params['vid']}",
						"platfrom" => 'KLGWX',
						"platform" => 'klgwx',
				)
		);
		if($params['cps']){
			$data["param"]['cps'] = "{$params['cps']}";
		}
		$result = self::sendHttp($data);
		return $result;
	}
		
	/**
	 * 订单微信支付
	 * @param unknown $orderid
	 * @param unknown $wxno
	 * @return Ambigous <string, mixed, unknown>
	 */
	static public function payOrder($orderid, $wxno)
	{
		$data = array(
				"uri"=>"1.0/ec.orders.payment/{$orderid}",
				"type"=>"post",
				"param"=>array(
						"code" => "$wxno",
						"channelCode" => "zxwx_i",
						"platform" => 'KLGWX',
				)
		);
		$result = self::sendHttp($data);
		return $result;
	}
		
    /**
     * 公用调用处理
     * @param unknown $param
     * @return Ambigous <string, mixed, unknown>
     */
    static private function sendHttp($param)
    {
    	$user = session("user") ? session("user") : array();
    	$username =$user['user_name'];
    	$access_token =$user['access_token'];
    	$param = self::replaceNull($param);
    	$clientIp = get_client_ip();
    	switch (strtolower($param['type']))
    	{
    		case 'put' :
    			{
    				$param['param']['fc'] = "1";
    				$result = HttpTools::curl_put($param['uri'],$param['param'],$username,$access_token,$clientIp);
    				break;
    			}
    		case 'get' :
    			{
    				$result = HttpTools::curl_get($param['uri'],$param['param'],$username,$access_token,$clientIp);
    				break;
    			}
    		case 'post' :
    			{
    				$param['param']['fc'] = "1";
    				$result = HttpTools::curl_post($param['uri'],$param['param'],$username,$access_token,$clientIp);
    				break;
    			}
    		case 'delete':
    			{
    				$result = HttpTools::curl_delete($param['uri'],$param['param'],$username,$access_token,$clientIp);
    				break;
    			}
    		default:
    			{
    				$result = HttpTools::curl_get($param['uri'],$param['param'],$username,$access_token,$clientIp);
    				break;
    			}
    	}
    
    	$jsonResult = json_decode($result,true);
    
    	if(!$jsonResult && !empty($result))
    	{
    		echo $result;
    	}else if($jsonResult['error_response'])
    	{
    		$jsonResult["returnCode"] = "fail";
    			
    		$errMsg = "";
    		//2102提示用户重新登录
    		if($jsonResult['error_response']['code']>=3000 || $jsonResult['error_response']['code'] ==2102)
    		{
    			$errMsg= $jsonResult['error_response']['message'];
    		}else
    		{
    			$errMsg = $jsonResult['error_response']['message'];//'非常抱歉，服务器内部异常！';
    		}
    		$jsonResult["errorMsg"] = $errMsg;
    		$jsonResult["errorCode"] = $jsonResult['error_response']['code'];
    			
    	}else
    	{
    		$jsonResult["returnCode"] = "ok";
    		if($jsonResult['SimpleResult'] && $jsonResult['SimpleResult']['code'] !='ok' || ($jsonResult['code'] && strtolower($jsonResult['code']) != "ok"))
    		{
    			$jsonResult["returnCode"] = "fail";
    			$jsonResult['errorMsg'] = $jsonResult['SimpleResult']['message'];
    			if(empty($jsonResult['errorMsg']))
    			{
    				$jsonResult['errorMsg'] = $jsonResult['message'];
    			}
    		}
    	}
    	return $jsonResult;
    }
    
    /**
     * 空参数转换
     * @param unknown $param
     * @return string
     */
    static public function replaceNull($param)
    {
    	if($param['param'] && is_array($param['param']))
    	{
    		foreach ($param['param'] as $key=>$value)
    		{
    			if(empty($value) && $value !== 0 && $value !== '0')
    			{
    				$param['param'][$key] = "";
    			}
    		}
    	}
    	return $param;
    }    
    
    /**
     *
     * 根据code获取微信openId信息
     * @param $code
     * @return array(status, openId)
     */
    function _getOpenIdByCode($code){
    	$result = array(
			'status' => 0,
    		'openid' => ''
    	);
    	$appid = C("WX.APPID");
    	$secret = C("WX.SECRETKEY");
    	$url = C("WX.AUTH_ACCESS_TOKEN_URL");
    	$params = array(
			'appid' => $appid,
    		'secret' => $secret,
    		'code' => $code,
    		'grant_type'=>'authorization_code'
    	);
    	$params=HttpTools::getValuePair($params);
    	$url = $url."?".$params;
    	$data=self::curlHttp($url,$params,0);
    	if(!$data['errcode']){
    		$result['status'] = 1;
    		$result['openid'] = $data['openid'];
    		if ($data["scope"] == "snsapi_userinfo") {
	    		session('wxauthinfo', $data);
    		}
    	} else {
	    	//Think\Log::write('code|{$code}'.print_r($data,true), 'ERR');
    	}
    	return $result;
    }
    
    /**
     * 根据获取UnionID
     */
    public static function getUnionID($openid){
    	$result = array(
    		'status' => 0
    	);
    	
    	//未关注，网页授权获取用户基本信息
    	$accessToken = session('wxauthinfo.access_token');
    	if ($accessToken) {
    		$params = array(
    			'access_token' => $accessToken,
    			'openid' => $openid
    		);
    		$params=HttpTools::getValuePair($params);
    		$url = "https://api.weixin.qq.com/sns/auth?".$params;
    		$data = self::curlHttp($url,$params,0);
    		if ($data["errcode"] != "0") {
    			//重新授权
    			$this->redirect("oauth/code", array('backUrl'=>urlencode(C('URL.HOST_PAGE_PARAM')), 'scope'=>'snsapi_userinfo'));
    			exit;
    		}
    		$url = "https://api.weixin.qq.com/sns/userinfo";
    	} else {
    		//已关注
    		$url = C("WX.UNIONID_URL");
    		$accessToken = Api::getAccessToken();
    	}
    	
    	$params = array(
    		'access_token' => $accessToken,
    		'openid' => $openid,
    		'lang' => "zh_CN"
    	);
    	$params=HttpTools::getValuePair($params);
    	$url = $url."?".$params;
    	$data = self::curlHttp($url,$params,0);
    	if ($openid=="oeNKjjkp3E8W-K5fY9oTckdSBLSM") {
    		//print_r($data);exit;
    	}
    	if(!$data['errcode']){
    		$result['status'] = 1;
    		$result['wxinfo'] = $data;
    		session("wxinfo", $data);
    	}
    	return $result;
    }
    
    /**
     * 获取微信接口访问Access_Token
     */
    public static function getAccessToken() {
    	$run_evn = C("RUN_EVN");  	//运行环境(0：本地环境，1：开发环境，2：产品环境)	
		if ($run_evn == 2) { 	
			//通过EC接口获取access_token
			$requestData = array(
				"uri"=>"1.0/ec.wx.access_token",
				"type"=>"get"
			);
			$data = self::sendHttp($requestData);
			return $data["token"];
    	} else {
    		//通过微信接口获取access_token
    		$appid = C("WX.APPID");
    		$secret = C("WX.SECRETKEY");
    		$url = C("WX.AUTH_ACCESS_TOKEN_URL");
    		$params = array(
    			"appid" => $appid,
    			"secret" => $secret,
    			"grant_type"=>"client_credential"
    		);
    		$params=HttpTools::getValuePair($params);
    		$url = C("WX.PUBLIC_ACCESS_TOKEN_URL")."?".$params;
    		$data = self::curlHttp($url,$params,0);
    		$access_token = $data["access_token"];
    		return $access_token;
    	}
    }
    
    /**
     * 登录前触发该事件
     * @param $openid openid
     * @param $loginType 登录方式
     */
    private function _beforeLoginEvent($openid, $loginType) {
    	//TODO
    }
    
    /**
     * 注册前触发该事件
     *@param $openid openid
     *@param $registerType 注册方式
     */
    private function _beforeRegisterEvent($openid, $registerType) {
    	//TODO
    }
    
    /**
     * 注册结束后触发的事件
     * @param $openid openid
     * @param $result 登录结果数据
     * @param $registerType 登录方式
     */
    private function _afterLoginEvent($openid, $result, $loginType) {
    	//TODO
    }
    
    /**
     * 注册结束后触发的事件
     * @param $openid openid
     * @param $result 注册结果数据
     * @param $registerType 注册方式
     */
    private function _afterRegisterEvent($openid, $result, $registerType) {
    	
    }
    
    /**
     * OpenId绑定现有账号并登陆
     * @param $openid 
     * @param $account
     * @param $password
     * @param $union_id
     * @return Ambigous <multitype:number unknown , \Think\Ambigous>
     */
    public static function bindingAndloginByOpenId($openid, $account, $password) {
    	Api::_beforeLoginEvent($openid, "loginByOpenId");
    	
    	//session中获取unionid
    	$unionid = session("wxinfo.unionid");
    	if (!$unionid) {
    		$data = Api::getUnionID($openid);
    		if ($d["status"] > 1) {
    			$unionid = $data["wxinfo.unionid"];
    		}
    	}
    	
    	$requestData = array(
    		"uri"=>"1.0/ec.member.auth",
    		"type"=>"put",
    		"param"=>array(
    			"vid"=>'wx'.$openid,
    			"account"=>$account,
    			"password"=>md5($password), 
    			"union_id"=>$unionid,
    			"openId"=>$openid,
    			"platform"=>"KLGWX",
    			"openway"=>"WX"
    		)
    	);
    	$data = self::sendHttp($requestData);
    	$result = array();
    	if($data['returnCode'] == "ok") {
    		$result['userinfo']['acckey'] = $data['huc_acckey'];
    		$result['userinfo']['user_name']= $data['username'];
    		$result['userinfo']['cust_no'] = $data['hdep_bp'];
    		$result['userinfo']['access_token'] = $data['access_token'];
    		$result["returnCode"] = "ok";
    		$result["status"] = 1;
    	} else {
    		$result['msg'] = $data['errorMsg'];
    		$result['errorMsg'] = $data['errorMsg'];
    		$result['status'] = 0;
    		if ($data['error_response']['code'] == "3003") {
    			$result['status'] = -1;
    		}
    	}
    	Api::_afterLoginEvent($openid, $data, "loginByOpenId");
    	return $result;
    }
    
    /**
     * OpenId登陆
     * @param $openid
     * @return Ambigous <multitype:number unknown , \Think\Ambigous>
     */
    public static function loginByOpenId($openid) {
    	Api::_beforeLoginEvent($openid, "loginByOpenId");
    	
    	//session中获取unionid
    	$unionid = session("wxinfo.unionid");
    	if (!$unionid) {
    		$data = Api::getUnionID($openid);
    		if ($data["status"] > 1) {
    			$unionid = $data["wxinfo.unionid"];
    		}
    	}

    	$requestData = array(
    		"uri"=>"1.0/ec.member.auth",
    		"type"=>"put",
    		"param"=>array(
    			"vid"=>'wx'.$openid,
    			"platform"=>"KLGWX",
    			"openway"=>"WX",
    			"openId"=>$openid,
    			"union_id"=>$unionid
    		)
    	);
    	$data = self::sendHttp($requestData);

    	$result = array();
    	if($data['returnCode'] == "ok") {
    		$result['userinfo']['acckey'] = $data['huc_acckey'];
    		$result['userinfo']['user_name']= $data['username'];
    		$result['userinfo']['cust_no'] = $data['hdep_bp'];
    		$result['userinfo']['access_token'] = $data['access_token'];
    		$result["status"] = 1;
    	} else {
    		$result['msg'] = $data['errorMsg'];
    		$result['status'] = 0;
    		if ($data['error_response']['code'] == "3003") {
    			$result['status'] = -1;
    		}
    	}
    	Api::_afterLoginEvent($openid, $data, "loginByOpenId");
    	return $result;
    }
    
    /**
     * 注册，根据openid一键注册
     * @param $openid openid
     * @param string $platform 注册渠道
     * @param string $openway 登录渠道
     * @param string $headUrl 头像url
     * @return multitype:number unknown
     */
    public static function registerByOpenId($openid, $headUrl="") {
    	Api::_beforeRegisterEvent($openid, "registerByOpenId");
    	
    	//session中获取unionid
    	$unionid = session("wxinfo.unionid");
    	if (!$unionid) {
    		$data = Api::getUnionID($openid);
    		if ($d["status"] > 1) {
    			$unionid = $data["wxinfo.unionid"];
    		}
    	}
    	
    	$requestData = array(
    		"uri"=>"1.0/ec.member",
    		"type"=>"post",
    		"param"=>array(
    			"vid"=>'wx'.$openid,
    			"openId"=>$openid,
    			"platform"=>"KLGWX",
    			"openway"=>"WX",
    			"avatar"=>urlencode($headUrl),
    			"union_id"=>$unionid
    		)
    	);
    	$data = self::sendHttp($requestData);
    	$result = array();
    	if($data['returnCode'] == "ok") {
    		$result['userinfo']['acckey'] = $data['huc_acckey'];
    		$result['userinfo']['user_name']= $data['username'];
    		$result['userinfo']['cust_no'] = $data['hdep_bp'];
    		$result['userinfo']['access_token'] = $data['access_token'];
    		$result["status"] = 1;
    	} else {
    		$result['msg'] = $data['errorMsg'];
    		$result['msg'] = $data['errorMsg'];
    		$result['status'] = 0;
    	}
    	Api::_afterRegisterEvent($openid, $data, "registerByOpenId");
    	return $result;
    }
    
    /**
     * 注册，根据用户名密码 注册并绑定openId
     * @param string $account 自定义登录名，account、mobile、email参数至少选择一个
     * @param string $password 登陆密码，明文传入
     * @param string $email 用户邮箱
     * @param string $mobile 用户手机号
     * @param string $nickname 用户昵称
     * @param string $openId 第三方登陆授权的openId
     * @param string $openway 三方登陆渠道例如：腾讯QQ：微信：WX 支付宝：ZFB新浪微博：XLWB 淘宝：TB
     * @param string $platform
     * @param string $avatar
     * @return multitype:number unknown
     */
    public static function registerAndBindOpenId($account, $password, $openId,  $mobile, $email="", $nickname="", $avatar="") {
    	//session中获取unionid
    	$unionid = session("wxinfo.unionid");
    	if (!$unionid) {
    		$data = Api::getUnionID($openid);
    		if ($d["status"] > 1) {
    			$unionid = $data["wxinfo.unionid"];
    		}
    	}
    	
    	$requestData = array(
    		"uri"=>"1.0/ec.member",
    		"type"=>"post",
    		"param"=>array(
    			"vid"=>'wx'.$openid,
    			"account"=>$account,
    			"password"=>$password,
    			"email"=>$email,
    			"mobile"=>$mobile,
    			"nickname"=>$nickname,
    			"openId"=>$openId,
    			"openway"=>"WX",
    			"platform"=>"KLGWX",
    			"avatar"=> urlencode($avatar),
    			"union_id"=>$unionid
    		)
    	);
    	$data = self::sendHttp($requestData);
    	$result = array();
    	if($data['returnCode'] == "ok") {
    		$result['userinfo']['acckey'] = $data['huc_acckey'];
    		$result['userinfo']['user_name']= $data['username'];
    		$result['userinfo']['cust_no'] = $data['hdep_bp'];
    		$result['userinfo']['access_token'] = $data['access_token'];
    	} else {
    		$result["errorMsg"] = $data['errorMsg'];
    	}
    	$result["returnCode"] = $data['returnCode'];
    	return $result;
    }
    
    /**
     * 根据上级地址代码，获取下级地址列表
     * @param $parentCode (不传获取一级地址列表)
     */
    public static function getAddressesByParentcode($parentCode="") {
    	$requestData = array(
    		"uri"=>"1.0/ec.dictionary.addresses",
			"type"=>"get",
    		"param"=>array(
    			"parentcode"=>$parentCode,
    		)
    	);
    	$data = self::sendHttp($requestData);
    	return $data['info'];
    }
    
    /**
     * 添加收货地址
     * @param $transpzone 四级地址编号
     * @param $street 详细地址
     * @param $mobile 手机号码
     * @param $name 收货人姓名
     * @param $tel 电话号码
     * @return Ambigous <string, mixed, unknown>
     */
    public static function addReceiveAddress($transpzone, $street, $mobile , $name, $tel="", $adr_kind="") {
    	$data = array(
    		"uri"=>"1.0/ec.addresses",
    		"type"=>"post",
    		"param"=>array(
    			"transpzone" => $transpzone,
    			"street" => $street,
    			"mobile" => $mobile,
    			"name" => $name,
    			"tel" => $tel,
    			"adr_kind"
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 修改收货地址
     * @param $addrnumber 收货地址id
     * @param $transpzone 四级地址编号
     * @param $street 详细地址
     * @param $mobile 手机号码
     * @param $name 收货人姓名
     * @param $tel 电话号码
     * @return Ambigous <string, mixed, unknown>
     */
    public static function editReceiveAddress($addrnumber, $transpzone, $street, $mobile="" , $name="", $tel="", $adr_kind="") {
    	$data = array(
    		"uri"=>"1.0/ec.addresses/{$addrnumber}",
    		"type"=>"put",
    		"param"=>array(
    			"transpzone" => $transpzone,
    			"street" => $street,
    			"mobile" => $mobile,
    			"name" => $name,
    			"tel" => $tel,
    			"adr_kind" => $adr_kind
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 设置默认收货地址
     * @param $addrnumber 收货地址id
     * @return Ambigous <string, mixed, unknown>
     */
    public static function setDefaultReceiveAddress($addrnumber) {
    	$address = self::getReceiveAddress($addrnumber);
    	$data = array(
    		"uri"=>"1.0/ec.addresses/{$addrnumber}",
    		"type"=>"put",
    		"param"=>array(
    			"transpzone" => $address["transpzone"],
    			"street" => $address["street"],
    			"mobile" => $address["mobile"],
    			"name" => $address["name"],
    			"tel" => $address["tel"],
    			"adr_kind" => "XXDEFAULT"
    		)
    	);
    	return self::sendHttp($data);
    }
    
	/**
     * 获取收货地址列表
     *@return Ambigous <string, mixed, unknown>
     */
    public static function getReceiveAddressList() {
    	$data = array(
    		"uri"=>"1.0/ec.addresses",
    		"type"=>"get",
    		"param"=>array()
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取默认收货地址
     *@return Ambigous <string, mixed, unknown>
     */
    public static function getDefaultReceiveAddress() {
    	$data = array(
    		"uri"=>"1.0/ec.addresses",
    		"type"=>"get",
    		"param"=>array()
    	);
    	$data = self::sendHttp($data);
    	if ($data["returnCode"] == "ok") {
    		if (is_array($data["Address"]) && count($data["Address"]) > 0) {
    			$address = $data["Address"][0];
    		}
    	}
    	return $address;
    }
    
    /**
     * 获取最后一个收货地址
     *@return Ambigous <string, mixed, unknown>
     */
    public static function getLastReceiveAddress() {
    	$data = array(
    			"uri"=>"1.0/ec.addresses",
    			"type"=>"get",
    			"param"=>array()
    	);
    	$data = self::sendHttp($data);
    	if ($data["returnCode"] == "ok") {
    		if (is_array($data["Address"]) && count($data["Address"]) > 0) {
    			$address = $data["Address"][count($data["Address"]) - 1];
    		}
    	}
    	return $address;
    }
    
    /**
     * 根据收货地址id，获取收货地址详情
     * @param unknown $addrnumber 收货地址id
     * @return Ambigous <string, mixed, unknown>
     */
    public static function getReceiveAddress($addrnumber) {
    	$data = array(
    		"uri"=>"1.0/ec.addresses/{$addrnumber}",
    		"type"=>"get",
    		"param"=>array()
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 根据收货地址id，获取收货地址详情
     * @param unknown $addrnumber 收货地址id
     * @return Ambigous <string, mixed, unknown>
     */
    public static function delReceiveAddress($addrnumber) {
    	$data = array(
    		"uri"=>"1.0/ec.addresses/{$addrnumber}",
    		"type"=>"delete",
    		"param"=>array()
    	);
    	return self::sendHttp($data);
    }
    
    //请求微信平台接口
    public static function curlHttp($url, $params=array(), $isPost=1){
    	$ch = curl_init();
    	if($isPost){
    		curl_setopt($ch, CURLOPT_POST, 1);
    		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    	}
    	curl_setopt($ch, CURLOPT_URL,$url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    	curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    	$res = curl_exec($ch);
    	curl_close($ch);
    	$res = json_decode($res,true);
    	return $res;
    }
    
    /**
     * 获取会员信息概要信息
     * @return Ambigous <string, mixed, unknown>
     */
    public static function getMemberSummaryInfo() {
    	$data = array(
    		"uri"=>"1.0/ec.member.summary",
    		"type"=>"get",
    		"param"=>array()
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取会员信息
     * @return Ambigous <string, mixed, unknown>
     */
    public static function getMemberInfo() {
    	$data = array(
    		"uri"=>"1.0/ec.member",
    		"type"=>"get",
    		"param"=>array()
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 修改个人信息
     * @param string $nickname 昵称
     * @param number $sex 性别（0女，1男）
     * @param string $birthday 生日
     * @return Ambigous <string, mixed, unknown>
     */
    public static function updateMemberInfo($nickname="", $sex=1, $birthday="") {
    	$data = array(
    		"uri"=>"1.0/ec.member",
    		"type"=>"put",
    		"param"=>array(
    			"nickname"=>$nickname,
    			"sex"=>$sex,
    			"birthday"=>$birthday
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 修改密码
     * @param unknown $loginName 手机号码/邮箱
     * @param string $verifyCode 验证码（和旧密码二选一）
     * @param unknown $newpassword 新密码
     * @param string $oldpassword 旧密码（和验证码二选一）
     * @return Ambigous <string, mixed, unknown>
     */
    public static function updatePassword($loginName, $verifyCode="", $newpassword, $oldpassword="") {
    	$data = array(
    		"uri"=>"1.0/ec.member.password",
    		"type"=>"put",
    		"param"=>array(
    			'loginName'=>$loginName,
    			'verifyCode'=>$verifyCode,
    			'newpassword'=>$newpassword,
    			'oldpassword'=>$oldpassword
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 验证码获取并发送
     * @param unknown $loginName 手机号码/邮箱
     * @param string $code_Type
     * 获取验证码类型：
	 * 注册：registe
	 * 绑定：bind
	 * 解绑：unbind
	 * 重新绑定：rebind
	 * 修改密码 : changepassword
	 * 解锁 unlock
     * @return Ambigous <string, mixed, unknown>
     */
    public static function sendVerifycode($loginName, $code_Type) {
    	$data = array(
    		"uri"=>"1.0/ec.verifycode",
    		"type"=>"post",
    		"param"=>array(
    			'loginName'=>$loginName,
    			'code_Type'=>$code_Type
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 4.3.9.根据手机/邮箱绑定或重绑用户
     * @param unknown $loginName 用户效验的手机/邮箱
     * @param string $verifyCode 6位验证码
     * @param unknown $unbindVerifyCode 解绑验证码，当类型为重新绑定(rebind)时必填项，其它为空
     * @param string $code_Type 验证绑定类型：
	 * 注册：registe
	 * 绑定：bind
	 * 解绑：unbind
	 * 重新绑定：rebind
	 * 修改密码 : changepassword
	 * 解锁 unlock
     * @return Ambigous <string, mixed, unknown>
     */
    public static function updateMobile($loginName, $password="", $verifyCode="", $unbindVerifyCode="", $code_Type="") {
    	$data = array(
    		"uri"=>"1.0/ec.member.bind",
    		"type"=>"put",
    		"param"=>array(
    			'loginName'=>$loginName,
    			'password'=>$password,
    			'verifyCode'=>$verifyCode,
    			'unbindVerifyCode'=>$unbindVerifyCode,
    			'code_Type'=>$code_Type
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 验证验证码
     * @param unknown $loginName
     * @param string $verifyCode
     * @param string $code_Type
     * @return Ambigous <string, mixed, unknown>
     */
    public static function checkVerifycode($loginName, $verifyCode, $code_Type) {
    	$data = array(
    		"uri"=>"1.0/ec.verifycode",
    		"type"=>"put",
    		"param"=>array(
    			'loginName'=>$loginName,
    			'verifyCode'=>$verifyCode,
    			'code_Type'=>$code_Type
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 绑定手机号码
     * @param unknown $mobile 手机号码
     * @param unknown $verifyCode 验证码
     * @return \Think\Ambigous
     */
    public static function bindMobile($mobile, $verifycode, $password) {
    	$unbindVerifyCode = "";
    	$code_Type = "bind";
    	$data = Api::updateMobile($mobile, $password, $verifycode, $unbindVerifyCode, $code_Type);
    	return $data;
    }
    
    /**
     * 解绑手机号码
     * @param unknown $mobile 手机号码
     * @param unknown $verifyCode 验证码
     * @return \Think\Ambigous
     */
    public static function unbindMobile($mobile, $verifycode) {
    	$password = "";
    	$unbindVerifyCode = "";
    	$data = Api::updateMobile($mobile, $password, $verifycode, $unbindVerifyCode, $code_Type="unbind");
    	return $data;
    }
    
    /**
     * 绑定手机号码
     * @param unknown $mobile 手机号码
     * @param unknown $verifyCode 验证码
     * @return \Think\Ambigous
     */
    public static function rebindMobile($mobile, $verifycode, $unbindVerifyCode) {
    	$password = "";
    	$data = Api::updateMobile($mobile, $password, $verifycode, $unbindVerifyCode, $code_Type="rebind");
    	return $data;
    }
    
    /**
     * 获取会员绑定信息
     */
    public static function getMemberBindInfo() {
    	$data = array(
    		"uri"=>"1.0/ec.member.query",
    		"type"=>"get",
    		"param"=>array()
    	);
    	return self::sendHttp($data);
    	
    }
    
    /**
     * 获取订单列表
     * @param  $pageindex 请求分页，页索引，从0开始
     * @param $pagesize 每页返回的记录条数
     * @param $statuses 订单状态，同时请求多个状态用“,”分隔
     * 待付款：NeedToPay
     * 待发货：WaitForShipping
     * 待收货：WaitForReceive
     * 已收货：Received
     * 已取消：Canceled
     * 全部：ALL
     * @param string $platform 应用平台：
     * IOSAPP端:KLGiPhone
     * 安卓APP端:KLGAndroid
     * 微信端：KLGWX
     * 移动官网：KLGMPortal
     * 官网：KLGPortal
     * @return Ambigous <string, mixed, unknown>
     */
    public static function getOrderList($pageindex, $pagesize, $statuses="ALL", $platform="") {
    	$data = array(
    		"uri"=>"1.0/ec.orders",
    		"type"=>"get",
    		"param"=>array(
    			"pageindex"=>$pageindex,
    			"pagesize"=>$pagesize,
    			"statuses"=>$statuses
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 订单删除
     * @param unknown $orderid 订单id
     * @return \Think\Ambigous
     */
    public static function deleteOrder($orderid) {
    	$data = array(
    		"uri"=>"1.0/ec.orders.delete/".$orderid,
    		"type"=>"delete"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 订单确认收货
     * @param unknown $orderid 订单id
     * @return \Think\Ambigous
     */
    public static function receivedOrder($orderid) {
    	$data = array(
    		"uri"=>"1.0/ec.orders/".$orderid,
    		"type"=>"put"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 订单取消
     * @param unknown $orderid 订单id
     * @return \Think\Ambigous
     */
    public static function cancelOrder($orderid) {
    	$data = array(
    			"uri"=>"1.0/ec.orders/".$orderid,
    			"type"=>"delete"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取退换货商品列表(可退货商品)
     * @param  $pageindex 请求分页，页索引，从0开始
     * @param $pagesize 每页返回的记录条数
     * @return Ambigous <string, mixed, unknown>
     */
    public static function getCanReturnGoodsList($pageindex, $pagesize) {
    	$data = array(
    		"uri"=>"1.0/ec.return.goods",
    		"type"=>"get",
    		"param"=>array(
    			"pageindex"=>$pageindex,
    			"pagesize"=>$pagesize
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取订单详情
     * @param $orderId 订单id
     * @param string $platform 应用平台：
     * IOSAPP端:KLGiPhone
     * 安卓APP端:KLGAndroid
     * 微信端：KLGWX
     * 移动官网：KLGMPortal
     * 官网：KLGPortal
     * @return Ambigous <string, mixed, unknown>
     */
    public static function getOrderDetail($orderId, $platform="ALL") {
    	$data = array(
    		"uri"=>"1.0/ec.orders/".$orderId,
    		"type"=>"get",
    		"param"=>array(
    			"platform"=>$platform
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取订单物流
     * @param $orderId 订单id
     * @return \Think\Ambigous
     */
    public static function getOrderLogistics($orderId) {
    	$data = array(
    		"uri"=>"1.0/ec.orders.logistics/".$orderId,
    		"type"=>"get"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取我的资产概要
     * @return \Think\Ambigous
     */
    public static function getOrdersSummary() {
    	$data = array(
    		"uri"=>"1.0/ec.member.orders.summary",
    		"type"=>"get",
    		"param"=>array()
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取积分,心意卡，预付款列表
     * @param unknown $pageindex 当前页码
     * @param unknown $pagesize 每页条数
     * @param unknown $pt_type
     * 01-积分
     * 02-心意卡
     * 03-预付款
     * @return Ambigous <string, mixed, unknown>
     */
    public static function getMemberAccount($pageindex, $pagesize, $pt_type, $pageid="") {
    	$data = array(
    		"uri"=>"1.0/ec.member.account",
    		"type"=>"get",
    		"param"=>array(
    			"pageindex"=>$pageindex,
    			"pagesize"=>$pagesize,
    			"pageid"=>$pageid,
    			"pt_type"=>$pt_type
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取我的资产概要
     * @return Ambigous <string, mixed, unknown>
     */
    public static function getMemberAssetsSummary() {
    	$data = array(
    		"uri"=>"1.0/ec.member.assets.summary",
    		"type"=>"get",
    		"param"=>array()
    	);
    	return self::sendHttp($data);
    }
    
	/**
     * 获取我的优惠券
     * @return Ambigous <string, mixed, unknown>
     */
    public static function getMemberAssetsVoucher($pageindex, $pagesize) {
    	$data = array(
    		"uri"=>"1.0/ec.member.assets.voucher",
    		"type"=>"get",
    		"param"=>array(
    			"pageindex"=>$pageindex,
    			"pagesize"=>$pagesize,
    			"pt_type"=>$pt_type
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 查询唯一订单商品
     * @param $orderGoodsId
     * @return \Think\Ambigous
     */
    public static function getOrderGoods($orderGoodsId) {
    	$data = array(
    		"uri"=>"1.0/ec.orders.goods/".$orderGoodsId,
    		"type"=>"get"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 退货申请
     * @param $returnNum 数量
     * @param $orderGoodsId 商品
     * @param $contact 联系方式
     * @param $reason 原因
     * @param $reasonInfo 描述
     * @return \Think\Ambigous
     */
    public static function ordersRefund($returnNum, $orderGoodsId, $contact, $reason, $reasonInfo="", $Platform='KLGWX') {
    	$data = array(
    		"uri"=>"1.0/ec.orders.refund",
    		"type"=>"post",
    		"param"=>array(
    			"returnNum"=>$returnNum,
    			"orderGoodsId"=>$orderGoodsId,
    			"contact"=>$contact,
    			"reason"=>$reason,
    			"reasonInfo"=>$reasonInfo,
    			"platform"=>$Platform
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 查询申请退货中的商品列表（暂未审核）
     * @return \Think\Ambigous
     */
    public static function getReturnGoodsApplyList() {
    	$data = array(
    		"uri"=>"1.0/ec.return.goods.apply",
    		"type"=>"get"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 查询退货申请审核通过的商品列表（正在退货、退货完成的）
     * @return \Think\Ambigous
     */
    public static function getReturnGoodsList($pageindex, $pagesize) {
    	$data = array(
    		"uri"=>"1.0/ec.return.goods.info",
    		"type"=>"get",
    		"param"=>array(
    			"pageindex"=>$pageindex,
    			"pagesize"=>$pagesize
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 查询退货进度详情
     * @return \Think\Ambigous
     */
    public static function getReturnProgressDetail($id) {
    	$data = array(
    		"uri"=>"1.0/ec.return.progress.detail/".$id,
    		"type"=>"get"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 查询退货申请进度详情
     * @return \Think\Ambigous
     */
    public static function getReturnApplyDetail($id) {
    	$data = array(
    		"uri"=>"1.0/ec.return.apply.detail/".$id,
    		"type"=>"get"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取退货信息
     * @return \Think\Ambigous
     */
    public static function getOrderRefund($returnId) {
    	$data = array(
    		"uri"=>"1.0/ec.orders.refund",
    		"type"=>"get",
    		"param"=>array(
    			"returnId"=>$returnId
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 提交退货物流信息
     * @return \Think\Ambigous
     */
    public static function submitReturnLogistics($returnId, $expressName, $expressNo,  $remark="") {
    	$data = array(
    		"uri"=>"1.0/ec.orders.refund",
    		"type"=>"put",
    		"param"=>array(
    			"returnId"=>$returnId,
    			"expressName"=>$expressName,
    			"expressNo"=>$expressNo,
    			"remark"=>$remark,
    			"platform"	=>"klgwx"
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 根据订单商品id查询订单商品评论（唯一）
     * @return \Think\Ambigous
     */
    public static function getGoodsComment($orderproductId) {
    	$data = array(
    		"uri"=>"1.0/goods.comments/".$orderproductId,
    		"type"=>"get"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 提交商品评论
     * @param $orderId 订单编号
     * @param $orderproductId 订单商品id
     * @param $content 评论内容
     * @param $descScore 商品评分
     * @param $shippingScore 物流评分
     * @param $deliveryScore 发货评分
     * @param string $file 图片
     * @return \Think\Ambigous
     */
    public static function submitGoodsComment($orderId, $orderproductId, $content, $descScore, $shippingScore, $deliveryScore, $file="") {
    	$data = array(
    		"uri"=>"1.0/ec.goods.comments",
    		"type"=>"post",
    		"param"=>array(
    			"orderproductId"=>$orderproductId,
    			"content"=>$content,
    			"descScore"=>$descScore,
    			"shippingScore"=>$shippingScore,
    			"deliveryScore"=>$deliveryScore,
    			"orderId"=>$orderId,
    			"file"=>$file
    		)
    	);
    	return self::sendHttp($data);
    }
    
    
    /**
     * 获取品牌列表
     * @return \Think\Ambigous
     */
    public static function getBrandList() {
    	$data = array(
    			"uri"=>"1.0/ec.brand",
    			"type"=>"get"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取商品分类列表
     * @param pid 商品分类父节点ID
     * @return \Think\Ambigous
     */
    public static function getGoodsClass($pid="0") {
    	$data = array(
    		"uri"=>"1.0/ec.goods.class",
    		"type"=>"get",
    		"param"=>array(
    			"pid"=>$pid
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取历史订单列表
     * @param $pageindex 
     * @param $pagesize
     * @return \Think\Ambigous
     */
    public static function getHistoryOrderList($pageindex, $pagesize) {
    	$data = array(
    		"uri"=>"1.0/ec.historyorders",
    		"type"=>"get",
    		"param"=>array(
    			"pageindex"=>$pageindex,
    			"pagesize"=>$pagesize,
    			"mediaOrg"=>"A20001,A20006,A20007,A20010,A20014,A20015"
    		)
    		
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 历史订单详情
     * @param $orderNo 订单id
     * @return \Think\Ambigous
     */
    public static function getHistoryOrderDetail($orderNo) {
    	$data = array(
    		"uri"=>"1.0/ec.historyorders/".$orderNo,
    		"type"=>"get"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取微信JSAPI相关配置信息
     * @return \Think\Ambigous
     */
    public static function getJsonApiTicket() {
    	$data = array(
    		"uri"=>"1.0/ec.jsonapi.ticket",
    		"type"=>"get"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取专题信息
     * @param unknown $id 专题id
     * @return \Think\Ambigous
     */
    public static function getZtInfo($id, $pageindex=0, $pagesize=10) {
    	$data = array(
    		"uri"=>"1.0/ec.app.home.ad/".$id,
    		"type"=>"get",
    		"param"=>array(
    			"pageindex"=>$pageindex,
    			"pagesize"=>$pagesize,
    			"platform"=>"klgwx"
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取广告列表
     * @return \Think\Ambigous
     */
    public static function getAdList() {
    	$data = array(
    		"uri"=>"1.0/ec.app.home.ad",
    		"type"=>"get"
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 获取广告列表
     * @return \Think\Ambigous
     */
    public static function getHomeRecommends($pageindex=0, $pagesize=10) {
    	$data = array(
    		"uri"=>"1.0/ec.app.home.recommends",
    		"type"=>"get",
    		"param"=>array(
    			"pageindex"=>$pageindex,
    			"pagesize"=>$pagesize
    		)
    	);
    	return self::sendHttp($data);
    }
    
    /**
     * 发放积分
     * @param unknown $cust_no 客户编号
     * @param unknown $pointsnum 积分数
     * @param unknown $pointsremarks 备注
     * @return Ambigous <string, mixed>
     */
    public static function giveIntegral($cust_no, $pointsnum, $pointsremarks) {
    	$run_evn = C("RUN_EVN");  	//运行环境(0：本地环境，1：测试环境，2：正式环境)
    	if ($run_evn == 2) {
    		$url = "ecadmin.happigo.com/shop/api/erp/api.php";
    	} else {
    		$url = "mall2admindev.happigo.com/shop/api/erp/api.php";
    	}
    	
    	$arr = array(
    		"functionid"=>"EC150006",
    		"appid"=>"3",
    		"action"=>"execute",
    		"parameters"=>array(
    			"cust_no"=> $cust_no,
		        "operatetype"=> "0",
		        "pointsnum"=> $pointsnum,
		        "pointsremarks"=> $pointsremarks,
		        "type"=> "game",
		        "pointsdesc"=> $pointsremarks
    		),
    		"verification"=>Api::sign()
    	);
    	
    	$post_info = json_encode($arr);
    	$data = self::curlHttp($url, array("post_info"=>$post_info));
    	if ($data["ErrorNo"] == "1") {
    		$data["returnCode"] = "ok";
    	} else {
    		$data["returnCode"] = "fail";
    	}
    	return $data;
    }
    
    //通信密钥加密
    static private function sign(){
    	$ERPTOWEB_KEY  = 'F58D6072E97B49ABFFB6CA1AF68136C0';
    	$result['nonce'] = mt_rand(10000000, 99999999);
    	$result['timestamp'] = time();
    	$tmpArr = array($ERPTOWEB_KEY, $result['timestamp'], $result['nonce']);
    	sort($tmpArr, SORT_STRING);
    	$tmpStr = implode($tmpArr);
    	$result['apisign'] = sha1($tmpStr);
    	return $result;
    }
    
    /**
     * 积分交易系统
     * @AuthorHTL zyx
     * @DateTime  2016-03-24T09:41:21+0800
     * @param     [type]                   $CustNo           顾客编号
     * @param     [type]                   $Points           积分数
     * @param     [type]                   $Remark           CRM传入备注
     * @param     [type]                   $TransationRemark 后台备注
     * @param     [type]                   $BusinessId       业务编号
     * @param     [type]                   $AccessKey        认证KEY
     * @param     [type]                   $OutSn            外部业务号（唯一）
     */
    static public function PointsTransactionaApi($CustNo, $Points, $Remark, $TransationRemark = '', $BusinessId, $AccessKey, $OutSn) {
    	$param = array();
    	$param['cust_no']           = $CustNo;              //cust_no
    	$param['business_remark']   = $Remark;              //传入CRM备注
    	$param['transation_remark'] = $TransationRemark;     //后台显示备注
    	$param['business_id']       = $BusinessId;          //业务ID
    	$AccessKey                  = $AccessKey;           //验证KEY
    	$param['out_sn']            = $OutSn;               //外部业务单号
    	$param['points']            = $Points;              //积分数
    	$param['sign'] = self::getPTSign($BusinessId, $AccessKey, $OutSn, $CustNo, $Points);
    	$run_evn = C("RUN_EVN");  	//运行环境(0：本地环境，1：测试环境，2：正式环境)
    	if ($run_evn == 2) {
    		$url = 'http://10.16.1.62/index.php/Home/SendPoints/';
    	} else {
    		$url = 'http://pt.happigo.com/index.php/Home/SendPoints/';
    	}
    	$resultInfo = self::PostJsonRequest($param, $url);
    	return $resultInfo;
    }
    
    /**
     * 加密
     * @AuthorHTL zyx
     * @DateTime  2016-03-22T15:41:26+0800
     * @param     [type]                   $Business_id 业务编号
     * @param     [type]                   $AccessKey   AccessKey
     * @param     [type]                   $out_sn      外部业务单号
     * @param     [type]                   $cust_no     顾客编号
     * @param     [type]                   $points      积分数
     * @return    [type]                   加密串
     */
    static private function getPTSign($Business_id, $AccessKey, $out_sn, $cust_no, $points){
    	$SingStr = $Business_id.$AccessKey.$out_sn.$cust_no.$points;
    	$SingMd5 = md5($SingStr);
    	return $SingMd5;
    }
    
    
    static private function PostJsonRequest($arr, $url, $timeout = 30, $flag = 1){
    	$params = array();
    	$params['post_info'] = json_encode($arr, true);
    	$ch = curl_init();
    	curl_setopt($ch, CURLOPT_URL,$url);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    	curl_setopt($ch, CURLOPT_POST, 1 );
    	curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);            // 超时时间
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $params);          // 将此字符串加入到POST请求里
    	$result = curl_exec($ch);
    	print_r($result);
    	curl_close($ch);                                        //关闭此句柄
    
    	/*---------- 替换影响json_decode的部分 S ----------*/
    	$result = str_replace("\r\n", '', $result);
    	$result = str_replace("\n", '', $result);
    	$result = str_replace("\t", '', $result);
    	$result = str_replace("\\\"", '', $result);
    	/*---------- 替换影响json_decode的部分 E ----------*/
    	$result = json_decode($result,true);
    	return $result;
    }
    
}