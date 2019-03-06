<?php
/* @var $this RekapVariabelHarianController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rekap Variabel Harians',
);

$this->menu=array(
	array('label'=>'Create RekapVariabelHarian', 'url'=>array('create')),
	array('label'=>'Manage RekapVariabelHarian', 'url'=>array('admin')),
);
?>

<h1>Rekap Variabel Harians</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
