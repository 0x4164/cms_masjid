<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// view admin


?>
<div id="main-content">
<?php
if ($page=="Jadwal Kegiatan") {
?>
<!-- <div class="container" style="margin-left: 400px; margin-top: 50px;"> -->
<h2><?php echo $page; ?></h2>
<table class="table table-bordered table-striped table-hover">
	<thead>
		<th>No.</th>
		<th>Nama Kegiatan</th>
		<th>Pihak terkait</th>
		<th>Waktu</th>
		<th>Tag</th>
		<th colspan="2">Operasi</th>
	</thead>
<?php
	$n = 1;
		foreach ($jadwalk as $v) {
			echo "<tr>
			<td>".$n."</td>
			<td>".$v->jknama."</td>
			<td>".$v->jkpihak."</td>
			<td>".$v->jkwaktu."</td>
			<td>".$v->tagid."</td>
			<td><a href=".base_url('jadwalkegiatan/ubahjkegiatan/'.$v->jkid)."> ubah</a></td>
			<td><a href=".base_url('jadwalkegiatan/dbhapus/'.$v->jkid)."> hapus</a></td>

			</tr>";
			$n++;
		}
		 ?>
	</table>
	<button class="btn"><i class="fa fa-pencil-square-o"> </i><a href="<?php echo base_url('jadwalkegiatan/tambahkegiatan');?>"> Tambah Kegiatan</a></button>
	<?php }else if ($page=="Tambah Kegiatan") {?>
		<h3>Tambah kegiatan</h3>
		<?php echo form_open('jadwalkegiatan/dbtambahjk','class=form');	?>
		<div class="form-group">
			<label for="jknama">jknama</label>
			<input type="text" class="form-control" name="jknama" value="">
		</div>
		<div class="form-group">
			<label for="jkpihak">jkpihak</label>
			<input type="text" class="form-control" name="jkpihak" value="">
		</div>
		<div class="form-group">
			<label for="jkwaktu">Text</label>
			<input type="textarea" class="form-control" name="jkwaktu" value="">
		</div>
		<div class="form-group">
				<label for="tagid">tag</label>
				<input type="textarea" class="form-control" name="tagid" value="">
		</div>

		<button type="submit" class="btn btn-primary" name="submit" value="Tambah">Tambah</button>
		<button type="submit" class="btn btn-danger" name="submit" value="kembali"><a style="text-decoration: none" href="<?php echo base_url('jadwalkegiatan');?>">Kembali</a></button>
	</div>
	<?php }else if ($page=="Ubah Kegiatan") {?>
		<h3>Ubah kegiatan</h3>
		<?php echo form_open('jadwalkegiatan/dbubahjk','class=form');	?>
		<input type="hidden" name="jkid" value="<?php echo $jadwalk->jkid;?>">
		<div class="form-group">
			<label for="jknama">jknama</label>
			<input type="text" class="form-control" name="jknama" value="<?php echo $jadwalk->jknama;?>">
		</div>
		<div class="form-group">
			<label for="jkpihak">jkpihak</label>
			<input type="text" class="form-control" name="jkpihak" value="<?php echo $jadwalk->jkpihak;?>">
		</div>
		<div class="form-group">
			<label for="jkwaktu">Text</label>
			<input type="textarea" class="form-control" name="jkwaktu" value="<?php echo $jadwalk->jkwaktu;?>">
		</div>
		<div class="form-group">
				<label for="tagid">tag</label>
				<input type="textarea" class="form-control" name="tagid" value="<?php echo $jadwalk->tagid;?>">
		</div>
		<button type="submit" class="btn btn-primary" name="submit" value="Ubah">Ubah</button>
		<button type="submit" class="btn btn-danger" name="submit" value="kembali"><a style="text-decoration: none" href="<?php echo base_url('jadwalkegiatan');?>">Kembali</a></button>
		<button type="submit" class="btn btn-danger" name="submit" value="hapus"><a style="text-decoration: none" href="<?php echo base_url('jadwalkegiatan/dbhapus/'.$jadwalk->jkid);?>">Hapus Kegiatan</a></button>
	</div>
	<?php } ?>
</div>
