<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2018/1/13
 * Time: 8:38
 */

namespace frontend\controllers;


use frontend\common\components\BaseController;

class ServiceController extends BaseController
{
    //商品咨询
    public function actionConsultation()
    {
        return $this->render('consultation');
    }
    //意见反馈
    public function actionSuggest()
    {
        return $this->render('suggest');
    }
    //我的消息
    public function actionNews()
    {
        return $this->render('news');
    }
    //商品详请
    public function actionBlog()
    {
        return $this->render('blog');
    }
}