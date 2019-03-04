<?php
/* @var $this IndSatkerController */
/* @var $model IndSatker */

$this->breadcrumbs=array(
	'Ind Satkers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Daftar Indikator Satker', 'url'=>array('index')),
	array('label'=>'Buat Indikator Satker', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ind-satker-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Pengaturan Indikator Satuan Kerja</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ind-satker-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_ind_satker',
		'id_satker',
		'id_indikator',
		'status_ind_satker',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
