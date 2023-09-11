<?php
session_start();

if (empty($_SESSION['login'])) {
    header("Location: login.php");
}
?>
<?php
include "connect.php";
if (isset($_POST['submit'])) {
    $nama_product = $_POST['nama'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $tanggal_expired = $_POST['tanggal_expired'];
    $sql = "insert into product (nama_product , harga ,jenis_product , tanggal_masuk, tanggal_expired) values ('$nama_product' , $harga, '$jenis' , '$tanggal_masuk' , '$tanggal_expired')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:read.php');
    } else {
        die($conn->connect_error);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class="card w-50 m-auto p-3">
        <h3 class="text-center">Create</h3>
        <form method="post">
            <div class="mb-3">
                <h6 for="nama" class="form-label ">Nama Product</h6>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <h6 for="alamat" class="form-label">Harga</h6>
                <input type="number" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
                <h6 for="jenis" class="form-label">Jenis</h6>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" id="jenis" value="makanan">
                    <label class="form-check-label" for="jenis">
                        Makanan
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" id="jenis" value="minuman">
                    <label class="form-check-label" for="jenis">
                        Minuman
                    </label>
                </div>
            </div>
            <div class="mb-3">
                <h6 for="tanggal_masuk" class="form-label">Tanggal Masuk</h6>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk">
            </div>
            <div class="mb-3">
                <h6 for="tanggal_expired" class="form-label">Tanggal Expired</h6>
                <input type="date" class="form-control" id="tanggal_expired" name="tanggal_expired">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="read.php" class="btn btn-danger float-end" >Kembali</a>
        </form>
    </div>
</body>

</html>