<?php
$tahun = $this->uri->segment(3);

if($tahun!=""){
	$bulan = $this->uri->segment(4);
}else{
	$bulan = "";
}
?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
      <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"> <label> LAPORAN BULANAN KURSUS MENGEMUDI </label> </h3>
						<br><h3 class="box-title"> 
						<label> 
							<select onchange="location = '<?php echo base_url();?>admin/laporan/'+this.value+'/<?php echo $bulan;?>';" class="form-control select2">
								<?php if($tahun!=""){
									echo "<option value='$tahun'>$tahun</option>";
								}else{
									echo "<option>Pilih Tahun</option>";
								}
								?>
								<option value="2020">2020</option>
								<option value="2019">2019</option>
								<option value="2018">2018</option>
								<option value="">Semua</option>
							</select>
						</label> 
						<label> 
							<select onchange="location = '<?php echo base_url();?>admin/laporan/<?php echo $tahun;?>/'+this.value;" class="form-control select2">
								<?php if($bulan!="" AND $tahun!=""){
									echo "<option value='$bulan'>$bulan</option>";
								}else{
									echo "<option>Pilih Bulan</option>";
								}
								
								if($tahun!=""){?>
								<option value="1">Januari</option>
								<option value="2">Februari</option>
								<option value="3">Maret</option>
								<option value="4">April</option>
								<option value="5">Mei</option>
								<option value="6">Juni</option>
								<option value="7">Juli</option>
								<option value="8">Agustus</option>
								<option value="9">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
								<option value="">Semua</option>
								<?php }
								?>
							</select>
						</label> 
						</h3>
					</div>
					
					<div class="box-body">
					<table id="datatablex" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Waktu</th>
							<th>Username</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Paket</th>
							<th>Harga</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					  </table>
					</div>
					
					<div class="box-footer">
						<h3 class="box-title"> <label> <a class="btn btn-sm btn-success" href="<?php echo base_url("admin/laporan_cetak/$tahun/$bulan");?>"><i class="fa fa-print"></i> CETAK</a> </label> </h3>
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
function formatNumber(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}
$(function () {
$('#datatablex').DataTable({
			"processing": true,
			"serverSide": true,
			"autoWidth": true,
			"paging": true,
			"info": true,
			'order': [[0, 'asc']],
			"ajax": "<?php echo base_url('admin/get_data_master_laporan/'.$tahun.'/'.$bulan);?>" ,
			columnDefs: [{
				   targets: [5],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
						return formatNumber(row[5]);
				   }
				},],
		});
 });
</script>