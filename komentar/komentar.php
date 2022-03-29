<?php
	include "../koneksi.php";
	if (isset($_POST['Kirim'])){
		$nama = addslashes(strip_tags($_POST['nama']));
		$email = addslashes(strip_tags($_POST['email']));
		$komentar = addslashes(strip_tags($_POST['komentar']));
		$query = "insert into komentar values(' ','$nama','$email','$komentar',now())";
		$sql = mysql_query($query);
	}
?>
<html>
	<head>
		<title>Rp</title>
		<link rel="shortcut icon" href="../gambar/logo/Rp.ico"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<script type="text/javascript" src="../js/script.js"></script>
	</head>
	<body onLoad="jam(),tanggal()">
		<div class=all2>
			<div class=menubar style="position:fixed;top:0;">
				<center>
					<?php
					echo "
					<ul>
						<li><a href='../index.php'>Home</a>
						<li><a href='../index.php?mode=jurnal'>Jurnal TI</a>
						<li><a href='../index.php?mode=tutorial'>Tutorial</a>
						<li><a href='../komentar/komentar.php'>Komentar</a>
					</ul>
					";
					?>
				</center>
			</div>
			<div style="height:30;width:100%">&nbsp;</div>
			<div class=konten>
				<div class=kiri>
					<div class='judul ani'>Komentar</div>
					<div class='komentar'>
		<form action="" method="POST" name="input">
			<table cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td width="100">Nama</td>
					<td>: </td>
					<td>&nbsp;<input type="text" name="nama" size="30"></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>: </td>
					<td>&nbsp;<input type="text" name="email" size="30"></td>
				</tr>
				<tr valign=top>
					<td>Komentar</td>
					<td>: </td>
					<td>&nbsp;<textarea name="komentar" cols="24" rows="10"></textarea></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td align=center>
					<input type="submit" name="Kirim" value="Kirim">
					&nbsp; &nbsp; 
					<input type="reset" name="reset" value="Reset"></td>
				</tr>
			</table>
		</form>	
					</div>
		<?php
			$query = "select id_komentar, nama, email,komentar,tanggal from komentar order by tanggal desc";
			$sql = mysql_query($query);
			while($hasil = mysql_fetch_array($sql)){
				$nama = stripslashes($hasil['nama']);
				$email = stripslashes($hasil['email']);
				$komentar = nl2br(stripslashes($hasil['komentar']));
				$tanggal = stripslashes($hasil['tanggal']);
				echo "
						<div class=komentar>
							<b style='font-size:25px'>$nama</b> , email : <b>$email</b>
							<br><small>pada : <b>$tanggal</b></small>
							<br>Komentar : 
							<br><div>$komentar</div>
						</div>
				";
			}
		?>
					
					
					
				</div>	
			<div class=kanan>
					<div class="judul ani">Date and Time</div>
					<div class=isi>
						<div id="tanggal"></div>
						<div id="jam"></div>
					</div>
					<div class="judul ani">Copyright</div>
					<div class=isi>
						This Site Design By
						<embed src="../gambar/logo/underground.swf" width=100%/>
						<br>Putra Rahmadi <sup>&copy;</sup> 2014
					</div>
				</div>
				<div class=clear>&nbsp;</div>
			</div>
			<div class=clear>&nbsp;</div>
		</div>
	</body>
</html>