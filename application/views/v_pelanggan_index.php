  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <section class="content">
		<div class="col-xs-12">
			<?php 
			foreach($tbl_paket_foto as $foto){?>
			<div class="col-xs-3">
				<img class="img img-responsive" src="<?php echo base_url("assets/dist/img/paket/$foto->paket_foto")."?".strtotime("now");?>" />
			</div>
			<?php }?>
		</div>
		<div class="col-xs-12">
			<p><br></p>
		</div>
		<div class="col-xs-12">
			<?php 
			foreach($tbl_paket as $paket){?>
			
			<div class="col-md-6">
			  <div class="box box-primary box-solid">
				<div class="box-header with-border">
				  <h3 class="box-title"><?php echo $paket->paket_judul;?></h3>
				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
				  </div>
				</div>
				<div class="box-body">
				  <?php echo $paket->paket_keterangan;?>
				<hr>
				  Harga Kursus : Rp <?php echo number_format($paket->paket_harga);?>
				<br>
				  Lama Kursus : <?php echo number_format($paket->paket_lamakursus);?> Kali
				</div>
			  </div>
			</div>
			<?php }?>
		</div>
      </section>
    </div>
  </div>
  <footer class="main-footer"  style="text-align:center;">
    <div class="pull-right hidden-xs">
    </div>
    <strong><small>Copyright &copy; 2019</small></strong> 
  </footer>