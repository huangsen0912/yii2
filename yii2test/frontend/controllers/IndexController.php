<?php
//加入命名空间
namespace frontend\controllers;
//use
use yii\web\Controller;
use yii\web\Cookie;
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
  		/**
  		 * session处理
  		 *session.save_path = "f:/wamp/tmp",session的保存路径
  		 *ArrayAccess接口
  		 */
  		$session= \Yii::$app->session;
  		$session->open(); //开启session

  		if($session->isActive){
  			echo 'session is active';
  		}
  		//session对象
  		$session->set("username","张三");
  		echo $session->get('username');
  		$session->remove('username');
  		//session数组
  		// $session['username']="张三";
  		// echo $session['username'];
  		// unset($session['username']);

  		/**
  		 * cookie组件
  		 * use yii\web\Cookie
  		 */
  		$cookies=\Yii::$app->response->cookies;
  		$cookie=array('name'=>'username','value'=>'王五11');
  		$cookies->add(new Cookie($cookie));
  		//$cookies->remove('username');
  		$cookies=$request->cookies;
  		//echo $cookies->get('username');
  		echo $cookies->getValue('username','default');
  	}

  }


?>