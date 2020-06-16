  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
   <section>
		<div class="register-box"> 
			 <p><?php echo $hasildaftar;?></p>
	
			<div class="account-wall">
				
				<div class="col-md-12">
				<?php echo form_open_multipart("beranda/aksi_daftar"); ?>
				  <div class="form-group has-feedback">
					<label>Alamat Email (Username)</label>
					<input type="email" name="user_name" class="form-control" placeholder="Alamat Email Aktif" >
				  </div>
				  <div class="form-group has-feedback">
					<label>Password</label>
					<input type="password" name="user_password" class="form-control" placeholder="Password" id="myInput" >
					<input type="checkbox" onclick="myFunction()">Show Password
				  </div>
				  <div class="form-group has-feedback">
					<label>Nomor Telepon</label>
					<input type="text" name="user_kontak" class="form-control" placeholder="Nomor Telepon, contoh : 0813650xxxxx" >
				  </div>
				  <div class="form-group has-feedback">
					<label>Nama Lengkap</label>
					<input type="text" name="user_namalengkap" class="form-control" placeholder="Nama Lengkap" >
				  </div>
				  <div class="form-group has-feedback">
					<label>TTL</label>
					<input type="text" name="user_ttl" class="form-control" placeholder="Tempat Tanggal Lahir" >
				  </div>
				  <div class="form-group has-feedback">
					<label>Pekerjaan</label>
					<input type="text" name="user_pekerjaan" class="form-control" placeholder="Pekerjaan" >
				  </div>
				  <div class="form-group has-feedback">
					<label>Alamat Lengkap</label>
					<textarea name="user_alamatlengkap" class="form-control" placeholder="Alamat Lengkap" ></textarea>
				  </div>
				  <div class="form-group has-feedback">
					<label>Pilih Cabang Kursus</label>
					<select name="tentangkami_id" class="form-control select2">
						<option value=""></option>
						<?php foreach($tbl_tentangkami as $tentangkami){?>
						<option value="<?php echo $tentangkami->tentangkami_id;?>"><?php echo $tentangkami->tentangkami_namaperusahaan;?></option>
						<?php }?>
					</select>
				  </div>
				  <div class="form-group">
						<label>Foto</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
					</div>
				  <div class="form-group has-feedback">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
				  </div>
				</div>
				<div class="col-md-12">  	  	  
				  <div class="col-md-4">
					  <div class="form-group" style="text-align:center;">
						<img class="img img-responsive user-image" id="blah">
					  </div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
    </section>
  </div>
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