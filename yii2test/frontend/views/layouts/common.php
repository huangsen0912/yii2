<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
	<?=$this->blocks['block'];?>
<br/>----------------------------------------------------------------<br/>
	<?php if(isset($this->blocks['block'])):?>
		<?=$this->blocks['block'];?>
	<?php else:?>
		<h1>common.php</h1>
	<?php endif;?>
	<?=$content;?>
</body>
</html>