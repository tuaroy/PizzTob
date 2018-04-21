<?php
	include_once('config/koneksi.php');
	
	$id_user = $_GET['id_user'];
	
	$sql = "SELECT * FROM user WHERE id=$id_user";
	$result = mysqli_query($database,$sql);
	$row = mysqli_fetch_assoc($result);
	$point = $row['point'];
	
	echo $point;
?>