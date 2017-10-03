<ol class="breadcrumb" >
	<li>
		<a href="<?php echo base_url(); ?>"><i class="fa-home"></i>Admin</a>
	</li>
	<li class="active">
		<a href="#">Edit Admin</a>
	</li>
</ol>
<div class="col-md-10">
<?php if($this->session->flashdata('sukses')!=""){
	echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Berhasil Diinputkan.</div>';
}?>
<?php if($this->session->flashdata('suksesedit')!=""){
	echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Berhasil Diedit.</div>';
}?>
<?php if($this->session->flashdata('sukseshapus')!=""){
	echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Berhasil Dihapus.</div>';
}?>
<?php if($this->session->flashdata('error')!=""){
	echo '<div class="alert alert-danger"><strong>Error!</strong> Data Gagal Diinputkan Username Sudah Digunakan.</div>';
}?>
<?php if($this->session->flashdata('erroredit')!=""){
	echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Gagal Diedit.</div>';
}?>
<?php if($this->session->flashdata('errorhapus')!=""){
	echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Gagal Dihapus.</div>';
}?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title"><i class="entypo-mail"></i><strong>Edit Admin</strong></div>
		</div>
		<form action="<?php echo site_url('Admin/update_proses/'.$cekid['id_admin']); ?>" method="post">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>ID Admin</strong></label>
					</div>
					<div class="col-md-8">
						<input type="text" required disabled class="form-control" autocomplete="off" name="id_admin" value="<?php echo $cekid['id_admin'];?>" />
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Nama Admin</strong></label>
					</div>
					<div class="col-md-8">
						<input type="text" required class="form-control" autocomplete="off" name="nama_admin" value="<?php echo $cekid['nama_admin'];?>" />
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-ok-sign"></i> Simpan</button>
			</div>
		</div>
	</form>
</div>