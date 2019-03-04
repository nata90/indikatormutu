<?php
/* @var $this IndSatkerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ind Satkers',
);

$this->menu=array(
	array('label'=>'Create IndSatker', 'url'=>array('create')),
	array('label'=>'Manage IndSatker', 'url'=>array('admin')),
);
?>

<h1>Ind Satkers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
