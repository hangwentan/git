<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>我的积分</title>

		<link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">
		<link href="css/personal.css" rel="stylesheet" type="text/css">

		
	</head>

	<body>
		
		<b class="line"></b>

		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
					<div class="points">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的积分</strong> / <small>My&nbsp;Point</small></div>
						</div>
						<hr/>
						<div class="pointsTitle">
						  <div class="usable">可用积分<span>120</span></div>
						  <div class="signIn"><a href="#"><i class="am-icon-calendar"></i>每日签到</a></div>
						</div>
						<div class="pointshop"><a href="#"><i><img src="images/u5.png" /></i>积分商城</a></div>						
						<div class="pointlist" style="padding: 0px 10px;">
							<div class="pointTitle">
								<span>积分明细</span>
							    <span class="more"><a href="points.html">查看更多<i class="am-icon-angle-right"></i></a></span>
							</div>
							<table>
							  <tbody>
								<tr>
									<td class="pointType">订单号7745926347132商品评论</td>
									<td class="pointNum">+2</td>
									<td class="pointTime">2016-03-12&nbsp09:32</td>
								</tr>
								<tr>
									<td class="pointType">每日签到</td>
									<td class="pointNum">+5</td>
									<td class="pointTime">2016-03-12&nbsp07:32</td>
								</tr>								
								<tr>
									<td class="pointType">每日签到</td>
									<td class="pointNum">+5</td>
									<td class="pointTime">2016-03-11&nbsp12:24</td>
								</tr>								
								<tr>
									<td class="pointType">邮箱验证</td>
									<td class="pointNum">+50</td>
									<td class="pointTime">2016-03-10&nbsp16:18</td>
								</tr>								
								<tr>
									<td class="pointType">手机绑定</td>
									<td class="pointNum">+100</td>
									<td class="pointTime">2016-03-10&nbsp15:27</td>
								</tr>								
							  </tbody>
							</table>
						</div>
					</div>
				</div>
				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
						</p>
					</div>
				</div>
			</div>

			<aside class="menu">
				<?php echo $this->render('../layouts/menu.php')?>

			</aside>
		</div>

	</body>

</html>