  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <section class="content">
		<div class="col-xs-12">
			<h3> TESTIMONI </h3>
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped display nowrap" cellspacing="0" width="100%">
						<thead>
						</thead>
						<tbody>
				<?php 
				foreach($tbl_testimoni as $testimoni){?>
				<tr>
				<td>
				<div class="box-footer box-comments">
				  <div class="box-comment">
	<img class="img-circle img-sm" src="<?php echo base_url("assets/dist/img/testimoni/$testimoni->testimoni_foto")."?".strtotime("now");?>" />
					<div class="comment-text">
						  <span class="username">
							<?php echo $testimoni->testimoni_namauser;?>
							<span class="text-muted pull-right"><?php echo $testimoni->testimoni_created;?></span>
						  </span> <p style="text-align:justify;"><?php echo $testimoni->testimoni_keterangan;?></p>
					</div>
				  </div>
				</div>
				</td>
				</tr>
				<?php }?>
						</tbody>
				</table>
			</div>
		</div>
      </section>
    </div>
  </div>
  
  <footer class="main-footer"  style="text-align:center;">
    <div class="pull-right hidden-xs">
    </div>
    <strong><small>Copyright &copy; 2019</small></strong> 
  </footer>