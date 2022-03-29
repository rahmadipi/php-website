<?php
	session_start();
	if(isset($_SESSION['login'])){
	include "../koneksi.php";
	if (isset($_POST['Kirim'])){
		$nama = addslashes(strip_tags($_POST['nama']));
		$email = addslashes(strip_tags($_POST['email']));
		$komentar = addslashes(strip_tags($_POST['komentar']));
		$id_hal = $_GET['id'];
		$query = "insert into komentar values('',$id_hal,'$nama','$email','$komentar',now())";
		$sql = mysql_query($query);
	}
	if (isset($_GET['id'])){
		$id = $_GET['id'];
	}
	else {
		die ("Error. No Id Selected!");
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
			<div class=menubar>
				<center>
					<?php
					echo "
					<ul>
						<li><a href='../index.php'>Home</a>
						<li><a href='../index.php?mode=Jurnal'>Jurnal TI</a>
						<li><a href='../index.php?mode=Tutorial'>Tutorial</a>
						<li><a href='../login/logout.php'>Logout</a>
					</ul>
					";
					?>
				</center>
			</div>
			<div class=konten>
			<?php
				$query = "SELECT id, judul, isi, gambar, tanggal FROM konten WHERE id=$id";
				$sql = mysql_query ($query);
				$hasil = mysql_fetch_array ($sql);
				$id = $hasil['id'];
				$gambar = stripslashes ($hasil['gambar']);
				$judul = stripslashes ($hasil['judul']);
				$isi = stripslashes($hasil['isi']);
				$tanggal = stripslashes ($hasil['tanggal']);
			echo "
				<div class=kiri>
					<div class='judul ani'>$judul</div>
			";
				include($isi);
			echo "
				</div>
			";
			?>
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
									Pada halaman : <a href=page.php?id=$id_hal>$halaman</a>
									<div>$komentar</div>
								</div>
								";
							}
						?>
					</div>
					
					<!--
					
<script language='javascript'>
//membuat document jquery
$(document).ready(function(){
	//variable yg dibaca dengan ajax untuk di kirim
	$("#message-submit").click(function(){
		var clientmsg = $("#message-input").val();
		$.post("post-message.php", {text: clientmsg});
		$("#message-input").attr("value", "");
		return false;
	});
	//load ajax message
	function loadLog(){
		var oldscrolHeight = $("#chatbox").attr("scrollHeight") - 20;
		$.ajax({
			url : "message-line.php",
			cache : false,
			success : function(html){
				$("#chatbox").html(html); //load ke <div chatbox>
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({scrollTop: newscrollHeight}, 'normal'); //scrol otomatisnya
				}
			},
		});
	}
	function loadlog(){
		var oldscrolHeight = $("#online").attr("scrollHeight") - 20;
		$.ajax({
			url : "user-online.php",
			cache : false,
			success : function(html){
				$("#online").html(html); //load ke <div chatbox>
				var newscrollHeight = $("#online").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$("#online").animate({scrollTop: newscrollHeight}, 'normal'); //scrol otomatisnya
				}
			},
		});
	}
	
	setInterval (loadLog, 1000);
	setInterval (loadlog, 1000);
});
</script>
					
					
					
					-->
					
					<div class="judul ani">Copyright</div>
					<div class=isi>
						This Site Design By
						<embed src="../gambar/logo/underground.swf" width=100%/>
						<br>Putra Rahmadi <sup>&copy;</sup> 2014
					</div>
				</div>
				
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
			$query = "select id_komentar,id_hal, nama, email,komentar,tanggal from komentar where id_hal='$id' order by tanggal desc";
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
				
				<div class=clear>&nbsp;</div>
			</div>
			<div class=clear>&nbsp;</div>
		</div>
	</body>
</html>
<?php
	}
	else{
		header("location:../login/login.php");
	}
?>