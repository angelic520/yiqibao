<?php

/**
 * 跨境购请求api
 * @author Administrator
 *
 */
namespace Think;
class CrossApi{
	
	
	//全球购代理请求
	function proxyReq($resource,$method,$param)
	{
		$user = session("user") ? session("user") : array();
		$param["bp"]=$user['cust_no'];
		$data = array(
				"uri"=>$resource,
				"type"=>$method,
				"param"=>$param
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//获取大眼睛
	function getCrossEye()
	{
		$data = array(
				"uri"=>"1.0/cross.eye",
				"type"=>"get"
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//统计大眼睛的访问次数
	function modifyCrossEyeTimes($carouselId)
	{
		$data = array(
				"uri"=>"1.0/cross.eye/$carouselId",
				"type"=>"put"
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//获取首页分组
	function getCrossGoodGroup()
	{
		$data = array(
				"uri"=>"1.0/hc.goods.group",
				"type"=>"get"
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//获取首页分组商品
	function getCrossGoodGroupItem()
	{
		$data = array(
				"uri"=>"1.0/hc.goods.group.item",
				"type"=>"get"
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//获取首页商品
	function getCrossHomeGood()
	{
		$data = array(
				"uri"=>"1.0/cross.home.good",
				"type"=>"get"
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	
	//添加订单评论
	function addOrderComment($hid,$content,$rate)
	{
		$user = session("user") ? session("user") : array();
		$data = array(
				"uri"=>"1.0/goods.comments",
				"type"=>"post",
				"param"=>array(
						"bp"=>$user['cust_no'],
						"orderproductId" => $hid,
						"content" => $content,
						"rate" => $rate
				)
		);
		return self::sendHttp($data);
	}
	
	//获取订单评论
	function getOrderComment($hid)
	{
		$user = session("user") ? session("user") : array();
		$data = array(
				"uri"=>"1.0/goods.comments/$hid",
				"type"=>"get",
				"param"=>array(
						"bp"=>$user['cust_no'],
				)
		);
		return self::sendHttp($data);
	}
	
	//查询收货地址
	function getAdress()
	{
		$user = session("user") ? session("user") : array();
		$data = array(
				"uri"=>"1.0/addresses",
				"type"=>"get",
				"param"=>array(
						"bp"=>$user['cust_no']
				)
		);
		return self::sendHttp($data);
	}
	
	//添加收货地址
	function addAdress()
	{
		$data = array(
				"uri"=>"1.0/addresses",
				"type"=>"post",
				"param"=>array(
						"transpzone" => "12694",
						"mobile" => "15845698745",
						"street" => "大溪地",
						"name" => "张浩",
						"tel" => "",
				)
		);
		return self::sendHttp($data);
	}
	
	//用户实名信息查询
	function getUserRealInfo()
	{
		$user = session("user") ? session("user") : array();
		$data = array(
				"uri"=>"1.0/member.realname",
				"type"=>"get",
				"param"=>array(
						"bp"=>$user['cust_no']
				)
		);
		return self::sendHttp($data);
	}
	
	//用户实名认证信息修改
	function modifyUserRealInfo($realname,$idnumber)
	{
		$user = session("user") ? session("user") : array();
		$data = array(
				"uri"=>"1.0/member.realname",
				"type"=>"put",
				"param"=>array(
						"realname" => $realname,
						"idnumber" => $idnumber,
						"bp"=>$user['cust_no']
				)
		);
		return self::sendHttp($data);
	}
	
	//提交订单
	function addOrder($order)
	{
		$user = session("user") ? session("user") : array();
		$data = array(
				"uri"=>"1.0/orders",
				"type"=>"post",
				"param"=>array(
						"shopingCarIds" => $order['shopingCarIds'],
						//"addressNumber" => $order['addressNumber'],
						"ReceiverName" => $order['ReceiverName'],
						"ReceiverArea" => $order['ReceiverArea'],
						"TRANSPZONE" => $order['TRANSPZONE'],
						"ReceiverAddress" => $order['ReceiverAddress'],
						"ReceiverMobile" => $order['ReceiverMobile'],
						"ReceiverIDNumber" => $order['ReceiverIDNumber'],
						"InvoiceTitle" => $order['invoiceTitle'],
						"InvoiceType" => $order['invoiceType'],
						"shippingway" => $order['shippingway'],
						"paymentWayCode" => $order['paymentWayCode'],
						"remark" => $order['remark'],
						"plantfrom" => "WX",
						"bp"=>$user['cust_no']
				)
		);
		return self::sendHttp($data);
	}
	
	//订单确认
	function comfirmOrder($goodInfo)
	{
		$user = session("user") ? session("user") : array();
		$data = array(
				"uri"=>"1.0/orders.comfirm",
				"type"=>"post",
				"param"=>array(
						"ProductIds"=>$goodInfo['productIds'],
						"ProductSpecIds"=>$goodInfo['productSpecIds'],
						"productsCounts"=>$goodInfo['productsCounts'],
						"shippingway"=>$goodInfo['shippingway'], //平邮：PY EMS:ES 快递：KD
						"plantfrom"=>"WX",
						"bp"=>$user['cust_no']
				)
		);
		return self::sendHttp($data);
	}
	
	//获取商品详情
	function getProductDetail($hid)
	{
		$data = array(
				"uri"=>"1.0/hc.goods/$hid",
				"type"=>"get"
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//获取商品评论
	function getProductComments($hid,$pageindex,$pagesize=10)
	{
		$data = array(
				"uri"=>"1.0/goods.comments",
				"type"=>"get",
				"param"=>array(
						"goodsid" => $hid,
						"pageindex"=>$pageindex,
						"pagesize"=>$pagesize,
				)
		);
		$result = self::sendHttp($data);
		return $result;
	}

	//获取跨境购订单列表
	function crossOrders($pageindex, $pagesize, $statuses, $ordertype) {
		$user = session("user") ? session("user") : array();
		$data = array(
			"uri"=>"1.0/orders",
			"type"=>"get",
			"param"=>array(
				"pageindex"=>$pageindex,
				"pagesize"=>$pagesize,
				"statuses"=>$statuses,
				"ordertype"=>$ordertype,
				"bp"=>$user['cust_no']
			)
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//获取跨境购订单详情
	function crossOrderDetail($orderId) {
		$user = session("user") ? session("user") : array();
		$data = array(
				"uri"=>"1.0/orders/{$orderId}",
				"type"=>"get",
				"param"=>array(
						"bp"=>$user['cust_no']
				)
		);
		$result = self::sendHttp($data);
		return $result;
	}
	
	//取消跨境购订单
	function crossOrderCancel($orderId, $reason="") {
		$user = session("user") ? session("user") : array();
		$data = array(
			"uri"=>"1.0/orders/{$orderId}",
			"type"=>"delete",
			"param"=>array(
				"reason"=>$reason,
				"bp"=>$user['cust_no']
			)
		);
		$result = self::sendHttp($data);
		return $result;
	}

	//公用调用处理
	private function sendHttp($param)
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
				//$param['param']['fc'] = "1";
				$result = CrossHttpTools::curl_put($param['uri'],$param['param'],$username,$access_token,$clientIp);
				break;
			}
			case 'get' :
			{
				$result = CrossHttpTools::curl_get($param['uri'],$param['param'],$username,$access_token,$clientIp);
				break;
			}
			case 'post' :
			{
				//$param['param']['fc'] = "1";
				$result = CrossHttpTools::curl_post($param['uri'],$param['param'],$username,$access_token,$clientIp);
				break;
			}
			case 'delete':
			{
				$result = CrossHttpTools::curl_delete($param['uri'],$param['param'],$username,$access_token,$clientIp);
				break;
			}
			default:
			{
				$result = CrossHttpTools::curl_get($param['uri'],$param['param'],$username,$access_token,$clientIp);
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
			if($jsonResult['SimpleResult'] && $jsonResult['SimpleResult']['code'] !='ok' || ($jsonResult['code'] && $jsonResult['code'] != "ok"))
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
	
	function replaceNull($param)
	{
		if($param['param'] && is_array($param['param']))
		{
			foreach ($param['param'] as $key=>$value)
			{
				if(empty($value))
				{
					$param['param'][$key] = "";
				}
			}
		}
		return $param;
	}
}
