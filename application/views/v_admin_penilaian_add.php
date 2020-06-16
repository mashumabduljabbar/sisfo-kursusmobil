<?php
$geturl1 = $this->uri->segment(3);
$geturl2 = $this->uri->segment(4);
?>
  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
       Tambah Penilaian
      </h3>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
				  <div class="row">
				  <?php echo form_open_multipart("admin/penilaian_aksi_tambah"); ?>
					<div class="col-md-12">
						<div class="col-md-4">
						  <div class="form-group">
							<label>Pilih User</label>
							<select onchange="location = '<?php echo base_url();?>admin/penilaian_tambah/'+this.value+'/<?php echo $geturl2;?>';" name="user_id" class="form-control select2">
								<?php if($geturl1!=""){
									echo "<option value='$tbl_user_by->user_id'>$tbl_user_by->user_name - $tbl_user_by->user_namalengkap</option>";
								}else{
									echo "<option>Pilih User</option>";
								}
								
								foreach($tbl_user as $user){?>
								<option value="<?php echo $user->user_id;?>"><?php echo $user->user_name;?> - <?php echo $user->user_namalengkap;?></option>
								<?php }?>
							</select>
						  </div>
						  <div class="form-group">
							<label>Pilih Jadwal</label>
							<select onchange="location = '<?php echo base_url();?>admin/penilaian_tambah/<?php echo $geturl1;?>/'+this.value;" name="penjadwalan_id" class="form-control select2">
								<?php if($geturl2!=""){
									echo "<option value='$tbl_penjadwalan_by->penjadwalan_id'>$tbl_penjadwalan_by->paket_judul Penjadwalan Ke-$tbl_penjadwalan_by->penjadwalan_ke</option>";
								}else{
									echo "<option>Pilih Jadwal</option>";
								}
								
								foreach($tbl_penjadwalan as $penjadwalan){?>
								<option value="<?php echo $penjadwalan->penjadwalan_id;?>"><?php echo $penjadwalan->paket_judul;?> Penjadwalan Ke-<?php echo $penjadwalan->penjadwalan_ke;?></option>
								<?php }?>
							</select>
						  </div>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="col-md-4">
									<div class="form-group">
										<label>Penilaian Etika Berkendara</label>
										<input type="number" step="0.01" name="penilaian_etikaberkendara" class="form-control">
									</div>
									<div class="form-group">
										<label>Penilaian Teknik Berkendara</label>
										<input type="number" step="0.01" name="penilaian_teknikberkendara" class="form-control">
									</div>
									<div class="form-group">
										<label>Penilaian Pemahaman Rambu</label>
										<input type="number" step="0.01" name="penilaian_pemahamanrambu" class="form-control">
									</div>
									<div class="form-group">
										<label>Penilaian Responsif Berkendara</label>
										<input type="number" step="0.01" name="penilaian_responsifberkendara" class="form-control">
									</div>
									<div class="form-group">
										<label>Penilaian Teknik Parkir </label>
										<input type="number" step="0.01" name="penilaian_teknikparkir" class="form-control">
									</div>
									<div class="form-group">
									<input type="submit" value="Submit" class="btn btn-success">
								  </div>
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