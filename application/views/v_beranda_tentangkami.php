  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <section class="content">
		<div class="col-xs-12">
			<?php 
			foreach($tbl_tentangkami_foto as $foto){?>
			<div class="col-xs-3">
				<img class="img img-responsive" src="<?php echo base_url("assets/dist/img/tentangkami/$foto->tentangkami_foto")."?".strtotime("now");?>"/>
			</div>
			<?php }?>
		</div>
		<div class="col-xs-12">
			<p><hr></p>
		</div>
		<div class="col-xs-12">
			<div class="col-xs-7">
				<?php 
				foreach($tbl_tentangkami_pusat as $pusat){?>
				<p style="text-align:justify;"><b><?Php echo $pusat->tentangkami_namaperusahaan;?></b>
				<br><br>
				<?Php echo $pusat->tentangkami_alamatperusahaan;?>
				<br><?Php echo $pusat->tentangkami_keterangan;?><br>
				<br><b>Hubungi Kami Di :</b> <?Php echo $pusat->tentangkami_kontak;?> (HP)
				</p>
				<?php }?>
			</div>
			<div class="col-xs-5">
				<ul>
				<?php 
				foreach($tbl_tentangkami_cabang as $cabang){?>
					<li><?Php echo $cabang->tentangkami_namaperusahaan;?><br><?Php echo $cabang->tentangkami_alamatperusahaan;?></li>
				<?php }?>
				</ul>
			</div>
		</div>
      </section>
    </div>
  </div>