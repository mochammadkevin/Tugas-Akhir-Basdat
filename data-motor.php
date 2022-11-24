<?php
require 'function.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM motor WHERE id_motor = $id";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
    $id_motor = $data['id_motor'];
    $nama_motor = $data['nama_motor'];
    $merk_motor = $data['merk_motor'];
    $jenis_motor = $data['jenis_motor'];
    $CC_motor = $data['CC_motor'];
    $gambar_motor = $data['gambar_motor'];
    $tahun_keluaran = $data['tahun_keluaran'];
    $jarak_tempuh = $data['jarak_tempuh'];
    $harga_motor = $data['harga_motor'];
    $deskripsi_motor = $data['deskripsi_motor'];
}
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $idm = $_GET['id'];
    $del = "delete from motor where id_motor = '$idm'";
    $q = mysqli_query($koneksi, $del);
    if ($q) {
        $success = "Berhasil hapus data";
    } else {
        $error = "Gagal melakukan delete data";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="data-motor.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>IPB Garage</title>
    <style>
    .mx-auto {
        width: 1400px;
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
                        <a class="nav-link" aria-current="page" href="dashboard-penjual.php">Dashboard Penjual</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logout.php">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Data Motor
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">CC</th>
                            <th scope="col">Tahun Keluaran</th>
                            <th scope="col">Jarak Tempuh</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                            $sql5 = "SELECT * FROM motor ORDER BY id_motor ASC";
                            $query5 = mysqli_query($koneksi, $sql5);
                            $urut = 1;
                            while ($r5 = mysqli_fetch_array($query5)) {
                                $id_motor = $r5['id_motor'];
                                $nama_motor = $r5['nama_motor'];
                                $merk_motor = $r5['merk_motor'];
                                $jenis_motor = $r5['jenis_motor'];
                                $CC_motor = $r5['CC_motor'];
                                $gambar_motor = $r5['gambar_motor'];
                                $tahun_keluaran = $r5['tahun_keluaran'];
                                $jarak_tempuh = $r5['jarak_tempuh'];
                                $harga_motor = $r5['harga_motor'];
                                $deskripsi_motor = $r5['deskripsi_motor'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td><?php echo $merk_motor ?></td>
                            <td><?php echo $nama_motor ?></td>
                            <td><?php echo $jenis_motor ?></td>
                            <td><?php echo $CC_motor ?></td>
                            <td><?php echo $tahun_keluaran ?></td>
                            <td><?php echo $jarak_tempuh ?></td>
                            <td><?php echo $harga_motor ?></td>
                            <td><?php echo $deskripsi_motor ?></td>
                            <td><img src="images/<?php echo $gambar_motor ?>" width="200px" height="150px"></td>
                            <td scope="row">
                                <a href="form-edit-motor.php?id=<?php echo $r5['id_motor'] ?>"><button type="button"
                                        class="btn btn-warning">Edit</button></a>
                                <div>&nbsp;</div>
                                <a href="data-motor.php?op=delete&id=<?php echo $r5['id_motor']?>"
                                    onclick="return confirm('Yakin ingin menghapusnya?')"><button type="button"
                                        class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </thead>
                </table>
                <a class="btn btn-primary" href="registrasi-motor.php" role="button">Tambah motor</a>
            </div>
        </div>

</body>

</html>