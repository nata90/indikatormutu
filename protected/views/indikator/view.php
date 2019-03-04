<?php
/* @var $this IndikatorController */
/* @var $model Indikator */

$this->breadcrumbs=array(
	'Indikators'=>array('index'),
	$model->id_indikator,
);

$this->menu=array(
	array('label'=>'Daftar Indikator', 'url'=>array('index')),
	array('label'=>'Buat Indikator', 'url'=>array('create')),
	array('label'=>'Update Indikator', 'url'=>array('update', 'id'=>$model->id_indikator)),
	array('label'=>'Hapus Indikator', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_indikator),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Pengaturan Indikator', 'url'=>array('admin')),
);
?>

<h1>Lihat Indikator #<?php echo $model->id_indikator; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_indikator',
		'area_ind',
		'uraian_ind',
		'id_klp',
		'status',
		'standar',
		'variabel_1',
		'variabel_2',
		'periode_indikator',
	),
)); ?>
