<?php
	include_once('config/koneksi.php');
	$id_user = $_GET['id_user'];
	$sql = "SELECT * FROM total_harga WHERE id_user=$id_user";
	$result = mysqli_query($database,$sql);
	$row = mysqli_fetch_assoc($result);
	
	$harga_total = $row['harga'];
	
	echo $harga_total;
?>