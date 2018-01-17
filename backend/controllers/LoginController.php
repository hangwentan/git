<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2018/1/12
 * Time: 18:26
 */

namespace backend\controllers;


use backend\common\components\BaseController;
use backend\models\Admin;

class LoginController extends BaseController
{
    /*
     * 管理员登录
     * @author 韩文坛
     * @time 2018.1.13
     */
    public function actionLogin()
    {
        if(\Yii::$app->request->isPost){
            $name = $this->post('name');
            $pwd = $this->post('pwd');
            if(empty($name) || empty($pwd)) {
                exit('<script>alert("账号密码不可为空");location.href="?r=login/login";</script>');
            }
            $username = Admin::find()->where(['username'=>$name])->asArray()->one();
            $password = md5($pwd).$username['token'];
            if (empty($username)) {exit('<script>alert("账号密码不可为空");location.href="?r=login/login";</script>');}
            $admin = Admin::find()->where(['username'=>$name])
                                  ->where(['password'=>$password])
                                  ->asArray()->one();
            if ($admin) {
                $session = \Yii::$app->session;
                $session->set('username',$name);
                $session->set('token',$admin['token']);
                $session->set('id',$admin['user_id']);
                echo 1;
            }
        }
        else if(\Yii::$app->request->isGet){
            return $this->render('login');
        }
    }

    /**
    *管理员退出
     */
    public function actionLoginOut()
    {
        //清除SESSION
        $session = \yii::$app->session;
        $session->remove('username');
        $session->remove('token');
        $session->destroy();
        return $this->redirect(['login/login']);
    }

    /*
     * 管理员注册
     * @author 韩文坛
     * @time 2018.1.13
     */
    public function actionReg(){
        if(\Yii::$app->request->isPost){
            $name = $this->post('name');
            $pwd = $this->post('pwd');
            if(empty($name) || empty($pwd)) {
                echo 0;die;
            }
            $username = Admin::find()->where(['username'=>$name])->asArray()->one();
            if($username) {
                exit('<script>alert("注册失败");location.href="?r=login/login";</script>');
            }
            $token = md5(microtime(true));
            $admin = new Admin();
            $admin->username = $name;
            $admin->password = md5($pwd).$token;
            $admin->token = $token;
            $admin->create_time = date('Y-m-d H:i:s');
            $info = $admin->save();
            if($info) {
                echo 1;die;
            }
        } elseif(\Yii::$app->request->isGet) {
            $name = $this->get('name');
            $username = Admin::find()->where(['username'=>$name])->asArray()->one();
            if($username) {
                echo 0;
            }else{
                echo 1;
            }
        }
    }
}