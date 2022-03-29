<?php
	include "../koneksi.php";
	if(isset($_POST['Input'])) {
		$judul = addslashes (strip_tags($_POST['judul']));
		$kategori = $_POST['kategori'];
		$sub = $_POST['sub'];
		$headline = addslashes(strip_tags($_POST['headline']));
		$isi = addslashes (strip_tags($_POST['isi']));
		$gambar = addslashes (strip_tags($_POST['gambar']));
		$query = "INSERT INTO konten
		VALUES(' ','$kategori','$sub','$judul','$headline','$isi','$gambar',now())";
		$sql = mysql_query ($query);
		if($sql) {
			echo "Konten berhasil ditambahkan";
		} else {
			echo "Konten gagal ditambahkan";
		}
	}
?>
<html>
	<head><title>Admin Panel</title></head>
	<body>
		<form action="" method="POST" name="input">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td colspan=2>Admin Panel</td>
				</tr>
				<tr>
					<td width="200">Judul</td>
					<td>: <input type="text" name="judul" size="30"></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>: <select name="kategori">
					<?php
						$query = "SELECT id_kategori, kategori FROM kategori ORDER BY kategori";
						$sql = mysql_query ($query);
						while ($hasil = mysql_fetch_array ($sql)) {
							echo "<option value='$hasil[id_kategori]'>$hasil[kategori]</option>";
						}
					?>
					</select></td>
				</tr>
				<tr>
					<td>Sub</td>
					<td>: <select name="sub">
					<?php
						$query = "SELECT id_sub, sub FROM sub ORDER BY sub";
						$sql = mysql_query ($query);
						while ($hasil = mysql_fetch_array ($sql)) {
							echo "<option value='$hasil[id_sub]'>$hasil[sub]</option>";
						}
					?>
					</select></td>
				</tr>
				<tr>
					<td>Headline</td>
					<td>: <input type="text" name="headline" size="30"></td>
				</tr>
				<tr>
					<td>Isi</td>
					<td>: <textarea name="isi" cols="50" rows="10"></textarea></td>
				</tr>
				<tr>
					<td>Gambar</td>
					<td>: <input type="text" name="gambar" size="30"></td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="Input" value="Input Konten">
					<input type="reset" name="reset" value="cancel"></td>
				</tr>
			</table>
		</form>
	</body>
</html>
