<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_goods".
 *
 * @property integer $shop_id
 * @property string $shop_name
 * @property string $shop_num
 * @property string $shop_type
 * @property string $shop_pinpai
 * @property string $shop_cprice
 * @property string $shop_desc
 * @property string $shop_price
 */
class ShopGoods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_goods';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_name', 'shop_num', 'shop_type', 'shop_pinpai', 'shop_cprice', 'shop_desc'], 'required'],
            [['shop_desc'], 'string'],
            [['shop_price'], 'number'],
            [['shop_name', 'shop_num', 'shop_type', 'shop_pinpai'], 'string', 'max' => 20],
            [['shop_cprice'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shop_id' => 'Shop ID',
            'shop_name' => 'Shop Name',
            'shop_num' => 'Shop Num',
            'shop_type' => 'Shop Type',
            'shop_pinpai' => 'Shop Pinpai',
            'shop_cprice' => 'Shop Cprice',
            'shop_desc' => 'Shop Desc',
            'shop_price' => 'Shop Price',
        ];
    }

    /**
     * 添加语句
     */
       public function addUser($data){
            $this->setAttributes($data);
            return $this->save(false);
        }
}
