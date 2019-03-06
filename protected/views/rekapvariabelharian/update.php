<?php
/* @var $this RekapVariabelHarianController */
/* @var $model RekapVariabelHarian */

$this->breadcrumbs=array(
	'Rekap Variabel Harians'=>array('index'),
	$model->id_rekapvariabel_hr=>array('view','id'=>$model->id_rekapvariabel_hr),
	'Update',
);

$this->menu=array(
	array('label'=>'List RekapVariabelHarian', 'url'=>array('index')),
	array('label'=>'Create RekapVariabelHarian', 'url'=>array('create')),
	array('label'=>'View RekapVariabelHarian', 'url'=>array('view', 'id'=>$model->id_rekapvariabel_hr)),
	array('label'=>'Manage RekapVariabelHarian', 'url'=>array('admin')),
);
?>

<h1>Update RekapVariabelHarian <?php echo $model->id_rekapvariabel_hr; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>