<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<!--<link rel="stylesheet" type="text/css" href="Application/Home/View/Index/bootstrap/css/bootstrap.min.css"/>-->
		<link rel="stylesheet" type="text/css" href="/luyan/luyan/Public/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/luyan/luyan/Public/css/slide.css"/>
		<script src="/luyan/luyan/Public/js/jquery-1.7.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/luyan/luyan/Public/js/slide.js" type="text/javascript" charset="utf-8"></script>	
		<script src="/luyan/luyan/Public/icon/iconfont.js" type="text/javascript" charset="utf-8"></script>
		<style type="text/css">
			@media (min-width: 992px) {
				.col-md-3{
                    background-color:#E6E2EB;
                    padding: 20px 0px;
                    max-height: 50px;
                    text-align: center;
                }
                .col-md-9{
                	background: #FFFFFF;
                	padding: 20px 0px;
                	/*max-height: 50px;*/
                	text-indent: 10px;
                }
			}
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
	        .fixed-menu{position: fixed;top: 300px;right: 100px;width: 160px;height: 200px;}
	        .menu-items{float: left;width: 90%;height: 40px;background: #C9C9C9;border-radius: 8px;margin: 5px;text-align: center;color: black;line-height: 40px;font-size: 18px;cursor: pointer;}
			/*公共头部*/
			.nav-top{width: 100%;height: 30px;background: #D7D7D7;display: block;}
			.nav-left{line-height: 30px;padding-left: 20px;width: 200px;float: left;}
			.nav-right{width: 600px;height: 30px;float: right;display: block;}
			.nav-right-select select{height: 29px;float: left;/*width: 100px;*/}
			.nav-right-item{float:left;padding: 0px 20px;border-right: 1px solid #804D33;height: 20px;margin-top: 5px;}
			.top-show{width: 90%;margin: 0 auto;}
			.search{float: right;width: 700px;height: 40px;margin: 20px 0px;}
			.top-show-sel{width:15%;float: left;}
			.top-show-txt{width: 55%;float: left;}
			.hc-pl{width: 100%; margin-top: 100px;overflow: hidden;}
			
			/*主体区域*/
			.container{width: 80%;margin: 0 auto;height: 1000px;}
			.detail-top{height:50px;margin-top: 20px;padding-left: 30px;}
			.detail-top div{margin-left: 15px;}
			.glyphicon-home{font-size: 22px;float:left;margin-top: 5px;}
			.detail-content-left{float: left;width: 70%;height: 700px;}
			.common-tle{width: 100%;padding: 10px 5px;font-size: 18px;color:#169BD5;font-weight: 700;}
			.detail-words{overflow: hidden;}
			.detail-words li{float: left;width: 100%; height:100%; overflow:hidden;}
			.detail-words li div:nth-child(1){width: 10%;float: left;border: 1px solid #CCCCCC;padding: 10px 0px;background-color:#E6E2EB;text-align: center;height:100%;overflow:hidden; padding-bottom:9999px;margin-bottom:-9999px;display:inline-block;vertical-align:middle;}
			.detail-words li div:nth-child(2){width: 90%;float: left;border: 1px solid #CCCCCC;border-left: none;padding: 10px 0px;text-indent: 15px;}
			/*项目联系人*/
			.detail-linkman{margin-top: 20px;width: 100%;}
			
			.detail-content-right{float: left;width: 30%;height: 700px;margin-top: 40px;}
			.detail-right-items{width: 65%;font-size: 16px;background: #F2F2F2;margin: 5px;overflow: hidden;}
			.detail-right-items .spec-tle{text-indent: 40px;float: left;}
			.detail-right-items ul li{float: left;width: 100%;padding-left: 40px;text-decoration:underline}
			.common-tle-r{font-size: 18px;color: #169BD5;font-weight: 700;text-align: center;padding-top: 10px;}
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
			<img src="/luyan/luyan/Public/images/logo.png" alt="..." class="img-rounded">
			<img src="/luyan/luyan/Public/images/logo1.jpg"/>
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
		<!--主题区域-->
		<div class="container">
			<!--主体区域顶部-->
			<div class="detail-top">
				<span class="glyphicon glyphicon-home" ></span>
				<div  class="btn btn-primary">项目信息</div>
				<div  class="btn btn-primary">项目路演</div>
			</div>
			<!--主体区域顶部结束-->
			<!--主体区域左部-->
			<div class="detail-content-left">
				<!--项目详情-->
				<div class="common-tle">
					项目详情
				</div>
				<ul class="detail-words" >
					<li>
						<div class="words-tle">
							项目名称
						</div>
						<div class="words-content">
							污水处理一厂工程
						</div>
					</li>
					<li>
						<div class="words-tle" style="padding-top: 20px;" >
							项目详情
						</div>
						<div class="words-content">
							污水处理一厂工程，设计规模为近期4.0万m3/d，远期8.0万m3/d。主要生产构筑物土建按近期规模4.0万m3/d建设，设备按2.0万m3/d规模安装。污水厂采用改良A/A/O工艺+高效澄清池+滤布滤池+消毒的处理工艺
						</div>
					</li>
					<li>
						<div class="words-tle">
							项目类型
						</div>
						<div class="words-content">
							水电项目
						</div>
					</li>
					<li>
						<div class="words-tle">
							国家
						</div>
						<div class="words-content">
							印度尼西亚
						</div>
					</li>
					<li>
						<div class="words-tle">
							投资金额
						</div>
						<div class="words-content">
							40000 万元
						</div>
					</li>
					<li>
						<div class="words-tle">
							金融机构
						</div>
						<div class="words-content">
							自我投资、待投资、世界银行等（自填）
						</div>
					</li>
					<li>
						<div class="words-tle">
							开工时间
						</div>
						<div class="words-content">
							2017-5-11
						</div>
					</li>
					<li>
						<div class="words-tle">
							竣工时间
						</div>
						<div class="words-content">
							2019-10-30
						</div>
					</li>
				</ul>
				<!--项目详情结束-->
				
				<!--项目联系人-->
				<div class="detail-linkman">
					<div class="common-tle">
						项目联系人
					</div>
					<ul class="detail-words" >
						<li>
							<div class="words-tle">
								业主单位
							</div>
							<div class="words-content">
								滨海新区管委会
							</div>
						</li>
						<li>
							<div class="words-tle">
								业主单位
							</div>
							<div class="words-content">
								滨海新区管委会
							</div>
						</li>
						<li>
							<div class="words-tle">
								联系人
							</div>
							<div class="words-content">
								李**<span style="color: red;cursor: pointer;" >【登录后可见】</span>
							</div>
						</li>
						<li>
							<div class="words-tle">
								联系人
							</div>
							<div class="words-content">
								137******** <span style="color: red;cursor: pointer;" >【登录后可见】</span>
							</div>
						</li>
					</ul>
				</div>
				<!--项目联系人结束-->
			</div>
			<!--主体区域左部结束-->
			
			<!--主体区域右部-->
			<div class="detail-content-right">
				<!--项目路演-->
					<div class="detail-right-items">
						<div class="common-tle-r">
							项目路演
						</div>
						<span class="spec-tle" >总投资约3.5亿元生活垃圾焚烧发电项目（BOT）（进行中）</span>
						<ul>
							<li>1、项目开发协议</li>
							<li>2、可研报告</li>
							<li>3、初步勘察设计</li>
							<li>4、土地落实情况</li>
							<li>5、水土保持方案</li>
							<li>6、环评报告</li>
							<li>7、PPA文件</li>
							<li>8、电网接入协议</li>
							<li>9、开工许可</li>
							<li>10、燃料供应合同</li>
						</ul>
						<div  class="btn btn-primary" style="float: right;" >立即参与</div>
					</div>
				<!--项目路演结束-->
				<!--招标推荐-->
				<div class="detail-right-items">
						<div class="common-tle-r">
							招标推荐
						</div>
						<ul>
							<li style="padding: 5px;text-decoration: none;" >
								1、污水处理一厂工程，污水厂采用改良A/A/O工艺+高效......（审批完成）
								印度尼西亚      合同金额：4000万
							</li>
							<li style="padding: 5px;text-decoration: none;" >
								1、污水处理一厂工程，污水厂采用改良A/A/O工艺+高效......（审批完成）
								印度尼西亚      合同金额：4000万
							</li>
						</ul>
						<div  class="btn btn-primary" style="float: right;" >查看详情</div>
				</div>
				<!--招标推荐结束-->
				<!--采购信息-->
				<div class="detail-right-items">
						<div class="common-tle-r">
							采购信息
						</div>
						<ul>
							<li style="padding: 5px;text-decoration: none;clear: both;" >
								1、公司名称：华自科技股份有限公司
								<br />
								<span style="font-weight: 700;" >采购产品：线缆</span>
								<br />
								采购量：10000米
								<br />
								截止日期：2017年9月19日
							</li>
							<li style="padding: 5px;text-decoration: none;" >
								1、公司名称：华自科技股份有限公司
								<br />
								<span style="font-weight: 700;" >采购产品：线缆</span>
								<br />
								采购量：10000米
								<br />
								截止日期：2017年9月19日
							</li>
						</ul>
						<div  class="btn btn-primary" style="float: right;" >查看详情</div>
				</div>
				<!--采购信息结束-->
			</div>
			<!--主体区域右部结束-->
		</div>
		<!--主体区域结束-->
		<div class="fixed-menu">
			<div class="menu-items">项目</div>
			<div class="menu-items">招标</div>
			<div class="menu-items">采购</div>
			<div class="menu-items">资源</div>
		</div>
	</body>
</html>
<script type="text/javascript">
</script>