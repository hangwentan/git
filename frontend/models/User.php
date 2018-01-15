<?php
namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    /**
     * @return string AR 类关联的数据库表名称
     */
    public static function tableName()
    {
        return '{{user}}';
    }
}