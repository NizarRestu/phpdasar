<?php
session_start();

if (empty($_SESSION['login'])) {
    header("Location: login.php");
}
?>
<?php 
session_start();

//logout
//hapus semua session
session_unset();
//tampilkan sukses logout
$_SESSION['logout'] = 'Berhasil logout.';
header("Location: login.php");

?>