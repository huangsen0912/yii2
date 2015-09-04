<?php
	namespace  frontend\controllers;
	use yii\web\Controller;
	use app\models\Customer;
	use app\models\Order;
	class GoodController extends Controller{

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