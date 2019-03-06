<?php
/* @var $this RekapVariabelHarianController */
/* @var $model RekapVariabelHarian */

$this->breadcrumbs=array(
	'Rekap Variabel Harians'=>array('index'),
	$model->id_rekapvariabel_hr,
);

$this->menu=array(
	array('label'=>'List RekapVariabelHarian', 'url'=>array('index')),
	array('label'=>'Create RekapVariabelHarian', 'url'=>array('create')),
	array('label'=>'Update RekapVariabelHarian', 'url'=>array('update', 'id'=>$model->id_rekapvariabel_hr)),
	array('label'=>'Delete RekapVariabelHarian', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rekapvariabel_hr),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RekapVariabelHarian', 'url'=>array('admin')),
);
?>

<h1>View RekapVariabelHarian #<?php echo $model->id_rekapvariabel_hr; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rekapvariabel_hr',
		'id_variabel_satker',
		'tgl_data',
		'nilai_variabel_hr',
		'tgl_input_hr',
		'user_id',
	),
)); ?>
