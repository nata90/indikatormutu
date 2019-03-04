<?php
/* @var $this IndikatorController */
/* @var $model Indikator */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'indikator-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'area_ind'); ?>
		<?php echo $form->textField($model,'area_ind',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'area_ind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uraian_ind'); ?>
		<?php echo $form->textField($model,'uraian_ind',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'uraian_ind'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_klp'); ?>
		<?php echo $form->textField($model,'id_klp'); ?>
		<?php echo $form->error($model,'id_klp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'standar'); ?>
		<?php echo $form->textField($model,'standar'); ?>
		<?php echo $form->error($model,'standar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'variabel_1'); ?>
		<?php echo $form->textField($model,'variabel_1'); ?>
		<?php echo $form->error($model,'variabel_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'variabel_2'); ?>
		<?php echo $form->textField($model,'variabel_2'); ?>
		<?php echo $form->error($model,'variabel_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'periode_indikator'); ?>
		<?php echo $form->textField($model,'periode_indikator'); ?>
		<?php echo $form->error($model,'periode_indikator'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->