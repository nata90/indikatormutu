
<table class="table table-striped">
	<thead>
	<tr>
	<?php 
		echo '<th id="variabel-grid_c0" >No.</th>';
		echo '<th id="variabel-grid_c1" >Variabel</th>';
			for($i = 1 ; $i<=$jumlahHari; $i++){
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
		    		for($i = 1 ; $i<=$jumlahHari; $i++){
		    			echo '<td width = 25px; style="text-align:center;">'.RekapVariabelHarian::getDataPerTanggal($tahun.'-'.$bulan.'-'.$i,$data->id_variabel, $idSatker).'</td>';
		    		}
		    		
	    		echo '</tr>';
	    				
	    		$no++;
	    	}
	    ?>
	</table>
</div>



 