<?php
namespace frontend\controllers;
use yii\web\Controller;
class CacheController extends Controller{
		/**
		 * 页面缓存
		 */
	public function behaviors(){
		//先于操作执行
		//echo '1';
		return [
			[
				'class'=>'yii\filters\PageCache',
				'only'=>['index'],
				'duration'=>1000,
				'dependency'=>[
					'class'=>'yii\caching\FileDependency',
					'fileName'=>'dependency.txt',
				]
			]
		];
	}


	public function actionPart(){
		echo '6';

		return $this->renderPartial('part');

	}
	public function actionDepend(){
		//文件依赖
		 $cache = \YII::$app->cache;
		// $dependency = new \yii\caching\FileDependency(['fileName'=>'dependency.txt']);
		

		//表达式依赖
		// $dependency = new \yii\caching\ExpressionDependency(
		// 	['expression'=>'\yii::$app->request->get("name")']
		// 	);

		//数据库数据依赖
		 $dependency = new \yii\caching\DBDependency(
		 	['sql'=>'select count(*) from yii.order']
		 	);


		//$cache->set('file_key','helloworld',3000,$dependency);
		var_dump( $cache->get('file_key'));


	}
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