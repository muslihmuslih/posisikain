<!DOCTYPE html>
<html>
<head>
	<title>Cari Posisi Kain</title>
	<meta name="viewport" content="width=devices-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/go.css" />
</head>
<body>
	
	<?php include "./library/koneksi.php" ?>
	<div class="maincontent" align="center" style="margin-top: 100px">
		
		<img src="./images/logocpk.png"> <br><br><br>
		<form method="post" action="./library/proses_cari.php">
			<input type="text" name="cari" placeholder="Masukan SN Kain...." /><br><br><br>
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
			<button class="button">Cari</button>
			<!-- <input type="submit" name="cari2" value="cari"> -->
		</form>
	</div>
</body>
</html>