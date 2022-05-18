<?php 
include "header.php";
session_start();

if(isset($_POST['simpan'])){
	$tanggal = $_POST['tanggal'];
	$jam = $_POST['jam'];
	$lokasi = $_POST['lokasi'];
	$suhu = $_POST['suhu'];
	$nama = $_SESSION['username'];
	$text = $tanggal . "," . $jam . "," . $lokasi . "," . $suhu . "</tr> \n";
	$data = "catatan/$nama.txt";
	$dirname = dirname($data);
	if(!is_dir($dirname)){
		mkdir($dirname, 0755, true);
	}
	$fp = fopen($data, 'a+');
	if(fwrite($fp,$text)){
		echo '<script>alert("Catatan Berhasil Disimpan!.");</script>';
	}
}
 ?>
 <html>
 	<body>
<table border="1" align="center" width="50%" height="60%">
	<td>
	<form action="" method="POST">
		<table align="center">
			<tr>
				<td>Tanggal</td>
				<td><input type="date" name="tanggal"></td>
			</tr>
			<tr>
				<td>Jam</td>
				<td><input type="time" name="jam"></td>
			</tr>
			<tr>
				<td>Lokasi Yang Dikunjungi</td>
				<td><input type="text" name="lokasi"></td>
			</tr>
			<tr>
				<td>Suhu Tubuh</td>
				<td><input type="text" name="suhu"></td>
			</tr>
				<td></td>
				<td align="right"><input type="submit" name="simpan" value="simpan"></td>
			</tr>
		</table>
	</form>
</td>
</table>
</body>
</html>