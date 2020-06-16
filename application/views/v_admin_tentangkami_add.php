  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Tambah tentangkami
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
				  <?php echo form_open_multipart("admin/tentangkami_aksi_tambah"); ?>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Nama Perusahaan</label>
						<input type="text" class="form-control" name="tentangkami_namaperusahaan" placeholder="Urutan">
					  </div>
					  <div class="form-group">
						<label>Keterangan </label>
						<textarea class="form-control" name="tentangkami_keterangan" placeholder="Keterangan"></textarea>
					  </div>
					  <div class="form-group">
						<label>Alamat </label>
						<textarea class="form-control" name="tentangkami_alamatperusahaan" placeholder="Alamat"></textarea>
					  </div>
					  <div class="form-group">
						<label>Latitude</label>
						<input type="text" class="form-control" name="tentangkami_koordinatlatitude" placeholder="Urutan">
					  </div>
					  <div class="form-group">
						<label>Longitude</label>
						<input type="text" class="form-control" name="tentangkami_koordinatlongitude" placeholder="Urutan">
					  </div>
					  <div class="form-group">
						<label>Kontak</label>
						<input type="text" class="form-control" name="tentangkami_kontak" placeholder="Urutan">
					  </div>
					  <div class="form-group">
						<label>Level</label>
						<select name="tentangkami_level" class="form-control select2">
							<option value="pusat">Pusat</option>
							<option value="cabang">Cabang</option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Foto</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group" style="text-align:center;">
						<img class="img img-responsive user-image" id="blah">
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