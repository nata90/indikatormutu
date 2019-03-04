<?php
/* @var $this VariabelController */
/* @var $model Variabel */

$this->breadcrumbs=array(
	'Variabels'=>array('index'),
	$model->id_variabel=>array('view','id'=>$model->id_variabel),
	'Update',
);

$this->menu=array(
	array('label'=>'List Variabel', 'url'=>array('index')),
	array('label'=>'Create Variabel', 'url'=>array('create')),
	array('label'=>'View Variabel', 'url'=>array('view', 'id'=>$model->id_variabel)),
	array('label'=>'Manage Variabel', 'url'=>array('admin')),
);
?>

<h1>Update Variabel <?php echo $model->id_variabel; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>