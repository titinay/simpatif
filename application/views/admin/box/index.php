<ol class="breadcrumb" >
	<li>
		<a href="<?php echo base_url(); ?>"><i class="fa-home"></i>Arsip</a>
	</li>
	<li class="active">
		<a href="#">Box</a>
	</li>
</ol>
<div class="col-md-8">
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
	echo '<div class="alert alert-danger"><strong>Error!</strong> Data Gagal Diinputkan.</div>';
}?>
<a href="<?php echo "javascript:;"; ?>" onclick="jQuery('#modal-1').modal('show');" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a><?php echo br(2); ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title"><i class="entypo-box"></i><strong>BOX</strong></div>
		</div>
		<div class="panel-body">
			<table  class="table table-bordered datatable" id="table-1">
				<thead>
					<tr>
						<th>Kode</th>
						<th>Nama Box</th>
						<th>Jumlah Berkas</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
				<?php $no=0; foreach($alldata as $row): $no++; ?>
					<tr>
						<td><?php echo $row->id_box; ?></td>
						<td><?php echo $row->nama_box; ?></td>
						<td><?php echo $this->M_box->berkas($row->id_box)->num_rows(); ?> Berkas </td>
						<td width="300px">
							<center>
								<a href="<?php echo ('Box/detail/'.$row->id_box);?>" class="btn btn-info btn-sm btn-icon icon-left">
									<i class="entypo-cd"></i>
									Detail
								</a>
								<a href="<?php echo ('Box/update/'.$row->id_box);?>" class="btn btn-default btn-sm btn-icon icon-left">
									<i class="entypo-pencil"></i>
									Edit
								</a>
								
								<a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Box?');" href="<?php echo ('Box/delete/'.$row->id_box);?>" class="btn btn-danger btn-sm btn-icon icon-left">
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
				<h4 class="modal-title"><strong>Tambah Box</strong></h4>
			</div>
			<form role="form" action="<?php echo site_url('box/add'); ?>" id="form1" method="post" class="validate">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="label-control">ID Box</label>
								<input type="text" required onkeypress='return isNumberKeyTrue(event)' value="<?php echo $id; ?>" readonly class="form-control" name="id" data-validate="required" placeholder="ID Box" />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="label-control">Nama Box</label>
								<input type="text" autocomplete="off" required class="form-control" name="name" autofocus
								 data-message-required="Nama Belum Diisi." placeholder="Masukkan Nama Box" />
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