<?php 
 include("../../include/connect.php");
 include("../inc/function.php");
 
 $ip = getRealIpAddr();
 $sql2="SELECT tmp_cartorderlab.KODEJASA,
  			m_lab.nama_jasa,
  			tmp_cartorderlab.QTY,
			tmp_cartorderlab.IDXORDERLAB
		FROM
  			tmp_cartorderlab
  		INNER JOIN m_lab ON (tmp_cartorderlab.KODEJASA = m_lab.kode_jasa) WHERE tmp_cartorderlab.IP = '$ip'";
 				 
		$nomr = $_POST['txtNoMR'];
		$idxdaftar = $_POST['txtIdxDaftar'];
		$kddokter = $_POST['txtKdDokter'];
		$tglreg = $_POST['txtTglReg'];
		$kdpoly = $_POST['txtKdPoly'];
  
		$sql="SELECT kode_jasa FROM m_lab WHERE group_jasa <> '0101' ORDER BY kode_jasa";
		$row = mysql_query($sql)or die(mysql_error());
  
        mysql_query("DELETE FROM tmp_cartorderlab WHERE IP = '$ip'")or die(mysql_error());
  
        while($data = mysql_fetch_array($row)){
	     if(!empty($_POST[$data['kode_jasa']])){
		    $kode_jasa = $data['kode_jasa'];
			
				@mysql_query("INSERT INTO tmp_cartorderlab(KODEJASA, QTY, IP) VALUES ('$kode_jasa', 1, '$ip')");
					    
		  }
        }

 
 

$row2 = mysql_query($sql2)or die(mysql_error());
if(mysql_num_rows($row2) > 0){ ?>
<div style="border:1px solid #DF7; padding:5px; margin:5px; color:#093; width:95%; background-color:#FFF;" align="left">
<form name="formsavelab" id="formsavelab" method="post" action="rajal/lab/saveorderlab.php">
<table class="tb" width="50%" >
<tr>
<th width="8%">No</th><th>Nama Pemeriksaan Lab</th>
</tr>
<?php
				  $i = 1;
				  while($data2 = mysql_fetch_array($row2)){
				  echo "<tr>";
				  	echo "<td>".$i."</td>";
					echo "<td>".$data2['nama_jasa']."</td>";
					echo "<tr>";
				  $i = $i + 1;
				  }
?>
 </table>
 <br />
 <table>
 <tr><td><input type="submit" class="text" value="S i m p a n" submit="submitform (document.getElementById('formsavelab'),'rajal/lab/saveorderlab.php','validlab',validatetask);return false;" />
 </td></tr>
 </table>
 <input name="txtNoMR" id="txtNoMR" type="hidden" value=<?php echo $nomr; ?> >
 <input name="txtIdxDaftar" id="txtIdxDaftar" type="hidden" value=<?php echo $idxdaftar; ?> >
 <input name="txtKdDokter" id="txtKdDokter" type="hidden" value=<?php echo $kddokter; ?> >
 <input name="txtTglReg" id="txtTglReg" type="hidden" value=<?php echo $tglreg; ?> >
 <input name="txtKdPoly" id="txtKdPoly" type="hidden" value=<?php echo $kdpoly; ?> >
 </form>
</div>
<? } ?>