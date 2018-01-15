<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Index controller
 */
class IndexController extends Controller
{
	public $layout=false;

    public function actionHome ()
    {
    	return $this->render("home3.html");
    }
    /**
     * 商品详情
     * @return view
     */
    public function actionIntroduction ()
    {
    	return $this->render("introduction.html");
    }
}