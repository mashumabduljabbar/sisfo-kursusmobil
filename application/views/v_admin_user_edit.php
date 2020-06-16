  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Ubah User
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
				  <?php echo form_open_multipart("admin/user_aksi_ubah/".$tbl_user->user_id); ?>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Username</label>
						<input type="text" class="form-control" name="user_name" value="<?php echo set_value('user_name', $tbl_user->user_name); ?>">
					  </div>
					  <div class="form-group">
						<label>Password</label>
						<input type="password" name="user_password[]" class="form-control" value="<?php echo set_value('user_password', $tbl_user->user_password); ?>">
						<input type="hidden" name="user_password[]" value="<?php echo set_value('user_password', $tbl_user->user_password); ?>">
					  </div>
					  
					  <div class="form-group">
						<label>Pilih Level</label>
						<select name="user_level" class="form-control select2">
							<option value="<?php echo set_value('user_level', $tbl_user->user_level); ?>"><?php echo set_value('user_level', $tbl_user->user_level); ?></option>
							<option value="admin">Admin</option>
							<option value="pelanggan">Pelanggan</option>
						</select>
					  </div>
					  <div class="form-group">
						<label>Pilih Status</label>
						<select name="user_status" class="form-control select2">
							<option value="<?php echo set_value('user_status', $tbl_user->user_status); ?>"><?php 
							$status = array("Tidak Aktif","Aktif");
							echo $status[$tbl_user->user_status]; ?></option>
							<option value="0">Tidak Aktif</option>
							<option value="1">Aktif</option>
						</select>
					  </div>
					  <div class="form-group">
					<label>Nomor Telepon</label>
					<input type="text" name="user_kontak" class="form-control" value="<?php echo set_value('user_kontak', $tbl_user->user_kontak); ?>">
					  </div>
					  <div class="form-group">
						<label>Nama Lengkap</label>
						<input type="text" name="user_namalengkap" class="form-control" value="<?php echo set_value('user_namalengkap', $tbl_user->user_namalengkap); ?>">
					  </div>
					  <div class="form-group">
						<label>TTL</label>
						<input type="text" name="user_ttl" class="form-control" value="<?php echo set_value('user_namalengkap', $tbl_user->user_namalengkap); ?>">
					  </div>
					  <div class="form-group">
						<label>Pekerjaan</label>
						<input type="text" name="user_pekerjaan" class="form-control" value="<?php echo set_value('user_namalengkap', $tbl_user->user_namalengkap); ?>">
					  </div>
					  <div class="form-group">
						<label>Alamat Lengkap</label>
						<textarea name="user_alamatlengkap" class="form-control"><?php echo set_value('user_name', $tbl_user->user_namalengkap); ?></textarea>
					  </div>
					  <div class="form-group">
						<label>Pilih Cabang Kursus</label>
						<select name="tentangkami_id" class="form-control select2">
							<option value="<?php echo $tbl_tentangkami_by->tentangkami_id;?>"><?php echo $tbl_tentangkami_by->tentangkami_namaperusahaan;?></option>
							<?php foreach($tbl_tentangkami as $tentangkami){?>
							<option value="<?php echo $tentangkami->tentangkami_id;?>"><?php echo $tentangkami->tentangkami_namaperusahaan;?></option>
							<?php }?>
						</select>
					  </div>
					  <div class="form-group">
						<label>Foto</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
						<input type="hidden" name="user_foto" value="<?php echo set_value('user_foto', $tbl_user->user_foto); ?>">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
					  </div>
					</div>
					<div class="col-md-4">
					  <div class="form-group" style="text-align:center;">
						<img class="img img-responsive user-image" id="blah" src="<?php echo base_url();?>assets/dist/img/avatar/<?php echo $tbl_user->user_foto."?".strtotime("now");?>">
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
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
		
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>