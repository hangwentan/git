<?php
/**
 * Created by PhpStorm.
 * User: 韩文坛
 * Date: 2018/1/22
 * Time: 20:32
 */

namespace backend\models;


use yii\db\ActiveRecord;

class ShopImg extends ActiveRecord
{
    public static function tableName()
    {
        return parent::tableName('shop_img');
    }
}