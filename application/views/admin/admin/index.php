<ol class="breadcrumb" >
	<li>
		<a href="<?php echo base_url(); ?>"><i class="fa-home"></i>Arsip</a>
	</li>
	<li class="active">
		<a href="#">Admin</a>
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
<a href="<?php echo 'javascript:;'; ?>" onclick="jQuery('#modal-1').modal('show');" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a><?php echo br(2); ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title"><i class="entypo-user"></i><strong>ADMIN</strong></div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered datatable" id="table-1">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nama Admin</th>
						<th>Akses Sebagai</th>
						<th width="200px">Opsi</th>
					</tr>
				</thead>
				<tbody>
				<?php $no=0; foreach($all as $row): $no++; ?>
					<tr>
						<td><?php echo $row->id_admin; ?></td>
						<td><?php echo $row->nama_admin; ?></td>
						<td><?php echo $row->nama_akses; ?></td>
						<td>
							<center>
								<a href="<?php echo site_url('Admin/update/'.$row->id_admin);?>" class="btn btn-default btn-sm btn-icon icon-left">
									<i class="entypo-pencil"></i>
									Edit
								</a>
								
								<a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus <?php echo $row->username; ?>?');" href="<?php echo site_url('Admin/delete/'.$row->id_admin);?>" class="btn btn-danger btn-sm btn-icon icon-left">
									<i class="entypo-cancel"></i>
									Hapus
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
<div class="modal fade" id="modal-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><strong>Tambah Admin</strong></h4>
			</div>
			<form role="form" action="<?php echo site_url('admin/add'); ?>" id="form1" method="post" class="validate">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="label-control">ID Admin</label>
								<input type="text" required onkeypress='return isNumberKeyTrue(event)' value="<?php echo $id; ?>" readonly class="form-control" name="id" data-validate="required" placeholder="ID Box" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="label-control">Username</label>
								<input type="text" autocomplete="off" required class="form-control" name="username" data-validate="required" data-message-required="Username Belum Diisi." placeholder="Masukkan Username" />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="label-control">Password</label>
								<input type="password" required class="form-control" name="password" data-validate="required" placeholder="Masukkan Password" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="label-control">Nama Admin</label>
								<input type="text" autocomplete="off" required class="form-control" name="name" data-validate="required" data-message-required="Nama Admin Belum Diisi." placeholder="Masukkan Nama Admin" />
							</div>
						</div>
					</div>
					<div>
						<div class="col-md-12">
							<div class="form-group">
								<label class="label-control">Akses Sebagai</label>
								<select name="id_akses" class="form-control">
									<option value=""> </option>
									<?php $no=0; foreach($akses as $row): $no++; ?>
									<option value="<?php echo $row->id_akses;  ?>"><?php echo $row->nama_akses; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-ok-sign"></i> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
var responsiveHelper;
var breakpointDefinition = {
    tablet: 1024,
    phone : 480
};
var tableContainer;

	jQuery(document).ready(function($)
	{
		tableContainer = $("#table-1");
		
		tableContainer.dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true,
			

		    // Responsive Settings
		    bAutoWidth     : false,
		    fnPreDrawCallback: function () {
		        // Initialize the responsive datatables helper once.
		        if (!responsiveHelper) {
		            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
		        }
		    },
		    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
		        responsiveHelper.createExpandIcon(nRow);
		    },
		    fnDrawCallback : function (oSettings) {
		        responsiveHelper.respond();
		    }
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
</script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>