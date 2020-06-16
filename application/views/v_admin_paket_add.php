  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Tambah Paket
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
				  <?php echo form_open_multipart("admin/paket_aksi_tambah"); ?>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Judul Paket</label>
						<input type="text" class="form-control" name="paket_judul" placeholder="Judul Paket">
					  </div>
					  <div class="form-group">
						<label>Keterangan Paket</label>
						<textarea class="form-control" name="paket_keterangan" placeholder="Keterangan Paket"></textarea>
					  </div>
					  <div class="form-group">
						<label>Harga Paket</label>
						<input type="number" class="form-control" name="paket_harga" placeholder="Harga Paket">
					  </div>
					  <div class="form-group">
						<label>Lama Kursus (Pertemuan)</label>
						<input type="number" class="form-control" name="paket_lamakursus" placeholder="Lama Kursus (Pertemuan)">
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