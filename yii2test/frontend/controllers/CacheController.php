<?php
namespace frontend\controllers;
use yii\web\Controller;
class CacheController extends Controller{
	public function actionIndex(){
		//缓存的几种方式：文件，nosql，mysql
		//yii\yii2test\common\config\main.php
		// return [
  //   			'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
  //   		'components' => [
  //       			'cache' => [
  //           		'class' => 'yii\caching\FileCache',
  //      			 ],
  //   			],
		// 	];

		//调用cache组件
		$cache=\YII::$app->cache; //cache->getCache()方法->方法中加载cache组件->cache文件
		//添加数据
		//$cache->add('key1','helloworld');
		//$cache->add('key1',"zhidao"); //往缓存中添加，如果键相同，那么添加的数据不会覆盖
		//修改数据
		//缓存设置，设置15秒
		//$cache->set('key1','hello world2',15);
		//删除数据
		//$cache->delete('key1');
		//清空数据
		//$cache->flush();
		//调出数据
		var_dump($cache->get('key1'));


	}

}

?>