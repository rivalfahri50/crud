<?php

$hostname="localhost";
$user="root";
$password="";
$db_name="pesbuk";

$con= mysqli_connect($hostname,$user,$password,$db_name)or die(mysqli_error($con));


if (isset($_GET['email'])) {
    $email = $_GET['email'];
}
//proses ganti password
if (isset($_POST['ganti'])) {
$email        = $_POST['email'];
$password   = md5($_POST['password']);
//cek old password
$query = "SELECT * FROM users WHERE `password` = '$password'";
$sql = mysqli_query ($con,$query);
$hasil = mysqli_num_rows ($sql);


//update data
$query = "UPDATE users SET password = '$password' WHERE email='$email'";
$sql = mysqli_query ($con, $query);
//setelah berhasil update
if ($sql) {
			echo"<script>
		alert('Data berhasil di ubah');
		window.location = 'login.php';
		</script>";
    
}
}

?>
<!DOCTYPE html>
<html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
<head>
<title>Reset Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />

<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">

</head>
<body>
	
	<div class="main-w3layouts wrapper">
		<h1>HALOO GESS</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="" method="POST">
                <div class="form-group">
                <p>Email
                <input class="email"  type="email" id="email" name="email" placeholder="Email" required/>
            </div>
                <p>Password Baru</p>
                <input class=" password"  type="password" id="password" name="password" placeholder=" Password Baru" required/></br>
                <input class=" password"  type="password" id="password" name="password2 " placeholder="Konfirmasi Password Baru" required/></br>
             


            <input type="submit" value="Verify" name="ganti" id="ganti">
				</form>
                <a href="../index1.php">Beranda</a>
				  
                  
                
			</div>
		</div>
	
		<div class="colorlibcopy-agile">
		</div>

		<ul class="colorlib-bubbles">
			
		</ul>
	</div>
	
</body>
</html>