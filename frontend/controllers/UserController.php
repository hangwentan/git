<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use app\models\OpenInfo;
use app\models\User;
include( 'weibo/config.php' );
include( 'weibo/saetv2.ex.class.php' );
/**
 * User controller
 */
class UserController extends Controller
{
	public $layout=false;

	public function actionLogin ()
	{
		$o = new \SaeTOAuthV2( WB_AKEY , WB_SKEY );

        $code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
        
		return $this->render('login.html',["code_url"=>$code_url]);
	}

	public function actionRegister ()
	{
		return $this->render('register.html');
	}

	public function actionLoginout ()
	{
		$session =Yii::$app->session;

		unset($session['name']);

	    return $this->redirect("?r=index/index");
	}
}