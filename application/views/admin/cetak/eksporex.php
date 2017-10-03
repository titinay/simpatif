<?php 
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Berkas$tahun1$tahun2.xls");
?>
<div style="font-family:Arial;">
	<!-- <h2 ><center><u>DAFTAR ARSIP INAKTIF</u><br></br>TAHUN <?php echo $tahun1; ?>-<?php echo $tahun2; ?></center></h2>
	<center><img src="<?php echo base_url('assets/gambar.JPG');?>" alt=""></center>
	<h2><center>BADAN KOORDINASI WILAYAH PEMERINTAHAN DAN<br></br>PEMBANGUNAN BOJONEGORO</center></h2>
	<?php echo br(3); ?> -->
	<?php if($tahun2!=""){
		$th=$tahun1.'-'.$tahun2;
	}else{
		$th=$tahun1;
	} ?>
	<center>DAFTAR ARSIP INAKTIF<br></br>TAHUN <?php echo $th; ?></center>
	<br></br>
	<strong>INSTANSI:BAKORWIL BOJONEGORO</strong>
</div>
<center>
	<table border="1" style="font-size:15px;border:100px;font-family:Arial;">
		<thead>
			<tr>
				<th style="font-size:15px;"><center><strong>NO.<br></br>BERKAS</strong><center></th>
				<th style="font-size:15px;"><center><strong>NO.<br></br>BOXS</strong><center></th>
				<th style="font-size:15px;"><center><strong>KODE<br></br>
				KLASIFIKASI</strong><center></th>
				<th width="200" style="font-size:15px;"><center><strong>INDEKS</strong><center></th>
				<th width="300" style="font-size:15px;"><center><strong>URAIAN</strong><center></th>
				<th width="100" style="font-size:15px;"><center><strong>TAHUN</strong><center></th>
				<th width="100" style="font-size:15px;"><center><strong>VOLUME</strong><center></th>
				<th style="font-size:15px;"><center><strong>KET</strong><center></th>
			</tr>
		</thead>
		<tbody>
		<?php $no=0; foreach($all as $row): $no++;?>
			<tr >
				<td style="font-size:15px;"><?php echo $row->no_berkas; ?></td>
				<td style="font-size:15px;"><?php echo $row->nama_box; ?></td>
				<td style="font-size:15px;"><?php echo $row->kode_klasifikasi; ?></td>
				<td style="font-size:15px;"><?php echo $row->indeks; ?></td>
				<td style="font-size:15px;"><?php echo $row->uraian; ?></td>
				<td style="font-size:15px;"><?php echo $row->tahun; ?></td>
				<td style="font-size:15px;"><?php echo $row->volume; ?></td>
				<td style="font-size:15px;"><?php echo $row->ket; ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</center>