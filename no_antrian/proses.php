

<?php 
    require_once "config.php";

    if(isset($_POST['kirim'])){
        $N =$_POST['nama'];
        $na =$_POST['tgl_berobat'];
        $no_antrian =$_POST['no_antrian'];
        
        

        $insert = mysqli_query($link, "insert into no_antrian(nama,tgl_berobat,no_antrian) values('$N','$na','$no_antrian')");

        if($insert){
            echo"<script> alert('berhasil');
                            document.location.href= 'tampil.php'; </script>";
        }else{
            echo"<script> alert('duplicate');
            document.location.href= 'create.php'; </script>";
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