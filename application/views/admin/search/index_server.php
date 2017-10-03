<ol class="breadcrumb" >
	<li>
		<a href="<?php echo base_url(); ?>"><i class="fa-home"></i>Arsip</a>
	</li>
	<li class="active">
		<a href="#">Searching</a>
	</li>
</ol>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title"><i class="entypo-search"></i><strong>Searching Berkas</strong></div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered datatable" id="table-3">
				<thead>
					<tr>
						<th width="50px"><center>NO.</br>BERKAS</center></th>
						<th width="50px"><center>NO.</br>BOXS</center></th>
						<th width="100px"><center>KODE</br>KLASIFIKASI</center></th>
						<th><center>INDEKS</center></th>
						<th width="200px"><center>URAIAN</center></th>
						<th width="100px"><center>TAHUN</center></th>
						<th width="100px"><center>VOLUME</center></th>
						<th><center>KET</center></th>
						<th><center>OPSI</center></th>
					</tr>
				</thead>
				<tfoot>
		          <tr>
		              <th width="50px"><center>NO.</br>BERKAS</center></th>
						<th width="50px"><center>NO.</br>BOXS</center></th>
						<th width="100px"><center>KODE</br>KLASIFIKASI</center></th>
						<th><center>INDEKS</center></th>
						<th width="200px"><center>URAIAN</center></th>
						<th width="100px"><center>TAHUN</center></th>
						<th width="100px"><center>VOLUME</center></th>
						<th><center>KET</center></th>
						<th><center>OPSI</center></th>
		          </tr>
		      </tfoot>
			</table>
		</div>
	</div>
</div>
	
<script type="text/javascript">
 	jQuery(document).ready(function($)
 	{
 		var table = $("#table-3").dataTable({
 			"ordering": true,
 			"processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo site_url('Search/datatables_ajax');?>",
                "type": "POST"
            }
 		});
 		
 	});
 </script>