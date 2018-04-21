<?php
	include_once('config/koneksi.php');
	
	$id = $_GET['id'];
	$jumlah = $_GET['jumlah'];
	$ukuran = $_GET['ukuran'];
	$id_user = $_GET['id_user'];
	
	$sql = "SELECT * FROM cart WHERE id=".$id;
	$result = mysqli_query($database,$sql);
	$row = mysqli_fetch_assoc($result);
	
	$id_product = $row['id_product'];
	
	$sql1 = "SELECT * FROM item WHERE id=".$id_product;
	$result1 = mysqli_query($database,$sql1);
	$row1 = mysqli_fetch_assoc($result1);
	
	$harga = $jumlah * $row1["$ukuran"];
	
	$update = "UPDATE cart SET harga='$harga', jumlah='$jumlah' WHERE id=".$id;
	$result2 = mysqli_query($database,$update);
	
	$hitung = "SELECT SUM(harga) FROM cart WHERE id_user=$id_user and status='belum'";
	$result3 = mysqli_query($database,$hitung);
	$row2 = mysqli_fetch_array($result3);
	$harga_total = $row2['0'];
	
	$sql2 = "UPDATE total_harga SET harga=$harga_total WHERE id_user=$id_user";
	$result4 = mysqli_query($database,$sql2);
	
	echo $harga;
?>