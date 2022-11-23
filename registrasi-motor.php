<?php
require 'function.php';

if(isset($_POST['submit'])){
    $nama_pembeli = $_POST['nama_pembeli'];
    $nomor_pembeli = $_POST['nomor_pembeli'];
    $alamat_pembeli = $_POST['alamat_pembeli'];
    $email_pembeli = $_POST['email_pembeli'];
   
    if($nama_pembeli && $nomor_pembeli && $alamat_pembeli && $email_pembeli){
        $sql1 = "INSERT INTO pembeli (nama_pembeli, nomor_pembeli, alamat_pembeli, email_pembeli) VALUES ('$nama_pembeli', '$nomor_pembeli', '$alamat_pembeli', '$email_pembeli')";
        $query1 = mysqli_query($koneksi, $sql1);
        if($query1){
            $success = "Data berhasil disimpan";
        }else{
            $error = "Data gagal disimpan";
        }
    }else{
        $error = "Data tidak boleh kosong";
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
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama_pembeli" class="col-sm-2 col-form-label">Merk</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="Merk">
                                <option value="">Pilih merk motor</option>
                                <option value="Yamaha">Yamaha</option>
                                <option value="Honda">Honda</option>
                                <option value="Suzuki">Suzuki</option>
                                <option value="Kawasaki">Kawasaki</option>
                                <option value="Ducati">Ducati</option>
                                <option value="BMW">BMW</option>
                                <option value="Harley Davidson">Harley Davidson</option>
                                <option value="Triumph">Triumph</option>
                                <option value="KTM">KTM</option>
                                <option value="Aprilia">Aprilia</option>
                                <option value="Benelli">Benelli</option>
                                <option value="Vespa">Vespa</option>
                                <option value="Piaggio">Piaggio</option>
                                <option value="MV Agusta">MV Agusta</option>
                                <option value="Royal Enfield">Royal Enfield</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email_pembeli" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Masukkan nama" class="form-control" id="email_pembeli" name="email_pembeli"
                                value="<?php echo $email_pembeli ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nomor_pembeli" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="Jenis">
                                <option value="">Pilih jenis motor</option>
                                <option value="Bebek">Bebek</option>
                                <option value="Sport">Sport</option>
                                <option value="Matic">Matic</option>
                                <option value="Cub">Cub</option>
                                <option value="Scooter">Scooter</option>
                                <option value="Naked">Naked</option>
                                <option value="Touring">Touring</option>
                                <option value="Cruiser">Cruiser</option>
                                <option value="Offroad">Offroad</option>
                                <option value="Chopper">Chopper</option>
                                <option value="Bobber">Bobber</option>
                                <option value="Custom">Custom</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat_pembeli" class="col-sm-2 col-form-label">CC</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="CC">
                                <option value="">Pilih CC motor</option>
                                <option value="100">100</option>
                                <option value="125">125</option>
                                <option value="150">150</option>
                                <option value="200">200</option>
                                <option value="250">250</option>
                                <option value="300">600</option>
                                <option value="350">1000</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email_pembeli" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <a class="btn btn-primary" href="#" role="button">Upload</a>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email_pembeli" class="col-sm-2 col-form-label">Tahun Keluaran</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder= "Masukkan input dalam 4 digit, contoh : 2015"class="form-control" id="email_pembeli" name="email_pembeli"
                                value="<?php echo $email_pembeli ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email_pembeli" class="col-sm-2 col-form-label">Jarak Tempuh</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="Jarak Tempuh">
                                <option value="">Pilih jarak tempuh</option>
                                <option value="1000">0-1.000 km</option>
                                <option value="5000">1.000-5.000 km</option>
                                <option value="10000">5.000-10.000 km</option>
                                <option value="20000">10.000-20.000 km</option>
                                <option value="50000">20.000-50.000 km</option>
                                <option value="100000">50.000-100.000 km</option>
                                <option value="100000+">>100.000 km</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email_pembeli" class="col-sm-2 col-form-label">Kisaran Harga</label>
                        <div class="col-sm-10">
                        <select class="form-control" id="Kisaran Harga">
                                <option value="">Pilih kisaran harga</option>
                                <option value="5000000">0-5.000.000</option>
                                <option value="10000000">5.000.000-10.000.000</option>
                                <option value="20000000">10.000.000-20.000.000</option>
                                <option value="30000000">20.000.000-30.000.000</option>
                                <option value="40000000">30.000.000-40.000.000</option>
                                <option value="50000000">40.000.000-50.000.000</option>
                                <option value="60000000">50.000.000-60.000.000</option>
                                <option value="70000000">60.000.000-70.000.000</option>
                                <option value="80000000">70.000.000-80.000.000</option>
                                <option value="90000000">80.000.000-90.000.000</option>
                                <option value="100000000">90.000.000-100.000.000</option>
                                <option value="100000000+">>100.000.000</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email_pembeli" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" placeholder="Masukkan deskripsi" class="form-control" id="email_pembeli" name="email_pembeli"
                                value="<?php echo $email_pembeli ?>">
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