<?php
session_start();
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'uasbasdat';
$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die('Koneksi Gagal');
}
$nama_penjual = "";
$nomor_penjual = "";
$alamat_penjual = "";
$email_penjual = "";
$nama_pembeli = "";
$nomor_pembeli = "";
$alamat_pembeli = "";
$email_pembeli = "";
$success = "";
$error = "";
$username = "";
$password = "";
$confirmpassword = "";

?>