<?php

namespace backend\controllers;

use backend\common\service\UploadServices;
use backend\common\components\BaseController;

use backend\models\Brandcate;
use Yii;
use backend\models\ShopGoods;
use backend\models\ShopCategory;
use backend\models\ShopBrand;
use backend\models\Brand;
//use backend\models\Brandcate;
use yii\data\Pagination;
//use app\models\ShopGoods;
//use app\models\ShopCategory;
//use app\models\ShopBrand;
//use app\common\service\UploadServices;
class GoodsController extends BaseController
{  

    /**
     * 商品展示   分页
     * @return [type] [description]
     */
    public function actionIndex()
    {
        $this->layout = 'goods';
        $shop = new ShopGoods();
        $shopCount = $shop->find()->count();
        // $data = (new \yii\db\Query())
        //     ->from('shop_goods')
        //     ->select(['shop_goods.*','shop_category.*','shop_brand.*'])
        //     ->leftJoin('shop_category','shop_goods.shop_type=shop_category.id')
        //     ->leftJoin('shop_brand','shop_goods.shop_pinpai=shop_brand.id')
        //     ->all();
       $arr = $shop->find()->orderBy('shop_id desc');
       $pages = new Pagination([
            'totalCount' => $arr->count(),
            'pageSize'   => 2   
        ]);
        $mctheores = $arr->offset($pages->offset)
            ->limit($pages->limit)
            ->asArray()
            ->all();
        return $this->render('goods-list',['pages'=>$pages,'mctheores'=>$mctheores]);
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
        $img = $_FILES['shop_img'];

        $res  = UploadServices::upload_file($img['name'],$img['tmp_name'],'web');
        if($res){
            $data['shop_name']=$request->post('shop_name','');
            $data['shop_num']=$request->post('shop_num','');
            $data['shop_type']=$request->post('shop_type','');
            $data['shop_pinpai']=$request->post('shop_pinpai','');
            $data['shop_price']=$request->post('shop_price','');
            $data['shop_cprice']=$request->post('shop_cprice','');
            $data['shop_desc']=$request->post('shop_desc','');
            $data['shop_img']=$res;
            // print_r($data);die;
            $goods = new ShopGoods();
            $re=$goods->addUser($data);
            if($re){
                $this->redirect('index.php?r=goods/index');
            }else{
                $this->redirect('index.php?r=goods/add');
            }
        }
    }

    /*商品添加
     * author 韩文坛
     */
    public function actionBrandList()
    {
        $this->layout = 'goods';
        $brand = new Brandcate();
        $brandcate = $brand->brandCate();
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
            ->innerJoin('shop_brand_category T2','T1.category_ids=T2.brand_id')
            ->all();
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
            $res = UploadServices::upload_file($img['name'],$img['tmp_name'],'web');
            if($res){
                $brand = new ShopBrand();
                $brand->name = $name;
                $brand->logo = $res;
                $brand->description = $description;
                $brand->sort = $sort;
                $brand->category_ids = $type;
                $info = $brand->save();
                if($info){
                    return $this->redirect('?r=goods/brand-index');
                }
            }
        }
        if(\Yii::$app->request->isGet){
            $brand = new Brandcate();
            $brandcate = $brand->brandCate();
            return $this->render('brand-list-add',['brandcata'=>$brandcate]);
        }
    }

    /*品牌删除
     *
     */
    public function actionBrandTypeDel(){
        $id = $this->get('id');
        if(empty($id)){
           return false;
        }
        $brand = ShopBrand::findOne($id);
        $brand->delete();
        return $this->redirect('?r=goods/brand-index');
    }

    /*品牌修改
     *
     */
    public function actionBrandTypeShow(){
        $this->layout = 'goods';
        if(\Yii::$app->request->isPost){
            $id = $this->post('id');
            $name = $this->post('brand');
            $sort = $this->post('sort');
            $type = $this->post('type');
            $description = $this->post('description');
            $img = $_FILES['file'];
            $res = UploadServices::upload_file($img['name'],$img['tmp_name'],'web');
            if($res){
                $brand = ShopBrand::findOne($id);
                $brand->name = $name;
                $brand->logo = $res;
                $brand->description = $description;
                $brand->sort = $sort;
                $brand->category_ids = $type;
                $info = $brand->save();
                if($info){
                    return $this->redirect('?r=goods/brand-index');
                }
            }
        }
        if(\Yii::$app->request->isGet){
            $id = $this->get('id');

            $shopBrand = new ShopBrand();
            $brand = $shopBrand->shopBrand($id);

            $bran = new Brandcate();
            $brandcategory = $bran->brandCateOne($brand['category_ids']);
            $brandcate = $bran->brandCate();

            return $this->render('brand-show',['brand'=>$brand,'category'=>$brandcategory,'brandcate'=>$brandcate]);
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
            $brand = new Brandcate();
            $brandcate = $brand->brandCate();
            return $this->render('brand-add',['brandcata'=>$brandcate]);
        }
    }

}

