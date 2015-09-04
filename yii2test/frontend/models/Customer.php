<?php
namespace app\models;
use yii\db\ActiveRecord;

class Customer extends ActiveRecord{
		public function getOrders(){

			$orders= $this->hasMany(Order::className(),array('cid'=>'id'))->asArray()->all();
			return $orders;
		}
}

?>