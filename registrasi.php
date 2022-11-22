<?php
require 'function.php';

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $duplicate = mysqli_query($koneksi, "SELECT * FROM registrasi WHERE username = '$username'");
    if(mysqli_num_rows($duplicate) > 0){
        $error = "Username sudah terdaftar";
    }
    else{
        if($username && $password){
            $sql3 = "INSERT INTO registrasi (username, password) VALUES ('$username', '$password')";
            $query3 = mysqli_query($koneksi, $sql3);
            if($query3){
                $success = "Registrasi akun berhasil";
            }else{
                $error = "Data gagal disimpan";
            }
        }else{
            $error = "Data tidak boleh kosong";
        }
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
        width: 800px;
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
                        <a class="nav-link" aria-current="page" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="registrasi.php">Registrasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Registrasi Akun
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
                        <label for="username" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="username" name="username" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" value="">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="register" value="Registrasi" class="btn btn-primary">
                    </div>

                    <div>&nbsp;</div>

                    <!-- give text -->
                    <div> Kembali ke page <a href="login.php">login</a> </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
