<?php
/* @var $this SatkerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Satkers',
);

$this->menu=array(
	array('label'=>'Create Satker', 'url'=>array('create')),
	array('label'=>'Manage Satker', 'url'=>array('admin')),
);
?>

<h1>Satkers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
