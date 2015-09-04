<?php
	namespace  frontend\controllers;
	use yii\web\Controller;
	use app\models\Customer;
	use app\models\Order;
	class GoodController extends Controller{

		public function actionXn(){
			//关联查询性能的问题
			//1、查询缓存
			$customer=Customer::find()->where(['id'=>1])->one();
			$orders=$customer->orders;//select * from customer where id ...
			$order=Order::find()->where(['id'=>1])->one();
			$order->gid=99;
			$order->save();
			//unset($customer->order);
			$orders2=$customer->orders; //不去执行sql
			//var_dump($orders2);
			//var_dump($orders);

			//2,执行问题
			$customers = Customer::find()->with('orders')->all();
			foreach ($customers as  $customer) {
				$orders=$customer->orders;//hasMany(Order::className(),['cid'=>'id'])->asArray()->all();
				var_dump($orders);
			}

		}
		public function actionIndex(){
			//一个顾客有多少订单
			$customer=Customer::find()->where(['id'=>1])->one();
			//$orders=$customer->hasMany('\app\models\Order',array('cid'=>'id'))->asArray()->all();
			//获取类的全路径
			echo Order::className();
			//降低耦合：存在的问题是：如果表字段更换，就得从新再修改控制器，所以把这部分业务放在model中处理，以后修改字段，修改model,
			//$orders=$customer->hasMany(Order::className(),array('cid'=>'id'))->asArray()->all();
			//调用model中的方法
			//$orders=$customer->getOrder();
			//调用类中的魔术方法__get,order属性不存在时，就调用getOrder方法
			$orders=$customer->order; 
			var_dump($orders);

			//查看一个订单属于哪个顾客
			$order = Order::find()->where(['id'=>3])->one();
			$o=$order->hasOne(Customer::className(),array('id'=>'cid'))->asArray()->one();
			var_dump($o);
		}

	}
?>