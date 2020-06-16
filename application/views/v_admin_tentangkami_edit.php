  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Ubah Tentang Kami
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
				  <?php echo form_open_multipart("admin/tentangkami_aksi_ubah/".$tbl_tentangkami->tentangkami_id); ?>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Nama Perusahaan</label>
						<input type="text" class="form-control" name="tentangkami_namaperusahaan" value="<?php echo set_value('tentangkami_namaperusahaan', $tbl_tentangkami->tentangkami_namaperusahaan); ?>">
					  </div>
					  <div class="form-group">
						<label>Keterangan </label>
						<textarea class="form-control" name="tentangkami_keterangan"><?php echo set_value('tentangkami_keterangan', $tbl_tentangkami->tentangkami_keterangan); ?></textarea>
					  </div>
					  <div class="form-group">
						<label>Alamat </label>
						<textarea class="form-control" name="tentangkami_alamatperusahaan"><?php echo set_value('tentangkami_alamatperusahaan', $tbl_tentangkami->tentangkami_alamatperusahaan); ?></textarea>
					  </div>
					  <div class="form-group">
						<label>Latitude</label>
						<input type="text" class="form-control" name="tentangkami_koordinatlatitude" value="<?php echo set_value('tentangkami_koordinatlatitude', $tbl_tentangkami->tentangkami_koordinatlatitude); ?>">
					  </div>
					  <div class="form-group">
						<label>Longitude</label>
						<input type="text" class="form-control" name="tentangkami_koordinatlongitude" value="<?php echo set_value('tentangkami_koordinatlongitude', $tbl_tentangkami->tentangkami_koordinatlongitude); ?>">
					  </div>
					  <div class="form-group">
						<label>Kontak</label>
						<input type="text" class="form-control" name="tentangkami_kontak" value="<?php echo set_value('tentangkami_kontak', $tbl_tentangkami->tentangkami_kontak); ?>">
					  </div>
					  <div class="form-group">
						<label>Level</label>
						<select name="tentangkami_level" class="form-control select2">
							<option value="<?php echo set_value('tentangkami_level', $tbl_tentangkami->tentangkami_level); ?>"><?php echo set_value('tentangkami_level', $tbl_tentangkami->tentangkami_level); ?></option>
							<option value="pusat">Pusat</option>
							<option value="cabang">Cabang</option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Foto</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
						<input type="hidden" name="tentangkami_foto" value="<?php echo set_value('tentangkami_foto', $tbl_tentangkami->tentangkami_foto); ?>">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group" style="text-align:center;">
						<img class="img img-responsive user-image" id="blah" src="<?php echo base_url();?>assets/dist/img/tentangkami/<?php echo $tbl_tentangkami->tentangkami_foto."?".strtotime("now");?>">
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