<?php
// session_start();

// if (empty($_SESSION['login'])) {
//     header("Location: login.php");
// }
?>
<?php
include "connect.php";
if (isset($_POST['submit'])) {
    $nama_siswa = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $gender = $_POST['gender'];
    $input_id_kelas = $_POST['id_kelas'];

    $get_data_kelas = "select * from kelas where id = $input_id_kelas";
    $result_data = mysqli_query($conn, $get_data_kelas);
    $kelas = mysqli_fetch_assoc($result_data);
    $id_kelas = $kelas['id'];
    $tingkat_kelas = $kelas['tingkat_kelas'];
    $jurusan_kelas = $kelas['jurusan_kelas'];

    $sql = "insert into siswa (nama_siswa , nisn , gender , id_kelas) values ('$nama_siswa' , '$nisn' , '$gender' , '$input_id_kelas')";
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
        <h3 class="text-center">Create</h3>
        <form method="post" class="row">
            <div class="mb-3 col-6">
                <label for="nama" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3 col-6">
                <label for="alamat" class="form-label">NISN</label>
                <input type="text" class="form-control" id="nisn" name="nisn">
            </div>
            <div class="mb-3 col-6">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-select">
                    <option selected>Pilih Gender</option>
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