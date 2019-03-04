<?php
/* @var $this VariabelSatkerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Variabel Satkers',
);

$this->menu=array(
	array('label'=>'Create VariabelSatker', 'url'=>array('create')),
	array('label'=>'Manage VariabelSatker', 'url'=>array('admin')),
);
?>

<h1>Variabel Satkers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
