<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_goods".
 *
 * @property integer $shop_id
 * @property string $shop_name
 * @property string $shop_num
 * @property integer $shop_type
 * @property integer $shop_pinpai
 * @property string $shop_cprice
 * @property string $shop_desc
 * @property string $shop_price
 * @property string $shop_img
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
            [['shop_name', 'shop_num', 'shop_type', 'shop_pinpai', 'shop_cprice', 'shop_desc', 'shop_price', 'shop_img'], 'required'],
            [['shop_type', 'shop_pinpai'], 'integer'],
            [['shop_desc'], 'string'],
            [['shop_price'], 'number'],
            [['shop_name', 'shop_num'], 'string', 'max' => 20],
            [['shop_cprice'], 'string', 'max' => 50],
            [['shop_img'], 'string', 'max' => 255],
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
            'shop_img' => 'Shop Img',
        ];
    }

            /*
    * 添加用户
    */
        public function addUser($data){
            $this->setAttributes($data);
            return $this->save(false);
        }

    /*
* 查看所有用户
*/
    public function getRoles(){
        return $this->find()->asArray()->all();
    }
    /*
    * 删除会员
    */
    public function delMctheory($delid){
        return $this->deleteAll("id in ($delid)");
    }
    //单条件查询
    public function updates($delid){
      return   $this->find()->where(['id' =>$delid])->one();

    }
    public function userSave($id,$data){
        $User = $this->findOne($id);
        $User->id =$id;
        return $User->save(); // 等同于 $User->update();
    }
}
