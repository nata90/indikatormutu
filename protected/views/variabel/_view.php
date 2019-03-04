<?php
/* @var $this VariabelController */
/* @var $data Variabel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_variabel')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_variabel), array('view', 'id'=>$data->id_variabel)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uraian_variabel')); ?>:</b>
	<?php echo CHtml::encode($data->uraian_variabel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_variabel')); ?>:</b>
	<?php echo CHtml::encode($data->status_variabel); ?>
	<br />


</div>