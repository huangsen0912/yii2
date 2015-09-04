<?php
namespace app\models;
use yii\db\ActiveRecord;

class Customer extends ActiveRecord{
		public function getOrders(){
			//with用法，先不用all查询
			$orders= $this->hasMany(Order::className(),array('cid'=>'id'))->asArray(); //->all();
			return $orders;
		}
}

?>