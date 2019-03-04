<div class="search-form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl('site/search'),
		'enableAjaxValidation'=>true,
		'method'=>'get',
		'htmlOptions' => array(
			'enctype' => 'multipart/form-data',
			'class'=>'clearfix',
		)
	)); ?>
		<input type="text" name="search" placeholder="job title, keywords or company">
		<input type="submit" value="Search">
	<?php $this->endWidget(); ?>
</div>