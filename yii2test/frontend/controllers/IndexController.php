<?php
//加入命名空间
namespace frontend\controllers;
//use
use yii\web\Controller;
use yii\web\Cookie;
use app\models\Test;
  class IndexController extends Controller{

    public function actionDelete(){
      //一条数据从数据库中取出来，这条数据是个对象
      // $result =Test::find()->where(['id'=>1])->all();
      // $result[0]->delete(); //调用对象的删除方法
      //print_r($result);

      Test::deleteAll('id>:id',array(':id'=>0));
    }
	public function actionModel(){
		//查询数据 and sql 注入
		// $sql="select * from test where id=1"." or 1=1";
		// $results=Test::findBySql($sql)->all();
		//占位符->预处理preparement
		// $sql="select * from test where id=:id";
		// $results=Test::findBySql($sql,array(":id"=>1))->all();
		//数组的方式
		//$results = Test::find()->where(['id'=>2])->all();
		//$results=Test::find()->where(['>','id','1'])->all();
		//$results=Test::find()->where(['between','id','1','2'])->all();
    //降低内存消耗第1种方式：对象在内存中的存储大，数组在内存中存储小一点，结果由对象转化为数组
    //$results = Test::find()->where(['like','title','fdfd'])->asArray()->all();//asArray()转化为数组
		//第2种方式：batch方式，批量查询
    
    foreach(Test::find()->batch(2) as $tests){
        print_r(count($tests));
    }
    //print_r($results);

	}


	public $layout='common';
  	public function actionView(){
  		//里面有javascript代码，要调用Html::encode转换实体
  		$hello_str="hello god <script>alert(123);</script>";
  		$arr = array(4,5);
  		//创建一个数组
  		$data = array();
  		//把需要传递的数据封装到数组中
  		$data['data_hello_str']=$hello_str;
  		$data['data_array']=$arr;
  		
  		//return $this->renderPartial('view',$data);
  		//布局视图需要用到render
  		return $this->render('view',$data);//$content中

  	}


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