<?php
/* @var $this RekapVariabelHarianController */
/* @var $model RekapVariabelHarian */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_rekapvariabel_hr'); ?>
		<?php echo $form->textField($model,'id_rekapvariabel_hr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_variabel_satker'); ?>
		<?php echo $form->textField($model,'id_variabel_satker'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_data'); ?>
		<?php echo $form->textField($model,'tgl_data'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nilai_variabel_hr'); ?>
		<?php echo $form->textField($model,'nilai_variabel_hr',array('size'=>19,'maxlength'=>19)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tgl_input_hr'); ?>
		<?php echo $form->textField($model,'tgl_input_hr'); ?>
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