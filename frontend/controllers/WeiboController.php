<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
include_once( 'weibo/config.php' );
include_once( 'weibo/saetv2.ex.class.php' );
/**
 * Weibo controller
 */
class WeiboController extends Controller
{
	public $layout=false;

	public function actionIndex ()
	{
		return $this->render("index");
	}
	public function actionCallback ()
	{
		$o = new \SaeTOAuthV2( WB_AKEY , WB_SKEY );
		if (isset($_REQUEST['code'])) {
		     $keys = array();
		     $keys['code'] = $_REQUEST['code'];
		     $keys['redirect_uri'] = WB_CALLBACK_URL;
		     $token = $o->getAccessToken( 'code', $keys );
		}else{
			return $this->redirect("?r=user/login");
		}
		if ($token) {
	        $session = Yii::$app->session;
	        $session['token'] = $token;
	        setcookie( 'weibojs_'.$o->client_id, http_build_query($token) );
		    $c = new \SaeTClientV2( WB_AKEY , WB_SKEY , $session['token']['access_token'] );
			$uid_get = $c->get_uid();
			$uid = $uid_get['uid'];
			$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
			$session['name']=$user_message['name'];
			
			$res = \Yii::$app->db->createCommand()->insert('open_info', [
			    'open_id' => $user_message['idstr'],
			    'user_id' => $user_message['id'],
			    'nickname'=> $user_message['name'],
			    'type'=> '1',
			    'create_time'=>date("Y-m-d H:i:s",time())
		    ])->execute();
	       return $this->redirect('?r=index/index');
	       // echo '授权完成,<a href="weibolist">进入你的微博列表页面</a><br />';
		} else {
		      return $this->redirect("?r=user/login");
		}

	}
	public function actionWeibolist ()
	{
		return $this->render("weibolist");
	}
}