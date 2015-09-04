<?php
namespace frontend\controllers;
use yii\web\Controller;
use app\models\Order;
class MapController extends Controller{

	public function actionIndex(){
		//类的映射表
		//new Order(不认识)->lazy_loading->autoload('order')->找到全名\app\models\Order->加载绝对路径文件F:/wamp/www/yii2/yii2test/frontend/models/Order.php
		//如此加载也很耗时，那么如果能给他一个映射表，让它直接去找那个文件，就会提高效率
		\Yii::$classMap['app\models\Order']='F:\wamp\www1\yii2\yii2test\frontend\models\Order.php';

		//$order = new Order();
		$order = new Order;

	}
}

?>