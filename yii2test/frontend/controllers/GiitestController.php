<?php

namespace frontend\controllers;
use app\models\Giitest;
class GiitestController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$giitest=new GiiTest();
    	$giitest->id=2;
    	//$giitest->title="hhh";
    	$giitest->save();
    	var_dump($giitest->getErrors());


    	
        return $this->renderPartial('index');
    }

    public function actionTest()
    {
        return $this->render('test');
    }

}
