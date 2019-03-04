<?php
/* @var $this VariabelSatkerController */
/* @var $data VariabelSatker */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_variabel_satker')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_variabel_satker), array('view', 'id'=>$data->id_variabel_satker)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_variabel')); ?>:</b>
	<?php echo CHtml::encode($data->id_variabel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_satker')); ?>:</b>
	<?php echo CHtml::encode($data->id_satker); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_variabel_satker')); ?>:</b>
	<?php echo CHtml::encode($data->status_variabel_satker); ?>
	<br />

</div>