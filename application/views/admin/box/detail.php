<ol class="breadcrumb" >
	<li>
		<a href="<?php echo base_url(); ?>"><i class="fa-home"></i>Arsip</a>
	</li>
	<li class="active">
		<a href="<?php echo site_url('Box'); ?>">Box </a>
	</li>
	<li class="active">
		<a href="#">Detail Box <?php echo $this->uri->segment(3);?></a>
	</li>
</ol>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title"><i class="entypo-search"></i><strong>Detail Arsip Vital Box <?php echo $this->uri->segment(3);?></strong></div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered datatable" id="table-2">
				<thead>
					<tr class="replace-inputs">
						<th>No Berkas</th>
						<th>No Boxs</th>
						<th>Kode Klasifikasi</th>
						<th width="100px">Indeks</th>
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
						<th>KODE KLASIFIKASI</th>
						<th>INDEKS</th>
						<th width="200px">URAIAN</th>
						<th width="100px">TAHUN</th>
						<th width="100px">VOLUME</th>
						<th>KET</th>
						<th>FILE</th>
						<?php echo $komen; ?><th>OPSI</th><?php echo $akhir; ?>
					</tr>
				</thead>
				<tbody>
				<?php $no=0; foreach($getberkas as $row): $no++;?>
					<tr >
						<td><?php echo $row->no_berkas; ?></td>
						<td><?php echo $row->no_box; ?></td>
						<td><?php echo $row->kode_klasifikasi; ?></td>
						<td><?php echo $row->indeks; ?></td>
						<td><?php echo $row->uraian; ?></td>
						<td><?php echo $row->tahun; ?></td>
						<td><?php echo $row->volume; ?></td>
						<td><?php echo $row->ket; ?></td>
						<td>
						<?php if($row->file==""){
							$fill = $row->file;
							$aksi = site_url('Box/add_file');
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
						<td width="80px">
							<center>
								<a href="<?php echo site_url('Ars/update/'.$row->no_berkas); ?>" class="btn btn-default btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data">
									<i class="entypo-pencil"></i>
								</a>
								
								<a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row->no_berkas; ?>?');" href="<?php echo site_url('Ars/hapus/'.$row->no_berkas); ?>" class="btn btn-danger btn-xs tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data">
									<i class="entypo-cancel"></i>
								</a>
							</center>
						</td>
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
		var table = $("#table-2").dataTable({
 			"sPaginationType": "bootstrap",
 			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
 			"bStateSave": true
 		});
 		table.columnFilter({
 			"sPlaceHolder" : "head:after"
 		});
 	});
 </script>