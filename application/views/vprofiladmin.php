<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// view admin
/*
userid
username
userpass
userfullname
useremail
userurl
usertgldaftar
displayname
mediaid
useralamat
usertelp
*/
?>
<div id="main-content">
<!-- <div class="container" style="margin-left: 300px;"> -->
	<h2><?php echo $page; ?></h2>


	<div class="panel panel-default row">
				<?php echo form_open('profiladmin/dbubahprofiladmin');?>
			<div class="col-md-4">
				<div class="panel-content form-group">
					<label for="mediaid">Media :</label>
					<input class="form-control" type="textarea" name="mediaid" value="<?php echo $padmin->mediaid;?>"><br>
				</div>
			</div>
			<div class="panel-content col-md-4">
			<div class="form-group">
				<label for="username">Username : </label>
				<input type="text" class="form-control" name="username" value="<?php echo $padmin->username;?>">
			</div>
			<div class="form-group">
				<label for="userpass">Password : </label>
				<input type="text" class="form-control" name="userpass" value="<?php echo $padmin->userpass;?>">
			</div>
			<div class="form-group">
				<label for="userfullname">Nama lengkap : </label>
				<input type="text" class="form-control" name="userfullname" value="<?php echo $padmin->userfullname;?>">
			</div>
			<div class="form-group">
				<label for="useralamat">Alamat : </label>
				<input type="textarea" class="form-control" name="useralamat" value="<?php echo $padmin->useralamat;?>">
			</div>
			<div class="form-group">
				<label for="usertelp">Nomor Telpon : </label>
				<input type="text" class="form-control" name="usertelp" value="<?php echo $padmin->usertelp;?>">
			</div>
			<div class="form-group">
				<label for="useremail">Email : </label>
				<input type="text" class="form-control" name="useremail" value="<?php echo $padmin->useremail;?>">
			</div>
			</div>
			<div class="panel-content col-md-4">
			<div class="form-group">
				<label for="usertgldaftar">Tanggal daftar : </label>
				<input type="text" class="form-control" name="usertgldaftar" value="<?php echo $padmin->usertgldaftar;?>" disabled="">
			</div>
			<div class="form-group">
				<label for="displayname">Nama layar : </label>
				<input type="text" class="form-control" name="displayname" value="<?php echo $padmin->displayname;?>">
			</div>
			<button type="submit" name="submit" class="btn btn-lg btn-primary">Terapkan</button>
		</form>
		</div>
	</div>
</div>
