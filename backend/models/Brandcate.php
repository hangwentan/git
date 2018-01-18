<?php
/**
 * Created by PhpStorm.
 * User: 韩文坛
 * Date: 2018/1/16
 * Time: 14:32
 */

namespace backend\models;


class Brandcate extends \yii\db\ActiveRecord
{

    public static function tableName(){
        return 'shop_brand_category';
    }

    /*
     *获取品牌分类列表
     */
    public function brandCate(){
        return $this->find()->asArray()->all();
    }

    /*
     * 获取单条品牌分类
     */
    public function brandCateOne($id){
        return $this->find()->where(['brand_id'=>$id])->asArray()->one();
    }
}