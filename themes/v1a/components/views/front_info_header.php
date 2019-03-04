<div id="info_header">
	<div id="info_isi">
		<div><?php //=strtoupper($singrstitl);?> <?php //=strtoupper($singhead1);?></div>
		<div>
			<?php
			/* if($_SESSION['SES_REG']) {
				echo '<a href="log_out.php">Sign Out</a> | User : <span class="date">'.$_SESSION['NIP'].'</span>';
			}else {
				echo '<a href="login.php">Sign In</a> | guest';
			} 
			?>
		</div>
		<div class="date"><?php echo date("l, F Y"); ?></div>
		<div class="date">
			<?php
			/* $dep  = "SELECT * FROM m_login WHERE KDUNIT = '".$_SESSION['KDUNIT']."' AND ROLES = '".$_SESSION['ROLES']."'";
			$qe   = mysql_query($dep);
			if($qe) {
				$deps = mysql_fetch_assoc($qe);
				echo "<div><b>".$deps['DEPARTEMEN']."</b></div>";
				echo "<div style='position:absolute;'>";
				//include("chat/chatroom.php");
				echo "</div>";
			} */
			?>
		</div>
		<?php
		//echo '</br>';
			if(!Yii::app()->user->isGuest){
				echo 'Selamat Datang, </br>';
				// echo strtoupper(Yii::app()->user->id.'</br>');
				// echo  Yii::app()->user->id .'</br>');
				echo Utility::getFullUser(strtoupper(Yii::app()->user->id)).'</br>';
			}
		?>

		IP: 
		
		<?php 

			$ipaddress = '';
			if (getenv('HTTP_CLIENT_IP'))
				$ipaddress = getenv('HTTP_CLIENT_IP');
			else if(getenv('HTTP_X_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
			else if(getenv('HTTP_X_FORWARDED'))
				$ipaddress = getenv('HTTP_X_FORWARDED');
			else if(getenv('HTTP_FORWARDED_FOR'))
				$ipaddress = getenv('HTTP_FORWARDED_FOR');
			else if(getenv('HTTP_FORWARDED'))
			   $ipaddress = getenv('HTTP_FORWARDED');
			else if(getenv('REMOTE_ADDR'))
				$ipaddress = getenv('REMOTE_ADDR');
			else
				$ipaddress = 'UNKNOWN';
			echo  $ipaddress.'</br>';
			
			if(!isset(Yii::app()->session['ip'])){
				Yii::app()->session['ip'] = $ipaddress;
				Yii::app()->session['mac'] = Utility::getMacClient($ipaddress);
				// Yii::app()->session['namePC'] = Utility::getNamePcClient();
			}
			 
			 
			$cek = AppDataPc::model()->findByAttributes(array('ip_pc'=>$ipaddress));
			if($cek == null){
				echo 'PC Belum Terdaftar';
			}
			echo '<input class="hidden" type="text" id="ip-connect" value="'.$ipaddress.'" url="'.Yii::app()->createUrl('app/monitoringpc/updatemonitoring').'">';
			

			
				
		?>
	</div>
</div>