<?php
	session_start();
	include_once('config/koneksi.php');
	include_once('functions/functions.php');
	
	//retrieve posted form data
	$id_user = $_SESSION['id_user'];
	
	$password	= $_POST['password'];
	$nama_lengkap	= $_POST['nama'];
	$email			= $_POST['email'];
	$alamat			= $_POST['alamat'];
	
	$sql = "UPDATE register SET password='$password',nama_lengkap='$nama_lengkap',email='$email',alamat='$alamat' WHERE id=$id_user";
	$result = mysqli_query($database,$sql);
	
	if($result) redirect('myaccount.php');
	else echo "Tidak bisa menggupdate";
?>