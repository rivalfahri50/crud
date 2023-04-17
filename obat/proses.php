

<?php 
    require_once "config.php";

    if(isset($_POST['kirim'])){
        $N =$_POST['keluhan'];
        $na =$_POST['tgl_berobat'];
        $tl = $_POST['biaya'];
        

        $insert = mysqli_query($link, "insert into obat(keluhan,tgl_berobat,biaya) values('$N','$na','$tl')");

        if($insert){
            echo"<script> alert('berhasil');
                            document.location.href= 'tampil.php'; </script>";
        }
    }


    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image/png" href="http://localhost/toko/myweb/logo.png">

        <title>proses</title>
    </head>
    <body>
        
    </body>
    </html>