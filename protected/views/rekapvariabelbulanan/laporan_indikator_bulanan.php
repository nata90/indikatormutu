<?php
/* @var $this RekapVariabelHarianController */
/* @var $model RekapVariabelHarian */

$this->breadcrumbs=array(
	'Indikator'=>array('index'),
	'Manage',
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

<h1>Laporan Indikator Bulanan</h1>

<div class="search-form" style="display:none">
<?php /* $this->renderPartial('_search',array(
	'model'=>$model,
	'model2'=>$model2,
)); */ ?>
</div><!-- search-form -->

<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'rekap-variabel-harian-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_rekapvariabel_hr',
		'id_variabel_satker',
		'tgl_data',
		'nilai_variabel_hr',
		'tgl_input_hr',
		'user_id',
		array(
			'class'=>'CButtonColumn',
		),
	),
));*/ ?>

<fieldset class="fieldset">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl($this->route),
			'method'=>'get',
		)); ?>
			<table >
				<tr>
					<td>Tahun</td>
					<td>
						<select name="periode_thn" id="tahun">
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" id="cari-per-tanggal" value="Search" class="btn btn-success ui-button ui-widget ui-state-default ui-corner-all">
					</td>
				</tr>
			</table>
	<?php $this->endWidget(); ?>
</fieldset>
<fieldset class="fieldset">
	<div class="portlet" id="yw2">
		<div class="portlet-decoration">
			Data Variabel Bulanan
		</div>
		<div class="portlet-content">
			<div class="grid-view" id="yw3">
			<table class="table table-striped">
				<thead>
				<tr>
				<?php 
					echo '<th id="indikator-grid_c0" >No.</th>';
					echo '<th id="indikator-grid_c1" >Indikator</th>';
						for($i = 1 ; $i<=12; $i++){
							echo '<th id="indikator-grid_c'. $i .'">'.$i.'</th>';
						}
				?>
				</tr>
				</thead>
				 <?php 
				    $no=1;
				    	foreach($model2 as $data)
				    	{
				    		if($no % 2  == 0){
				    			$class = 'even';
				    		}else {
				    			$class = 'odd';
				    		}

				    		
				    		echo '<tr class="'.$class.'">';
					    		echo '<td width = 20px; align = "center">'.$no.'</td>';
					    		echo '<td width = 400px;>'.$data->idIndikator->uraian_ind.'</td>';
					    		for($i=1;$i<=12;$i++){
					    			$return = RekapVariabelBulanan::model()->getPersenLaporanBulanan($data->id_indikator,$idSatker,$i, date('Y'));
					    			echo '<td width = 25px;>'.$return['persen'].'</td>';
					    		}
				    		echo '</tr>';
				    				
				    		$no++;
				    	}
				    ?>
				</table>
			</div>
		</div>
	</div>

 </fieldset>

 