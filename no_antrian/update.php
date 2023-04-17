


<?php
// Include config file
(require_once "config.php");
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
$query = query("SELECT * FROM no_antrian WHERE id = '$id'")[0];




if(isset($_POST['kirim'])){
    $N =$_POST['nama'];
   

    $Jk = $_POST['tgl_berobat'];
    $no_antrian=$_POST['no_antrian'];
    $cekdata=mysqli_query($link, "SELECT * FROM no_antrian WHERE no_antrian='$no_antrian' AND id !='$id'" );
    if(mysqli_num_rows($cekdata)> 0){
    echo "<script>alert('no antrian sudah terdaftar!')</script>";
    }else{
 

  
    $insert= mysqli_query($link, "UPDATE no_antrian SET
                                   
                                   nama = '$N',
                                   
                                   
                                    tgl_berobat = '$Jk' ,
                                    no_antrian='$no_antrian'                                
                                       WHERE id = '$id'");
    
    
    if($insert){
        echo"<script> alert('berhasil');
                        document.location.href= 'tampil.php'; </script>";
    }
}}
 


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
                        <h2>Perbarui data antrian</h2>
                    </div>
                    <ol class="breadcrumb">
                  
                    <li class="active">Silahkan isi data dengan data yang valid !!!</li>
                </ol>    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group  <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                            <div class=text-center>
                            <label>NAMA</label>
                            </div>
                            <input type="text" name="nama" class="form-control text-center" value="<?php echo $query['nama']; ?>">
                        </div>
                        
                        <div class="text-center">
                            <label>TGL BEROBAT</label>
                            <input type="date" name="tgl_berobat" class="form-control text-center" value="<?php echo $query['tgl_berobat']; ?>">
                        </div>
                            <div class="text-center">
                            <label>NO ANTRIAN</label>
                            </div>
                            <input type="text" name="no_antrian" class="form-control text-center" value="<?php echo $query['no_antrian']; ?>">
                        </div>
                     </div>
    </div> 
                       
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