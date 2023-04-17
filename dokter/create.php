<?php 
 

 include_once("config.php");
 $identitas_result = mysqli_query($link, "SELECT * FROM supplier");

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="http://localhost/toko/myweb/logo.png">
  <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
            margin-top: 10%;
            padding: 3%;
        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-image:url(../gambar/welcome.jpg); background-size:cover;">  
<form action="proses.php" method="post" enctype="multipart/form-data">
       
  
      <div class="wrapper"  style="background-color:white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header ">
                        <h2>Tambahkan Data dokter</h2>
                    </div>
                    <ol class="breadcrumb">
                  
                  <li class="active">isi dengan valid</li>
              </ol>  <form action="proses.php" method="post">
                        <div class="form-group " >
                            <div class="text-center">
                            <label>NAMA DOKTER </label>
                            <br><select id="nama" class="form-control text-center" name="nama"></br>
                            <option value="dr. ASWAN">dr. ASWAN</option>
                            <option value="dr. NUR ADHIYAH SIREGAR, MKK">dr. NUR ADHIYAH SIREGAR, MKK</option>
                            <option value="dr. ANDRIARTO NUGROHO">dr. ANDRIARTO NUGROHO</option>
                            <option value="dr. LIAN INDRIANI">dr. LIAN INDRIANI</option>
                            </div>
                        </div>
                        <div>
                            <label for="image">SELECT IMAGE:</label>
                            <input type="file"  name="image" id="image" required>
                        </div>
                        <div>

                         <div class="text-center">
                           <br> <label for="">JENIS KELAMIN</label></br>
                           <input type="radio" name="jenis_kelamin" value="laki-laki">laki-laki</br>   
                           <input type="radio" name="jenis_kelamin" value="perempuan">perempuan</br>
                         </div>  
                        </div>
                        <div class="text-center">
                        <label>TGL LAHIR</label>
                        </div>
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control text-center " required>

                        </div>
                       
                        <div>
                        <br><br>
                        <input type="submit" class="btn btn-primary" value="Tambah data" name="kirim">
                        <a href="tampil.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</body>
</html>