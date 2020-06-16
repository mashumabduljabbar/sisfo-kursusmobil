<!DOCTYPE html>
<html>
<head>
	<title>
		PENILAIAN
	</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
<style>
@page {
    background: url('<?php echo base_url(); ?>assets/dist/img/sertifikat.png?<?php echo strtotime("now");?>') no-repeat 0 0;
    background-image-resize: 6;
}

body {font-family: Times New Roman;
	font-size: 0.9em;
}

aside div.aside-title { width: 40%; border-width: 0.4px; padding: 0.5em; position: relative; text-align: left; }
aside div.aside-title { border-radius: 0.1em; border-style: solid; background: #EEE; border-color: #BBB; }

table { border-collapse: separate; border-spacing: 0px; }
th, td { border-radius: 1.1em; border-style: solid; }

table.items {
	border: 0.2px solid black;
}

.items td {
	border: 0.2px solid black;
	padding: 0.4em;
}

.items th {
	text-align: center;
	border: 0.2px solid black;
	padding: 0.4em;
}

table thead td th { 
	text-align: center;
	border: 0.2px solid black;
}
</style>
</head>
<body>
<h5 style="text-align:center;">Jl. Paus No. 30 Rumbai - Pekanbaru</h5>
<br>
<h4 style="text-align:center;"><b>Reg. No. </b></h4>
<br>
<p>Pendidikan dan Pelatihan Mengemudi Mobil STARFI menyatakan bahwa :</p>
<table width="100%">
								<tr>
									<th width="30%">Nama</th>
									<td width="3%">:</td>
									<td width="67%"><?php echo $tbl_user->user_namalengkap;?></td>
								</tr>
								<tr>
									<th width="30%">Tempat / Tanggal Lahir</th>
									<td width="3%">:</td>
									<td width="67%"><?php echo $tbl_user->user_ttl;?></td>
								</tr>
								<tr>
									<th width="30%">Pekerjaan</th>
									<td width="3%">:</td>
									<td width="67%"><?php echo $tbl_user->user_pekerjaan;?></td>
								</tr>
								<tr>
									<th width="30%">Nomor Siswa</th>
									<td width="3%">:</td>
									<td width="67%"><?php echo $tbl_user->user_id;?></td>
								</tr>
								<tr>
									<th>Paket Mengemudi</th>
									<td>:</td>
									<td><?php echo $tbl_paket->paket_judul;?></td>
								</tr>
</table>
<br>
<p>Telah Mengikuti Pendidikan dan Pelatihan Mengemudi yang diselenggarakan dari tanggal <?Php echo $tanggal_mulai;?> sampai dengan <?Php echo $tanggal_selesai;?> dan dinyatakan</p>
<h2 style="text-align:center; font-family: Arial, Helvetica, sans-serif; font-style:italic; color:gold;">Lulus</h2>
<br>
							
							
							<table class="items" width="100%">
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
	<br>
	
<p>Sertifikat ini diberikan kepada yang bersangkutan untuk digunakan sebagai kelengkapan persyaratan mendapatkan Surat Izin Mengemudi.</p>

<br>
<table align="right" width="50%">
								<tr>
									<td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekanbaru, <?php echo $tanggal_hariini;?></td>
								</tr>
								<tr>
									<td style="text-align:center;">Pendidikan dan Pelatihan Mengemudi</td>
								</tr>
								<tr>
									<td style="text-align:center;"><b>STARFI</b></td>
								</tr>
								<tr>
									<td style="text-align:center;">Pimpinan</td>
								</tr>
								<tr>
									<td style="text-align:center;"><br><br><br><br><br></td>
								</tr>
								<tr>
									<td style="text-align:center;">LUTFIUL AMIN., S.Sos</td>
								</tr>
</table>
<br>
<h2 style="text-align:center; font-family: Arial, Helvetica, sans-serif; font-style:italic; color:gold;">Jadilah Pengemudi yang Baik</h2>
<br>
</body>
</html>