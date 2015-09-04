<?php
namespace app\models;
use yii\db\ActiveRecord;

class Customer extends ActiveRecord{
		public function getOrder(){

			return $this->hasMany(Order::className(),array('cid'=>'id'))->asArray()->all();

		}
}

?>