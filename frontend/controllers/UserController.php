<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use app\models\OpenInfo;
use yii\web\request;
use app\models\User;
include( 'weibo/config.php' );
include( 'weibo/saetv2.ex.class.php' );
/**
 * User controller
 */
class UserController extends Controller
{
	public $layout=false;

	public $enableCsrfValidation=false;

	public function actionYzm ()
    {
    	$session = Yii::$app->session;
        $length=4;
        $chars='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password='';
        for($i=0;$i<$length;$i++){
            $password.=$chars[mt_rand(0,strlen($chars)-1)];
        }
        Yii::$app->session['yzm'] = $password;

        // echo $password;

        return $password;
    }

    public function actionYz(){
    	$yzm=Yii::$app->request->post('yzm');

    	$code=Yii::$app->session['yzm'];
    	if($yzm!=$code){
    		echo 0;
    	}
    	else
    	{
    		echo 1;
    	}
    }

	public function actionLogin ()
	{
		$o = new \SaeTOAuthV2( WB_AKEY , WB_SKEY );

        $code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
        
		return $this->render('login.html',["code_url"=>$code_url]);
	}

	public function actionRegister ()
	{
		$yzm=$this->actionYzm();

		return $this->render('register.html',['yzm'=>$yzm]);
	}

	public function actionLoginout ()
	{
		$session =Yii::$app->session;

		unset($session['name']);

	    return $this->redirect("?r=index/index");
	}

	public function actionRegister_email ()
	{
		$email=Yii::$app->request->post('obj');
		$password=md5(Yii::$app->request->post('password'));
		$command = \Yii::$app->db->createCommand("SELECT * FROM shop_user WHERE user_name='$email'");
        $user_msg = $command->queryOne();
        if($user_msg){
        	echo 'user error';
        	die;
        }
		$res = \Yii::$app->db->createCommand()->insert('shop_user', [
		   'user_name' => $email,
		   'user_pwd' => $password,
		])->execute();
		if($res){
			echo 'success';
		}else{
			echo 'error';
		}
	}

	public function actionRegister_tel ()
	{
		$telphone=Yii::$app->request->post('telphone');
		$tel_pwd=md5(Yii::$app->request->post('tel_pwd'));
		$command = \Yii::$app->db->createCommand("SELECT * FROM shop_user WHERE user_name='$telphone'");
        $user_msg = $command->queryOne();
        if($user_msg){
        	echo 'user error';
        	die;
        }
		$res = \Yii::$app->db->createCommand()->insert('shop_user', [
		   'user_name' => $telphone,
		   'user_pwd' => $tel_pwd,
		])->execute();
		if($res){
			echo 'success';
		}else{
			echo 'error';
		}
	}
}