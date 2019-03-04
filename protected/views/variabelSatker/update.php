<?php
/* @var $this VariabelSatkerController */
/* @var $model VariabelSatker */

$this->breadcrumbs=array(
	'Variabel Satkers'=>array('index'),
	$model->id_variabel_satker=>array('view','id'=>$model->id_variabel_satker),
	'Update',
);

$this->menu=array(
	array('label'=>'List VariabelSatker', 'url'=>array('index')),
	array('label'=>'Create VariabelSatker', 'url'=>array('create')),
	array('label'=>'View VariabelSatker', 'url'=>array('view', 'id'=>$model->id_variabel_satker)),
	array('label'=>'Manage VariabelSatker', 'url'=>array('admin')),
);
?>

<h1>Update VariabelSatker <?php echo $model->id_variabel_satker; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>