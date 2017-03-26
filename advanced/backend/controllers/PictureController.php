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
class PictureController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}