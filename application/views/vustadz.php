<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
1. Ustadz. operasi CRUD
vars:
usid
usnama
usnotelp
usalamat
mediaid

*/
// view admin
?>
<div id="main-content">
<!-- <div class="container" style="margin-left: 400px; margin-top: 50px;"> -->
	<h2><?php echo $page; ?></h2>
<?php
if ($page=="Ustadz") {
	if (isset($tanya)) {
		echo $tanya;
	}
?>

	<table class="table table-bordered table-striped table-hover">
		<thead>
			<th>No.</th>
			<th>Foto</th>
			<th>Nama ust.</th>
			<th>No. Telp</th>
			<th>Alamat</th>
			<th colspan="2">Operasi</th>
		</thead>
<?php

$n = 1;
		foreach ($cmustadz as $v) {
			echo "<tr>
			<td>".$n."</td>
			<td>".$v->mediaid."</td>
			<td>".$v->usnama."</td>
			<td>".$v->usnotelp."</td>
			<td>".$v->usalamat."</td>
			<td><a href=".base_url('ustadz/ubahust/'.$v->usid)."> ubah</a></td>
			<td><a href=".base_url('ustadz/dbhapus/'.$v->usid)."> hapus</a></td>

			</tr>";
			$n++;
		}
		 ?>
	</table>
	<button class="btn"><i class="fa fa-pencil-square-o"> </i><a href="<?php echo base_url('ustadz/tambahust');?>"> Tambah Ustad </a></button>
<?php }else if ($page=="Tambah Ustadz") {?>
	<?php echo form_open('ustadz/dbtambahust','class=form');	?>
	<div class="form-group">
		<label for="usnama">Nama Ustadz</label>
		<input type="text" class="form-control" name="usnama" value="">
	</div>
	<div class="form-group">
		<label for="usnotelp">No. telp</label>
		<input type="text" class="form-control" name="usnotelp" value="">
	</div>
	<div class="form-group">
		<label for="usalamat">Alamat</label>
		<input type="textarea" class="form-control" name="usalamat" value="">
	</div>
	<div class="form-group">
		<label for="mediaid">Media id</label>
		<input type="file" class="form-control" name="mediaid" value="">
	</div>

 	<button type="submit" class="btn btn-primary" name="submit" value="tambah">Tambah</button>
		<button type="submit" class="btn btn-danger" name="submit" value="kembali"><a style="text-decoration: none" href="<?php echo base_url('ustadz');?>">Kembali</a></button>

<?php }else if ($page=="Ubah Ustadz") {?>

	<?php echo form_open('ustadz/dbubah','class=form');	?>
	<input type="hidden" name="usid" value="<?php echo $ustadz->usid;?>">
	<div class="form-group">
		<label for="usnama">Nama Ustadz</label>
		<input type="text" class="form-control" name="usnama" value="<?php echo $ustadz->usnama;?>">
	</div>
	<div class="form-group">
		<label for="usnotelp">No. telp</label>
		<input type="text" class="form-control" name="usnotelp" value="<?php echo $ustadz->usnotelp;?>">
	</div>
	<div class="form-group">
		<label for="usalamat">Alamat</label>
		<input type="textarea" class="form-control" name="usalamat" value="<?php echo $ustadz->usalamat;?>">
	</div>
	<div class="form-group">
		<label for="mediaid">Media id</label>
		<input type="file" class="form-control" name="mediaid" value="<?php echo $ustadz->mediaid;?>">
	</div>

	<button type="submit" class="btn btn-primary" name="submit" value="update">Update</button>
	<button type="submit" class="btn btn-danger" name="submit" value="kembali"><a style="text-decoration: none" href="<?php echo base_url('ustadz');?>">Kembali</a></button>
	<button type="submit" class="btn btn-danger" name="submit" value="hapus"><a style="text-decoration: none" href="<?php echo base_url('ustadz/dbhapus/'.$ustadz->usid);?>">Hapus Ustadz</a></button>
<?php } ?>
</div>