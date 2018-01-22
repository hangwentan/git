<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "shop_brand".
 *
 * @property string $id
 * @property string $name
 * @property string $logo
 * @property string $description
 * @property integer $sort
 * @property string $category_ids
 */
class ShopBrand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['sort'], 'integer'],
            [['name', 'logo', 'category_ids'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'logo' => 'Logo',
            'description' => 'Description',
            'sort' => 'Sort',
            'category_ids' => 'Category Ids',
        ];
    }
            /*
          * 查看所有
        */
    public function getRoles(){
        return $this->find()->asArray()->all();
    }

}
