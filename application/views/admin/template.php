<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="description" content="Neon Admin Panel" />
		<meta name="author" content="" />
		<title><?php echo $title; ?></title>
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/polinema.png');?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/font-icons/entypo/css/entypo.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-core.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-theme.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/neon-forms.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/css/skins/black.css'); ?>">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
		<script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js'); ?>"></script>
		<script>$.noConflict();</script>
	</head>
	<body class="page-body skin-black">
		<div class="page-container">
			<?php include $menu; ?>
			<div class="main-content">
						
				<div class="row">
					<div class="col-md-9 col-sm-2 clearfix">
						<h3><strong><i>SIMPATIF(SIsteM informasi Penggelolaan Arsip inakTIF)</i></strong></h3>
					</div>
					<div class="col-md-3 clearfix hidden-xs">
						<ul class="list-inline links-list pull-right">
							<li class="sep"></li>
							<li>Selamat Datang! "<strong><?php $user=$this->session->userdata('usernamee');
								$q=$this->db->query("SELECT * FROM admin, akses WHERE username='$user' and admin.akses = akses.id_akses")->row_array();
								echo $q['nama_admin'];
							 ?></strong>" Sebagai "<strong><?php echo $q['nama_akses'] ?></strong>"
							 </li>
							<li>
								<a onclick="return confirm('Apakah Anda Yakin Ingin Keluar');" href="<?php echo site_url('welcome/logout'); ?>">
									<strong>Log Out</strong> <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<hr />
				<?php include $content; ?>
			</div>
		</div>
		<script type="application/javascript">
		  function isNumberKeyTrue(evt)
			  {
				 var charCode = (evt.which) ? evt.which : event.keyCode
				 if (charCode > 65)
					return false;         
				 return true;
			  }
		</script>
		
		<script src="<?php echo base_url('assets/js/gsap/main-gsap.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/joinable.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/resizeable.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/neon-api.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/neon-chat.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/neon-custom.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/neon-demo.js'); ?>"></script>
		<!-- Imported styles on this page -->
		<link rel="stylesheet" href="<?php echo base_url('assets/js/datatables/responsive/css/datatables.responsive.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/js/select2/select2-bootstrap.css'); ?>">
		<link rel="stylesheet" href="<?php echo base_url('assets/js/select2/select2.css'); ?>">
		<!-- Bottom scripts (common) -->
		<script src="<?php echo base_url('assets/js/gsap/main-gsap.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/joinable.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/resizeable.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/neon-api.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/datatables/TableTools.min.js'); ?>"></script>
		<!-- Imported scripts on this page -->
		<script src="<?php echo base_url('assets/js/dataTables.bootstrap.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/datatables/jquery.dataTables.columnFilter.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/datatables/lodash.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/datatables/responsive/js/datatables.responsive.js'); ?>"></script>
		<script src="<?php echo base_url('assets/js/select2/select2.min.js'); ?>"></script>
	</body>
</html>