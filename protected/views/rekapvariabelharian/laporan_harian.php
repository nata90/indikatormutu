<?php
/* @var $this RekapVariabelHarianController */
/* @var $model RekapVariabelHarian */

$this->breadcrumbs=array(
	'Rekap Variabel Harians'=>array('index'),
	'Manage',
);
$urlLoadData = Yii::app()->createUrl('rekapVariabelHarian/getDataHarian');
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

$cs = Yii::app()->getClientScript();
$js=<<<EOP

	$(document).on("click", "#cari-per-tanggal", function () {
		var bulan = $('#RekapVariabelHarian_month').val();
		var tahun = $('#RekapVariabelHarian_year').val();
		var satker = $('#RekapVariabelHarian_satker').val();

		$.ajax({
			type: 'get',
			url: '$urlLoadData',
			dataType:'json',
			data : {
				'bulan':bulan, 
				'tahun':tahun,
				'satker':satker
			},
			success: function(v) {
				$('.grid-view').html(v.html);
			}
		});
	});
EOP;
	$ukey = md5(uniqid(mt_rand(), true));
	$cs->registerScript($ukey, $js);
?>
<div class="page-header">
	<h1>Laporan Rekap Variabel Harian</h1>
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'model2'=>$model2,
)); ?>
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

<?php
	$total = date("d", $timestamp);
?>

<fieldset class="fieldset">
	<table >
		<?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl($this->route),
			'method'=>'get',
		)); ?>
			<tr>
				<td width="60px">Bulan</td>
				<td>
					<?php echo $form->dropDownList($model,'month',Utility::listBulanArr()); ?>
					<?php /*<select name="periode_bln" id="bulan">
						<option value="1">Januari</option>
						<option value="2">Februari</option>
						<option value="3">Maret</option>
						<option value="4">April</option>
						<option value="5">Mei</option>
						<option value="6">Juni</option>
						<option value="7">Juli</option>
						<option value="8">Agustus</option>
						<option value="9">September</option>
						<option value="10">Oktober</option>
						<option value="11">Nopember</option>
						<option value="12">Desember</option>
					</select>*/ ?>
				</td>
			</tr>
			<tr>
				<td>Tahun</td>
				<td>
					<?php echo $form->dropDownList($model,'year',array(2017=>2017, 2018=>2018, 2019=>2019, 2020=>2020)); ?>
					<?php /*<select name="periode_thn" id="tahun">
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
						<option value="2021">2021</option>
					</select>*/ ?>
				</td>
			</tr>
			<tr <?php echo $idSatker==2?'':'style="display:none;"';?>>
				<td>Satker</td>
				<td>
					<?php echo $form->dropDownList($model,'satker',CHtml::listData($allSatker, 'id_satker', 'nama_satker'), array('prompt'=>'Semua Satker')); ?>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="button" id="cari-per-tanggal" value="Search" class="btn btn-success ui-button ui-widget ui-state-default ui-corner-all">
				</td>
			</tr>
		<?php $this->endWidget(); ?>
	</table>
</fieldset>
<fieldset class="fieldset" style="padding-top: 20px;">
	<div class="portlet" id="yw2">
		<div class="portlet-decoration">
			Data Variabel Harian
		</div>
		<div class="portlet-content">
			<div class="grid-view" id="yw3">
				<table class="table table-striped">
					<thead>
						<tr>
						<?php 
							echo '<th id="variabel-grid_c0" >No.</th>';
							echo '<th id="variabel-grid_c1" >Variabel</th>';
								for($i = 1 ; $i<=$jumlahHari; $i++){
									echo '<th id="variabel-grid_c'. $i .'" style="text-align:center;">'.$i.'</th>';
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
						    		echo '<td width = 400px;>'.$data->idVariabel->uraian_variabel.'</td>';
						    		for($i = 1 ; $i<=$jumlahHari; $i++){
						    			echo '<td width = 25px; style="text-align:center;">'.RekapVariabelHarian::getDataPerTanggal(date('Y-m-').$i,$data->id_variabel, $idSatker).'</td>';
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

 