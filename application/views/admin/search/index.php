<ol class="breadcrumb" >
	<li>
		<a href="<?php echo base_url(); ?>"><i class="fa-home"></i>Arsip</a>
	</li>
	<li class="active">
		<a href="#">Searching</a>
	</li>
</ol>
<div class="col-md-12">
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
		<div class="panel-heading ">
			<div class="panel-title"><i class="entypo-search"></i><strong>Searching Berkas</strong></div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered datatable" id="table-3">
				<thead>
					<tr class="replace-inputs">
						<th>No Berkas</th>
						<th>No Boxs</th>
						<th style="width: 10px">Indeks</th>
						<th width="150px">Uraian</th>
						<th>Tahun</th>
						<th>Volume</th>
						<th>Keterangan</th>
						<th>File</th>
						<?php
							$level = $this->session->userdata('level');
							if ($level == 'pimpinan') {
								$komen = "<!--";
								$akhir = "-->";
							}else{
								$komen = "";
								$akhir = "";
							}
					 	?>
						<?php echo $komen; ?><th>Opsi</th><?php echo $akhir; ?>
					</tr>
					<tr>
						<th>NO.BERKAS</th>
						<th>NO.BOXS</th>
						<th style="width: 10px">INDEKS</th>
						<th>URAIAN</th>
						<th>TAHUN</th>
						<th>VOLUME</th>
						<th>KET</th>
						<th>FILE</th>
						<?php echo $komen; ?><th>OPSI</th><?php echo $akhir; ?>
					</tr>
				</thead>
				<tbody>
				<?php $no=0; foreach($all as $row): $no++;?>
					<tr >
						<td><?php echo $row->no_berkas; ?></td>
						<td><?php echo $row->nama_box; ?></td>
						<td width= "10px"><?php echo $row->indeks; ?></td>
						<td><?php echo $row->uraian; ?></td>
						<td><?php echo $row->tahun; ?></td>
						<td><?php echo $row->volume; ?></td>
						<td><?php echo $row->ket; ?></td>
						<td>
						<?php if($row->file==""){
							$fill = $row->file;
							$aksi = site_url('Input/add_file');
							$tampil = 
<<<HEREDOCS
			              	<form action="$aksi" method="post" enctype="multipart/form-data" >
								<input type="file" name="file">
								<input type="hidden" name="no_box" value="$row->no_box">
								<input type="hidden" name="no_berkas" value="$row->no_berkas">
								<br>
								<button type="submit" class="btn btn-info btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Tambah Data"><i class="icon-file-plus"></i> Tambah File</button>
							</form>
HEREDOCS;
						echo $tampil;
			            }else{?>
			              <button onclick='open("<?php echo site_url('Search/embed/'.$row->file);?>","displayWindow","width=700,height=600,status=no,toolbar=no,menubar=no,left=355");' class="btn btn-info btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Lihat Data"><i class="icon-file-search"></i> Lihat File</button>
			           	<?php } ?>
						</td>
						<?php echo $komen; ?>
						<td width="80px">
							<center>
								<a href="<?php echo site_url('Search/update/'.$row->no_berkas); ?>" class="btn btn-default btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
									<i class="entypo-pencil"></i>
								</a>
								
								<a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row->no_berkas; ?>?');" href="<?php echo site_url('Search/hapus/'.$row->no_berkas); ?>" class="btn btn-danger btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
									<i class="entypo-cancel"></i>
								</a>
							</center>
						</td>
						<?php echo $akhir; ?>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	</div>

<script type="text/javascript">
 	jQuery(document).ready(function($)
 	{
 		var table = $("#table-3").dataTable({
 			"sPaginationType": "bootstrap",
 			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
 			"bStateSave": true
 		});
			
 		table.columnFilter({
 			"sPlaceHolder" : "head:after"
 		});
 	});
 </script>