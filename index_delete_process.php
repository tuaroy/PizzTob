<?php
	include_once 'config/koneksi.php';
	
	$id = $_GET['id'];

	$query = "SELECT * FROM item WHERE id='$id'";
	$hasil = mysqli_query($database,$query);
	$row = mysqli_fetch_assoc($hasil);

	$jenis = $row['jenis'];
	
	$sql = "DELETE FROM item WHERE id='$id'";
	
	$result = mysqli_query($database,$sql);
	
	if($result){
		if ($jenis=="pizza") {
			header('location:pizza.php');
		}
		elseif ($jenis=="minuman") {
			header('location:minuman.php');
		}
	}else{
		die("Cant delete");
	}
?>