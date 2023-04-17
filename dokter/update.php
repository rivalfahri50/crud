



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
$query = query("SELECT * FROM dokter WHERE id = '$id'")[0];

function upload_gambar(){
    $nama = time() . $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp,"source/".$nama);
    return $nama;
}

if(isset($_POST['kirim'])){
    $nama =$_POST['nama'];
    $gambarlama = $_POST['gambarlama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tgl_lahir = $_POST['tgl_lahir'];
    

    if($_FILES['image']['error'] === 4){
        $gambar = $gambarlama;
    }else{
        // Hapus gambar lama jika ada dan unggah gambar baru
        if(file_exists("source/".$gambarlama)){
            unlink("source/".$gambarlama);
        }
        $gambar = upload_gambar();
    }

    $insert= mysqli_query($link, "UPDATE dokter SET
                                    name = '$gambar',
                                    nama = '$nama',
                                    jenis_kelamin = '$jenis_kelamin',
                                    tgl_lahir = '$tgl_lahir' 
                                   
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
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="http://localhost/toko/myweb/logo.png">
    <link rel="shortcut icon" type="image/png" href="myweb/logo.png">

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
<body style="background-image:url(../gambar/welcome.jpg); background-size:cover;">
    <div class="wrapper" style="background-color:white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header ">
                        <div class="text-center" >
                        <h2>PERBARUI DATA</h2>
                        </div>
                    </div>
                    <ol class="breadcrumb" class=>
                  <div class="text-center">
                  <li >SILAHKAN EDIT DATA DENGAN VALID!!!</li>
 
                  </div>
              </ol>
                    
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                        <div class="text-center">
                            <label>NAMA DOKTER</label>
                            <select id="nama" class="form-control text-center" name="nama" value="<?php echo $query['nama']; ?>">
                            <option value="dr. ASWAN">dr. ASWAN</option>
                            <option value="dr. NUR ADHIYAH SIREGAR, MKK">dr. NUR ADHIYAH SIREGAR, MKK</option>
                            <option value="dr. ANDRIARTO NUGROHO">dr. ANDRIARTO NUGROHO</option>
                            <option value="dr. LIAN INDRIANI">dr. LIAN INDRIANI</option>
                        </div>
                        </div>
                        <div>
                            <label for="">FOTO</label>
                            <input type="file" name="image" id="image" value="">
                            <img src="../dokter/source/<?php echo $query['name']; ?>" width="40%" alt="">
                        </div>
                        <div class="text-center">
                        <br> <label for="">JENIS KELAMIN</label></br>
                           <input type="radio" name="jenis_kelamin" value="laki-laki"  <?= ($query['jenis_kelamin'] == 'laki-laki')? "checked": ''?>>laki-laki</br> 
                           <input type="radio" name="jenis_kelamin" value="perempuan"  <?= ($query['jenis_kelamin'] == 'perempuan')? "checked": ''?>>perempuan</br> 
                        </div>
                       
                        <div class="text-center ">
                            <label>TANGGAL LAHIR</label></br>
                            <input type="date" name="tgl_lahir" value="<?php echo $query['tgl_lahir']; ?>"></br> 
                        </div>
                        <div>
                       
                        <br><br>
                        <input type="hidden" value="<?= $query['name'];?>" name="gambarlama">
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