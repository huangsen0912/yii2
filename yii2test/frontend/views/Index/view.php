<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<?php $this->beginBlock('block');?>
	<h1><?=Html::encode($data_hello_str);?></h1>

	<h1><?=HtmlPurifier::process($data_hello_str);?></h1>
	<h1>hello world!</h1>
	<h2><?=$data_array[1];?></h2>
	//加载另外一个文件的内容
	<?php echo $this->render('about',array('name'=>'张三'));?>
	
<?php $this->endBlock(); ?>