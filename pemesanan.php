<?php
session_start();
if ($_SESSION['login'] != true) {
    echo '<script>window.location="index.php"</script>';
}
include 'function.php';
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
            width: 750px;
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
                        <a class="nav-link" aria-current="page" href="data-motor.php">Motor Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="transaksi.php">Transaksi</a>
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
                Pemesanan
            </div>
            <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="nama_ekspedisi" class="col-sm-2 col-form-label">Pengiriman</label>
                    
                        <div class="col-sm-10">
                            <select class="form-control" id="nama_ekspedisi" name="nama_ekspedisi" required>
                                <option value="">Pilih Pengiriman</option>
                                <option value="JNE">JNE
                                <option value="J&T Express">J&T Express</option>
                                <option value="POS Indonesia">POS Indonesia</option>
                                <option value="TIKI">TIKI</option>
                                <option value="SiCepat">SiCepat</option>
                                <option value="Ninja Xpress">Ninja Xpress</option>
                                <option value="Indah Logistik">Indah Logistik</option>
                            </select>
                        </div>
                </div>
                <div class="col-12">
                    <td scope="row">
                        <input type="submit" name="submit" value="Pesan" class="login-button">
                    </td>
                </div>
            </form>
                
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $id_motor = $_GET['idm'];
        $id_user = $_SESSION['id_user'];
        $update = mysqli_query($koneksi, "UPDATE motor SET 
        status_motor = not status_motor
        WHERE id_motor = '$id_motor'"); 
        $nama_ekspedisi = $_POST['nama_ekspedisi'];
        $query = "INSERT INTO shipment (nama_ekspedisi, id_motor, id_user) VALUES ('$nama_ekspedisi', '$id_motor', '$id_user')";
        $result = mysqli_query($koneksi, $query);
        if ($result) {
            echo '<script>alert("Pemesanan berhasil");window.location="transaksi.php"</script>';
        } else {
            echo '<script>alert("Pemesanan gagal");window.location="transaksi.php"</script>';
        }

    }

    ?>
</body>

</html>