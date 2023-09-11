<?php
session_start();

if (empty($_SESSION['login'])) {
    header("Location: login.php");
}
?>
<?php
include 'connect.php';
$id = $_GET['id'];
$get_data = "select * from product where id = $id";
$result_data = mysqli_query($conn, $get_data);
$row = mysqli_fetch_assoc($result_data);
$nama_product = $row['nama_product'];
$harga = $row['harga'];
$jenis = $row['jenis_product'];
$tanggal_masuk = $row['tanggal_masuk'];
$tanggal_expired = $row['tanggal_expired'];
if (isset($_POST['submit'])) {
    $nama_product = $_POST['nama'];
    $harga = $_POST['harga'];
    $jenis = $_POST['jenis'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $tanggal_expired = $_POST['tanggal_expired'];
    $sql = "update product set id=$id ,nama_product = '$nama_product' , harga = $harga ,jenis_product = '$jenis' , tanggal_masuk= '$tanggal_masuk', tanggal_expired = '$tanggal_expired' where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:read.php');
    } else {
        die($conn->connect_error);
        echo $conn->connect_error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body class="min-vh-100 d-flex align-items-center">
    <div class="card w-50 m-auto p-3">
        <h3 class="text-center">Create</h3>
        <form method="post">
            <div class="mb-3">
                <h6 for="nama" class="form-label ">Nama Product</h6>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_product ?>">
            </div>
            <div class="mb-3">
                <h6 for="alamat" class="form-label">Harga</h6>
                <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $harga ?>">
            </div>
            <div class="mb-3">
                <h6 for="jenis" class="form-label">Jenis</h6>
                <div class="form-check">
                    <?php
                    if ($jenis == "makanan") {
                        echo '<input class="form-check-input" type="radio" name="jenis" id="jenis" value="makanan" checked>
                        <label class="form-check-label" for="jenis">
                            Makanan
                        </label>';
                    } else {
                        echo ' <input class="form-check-input" type="radio" name="jenis" id="jenis" value="makanan">
                        <label class="form-check-label" for="jenis">
                            Makanan
                        </label>';
                    }
                    ?>
                </div>
                <div class="form-check">
                    <?php
                    if ($jenis == "minuman") {
                        echo '<input class="form-check-input" type="radio" name="jenis" id="jenis" value="minuman" checked>
                        <label class="form-check-label" for="jenis">
                            Minuman
                        </label>';
                    } else {
                        echo ' <input class="form-check-input" type="radio" name="jenis" id="jenis" value="minuman">
                        <label class="form-check-label" for="jenis">
                            minuman
                        </label>';
                    }
                    ?>
                </div>
            </div>
            <div class="mb-3">
                <h6 for="tanggal_masuk" class="form-label">Tanggal Masuk</h6>
                <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?php echo $tanggal_masuk ?>">
            </div>
            <div class="mb-3">
                <h6 for="tanggal_expired" class="form-label">Tanggal Expired</h6>
                <input type="date" class="form-control" id="tanggal_expired" name="tanggal_expired" value="<?php echo $tanggal_expired ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>