<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
/**
 * Created by PhpStorm.
 * User: fxc
 * Date: 17-3-15
 * Time: 下午3:39
 */
class UploadfileController extends Controller
{
	public $enableCsrfValidation = false;
	public $layout = false;

	//展现内容编辑模板
	public function actionThumb()
	{
		$result['say'] = 'hello';
		
		return $this->render('thumb',$result);
	}

    //上传图片 以时间划分目录
    public function actionUpfile()
    {
        $thumb = $_FILES['thumb']['name'] ? $_FILES['thumb']['name'] : '';
        if(!$thumb) exit('参数错误');
        $root = $_SERVER['DOCUMENT_ROOT'];
        $time = time();
        $pathDir = '/uploadfile/'.date("Ymd",$time).'/';
        //判断目录是否存在，不存在创建
        if(!is_dir($root.$pathDir)){
            mkdir($root.$pathDir,0777,true);
        }
        //缩率图上传
        if($thumb){
            $thumbExtension = pathinfo($thumb,PATHINFO_EXTENSION);
            $thumbPath = $pathDir.$time.rand(1000000,9999999);
            $thumbName = $thumbPath.'.'.$thumbExtension;
            $upTrue = move_uploaded_file($_FILES['thumb']['tmp_name'],$root.$thumbName);
            $result['thumb'] = $upTrue ? $thumbName : '';
        }

        echo json_encode($result);die;
    }
}