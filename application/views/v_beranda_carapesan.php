  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <section class="content">
		<div class="col-xs-12">
			<?php 
			foreach($tbl_carapesan_foto as $foto){?>
			<div class="col-xs-3">
			<img class="img img-responsive" src="<?php echo base_url("assets/dist/img/carapesan/$foto->carapesan_foto")."?".strtotime("now");?>"/>
			</div>
			<?php }?>
		</div>
		<div class="col-xs-12">
			<p><hr></p>
		</div>
		<div class="col-xs-12">
			<h4>Cara Pesan</h4>
			<ol type="1">
			<?php 
			foreach($tbl_carapesan as $carapesan){?>
				<li> <?Php echo $carapesan->carapesan_nama;?></li>
			<?php }?>
		</div>
      </section>
    </div>
  </div>