<?php
/* @var $this IndikatorController */
/* @var $model Indikator */

$this->breadcrumbs=array(
	'Indikators'=>array('index'),
	$model->id_indikator=>array('view','id'=>$model->id_indikator),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Indikator', 'url'=>array('index')),
	array('label'=>'Buat Indikator', 'url'=>array('create')),
	array('label'=>'Lihat Indikator', 'url'=>array('view', 'id'=>$model->id_indikator)),
	array('label'=>'Pengaturan Indikator', 'url'=>array('admin')),
);
?>

<h1>Update Indikator <?php echo $model->id_indikator; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>