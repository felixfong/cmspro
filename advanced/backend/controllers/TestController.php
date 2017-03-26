<?php
namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class TestController extends Controller
{
    

	public function actionTest()
	{
		$model = new User();
		$this->render('test', [
                'model' => $model,
            ]);
	}
}
