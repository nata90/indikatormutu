<?php
/* @var $this VariabelController */
/* @var $model Variabel */

$this->breadcrumbs=array(
	'Variabels'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Variabel', 'url'=>array('index')),
	array('label'=>'Buat Variabel', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#variabel-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pengaturan Variabel</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'variabel-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_variabel',
		'uraian_variabel',
		'status_variabel',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
