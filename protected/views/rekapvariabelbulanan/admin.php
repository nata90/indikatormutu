<?php
/* @var $this RekapVariabelBulananController */
/* @var $model RekapVariabelBulanan */

$this->breadcrumbs=array(
	'Rekap Variabel Bulanans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List RekapVariabelBulanan', 'url'=>array('index')),
	array('label'=>'Create RekapVariabelBulanan', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#rekap-variabel-bulanan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Rekap Variabel Bulanan</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rekap-variabel-bulanan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'id_rekapvariabel_bl',
		//'id_variabel_satker',
		//'periode_thn',
		array(
		  	'header'=>'Satker',
			'value'=>'$data->idVariabelSatker->idSatker->nama_satker'
		),
		
		'periode_bln',
		/*array(
			  	'header'=>'Bulan',
				'value'=> 'Utility::listBulanArr($data->periode_bln)',
				'type'=> 'raw'
			),
		*/
		array(
		  	'header'=>'Tahun',
			'value'=>'$data->periode_thn'
		),
		array(
		  	'header'=>'Variabel Satker',
			'value'=>'$data->idVariabelSatker->idVariabel->uraian_variabel'
		),
		'nilai_variabel_bl',
		/*'tgl_input_bl',
		'user_id',*/
		
		array(
			'class'=>'CButtonColumn',
			'template' => '{delete}',
		),
	),
)); ?>
