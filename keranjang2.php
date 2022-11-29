<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}
include 'function.php';

if (isset($_GET['ids'])) {
    $id_user = $_SESSION['id_user'];

    $ids = $_GET['ids'];

    // Ngambil dari tabel shipment
    $sql6 = "SELECT * FROM shipment INNER JOIN motor USING(id_motor) WHERE id_shipment = $ids";
    $query5 = mysqli_query($koneksi, $sql6);
    $d = mysqli_fetch_object($query5);


    $idm = $d->id_motor;

    $nama_motor = $d->nama_motor;
    $merk_motor = $d->merk_motor;
    $jenis_motor = $d->jenis_motor;
    $CC_motor = $d->CC_motor;
    $gambar_motor = $d->gambar_motor;
    $tahun_keluaran = $d->tahun_keluaran;
    $jarak_tempuh = $d->jarak_tempuh;
    $harga_motor = $d->harga_motor;
    $deskripsi_motor = $d->deskripsi_motor;

    $nama_ekspedisi = $d->nama_ekspedisi;
}

if (isset($_POST['submit'])) {
    $ids = $_GET['ids'];
    $update = mysqli_query($koneksi, "UPDATE shipment SET status_shipment = not status_shipment WHERE id_shipment = '$ids'"); 
  
    // Masukin ke tabel transaksi
    $id_user = $_SESSION['id_user'];
    $sql3 = "INSERT INTO transaksi (id_user, id_motor, id_shipment) VALUES ('$id_user', '$idm', '$ids')";
    $query3 = mysqli_query($koneksi, $sql3);

    if ($query3) {
        header('Location: struk.php');
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style/styles.css?v=<?php echo time(); ?>">
    <title>IPB Garage</title>
    <style>
    .mx-auto {
        width: 1000px;
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
                            <a class="nav-link" aria-current="page" href="profile.php">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="data-motor.php">Jual Motor</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="keranjang.php">Keranjang</a>
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
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Detail Motor
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Merk</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor"
                            value="<?php echo $merk_motor; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_motor" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="nama_motor"
                            value="<?php echo $nama_motor; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Jenis</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor"
                            value="<?php echo $jenis_motor; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="CC_motor" class="col-sm-2 col-form-label">CC</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="CC_motor"
                            value="<?php echo $CC_motor; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Tahun Keluaran</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor"
                            value="<?php echo $tahun_keluaran; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Jarak tempuh</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor"
                            value="<?php echo $jarak_tempuh; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor"
                            value="Rp. <?php echo number_format($harga_motor, 0, '', '.') ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor"
                            value="<?php echo $deskripsi_motor; ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <img src="images/<?php echo $d->gambar_motor ?>" width="300px">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Detail shipment
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="nama_ekspedisi" class="col-sm-2 col-form-label">Nama Ekspedisi</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="nama_ekspedisi"
                            value="<?php echo $nama_ekspedisi ?>">
                    </div>
                </div>
            </div>
        </div>
        <div>&nbsp;</div> 
        <form action="" method="POST">
            <div class="col-12">
                <a href="keranjang.php?ids=<?php echo $ids ?>">
                    <input type="submit" name="submit" value="Tampilkan Struk" class="btn btn-dark"></a>
            </div>
        </form>
        <div>&nbsp;</div> 
    </div>


</body>

</html>