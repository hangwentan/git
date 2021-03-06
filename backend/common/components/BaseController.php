<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2017/8/30
 * Time: 20:28
 */

namespace backend\common\components;
header("content-type:text/html;charset=utf-8");
use yii\web\Controller;
use Yii;
use yii\web\Cookie;

class BaseController extends Controller
{
//    public $layout = 'menu';
    public $enableCsrfValidation = false;
    public $layout=false;
    public $session_name = 'backend_session_info';
    public function get($key,$value='')
    {
        return Yii::$app->request->get($key,$value);
    }

    public function post($key,$value='')
    {
        return Yii::$app->request->post($key,$value);
    }

    public function addCookie($key,$value='',$expire=0)
    {
        $cookies=Yii::$app->response->cookies;
        $cookies->add(new Cookie([
            'name'=>$key,
            'value'=>$value,
            'expire'=>$expire
        ]));
    }
    //获取cookie
    public function getCookie($key)
    {
        return Yii::$app->request->cookies->getValue($key,'');
    }

    //alert弹窗
    public function renderjs($meg,$url)
    {
        return $this->renderPartial('@app/views/common/alert',['meg'=>$meg,'url'=>$url]);
    }
        //设置session
    public function setSession($key,$value){
        Yii::$app->session[$key] = $value;
    }
     //获取session
    public function getSession($key){
        return Yii::$app->session[$key];
    }
}