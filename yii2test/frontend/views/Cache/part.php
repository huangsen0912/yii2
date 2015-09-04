<?php if($this->beginCache('cached',array('duration'=>10))){?>
<div id="cached">
	<h3>将要被缓存的cached1</h3>
	<?php if($this->beginCache('inner-div',array('duration'=>20))){?>
		<div id="inner-div">
		<h4>内部cache嵌套设置的时间应该比外部的长，否则不被执行到</h4>
		</div>
	<?php 
		$this->endCache();
	}?>
</div>
<?php 
	$this->endCache();
}?>
<div id="not-cached">
	<h3>不会被缓存1</h3>
</div>