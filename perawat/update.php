


<?php
// Include config file
require_once "config.php";
$id = $_GET['id'];
function query($query){
    global $link;
    $result = mysqli_query($link, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;

    }
    return $rows;
}
$query = query("SELECT * FROM perawat WHERE id = '$id'")[0];




if(isset($_POST['kirim'])){
    $N =$_POST['nama'];
   

    $Jk = $_POST['jenis_kelamin'];
    $tl = $_POST['tgl_lahir'];

  
    $insert= mysqli_query($link, "UPDATE perawat SET
                                   
                                    nama = '$N',
                                   
                                   
                                    jenis_kelamin = '$Jk' ,
                                    tgl_lahir = '$tl' 
                                       WHERE id = '$id'");
    
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
    <title>Perbarui Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="http://localhost/toko/myweb/logo.png">

    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
            margin-top: 10%;
            padding: 3%;
            /* color:white; */
        }
    </style>
</head>
<body style=" background-size:cover;">
    <div class="wrapper" style="background-color:white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Perbarui data</h2>
                    </div>
                    <ol class="breadcrumb">
                  
                    <li class="active">Silahkan isi data dengan data yang valid !!!</li>
                </ol>    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                            <label>NAMA PERAWAT</label>
                            <input type="text" name="nama" class="form-control text-center" value="<?php echo $query['nama']; ?>">
                        </div>
                        
                      
                        <div class=text-center>
                            <label for="">JENIS KELAMIN</label><br>
                           <input type="radio" name="jenis_kelamin" value="laki-laki"  <?= ($query['jenis_kelamin'] == 'laki-laki')? "checked": ''?>>laki-laki</br>
                           <input type="radio" name="jenis_kelamin" value="perempuan"  <?= ($query['jenis_kelamin'] == 'perempuan')? "checked": ''?>>perempuan</br>
                        </div>
                        <label>TGL LAHIR</label>
                        <input type="date" name="tgl_lahir" class="form-control text-center" value="<?php echo $query['tgl_lahir']; ?>">
                        <div>
                       
                        <br><br>
                       
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="perbarui" name="kirim">
                        <a href="tampil.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>