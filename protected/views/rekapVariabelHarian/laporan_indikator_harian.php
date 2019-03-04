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

<h1>Laporan Indikator Harian</h1>

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
	<table >
		<tr>
			<td width="60px">Bulan</td>
			<td>
				<select name="periode_bln" id="bulan">
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
				</select>
			</td>
		</tr>
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
	</table>
</fieldset>
<fieldset class="fieldset">
	<div class="grid-view" style="overflow:auto;width:100%;padding:10px;border:0px solid #000000">
	<table class="items"  border="1" width="90%">
		<thead>
		<tr>
		<?php 
			echo '<th id="indikator-grid_c0" >No.</th>';
			echo '<th id="indikator-grid_c1" >Indikator</th>';
				for($i = 1 ; $i<=30; $i++){
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
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		echo '<td width = 25px;> </td>';
			    		
		    		echo '</tr>';
		    				
		    		$no++;
		    	}
		    ?>
		</table>
	</div>












 </fieldset>

 