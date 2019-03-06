<?php
/* @var $this RekapVariabelHarianController */
/* @var $model RekapVariabelHarian */

$this->breadcrumbs=array(
	'Rekap Variabel Harians'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RekapVariabelHarian', 'url'=>array('index')),
	array('label'=>'Create RekapVariabelHarian', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#rekap-variabel-harian-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Hasil Entri Variabel Harian</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rekap-variabel-harian-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id_rekapvariabel_hr',
		array(
		  	'header'=>'Satker',
			'value'=>'$data->idVariabelSatker->idSatker->nama_satker'
		),
		'tgl_data',
		array(
		  	'header'=>'Variabel Satker',
			'value'=>'$data->idVariabelSatker->idVariabel->uraian_variabel'
		),
		'nilai_variabel_hr',
		/*'id_variabel_satker',
		'tgl_input_hr',
		'user_id',*/
		array(
			'class'=>'CButtonColumn',
			'template' => '{delete}',
		),
	),
)); ?>
