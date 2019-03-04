<?php
/* @var $this RekapVariabelBulananController */
/* @var $model RekapVariabelBulanan */

$this->breadcrumbs=array(
	'Rekap Variabel Bulanans'=>array('index'),
	$model->id_rekapvariabel_bl,
);

$this->menu=array(
	array('label'=>'List RekapVariabelBulanan', 'url'=>array('index')),
	array('label'=>'Create RekapVariabelBulanan', 'url'=>array('create')),
	array('label'=>'Update RekapVariabelBulanan', 'url'=>array('update', 'id'=>$model->id_rekapvariabel_bl)),
	array('label'=>'Delete RekapVariabelBulanan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rekapvariabel_bl),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage RekapVariabelBulanan', 'url'=>array('admin')),
);
?>

<h1>View RekapVariabelBulanan #<?php echo $model->id_rekapvariabel_bl; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_rekapvariabel_bl',
		'id_variabel_satker',
		'nilai_variabel_bl',
		'periode_data',
		'tgl_input_bl',
		'user_id',
	),
)); ?>
