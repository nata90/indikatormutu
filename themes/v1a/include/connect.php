<?php 
ini_set('display_errors',0);	
ini_set('memory_limit' , '128M');
$hostname = 'localhost';
$database = 'simrs2012';
$username = 'root';
$password = '';
$connect = mysql_connect($hostname, $username, $password,true,65536) or die(mysql_error()); 
mysql_select_db($database,$connect)or die(mysql_error());
define ('_BASE_','http://'.$_SERVER['HTTP_HOST'].'/simrs/');
define ('_POPUPTIME_','50000');

$rstitle = 'sistem informasi manajemen rumah sakit';
$singrstitl = 'SIMRS Open Source';
$singhead1 = 'ditjen buk';
$singsurat = 'SIMRSDITJENBUK';
$header1 = 'direktorat jenderal bina upaya kesehatan';
$header2 = 'sistem informasi manajemen rumah sakit';
$header3 = '';
$header4 = '';
$KDRS = '1234567';
$KelasRS = 'A';
$NamaRS = 'RS NCC';
$KDTarifINACBG = 'A/ I / RSU';