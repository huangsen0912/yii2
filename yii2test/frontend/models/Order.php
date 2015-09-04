<?php
namespace app\models;
use yii\db\ActiveRecord;

class Order extends ActiveRecord{
	public function getCustomer(){

		return $this->hasOne(Customer::className(),array('id'=>'cid'))->asArray()->one();
	}
}

?>