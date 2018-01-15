<?php

namespace backend\controllers;

use backend\common\components\BaseController;

class OrderController extends BaseController
{
    public function actionIndex()
    {
        $this->layout = 'order';

        return $this->render('order-list');
    }

}
