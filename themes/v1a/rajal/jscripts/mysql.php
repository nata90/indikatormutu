﻿<?php

$q = strtolower( $_GET["q"] );
if (!$q) return;

include("../../include/connect.php");

// Replace "TABLE_NAME" below with the table you'd like to extract data from
$data = mysql_query( "SELECT icd_code,jenis_penyakit FROM icd" )
or die( mysql_error() );

// Replace "COLUMN_ONE" below with the column you'd like to search through
// In between the if/then statement, you may present a string of text
// you'd like to appear in the textbox.
while( $row = mysql_fetch_array( $data )){
	if ( strpos( strtolower( $row['icd_code'] ), $q ) !== false ) {
		echo $row['icd_code']."++".$row['jenis_penyakit']."\n";
		
	}
}

?>