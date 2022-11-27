<?php
require 'function.php';
$_SESSION = [];
session_unset();
// session_start();
session_destroy();
header("Location: index.php");
// echo '<script>window.location="index.php"</script>';
exit;
?>