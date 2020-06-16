  <!-- Full Width Column -->
  <div class="content-wrapper">
      <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">
						<label>
						<a class="btn-sm btn-primary" href="<?php echo base_url("admin/penilaian_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
						</label>
						</h3>
					</div>
					<div class="box-body">
					<table id="datatablex" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Nama User</th>
							<th>Penjadwaan Ke</th>
							<th>Etika Berkendara</th>
							<th>Teknik Berkendara</th>
							<th>Pemahaman Rambu</th>
							<th>Responsif Berkendara</th>
							<th>Teknik Parkir</th>
							<th width="140px">Action</th>
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
			'order': [[0, 'asc'],[1, 'asc']],
			"ajax": "<?php echo base_url('admin/get_data_master_penilaian');?>" ,
			columnDefs: [{
				   targets: [7],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					return "<a href='<?php echo base_url();?>admin/penilaian_ubah/"+row[7]+"'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> Ubah</button></a> <a onclick=\"return confirm('Yakin untuk menghapus ini ?')\" href='<?php echo base_url();?>admin/penilaian_aksi_hapus/"+row[7]+"'> <button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> Hapus</button></a>";
				   }
				},],
		});
 });
</script>