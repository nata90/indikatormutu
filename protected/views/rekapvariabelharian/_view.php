<?php
/* @var $this RekapVariabelHarianController */
/* @var $data RekapVariabelHarian */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rekapvariabel_hr')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rekapvariabel_hr), array('view', 'id'=>$data->id_rekapvariabel_hr)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_variabel_satker')); ?>:</b>
	<?php echo CHtml::encode($data->id_variabel_satker); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_data')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_variabel_hr')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_variabel_hr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_input_hr')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_input_hr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />


</div>