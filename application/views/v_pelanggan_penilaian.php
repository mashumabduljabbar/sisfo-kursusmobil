<?php
$geturl1 = $this->uri->segment(3);
?>
  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
       Penilaian
      </h3>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body">
				  <div class="row">
					<div class="col-md-4">
					  <div class="form-group has-feedback">
						<label>Pilih Jadwal</label>
						<select onchange="location = '<?php echo base_url();?>pelanggan/penilaian/'+this.value;" name="penjadwalan_id" class="form-control select2">
							<?php if($geturl1!=""){
								echo "<option value='$tbl_penjadwalan_by->penjadwalan_id'>$tbl_penjadwalan_by->paket_judul Penjadwalan Ke-$tbl_penjadwalan_by->penjadwalan_ke</option>";
							}else{
								echo "<option>Pilih Jadwal</option>";
							}
							
							foreach($tbl_penjadwalan as $penjadwalan){?>
							<option value="<?php echo $penjadwalan->penjadwalan_id;?>"><?php echo $penjadwalan->paket_judul;?> Penjadwalan Ke-<?php echo $penjadwalan->penjadwalan_ke;?></option>
							<?php }?>
						</select>
					  </div>
					  <?php if($geturl1!=""){?>
					  <div class="form-group has-feedback">
							<table class="table table-bordered">
								<tr>
									<th>Penilaian Etika Berkendara</th>
									<td>:</td>
									<td><?php echo $tbl_penilaian_by->penilaian_etikaberkendara;?></td>
								</tr>
								<tr>
									<th>Penilaian Teknik Berkendara </th>
									<td>:</td>
									<td><?php echo $tbl_penilaian_by->penilaian_teknikberkendara;?></td>
								</tr>
								<tr>
									<th>Penilaian Pemahaman Rambu </th>
									<td>:</td>
									<td><?php echo $tbl_penilaian_by->penilaian_pemahamanrambu;?></td>
								</tr>
								<tr>
									<th>Penilaian Responsif Berkendara</th>
									<td>:</td>
									<td><?php echo $tbl_penilaian_by->penilaian_responsifberkendara;?></td>
								</tr>
								<tr>
									<th>Penilaian Teknik Parkir </th>
									<td>:</td>
									<td><?php echo $tbl_penilaian_by->penilaian_teknikparkir;?></td>
								</tr>
							</table>
							
							<table class="table table-bordered">
								<tr>
									<th colspan="3">RATA-RATA PENILAIAN PADA SETIAP PERTEMUAN</th>
								</tr>
								<tr>
									<th>Penilaian Etika Berkendara</th>
									<td>:</td>
									<td><?php echo number_format($tbl_penilaian_ratarata->penilaian_etikaberkendara,2);?></td>
								</tr>
								<tr>
									<th>Penilaian Teknik Berkendara </th>
									<td>:</td>
									<td><?php echo number_format($tbl_penilaian_ratarata->penilaian_teknikberkendara,2);?></td>
								</tr>
								<tr>
									<th>Penilaian Pemahaman Rambu </th>
									<td>:</td>
									<td><?php echo number_format($tbl_penilaian_ratarata->penilaian_pemahamanrambu,2);?></td>
								</tr>
								<tr>
									<th>Penilaian Responsif Berkendara</th>
									<td>:</td>
									<td><?php echo number_format($tbl_penilaian_ratarata->penilaian_responsifberkendara,2);?></td>
								</tr>
								<tr>
									<th>Penilaian Teknik Parkir </th>
									<td>:</td>
									<td><?php echo number_format($tbl_penilaian_ratarata->penilaian_teknikparkir,2);?></td>
								</tr>
							</table>
					  </div>
					  <?php }?>
					</div>
					<div class="col-md-4">
						<div class="form-group has-feedback">
							<label>Cetak Semua Penilaian</label>
							<table class="table table-bordered">
								<tr>
									<th>PAKET</th>
									<th>AKSI</th>
								</tr>
								<?php foreach($tbl_paket as $paket){?>
								<tr>
									<th><?php echo $paket->paket_judul;?></th>
									<td><a class="btn btn-sm btn-success" href="<?php echo base_url("pelanggan/penilaian_cetak/$paket->paket_id");?>"><i class="fa fa-print"></i> CETAK</a></td>
								</tr>
								<?php }?>
							</table>
						</div>
						<div class="form-group has-feedback">
							<label>Cetak Sertifikat</label>
							<table class="table table-bordered">
								<tr>
									<th>PAKET</th>
									<th>AKSI</th>
								</tr>
								<?php foreach($tbl_paket as $paket){?>
								<tr>
									<th><?php echo $paket->paket_judul;?></th>
									<td><a class="btn btn-sm btn-success" href="<?php echo base_url("pelanggan/sertifikat_cetak/$paket->paket_id");?>"><i class="fa fa-print"></i> CETAK</a></td>
								</tr>
								<?php }?>
							</table>
						</div>
					</div>
				  </div>
				</div>
			</div>
		</div>
      </div>
    </section>
  </div>