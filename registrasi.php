<?php
require 'function.php';

if(isset($_POST['register'])){
    $username = ucwords($_POST['username']);
    $password = $_POST['password'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = ucwords($_POST['alamat']);
    $email = $_POST['email'];
    $nomor_tlp = $_POST['nomor_tlp'];

    $duplicate = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    if(mysqli_num_rows($duplicate) > 0){
        $error = "Username sudah terdaftar";
    }
    else{
        if($username && $password){
            $sql3 = "INSERT INTO user (username, password, nama_lengkap, alamat_rumah, email, nomor_tlp) VALUES ('$username', '$password', '$nama_lengkap', '$alamat', '$email', '$nomor_tlp')";
            $query3 = mysqli_query($koneksi, $sql3);
            if($query3){
                $success = "Registrasi sukses";
                if ($success) {
                    header("refresh:1;url=index.php");
                }
            }else{
                $error = "Registrasi gagal";
            }
        }else{
            $error = "Username dan password harus diisi";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css?v=<?php echo time(); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <title>IPB Garage</title>
</head>

<body>
    <section class="login d-flex">
        <div class="login-left w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-6">
                    <div class="header">
                        <h1>IPB Garage</h1>
                        <p>Registrasi akun anda.</p>
                    </div>
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
                        <div class="login-form">
                            <label for="username" class="form-label">Username</label>
                            <input type="username" class="form-control" id="username" name="username"
                                placeholder="Masukkan username" value="" required>
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Masukkan password" value="" required>
                            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                            <input type="nama_lengkap" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                placeholder="Masukkan nama lengkap" value="" required>
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="alamat" class="form-control" id="alamat" name="alamat"
                                placeholder="Masukkan alamat" value="">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Masukkan e-mail" value="" required>
                            <label for="nomor_tlp" class="form-label">Nomor Telepon</label>
                            <input type="nomor_tlp" class="form-control" id="nomor_tlp" name="nomor_tlp"
                                placeholder="Masukkan nomor telepon" value="" required>
                            <input type="submit" name="register" value="Registrasi" class="login-button">
                            <div class="text-center">
                                <span class="d-inline">Sudah memiliki akun? <a href="index.php"
                                        class="d-inline text-decoration-none" required>Log in</a></span>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="login-right w-50 h-100">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/4.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>sell.</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/5.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>explore.</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/6.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>have fun.</h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>