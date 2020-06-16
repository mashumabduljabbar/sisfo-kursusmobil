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
							<th>Nama Paket</th>
							<th>Cabang Kursus</th>
							<th>Jumlah Bayar</th>
							<th>Bukti Transfer</th>
							<th width="140px">Status</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					  </table>
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
			"ajax": "<?php echo base_url('pelanggan/get_data_master_pemesanan');?>" ,
			columnDefs: [{
				   targets: [3],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<a href='#' onclick=\"window.open('<?php echo base_url();?>assets/dist/img/pemesanan/"+row[3]+"','popup','width=700,height=700'); return false;\" target='popup'> <img height='40px' src='<?php echo base_url();?>assets/dist/img/pemesanan/"+row[3]+"'></a>";
				   }
				},{
				   targets: [2],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
						return formatNumber(row[2]);
				   }
				},{
				   targets: [4],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
						if(row[4]==0){
							return "Belum Verifikasi";
						}else if(row[4]==1){
							return "Sudah Verifikasi";
						}
				   }
				},],
		});
 });
</script>