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
		echo '<div class="alert alert-danger"><strong>Error!</strong> Ada Kesalahan Sistem.</div>';
	}?>
	<?php if($this->session->flashdata('sukses')!=""){
		echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Berhasil Di Restore.</div>';
	}?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title"><i class="entypo-lock"></i><strong>UTILITY(DATABASE)</strong></div>
		</div>
		<div class="panel-body">
			<div class="row">
				<table width="928" border="0">
					<tr>
					  <td width="922"><legend>&nbsp;&nbsp;Backup Database</legend>
						 &nbsp;&nbsp;&nbsp;Klik pada tombol &quot;Backup&quot; Disamping Untuk Proses Back Up &nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('utility/backup');?>" class="btn btn-success"><i class="icon-refresh"></i> Backup</a> <br />
						  </br>
						  </br>
						  <legend></legend>
					</tr>
					<tr>
					  	<td height="200"><legend>&nbsp;&nbsp;Restore Database</legend>
						 	<form action="<?php echo site_url('utility/restore');?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
								<label class="col-md-3">&nbsp;&nbsp;&nbsp;Masukan Database My Sql</label>
								<div class="col-md-3">
									<input type="file" name="gambar" required="required" />
								</div>
								<button type="submit" class="btn btn-primary" onclick="return confirm('Anda Yakin..? Hati-Hati, Semua Data Akan Direstore...!!!');"><i class="icon-download-alt"></i> Restore</button>
								</br>
							</form>
						</td>
					</tr>
				  </table>
			</div>
		</div>
	</div>
</div>
	
<!-- 	 <script type="text/javascript">
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