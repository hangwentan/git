<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>后台登录</title>
    <meta name="author" content="DeathGhost" />
    <!--<base href="__PUBLIC__/Admin"/>-->
    <link rel="stylesheet" type="text/css" href="login/css/style.css" />
    <style>
        body{height:100%;background:#16a085;overflow:hidden;}
        canvas{z-index:-1;position:absolute;}
        .reg_tip{
            float: right;margin-right: 0px;line-height: 50px;
        }
        .reg_tip .ret_tipm {
            width: auto; height: 50px; float: left; display: block; background: #048f74;line-height:50px;
        }
    </style>
    <script src="login/js/jquery.js"></script>
    <script src="login/js/verificationNumbers.js"></script>
    <script src="login/js/Particleground.js"></script>
    <script src="login/js/reg.js"></script>
    <script>

        $(document).ready(function() {
            $("div.reg_tip").hide();
            //粒子背景特效
            $('body').particleground({
                dotColor: '#5cbdaa',
                lineColor: '#5cbdaa'
            });
            //验证码
            createCode();
            //测试提交，对接程序删除即可
//            $(".submit_btn").click(function(){
//                location.href="index.html";
//            });
        });
    </script>
</head>
<body>
<dl class="admin_login">
    <dt>
        <strong>站点后台管理系统</strong>
        <em>Management System</em>
    </dt>
    <dd class="user_icon">
        <input type="text" name="username" placeholder="账号" class="login_txtbx" onblur="username()"/>
        <div id="regtip_username" class="reg_tip">
            <div class="ret_tipm">用户名不可为空</div>
        </div>
    </dd>
    <dd class="pwd_icon">
        <input type="password" name="password" placeholder="密码" class="login_txtbx" onblur="password()"/>
        <div id="regtip_pwd" class="reg_tip">
            <div class="ret_tipm">密码不可为空</div>
        </div>
    </dd>
    <dd class="val_icon">
        <div class="checkcode">
            <input type="text" id="J_codetext" placeholder="验证码" maxlength="4" class="login_txtbx">
            <canvas class="J_codeimg" id="myCanvas" onclick="createCode()">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
        </div>
        <input type="button" value="验证码核验" class="ver_btn" onClick="validate();">
    </dd>
    <dd>
        <input onclick="submit()" type="button" value="立即登陆" class="submit_btn"/>
    </dd>
    <dd>
        <input id="ragester" type="button" value="注册" class="submit_btn"/>
    </dd>
    <dd>
        <p>© 2015-2016 DeathGhost 版权所有</p>
        <p>陕B2-20080224-1</p>
    </dd>
</dl>
</body>
<script>

</script>
</html>
