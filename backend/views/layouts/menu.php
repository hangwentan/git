
<ul>
    <li class="person active">
        <a href="?r=index/index"><i class="am-icon-user"></i>个人中心</a>
    </li>
    <li class="person">
        <p><i class="am-icon-newspaper-o"></i>个人资料</p>
        <ul>
            <li> <a href="?r=index/information">个人信息</a></li>
            <li> <a href="?r=index/safety">安全设置</a></li>
            <li> <a href="?r=index/address">地址管理</a></li>
            <li> <a href="?r=index/cardlist">快捷支付</a></li>
        </ul>
    </li>
    <li class="person">
        <p><i class="am-icon-balance-scale"></i>我的交易</p>
        <ul>
            <li><a href="?r=deal/order">订单管理</a></li>
            <li> <a href="?r=deal/change">退款售后</a></li>
            <li> <a href="?r=deal/comment">评价商品</a></li>
        </ul>
    </li>
    <li class="person">
        <p><i class="am-icon-dollar"></i>我的资产</p>
        <ul>
            <li> <a href="?r=property/points">我的积分</a></li>
            <li> <a href="?r=property/coupon">优惠券 </a></li>
            <li> <a href="?r=property/bonus">红包</a></li>
            <li> <a href="?r=property/walletlist">账户余额</a></li>
            <li> <a href="?r=property/bill">账单明细</a></li>
        </ul>
    </li>

    <li class="person">
        <p><i class="am-icon-tags"></i>我的收藏</p>
        <ul>
            <li> <a href="?r=collect/collection">收藏</a></li>
            <li> <a href="?r=collect/foot">足迹</a></li>
        </ul>
    </li>

    <li class="person">
        <p><i class="am-icon-qq"></i>在线客服</p>
        <ul>
            <li> <a href="?r=service/consultation">商品咨询</a></li>
            <li> <a href="?r=service/suggest">意见反馈</a></li>
            <li> <a href="?r=service/news">我的消息</a></li>
        </ul>
    </li>
</ul>


<?php
$session=Yii::$app->session;
$username=$session->get('username');
if(empty($username)) {
    echo "<script>alert('亲，请登录');location.href='?r=login/login'</script>";
}
?>