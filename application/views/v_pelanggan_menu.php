<?php 
$user_id = $this->session->userdata("userid");
$user = $this->db->query("select * from tbl_user where user_id='$user_id'")->row();?>
  <header class="main-header">
    <a href="" class="logo">
     <span class="logo-mini"></span><b><!--<img class="profile-img" src="<?php echo base_url();?>assets/dist/img/logo.png<?php echo "?".strtotime("now");?>" alt="" style="height:3vw;">-->STARFI</b>
    </a>
    <nav class="navbar navbar-static-top" >
      <div style="text-align:center;" class="col-xs-10">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		
      </div>
        <ul class="nav navbar-nav">
		  <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>assets/dist/img/avatar/<?php echo $user->user_foto."?".strtotime("now");?>" class="user-image" alt="User Image">
              <span class="hidden-xs">Hi, { <?php $nama_lengkap = explode(" ", $user->user_namalengkap); echo $nama_lengkap[0]; ?> }</span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url(); ?>login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
    </nav>
  </header>
  <?php
  $geturl = $this->uri->segment(2);
  $beranda = "";
  $carapesan = "";
  $pemesanan = "";
  $tentangkami = "";
  $inbox = "";
  $testimoni = "";
  $penjadwalan = "";
  $penilaian = "";
  $login = "";
  
  if($geturl=="" or strpos($geturl, "index")!== FALSE){
	  $beranda = "active";
  }
  if(strpos($geturl, "carapesan")!== FALSE){
	  $carapesan = "active";
  }
  if(strpos($geturl, "pemesanan")!== FALSE){
	  $pemesanan = "active";
  }
  if(strpos($geturl, "tentangkami")!== FALSE){
	  $tentangkami = "active";
  }
  if(strpos($geturl, "inbox")!== FALSE){
	  $inbox = "active";
  }
  if(strpos($geturl, "penjadwalan")!== FALSE){
	  $penjadwalan = "active";
  }
  if(strpos($geturl, "testimoni")!== FALSE){
	  $testimoni = "active";
  }
  if(strpos($geturl, "penilaian")!== FALSE){
	  $penilaian = "active";
  }
  if(strpos($geturl, "login")!== FALSE){
	  $login = "active";
  }
  
  ?>
  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="<?php echo $beranda;?>">
          <a href="<?php echo base_url(); ?>pelanggan">
            <i class="fa fa-home"></i> <span>HOME</span>
          </a>
        </li>
		<li class="<?php echo $carapesan;?>">
          <a href="<?php echo base_url(); ?>pelanggan/carapesan">
            <i class="fa fa-shopping-cart"></i> <span>CARA PESAN</span>
          </a>
        </li>
		<li class="<?php echo $tentangkami;?>">
          <a href="<?php echo base_url(); ?>pelanggan/tentangkami">
            <i class="fa fa-info-circle"></i> <span>TENTANG KAMI</span>
          </a>
        </li>
		<li class="<?php echo $testimoni;?>">
          <a href="<?php echo base_url(); ?>pelanggan/testimoni">
            <i class="fa fa-users"></i> <span>TESTIMONI</span>
          </a>
        </li>
		<li class="<?php echo $pemesanan;?>">
          <a href="<?php echo base_url(); ?>pelanggan/pemesanan">
            <i class="fa fa-shopping-cart"></i> <span>PEMESANAN</span>
          </a>
        </li>
		<li class="<?php echo $inbox;?>">
          <a href="<?php echo base_url(); ?>pelanggan/inbox">
            <i class="fa fa-inbox"></i> <span>INBOX</span>
          </a>
        </li>
		<li class="<?php echo $penjadwalan;?>">
          <a href="<?php echo base_url(); ?>pelanggan/penjadwalan">
            <i class="fa fa-calendar"></i> <span>PENJADWALAN</span>
          </a>
        </li>
		<li class="<?php echo $penilaian;?>">
          <a href="<?php echo base_url(); ?>pelanggan/penilaian">
            <i class="fa fa-pencil"></i> <span>PENILAIAN</span>
          </a>
        </li>
		<li>
          <a href="<?php echo base_url(); ?>beranda/logout">
            <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
          </a>
        </li>
      </ul>
    </section>
  </aside>