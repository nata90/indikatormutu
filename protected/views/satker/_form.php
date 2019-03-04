<?php
/* @var $this SatkerController */
/* @var $model Satker */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'satker-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_unit'); ?>
		<?php echo $form->textField($model,'id_unit'); ?>
		<?php echo $form->error($model,'id_unit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_satker'); ?>
		<?php echo $form->textField($model,'nama_satker',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'nama_satker'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->