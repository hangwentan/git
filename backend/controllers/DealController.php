<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2018/1/12
 * Time: 20:13
 */

namespace backend\controllers;


use backend\common\components\BaseController;

class DealController extends BaseController
{
    //订单管理
    public function actionOrder()
    {
        return $this->render('order');
    }
    //退款售后
    public function actionChange()
    {
        return $this->render('change');
    }
    //评价商品
    public function actionComment()
    {
        return $this->render('comment');
    }
    //订单详情
    public function actionOrderinfo()
    {
        return $this->render('orderinfo');
    }
    //物流信息
    public function actionLogistics()
    {
        return $this->render('logistics');
    }
    //钱款去向
    public function actionRecord()
    {
        return $this->render('record');
    }
    //评价商品
    public function actionCommentlist()
    {
        return $this->render('commentlist');
    }
}