<?php
/* @var $this SatkerController */
/* @var $model Satker */

$this->breadcrumbs=array(
	'Satkers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Satuan Kerja', 'url'=>array('index')),
	array('label'=>'Buat Satuan Kerja', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#satker-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pengaturan Satuan Kerja</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'satker-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_satker',
		'id_unit',
		'nama_satker',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
