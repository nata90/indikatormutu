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