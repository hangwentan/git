<?php

namespace backend\controllers;

use backend\common\components\BaseController;

class GoodsController extends BaseController
{
    public function actionIndex()
    {
        $this->layout = 'goods';
        return $this->render('goods-list');
    }

    /*商品添加
     * author 韩文坛
     */
    public function actionAdd()
    {
        $this->layout = 'goods';
        return $this->render('goods-add');
    }
}
