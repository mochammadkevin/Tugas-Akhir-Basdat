<?php 
session_start();
if ($_SESSION['login'] != true) {
    echo '<script>window.location="index.php"</script>';
}
require 'function.php';

$sql = "SELECT * FROM user WHERE id_user = $_SESSION[id_user]";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$id_user = $data['id_user'];
$username = $data['username'];
$nama_lengkap = $data['nama_lengkap'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style/styles.css?v=<?php echo time(); ?>">
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
                        <a class="nav-link" aria-current="page" href="data-motor.php">Jual Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="keranjang.php">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Struk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logout.php">Log out</a>
                    </li>
                    <!-- ini float in right dungs -->
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="mx-auto">
        <div class="card">
        <div class="card-header">
                Struk transaksi motor yang telah dipesan
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Merk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Nama Ekspedisi</th>
                            <th scope="col">Tanggal Transaksi</th>
                        </tr>
                    <tbody>
                        <?php
                            $id_user = $_SESSION['id_user'];
                            // Masukin motor yang dia pesen
                            $sql5 = "SELECT * FROM transaksi INNER JOIN motor USING(id_motor) INNER JOIN shipment USING(id_shipment) WHERE transaksi.id_user = $id_user";
            
                            $query5 = mysqli_query($koneksi, $sql5);
                            $urut = 1;
                            while ($r5 = mysqli_fetch_array($query5)) {
                                $ids = $r5['id_shipment'];
                                $id_motor = $r5['id_motor'];
                                $nama_motor = $r5['nama_motor'];
                                $merk_motor = $r5['merk_motor'];
                                $gambar_motor = $r5['gambar_motor'];
                                $harga_motor = $r5['harga_motor'];
                                $nama_ekspedisi = $r5['nama_ekspedisi'];

                                $tanggal_transaksi = $r5['tanggal_transaksi'];
                        ?>
                        <tr>
                            <th scope="row"><?php echo $urut++ ?></th>
                            <td><?php echo $merk_motor ?></td>
                            <td><?php echo $nama_motor ?></td>
                            <td><img src="images/<?php echo $gambar_motor ?>" width="300px" ></td>
                            <td>Rp. <?php echo number_format($harga_motor, 0, '', '.') ?></td>
                            <td><?php echo $nama_ekspedisi ?></td>
                            <td><?php echo $tanggal_transaksi ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
</body>

</html>