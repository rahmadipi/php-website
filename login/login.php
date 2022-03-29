<?php
	session_start();
	include "../koneksi.php";
	if(isset($_POST['login'])){
		$user = $_POST['user'];
		$pass = $_POST['password'];
		$query = "select code, online, user, pass, tanggal from user order by tanggal asc";
		$sql = mysql_query($query);
		while($hasil = mysql_fetch_array($sql)){
			$dbuser = stripslashes($hasil['user']);
			$dbpass = stripslashes($hasil['pass']);
			if($user == $dbuser && $pass == $dbpass){
				$_SESSION['login'] = $user;
				header("location:../index.php");
			}
		}
		echo "<center>username atau password salah</center>";
	}
?>
	<html>
	<head>
		<title>Selamat datang di Rp !</title>
		<link rel="shortcut icon" href="../gambar/logo/Rp.ico"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<script type="text/javascript" src="../js/script.js"></script>
	</head>
	<body>
		<div class="all">
			<table class=menu>
				<tr>
					<td height="50"></td>
				</tr>
				<tr>
					<td><div class=ani><marquee>&nbsp;</marquee></div></td>
				</tr>
				<tr>
					<td height="10"></td>
				</tr>
				<tr>
					<td>
						<div class="logo">
							<a href='../index.php'><div></div></a>
						</div>
					</td>
				</tr>
				<tr>
					<td height="10"></td>
				</tr>
				<tr>
					<td>
						<div>
							<img src="../gambar/in/guest.png"/>
							&nbsp;
							<img src="../gambar/in/login.png"/>
							&nbsp;
							<img src="../gambar/in/admin.png"/>
							&nbsp;
							<img src="../gambar/in/signup.png"/>
						</div>
					</td>
				</tr>
				<tr>
					<td height="10"></td>
				</tr>
				<tr>
					<td>
						<form action="" method=post>
							<input type="text" placeholder=username name="user">
							<input type="password" placeholder=password name="password">
							<input type=submit name=login value=Login>
						</form>
					</td>
				</tr>
				<tr>
					<td><div class=ani>LOGIN sebagai </div></td>
				</tr>
				<tr>
					<td height="50"></td>
				</tr>
			</table>
		</div>
	</body>
</html>