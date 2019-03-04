<?php
/* @var $this VariabelController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Variabels',
);

$this->menu=array(
	array('label'=>'Create Variabel', 'url'=>array('create')),
	array('label'=>'Manage Variabel', 'url'=>array('admin')),
);
?>

<h1>Variabels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
