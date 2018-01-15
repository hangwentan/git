<?php
/**
 * Created by PhpStorm.
 * User: 韩文坛
 * Date: 2018/1/13
 * Time: 10:39
 */
namespace backend\models;

class Admin extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_admin_user';
    }
}