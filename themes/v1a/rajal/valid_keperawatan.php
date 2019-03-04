<?php 
include("../include/connect.php");

$_POST['keluhan_utama'];

$_POST['Pernahdirawat'];
$_POST['diag_medis'];
$_POST['alergi'];
$_POST['riwayat_alergi'];
$_POST['riwayat_kejang'];
$_POST['RIWAYATIMUN_BCG'];
$_POST['RIWAYATIMUN_POLIO'];
$_POST['RIWAYATIMUN_HEPATITIS'];
$_POST['RIWAYATIMUN_CAMPAK'];
$_POST['RIWAYATIMUN_DPT'];
$_POST['RIWAYATIMUN_MMR'];

$_POST['PF_bb'];
$_POST['PF_tb'];

$_POST['PF_RR'];
$_POST['PF_Dyspnea'];
$_POST['PF_Tachipnea'];
$_POST['PF_Bradipnea'];

$_POST['PF_Sirkulasi_TD'];
$_POST['PF_Sirkulasi_HR'];
$_POST['PF_Sirkulasi_Sianosis'];
$_POST['PF_Sirkulasi_Akral'];
$_POST['PF_Akral'];

$_POST['PF_Kesadaran_Cm'];
$_POST['PF_Kesadaran_Apatis'];
$_POST['PF_Kesadaran_Somenolen'];
$_POST['PF_Kesadaran_Soporo'];
$_POST['PF_Kesadaran_Coma'];

$_POST['PF_Perkemihan_Normal'];
$_POST['PF_Perkemihan_Hematuria'];
$_POST['PF_Perkemihan_Retensi'];
$_POST['PF_Perkemihan_Disuria'];
$_POST['PF_Perkemihan_Oliguria'];
$_POST['PF_Perkemihan_Anuria'];

$_POST['PF_Pencernaan_Normal'];
$_POST['PF_Pencernaan_Mual'];
$_POST['PF_Pencernaan_Muntah'];
$_POST['PF_Pencernaan_Asites'];
$_POST['PF_Pencernaan_Malnutrisi'];
$_POST['PF_Pencernaan_Distensi'];
$_POST['PF_Pencernaan_Nyeri_Abdomen'];
$_POST['PF_Pencernaan_Diare'];

$_POST['PF_Ekstremitas_Normal'];
$_POST['PF_Ekstremitas_Paralise'];
$_POST['PF_Ekstremitas_Paraplegia'];
$_POST['PF_Ekstremitas_Hemiplegia'];
$_POST['PF_Ekstremitas_Kontraktur'];
$_POST['PF_Ekstremitas_Edema'];

$_POST['PF_Kulit_Normal'];
$_POST['PF_Kulit_Iceteric'];
$_POST['PF_Kulit_Turgor_Tidak_Elastis'];

$_POST['PF_MATA_Anemis'];
$_POST['PF_Mata_Iceteric'];
$_POST['PF_Mata_Visus'];
$_POST['PF_Mata_OD'];
$_POST['PF_Mata_OS'];

$_POST['PF_THT_OMP'];
$_POST['PF_THT_OMA'];
$_POST['PF_THT_Sinusitis'];
$_POST['PF_THT_Laringitis'];


$_POST['PF_GizidanMulut_Normal'];
$_POST['PF_GizidanMulut_Stomatis'];
$_POST['PF_GizidanMulut_Gingivitis'];
$_POST['PF_GizidanMulut_Caries'];

$_POST['lainlain'];
$_POST['Pemeriksaan_Penunjang'];

$_POST['Masalah_Keperawatan'];
$_POST['Penatalaksanaan_Medis'];

$_POST['Implementasi_Keperawatan'];

$_POST['Evaluasi'];;

//SET ('','TANGGAL','IDXDAFTAR','NOMR','KDPOLY','KELUHANUTAMA','PERNAHDIRAWAT','DIAGNOSAMEDIS','ALERGI','KETERANGANALERGI','RIWAYATKEJANG','RIWAYATIMUN_BCG  	','RIWAYATIMUN_POLIO','RIWAYATIMUN_HEPATITIS','RIWAYATIMUN_CAMPAK','RIWAYATIMUN_DPT','RIWAYATIMUN_MMR','PEMERIKSAAN_PENUNJANG','MASALAH_KEPERAWATAN','PENATALAKSANAAN_MEDIS','IMPLEMENTASI_KEPERAWATAN','EVALUASI','NIP') 

//input data ke tabel t_asuhankeperawatan
$t_asuhankeperawatan = 
"INSERT INTO t_asuhankeperawatan 
VALUES('','$_POST[txtTglReg]','$_POST[txtIdxDaftar]','$_POST[txtNoMR]','$_POST[txtKdPoly]','$_POST[keluhan_utama]','$_POST[Pernahdirawat]','$_POST[diag_medis]','$_POST[alergi]','$_POST[riwayat_alergi]',
'$_POST[riwayat_kejang]','$_POST[RIWAYATIMUN_BCG]','$_POST[RIWAYATIMUN_POLIO]','$_POST[RIWAYATIMUN_HEPATITIS]','$_POST[RIWAYATIMUN_CAMPAK]','$_POST[RIWAYATIMUN_DPT]','$_POST[RIWAYATIMUN_MMR]','$_POST[Pemeriksaan_Penunjang]','$_POST[Masalah_Keperawatan]','$_POST[Penatalaksanaan_Medis]','$_POST[Implementasi_Keperawatan]','$_POST[Evaluasi]','$_POST[txtNip]')";

if(mysql_query($t_asuhankeperawatan)){
//mengambil idxaskep dari tabel t_asuhankeperawatan
$sql_id="SELECT * FROM t_asuhankeperawatan WHERE TANGGAL='$_POST[txtTglReg]' AND NOMR = '$_POST[txtNoMR]'"; 
$qry_select = mysql_query($sql_id)or die(mysql_error());
$id = mysql_fetch_assoc($qry_select);

//SET ('IDXASKEP_FSK','IDXASKEP','PF_BB','PF_TB','PF_PERNAFASAN_RR','PF_DYSPNEA','PF_TACHIPNEA','PF_SIRKULASI_TD','PF_SIRKULASI_HR','PF_SIRKULASI_SIANOSIS','PF_SIRKULASI_AKRAL','PF_Akral','PF_KESADARAN_CM','PF_KESADARAN_APATIS','PF_KESADARAN_SOMNOLEN','PF_KESADARAN_SOPORO','PF_KESADARAN_COMA','PF_PERKEMIHAN_NORMAL','PF_PERKEMIHAN_HEMATURIA','PF_PERKEMIHAN_RETENSI','PF_PERKEMIHAN_DISURIA','PF_PERKEMIHAN_OLIGURIA','PF_PERKEMIHAN_ANURIA','PF_PENCERNAAN_NORMAL','PF_PENCERNAAN_MUAL','PF_PENCERNAAN_MUNTAH','PF_PENCERNAAN_ASISTES','PF_PENCERNAAN_MALNUTRISI','PF_PENCERNAAN_DISTENSI','PF_PENCERNAAN_ABDOMEN','PF_PENCERNAAN_DIARE','PF_EKSTREMITAS_NORMAL','PF_EKSTEMITAS_PARALISE','PF_EKSTREMITAS_PARAPLEGIA','PF_EKSTREMITAS_HEMIPLEGIA','PF_EKSTREMITAS_KONTRAKSTUR','PF_EKSTREMITAS_EDEMA','PF_KULIT_NORMAL','PF_KULIT_ICTERIC','PF_KULIT_TUGOR','PF_MATA_ANEMIS','PF_MATA_ICTERIC',PF_MATA_VISUS,'PF_MATA_VISUS_OD','PF_MATA_VISUS_OS','PF_THT_OMP','PF_THT_OMA','PF_THT_SINUSITIS','PF_THT_LARINGITIS','PF_GIGIMULUT_NORMAL','PF_GIGIMULUT_STOMATITIS','PF_GIGIMULUT_GINGIVITIS','PF_GIGIMULUT_CARIES','PF_GIGIMULUT_LAINLAIN')

$t_askep_fisik = "INSERT INTO t_askep_fisik
VALUES('','$id[IDXASKEP]','$_POST[PF_bb]','$_POST[PF_tb]','$_POST[PF_RR]','$_POST[PF_Dyspnea]','$_POST[PF_Tachipnea]','$_POST[PF_Bradipnea]','$_POST[PF_Sirkulasi_TD]','$_POST[PF_Sirkulasi_HR]','$_POST[PF_Sirkulasi_Sianosis]','$_POST[PF_Sirkulasi_Akral]','$_POST[PF_Akral]','$_POST[PF_Kesadaran_Cm]','$_POST[PF_Kesadaran_Apatis]','$_POST[PF_Kesadaran_Somenolen]','$_POST[PF_Kesadaran_Soporo]','$_POST[PF_Kesadaran_Coma]','$_POST[PF_Perkemihan_Normal]','$_POST[PF_Perkemihan_Hematuria]','$_POST[PF_Perkemihan_Retensi]','$_POST[PF_Perkemihan_Disuria]','$_POST[PF_Perkemihan_Oliguria]','$_POST[PF_Perkemihan_Anuria]','$_POST[PF_Pencernaan_Normal]','$_POST[PF_Pencernaan_Mual]','$_POST[PF_Pencernaan_Muntah]','$_POST[PF_Pencernaan_Asites]','$_POST[PF_Pencernaan_Malnutrisi]','$_POST[PF_Pencernaan_Distensi]','$_POST[PF_Pencernaan_Nyeri_Abdomen]','$_POST[PF_Pencernaan_Diare]','$_POST[PF_Ekstremitas_Normal]','$_POST[PF_Ekstremitas_Paralise]','$_POST[PF_Ekstremitas_Paraplegia]','$_POST[PF_Ekstremitas_Hemiplegia]','$_POST[PF_Ekstremitas_Kontraktur]','$_POST[PF_Ekstremitas_Edema]','$_POST[PF_Kulit_Normal]','$_POST[PF_Kulit_Iceteric]','$_POST[PF_Kulit_Turgor_Tidak_Elastis]','$_POST[PF_MATA_Anemis]','$_POST[PF_Mata_Iceteric]','$_POST[PF_Mata_Visus]','$_POST[PF_Mata_OD]','$_POST[PF_Mata_OS]','$_POST[PF_THT_OMP]','$_POST[PF_THT_OMA]','$_POST[PF_THT_Sinusitis]','$_POST[PF_THT_Laringitis]','$_POST[PF_GizidanMulut_Normal]','$_POST[PF_GizidanMulut_Stomatis]','$_POST[PF_GizidanMulut_Gingivitis]','$_POST[PF_GizidanMulut_Caries]','$_POST[lainlain]')";
mysql_query($t_askep_fisik)or die(mysql_error());
$psn="<strong>Input data Sukses</strong>";
}else{
$psn="<strong>Pasien dengan No MR : ".$_POST['txtNoMR']." Telah Melakukan Asuhan Keperawatan untuk Pendaftaran Ini.</strong>";
}
header("Location:../index.php?pesan=$psn&menu=6&link=51&nomr=".$_POST['txtNoMR']);
exit;

?>
</div>