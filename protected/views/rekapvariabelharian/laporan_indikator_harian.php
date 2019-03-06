<?php
/* @var $this RekapVariabelHarianController */
/* @var $model RekapVariabelHarian */

$this->breadcrumbs=array(
	'Indikator'=>array('index'),
	'Manage',
);
$urlLoadData = Yii::app()->createUrl('rekapvariabelharian/getlaporanharian');
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
$cs = Yii::app()->getClientScript();
$js=<<<EOP

	$(document).on("click", "#cari-per-tanggal", function () {
		var bulan = $('#Indikator_month').val();
		var tahun = $('#Indikator_year').val();

		$.ajax({
			type: 'get',
			url: '$urlLoadData',
			dataType:'json',
			data : {
				'bulan':bulan, 
				'tahun':tahun,
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

<h1>Laporan Indikator Harian</h1>



<fieldset class="fieldset">
	<?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl($this->route),
			'method'=>'get',
		)); ?>
	<table >
		<tr>
			<td width="60px">Bulan</td>
			<td>
				<?php echo $form->dropDownList($model,'month',Utility::listBulanArr()); ?>
			</td>
		</tr>
		<tr>
			<td>Tahun</td>
			<td>
				<?php echo $form->dropDownList($model,'year',array(2017=>2017, 2018=>2018, 2019=>2019, 2020=>2020)); ?>
				
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
			Data Variabel Harian
		</div>
		<div class="portlet-content">
			<div class="grid-view" id="yw3">
			<table class="table table-striped">
				<thead>
				<tr>
				<?php 
					echo '<th id="indikator-grid_c0" >No.</th>';
					echo '<th id="indikator-grid_c1" >Indikator</th>';
						for($i = 1 ; $i<=$jumlahHari; $i++){
							echo '<th id="indikator-grid_c'. $i .'">'.$i.'</th>';
						}
					echo '<th id="indikator-grid_c1" >Total</th>';
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

			    		$totalNumerator = 0;
			    		$totalDenumerator = 0;

				    	for($i = 1 ; $i<=$jumlahHari; $i++){
				    		$return = RekapVariabelHarian::model()->getPersenLaporanHarian($data->id_indikator, $idSatker, $i, $bulan, $tahun);
				    		echo '<td width = 25px;>'.$return['persen'].' </td>';

				    		$totalNumerator = $totalNumerator + $return['numerator'];
				    		$totalDenumerator = $totalDenumerator + $return['denumerator'];
				    	}

				    	$totalPersen = round(($totalNumerator / $totalDenumerator) * 100,2);

				    	if($totalNumerator == 0 && $totalDenumerator == 0){
				    		$totalPersen = '0%';
				    	}

				    	if($totalNumerator != 0 && $totalDenumerator == 0){
				    		$totalPersen = 'N/A';
				    	}

				    	echo '<td width = 25px;>'.$totalPersen.'</td>';	
				    		
			    		echo '</tr>';
			    				
			    		$no++;
			    	}
			    ?>
			</table>
	</div>
 </fieldset>

 