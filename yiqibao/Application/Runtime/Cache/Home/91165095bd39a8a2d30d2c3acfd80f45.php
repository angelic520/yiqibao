<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<!--<link rel="stylesheet" type="text/css" href="Application/Home/View/Index/bootstrap/css/bootstrap.min.css"/>-->
		<script src="/luyan/yiqibao/Public/js/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="/luyan/yiqibao/Public/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/luyan/yiqibao/Public/css/slide.css"/>
		<link rel="stylesheet" type="text/css" href="/luyan/yiqibao/Public/css/animate.css"/>
		<script src="/luyan/yiqibao/Public/js/slide.js" type="text/javascript" charset="utf-8"></script>	
		<script src="/luyan/yiqibao/Public/icon/iconfont.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			/*@media (min-width: 992px) {
				.col-md-6{
                    background-color:#E6E2EB;
                }
			}*/
			 .icon {
	          /* 通过设置 font-size 来改变图标大小 */
	          width: 1em; height: 1em;
	          /* 图标和文字相邻时，垂直对齐 */
	          vertical-align: -0.15em;
	          /* 通过设置 color 来改变 SVG 的颜色/fill */
	          fill: currentColor;
	          /* path 和 stroke 溢出 viewBox 部分在 IE 下会显示
	             normalize.css 中也包含这行 */
	          overflow: hidden;
	        }
	        .cls{clear: both;}
	        .fixed-menu{position: fixed;top: 200px;right:20px;width: 160px;height: 200px;}
	        .menu-items{float: left;width: 90%;height: 40px;background: #C9C9C9;border-radius: 8px;margin: 5px;text-align: center;color: black;line-height: 40px;font-size: 18px;cursor: pointer;}
			/*公共头部*/
			.nav-top{width: 100%;height: 30px;background: #D7D7D7;display: block;}
			.nav-left{line-height: 30px;padding-left: 20px;width: 200px;float: left;}
			.nav-right{width: 600px;height: 30px;float: right;display: block;}
			.nav-right-select select{height: 29px;float: left;/*width: 100px;*/}
			.nav-right-item{float:left;padding: 0px 20px;border-right: 1px solid #804D33;height: 20px;margin-top: 5px;}
			.top-show{width: 70%;margin: 0 auto;}
			.search{float: right;width: 700px;height: 40px;margin: 20px 0px;}
			.top-show-sel{width:15%;float: left;}
			.top-show-txt{width: 55%;float: left;}
			.hc-pl{width: 100%; margin-top: 100px;overflow: hidden;}
			.page-footer{width: 100%;height: 60px;background: black;color: white;text-align: center;line-height: 60px;font-size: 16px;}
			/*路演区块*/
			/*图片简介区块*/
			.main-top{width: 70%;overflow: hidden;margin: 0 auto;margin-top: 30px;}
			.show-pic-tle .btn-default{float: left;padding: 10px 45px;margin-right: 10px;position: relative;}
			.show-pic-tle span{margin-left: 20px;color: #169BD5;float: left;line-height: 30px;}			
			.show-pic{width: 55%;height: 390px;float: left;border: none;}
			.show-pic-words{width: 45%;height:390px;float: left;border-radius: 5px;background:#F2F2F2;}
			.show-pic-par{width: 100%;overflow: hidden;}
			.show-pic-par .small_pic{float: left;width:30%;height: 180px;margin: 1%;cursor: pointer;;}
			.small_pic img{width: 100%;max-height: 180px;}
			.show-pic-words .row{margin: 30px 30px 0px 30px;}
			.show-pic-words .col-md-9{height: 35px;}
			.show-pic-words .row{font-size: 16px;padding-top: 20px;}
			.words-bot{width: 400px;margin-top:80px;margin-left: 20px;}
			.words-bot div{margin-left: 20px;float:left;}
			.words-bot .icons{font-size: 22px;}
			svg{cursor: pointer;}
			/*项目概要*/
			.road-show-outline{margin-top: 80px;overflow: hidden;padding-bottom:40px; background: #F2F2F2;margin-bottom: 40px;position: relative;}
			.show-outline-left{height: 360px;border: 1px solid #797979;width: 55%;float: left;border-radius: 5px;margin-bottom: 5px;}
			.show-outline-left .spec-tle{text-align: center;width: 100%;float:left;padding: 10px 0px 20px 0px;font-size: 16px;font-weight: 700;}
			.show-outline-left div{font-size: 16px;height: 35px;}
			/*.show-outline-right{height: 360px;width: 45%;background: #F2F2F2;float: left;background-image: url('/luyan/yiqibao/Public/images/luyan_detail_2.jpg');background-size: 100% 100%;}*/
			.show-outline-right{height: 360px;width: 45%;background: #F2F2F2;float: left;}
			.show-outline-tle{width: 100%;padding: 10px 5px;font-size: 22px;font-weight: 700;}
			.bot-btns{width: 200px;height: 30px;margin: 0 auto;margin-bottom: 50px;position: absolute;bottom: 10px;right:100px;}
			/*.bot-btns div{padding: 10px;}*/
		</style>
	</head>
	<body>
		<!--公共头部-->
		<div class="nav-top">
			<div class="nav-left">
				欢迎来到一起包工程网	
			</div>
			<div class="nav-right">
				<div class="nav-right-select">
				<!--	<select class="form-control"  >
						<option value="chinese">chinese</option>
						<option value="english">english</option>
					</select>-->	
					<select name="">
						<option value="chinese">chinese</option>
						<option value="english">english</option>
					</select>
				</div>
				<div class="nav-right-item" >欢迎<span style="color: red;" >韩**</span></div>
				<div class="nav-right-item" >用户注册</div>
				<div class="nav-right-item" >找回密码</div>
				<div class="nav-right-item" >在线咨询</div>
				<div class="nav-right-item" >
					<svg class="icon" aria-hidden="true">
                        <use xlink:href="#icon-xin"></use>
                    </svg>
					<span style="color: red;" >14</span>
				</div>
			</div>
		</div>
		
		<div class="top-show">
			<a href="http://www.epcchance.com/"><img src="/luyan/yiqibao/Public/images/logo.png" alt="..." class="img-rounded"></a>
			<!--<img src="/luyan/yiqibao/Public/images/logo1.jpg"/>-->
			<div class="search">
				<select class="form-control top-show-sel" >
					<option value="">项目</option>
					<option value="">招标</option>
					<option value="">采购</option>
					<option value="">服务</option>
				</select>
				<input type="text" id="inputHelpBlock" class="form-control top-show-txt" aria-describedby="helpBlock"  >
				<button type="button" class="btn btn-warning" style="width: 12%;float: left;" >立即搜索</button>
				<button type="button" class="btn btn-danger" style="width: 15%;float: left;margin-left: 1%;" >我要发布项目</button>
			</div>
		</div>
		<!--公共头部结束-->
		
		<!--路演信息-->
		<div class="main-top">
			<!--图片简介-->
			<div class="road-show-pic">
				<div class="show-pic-tle" >
					<div class="show-outline-tle">
						项目路演
					</div>
					<div  class="btn btn-default hc-m">本月推荐<span style="color: red;position: absolute;top: -5px;right: 20px;z-index: 100;overflow: hidden;" >hot</span></div>
					<div  class="btn btn-default hc-m">精彩回放</div>
				</div>
				<div class="show-pic-par">
					<a href="<?php echo U('index/lydetail');?>">
						<div class="show-pic">
							<img src="/luyan/yiqibao/Public/images/luyan_detail_7.jpg" alt="..." class="img-thumbnail" style="height: 100%;" >
						</div>
					</a>
					<div class="show-pic-words container-fluid">
						<div class="row">
						  <div class="col-md-9"><span style="font-weight: 700;padding-right: 8px;" >路演时间：</span>2017-08-24 15:30-18:00</div>
						  <div class="col-md-9"><span style="font-weight: 700;padding-right: 8px;" >项目国家:</span>马来西亚</div>
						  <div class="col-md-9"><span style="font-weight: 700;padding-right: 8px;" >项目模式:</span>BOT项目</div>
						  <div class="col-md-9"><span style="font-weight: 700;padding-right: 8px;" >项目类型:</span>光伏发电</div>
						  <div class="col-md-9"><span style="font-weight: 700;padding-right: 8px;" >项目金额:</span>8000万美元</div>
						  <div class="col-md-9"><span style="font-weight: 700;padding-right: 8px;" >项目来源:</span>能创国际</div>
						</div>
						<div class="words-bot">
							<div type="button" class="btn btn-info"  style="padding: 5px 25px;font-size: 14px;" >报名参与</div>
							<div class="icons">
								<svg class="icon" aria-hidden="true">
			                        <use xlink:href="#icon-weixin"></use>
			                    </svg>
			                    <svg class="icon" aria-hidden="true">
			                        <use xlink:href="#icon-icon_caiseqq"></use>
			                    </svg>
			                    <svg class="icon" aria-hidden="true">
			                        <use xlink:href="#icon-weibo"></use>
			                    </svg>
			                    <svg class="icon" aria-hidden="true">
			                        <use xlink:href="#icon-unie60d"></use>
			                    </svg>
			                    <svg style="font-size: 18px;"  class="icon" aria-hidden="true">
			                        <use xlink:href="#icon-heart"></use>
			                    </svg>
			                    <span style="color: #169BD5;font-size: 18px;" >46</span>
							</div>
						</div>
					</div>
				</div>
				<!---->
				<div class="well show-pic-par flip-container"  style="display: none;" >
					<div class="well-item">
						<div class="correct"><img  class="" src="/luyan/yiqibao/Public/images/luyan_detail_2.jpg" /></div>
						<div class="opposite">
							<div class="">
								<div class="opposite-content">
									<div class="opposite-content-text">
										<ul>
											<li><span style="font-weight: 700;" >路演时间:</span>2017-08-24 15:30-18:00</li>
											<li><span style="font-weight: 700;" >项目国家:</span>马来西亚</li>
											<li><span style="font-weight: 700;" >项目模式:</span>bot项目</li>
											<li><span style="font-weight: 700;" >项目类型:</span>光伏发电</li>
											<li><span style="font-weight: 700;" >项目金额:</span>8000万美元</li>
											<li><span style="font-weight: 700;" >项目来源:</span>能创国际</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="well-item">
						<div class="correct"><img  class="" src="/luyan/yiqibao/Public/images/luyan_detail_3.jpg" /></div>
						<div class="opposite">
							<div class="">
								<div class="opposite-content">
									<div class="opposite-content-text">
										<ul>
											<li><span style="font-weight: 700;" >路演时间:</span>2017-08-24 15:30-18:00</li>
											<li><span style="font-weight: 700;" >项目国家:</span>马来西亚</li>
											<li><span style="font-weight: 700;" >项目模式:</span>bot项目</li>
											<li><span style="font-weight: 700;" >项目类型:</span>光伏发电</li>
											<li><span style="font-weight: 700;" >项目金额:</span>8000万美元</li>
											<li><span style="font-weight: 700;" >项目来源:</span>能创国际</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="well-item">
						<div class="correct"><img  class="" src="/luyan/yiqibao/Public/images/luyan_detail_4.jpg" /></div>
						<div class="opposite">
							<div class="">
								<div class="opposite-content">
									<div class="opposite-content-text">
										<ul>
											<li><span style="font-weight: 700;" >路演时间:</span>2017-08-24 15:30-18:00</li>
											<li><span style="font-weight: 700;" >项目国家:</span>马来西亚</li>
											<li><span style="font-weight: 700;" >项目模式:</span>bot项目</li>
											<li><span style="font-weight: 700;" >项目类型:</span>光伏发电</li>
											<li><span style="font-weight: 700;" >项目金额:</span>8000万美元</li>
											<li><span style="font-weight: 700;" >项目来源:</span>能创国际</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="well-item">
						<div class="correct"><img  class="" src="/luyan/yiqibao/Public/images/luyan_detail_5.jpg" /></div>
						<div class="opposite">
							<div class="">
								<div class="opposite-content">
									<div class="opposite-content-text">
										<ul>
											<li><span style="font-weight: 700;" >路演时间:</span>2017-08-24 15:30-18:00</li>
											<li><span style="font-weight: 700;" >项目国家:</span>马来西亚</li>
											<li><span style="font-weight: 700;" >项目模式:</span>bot项目</li>
											<li><span style="font-weight: 700;" >项目类型:</span>光伏发电</li>
											<li><span style="font-weight: 700;" >项目金额:</span>8000万美元</li>
											<li><span style="font-weight: 700;" >项目来源:</span>能创国际</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="well-item">
						<div class="correct"><img  class="" src="/luyan/yiqibao/Public/images/luyan_detail_6.jpg" /></div>
						<div class="opposite">
							<div class="">
								<div class="opposite-content">
									<div class="opposite-content-text">
										<ul>
											<li><span style="font-weight: 700;" >路演时间:</span>2017-08-24 15:30-18:00</li>
											<li><span style="font-weight: 700;" >项目国家:</span>马来西亚</li>
											<li><span style="font-weight: 700;" >项目模式:</span>bot项目</li>
											<li><span style="font-weight: 700;" >项目类型:</span>光伏发电</li>
											<li><span style="font-weight: 700;" >项目金额:</span>8000万美元</li>
											<li><span style="font-weight: 700;" >项目来源:</span>能创国际</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="well-item">
						<div class="correct"><img  class="" src="/luyan/yiqibao/Public/images/luyan_detail_7.jpg" /></div>
						<div class="opposite">
							<div class="">
								<div class="opposite-content">
									<div class="opposite-content-text">
										<ul>
											<li><span style="font-weight: 700;" >路演时间:</span>2017-08-24 15:30-18:00</li>
											<li><span style="font-weight: 700;" >项目国家:</span>马来西亚</li>
											<li><span style="font-weight: 700;" >项目模式:</span>bot项目</li>
											<li><span style="font-weight: 700;" >项目类型:</span>光伏发电</li>
											<li><span style="font-weight: 700;" >项目金额:</span>8000万美元</li>
											<li><span style="font-weight: 700;" >项目来源:</span>能创国际</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!---->
			</div>
			<!--图片简介结束-->
			<!--项目概要-->
			<div class="road-show-outline hc-pl">
				<div class="show-outline-tle">
					路演中心----<span  style="color: red;" >live</span>
				</div>
				<div class="show-outline-left">
					<span class="spec-tle" >路演时间：2017-08-24  15：30-18：00</span>
					  <div class="col-md-6">项目所在地:印度尼西亚</div>
					  <div class="col-md-6">燃料供应合同:<span style="color:#800080;">暂缺</span></div>
					  <div class="col-md-6">项目模式：BOT项目</div>
					  <div class="col-md-6">可研报告:<a href="">可下载</a></div>
					  <div class="col-md-6">项目类型：光伏发电</div>
					  <div class="col-md-6">初步勘察设计:<span style="color:#800080;">暂缺</span></div>
					  <div class="col-md-6">项目金额：4000万RMB</div>
					  <div class="col-md-6">土地落实情况：<a href="">可下载</a></div>
					  <div class="col-md-6">融资金额：2000万RMB</div>
					  <div class="col-md-6">水土保持方案:<span style="color:#800080;">暂缺</span></div>
					  <div class="col-md-6">业主描述：印尼最大民营企业</div>
					  <div class="col-md-6">环评报告：<a href="">可下载</a></div>
					  <div class="col-md-6">PPA协议：<a href="">可下载</a></div>
					  <div class="col-md-6">电网接入协议：<span style="color:#800080;">暂缺</span></div>
					  <div class="col-md-6">项目开发协议:<a href="">可下载</a></div>
					  <div class="col-md-6">开工许可:<a href="">可下载</a></div>	
				</div>
				<a href="<?php echo U('index/lydetail');?>">
					<div class="show-outline-right">
						<div class="par-words">
							<img src="/luyan/yiqibao/Public/images/luyan_detail_2.jpg" alt="..." class="img-thumbnail" style="height: 100%;" >
						</div>
				
					</div>
				</a>
			<div class="bot-btns" >
					<div  class="btn btn-primary">立即查看</div>
					<div  class="btn btn-primary">预约报名</div>
			</div>
			</div>
			<!--项目概要结束-->
		<!--路演信息结束-->
		</div>
		
		<div class="fixed-menu">
			<div class="menu-items">项目</div>
			<div class="menu-items">招标</div>
			<div class="menu-items">采购</div>
			<div class="menu-items">资源</div>
		</div>
		<div class="page-footer">
			Copyright © 2017-2017 www.epchance.com All Rights Reserved. 湘ICP备17005577号
		</div>
	</body>
</html>
<script type="text/javascript">
	
	function jump_1(param) {
         window.scrollTo(0,param);
     }
	$(function(){
		$('.hc-m').mouseenter(function(){
			c = $(this).index();
			$('.road-show-pic').find('.show-pic-par').eq(c-1).show().siblings('.show-pic-par').hide();
			
		})
		
		$('.correct,.opposite').click(function(){
			window.location.href="<?php echo U('index/lydetail');?>";
		})
		
		$(".well-item").hover(function(){
		$(this).find(".correct").children().removeClass();
		$(this).find(".opposite").children().removeClass();
		$(this).find(".correct").children().addClass("test");
		$(this).find(".opposite").children().addClass('test2');
	},function(){
		$(this).find(".correct").children().removeClass();
		$(this).find(".opposite").children().removeClass();
		$(this).find(".correct").children().addClass("test2");
		$(this).find(".opposite").children().addClass('test');
	});
		
	})
</script>