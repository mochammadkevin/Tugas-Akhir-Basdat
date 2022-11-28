<?php 
session_start();
require 'function.php';
if( !isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
  }
$sql = "SELECT * FROM user WHERE id_user = $_SESSION[id_user]";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$id_user = $data['id_user'];
$username = $data['username'];
$nama_lengkap = $data['nama_lengkap'];
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>IPB Garage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="dashboard.php">IPB Garage</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="profile.php">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="data-motor.php">Jual Motor</a>
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
                        <!-- ini float in right dungs -->
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page"><?php echo $username ?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <section class="home">
        <div class="container">
            <div class="left">
                <span>
                </span>
                <h1>Garage Full of Dedication. </h1>
                <p>Dirancang oleh tiga mahasiswa dari Departemen Ilmu Komputer IPB University sebagai Tugas Akhir Mata
                    Kuliah Basis Data, IPB Garage menjadi suatu platform yang tepat untuk para mahasiswa yang ingin
                    melakukan transaksi jual beli motor.</p>
                <hr>
                <a>Selamat datang, <?php echo $nama_lengkap?>!</a>
            </div>
        </div>
    </section>

    <section class="history mtop">
        <div class="container">
            <div class="left mtop">
                <h1>sell,</h1>
                <h1>explore,</h1>
                <h1>have fun.</h1>
            </div>
        </div>
    </section>

    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr class="table">
                            <th scope="col">No.</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    <tbody>
                        <?php
                            $sql5 = "SELECT * FROM motor WHERE id_user != $_SESSION[id_user] AND status_motor != 1 ORDER BY id_motor ASC";
                            $query5 = mysqli_query($koneksi, $sql5);
                            $urut = 1;
                            while ($r5 = mysqli_fetch_array($query5)) {
                                $id_motor = $r5['id_motor'];
                                $nama_motor = $r5['nama_motor'];
                                $merk_motor = $r5['merk_motor'];
                                $gambar_motor = $r5['gambar_motor'];
                                $harga_motor = $r5['harga_motor'];
                        ?>
                        <tr class="table">
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td><?php echo $merk_motor ?></td>
                            <td><?php echo $nama_motor ?></td>
                            <td><img class="img-tabel" src="images/<?php echo $gambar_motor ?>" width="300px"></td>
                            <td>Rp. <?php echo $harga_motor ?></td>
                            <td scope="row">
                                <a href="detail-motor.php? idm=<?php echo $r5['id_motor'] ?>"><button type="button"
                                        class="btn btn-light">Detail</button></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>

        <footer>
            <div class="container top grid">
                <div class="box">

                </div>
                <div class="box">
                    <h3>Address</h3>
                    <label>IPB University, Dramaga</label> <br><br>
                    <label>Jawa Barat, Indonesia</label> <br><br>
                    <label>(0251) 8622642</label> <br><br>
                </div>
                <div class="box">
                    <h3>Creator</h3>
                    <label>@mochammadkevin</label> <br><br>
                    <label>@rifqifazzam</label> <br><br>
                    <label>@harizkrisha</label> <br><br>
                </div>
            </div>
        </footer>
</body>

</html>