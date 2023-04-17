<?php
$hostname="localhost";
$user="root";
$password="";
$db_name="pesbuk";

$koneksi= mysqli_connect($hostname,$user,$password,$db_name)or die(mysqli_error($koneksi));


if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password = md5($_POST['password']);
	$password2 = md5($_POST['password2']);

	$cek_user = mysqli_query($koneksi,"SELECT * FROM users WHERE email='$email'");
	$cek_login = mysqli_num_rows($cek_user);
	
	if($cek_login > 0){
		echo"<script>
		alert('Email telah terdaftar');
		window.location = 'registrasi.php';
		</script>";
	}else{
		if ($password != $password2) {
			echo"<script>
		alert('Konfrimasi password Tidak Sesuai');
		window.location = 'registrasi.php';
		</script>";
		}else{
			mysqli_query($koneksi,"INSERT INTO users VALUE('','$email','$password')");
			echo"<script>
		alert('Data berhasil dikirim');
		window.location = 'login.php';
		</script>";
		}
	}

}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registrasi</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />

<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">

</head>
<body>
	
	<div class="main-w3layouts wrapper">
		<h1>HALLO GESS</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="" method="POST">
					
					<p>Email
					<input class="text email" type="text" name="email" placeholder="Masukkan Email" required="yes">
					Password
					<input class="text" type="password" name="password" placeholder="Masukkan Password" required="">
					<input class="text w3lpass" type="password" name="password2" placeholder="Ketik Ulang Password" required="">
					<input type="submit" value="SIGNUP" name="submit">
				</form>
				<p>sudah punya akun  <a href="login.php"> Login</a></p>
			</div>
		</div>
	
		<div class="colorlibcopy-agile">
		</div>

		<ul class="colorlib-bubbles">
			
		</ul>
	</div>

</body>
</html>