<?php
  /*
  navbar.php navigasi di sebelah
  updates
  16/1/2018
    - bootstrap navbar
  */

  //jika mode di controller ada, maka muncul navbar utk pengunjung
  if (isset($mode)&&$mode=="pengunjung") {
?>
<<<<<<< HEAD
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo base_url('');?>">[][][]Situs[][][]</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('beranda/post')?>">post <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('beranda/profilm')?>">profil m <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('beranda/takmirm')?>">takmir m <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('beranda/ustadz')?>">Daftar ustadz <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('beranda/keuanganmasjid')?>">Keuangan Masjid <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('beranda/jadwalkegiatan')?>">Jadwal Kegiatan<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('login')?>">Login</a>
      </li>
    </ul>
    <span class="navbar-text">
      <?php echo md5('pengunjung') ?>
    </span>
  </div>
</nav>
=======
<div class="container">
<div class="nav-side-menu">
    <div class="brand"><a href="#Profile" style="text-decoration: none; color: #e1ffff;">CMS Masjid</a></div>
      <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">            
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('beranda/post')?>"><i class="fa fa-pencil fa-lg"></i> Post </span></a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('beranda/profilm')?>"><i class="fa fa-id-card-o fa-lg" aria-hidden="true"></i> Profil m </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('beranda/takmirm')?>"><i class="fa fa-pencil fa-lg"></i> Takmir m </span></a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('beranda/ustadz')?>"><i class="fa fa-pencil fa-lg"></i> Daftar Ustadz  <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('beranda/keuanganmasjid')?>"><i class="fa fa-usd fa-lg"></i>Keuangan Masjid <span class="sr-only">(current)</span></a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('beranda/jadwalkegiatan')?>"><i class="fa fa-calendar-check-o fa-lg"></i> Jadwal Kegiatan  <span class="sr-only">(current)</span></a>
              </li>
            </ul>
            <span class="navbar-text">
             <?php echo md5('pengunjung') ?>
            </span>
     </div>
</div>
</div>
>>>>>>> 1ccb56942216d0120ba8f442ed3d964c6fd11770
<?php

//jika tidak maka muncul punya si admin

  }else if (!isset($mode)){

?>
<!-- navbar -->
<div class="container">
<div class="nav-side-menu">
    <div class="brand"><a href="#Profile" style="text-decoration: none; color: #e1ffff;">CMS Masjid</a></div>
      <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
              <li  class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin')?>"><i class="fa fa-user-o fa-lg"></i><span class="sr-only">(current)</span> admin</a>
              </li>               
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('post')?>"><i class="fa fa-pencil fa-lg"></i> Post </span></a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('profiladmin')?>"><i class="fa fa-id-card-o fa-lg" aria-hidden="true"></i>    Profil Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('profilm')?>"><i class="fa fa-list-alt fa-lg"></i> Profil Masjid </span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('takmir')?>"><i class="fa fa-pencil fa-lg"></i> Takmir </span></a>
              </li>  
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('ustadz')?>"><i class="fa fa-pencil fa-lg"></i> Ustadz </span></a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('media')?>"><i class="fa fa-calendar-check-o fa-lg"></i> Media </span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('jadwalkegiatan')?>"><i class="fa fa-calendar-check-o fa-lg"></i> Jadwal Kegiatan </span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('keuanganmasjid')?>"><i class="fa fa-usd fa-lg"></i>Keuangan Masjid</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('rekamdonasi')?>"><i class="fa fa-usd fa-lg"></i> Rekam Donasi </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('pengaturan')?>""><i class="fa fa-cog fa-lg"></i> Pengaturan</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo base_url('admin/logout')?>""><i class="fa fa-cog fa-lg"></i> Logout</a>
              </li>
            </ul>
    <span class="navbar-text">
      <?php echo md5('dib') ?>
    </span>
     </div>
</div>
</div>
<?php
}
?>
