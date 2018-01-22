<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2018/1/12
 * Time: 14:20
 */

namespace frontend\controllers;

use frontend\common\components\BaseController;

class IndexController  extends BaseController
{
     //首页
     public function actionHome()
     {
         return $this->render('index');
     }

     //个人信息
     public function actionInformation()
     {
         return $this->render('information');
     }

     //安全设置
    public function actionSafety()
    {
        return $this->render('safety');
    }

    //地址管理
    public function actionAddress()
    {
        return $this->render('address');
    }

    //快捷支付
    public function actionCardlist()
    {
         return $this->render('cardlist');
    }

    //修改登录密码
    public function actionPassword()
    {
        return $this->render('password');
    }

    //启用支付密码
    public function actionSetpay()
    {
        return $this->render('setpay');
    }

    //手机验证
    public function actionBindphone()
    {
        return $this->render('bindphone');
    }

    //邮箱验证
    public function actionEmail()
    {
        return $this->render('email');
    }

    //实名认证
    public function actionIdcard()
    {
        return $this->render('idcard');
    }

    //安全问题
    public function actionQuestion()
    {
        return $this->render('question');
    }

    //添加银行卡的绑定
    public function actionCardmethod()
    {
        return $this->render('cardmethod');
    }
    //账户余额
    public function actionWallet()
    {
        return $this->render('wallet');
    }
    //积分
    public function actionPointnew()
    {
        return $this->render('pointnew');
    }
    public function actionIndex ()
    {
    	return $this->render("home3.html");
    }
    /**
     * 商品详情
     * @return view
     */
    public function actionIntroduction ()
    {
    	return $this->render("introduction.html");
    }
}