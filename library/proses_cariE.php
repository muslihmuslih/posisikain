<!DOCTYPE html>
<html>
<head>
	<title>Cari Posisi Kain</title>
	<meta name="viewport" content="width=devices-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style/style.css" />
</head>
<body>
	<div class="maincontent" align="center">
		<h1>Hasil Pencarian</h1>
		<table cellspacing="8">
		<?php
			include "koneksi.php";
			$cari=$_POST['cari'];
			$query="select sn, rak from kain where sn='$cari'";	
			$result=mysqli_query($connect,$query);

			if ($result->num_rows > 0) {
				while ($row=$result->fetch_object()) {
					echo "<tr align='center' bgcolor='orange'>
							<td><b>SN Kain</b></td>
							<td><b>No Rak</b></td>
						</tr>";
					echo "<tr align='center'>
							<td>$row->sn</td>
							<td>$row->rak</td>
						</tr>";
					//echo "$row->sn $row->rak";
				}
			} else {
				echo "SN ". "<b>".$cari."</b>" ."<br>" ."tidak ada di daftar sistem pencarian";
			}
		?>
		</table>
		<br></br>
		<input type="button" value="Kembali" onclick="history.back(-1)" />
	</div>
</body>
</html>