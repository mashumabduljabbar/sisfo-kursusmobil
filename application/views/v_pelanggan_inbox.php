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
			"ajax": "<?php echo base_url('pelanggan/get_data_master_inbox');?>" ,
		});
 });
</script>