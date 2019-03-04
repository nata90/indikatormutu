<?php
/* @var $this KlpAreaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Klp Areas',
);

$this->menu=array(
	array('label'=>'Create KlpArea', 'url'=>array('create')),
	array('label'=>'Manage KlpArea', 'url'=>array('admin')),
);
?>

<h1>Klp Areas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
