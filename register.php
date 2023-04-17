<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    

    // enkripsi password
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $password2 = password_hash($_POST['password2'],PASSWORD_DEFAULT);
    if($password != $password2)
                {
                    echo "<script> alert(' Please enter same password')</script>";
                }
else
{
echo "<script> alert(' Entered password are same')</script>";
}
// another method
if ($_POST["password"] === $_POST["password2"]) {
   echo "<script> alert(' Entered passwords are same') </script>";
}
else {
   echo "<script> alert(' Please enter same passwords ') </script>";
}
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "INSERT INTO users (email, password, password2) 
            VALUES (:email, :password, :password2 )";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":email" => $email,
        ":password" => $password,
        ":password2" => $password2
        
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    if($saved) header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register </title>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">

        <p>&larr; <a href="index1.php">Home</a>

        <h4></h4>
        <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>

        <form action="" method="POST">
        

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Alamat Email" />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control " type="password" name="password" placeholder="Password" />
            </div>
            <div class="form-group">
                <label for="password2">Konfrim_Password</label>
                <input class="form-control" type="password" name="password2" placeholder="ketikan ulang password" />
            </div>

            <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />

        </form>
            
        </div>

        <div class="col-md-6">
            <img class="img img-responsive" src="img/connect.png" />
        </div>

    </div>
</div>

</body>
</html>
