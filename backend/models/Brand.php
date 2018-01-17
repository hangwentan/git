<?php
/**
 * Created by PhpStorm.
 * User: 韩文坛
 * Date: 2018/1/16
 * Time: 14:32
 */

namespace backend\models;


class Brand extends \yii\db\ActiveRecord
{

    public static function tableName(){
        return 'shop_brand';
    }
}