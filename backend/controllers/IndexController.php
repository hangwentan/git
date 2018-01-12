<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2018/1/12
 * Time: 14:20
 */

namespace backend\controllers;


use backend\common\components\BaseController;

class IndexController  extends BaseController
{
     //首页
     public function actionIndex()
     {
         return $this->render('index');
     }
     //个人信息
     public function actionInformation()
     {
         return $this->render('information');
     }
}