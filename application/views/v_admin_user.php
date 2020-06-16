  <!-- Full Width Column -->
  <div class="content-wrapper">
      <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">
						<label>
						<a class="btn-sm btn-primary" href="<?php echo base_url("admin/user_tambah");?>"><i class="fa fa-plus"></i> <span>Tambah</span></a>
						</label>
						</h3>
					</div>
					<div class="box-body">
					<table id="datatablex" class="table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Username</th>
							<th>Nama Lengkap</th>
							<th>Level</th>
							<th>Cabang</th>
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
			'order': [[2, 'asc'],[1, 'asc']],
			"ajax": "<?php echo base_url('admin/get_data_master_user');?>" ,
			columnDefs: [{
				   targets: [4],
				   data: null,
				   render: function ( data, type, row, meta ) {                   
					
					var status = row[5];
					
					if(status==0){
						var konfirmasi = " <a onclick=\"return confirm('Yakin untuk aktivasi user ini ?')\" title='Aktivasi' href='<?php echo base_url();?>admin/user_aktivasi/"+row[4]+"'> <button type='button' class='btn btn-sm btn-success'><i class='fa fa-check'></i> Aktivasi</button></a> ";
					}else{
						var konfirmasi = "";
					}
					
					return konfirmasi+"<a title='Ubah' href='<?php echo base_url();?>admin/user_ubah/"+row[4]+"'> <button type='button' class='btn btn-sm btn-warning'><i class='fa fa-pencil'></i> </button></a> <a title='Hapus' onclick=\"return confirm('Yakin untuk menghapus ini ?')\" href='<?php echo base_url();?>admin/user_aksi_hapus/"+row[4]+"'> <button type='button' class='btn btn-sm btn-danger'><i class='fa fa-trash'></i> </button></a>";
				   }
				},],
		});
 });
</script>