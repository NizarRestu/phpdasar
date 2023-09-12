<?php
include 'connect.php';
$id = $_GET['id'];
$get_data = "select * from siswa where id_siswa = $id";
$result_data = mysqli_query($conn, $get_data);
$row = mysqli_fetch_assoc($result_data);
$nama_siswa = $row['nama_siswa'];
$nisn = $row['nisn'];
$gender = $row['gender'];

if (isset($_POST['submit'])) {
    $input_nama_siswa = $_POST['nama'];
    $input_nisn = $_POST['nisn'];
    $input_gender = $_POST['gender'];
    $input_id_kelas = $_POST['id_kelas'];
    $sql = "update siswa set id_siswa=$id , nama_siswa = '$input_nama_siswa' , nisn = '$input_nisn' , gender = '$input_gender' , id_kelas = '$input_id_kelas' where id_siswa=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location:siswa.php');
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
    <div class="card w-75 m-auto p-3">
        <h3 class="text-center">Update</h3>
        <form method="post" class="row">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama_siswa ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="alamat" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn ?>">
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option selected><?php echo $gender ?></option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="mb-3 col-6">
                <label for="kelas" class="form-label">Kelas</label>
                <select name="id_kelas" class="form-select">
                    <option selected>Pilih Kelas</option>
                    <?php
                    $sql = "select * from kelas";
                    $result = mysqli_query($conn, $sql);
                    foreach ($result as $row) :
                    ?>
                        <option value="<?= $row['id'] ?>"> <?= $row['tingkat_kelas'] . ' ' . $row['jurusan_kelas'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-1 text-start">
                <a href="siswa.php" class="btn btn-danger px-3">Kembali</a>
            </div>
            <div class="col-11 text-end">
                <button type="submit" class="btn btn-primary px-3" name="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>