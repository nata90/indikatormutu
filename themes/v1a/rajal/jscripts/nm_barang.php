﻿<?php

$q = strtolower( $_GET["q"] );
if (!$q) return;

include("../../include/connect.php");

// Replace "TABLE_NAME" below with the table you'd like to extract data from
$data = mysql_query( "SELECT nama_barang FROM m_barang WHERE group_barang=1 AND farmasi=1" )
or die( mysql_error() );

// Replace "COLUMN_ONE" below with the column you'd like to search through
// In between the if/then statement, you may present a string of text
// you'd like to appear in the textbox.
while( $row = mysql_fetch_array( $data )){
	if ( strpos( strtolower( $row['nama_barang'] ), $q ) !== false ) {
		echo $row['nama_barang']."\n";
		
	}
}

?>