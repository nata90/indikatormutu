<table class="table table-striped">
	<thead>
	<tr>
	<?php 
		echo '<th id="indikator-grid_c0" >No.</th>';
		echo '<th id="indikator-grid_c1" >Indikator</th>';
			for($i = 1 ; $i<=$jumlahHari; $i++){
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

	    	for($i = 1 ; $i<=$jumlahHari; $i++){
	    		echo '<td width = 25px;>'.RekapVariabelHarian::model()->getPersenLaporanHarian($data->id_indikator, $idSatker, $i, $bulan, $tahun).' </td>';
	    	}
	    		
	    		
    		echo '</tr>';
    				
    		$no++;
    	}
    ?>
</table>


 