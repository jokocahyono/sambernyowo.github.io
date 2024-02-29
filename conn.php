<?php

$db_host = "20.1.5.24";
$db_user = "nemesis";
$db_pass = "123456";
$db_name = "laboratorium";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}   
?>