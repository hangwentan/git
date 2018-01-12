<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2017/9/1
 * Time: 11:30
 */

namespace frontend\common\service;
//使用明明空间
use yii\helpers\Url;
use Yii;

class Urlservice {

    //调用域名类的方法
    public static function domain()
    {
        return Yii::$app->params['domain'];
    }
    //主页面$params是id
    public static function bulidwwwurl($path,$params=[])
    {
        //合并数组路径,并且把域名拼接到前面
       return self::domain()['www'].Url::toRoute(array_merge([$path],$params));die;
    }
   
    //空链接
    public static function bulidnullUrl()
    {
        return 'javascript:void(0)';
    }

}