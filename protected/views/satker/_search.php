<?php
/* @var $this SatkerController */
/* @var $model Satker */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_satker'); ?>
		<?php echo $form->textField($model,'id_satker'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_unit'); ?>
		<?php echo $form->textField($model,'id_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_satker'); ?>
		<?php echo $form->textField($model,'nama_satker',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->