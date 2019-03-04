<?php
/* @var $this RekapVariabelBulananController */
/* @var $model RekapVariabelBulanan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_rekapvariabel_bl'); ?>
		<?php echo $form->textField($model,'id_rekapvariabel_bl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_variabel_satker'); ?>
		<?php echo $form->textField($model,'id_variabel_satker'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nilai_variabel_bl'); ?>
		<?php echo $form->textField($model,'nilai_variabel_bl',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'periode_data'); ?>
		<?php echo $form->textField($model,'periode_data'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_input_bl'); ?>
		<?php echo $form->textField($model,'tgl_input_bl'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->