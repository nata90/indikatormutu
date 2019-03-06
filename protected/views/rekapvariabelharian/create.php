<?php
/* @var $this RekapVariabelHarianController */
/* @var $model RekapVariabelHarian */

$this->breadcrumbs=array(
	'Rekap Variabel Harians'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RekapVariabelHarian', 'url'=>array('index')),
	array('label'=>'Manage RekapVariabelHarian', 'url'=>array('admin')),
);
?>

<h1>Indikator Mutu Satuan Kerja</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'model2'=>$model2)); ?>