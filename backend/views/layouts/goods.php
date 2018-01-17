<?php

$session = \Yii::$app->session;
$user = $session->get('username');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
<!--    <base href="http://www.laravel.com/" />-->
    <title>后台管理系统</title>
    <meta name="author" content="DeathGhost" />
    <link rel="stylesheet" type="text/css" href="login/css/style.css" />
    <!--[if lt IE 9]>
    <script src="login/js/html5.js"></script>
    <![endif]-->
    <script src="login/js/jquery.js"></script>
    <script src="login/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
        (function($){
            $(window).load(function(){

                $("a[rel='load-content']").click(function(e){
                    e.preventDefault();
                    var url=$(this).attr("href");
                    $.get(url,function(data){
                        $(".content .mCSB_container").append(data); //load new content inside .mCSB_container
                        //scroll-to appended content
                        $(".content").mCustomScrollbar("scrollTo","h2:last");
                    });
                });

                $(".content").delegate("a[href='top']","click",function(e){
                    e.preventDefault();
                    $(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
                });

            });
        })(jQuery);
    </script>
</head>
<body>
<!--header-->
<header>
    <h1><img src="login/images/admin_logo.png"/></h1>
    <ul class="rt_nav">
        <li><h2><a href="javascript:0;"><?php if(empty($user)){echo '未登录';?><?php }else{echo $user;}?></a></h2></li>
        <li><a href="http://www.baidu.com" target="_blank" class="website_icon">站点首页</a></li>
        <li><a href="#" class="admin_icon">DeathGhost</a></li>
        <li><a href="#" class="set_icon">账号设置</a></li>
        <li><a href="?r=login/login-out" class="quit_icon">安全退出</a></li>
    </ul>
</header>

<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
    <h2><a href="index.php">起始页</a></h2>
    <ul>
        <li>
            <dl>
                <dt>商品管理</dt>
                <!--当前链接则添加class:active-->
                <dd><a href="?r=goods/index" class="active">商品列表</a></dd>
                <dd><a href="?r=goods/add">商品添加</a></dd>
            </dl>
        </li>
        <li>
            <dl>
                <dt>商品分类</dt>
                <dd><a href="?r=goods/ification">分类列表</a></dd>
                <dd><a href="?r=goods/index">添加分类</a></dd>
            </dl>
        </li>
        <li>
            <dl>
                <dt>品牌管理</dt>
                <dd><a href="?r=goods/brand-index">品牌列表</a></dd>
                <dd><a href="?r=goods/brand-list">品牌分类</a></dd>
            </dl>
        </li>

    </ul>
</aside>

<section class="rt_wrap content mCustomScrollbar">
    <div class="rt_content">
        <!--开始：以下内容则可删除，仅为素材引用参考-->
        <!--点击加载-->
        <script>
            $(document).ready(function(){
                $("#loading").click(function(){
                    $(".loading_area").fadeIn();
                    $(".loading_area").fadeOut(1500);
                });
            });
        </script>
        <section class="loading_area">
            <div class="loading_cont">
                <div class="loading_icon"><i></i><i></i><i></i><i></i><i></i></div>
                <div class="loading_txt"><mark>数据正在加载，请稍后！</mark></div>
            </div>
        </section>
        <!--结束加载-->
        <!--弹出框效果-->
        <script>
            $(document).ready(function(){
                //弹出文本性提示框
                $("#showPopTxt").click(function(){
                    $(".pop_bg").fadeIn();
                });
                //弹出：确认按钮
                $(".trueBtn").click(function(){
                    alert("你点击了确认！");//测试
                    $(".pop_bg").fadeOut();
                });
                //弹出：取消或关闭按钮
                $(".falseBtn").click(function(){
                    alert("你点击了取消/关闭！");//测试
                    $(".pop_bg").fadeOut();
                });
            });
        </script>
        <section class="pop_bg">
            <div class="pop_cont">
                <!--title-->
                <h3>弹出提示标题</h3>
                <!--content-->
                <div class="pop_cont_input">
                    <ul>
                        <li>
                            <span>标题</span>
                            <input type="text" placeholder="定义提示语..." class="textbox"/>
                        </li>
                        <li>
                            <span class="ttl">城市</span>
                            <select class="select">
                                <option>选择省份</option>
                            </select>
                            <select class="select">
                                <option>选择城市</option>
                            </select>
                            <select class="select">
                                <option>选择区/县</option>
                            </select>
                        </li>
                        <li>
                            <span class="ttl">地址</span>
                            <input type="text" placeholder="定义提示语..." class="textbox"/>
                        </li>
                        <li>
                            <span class="ttl">地址</span>
                            <textarea class="textarea" style="height:50px;width:80%;"></textarea>
                        </li>
                    </ul>
                </div>
                <!--以pop_cont_text分界-->
                <div class="pop_cont_text">
                    这里是文字性提示信息！
                </div>
                <!--bottom:operate->button-->
                <div class="btm_btn">
                    <input type="button" value="确认" class="input_btn trueBtn"/>
                    <input type="button" value="关闭" class="input_btn falseBtn"/>
                </div>
            </div>
        </section>
        <!--结束：弹出框效果-->
        <style>
            .link_btn{

                margin-left: 50px;
            }
        </style>
        <section>
            <a href="?r=goods/index"><input type="button" value="商品" class="link_btn"/></a>
            <a href="?r=svip/index"><input type="button" value="会员" class="link_btn"/></a>
            <a href="?r=order/index"><input type="button" value="订单" class="link_btn"/></a>
            <a href="?r=goods/index"><input type="button" value="营销" class="link_btn"/></a>
            <a href="?r=goods/index"><input type="button" value="统计" class="link_btn"/></a>
            <a href="?r=goods/index"><input type="button" value="系统" class="link_btn"/></a>

        </section>

        <?php echo $content?>

    </div>
</section>
</body>
</html>