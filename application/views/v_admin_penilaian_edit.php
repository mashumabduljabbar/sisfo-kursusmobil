  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
       Ubah Penilaian
      </h3>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
				  <div class="row">
				  <?php echo form_open_multipart("admin/penilaian_aksi_ubah/".$tbl_penilaian->penilaian_id); ?>
					<div class="col-md-12">
						<div class="col-md-4">
									<div class="form-group">
										<label>Penilaian Etika Berkendara</label>
										<input type="number" step="0.01" name="penilaian_etikaberkendara" class="form-control" value="<?php echo set_value('penilaian_etikaberkendara', $tbl_penilaian->penilaian_etikaberkendara); ?>">
									</div>
									<div class="form-group">
										<label>Penilaian Teknik Berkendara</label>
										<input type="number" step="0.01" name="penilaian_teknikberkendara" class="form-control" value="<?php echo set_value('penilaian_teknikberkendara', $tbl_penilaian->penilaian_teknikberkendara); ?>">
									</div>
									<div class="form-group">
										<label>Penilaian Pemahaman Rambu</label>
										<input type="number" step="0.01" name="penilaian_pemahamanrambu" class="form-control" value="<?php echo set_value('penilaian_pemahamanrambu', $tbl_penilaian->penilaian_pemahamanrambu); ?>">
									</div>
									<div class="form-group">
										<label>Penilaian Responsif Berkendara</label>
										<input type="number" step="0.01" name="penilaian_responsifberkendara" class="form-control" value="<?php echo set_value('penilaian_responsifberkendara', $tbl_penilaian->penilaian_responsifberkendara); ?>">
									</div>
									<div class="form-group">
										<label>Penilaian Teknik Parkir </label>
										<input type="number" step="0.01" name="penilaian_teknikparkir" class="form-control" value="<?php echo set_value('penilaian_teknikparkir', $tbl_penilaian->penilaian_teknikparkir); ?>">
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