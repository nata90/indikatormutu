<?php

$cs = Yii::app()->getClientScript();
$js=<<<EOP

	$(document).on("change", "input.simpanData", function () {
		var nilai=$(this).val();		
		var bulan=$('#bulan').val();
		var tahun=$('#tahun').val();
		var url = $(this).attr('url');
		var rel = $(this).attr('rel');

		$.ajax({
			type: 'get',
			url: url,
			dataType: 'json',
			data:{'nilai':nilai, 'bulan':bulan, 'tahun':tahun, 'variabelsatker':rel},
			success: function(v){
				
			}
		});

	});


EOP;
	$ukey = md5(uniqid(mt_rand(), true));
	$cs->registerScript($ukey, $js);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rekap-variabel-bulanan-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<fieldset class="fieldset">
	<legend>Data Variabel Bulanan</legend>
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
	<table>
		<colgroup>
		    <col  width="30px">
		    <col  width="400px">
		    <col  width="128px">
		<!--    <col  width="70px"> -->
		</colgroup>
		    <tr>
		    	<td>No</td>
		    	<td>Variabel</td>
		    	<td>Nilai Variabel Bulanan</td>
		    </tr>
		    <?php 
		    $no=1;
		    	foreach($model2 as $data)
		    	{
		    		echo "<tr>
		    				<td>".$no."</td>
		    				<td>".$data->idVariabel->uraian_variabel."</td>
		    				<td><input class='simpanData' rel='".$data->id_variabel_satker."' name='nilai[".$data->id_variabel_satker."]'  id='nilai_".$data->id_variabel_satker."' value='0' url='".Yii::app()->createUrl('rekapvariabelbulanan/simpannilai')."'>
		    				</td>
		    			 </tr>";
		    		$no++;
		    	}
		    ?>
 		</table>
 </fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->