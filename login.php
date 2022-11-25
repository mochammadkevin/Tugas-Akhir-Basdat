<?php
require 'function.php';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($koneksi, "SELECT * FROM registrasi WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row['password']){
            $_SESSION['login'] = true;
            $_SESSION['id_user'] = $row['id_user'];
            header("Location: pilihan.php");
        }
        else{
            $error = "Password salah";
        }
    }
    else{
        $error = "Username tidak terdaftar";
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
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <title>IPB Garage</title>
</head>

<body>
    halo
    <section class="login d-flex">
        <div class="login-left w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                 <div class="col-6">
                    <div class="header">
                        <h1>IPB Garage</h1>
                        <p>Selamat datang! Silahkan masukkan detail akun anda.</p>
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
                            <input type="username" class="form-control" id="username" name="username" placeholder="Masukkan username" 
                                value="<?php echo $username ?>">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" 
                                value="<?php echo $password ?>">
                            <input type="submit" name="submit" value="Login" class="login-button">
                            <div class="text-center">
                                <span class="d-inline">Tidak memiliki akun? <a href="registrasi.php"
                                        class="d-inline text-decoration-none">Registrasi di sini</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="login-right w-50 h-100">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>sell.</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/2.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>explore.</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/3.jpg" class="d-block w-100" alt="...">
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
