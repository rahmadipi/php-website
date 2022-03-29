<?php
	session_start();
	if(isset($_SESSION['login'])){
	include "koneksi.php";
	
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}
	else {
		$page = 1;
	}
	if (isset($_GET['mode'])){
		$mode = $_GET['mode'];
	}
	else {
		$mode = "terbaru";
	}
?>
<html>
	<head>
		<title>Rp</title>
		<link rel="shortcut icon" href="gambar/logo/Rp.ico"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
	</head>
	<body onLoad="jam(),tanggal(),fixed()">
		<div class=all2>
			<div class=logo>
				<a href='index.php'><div></div></a>
			</div>
			<div id=menubar-clone></div>
			<div class=menubar id="menubar">
				<center>
					<?php
					echo "
					<ul>
						<li><a href='index.php'>Home</a>
						<li><a href='index.php?mode=Jurnal'>Jurnal TI</a>
						<li><a href='index.php?mode=Tutorial'>Tutorial</a>
						<li><a href='login/logout.php'>Logout</a>
					</ul>
					";
					?>
				</center>
			</div>
			<div class=konten>
				<div class=atas>
					<div class=sambut>
					<h1 align=center>Selamat Datang !</h1>
					<p>Ini adalah website sederhana dari saya, <font color=cyan>Putra Rahmadi</font> yang sementara ini berisi tentang beberapa materi dari jurusan TI dan juga beberapa tutorial dari saya sendiri.</p>
					<p>Mungkin website ini masih jauh dari kata sempurna, tapi mudah-mudahan bermanfaat bagi pembaca :D</p>
					</div>
					<br>
				</div>
				<div class=kiri>
					<?php
					$lim=($page-1)*5;
					if($mode=="terbaru"){
						echo "
					
						<div class='judul ani'>Konten Terbaru</div>
					
						";
						$tab = "select A.id, A.gambar, A.judul, A.headline, B.kategori, C.sub, A.tanggal";
						$from = "from konten A, kategori B, sub C where A.id_kategori=B.id_kategori && A.id_sub=C.id_sub order by A.tanggal desc";
					}
					if($mode=="Tutorial"){
						echo "
						
						<div class='judul ani'>Kategori Tutorial</div>
						
						";
						$tab = "select A.id, A.gambar, A.judul, A.headline, B.kategori, C.sub, A.tanggal";
						$from = "from konten A, kategori B, sub C where A.id_kategori=B.id_kategori && A.id_sub=C.id_sub && B.kategori='Tutorial' order by A.tanggal desc";
					}
					if($mode=="Jurnal"){
						echo "
					
						<div class='judul ani'>Kategori Jurnal</div>
						
						";
						$tab = "select A.id, A.gambar, A.judul, A.headline, B.kategori, C.sub, A.tanggal";
						$from = "from konten A, kategori B, sub C where A.id_kategori=B.id_kategori && A.id_sub=C.id_sub && B.kategori='Jurnal' order by A.tanggal desc";
					}
					$query = "$tab $from limit $lim,5";
					$sql = mysql_query($query);
					while($hasil = mysql_fetch_array($sql)){
						$id = $hasil['id'];
						$gambar = stripslashes($hasil['gambar']);
						$judul = stripslashes($hasil['judul']);
						$headline = stripslashes($hasil['headline']);
						$kategori = stripslashes($hasil['kategori']);
						$sub = stripslashes($hasil['sub']);
						echo "
						
						<div class=isi>
							<a href='user/page.php?id=$id'>
								<img src='gambar/konten/$gambar' class=gambar>
							</a>
							<div class=kategori>Kategori:
							<br><a href=index.php?mode=$kategori>$kategori</a>, $sub</div>
							<div class=teks>
								<a href='user/page.php?id=$id'>$judul</a>
								<br>$headline
							</div>
						</div>
						
						";
					}
					$query2 ="select count(*) $from";
					$sql2 = mysql_query($query2);
					$hasil2 = mysql_fetch_array($sql2);
					$count = stripslashes($hasil2['count(*)']);
					$tot = ($count/5)+1;
					echo "<div class=tambahan>";
					for($i=1;$i<$tot;$i++){
						if($tot>2){
							if($page==$i) echo " $i ";
							else echo "<a href='index.php?mode=$mode&page=$i'> $i </a>";
						}
						else echo "&nbsp;";
					}
					echo "</div>";
					?>
				</div>
				<div class=kanan>
					<div class="judul ani">Date and Time</div>
					<div class=isi>
						<div id="tanggal"></div>
						<div id="jam"></div>
					</div>
					<div class="judul ani">Pesan Terakhir</div>
					<div class=isi>
						<?php
							$query = "select A.tanggal, A.nama, A.komentar, A.email, A.id_hal, B.id,B.judul from komentar A, konten B where id=id_hal order by A.tanggal desc limit 0,3";
							$sql = mysql_query($query);
							while($hasil = mysql_fetch_array($sql)){
								$id_hal = $hasil['id_hal'];
								$nama = stripslashes($hasil['nama']);
								$komentar = stripslashes($hasil['komentar']);
								$email = stripslashes($hasil['email']);
								$halaman = stripslashes($hasil['judul']);
								echo "
								<div class=komentar>
									<b style='font-size:25px'>$nama</b>, $email<br>
									Pada halaman : <a href=user/page.php?id=$id_hal>$halaman</a>
									<div>$komentar</div>
								</div>
								";
							}
						?>
					</div>
					<div class="judul ani">Copyright</div>
					<div class=isi>
						This Site Design By
						<embed src="gambar/logo/underground.swf" width=100%/>
						<br>Putra Rahmadi <sup>&copy;</sup> 2014
					</div>
				</div>
				<div class=clear>&nbsp;</div>
			</div>
			<div class=clear>&nbsp;</div>
		</div>
	</body>
</html>
<?php
	}
	else{
		header("location:login/login.php");
	}
?>