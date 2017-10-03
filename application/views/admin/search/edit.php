<ol class="breadcrumb" >
	<li>
		<a href="<?php echo base_url(); ?>"><i class="fa-home"></i>Arsip</a>
	</li>
	<li>
		<a href="<?php echo site_url('Search'); ?>"><i class="fa-home"></i>Searching</a>
	</li>
	<li class="active">
		<a href="#">Edit</a>
	</li>
</ol>
<div class="col-md-10">

	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title"><i class="entypo-mail"></i><strong>Edit Berkas</strong></div>
		</div>
		<form action="<?php echo site_url('Search/update_proses/'.$cekid['no_berkas']); ?>" method="post" enctype="multipart/form-data">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>No Berkas</strong></label>
					</div>
					<div class="col-md-8">
						<input type="text" readonly required class="form-control" autocomplete="off" name="no_berkas" data-validate="required" data-message-required="ID Belum Diisi." value="<?php echo $cekid['no_berkas']?>" />
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>No Boxs</strong></label>
					</div>
					<div class="col-md-8">
						<select name="no_box" class="form-control" >
							<?php $no=0; foreach($data_box as $row): $no++; ?>
							<option value="<?php echo $row->id_box; ?>" <?php if($row->id_box==$cekid['no_box']){echo "selected";} ?>><?php echo $row->nama_box; ?></option>
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
						<input type="text" required class="form-control" autocomplete="off" data-message-required="Kode Klasifikasi Belum Diisi." name="kode_klasifikasi" data-validate="required" value="<?php echo $cekid['kode_klasifikasi']?>" />
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Indeks</strong></label>
					</div>
					<div class="col-md-8">
						<input type="text" required class="form-control" onkeyup="allcase(this)" autocomplete="off" data-message-required="Indeks Belum Diisi." name="indeks" data-validate="required" value="<?php echo $cekid['indeks']?>" />
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Uraian</strong></label>
					</div>
					<div class="col-md-8">
						<textarea required class="form-control" onkeyup="allcase(this)" autocomplete="off" data-message-required="Uraian Belum Diisi." name="uraian" data-validate="required" value="<?php echo $cekid['uraian']?>"><?php echo $cekid['uraian']?></textarea>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Tahun</strong></label>
					</div>
					<div class="col-md-8">
						<input type="text" required autocomplete="off" onkeypress='return isNumberKeyTrue(event)' class="form-control" data-message-required="Tahun Belum Diisi." data-message-number="Tipe Data Angka." name="tahun" data-validate="required,number" value="<?php echo $cekid['tahun']?>" />
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Volume</strong></label>
					</div>
					<div class="col-md-8">
						<input type="text" onkeypress='return isNumberKeyTrue(event)' autocomplete="off" required class="form-control" name="volume" data-validate="number" data-message-number="Tipe Data Angka." value="<?php echo $cekid['volume']?>" />
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Keterangan</strong></label>
					</div>
					<div class="col-md-8">
						<textarea required class="form-control" onkeyup="allcase(this)" autocomplete="off" data-message-required="Keterangan Belum Diisi." name="keterangan" data-validate="required" value="<?php echo $cekid['ket'];?>"><?php echo $cekid['ket'];?></textarea>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-2">
						<label class="label-control"><strong>Upload File</strong></label>
					</div>
					<div class="col-md-8">
						<input type="file" name="file">
						<input type="hidden" name="file_lama" value="<?php echo $cekid['file']; ?>">
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-ok-sign"></i> Edit</button>
			</div>
		</div>
	</form>
</div>