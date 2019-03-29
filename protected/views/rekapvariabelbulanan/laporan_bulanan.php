<?php
/* @var $this RekapVariabelHarianController */
/* @var $model RekapVariabelHarian */

$this->breadcrumbs=array(
	'Rekap Variabel Harians'=>array('index'),
	'Manage',
);
$urlLoadData = Yii::app()->createUrl('rekapvariabelbulanan/getDataTahunan');
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
	$(document).on("click", "#cari-per-tahun", function () {
		var tahun = $('#RekapVariabelHarian_year').val();

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
	<h1>Laporan Rekap Variabel Bulanan</h1>
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

<fieldset class="fieldset">
	<table >
		<?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl($this->route),
			'method'=>'get',
		)); ?>
		<tr>
			<td width="50px">Tahun</td>
			<td>
				<?php echo $form->dropDownList($model,'year',array(2016=>2016, 2017=>2017, 2018=>2018, 2019=>2019, 2020=>2020)); ?>
				<?php /*<select name="periode_thn" id="tahun">
					<option value="2017">2017</option>
					<option value="2018">2018</option>
					<option value="2019">2019</option>
					<option value="2020">2020</option>
					<option value="2021">2021</option>
				</select>*/ ?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="button" id="cari-per-tahun" value="Search" class="btn btn-success ui-button ui-widget ui-state-default ui-corner-all">
			</td>
		</tr>
		<?php $this->endWidget(); ?>
	</table>
</fieldset>
<fieldset class="fieldset" style="padding-top: 20px;">
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
							echo '<th id="variabel-grid_c0" >No.</th>';
							echo '<th id="variabel-grid_c1" >Variabel</th>';
								for($i = 1 ; $i<=12; $i++){
									echo '<th id="variabel-grid_c'. $i .'">'.$i.'</th>';
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
					    		for($i=1;$i<=12;$i++){
					    			echo '<td width = 25px;>'.RekapVariabelBulanan::getDataPerBulan($i,date('Y'),$data->id_variabel_satker).'</td>';
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

 