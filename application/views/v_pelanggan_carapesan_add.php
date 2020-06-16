<?php
$geturl1 = $this->uri->segment(3);
$geturl2 = $this->uri->segment(4);
?>
  <div class="content-wrapper" >
    <section class="content-header">
      <h3>
        Melakukan Pemesanan Jadwal Kursus
      </h3>
    </section>

    <!-- Main content -->
    <section class="content" >
      <div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">
						<span>Silahkan melengkapi form berikut</span>
					</h3>
				</div>
				<div class="box-body">
				  <div class="row">
				  <?php echo form_open_multipart("pelanggan/carapesan_aksi_tambah"); ?>
					<div class="col-md-4">
					  <div class="form-group has-feedback">
						<label>Pilih Paket Kursus</label>
						<select onchange="location = '<?php echo base_url();?>pelanggan/carapesan_tambah/'+this.value+'/<?php echo $geturl2;?>';" name="paket_id" class="form-control select2">
							<?php if($geturl1!=""){
								echo "<option value='$tbl_paket_by->paket_id'>$tbl_paket_by->paket_judul</option>";
							}else{
								echo "<option>Pilih Paket Kursus</option>";
							}
							
							foreach($tbl_paket as $paket){?>
							<option value="<?php echo $paket->paket_id;?>"><?php echo $paket->paket_judul;?></option>
							<?php }?>
						</select>
					  </div>
					  <?php if($geturl1!=""){?>
					  <div class="form-group has-feedback">
						<table class="table table-bordered" width="100%">
							<tr>
								<th colspan="3">Informasi Paket</th>
							</tr>
							<tr>
								<td>Harga Paket</td>
								<td>:</td>
								<td><?php echo number_format($tbl_paket_by->paket_harga);?></td>
							</tr>
							<tr>
								<td>Lama Kursus</td>
								<td>:</td>
								<td><?php echo $tbl_paket_by->paket_lamakursus;?></td>
							</tr>
						</table>
						<br>
						<table class="table table-bordered" width="100%">
							<tr>
								<th colspan="3">Informasi Cara Pembayaran</th>
							</tr>
							<tr>
								<td>Transfer Ke Rekening :<br>
								<br>Bank BCA KCU Menara Bidakara
								<br>No. Rek 4500213791
								<br>a.n Ma’shum Abdul Jabbar
								</td>
							</tr>
						</table>						
					  </div>
					  <?php }?>
					</div>
					<div class="col-md-4">
					  <div class="form-group has-feedback">
						<label>Pilih Cabang Kursus</label>
						<select onchange="location = '<?php echo base_url();?>pelanggan/carapesan_tambah/<?php echo $geturl1;?>/'+this.value;" name="tentangkami_id" class="form-control select2">
							<?php if($geturl2!=""){
								echo "<option value='$tbl_tentangkami_by->tentangkami_id'>$tbl_tentangkami_by->tentangkami_namaperusahaan</option>";
							}else{
								echo "<option>Pilih Cabang Kursus</option>";
							}
							
							foreach($tbl_tentangkami as $tentangkami){?>
							<option value="<?php echo $tentangkami->tentangkami_id;?>"><?php echo $tentangkami->tentangkami_namaperusahaan;?></option>
							<?php }?>
						</select>
					  </div>
					   <?php if($geturl2!=""){?>
					  <div class="form-group has-feedback">
						<table class="table table-bordered" width="100%">
							<tr>
								<td><img width="185vw" class="img img-responsive" src="<?php echo base_url("assets/dist/img/tentangkami/$tbl_tentangkami_by->tentangkami_foto")."?".strtotime("now");?>"/></td>
								<td><?php echo $tbl_tentangkami_by->tentangkami_alamatperusahaan;?></td>
							</tr>
							<tr>
								<td colspan="2"><div id="googleMap" style="width:100%;height:280px;"></div></td>
							</tr>
						</table>					  
					  </div>
					  <?php }?>
					</div>
					<div class="col-md-4">
					  <div class="form-group">
						<label>Jumlah Pembayaran</label>
						<input type="number" class="form-control" name="pemesanan_jumlahbayar">
					  </div>
					  <div class="form-group">
						<label>Upload Bukti Pembayaran</label>
						<input type="file" onchange="readURL(this);"  class="form-control" name="userfiles">
					  </div>
					  <div class="form-group" style="text-align:center;">
						<img class="img img-responsive user-image" style="width:100%;height:350px;" id="blah">
					  </div>
					  <div class="form-group">
						<input type="submit" value="Submit" class="btn btn-success">
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
  <script src="http://maps.googleapis.com/maps/api/js"></script>
 <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


function initialize() {
  var propertiPeta = {
    center:new google.maps.LatLng(<?php echo $tbl_tentangkami_by->tentangkami_koordinatlatitude;?>,<?php echo $tbl_tentangkami_by->tentangkami_koordinatlongitude;?>),
    zoom:12,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  
  var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
  
  // membuat Marker
  var marker=new google.maps.Marker({
      position: new google.maps.LatLng(<?php echo $tbl_tentangkami_by->tentangkami_koordinatlatitude;?>,<?php echo $tbl_tentangkami_by->tentangkami_koordinatlongitude;?>),
      map: peta,
      animation: google.maps.Animation.BOUNCE
  });

}

// event jendela di-load  
google.maps.event.addDomListener(window, 'load', initialize);
</script>