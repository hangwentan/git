<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2017/9/6
 * Time: 10:27
 */

namespace app\common\service;


class UploadServices {
    //文件上传
    public static function load($img,$path = 'images/web/upload/'){
        $file = array();
        //判断是否多文件上传
        if (!is_array($_FILES[$img]['name'])) {
            //单文件直接追加
            $file[] = $_FILES[$img];
        }else{
            //循环放入数组
            foreach ($_FILES[$img]['name'] as $k=>$v) {
                $file[] = array(
                    'name'=>$v,
                    'type'=>$_FILES[$img]['type'][$k],
                    'tmp_name'=>$_FILES[$img]['tmp_name'][$k]
                );
            }
        }
        $nameinfo = array();
        foreach ($file as $val) {
            $type = explode('/',$val['type']);
            $name = date('YmdHis').rand(0,999999).'.'.$type[1];
            $file = $path.$name;
            $nameinfo[] = $file;
            move_uploaded_file($val['tmp_name'],$file);
        }
        return count($nameinfo)>1 ? $nameinfo : $nameinfo[0];
    }

    public static $allow_file_type=['gif','png','jpg','jepg','mpeg'];


    public static function upload_file($file_name,$file_path,$bucket=''){
        if(!$file_name){
            return '文件名称不正确';
        }
        if(!$file_path || !file_exists($file_path)){
            return '临时文件不正确';
        }
        $file_type=explode('.',$file_name);
        $type=end($file_type);
        if(in_array($type,self::$allow_file_type)){
            return '文件类型不正确';
        }
        if(!array_key_exists($bucket,\Yii::$app->params['upload'])){
            return '存放目录不存在';
        }
        $uploadfile_dir=dirname(\Yii::$app->vendorPath).'/web/'.\Yii::$app->params['upload'][$bucket];
        if(!file_exists($uploadfile_dir)){
            mkdir($uploadfile_dir,0777);
            chmod($uploadfile_dir,0777);
        }
        $date_dir=date('Ymd',time());
        $p_date_path=$uploadfile_dir.'/'.$date_dir;
        $new_file_name=md5($file_path).'.'.$type;
        $new_file_path=$date_dir.'/'.$new_file_name;
        if(!file_exists($p_date_path)){
            mkdir($p_date_path,0777);
            chmod($p_date_path,0777);
        }
        $re=move_upload_file($file_path,$uploadfile_dir.'/'.$new_file_path);
        if(!$re){
            return '上传失败请重试';
        }
        return $new_file_name;
    }
}