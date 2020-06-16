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
body {font-family: Times New Roman;
	font-size: 0.6em;
}

aside div.aside-title { width: 40%; border-width: 0.4px; padding: 1em; position: relative; text-align: left; }
aside div.aside-title { border-radius: 0.1em; border-style: solid; background: #EEE; border-color: #BBB; }

table { border-collapse: separate; border-spacing: 0px; }
th, td { border-radius: 1.1em; border-style: solid; }

table.items {
	border: 0.2px solid black;
}

.items td {
	border: 0.2px solid black;
	padding: 1em;
}

.items th {
	text-align: center;
	border: 0.2px solid black;
	padding: 1em;
}

table thead td th { 
	text-align: center;
	border: 0.2px solid black;
}
</style>
</head>
<body>
<h3 style="text-align:center;"><b>PENILAIAN</b></h3>
<h3 style="text-align:center;"><b></b></h3>
<br>
<br>
<table class="items" width="100%">
								<tr>
									<th>Nama</th>
									<td>:</td>
									<td><?php echo $tbl_user->user_namalengkap;?></td>
								</tr>
								<tr>
									<th>Paket</th>
									<td>:</td>
									<td><?php echo $tbl_paket->paket_judul;?></td>
								</tr>
</table>
<br>
							<table class="items" width="100%">
								<tr>
									<th>Pertemuan Ke</th>
									<th>Penilaian Etika Berkendara</th>
									<th>Penilaian Teknik Berkendara </th>
									<th>Penilaian Pemahaman Rambu </th>
									<th>Penilaian Responsif Berkendara</th>
									<th>Penilaian Teknik Parkir </th>
								</tr>
								<?php foreach($tbl_penilaian->result() as $tblpenilaian) { ?>
								<tr>
									<td><?php echo $tblpenilaian->penjadwalan_ke;?></td>
									<td><?php echo $tblpenilaian->penilaian_etikaberkendara;?></td>
									<td><?php echo $tblpenilaian->penilaian_teknikberkendara;?></td>
									<td><?php echo $tblpenilaian->penilaian_pemahamanrambu;?></td>
									<td><?php echo $tblpenilaian->penilaian_responsifberkendara;?></td>
									<td><?php echo $tblpenilaian->penilaian_teknikparkir;?></td>
								</tr>
								<?php }?>
							</table>
							<br><br>
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
</body>
</html>