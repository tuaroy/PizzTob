<?php
	session_start();
	include_once('config/koneksi.php');
	include_once('functions/functions.php');
	
	if(!isset($_SESSION['is_logged_in'])){
		redirect('index.php');
	}
	
	$id_user = $_SESSION['id_user'];
	
	$sql = "SELECT * FROM register WHERE id=$id_user";
	$result = mysqli_query($database,$sql);
	$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Pizza Tobasa</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
        <link href="font-awesome-4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="bootstrap/css/style.css" rel="stylesheet" type="text/css" media="all" />
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="myaccount.php">Akun</a></li>
							<li><a href="cart.php">Keranjang</a></li>
							<li><a href="pembayaran.php">Pembayaran</a></li>
							<li><a href="logout_process.php">Logout</a></li>	
						</ul>
					</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left"><img src="themes/images//logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="pizza.php">Pizza</a>					
							</li>													
							<li><a href="minuman.php">Minuman</a>
							</li>	
						</ul>
					</nav>
				</div>
			</section>			
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
			</section>			
			<section class="main-content">				
				<div class="row" align="center">			
						<h4 class="title"><span class="text"><strong>Akun</strong> Saya</span></h4>
                        <label>* data bisa diubah</label>
                        <form action="myaccount_process.php" method="post" class="form-stacked">
                        	<div align="center" style="margin-bottom:10px">
                                    <span style="margin-right:15px"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
                                    <input class="span4" type="text" name = "username" placeholder="Username" value="<?php echo $data['username'] ?>" disabled>
                            </div>
                            <div align="center" style="margin-bottom:10px">
                                    <span style="margin-right:10px"><i class="fa fa-check fa-2x" aria-hidden="true"></i></span>
                                    <input class="span4" type="password" name= "password" placeholder="Password" value="<?php echo $data['password'] ?>">
                            </div>
                            <div align="center" style="margin-bottom:10px">
                                    <span style="margin-right:10px"><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i></span>
                                    <input class="span4" type="text" name ="nama" placeholder="Nama Lengkap" value="<?php echo $data['nama_lengkap'] ?>">
                            </div>
                            <div align="center" style="margin-bottom:10px">
                                    <span style="margin-right:10px"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></span>
                                    <input class="span4" type="text" name="email" placeholder="Email" value="<?php echo $data['email'] ?>">
                            </div>
                            <div align="center" style="margin-bottom:10px">
                                    <span style="margin-right:10px"><i class="fa fa-address-book fa-2x" aria-hidden="true"></i></span>
                                    <textarea class="span4" name="alamat" placeholder="Alamat"><?php echo $data['alamat'] ?></textarea>
                            </div>
                            <div align="center">
                                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                            </div>
						</form>
				</div>
			</section>			
			<section id="copyright" class="text-center">
				<span>&copy Copyright 2018 Pizza Toba</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.php";
				})
			});
		
		</script>		
    </body>
</html>