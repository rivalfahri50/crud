<?php 

require_once("config.php");

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE  email=:email";
    $stmt = $db->prepare($sql);
    
    // bind parameter ke query
    $params = array(
        ":email" => $username
    );

    $stmt->execute($params);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // jika user terdaftar
    if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: ../index.php");
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<title>Login</title>

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
				<form action="../index.php" method="POST">
                <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control"  type="email" id="email" name="email" placeholder=" Email" required/>
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Password" required/>
            </div>


             <p><a href="reset.php"> Forgot Password</a></p>

            <input type="submit" value="SIGNUP" name="submit" >
				</form>
				  
                  
                  <p>belum registrasi--<a href="registrasi.php"> Registrasi brooo!!!</a></p>
			</div>
		</div>
	
		<div class="colorlibcopy-agile">
		</div>

		<ul class="colorlib-bubbles">
			
		</ul>
	</div>
	<script>
        var email= document.querySelector('email'),
            password= document.querySelector('password'),
            error_msg=document.querySelector(".error_msg");

            $("submit").submit(function (params) {
                e.preventDefault();
                if (email.value,lenght < 1){
                    error_msg.style.display = " inline - block";
                }
                error_msg.style.display = "none";
                alert("Login Successfully")
            })
    </script>
</body>
</html>