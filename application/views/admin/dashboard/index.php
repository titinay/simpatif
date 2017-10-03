<ol class="breadcrumb" >
	<li>
		<a href="<?php echo base_url(); ?>"><i class="fa-home"></i>Arsip</a>
	</li>
	<li class="active">
		<a href="#">Dashboard</a>
	</li>
</ol>
<br />
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="panel-title"><i class="entypo-gauge"></i><strong>Dashboard</strong></div>
	</div>
	<div class="panel-body">
		<div class="col-md-6">
			<div class="tile-stats tile-neon-red">
				<div class="icon"><i class="entypo-chat"></i></div>
				<div class="num" data-start="0" data-end="<?php echo $this->db->query('SELECT * FROM box')->num_rows(); ?>" data-postfix="" data-duration="1400" data-delay="4">0</div>
				
				<h3>BOX</h3>
			</div>
		</div>
		<div class="col-md-6">
			<div class="tile-stats tile-primary">
				<div class="icon"><i class="entypo-chat"></i></div>
				<div class="num" data-start="0" data-end="<?php echo $this->db->query('SELECT * FROM berkas')->num_rows(); ?>" data-postfix="" data-duration="1400" data-delay="4">0</div>
				
				<h3>ARSIP INAKTIF</h3>
			</div>
		</div>
	</div>
</div>	