<?php
	session_start();
	include_once('config/koneksi.php');

	$id_user = $_SESSION['id_user'];

	$harga = $_POST['harga'];
	$point = $_POST['pointBayar'];
	
	$data['api_key'] = '4492ef279aadd7f2d823b4f9cd8d853417a4c29fedb9ddf3c62438c32087da56';
	$data['receiver_no'] = '0812603601';
	$data['amount'] = $harga;
	$data['code'] = uniqid("PIZZTOB--");
	$json_encode = json_encode($data);
	
	$sql = "SELECT * FROM register WHERE id=$id_user";
	$result = mysqli_query($database,$sql);
	$row = mysqli_fetch_assoc($result);

	if($point > 0){
    	$jumlahPoint = $row['point'] - $point;
      	echo $jumlahPoint;
      	
      	$sql1 = "UPDATE register SET point=$jumlahPoint WHERE id=$id_user";
      	$result1 = mysqli_query($database,$sql1);
        
    }
	$url = 'https://sigurita.com/sikilat/account/payment?data='.$json_encode;
	/*
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	*/
	header("location:$url");
?>