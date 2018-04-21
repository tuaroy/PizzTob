<?php
	include_once('config/koneksi.php');
	
	$data = $_GET['data'];
	
	$json_decode = json_decode($data,true);
	
	$code = $json_decode['code'];
	$sender_no = $json_decode['sender_no'];
	$receiver_no = $json_decode['receiver_no'];
	$amount = $json_decode['amount'];
	$status_code = $json_decode['status_code'];
	$time = $json_decode['time'];
	
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
        <style>
			table td{
				font-size:15px;
			}
		</style>
	</head>
    <body>		
		<div id="top-bar" class="container">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="#">My Account</a></li>
							<li><a href="cart.php">Your Cart</a></li>
							<li><a href="checkout.php">Checkout</a></li>			<li><a href="#myModal4" data-toggle="modal" align="center">Login</a></li>
							<li><a href="checkout.php">Register</a></li>		
						</ul>
					</div>
		</div>
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left"><img src="themes/images//logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="./products.php">Pizza</a>					
							</li>													
							<li><a href="./products.php">Minuman</a>
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
						<h4 class="title"><span class="text"><strong>Konfirmasi</strong></span></h4>
                        <div class="center">
                        <table class="table table-striped span5">
                        	<tr>
                            	<td>Code</td>
                                <td>:</td>
                                <td><?php echo $code; ?></td>
                            </tr>
                            <tr>
                            	<td>Penerima</td>
                                <td>:</td>
                                <td>Suci Lestari</td>
                            </tr>
                            <tr>
                            	<td>Dari Rekening</td>
                                <td>:</td>
                                <td><?php echo $sender_no; ?></td>
                            </tr>
                            <tr>
                            	<td>Ke Penerima</td>
                                <td>:</td>
                                <td><?php echo $receiver_no; ?></td>
                            </tr>
                            <tr>
                            	<td>Sejumlah</td>
                                <td>:</td>
                                <td><?php echo $amount; ?></td>
                            </tr>
                            <tr>
                            	<td>Status</td>
                                <td>:</td>
                                <td><?php echo $status_code; ?></td>
                            </tr>
                            <tr>
                            	<td>Waktu</td>
                                <td>:</td>
                                <td><?php echo $time; ?></td>
                            </tr>
                        </table>
                        <div class="span6">
                        	<h4>Status</h4>
                            <div class="alert alert-success">
                                 <strong>Success!</strong> Pembelian Berhasil.
                            </div>
                            <?php
							if($code == 100){
								echo '<div class="alert alert-success">
                                 <strong>Success!</strong> Pembelian Berhasil.
                            </div>';
							}elseif($code == 013){
								echo '<div class="alert alert-info">
                                <strong>Info!</strong> Saldo anda tidak mencukupi.
                            </div>';
							}elseif($code == 011){
								echo '<div class="alert alert-danger">
                                <strong>Danger!</strong> Waduh bahaya.
                            </div>';
							}
							?>                                
                            
                        </div>
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