<?php
/* @var $this VariabelController */
/* @var $model Variabel */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_variabel'); ?>
		<?php echo $form->textField($model,'id_variabel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'uraian_variabel'); ?>
		<?php echo $form->textField($model,'uraian_variabel',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_variabel'); ?>
		<?php echo $form->textField($model,'status_variabel'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->