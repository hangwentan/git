<?php
/**
 * Created by PhpStorm.
 * User: 韩文坛
 * Date: 2018/1/15
 * Time: 12:36
 */

namespace backend\controllers;


use backend\common\components\BaseController;

class IndexController extends 	CommonController
{

    /*后台首页
     * @author 韩文坛
     * @time   2018.1.15
     */
    public function actionIndex()
    {
        $this->layout = 'goods';
        return $this->render('index');
    }
}