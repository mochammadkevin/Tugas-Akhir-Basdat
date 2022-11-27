<?php 
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
  }
include 'function.php';

$sql = "SELECT * FROM user WHERE id_user = $_SESSION[id_user]";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);
$id_user = $data['id_user'];
$username = $data['username'];
$nama_lengkap = $data['nama_lengkap'];

if (isset($_GET['idm'])) {
    $idm = $_GET['idm'];
    $sql = "SELECT * FROM motor WHERE id_motor = $idm and id_user = $_SESSION[id_user]";

    $motor = mysqli_query($koneksi, "SELECT * FROM motor WHERE id_motor = '$_GET[idm]'");
    $m = mysqli_fetch_object($motor);

    $idp = $m->id_user; 
    $nama_motor = $m->nama_motor;
    $merk_motor = $m->merk_motor;
    $jenis_motor = $m->jenis_motor;
    $CC_motor = $m->CC_motor;
    $gambar_motor = $m->gambar_motor;
    $tahun_keluaran = $m->tahun_keluaran;
    $jarak_tempuh = $m->jarak_tempuh;
    $harga_motor = $m->harga_motor;
    $deskripsi_motor = $m->deskripsi_motor;

    $sql2 = "SELECT * FROM user WHERE id_user = $idp";
    $query2 = mysqli_query($koneksi, $sql2);

    $user = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $idp");
    $u = mysqli_fetch_object($user);

    $nama_p = $u->nama_lengkap;
    $email_p = $u->email;
    $tlp_p= $u->nomor_tlp;
    $alamat_p = $u->alamat_rumah;
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
                        <a class="nav-link" aria-current="page" href="data-motor.php">Jual Motor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="transaksi.php">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="logout.php">Log out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" ><?php echo $username ?></a>
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
                            value="Rp. <?php echo $harga_motor; ?>">
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
                        <img src="images/<?php echo $m->gambar_motor ?>" width="300px">
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
                        <input type="text" readonly class="form-control" id="nama_lengkap" value="<?php echo $nama_p?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat_rumah" class="col-sm-2 col-form-label">Alamat Rumah</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="alamat_rumah" value="<?php echo $alamat_p ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama_lengkap" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="nama_lengkap" value="<?php echo $email_p ?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nomor_tlp" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" readonly class="form-control" id="nomor_tlp" value="<?php echo $tlp_p ?>">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>