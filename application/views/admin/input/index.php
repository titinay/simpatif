<ol class="breadcrumb" >
	<li>
		<a href="<?php echo base_url(); ?>"><i class="fa-home"></i>Arsip</a>
	</li>
	<li class="active">
		<a href="#">Input Berkas</a>
	</li>
</ol>
<div class="col-md-10">
<?php if($this->session->flashdata('sukses')!=""){
	echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Berhasil Diinputkan.</div>';
}?>
<?php if($this->session->flashdata('sukses_import')!=""){
	echo '<div class="alert alert-success"><strong>Sukses!</strong> Data Berhasil Diimport.</div>';
}?>
<?php if($this->session->flashdata('error')!=""){
	echo '<div class="alert alert-danger"><strong>Error!</strong> Data Gagal Diinputkan.</div>';
}?>
<?php if($this->session->flashdata('errorid')!=""){
	echo '<div class="alert alert-danger"><strong>Error!</strong> No Berkas Sudah Digunakan.</div>';
}?>
<?php if($this->session->flashdata('error_import')!=""){
	echo '<div class="alert alert-danger"><strong>Error!</strong> Data Gagal Diimport.</div>';
}?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title"><i class="entypo-mail"></i><strong>Input Berkas</strong></div>
		</div>
		<form action="<?php echo site_url('input/add'); ?>" method="post" enctype="multipart/form-data">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>No Berkas</strong></label>
					</div>
					<div class="col-md-8">
						<input type="text" required class="form-control" autocomplete="off" name="no_berkas" data-validate="required" data-message-required="ID Belum Diisi." placeholder="Masukkan No Berkas" />
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>No Boxs</strong></label>
					</div>
					<div class="col-md-8">
						<select name="no_box" class="form-control">
							<?php $no=0; foreach($data_box as $row): $no++; ?>
							<option value="<?php echo $row->id_box;  ?>"><?php echo $row->nama_box; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Kode Klasifikasi</strong></label>
					</div>
					<div class="col-md-8">
						<input type="text" required class="form-control" autocomplete="off" data-message-required="Kode Klasifikasi Belum Diisi." name="kode_klasifikasi" data-validate="required" placeholder="Masukkan Kode Klasifikasi" />
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Indeks</strong></label>
					</div>
					<div class="col-md-8">
						<input type="text" required class="form-control" onkeyup="allcase(this)" autocomplete="off" data-message-required="Indeks Belum Diisi." name="indeks" data-validate="required" placeholder="Masukkan Indeks" />
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Uraian</strong></label>
					</div>
					<div class="col-md-8">
						<textarea required class="form-control" onkeyup="allcase(this)" autocomplete="off" data-message-required="Uraian Belum Diisi." name="uraian" data-validate="required" placeholder="Masukkan Uraian"></textarea>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Tahun</strong></label>
					</div>
					<div class="col-md-8">
						<input type="text" required autocomplete="off" onkeypress='return isNumberKeyTrue(event)' class="form-control" data-message-required="Tahun Belum Diisi." data-message-number="Tipe Data Angka." name="tahun" data-validate="required,number" placeholder="Masukkan Tahun" />
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Volume</strong></label>
					</div>
					<div class="col-md-8">
						<input type="text" onkeypress='return isNumberKeyTrue(event)' autocomplete="off" required class="form-control" name="volume" data-validate="number" data-message-number="Tipe Data Angka." placeholder="Masukkan Volume" />
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Keterangan</strong></label>
					</div>
					<div class="col-md-8">
						<textarea required class="form-control" onkeyup="allcase(this)" autocomplete="off" data-message-required="Keterangan Belum Diisi." name="keterangan" data-validate="required" placeholder="Masukkan Keterangan"></textarea>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Upload File</strong></label>
					</div>
					<div class="col-md-8">
						<input type="file" name="file">
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-ok-sign"></i> Simpan</button>
			</div>
		</div>
	</form>
</div>
<div class="modal fade" id="modal-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><strong>Import File Excel</strong></h4>
			</div>
			<form role="form" action="<?php echo site_url('Input/import'); ?>" enctype="multipart/form-data" id="form1" method="post" class="validate">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<center>
									<br></br>
									<input type="file" name="import" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Klik Untuk Menambahkan File Excel" />
								</center>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-import"></i>Import</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/fileinput.js'); ?>"></script>