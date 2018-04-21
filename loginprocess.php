<?php 
session_start();
include_once('functions/functions.php');
include_once('config/koneksi.php');
if(isset($_SESSION['is_logged_in']))
{
	redirect('index.php');
}

$username = $_POST['username'];
$password =$_POST['password'];


$query = 'SELECT * FROM register WHERE username=? and password = ?';

$statement = $database->prepare($query);

$statement -> bind_param('ss',$username,$password);
$statement -> execute();

$result_set = $statement ->get_result();
if ($result_set->num_rows) {
if(mysqli_num_rows($result_set) != 1){
      echo "<script>alert(' Wrong Username or Password Access Denied !!! Try Again');
      window.location='index.php';
      </script>";
     }else{
      $row = mysqli_fetch_assoc($result_set); 
      $id = $row['username'];
      if($row['level'] == "admin"){
        $_SESSION['is_logged_in']= true;
        $_SESSION['role']= $row['level'];
        redirect ('pizza.php?username='.$id);  
      }
      else if($row['level'] == "user")
      {
      	$_SESSION['is_logged_in'] = true;
        $_SESSION['role'] = $row['level'];
        $_SESSION['id_user'] = $row['id'];
      	redirect('index.php?username='.$id);
      }
     }
}
else
{
	echo "<script>alert(' Wrong Username or Password Access Denied !!! Try Again');
      window.location='index.php';
      </script>";
}
 ?>


