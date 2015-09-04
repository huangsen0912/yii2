<?php
//加入命名空间
namespace frontend\controllers;
//use
use yii\web\Controller;
  class IndexController extends Controller{

  	public function actionIndex(){

  		//echo 'helloworld';
  		
  		/** 请求处理流程
  		 *调用Yii的静态应用实例,顶级类用\Yii
  		 * 需要调用request组件来调用相应方法处理
  		 */
  		$request=\Yii::$app->request;

  		echo $request->get('id',20);//获取参数id的值,默认值20
  		if($request->isGet){ //判断是不是get方式
  			echo 333;
  		}
  		//$post = \Yii::$app->post;
  		//echo $post->get('name');

  		/**相应处理流程
  		 * 调用response组件
  		 */
  		$res = \Yii::$app->response;
  		//$response->statusCode=404;//302;
  		$res->headers->add('code',302);//添加相应头
  		$res->headers->set('code',404);//修改相应头
  		//跳转
  		//$res->headers->set('location','http://www.baidu.com');//设置跳转地址
  		//$this->redirect('http://www.sina.com.cn');
  		//文件下载
  		//$res->headers->add('content-disposition','attachment;filename="a.jpg"');
  		//$res->sendFile("robots.txt");//路径是web下


  	}

  }


?>