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
class NewsController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    //测试数据源
    public function actionText()
    {
        $list = [];
        //第一次会模拟个数据
        for($i = 1; $i < 50; $i ++) {
            $list[] = [
                "id" => $i,
                "short_title" => substr(str_shuffle(implode('', range('a', 'z'))), 0, 5),
                "publish" => mt_rand(10, 30)
            ];
        }
        $list_temp = [];
        //检索
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            foreach ($list as $key => $row) {
                if (strpos($row['short_title'], $_POST['search']) !== false
                    || strpos($row['publish'], $_POST['search']) !== false) {
                    $list_temp[] = $list[$key];
                }
            }
        } else {
            $list_temp = $list;
        }
        //排序
        if (isset($_POST['sort'])) {
            $temp = [];
            foreach ($list_temp as $row) {
                $temp[] = $row[$_POST['sort']];
            }
            //php的多维排序
            array_multisort($temp,
                $_POST['sort'] == 'name' ? SORT_STRING : SORT_NUMERIC,
                $_POST['order'] == 'asc' ? SORT_ASC : SORT_DESC,
                $list_temp
            );
        }

        //分页时需要获取记录总数，键值为 total
        $result["total"] = count($list_temp);
        //根据传递过来的分页偏移量和分页量截取模拟分页 rows 可以根据前端的 dataField 来设置
        $result["rows"] = array_slice($list_temp, 1, 2);

        echo json_encode($result);die;
    }

    //添加新闻模板
    public function actionAdd()
    {
        return $this->render('add');
    }

    //
    public function actionDoAdd()
    {
        $postInfo = Yii::$app->request->post();
        unset($postInfo['_csrf']);
        $postInfo['publish'] = strtotime($postInfo['publish']);
        //$isTrue = Yii::$app->db->createCommand()->insert('news',$postInfo)->execute();
        $result['status'] = 'success';

        echo json_encode($result);die;
    }
}