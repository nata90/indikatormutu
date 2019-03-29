<?php
/* @var $this RekapVariabelBulananController */
/* @var $model RekapVariabelBulanan */

$this->breadcrumbs=array(
	'Rekap Variabel Bulanans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RekapVariabelBulanan', 'url'=>array('index')),
	array('label'=>'Manage RekapVariabelBulanan', 'url'=>array('admin')),
);
?>

<h1>Indikator Mutu Satuan Kerja</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2)); ?>