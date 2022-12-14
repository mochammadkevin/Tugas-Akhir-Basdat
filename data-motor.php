<?php
session_start();
require 'function.php';
if( !isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
  }

$sql9 = "SELECT * FROM user WHERE id_user = $_SESSION[id_user]";
$query9 = mysqli_query($koneksi, $sql9);
$data = mysqli_fetch_array($query9);
$id_user = $data['id_user'];
$username = $data['username'];
$nama_lengkap = $data['nama_lengkap'];


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM motor WHERE id_motor = $id and id_user = $_SESSION[id_user]";
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
    $status_motor = $data['status_motor'];
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
    <link rel="stylesheet" href="style/datamotor.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>IPB Garage</title>
    <style>
    .mx-auto {
        width: 1315px;
    }

    .card {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">IPB Garage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" ><?php echo $username ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="profile.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Jual Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="keranjang.php">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="struk.php">Struk</a>
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
                Data Motor Penjual
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                            // $sql5 = "SELECT * FROM motor WHERE id_user = $_SESSION[id_user] AND status_motor = 0 ORDER BY id_motor ASC";
                            $sql5 = "SELECT * FROM motor WHERE id_user = $_SESSION[id_user] ORDER BY id_motor AND status_motor = 0 DESC";
                            $query5 = mysqli_query($koneksi, $sql5);
                            $urut = 1;
                            while ($r5 = mysqli_fetch_array($query5)) {
                                $id_motor = $r5['id_motor'];
                                $nama_motor = $r5['nama_motor'];
                                $merk_motor = $r5['merk_motor'];
                                $gambar_motor = $r5['gambar_motor'];
                                $harga_motor = $r5['harga_motor'];
                                $deskripsi_motor = $r5['deskripsi_motor'];
                                $status_motor = $r5['status_motor'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td><?php echo $merk_motor ?></td>
                            <td><?php echo $nama_motor ?></td>
                            <td>Rp. <?php echo number_format($harga_motor, 0, '', '.') ?></td>
                            <td><img src="images/<?php echo $gambar_motor ?>" width="200px" ></td>
                            <td><?php if ($status_motor != 1) { echo "Tersedia";} else { echo "Terpesan";}?></td>
                            <td scope="row">
                                <?php if ($status_motor == 0): ?>
                                <a href="edit-motor.php?idm=<?php echo $r5['id_motor'] ?>"><button type="button"
                                        class="btn btn-dark">Edit</button></a>
                                <div>&nbsp;</div>
                                <?php endif ?>
                                
                                <?php if ($status_motor == 0): ?>
                                <a href="proses-hapus.php?idm=<?php echo $r5['id_motor']?>"
                                    onclick="return confirm('Yakin ingin menghapusnya?')"><button type="button"
                                        class="btn btn-danger">Delete</button></a>
                                <?php endif ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </thead>
                </table>
                <a class="btn btn-dark" href="registrasi-motor.php" role="button">Tambah motor</a>
            </div>
        </div>

</body>

</html>