function username() {
    var name = $('input[name=username]').val();
    var reg=/^[\u4e00-\u9fa5]{2,18}$/i;
    if(name=='') {
        if($("#regtip_username").children('.ret_tipm').html() !== '用户名不可为空'){
            $("#regtip_username").children('.ret_tipm').html("用户名为空");
        }
        $("div#regtip_username").show();
        return false;
    }
    if(reg.test(name)){
        // $.get('?r=login/reg',{name:name},function (msg) {
        //     if(msg == '1') {
                $("#regtip_username").children('.ret_tipm').html("√");
                $("#regtip_username").show();return true;
        //     } else {
        //         $("#regtip_username").children('.ret_tipm').html("用户存在");
        //         $("#regtip_username").show();return true;
        //     }
        // })
    } else {
        $("#regtip_username").children('.ret_tipm').html("用户名称限中文");
        $("#regtip_username").show();
        return false;
    }

}


function password(){
    var pwd = $('input[name=password]').val();
    var reg=/^[0-9]{6,16}$|^[a-zA-Z]{6,16}$/i;
    var reg1=/^[A-Za-z0-9]{6,16}$/;
    var reg2=/^\w{6,16}$/;
    if(pwd=='') {
        if($("#regtip_pwd").children('.ret_tipm').html() !== '密码不可为空'){
            $("#regtip_pwd").children('.ret_tipm').html("密码不可为空");
        }
        $("div#regtip_pwd").show();
        return false;
    }
    if(!reg.test(pwd) && !reg1.test(pwd) && !reg2.test(pwd)){
        $("#regtip_pwd").children('.ret_tipm').html("密码限6~12位数字-字符");
        $("#regtip_pwd").show();
        return false;
    }
    if(reg.test(pwd)){
        $("#regtip_pwd").children('.ret_tipm').html("弱").css("background","darkgoldenrod");
        $("#regtip_pwd").show();return true;
    }
    else if(reg1.test(pwd)){
        $("#regtip_pwd").children('.ret_tipm').html("中").css("background","darkorange");
        $("#regtip_pwd").show();return true;
    }
    else if(reg2.test(pwd)){
        $("#regtip_pwd").children('.ret_tipm').html("强").css("background","yellow");
        $("#regtip_pwd").show();return true;
    }
}

function checkUserInput(){
    if (!username()) return false;
    if (!password()) return false;
    return true;

}

function submit() {
    if (!checkUserInput()){
        return false;
    }
    var name = $('input[name=username]').val();
    var pwd = $('input[name=password]').val();
    var inputCode = document.getElementById("J_codetext").value.toUpperCase();
    var codeToUp=code.toUpperCase();
    if(inputCode!=codeToUp) return false;
    $.post('index.php?r=login/login',{'name':name,'pwd':pwd},function(msg) {
        if(msg==1){
            window.location.href='?r=index/index';
        }
    });
}

function reg() {
    var name = $('.admin_reg').html();
    $('.admin_slip').html(name);
}
function login() {
    var name = $('.admin_login').html();
    $('.admin_slip').html(name);
}

function ragester() {
    if (!checkUserInput()){
        return false;
    }
    var name = $('input[name=username]').val();
    var pwd = $('input[name=password]').val();
    $.post('index.php?r=login/reg',{'name':name,'pwd':pwd},function(msg) {
        if(msg==1){
            window.location.href='?r=login/login';
        }
    });
}
