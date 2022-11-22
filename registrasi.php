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
    <title>Register Page</title>
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