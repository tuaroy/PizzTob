<?php  
	session_start();
	include_once('config/koneksi.php');
	include_once('functions/functions.php');

	//retrieve posted form data
	$username	= $_POST['username'];
	$password	= md5($_POST['password']);
	$nama_lengkap	= $_POST['nama'];
	$email			= $_POST['email'];
	$alamat			= $_POST['alamat'];
	
	$query = "INSERT INTO register VALUES ('','$username','$password','$nama_lengkap','$email','$alamat','user','10')";
	
		$sql_u = "SELECT * FROM register WHERE username='$username'";
		$sql_e = "SELECT * FROM register WHERE email='$email'";
		$res_u = mysqli_query($database, $sql_u);
		$res_e = mysqli_query($database, $sql_e);

		if (mysqli_num_rows($res_u) > 0) {
			echo "<script>window.alert('Sorry... username already taken') 
			window.location='register.php'</script>"; 	
		}else if(mysqli_num_rows($res_e) > 0){
			echo "<script>window.alert('Sorry... email already taken') 
			window.location='register.php'</script>"; 	
		}else{
			$password	= md5($_POST['password']);
			$results = mysqli_query($database,$query);
			
			$results1 = mysqli_query($database,$sql_u);
			$row = mysqli_fetch_assoc($results1);
			
			$_SESSION['is_logged_in'] = true;
			$_SESSION['role'] = 'user';
			$_SESSION['id_user'] = $row['id'];
			redirect('index.php');
		}
?>