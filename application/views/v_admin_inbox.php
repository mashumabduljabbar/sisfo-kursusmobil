<?php
$geturl1 = $this->uri->segment(3);
?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
      <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
					<table id="datatablex" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Pengirim</th>
							<th>waktu</th>
							<th>Pesan</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					  </table>
					  
					  <br><br>
					  <div class="col-xs-12">
						 <?php if($geturl1!=""){?>
					  <div class="form-group has-feedback">
							<table class="table table-bordered">
								<tr>
									<th>RINCIAN</th>
									<th>Lakukan Konfirmasi? <a onclick="return confirm('Yakin untuk Verifikasi Pembayaran ini ?')" href='<?php echo base_url();?>admin/inbox_aksi_ubah/<?php echo $tbl_pemesanan->pemesanan_id;?>'> <button type='button' class='btn btn-xs btn-warning'> Ya</button></a></th>
								</tr>
							</table>
							<table class="table table-bordered">
								<tr>
									<td>
										<table>
											<tr>
												<th>Username</th> <td>:</td> <td><?php echo $tbl_user->user_name;?></td>
											</tr>
											<tr>
												<th>Nama</th> <td>:</td> <td><?php echo $tbl_user->user_namalengkap;?></td>
											</tr>
											<tr>
												<th>Alamat</th> <td>:</td> <td><?php echo $tbl_user->user_alamatlengkap;?></td>
											</tr>
										</table>
									</td>
									<td rowspan="2">
										<img height='200px' src='<?php echo base_url();?>assets/dist/img/pemesanan/<?php echo$tbl_pemesanan->pemesanan_buktibayar;?>'>
									</td>
								</tr>
								<tr>
									<td>TELAH MELAKUKAN PEMBAYARAN KURSUS MENGEMUDI.<br>
									KET :<br>
										<table>
											<tr>
												<th>PAKET HARGA</th> <td>:</td> <td><?php echo $tbl_paket->paket_harga;?></td>
											</tr>
											<tr>
												<th>LAMA KURSUS</th> <td>:</td> <td><?php echo $tbl_paket->paket_lamakursus;?></td>
											</tr>
											<tr>
												<th>CABANG STARFI</th> <td>:</td> <td><?php echo $tbl_tentangkami->tentangkami_namaperusahaan;?></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
					  </div>
					  <?php }?>
					  </div>
					</div>
				</div>
			</div>
		</div>
      </section>
</div>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script>
$(function () {
$('#datatablex').DataTable({
			"processing": true,
			"serverSide": true,
			"autoWidth": true,
			"paging": true,
			"info": true,
			'order': [[1, 'desc']],
			"ajax": "<?php echo base_url('admin/get_data_master_inbox');?>" ,
		});
 });
</script>