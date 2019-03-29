<?php
/* @var $this RekapVariabelBulananController */
/* @var $model RekapVariabelBulanan */

$this->breadcrumbs=array(
	'Rekap Variabel Bulanans'=>array('index'),
	$model->id_rekapvariabel_bl=>array('view','id'=>$model->id_rekapvariabel_bl),
	'Update',
);

$this->menu=array(
	array('label'=>'List RekapVariabelBulanan', 'url'=>array('index')),
	array('label'=>'Create RekapVariabelBulanan', 'url'=>array('create')),
	array('label'=>'View RekapVariabelBulanan', 'url'=>array('view', 'id'=>$model->id_rekapvariabel_bl)),
	array('label'=>'Manage RekapVariabelBulanan', 'url'=>array('admin')),
);
?>

<h1>Update RekapVariabelBulanan <?php echo $model->id_rekapvariabel_bl; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>