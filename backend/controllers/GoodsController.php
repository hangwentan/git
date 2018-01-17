<?php

namespace backend\controllers;

use backend\common\components\BaseController;
use backend\models\Brand;
use backend\models\Brandcate;

class GoodsController extends BaseController
{
    public function actionIndex()
    {
        $this->layout = 'goods';
        return $this->render('goods-list');
    }

    /*商品添加
     * author 韩文坛
     */
    public function actionAdd()
    {
        $this->layout = 'goods';
        return $this->render('goods-add');
    }

    /*商品添加
     * author 韩文坛
     */
    public function actionBrandList()
    {
        $this->layout = 'goods';
        $brandcate = Brandcate::find()->asArray()->all();
        return $this->render('brand-list',['brand'=>$brandcate]);
    }

    /*品牌列表
     * author 韩文坛
     */
    public function actionBrandIndex()
    {
        $this->layout = 'goods';
        $brand = (new \yii\db\Query())
            ->from(['shop_brand T1'])
            ->innerJoin('shop_brand_category T2','T2.goods_category_id=T1.category_ids')
            ->all();
//        $sql = 'SELECT * FROM shop_brand T1 INNER JOIN shop_brand_category T2 ON T1.category_ids=T2.goods_category_id';
//        $brand = \Yii::$app->db->createCommand($sql)->queryAll();
//        print_r($brand);die;
        return $this->render('brand-index',['brand'=>$brand]);
    }

    /*品牌添加
    * author 韩文坛
    */
    public function actionBrandListAdd()
    {
        $this->layout = 'goods';
        if (\Yii::$app->request->isPost){
            $name = $this->post('brand');
            $sort = $this->post('sort');
            $type = $this->post('type');
            $description = $this->post('description');
            $img = $_FILES['file'];
            $file_type=['png','jpg','jpeg','gif'];
//            if (!in_array($img['type']))
        }
        if(\Yii::$app->request->isGet){
            $brandcate = Brandcate::find()->asArray()->all();
            return $this->render('brand-list-add',['brandcata'=>$brandcate]);
        }
    }


    /*品牌分类添加
     * author 韩文坛
     */
    public function actionBrandAdd()
    {
        $this->layout = 'goods';
        //品牌添加
        if(\Yii::$app->request->isPost){
            $brand = $this->post('brand');
            $type = $this->post('type');
            $brandcate = new Brandcate();
            $brandcate->name = $brand;
            $brandcate->goods_category_id = $type;
            $info = $brandcate->save();
            if($info){
                echo 1;
            }
        }
        if(\Yii::$app->request->isGet){
            $brandcate = Brandcate::find()->asArray()->all();
            return $this->render('brand-add',['brandcata'=>$brandcate]);
        }
    }
}
