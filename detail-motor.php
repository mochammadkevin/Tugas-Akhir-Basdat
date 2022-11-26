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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
                        <a class="nav-link" aria-current="page" href="data-motor.php">Motor</a>
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
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Tahun Keluaran</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Jarak tempuh</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="merk_motor" class="col-sm-2 col-form-label">Gambar</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control-plaintext" id="merk_motor" value="">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Detail Penjual
            </div>
            <div class="card-body">
                <div class="mb-3 row">
                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="nama_lengkap" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat_rumah" class="col-sm-2 col-form-label">Alamat Rumah</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="alamat_rumah" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="nama_lengkap" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nomor_tlp" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="nomor_tlp" value="">
                    </div>
                </div>
                </form>
            </div>
        </div>
        &nbsp;
        <div class="col-12">
            <input type="submit" name="submit" value="Beli" class="btn btn-dark">
        </div>
        &nbsp;
    </div>

</body>

</html>