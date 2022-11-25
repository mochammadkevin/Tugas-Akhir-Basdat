<?php 

include 'function.php';

if(isset($_GET['idm'])){
    $motor = mysqli_query($koneksi, "SELECT * FROM motor WHERE id_motor = '$_GET[idm]'");
    $m = mysqli_fetch_object($motor);

    unlink('./images/'.$m->gambar_motor);


    $delete = "DELETE FROM motor WHERE id_motor = '$_GET[idm]'";
    $query = mysqli_query($koneksi, $delete);
    if($query){
        header('Location: data-motor.php');
    }else{
        echo "Gagal menghapus data";
    }
}
?>