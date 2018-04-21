<?php
	include_once('config/koneksi.php');
	
	$jenis = $_POST['jenis'];
	$nama = $_POST['nama'];
	$keterangan = $_POST['keterangan'];
	$deskripsi = $_POST['deskripsi'];
	$small = $_POST['small'];
	$medium = $_POST['medium'];
	$large = $_POST['large'];
	$img = $_FILES["file"]["name"];
	$point = $_POST['point'];
	
	if($jenis == pizza){
		move_uploaded_file($_FILES["file"]["tmp_name"], "item/pizza/".$img);
		$dir = "item/pizza/".$img;
	}else{
		move_uploaded_file($_FILES["file"]["tmp_name"], "item/minuman/".$img);
		$dir = "item/minuman/".$img;
	}
	
	$query = "INSERT INTO item VALUES ('','$jenis','$nama','$keterangan','$deskripsi','$small','$medium','$large','$dir','$point')";
	$result = mysqli_query($database,$query);
	
	if($result){
		header('location:index.php');
	}
?>