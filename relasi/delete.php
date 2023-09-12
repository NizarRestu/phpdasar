<?php
// session_start();

// if (empty($_SESSION['login'])) {
//     header("Location: login.php");
// }
?>
<?php
include 'connect.php';
$id = $_GET['id'];
if (isset($id)) {
    $sql = "delete from siswa where id_siswa=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:siswa.php');
    } else {
        die($conn->connect_error);
    }
}
?>