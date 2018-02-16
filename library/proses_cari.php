<!DOCTYPE html>
<html>
<head>
	<title>Cari Posisi Kain</title>
	<meta name="viewport" content="width=devices-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style/style.css" />
</head>
<body>
	<div class="maincontent" align="center">
		<h1>Hasil Pencarian</h1>
		<br><br>
		<table id="customers" cellspacing="8">
			<tr>
				<th><b>Nama</b></th>
				<th><b>Bulan</b></th>
				<th><b>Tahun</b></th>
				<th><b>SN</b></th>
				<th><b>No Rak</b></th>
			</tr>

		<?php
			include "koneksi.php";
			$cari=$_POST['cari'];
			$cekbulan=$_POST['cmbbulan'];
			$cektahun=$_POST['cmbtahun'];

			if ($cekbulan=='0' && $cektahun=='0') {
				$query="SELECT stocker.nama, bulan.bulan, tahun.thn, kain.sn, kain.rak from kain JOIN stocker on kain.kd_pic=stocker.kd_pic JOIN bulan on kain.kd_bln=bulan.kd_bln JOIN tahun ON kain.kd_thn=tahun.kd_thn where sn = '$cari'";
			} 
			elseif ($cektahun=='0') {
				$query="SELECT stocker.nama, bulan.bulan, tahun.thn, kain.sn, kain.rak from kain JOIN stocker on kain.kd_pic=stocker.kd_pic JOIN bulan on kain.kd_bln=bulan.kd_bln JOIN tahun ON kain.kd_thn=tahun.kd_thn where sn = '$cari' && bulan='$cekbulan'";
			}
			elseif ($cekbulan=='0') {
			 	$query="SELECT stocker.nama, bulan.bulan, tahun.thn, kain.sn, kain.rak from kain JOIN stocker on kain.kd_pic=stocker.kd_pic JOIN bulan on kain.kd_bln=bulan.kd_bln JOIN tahun ON kain.kd_thn=tahun.kd_thn where sn = '$cari' && thn='$cektahun'";
			 } 
			else {
				$query="SELECT stocker.nama, bulan.bulan, tahun.thn, kain.sn, kain.rak from kain JOIN stocker on kain.kd_pic=stocker.kd_pic JOIN bulan on kain.kd_bln=bulan.kd_bln JOIN tahun ON kain.kd_thn=tahun.kd_thn where sn = '$cari' && thn='$cektahun' && bulan='$cekbulan'";
			}

			//$query="SELECT stocker.nama, bulan.bulan, tahun.thn, kain.sn, kain.rak from kain JOIN stocker on kain.kd_pic=stocker.kd_pic JOIN bulan on kain.kd_bln=bulan.kd_bln JOIN tahun ON kain.kd_thn=tahun.kd_thn where sn = '$cari' && thn='$cektahun' && bulan='$cekbulan'";
			$result=mysqli_query($connect,$query);

			if ($result->num_rows > 0) {
				while ($row=$result->fetch_object()) {
					echo "<tr>
							<td>$row->nama</td>
							<td>$row->bulan</td>
							<td>$row->thn</td>
							<td>$row->sn</td>
							<td>$row->rak</td>
						</tr>";
					//echo "$row->sn $row->rak";
				}
			} else {
				//echo "<tr> "SN ". "<b>".$cari."</b>" ."<br>" ."tidak ada di daftar sistem pencarian" </tr>";
				echo "<td colspan='5' align='center'><b> SN  $cari  <br> tidak ada didaftar sistem pencarian </b></td>";
			}
		?>
		</table>
		<br></br>
		<!--<input type="button" value="Kembali" onclick="history.back(-1)" />-->
		<button class="button" onclick="history.back(-1)">Kembali</button>
	</div>
</body>
</html>