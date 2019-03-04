<?php
/* @var $this VariabelSatkerController */
/* @var $model VariabelSatker */

$this->breadcrumbs=array(
	'Variabel Satkers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Variabel Satker', 'url'=>array('index')),
	array('label'=>'Buat Variabel Satker', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#variabel-satker-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pengaturan Variabel Satker</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'variabel-satker-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_variabel_satker',
		'id_variabel',
		'id_satker',
		'status_variabel_satker',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
