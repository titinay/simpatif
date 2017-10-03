<ol class="breadcrumb" >
	<li>
		<a href="<?php echo base_url(); ?>"><i class="fa-home"></i>Arsip</a>
	</li>
	<li class="active">
		<a href="#">Export Excel</a>
	</li>
</ol>
<div class="col-md-12">
	<?php if($this->session->flashdata('error')!=""){
		echo '<div class="alert alert-danger"><strong>Error!</strong> Tahun Pilihan Pertama Lebih Besar Dari Tahun Pilihan Ke Dua.</div>';
	}?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title"><i class="entypo-export"></i><strong>EXPORT</strong></div>
		</div>
		<div class="panel-body">
		<form action="<?php echo site_url('cetak/ekspor'); ?>" method="post">
				<div class="row">
					<div class="col-md-1">
						<label class="label-control"><strong>Tahun-Ke Satu</strong></label>
					</div>
					<div class="col-md-3">
						<select name="tahun1" class="form-control">
							<option value=""></option>
							<?php for($i=date('Y')-50; $i<date('Y')+3; $i++){
								echo "<option value='".$i."'>".$i."</option>";
							} ?>
						</select>
					</div>
					<div class="col-md-1">
						<label class="label-control"><strong>Tahun-Ke Dua</strong></label>
					</div>
					<div class="col-md-3">
						<select name="tahun2" class="form-control">
							<option value=""></option>
							<?php for($i=date('Y')-50; $i<date('Y')+3; $i++){
								echo "<option value='".$i."'>".$i."</option>";
							} ?>
						</select>
					</div>
					<div class="col-md-1">
						<label class="label-control"><strong>Format</strong></label>
					</div>
					<div class="col-md-1">
						<select name="format" required class="form-control">
							<option value="1">(doc)</option>
							<option value="2">(xls)</option>
						</select>
					</div>
					<div class="col-md-2">
						<button type="submit" class="btn btn-md btn-success"><span class="glyphicon glyphicon-export"></span> Export</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
	
<!-- 	// <script type="text/javascript">
	// 	jQuery(document).ready(function($)
	// 	{
	// 		var table = $("#table-3").dataTable({
	// 			"sPaginationType": "bootstrap",
	// 			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	// 			"bStateSave": true
	// 		});
			
	// 		table.columnFilter({
	// 			"sPlaceHolder" : "head:after"
	// 		});
	// 	});
	// </script> -->