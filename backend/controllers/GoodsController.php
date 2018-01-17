<?php

namespace backend\controllers;

use backend\common\components\BaseController;
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
    
}