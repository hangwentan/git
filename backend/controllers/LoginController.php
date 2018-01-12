<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2018/1/12
 * Time: 18:26
 */

namespace backend\controllers;


use backend\common\components\BaseController;

class LoginController extends BaseController
{
    public function actionLogin()
    {
        return $this->render('login');
    }
}