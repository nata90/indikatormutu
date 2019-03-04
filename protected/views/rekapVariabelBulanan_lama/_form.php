<?php
/* @var $this RekapVariabelBulananController */
/* @var $model RekapVariabelBulanan */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rekap-variabel-bulanan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_variabel_satker'); ?>
		<?php echo $form->textField($model,'id_variabel_satker'); ?>
		<?php echo $form->error($model,'id_variabel_satker'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nilai_variabel_bl'); ?>
		<?php echo $form->textField($model,'nilai_variabel_bl',array('size'=>19,'maxlength'=>19)); ?>
		<?php echo $form->error($model,'nilai_variabel_bl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'periode_data'); ?>
		<?php echo $form->textField($model,'periode_data'); ?>
		<?php echo $form->error($model,'periode_data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tgl_input_bl'); ?>
		<?php echo $form->textField($model,'tgl_input_bl'); ?>
		<?php echo $form->error($model,'tgl_input_bl'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->