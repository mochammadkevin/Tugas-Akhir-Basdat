<?php
session_start();
if( !isset($_SESSION["login"]) ) {
    header("Location: index.php");
    exit;
  }
include 'function.php';

if (isset($_GET['idm'])) {
    $idm = $_GET['idm'];
    $sql = "SELECT * FROM motor WHERE id_motor = $idm and id_user = $_SESSION[id_user]";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);

    $motor = mysqli_query($koneksi, "SELECT * FROM motor WHERE id_motor = '$_GET[idm]'");
    $m = mysqli_fetch_object($motor);

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
if (isset($_POST['submit'])) {
    //tampung data lama
    $merk_motor = $_POST['merk_motor'];
    $nama_motor = $_POST['nama_motor'];
    $jenis_motor = $_POST['jenis_motor'];
    $CC_motor = $_POST['CC_motor'];
    $tahun_keluaran = $_POST['tahun_keluaran'];
    $jarak_tempuh = $_POST['jarak_tempuh'];
    $harga_motor = $_POST['harga_motor'];
    $deskripsi_motor = $_POST['deskripsi_motor'];
    $gambar_lama = $_POST['gambar_lama'];

    //tampung gambar baru
    $gambar_motor = $_FILES['gambar_motor']['name'];
    $tmp_name = $_FILES['gambar_motor']['tmp_name'];

    $type1 = explode('.', $gambar_motor);
    $type2 = $type1[1];

    $tipe_diizinkan = array('png', 'jpg', 'jpeg', 'gif');

    //jika ganti gambar
    if ($gambar_motor != '') {

        //validasi format gambar
        if (!in_array($type2, $tipe_diizinkan)) {
            $error = "Format file tidak diizinkan";
        } else {
            //hapus gambar lama
            unlink("images/" . $gambar_lama);
            //upload gambar baru
            move_uploaded_file($tmp_name, 'images/' . $gambar_motor);

        }
    } else {
        $gambar_motor = $gambar_lama;
    }
    // Update data ke database
    $update = mysqli_query($koneksi, "UPDATE motor SET 
        merk_motor='$merk_motor', 
        nama_motor='$nama_motor', 
        jenis_motor='$jenis_motor', 
        CC_motor='$CC_motor', 
        gambar_motor='$gambar_motor', 
        tahun_keluaran='$tahun_keluaran', 
        jarak_tempuh='$jarak_tempuh', 
        harga_motor='$harga_motor', 
        deskripsi_motor='$deskripsi_motor' 
        WHERE id_motor='$idm'");
    if ($update) {
        $success = "Berhasil mengupdate data motor";
        if ($success) {
            header("refresh:1;url=data-motor.php");
        }
    } else {
        $error = "Gagal mengupdate data motor";
    }



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
                        <a class="nav-link" aria-current="page" href="data-motor.php">Kembali</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="form-pembeli.php">Edit Data Motor</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Edit Data Motor
            </div>
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
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                        <label for="merk_motor" class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="merk_motor" name="merk_motor" required>
                                <option value="">Pilih merk motor</option>
                                <option value="Yamaha" <?php if ($merk_motor == "Yamaha") echo "selected" ?>>Yamaha
                                </option>
                                <option value="Honda" <?php if ($merk_motor == "Honda") echo "selected" ?>>Honda</option>
                                <option value="Suzuki" <?php if ($merk_motor == "Suzuki") echo "selected" ?>>Suzuki
                                </option>
                                <option value="Kawasaki" <?php if ($merk_motor == "Kawasaki") echo "selected" ?>>Kawasaki
                                </option>
                                <option value="Ducati" <?php if ($merk_motor == "Ducati") echo "selected" ?>>Ducati
                                </option>
                                <option value="BMW" <?php if ($merk_motor == "BMW") echo "selected" ?>>BMW</option>
                                <option value="Harley Davidson" <?php if ($merk_motor == "Harley Davidson") echo
                                        "selected" ?>>Harley Davidson</option>
                                <option value="Triumph" <?php if ($merk_motor == "Triumph") echo "selected" ?>>Triumph
                                </option>
                                <option value="KTM" <?php if ($merk_motor == "KTM") echo "selected" ?>>KTM</option>
                                <option value="Aprilia" <?php if ($merk_motor == "Aprilia") echo "selected" ?>>Aprilia
                                </option>
                                <option value="Benelli" <?php if ($merk_motor == "Benelli") echo "selected" ?>>Benelli
                                </option>
                                <option value="Vespa" <?php if ($merk_motor == "Vespa") echo "selected" ?>>Vespa</option>
                                <option value="Piaggio" <?php if ($merk_motor == "Piaggio") echo "selected" ?>>Piaggio
                                </option>
                                <option value="MV Agusta" <?php if ($merk_motor == "MV Agusta") echo "selected" ?>>MV
                                    Agusta</option>
                                <option value="Royal Enfield" <?php if ($merk_motor == "Royal Enfield") echo "selected" ?>
                                    >Royal Enfield</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_motor" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Masukkan nama" class="form-control" id="nama_motor"
                                name="nama_motor" value="<?php echo $nama_motor ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_motor" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="jenis_motor" name="jenis_motor" required>
                                <option value="">Pilih jenis motor</option>
                                <option value="Bebek" <?php if ($jenis_motor == "Bebek") echo "selected" ?>>Bebek</option>
                                <option value="Sport" <?php if ($jenis_motor == "Sport") echo "selected" ?>>Sport</option>
                                <option value="Matic" <?php if ($jenis_motor == "Matic") echo "selected" ?>>Matic</option>
                                <option value="Cub" <?php if ($jenis_motor == "Cub") echo "selected" ?>>Cub</option>
                                <option value="Scooter" <?php if ($jenis_motor == "Scooter") echo "selected" ?>>Scooter
                                </option>
                                <option value="Naked" <?php if ($jenis_motor == "Naked") echo "selected" ?>>Naked</option>
                                <option value="Touring" <?php if ($jenis_motor == "Touring") echo "selected" ?>>Touring
                                </option>
                                <option value="Cruiser" <?php if ($jenis_motor == "Cruiser") echo "selected" ?>>Cruiser
                                </option>
                                <option value="Offroad" <?php if ($jenis_motor == "Offroad") echo "selected" ?>>Offroad
                                </option>
                                <option value="Chopper" <?php if ($jenis_motor == "Chopper") echo "selected" ?>>Chopper
                                </option>
                                <option value="Bobber" <?php if ($jenis_motor == "Bobber") echo "selected" ?>>Bobber
                                </option>
                                <option value="Custom" <?php if ($jenis_motor == "Custom") echo "selected" ?>>Custom
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="CC_motor" class="col-sm-2 col-form-label">CC</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="CC_motor" name="CC_motor">
                                <option value="">Pilih CC motor</option>
                                <option value="100" <?php if ($CC_motor=="100")
                                    echo "selected" ?>>100</option>
                                <option value="125" <?php if ($CC_motor=="125")
                                    echo "selected" ?>>125</option>
                                <option value="150" <?php if ($CC_motor=="150")
                                    echo "selected" ?>>150</option>
                                <option value="200" <?php if ($CC_motor=="200")
                                    echo "selected" ?>>200</option>
                                <option value="250" <?php if ($CC_motor=="250")
                                    echo "selected" ?>>250</option>
                                <option value="600" <?php if ($CC_motor=="600")
                                    echo "selected" ?>>600</option>
                                <option value="1000" <?php if ($CC_motor=="1000")
                                    echo "selected" ?>>1000</option>
                            </select>
                        </div>
                    </div>
                    <p>Gambar lama:</p>
                    <img src="images/<?php echo $m->gambar_motor ?>" width="100px">
                    <input type="hidden" name="gambar_lama" value="<?php echo $m->gambar_motor ?>">
                    <p>Wajib mengupload ulang gambar pada saat mengedit data!</p>
                    <div class="mb-3 row">
                        <label for="gambar_motor" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="gambar_motor" name="gambar_motor"
                                value="<?php echo $gambar_motor ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun_keluaran" class="col-sm-2 col-form-label">Tahun Keluaran</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Masukkan input dalam 4 digit, contoh : 2015"
                                class="form-control" id="tahun_keluaran" name="tahun_keluaran"
                                value="<?php echo $tahun_keluaran ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jarak_tempuh" class="col-sm-2 col-form-label">Jarak Tempuh</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="jarak_tempuh" name="jarak_tempuh">
                                <option value="">Pilih jarak tempuh</option>
                                <option value="0 - 1.000 km" <?php if ($jarak_tempuh=="0 - 1.000 km")
                                    echo "selected" ?>
                                    >0 - 1.000 km</option>
                                <option value="1.000 - 5.000 km" <?php if ($jarak_tempuh=="1.000 - 5.000 km")
                                    echo
                                    "selected" ?>>1.000 - 5.000 km</option>
                                <option value="5.000 - 10.000 km" <?php if ($jarak_tempuh=="5.000 - 10.000 km")
                                    echo
                                    "selected" ?>>5.000 - 10.000 km</option>
                                <option value="10.000 - 20.000 km" <?php if ($jarak_tempuh=="10.000 - 20.000 km")
                                    echo
                                    "selected" ?>>10.000 - 20.000 km</option>
                                <option value="20.000 - 50.000 km" <?php if ($jarak_tempuh=="20.000 - 50.000 km")
                                    echo
                                    "selected" ?>>20.000 - 50.000 km</option>
                                <option value="50.000 - 100.000 km" <?php if ($jarak_tempuh=="50.000 - 100.000 km")
                                    echo
                                    "selected" ?>>50.000 - 100.000 km</option>
                                <option value="100.000 km+" <?php if ($jarak_tempuh=="100.000 km+")
                                    echo "selected" ?>
                                    >>100.000 km</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga_motor" class="col-sm-2 col-form-label">Harga Motor</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Masukkan harga, cth: 5000000" class="form-control"
                                id="harga_motor" name="harga_motor" value="<?php echo $harga_motor ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="deskripsi_motor" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Masukkan deskripsi" class="form-control"
                                id="deskripsi_motor" name="deskripsi_motor" value="<?php echo $deskripsi_motor ?>">
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