<?php
require 'function.php';

if(isset($_POST['submit'])){
    $nama_penjual = $_POST['nama_penjual'];
    $nomor_penjual = $_POST['nomor_penjual'];
    $alamat_penjual = $_POST['alamat_penjual'];
    $email_penjual = $_POST['email_penjual'];
   
    if($nama_penjual && $nomor_penjual && $alamat_penjual && $email_penjual){
        $sql2 = "INSERT INTO penjual (nama_penjual, nomor_penjual, alamat_penjual, email_penjual) VALUES ('$nama_penjual', '$nomor_penjual', '$alamat_penjual', '$email_penjual')";
        $query2 = mysqli_query($koneksi, $sql2);
        if($query2){
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
    <title>Data Penjual Motor</title>
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
                Registrasi Data Penjual Motor
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
                        <label for="nama_penjual" class="col-sm-2 col-form-label">Nama Penjual</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_penjual" name="nama_penjual"
                                value="<?php echo $nama_penjual ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nomor_penjual" class="col-sm-2 col-form-label">Nomor Penjual</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_penjual" name="nomor_penjual"
                                value="<?php echo $nomor_penjual ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat_penjual" class="col-sm-2 col-form-label">Alamat Penjual</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat_penjual" name="alamat_penjual"
                                value="<?php echo $alamat_penjual ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email_penjual" class="col-sm-2 col-form-label">Email Penjual</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email_penjual" name="email_penjual"
                                value="<?php echo $email_penjual ?>">
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