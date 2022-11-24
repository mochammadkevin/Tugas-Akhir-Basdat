<?php
require 'function.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM penjual WHERE id_penjual = $id";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    $nama_penjual = $data['nama_penjual'];
    $nomor_penjual = $data['nomor_penjual'];
    $alamat_penjual = $data['alamat_penjual'];
    $email_penjual = $data['email_penjual'];
}

if (isset($_GET['id'] )){
    $id = $_GET['id'];
    $sql = "SELECT * FROM pembeli WHERE id_pembeli = $id";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    $nama_pembeli = $data['nama_pembeli'];
    $nomor_pembeli = $data['nomor_pembeli'];
    $alamat_pembeli = $data['alamat_pembeli'];
    $email_pembeli = $data['email_pembeli'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPB Garage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
    .mx-auto {
        width: 850px;
    }

    .card {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.php">IPB Garage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Data Penjual Motor
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Penjual</th>
                            <th scope="col">Nomor Penjual</th>
                            <th scope="col">Alamat Penjual</th>
                            <th scope="col">Email Penjual</th>
                        </tr>
                    <tbody>
                        <?php
                            $sql2 = "SELECT * FROM penjual ORDER BY id_penjual ASC";
                            $query2 = mysqli_query($koneksi, $sql2);
                            $urut = 1;
                            while ($r2 = mysqli_fetch_array($query2)) {
                                $id_penjual = $r2['id_penjual'];
                                $nama_penjual = $r2['nama_penjual'];
                                $nomor_penjual = $r2['nomor_penjual'];
                                $alamat_penjual = $r2['alamat_penjual'];
                                $email_penjual = $r2['email_penjual'];
                        ?>

                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $nama_penjual ?></td>
                            <td scope="row"><?php echo $nomor_penjual ?></td>
                            <td scope="row"><?php echo $alamat_penjual ?></td>
                            <td scope="row"><?php echo $email_penjual ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </thead>
                </table>
            </div>


            <div class="card">
                <div class="card-header">
                    Data Pembeli Motor
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Pembeli</th>
                            <th scope="col">Nomor Pembeli</th>
                            <th scope="col">Alamat Pembeli</th>
                            <th scope="col">Email Pembeli</th>
                        </tr>
                    <tbody>
                        <?php
                            $sql3 = "SELECT * FROM pembeli ORDER BY id_pembeli ASC";
                            $query3 = mysqli_query($koneksi, $sql3);
                            $urut = 1;
                            while ($r3 = mysqli_fetch_array($query3)) {
                                $id_pembeli = $r3['id_pembeli'];
                                $nama_pembeli = $r3['nama_pembeli'];
                                $nomor_pembeli = $r3['nomor_pembeli'];
                                $alamat_pembeli = $r3['alamat_pembeli'];
                                $email_pembeli = $r3['email_pembeli'];
                        ?>

                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td scope="row"><?php echo $nama_pembeli ?></td>
                            <td scope="row"><?php echo $nomor_pembeli ?></td>
                            <td scope="row"><?php echo $alamat_pembeli ?></td>
                            <td scope="row"><?php echo $email_pembeli ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </thead>
                </table>
            </div>
</body>

</html>
