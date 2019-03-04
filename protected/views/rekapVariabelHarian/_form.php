<?php

$cs = Yii::app()->getClientScript();
$js=<<<EOP

	$(document).on("change", "input.simpanData", function () {
		var nilai=$(this).val();		
		var tgl_data=$('#tgl_data').val();
		var url = $(this).attr('url');
		var rel = $(this).attr('rel');

		$.ajax({
			type: 'get',
			url: url,
			dataType: 'json',
			data:{'nilai':nilai, 'tgl_data':tgl_data, 'variabelsatker':rel},
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
	'id'=>'rekap-variabel-harian-form',
	'enableAjaxValidation'=>false,
)); ?>



<fieldset class="fieldset" id="variabel">
	<legend>Data Variabel Harian</legend>
	<table >
		<tr>
			<td width="100px">Tanggal Data</td>
			<td><input type="date" name="tgl_data" id="tgl_data">
				<?php /*Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
				$this->widget('CJuiDateTimePicker',array(
					'model'=>$model, //Model object
					'attribute'=>'tgl_data', //attribute name
					'mode'=>'date', //use "time","date" or "datetime" (default)
					'language'=>'',
					'options'=>array(
						'dateFormat' => 'dd-mm-yy', // save to db format
					) // jquery plugin options
				));*/
				?>
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
		    	<td>Nilai Variabel Harian</td>
		    </tr>
		    <?php 
		    $no=1;
		    	foreach($model2 as $data)
		    	{
		    		echo "<tr>
		    				<td>".$no."</td>
		    				<td>".$data->idVariabel->uraian_variabel."</td>
		    				<td><input class='simpanData' rel='".$data->id_variabel_satker."' name='nilai[".$data->id_variabel_satker."]'  id='nilai_".$data->id_variabel_satker."' value='0' url='".Yii::app()->createUrl('rekapvariabelharian/simpannilai')."'>
		    				</td>
		    				
		    			 </tr>";
		    		$no++;
		    	}
		    ?>
 		</table>
 </fieldset>


<?php $this->endWidget(); ?>

</div><!-- form -->