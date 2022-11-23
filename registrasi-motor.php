<?php

require 'function.php';

if(isset($_POST['submit'])){
    $merk_motor 	    = $_POST['merk_motor'];
    $nama_motor         = $_POST['nama_motor'];
    $jenis_motor 	    = $_POST['jenis_motor'];
    $CC_motor 		    = $_POST['CC_motor'];
    $gambar_motor 	    = $_FILES['gambar_motor']['name'];
    $tmp_name           = $_FILES['gambar_motor']['tmp_name'];
    $tahun_keluaran 	= $_POST['tahun_keluaran'];
    $jarak_tempuh 	    = $_POST['jarak_tempuh'];
    $harga_motor 		= $_POST['harga_motor'];
    $deskripsi_motor 	= $_POST['deskripsi_motor'];

    move_uploaded_file($tmp_name, 'images/' . $gambar_motor);
    
if($merk_motor && $nama_motor && $jenis_motor && $CC_motor && $gambar_motor && $tahun_keluaran && $jarak_tempuh && $harga_motor && $deskripsi_motor)
    {
        $sql4 	= "INSERT INTO motor (merk_motor, nama_motor, jenis_motor, CC_motor, gambar_motor, tahun_keluaran, jarak_tempuh, harga_motor, deskripsi_motor) 
        VALUES ('$merk_motor', '$nama_motor', '$jenis_motor', '$CC_motor', '$gambar_motor', '$tahun_keluaran', '$jarak_tempuh', '$harga_motor', '$deskripsi_motor')";
        $q4 	= mysqli_query($koneksi, $sql4);
        if($q4)
        {
            $sukses = "Berhasil menambahkan katalog motor";
        }
        else
        {
            $error = "Gagal menambahkan katalog motor";
        }
    }
}
else
{
    $error = "Data tidak boleh kosong";
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
    <style>
    .mx-auto {
        width: 850px;
    }

    .card {
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="login.php">IPB Garage</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="form-pembeli.php">Registrasi Motor</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Registrasi Motor
            </div>
            <div class="card-body">
                <?php
                if($error){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error; ?>
                </div>
                <?php
                }
                ?>
                <?php
                if($success){
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $success; ?>
                </div>
                <?php
                }
                ?>
                <form action="" method="POST" enctype = "multipart/form-data">
                    <div class="mb-3 row">
                        <label for="merk_motor" class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="merk_motor">
                                <option value="">Pilih merk motor</option>
                                <option value="Yamaha" <?php if ($merk_motor == "Yamaha") echo "selected" ?>>Yamaha</option>
                                <option value="Honda" <?php if ($merk_motor == "Honda") echo "selected" ?>>Honda</option>
                                <option value="Suzuki" <?php if ($merk_motor == "Suzuki") echo "selected" ?>>Suzuki</option>
                                <option value="Kawasaki" <?php if ($merk_motor == "Kawasaki") echo "selected" ?>>Kawasaki</option>
                                <option value="Ducati" <?php if ($merk_motor == "Ducati") echo "selected" ?>>Ducati</option>
                                <option value="BMW" <?php if ($merk_motor == "BMW") echo "selected" ?>>BMW</option>
                                <option value="Harley Davidson" <?php if ($merk_motor == "Harley Davidson") echo "selected" ?>>Harley Davidson</option>
                                <option value="Triumph" <?php if ($merk_motor == "Triumph") echo "selected" ?>>Triumph</option>
                                <option value="KTM" <?php if ($merk_motor == "KTM") echo "selected" ?>>KTM</option>
                                <option value="Aprilia" <?php if ($merk_motor == "Aprilia") echo "selected" ?>>Aprilia</option>
                                <option value="Benelli" <?php if ($merk_motor == "Benelli") echo "selected" ?>>Benelli</option>
                                <option value="Vespa" <?php if ($merk_motor == "Vespa") echo "selected" ?>>Vespa</option>
                                <option value="Piaggio" <?php if ($merk_motor == "Piaggio") echo "selected" ?>>Piaggio</option>
                                <option value="MV Agusta" <?php if ($merk_motor == "MV Agusta") echo "selected" ?>>MV Agusta</option>
                                <option value="Royal Enfield" <?php if ($merk_motor == "Royal Enfield") echo "selected" ?>>Royal Enfield</option>
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
                            <select class="form-control" id="jenis_motor">
                                <option value="">Pilih jenis motor</option>
                                <option value ="Bebek" <?php if ($jenis_motor == "Bebek") echo "selected" ?>>Bebek</option>
                                <option value="Sport" <?php if ($jenis_motor == "Sport") echo "selected" ?>>Sport</option>
                                <option value="Matic" <?php if ($jenis_motor == "Matic") echo "selected" ?>>Matic</option>
                                <option value="Cub" <?php if ($jenis_motor == "Cub") echo "selected" ?>>Cub</option>
                                <option value="Scooter" <?php if ($jenis_motor == "Scooter") echo "selected" ?>>Scooter</option>
                                <option value="Naked" <?php if ($jenis_motor == "Naked") echo "selected" ?>>Naked</option>
                                <option value="Touring" <?php if ($jenis_motor == "Touring") echo "selected" ?>>Touring</option>
                                <option value="Cruiser" <?php if ($jenis_motor == "Cruiser") echo "selected" ?>>Cruiser</option>
                                <option value="Offroad" <?php if ($jenis_motor == "Offroad") echo "selected" ?>>Offroad</option>
                                <option value="Chopper" <?php if ($jenis_motor == "Chopper") echo "selected" ?>>Chopper</option>
                                <option value="Bobber" <?php if ($jenis_motor == "Bobber") echo "selected" ?>>Bobber</option>
                                <option value="Custom" <?php if ($jenis_motor == "Custom") echo "selected" ?>>Custom</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="CC_motor" class="col-sm-2 col-form-label">CC</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="CC_motor">
                                <option value="">Pilih CC motor</option>
                                <option value="100" <?php if ($CC_motor == "100") echo "selected" ?>>100</option>
                                <option value="125" <?php if ($CC_motor == "125") echo "selected" ?>>125</option>
                                <option value="150" <?php if ($CC_motor == "150") echo "selected" ?>>150</option>
                                <option value="200" <?php if ($CC_motor == "200") echo "selected" ?>>200</option>
                                <option value="250" <?php if ($CC_motor == "250") echo "selected" ?>>250</option>
                                <option value="300" <?php if ($CC_motor == "600") echo "selected" ?>>600</option>
                                <option value="350" <?php if ($CC_motor == "1000") echo "selected" ?>>1000</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gambar_motor" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="gambar_motor" name="gambar_motor"
                                value="<?php echo $gambar_motor ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun_keluaran" class="col-sm-2 col-form-label">Tahun Keluaran</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Masukkan input dalam 4 digit, contoh : 2015"
                                class="form-control" id="tahun_keluaran" name="tahun_keluaran" value="<?php echo $tahun_keluaran ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jarak_tempuh" class="col-sm-2 col-form-label">Jarak Tempuh</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="jarak_tempuh">
                                <option value="">Pilih jarak tempuh</option>
                                <option value="1000" <?php if ($jarak_tempuh == "1000") echo "selected" ?>>0-1.000 km</option>
                                <option value="5000" <?php if ($jarak_tempuh == "5000") echo "selected" ?>>1.000-5.000 km</option>
                                <option value="10000" <?php if ($jarak_tempuh == "10000") echo "selected" ?>>5.000-10.000 km</option>
                                <option value="20000" <?php if ($jarak_tempuh == "20000") echo "selected" ?>>10.000-20.000 km</option>
                                <option value="50000" <?php if ($jarak_tempuh == "50000") echo "selected" ?>>20.000-50.000 km</option>
                                <option value="100000" <?php if ($jarak_tempuh == "100000") echo "selected" ?>>50.000-100.000 km</option>
                                <option value="100000+" <?php if ($jarak_tempuh == "100000+") echo "selected" ?>>>100.000 km</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga_motor" class="col-sm-2 col-form-label">Kisaran Harga</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="harga_motor">
                                <option value="">Pilih kisaran harga</option>
                                <option value="5000000" <?php if ($harga_motor == "5000000") echo "selected" ?>>0-5.000.000</option>
                                <option value="10000000" <?php if ($harga_motor == "10000000") echo "selected" ?>>5.000.000-10.000.000</option>
                                <option value="20000000" <?php if ($harga_motor == "20000000") echo "selected" ?>>10.000.000-20.000.000</option>
                                <option value="30000000" <?php if ($harga_motor == "30000000") echo "selected" ?>>20.000.000-30.000.000</option>
                                <option value="40000000" <?php if ($harga_motor == "40000000") echo "selected" ?>>30.000.000-40.000.000</option>
                                <option value="50000000" <?php if ($harga_motor == "50000000") echo "selected" ?>>40.000.000-50.000.000</option>
                                <option value="60000000" <?php if ($harga_motor == "60000000") echo "selected" ?>>50.000.000-60.000.000</option>
                                <option value="70000000" <?php if ($harga_motor == "70000000") echo "selected" ?>>60.000.000-70.000.000</option>
                                <option value="80000000" <?php if ($harga_motor == "80000000") echo "selected" ?>>70.000.000-80.000.000</option>
                                <option value="90000000" <?php if ($harga_motor == "90000000") echo "selected" ?>>80.000.000-90.000.000</option>
                                <option value="100000000" <?php if ($harga_motor == "100000000") echo "selected" ?>>90.000.000-100.000.000</option>
                                <option value="100000000+" <?php if ($harga_motor == "100000000+") echo "selected" ?>>>100.000.000</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="deskripsi_motor" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Masukkan deskripsi" class="form-control" id="deskripsi_motor"
                                name="deskripsi_motor" value="<?php echo $deskripsi_motor ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="submit" value="Registrasi" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>