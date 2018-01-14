<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2018/1/12
 * Time: 22:03
 */

namespace backend\controllers;


use backend\common\components\BaseController;

class PropertyController extends BaseController
{
    //我的积分
    public function actionPoints()
    {
        return $this->render('points');
    }
    //优惠劵
    public function actionCoupon()
    {
        return $this->render('coupon');
    }
    //红包
    public function actionBonus()
    {
        return $this->render('bonus');
    }
    //账户余额
    public function actionWalletlist()
    {
        return $this->render('walletlist');
    }
    //账单明细
    public function actionBill()
    {
        return $this->render('bill');
    }
    //账单支出明细
    public function actionBilllist()
    {
        return $this->render('billlist');
    }

    public function actionProperty()
    {

    }
}