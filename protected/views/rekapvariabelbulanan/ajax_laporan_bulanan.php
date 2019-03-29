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
    	foreach($model as $data)
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
	    			echo '<td width = 25px;>'.RekapVariabelBulanan::getDataPerBulan($i,$year,$data->id_variabel_satker).'</td>';
	    		}

    		echo '</tr>';
    				
    		$no++;
    	}
    ?>
</table>