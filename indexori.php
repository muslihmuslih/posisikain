<!DOCTYPE html>
<html>
<head>
	<title>Cari Posisi Kain</title>
	<meta name="viewport" content="width=devices-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
	
	<?php include "./library/koneksi.php" ?>
	<div class="maincontent" align="center">
		<h1>Cari Posisi Kain</h1>
		<form method="post" action="./library/proses_cari.php">
			<h3>Masukan Pilihan Periode SO :</h3>
			<table>
				
				<tr>
					<td>
						<select name="cmbtahun">
							<option value="0" selected>Tahun</option>
							<?php
								$query="select * from tahun order by thn";
								$result=mysqli_query($connect,$query);
								while ($row = mysqli_fetch_assoc($result)) {					 	
								 	echo "<option>$row[thn]</option>";
								 } 
							?>
						</select>
					</td>
					<td>
						<select name="cmbbulan">
							<option value="0">Bulan</option>
							<?php
								$query="select * from bulan order by bulan";
								$result=mysqli_query($connect,$query);
								while ($row = mysqli_fetch_assoc($result)) {
								 	echo "<option>$row[bulan]</option>";
								 } 
							?>
						</select>
					</td>
				</tr>
			</table>
			
			<input type="text" name="cari" placeholder="Masukan SN Kain...." /> <br> <br>
			<button class="button">Cari</button>
			<!-- <input type="submit" name="cari2" value="cari"> -->
		</form>
	</div>
</body>
</html>