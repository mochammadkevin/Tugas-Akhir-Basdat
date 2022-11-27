<?php
session_start();
include 'function.php';
if( !isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
  }

$id_user = $_SESSION['id_user'];
$sql = "SELECT * FROM user WHERE id_user = $id_user";
$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($query);

$nama_lengkap = $data['nama_lengkap'];
$alamat_rumah = $data['alamat_rumah'];
$nomor_tlp = $data['nomor_tlp'];
$email = $data['email'];

if(isset($_POST['submit'])){
    $nama_lengkap = ucwords($_POST['nama_lengkap']);
    $email = $_POST['email'];
    $nomor_tlp = $_POST['nomor_tlp'];
    $alamat_rumah = ucwords($_POST['alamat_rumah']);
    $update = mysqli_query($koneksi, "UPDATE user SET nama_lengkap = '$nama_lengkap', email = '$email', nomor_tlp = '$nomor_tlp', alamat_rumah = '$alamat_rumah' WHERE id_user = $_SESSION[id_user]");
    if($update){
        $success = "Data berhasil diubah";
        header("refresh:1;url=profile.php");
    }else{
        $error = "Data gagal diubah";
        header("refresh:1;url=profile.php");
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
    <link rel="stylesheet" href="style.css">
    <title>IPB Garage</title>
    <style>
        .mx-auto {
        width: 900px;
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
                        <a class="nav-link active" aria-current="page" href="profile.php">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="data-motor.php">Jual Motor</a>
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
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
                <?php
                }
                ?>
                <?php
                if ($success) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success; ?>
                </div>
                
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="nama lengkap" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $nama_lengkap ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Alamat rumah</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="alamat rumah" class="form-control" id="alamat_rumah" name="alamat_rumah" value="<?php echo $alamat_rumah ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" placeholder="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_lengkap" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="nomor telepon" class="form-control" id="nomor_tlp" name="nomor_tlp" value="<?php echo $nomor_tlp ?>">
                        </div>
                    </div>
                    
                    
                    <div class="col-12">
                        <input type="submit" name="submit" value="Simpan" class="btn btn-dark">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>