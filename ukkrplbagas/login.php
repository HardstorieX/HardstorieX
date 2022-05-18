<?php 
if (isset($_POST['daftar']))
{
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$text = $nik .",".$nama."\n";
	$fp = fopen('config.txt','a+');

	if(fwrite($fp,$text)) {
		echo "<script>alert('Anda Berhasil Mendaftar!');</script>";
	}
}
else if(isset($_POST['masuk']))
{
	$data = file_get_contents("config.txt");
	$contents = explode("\n", $data);

	foreach($contents as $values){
		$login = explode(",", $values);
		$nik = $login[0];
		$nama = $login[1];

		if($nik == $_POST['nik'] && $nama == $_POST['nama']){
			session_start();
			$_SESSION['username'] = $nama;
			header('location: home.php');
		}else{
			echo '<script>alert("NIK atau Nama Anda Salah!.");</script>';
		}
	}
}
?>

<html>
	<form action="" method="POST">
		<br><br><br><br><br><br><br>
		<table align="center">
			<tr>
				<td><input type="text" name="nik" placeholder="NIK"></td>
			</tr>
			<tr>
				<td><input type="text" name="nama" placeholder="nama lengkap"></td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="daftar" value="Saya Pengguna Baru">
					<input type="submit" name="masuk" value="masuk">
				</td>

			</tr>
		</table>
	</form>
</html>