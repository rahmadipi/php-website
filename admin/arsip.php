<?php  
	include "../koneksi.php";  
?>
<html>  
	<head><title>Arsip</title></head>
	<body>
		<h2> Arsip Konten</h2>  
		<ol>
			<?php   
			$query = "SELECT A.id, B.kategori, C.sub, A.judul, A.headline, A.isi, A.gambar, A.tanggal FROM konten A, kategori B, sub C WHERE A.id_kategori=B.id_kategori && A.id_sub=C.id_sub ORDER BY A.id DESC";
			$sql = mysql_query($query);  
			while($hasil = mysql_fetch_array($sql)){  
				$id = $hasil['id'];   
				$kategori = stripslashes($hasil['kategori']);
				$sub = stripslashes($hasil['sub']);
				$judul = stripslashes($hasil['judul']);  
				$headline = stripslashes($hasil['headline']);
				$isi = stripslashes($hasil['isi']);
				$gambar = stripslashes($hasil['gambar']);
				$tanggal = stripslashes($hasil['tanggal']);  
	
				echo "<br><li><b>$judul</b><br><img src='../gambar/konten/$gambar' style='float:left'><br>";  
				echo "dengan kategori <b>$kategori</b> dan subnya <b>$sub</b><br>berisi <b>$headline</b><br>$isi<br>pada tanggal <small><b>$tanggal</b></small><div style='clear:both'></div>";
			} 
			?>
		</ol>  
	</body>
</html>