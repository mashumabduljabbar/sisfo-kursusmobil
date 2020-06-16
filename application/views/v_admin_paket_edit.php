  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Ubah Paket
      </h3>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						<span>Silahkan melengkapi form berikut</span>
					</h3>
				</div>
				<div class="box-body">
				  <div class="row">
				  <?php echo form_open_multipart("admin/paket_aksi_ubah/".$tbl_paket->paket_id); ?>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Judul Paket</label>
						<input type="text" class="form-control" name="paket_judul" value="<?php echo set_value('paket_judul', $tbl_paket->paket_judul); ?>">
					  </div>
					  <div class="form-group">
						<label>Keterangan Paket</label>
						<textarea class="form-control" name="paket_keterangan" placeholder="Keterangan Paket"><?php echo set_value('paket_keterangan', $tbl_paket->paket_keterangan); ?></textarea>
					  </div>
					  <div class="form-group">
						<label>Harga Paket</label>
						<input type="number" class="form-control" name="paket_harga" value="<?php echo set_value('paket_harga', $tbl_paket->paket_harga); ?>">
					  </div>
					  <div class="form-group">
						<label>Lama Kursus (Pertemuan)</label>
						<input type="number" class="form-control" name="paket_lamakursus" value="<?php echo set_value('paket_lamakursus', $tbl_paket->paket_lamakursus); ?>">
					  </div>
					  
					  <div class="form-group">
						<label>Foto</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
						<input type="hidden" name="paket_foto" value="<?php echo set_value('paket_foto', $tbl_paket->paket_foto); ?>">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group" style="text-align:center;">
						<img class="img img-responsive user-image" id="blah" src="<?php echo base_url();?>assets/dist/img/paket/<?php echo $tbl_paket->paket_foto."?".strtotime("now");?>">
					  </div>
					</div>
					<?php echo form_close(); ?>
				  </div>
				</div>
			</div>
		</div>
      </div>
    </section>
  </div>
 <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>