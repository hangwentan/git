<?php

namespace backend\controllers;

use backend\common\components\BaseController;

class SvipController extends BaseController
{
    public function actionIndex()
    {
        $this->layout = 'svip';

        return $this->render('svip-list');
    }

}
