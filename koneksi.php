<?php 
$koneksi = mysqli_connect("20.1.5.24","userserver","123456","laboratorium");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>
