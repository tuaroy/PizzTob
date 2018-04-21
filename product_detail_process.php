<?php
	session_start();
	include_once('config/koneksi.php');
	
	$id = $_GET['id'];
	$jumlah = $_POST['jumlah'];
	$ukuran = $_POST['ukuran'];
	$id_user = $_SESSION['id_user'];
	
	$sql = "SELECT * FROM item WHERE id=".$id;
	$result = mysqli_query($database,$sql);
	$row = mysqli_fetch_assoc($result);
	
	$perBiji = $row["$ukuran"];
	$harga = $jumlah * $perBiji;
	
	$nama = $row['nama'];
	$gambar = $row['gambar'];
	$status = 'belum';
	
	// Masuk ke cart
	$query = "INSERT INTO cart VALUES ('','$id','$id_user','$nama','$gambar','$jumlah','$ukuran','$harga','$status')";
	$result1 = mysqli_query($database,$query);
	
	// Masuk ke total_harga
	$query1 = "SELECT * FROM total_harga WHERE id_user=$id_user and status='$status'";
	$result2 = mysqli_query($database,$query1);
	$row1 = mysqli_fetch_assoc($result2);

	// Harga setelah ditambah
	$hargaTambahan = $row1['harga'] + $harga;


	if(mysqli_num_rows($result2) == 0){
		$query2 = "INSERT INTO total_harga VALUES ('','$id_user','$harga','','$status')";
		$result3 = mysqli_query($database,$query2);
	}else{
		$query3 = "UPDATE total_harga SET harga=$hargaTambahan WHERE id_user=$id_user and status='$status'";
		$result4 = mysqli_query($database,$query3);
	}
	
	if($result1) {
		if(isset($_SESSION['is_logged_in'])){
                                    		header('location: cart.php');
                                    	}else{
                                    		"<script>alert('Silahkan Login Terlebih Dahulu');
      											window.location='index.php';
      											</script>";
                                    	}
	}
?>