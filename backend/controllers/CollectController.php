<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2018/1/13
 * Time: 8:29
 */

namespace backend\controllers;


use backend\common\components\BaseController;

class CollectController extends BaseController
{
    //收藏
    public function actionCollection()
    {
       return $this->render('collection');
    }
    //足迹
    public function actionFoot()
    {
        return $this->render('foot');
    }
}