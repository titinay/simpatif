<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Neon Admin Panel" />
		<meta name="author" content="" />
		<title>Login SIMPATIF</title>
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/polinema.png');?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/font-icons/entypo/css/entypo.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-core.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-theme.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-forms.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/skins/facebook.css'); ?>">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
		
		<script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js'); ?>"></script>
		<script>$.noConflict();</script>
	</head>
	<body class="page-body skin-facebook">
	<div width="50" style="background-color:#385da4;"><marquee><h3><strong><i style="color:white;">SIMPATIF(SIsteM informasi Penggelolaan Arsip inakTIF)</i></strong></h3></marquee></div>
		<div class="page-container">
			<div class="main-content">
				<?php echo br(5); ?>
				<form action="<?php echo site_url('Login/signin'); ?>" method="post">
					<div class="row-fluid">
						<div class="col-md-6">
							<center>
								<img src="<?php echo base_url('assets/polinema.png'); ?>" width="200px" height="200px" alt="">
								<br><br>
								<h3><strong>SELAMAT DATANG DI <br>SISTEM INFORMASI PENGEOLAAN ARSIP INAKTIF,<br>
								SILAHKAN LOGIN UNTUK MELANJUTKAN</strong></h3>
							</center>
						</div>
						<div class="col-md-6">
							<?php if($this->session->flashdata('error')!=""){
								echo '<div class="alert alert-danger"><strong>Gagal!</strong> Username Atau Password Salah.</div>';
							}?>
							<div class="panel panel-info">
								<div class="panel-heading" style="background-color:#385da4;color:white;">
									<div class="panel-title"><i class="entypo-key"></i><strong>LOGIN</strong></div>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-2">
											<label class="label-control"><strong>Username</strong></label>
										</div>
										<div class="col-md-10">
											<input type="text" required autofocus class="form-control" autocomplete="off" placeholder="Masukkan Username" name="username"/>
										</div>
									</div>
									<br><br>
									<div class="row">
										<div class="col-md-2">
											<label class="label-control"><strong>Password</strong></label>
										</div>
										<div class="col-md-10">
											<input type="password" required class="form-control" autocomplete="off" name="password" placeholder="Masukkan Password" />
										</div>
									</div>
								</div>
								<?php echo br(3); ?>
								<div class="panel-footer" style="background-color:#707275">
									<center>
										<button type="reset" class="btn btn-success"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
										<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-ok-sign"></i> Login</button>
									</center>
								</div>
							</div>
						</div>
						
					</div>
				</form>
			</div>
		</div>
	</body>
</html>