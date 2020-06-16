<style>
.c8tableBody  {
	width:100%;
    overflow-x:scroll;
}
</style>
<?php
$geturl1 = $this->uri->segment(3);
$geturl2 = $this->uri->segment(4);
$date = date("Y-m-d H:i:s");
?>
  <div class="content-wrapper">
      <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
						<table>
							<tr>
								<td>Waktu Hari ini</td>
							</tr>
							<tr>
								<td>Tanggal & Waktu : <?php echo $date;?></td>
							</tr>
						</table>
					</div>
					<div class="box-body">
					<table id="datatablex" class="c8tableBody table table-bordered table-striped display responsive nowrap" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>Hari/Tanggal</th>
							<th>Waktu</th>
							<th>Username</th>
							<th>Nama</th>
							<th>Alamat</th>
							<th>Pertemuan Ke</th>
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
			'dom':'<"c8tableTools01"Bf><"c8tableBody"t><"c8tableTools02"lipr>',
			"processing": true,
			"serverSide": true,
			"autoWidth": true,
			"paging": true,
			"info": true,
			'scrollCollapse': true,
			'order': [[0, 'asc'],[1, 'asc']],
			"ajax": "<?php echo base_url('admin/get_data_master_penjadwalan/'.$geturl1.'/'.$geturl2);?>" ,
			
		});
 });
</script>