<?php
/* @var $this VariabelSatkerController */
/* @var $model VariabelSatker */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_variabel_satker'); ?>
		<?php echo $form->textField($model,'id_variabel_satker'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_variabel'); ?>
		<?php echo $form->textField($model,'id_variabel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_satker'); ?>
		<?php echo $form->textField($model,'id_satker'); ?>
	</div>

		<div class="row">
		<?php echo $form->label($model,'status_variabel_satker'); ?>
		<?php echo $form->textField($model,'status_variabel_satker'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->