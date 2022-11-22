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
            $_SESSION['id'] = $row['id'];
            header("Location: berhasil.php");
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
    <div class="mx-auto">
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Masuk Akun
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
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?php echo $username ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password"
                                value="<?php echo $password ?>">
                        </div>
                    </div>
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                        <label class="btn btn-outline-primary" for="btnradio1">Pembeli</label>

                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                        <label class="btn btn-outline-primary" for="btnradio2">Penjual</label>
                    </div>

                    <div>&nbsp;</div> 

                    <div class="col-12">
                        <input type="submit" name="submit" value="Login" class="btn btn-primary">
                    </div>

                    <div>&nbsp;</div> 

                    <!-- give text -->
                    <div> Belum registrasi? <a href="registrasi.php">Klik disini</a> </div>
                
                </form>
            </div>
        </div>
    </div>
</body>

</html>