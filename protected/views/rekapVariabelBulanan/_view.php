<?php
/* @var $this RekapVariabelBulananController */
/* @var $data RekapVariabelBulanan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rekapvariabel_bl')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rekapvariabel_bl), array('view', 'id'=>$data->id_rekapvariabel_bl)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_variabel_satker')); ?>:</b>
	<?php echo CHtml::encode($data->id_variabel_satker); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nilai_variabel_bl')); ?>:</b>
	<?php echo CHtml::encode($data->nilai_variabel_bl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periode_bln')); ?>:</b>
	<?php echo CHtml::encode($data->periode_bln); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periode_thn')); ?>:</b>
	<?php echo CHtml::encode($data->periode_thn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl_input_bl')); ?>:</b>
	<?php echo CHtml::encode($data->tgl_input_bl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />


</div>