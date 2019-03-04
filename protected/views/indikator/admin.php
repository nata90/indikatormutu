<?php
/* @var $this IndikatorController */
/* @var $model Indikator */

$this->breadcrumbs=array(
	'Indikators'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Indikator', 'url'=>array('index')),
	array('label'=>'Buat Indikator', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#indikator-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pengaturan Indikator</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'indikator-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_indikator',
		'area_ind',
		'uraian_ind',
		'id_klp',
		'status',
		'standar',
		/*
		'variabel_1',
		'variabel_2',
		'periode_indikator',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
