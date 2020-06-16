  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
    <section>
		<div class="register-box"> 
			<div class="account-wall">
				<?php echo $hasillogin;?></h5>
				<form action="<?php echo base_url('beranda/aksi_login'); ?>" method="post" class="form-signin" >
				  <div class="form-group has-feedback">
					<input type="text" name="user_name" class="form-control" placeholder="Username" >
					<span class="fa fa-user form-control-feedback"></span>
				  </div>
				  
				  <div class="form-group has-feedback">
					<input type="password" name="user_password" class="form-control" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				  </div>
				  
				  <div class="form-group has-feedback">
					<br>
				  </div>
				  <div class="form-group has-feedback">
					<button type="submit" class="btn btn-success btn-block btn-flat">Login</button>
				  </div>
				  <div class="form-group has-feedback">
					<a href="<?php echo base_url('beranda/daftar');?>"><button type="button" class="btn btn-primary btn-block btn-flat">Daftar</button></a>
				  </div>
				</form>
			</div>
		</div>
    </section>
  </div>
  </div>