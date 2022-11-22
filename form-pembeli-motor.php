<?php
require 'function.php';

if(isset($_POST['submit'])){
    $nama_pembeli = $_POST['nama_pembeli'];
    $nomor_pembeli = $_POST['nomor_pembeli'];
    $alamat_pembeli = $_POST['alamat_pembeli'];
    $email_pembeli = $_POST['email_pembeli'];
   
    if($nama_pembeli && $nomor_pembeli && $alamat_pembeli && $email_pembeli){
        $sql1 = "INSERT INTO pembeli (nama_pembeli, nomor_pembeli, alamat_pembeli, email_pembeli) VALUES ('$nama_pembeli', '$nomor_pembeli', '$alamat_pembeli', '$email_pembeli')";
        $query1 = mysqli_query($koneksi, $sql1);
        if($query1){
            $success = "Data berhasil disimpan";
        }else{
            $error = "Data gagal disimpan";
        }
    }else{
        $error = "Data tidak boleh kosong";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembeli Motor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    .mx-auto {
        width: 800px;
    }

    .card {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Registrasi Data Pembeli Motor
            </div>
            <div class="card-body">
                <?php
                if($error){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
                <?php
                }
                ?>
                <?php
                if($success){
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success; ?>
                </div>
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama_pembeli" class="col-sm-2 col-form-label">Nama Pembeli</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli"
                                value="<?php echo $nama_pembeli ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nomor_pembeli" class="col-sm-2 col-form-label">Nomor Pembeli</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_pembeli" name="nomor_pembeli"
                                value="<?php echo $nomor_pembeli ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat_pembeli" class="col-sm-2 col-form-label">Alamat Pembeli</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat_pembeli" name="alamat_pembeli"
                                value="<?php echo $alamat_pembeli ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email_pembeli" class="col-sm-2 col-form-label">Email Pembeli</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email_pembeli" name="email_pembeli"
                                value="<?php echo $email_pembeli ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="submit" value="Registrasi" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>