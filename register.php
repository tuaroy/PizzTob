<?php
	include_once('config/koneksi.php');
	
	if(isset($_SESSION['is_logged_in'])){
		redirect('index.php');
	}
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
							<li><a href="#myModal4" data-toggle="modal" align="center">Login</a></li>
							<li><a href="register.php">Register</a></li>
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
						<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
                        <form action="register_process.php" method="post" class="form-stacked">
                        	<div align="center" style="margin-bottom:10px">
                                    <span style="margin-right:15px"><i class="fa fa-user fa-2x" aria-hidden="true"></i></span>
                                    <input class="span4" type="text" name = "username" placeholder="Username">
                            </div>
                            <div align="center" style="margin-bottom:10px">
                                    <span style="margin-right:10px"><i class="fa fa-check fa-2x" aria-hidden="true"></i></span>
                                    <input class="span4" type="password" name= "password" placeholder="Password">
                            </div>
                            <div align="center" style="margin-bottom:10px">
                                    <span style="margin-right:10px"><i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i></span>
                                    <input class="span4" type="text" name ="nama" placeholder="Nama Lengkap">
                            </div>
                            <div align="center" style="margin-bottom:10px">
                                    <span style="margin-right:10px"><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></span>
                                    <input class="span4" type="text" name="email" placeholder="Email">
                            </div>
                            <div align="center" style="margin-bottom:10px">
                                    <span style="margin-right:10px"><i class="fa fa-address-book fa-2x" aria-hidden="true"></i></span>
                                    <textarea class="span4" name="alamat" placeholder="Alamat"></textarea>
                            </div>
                            <div align="center">
                                    <button type="submit" class="btn btn-success">Register</button>
                            </div>
						</form>
				</div>

				<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" >
				<div class="modal-dialog" role="document">
					<div class="modal-content modal-info">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
						<div class="modal-body modal-spa">
							<div class="login-grids">
									
									<div class="login-right">
										<h3>Sign in with your account</h3>
										<form action="loginprocess.php" method="post">
											<div class="sign-in">
												<h4>Username :</h4>
												<input type="text" placeholder='Username' name="username" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" requiredstyle="color: black">	
											</div>
											<div class="sign-in">
												<h4>Password :</h4>
												<input type="password" placeholder='Password'name="password" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" requiredstyle="color: black">
											</div>

											<div class="sign-in">
												<button class="btn btn-success" type="submit">Login</button>
											</div>
											<h4>Belum punya akun? <a href="register.php"> Daftar Disini</a> </h4>											
										</form>
									</div>
									
								<p>By logging in you agree to our <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			</section>			
			<section id="copyright" class="text-center">
				<span>&copy Copyright @tua</span>
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