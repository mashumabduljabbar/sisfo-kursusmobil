<!DOCTYPE html>
<html>
<head>
	<title>
		LAPORAN
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
<h3 style="text-align:center;"><b>LAPORAN</b></h3>
<h3 style="text-align:center;"><b></b></h3>
<table class="" width="100%">
	<tr>
		<td> Bulan </td>
		<td> : </td>
		<td> <?php echo $bulan;?> </td>
	</tr>
	<tr>
		<td> Tahun </td>
		<td> : </td>
		<td> <?php echo $tahun;?> </td>
	</tr>
</table>
<br>
<br>
	<table class="items" width="100%">
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
			<?php foreach($tbl_laporan as $laporan){ 
			$pemesanan_jumlahbayar = number_format($laporan->pemesanan_jumlahbayar);
			echo"
			<tr>
				<td>$laporan->pemesanan_created</td>
				<td>$laporan->user_name</td>
				<td>$laporan->user_namalengkap</td>
				<td>$laporan->user_alamatlengkap</td>
				<td>$laporan->paket_judul</td>
				<td>$pemesanan_jumlahbayar</td>
			</tr>
			"; }?>
		</tbody>
	 </table>
</body>
</html>