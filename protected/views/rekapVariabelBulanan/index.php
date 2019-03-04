<?php
/* @var $this RekapVariabelBulananController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rekap Variabel Bulanans',
);

$this->menu=array(
	array('label'=>'Create RekapVariabelBulanan', 'url'=>array('create')),
	array('label'=>'Manage RekapVariabelBulanan', 'url'=>array('admin')),
);
?>

<h1>Rekap Variabel Bulanans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
