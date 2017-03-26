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
class VideoController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    //测试数据源
    public function actionText()
    {
		$db = Yii::$app->db;
        $session = Yii::$app->session;
        //if ($session->has('emulate_data')) {
        //已生成
        //} else {
            $list = [];
            //第一次会模拟个数据
            $list = $db->createCommand('SELECT id,title,image,url FROM video ORDER BY id DESC LIMIT 0,30')->queryAll();
            $session->set('emulate_data',$list);
        //}

        $list_temp = [];
        $emulate_data = $session->get('emulate_data');
        //检索
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            foreach ($emulate_data as $key => $row) {
                if (strpos($row['title'], $_POST['search']) !== false
                    || strpos($row['title'], $_POST['search']) !== false) {
                    $list_temp[] = $emulate_data[$key];
                }
            }
        } else {
            $list_temp = $emulate_data;
        }
        //排序
        if (isset($_POST['sort'])) {
            $temp = [];
            foreach ($list_temp as $row) {
                $temp[] = $row[$_POST['sort']];
            }
            //php的多维排序
            array_multisort($temp,
                $_POST['sort'] == 'title' ? SORT_STRING : SORT_NUMERIC,
                $_POST['order'] == 'asc' ? SORT_ASC : SORT_DESC,
                $list_temp
            );
        }

        //分页时需要获取记录总数，键值为 total
        $result["total"] = count($list_temp);
        //根据传递过来的分页偏移量和分页量截取模拟分页 rows 可以根据前端的 dataField 来设置
        $result["rows"] = array_slice($list_temp, $_POST['offset'], $_POST['limit']);

        //echo'<pre>';print_r($result);die;
        echo json_encode($result);die;
    }

    /**
	 * 采集页面程序
	 *
	 * 程序需在CLI模式下执行，请自行操作
	 */
    public function actionSpirules()
    {
		$postInfo = Yii::$app->request->post();
        unset($postInfo['_csrf']);
		$this->actionDoSpirulesAdd($postInfo);
        $result['status'] = 'success';
		
        echo json_encode($result);die;
    }

    //存储采集数据
    public function actionDoSpirulesAdd($postInfo)
    {
		$insertData = array();
		if($postInfo){
			$data = file_get_contents('E:\wamp\www\advanced\backend\web\assets\phpspider\data\zuqiu1.csv');
		}
		$iData = explode(',',$data);
		$insertData['title'] = $iData[0];
		$insertData['image'] = $iData[1];
		$insertData['url'] = $iData[2];
		$isTrue = Yii::$app->db->createCommand()->insert('video',$insertData)->execute();
		return $isTrue;
		/*
		require dirname(__FILE__).'/../web/assets/phpsider/core/init.php';
		$configs = array(
			'name' => $postInfo['name'],
			'tasknum' => 1,
			'domains' => array(
				$postInfo['domain'],
			),

			'scan_urls' => array(
				$postInfo['scan_url'],
			),
			'list_url_regexes' => array(
				$postInfo['list_url'],

			),
			'content_url_regexes' => array(
				$postInfo['content_url'],

			),
			'export' => array(
				'type' => 'csv',
				'file' => PATH_DATA.'/zuqiu.csv', // data目录下
			),
			'fields' => array(
				array(
					'name' => "title",
					'selector' => "@<div\sclass=\"title\">\s*<h1>(.*?)<\/h1>\s*<\/div>@", // regex抽取规则
					'selector_type' => "regex",
					'required' => true,
				),
				array(
					'name' => "image",
					'selector' => "//div[contains(@class,'v-img')]//a//img[contains(@class,'v-limg')]",
					'required' => true,
				),
				array(
					'name' => "url",
					'selector' => "@<div\sclass=\"v-img\">\s*<a\s*href=\"(.*?)\".*?>@",
					'selector_type' => "regex",
					'required' => true,
				),
			),
		);

		$spider = new phpspider($configs);
		$res = $spider->start();
		*/
		/*
        $postInfo = Yii::$app->request->post();
        unset($postInfo['_csrf']);
        $postInfo['publish'] = strtotime($postInfo['publish']);
        //$isTrue = Yii::$app->db->createCommand()->insert('news',$postInfo)->execute();
        $result['status'] = 'success';
		
        echo json_encode($result);die;
		*/
    }
}