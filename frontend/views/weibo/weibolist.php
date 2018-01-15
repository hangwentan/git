<?php
$session = Yii::$app->session;

include_once( 'weibo/config.php' );
include_once( 'weibo/saetv2.ex.class.php' );

$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $session['token']['access_token'] );
// $ms  = $c->home_timeline(); // done
$uid_get = $c->get_uid();
// print_r($uid_get);die;
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
?>