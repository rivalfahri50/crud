<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <link rel="shortcut icon" type="image/png" href="http://localhost/toko/myweb/logo.png">
 <style type="text/css">
        .wrapper{
            width: 800px;
          
            padding: 3%
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body style="background-image:url(../gambar/.jpg); background-size:cover;">

    <div class="wrapper" style="background-color:x;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                    <center><h2>Data Pembayaran Obat</h2></center><br>
                    <button><a href="http://localhost/rumahsakit/index.php">dasboard</a></button>
                    
                        <a href="create.php" class="btn btn-success pull-right">Tambah Baru</a>
                    </div>
                    
                    
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM obat";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                
                                    echo "<tr>";
                                        echo "<th>KELUHAN</th>";
                                        echo "<th>TGL BEROBAT</th>";
                                        echo "<th>BIAYA OBAT</th>";
                                        echo "<th>AKSI</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['keluhan'] . "</td>";   
                                        echo "<td>" . date('d/m/Y', strtotime($row['tgl_berobat'])) . "</td>";
                                        echo "<td>Rp." . $row['biaya'] . "</td>";
                                        echo "<td>";
                                           
                                            echo "<button><a href='update.php?id=". $row['id'] ."' title='Update Data' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'>edit</span></a></button>";
                                            echo "&nbsp;<button><a href='delete.php?id=". $row['id'] ."' title='Delete Data' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'>hapus</span></a></button>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo " <div class='alert alert-danger' role='alert'>
                            <strong>Data kosong !!!</strong>
                        </div>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>