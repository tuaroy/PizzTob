<?php
	session_start();
	include('config/koneksi.php');
	
	$id = $_GET['id'];
	$id_user = $_SESSION['id_user'];
	
	$sql = "SELECT * FROM cart WHERE id=$id";
	$result = mysqli_query($database,$sql);
	$row = mysqli_fetch_assoc($result);
	$harga = $row['harga'];
	
	$sql1 = "SELECT * FROM total_harga WHERE id_user=$id_user";
	$result1 = mysqli_query($database,$sql1);
	$row1 = mysqli_fetch_assoc($result1);
	$hargaTotal = $row1['harga'];
	
	$sql2 = "DELETE FROM cart WHERE id=$id";
	$result2 = mysqli_query($database,$sql2);
	
	$hargaKeseluruhan = $hargaTotal - $harga;
	
	$sql3 = "UPDATE total_harga SET harga=$hargaKeseluruhan";
	$result3 = mysqli_query($database,$sql3);
	
	if($result1 && $result2 && $result3) header('location: cart.php');
?>