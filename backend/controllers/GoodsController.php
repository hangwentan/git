<?php

namespace backend\controllers;

use backend\common\components\BaseController;

use backend\models\Brand;
use backend\models\Brandcate;
use Yii;
use app\models\ShopGoods;
use app\models\ShopCategory;
use app\models\ShopBrand;
class GoodsController extends BaseController
{  

    /**
     * 商品展示
     * @return [type] [description]
     */
    public function actionIndex()
    {
        $this->layout = 'goods';
        $data = (new \yii\db\Query())
            ->from('shop_goods')
            ->select(['shop_goods.*','shop_category.*','shop_brand.*'])
            ->leftJoin('shop_category','shop_goods.shop_type=shop_category.id')
            ->leftJoin('shop_brand','shop_goods.shop_pinpai=shop_brand.id')
            ->all();
        return $this->render('goods-list',['data' => $data]);
    }

    /*商品添加
     * author 韩文坛
     */
    public function actionAdd()
    {
        $this->layout = 'goods';
        $shop_type = ShopCategory::find()->all();
        Yii::$app->view->params['name'] = $shop_type; 
        $shop_pinpai = ShopBrand::find()->all();
        Yii::$app->view->params['name'] = $shop_pinpai; 
        return $this->render('goods-add',['shop_type' => $shop_type,'shop_pinpai'=>$shop_pinpai]);
    }
   /**
    *  
    * 生成货号
    * @return [type] [description]
    */
    public function actionShop_num()
    {   
        $num = 'MY_'.date('YmdHis').rand(10,99);
        exit($num);
    }
    /**
     * 商品添加
     */
    public function actionShop(){
        $request=Yii::$app->request;
        $data=[];
        $data['shop_name']=$request->post('shop_name','');
        $data['shop_num']=$request->post('shop_num','');
        $data['shop_type']=$request->post('shop_type','');
        $data['shop_pinpai']=$request->post('shop_pinpai','');
        $data['shop_price']=$request->post('shop_price','');
        $data['shop_cprice']=$request->post('shop_cprice','');
        $data['shop_desc']=$request->post('shop_desc','');
        $goods = new ShopGoods();
        $re=$goods->addUser($data);
        if($re){
            $this->redirect('index.php?r=goods/index');
        }else{
            $this->redirect('index.php?r=goods/add');
        }
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

