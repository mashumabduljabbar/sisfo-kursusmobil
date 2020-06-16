  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Ubah Cara Pesan
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
				  <?php echo form_open_multipart("admin/carapesan_aksi_ubah/".$tbl_carapesan->carapesan_id); ?>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Urutan</label>
						<input type="text" class="form-control" name="carapesan_urut" value="<?php echo set_value('carapesan_urut', $tbl_carapesan->carapesan_urut); ?>">
					  </div>
					  <div class="form-group">
						<label>Keterangan</label>
						<input type="text" class="form-control" name="carapesan_nama" value="<?php echo set_value('carapesan_nama', $tbl_carapesan->carapesan_nama); ?>">
					  </div>
					  <div class="form-group">
						<label>Foto</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
						<input type="hidden" name="carapesan_foto" value="<?php echo set_value('carapesan_foto', $tbl_carapesan->carapesan_foto); ?>">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group" style="text-align:center;">
						<img class="img img-responsive user-image" id="blah" src="<?php echo base_url();?>assets/dist/img/carapesan/<?php echo $tbl_carapesan->carapesan_foto."?".strtotime("now");?>">
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