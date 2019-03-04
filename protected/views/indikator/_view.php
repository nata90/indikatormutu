<?php
/* @var $this IndikatorController */
/* @var $data Indikator */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_indikator')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_indikator), array('view', 'id'=>$data->id_indikator)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area_ind')); ?>:</b>
	<?php echo CHtml::encode($data->area_ind); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('uraian_ind')); ?>:</b>
	<?php echo CHtml::encode($data->uraian_ind); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_klp')); ?>:</b>
	<?php echo CHtml::encode($data->id_klp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('standar')); ?>:</b>
	<?php echo CHtml::encode($data->standar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('variabel_1')); ?>:</b>
	<?php echo CHtml::encode($data->variabel_1); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('variabel_2')); ?>:</b>
	<?php echo CHtml::encode($data->variabel_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periode_indikator')); ?>:</b>
	<?php echo CHtml::encode($data->periode_indikator); ?>
	<br />

	*/ ?>

</div>