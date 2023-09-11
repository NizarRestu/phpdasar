<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Nama: <input type="text" name="nama">
    <br>
    <br>
    Umur: <input type="text" name="umur">
    <br>
    <br>
    Gender: <input type="radio" name="gender" value="laki-laki">
    <label for="laki-laki">Laki-Laki</label>
    <input type="radio" name="gender" value="perempuan">
    <label for="perempuan">Perempuan</label>
    <br>
    <br>
    Makanan Kesukaan: <input type="checkbox" name = 'makanan[]' value="sate"> 
    <label for="makanan">Sate</label>
    <input type="checkbox" name = 'makanan[]' value="bakso"> 
    <label for="makanan">Bakso</label>
    <input type="checkbox" name = 'makanan[]' value="rendang"> 
    <label for="makanan">Rendang</label>
    <br>
    <br>
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $umur = $_POST['umur'];
  $gender = $_POST['gender'];
  $makanan = $_POST['makanan'];

  if (empty($nama) && empty($umur) && empty($gender) && empty($makanan)) {
    echo "<br>Nama , Umur atau Gender Kosong";
  } else {
    echo "<br>Nama saya adalah $nama <br>" ;
    echo "Umur saya sekarang  $umur tahun <br>" ;
    echo "Saya seorang  $gender <br>" ;
    echo"Dan makanan kesukaan saya adalah ";
    foreach($_POST['makanan'] as $checkbox) {
        echo "$checkbox" . " ";
    }
  
  }
}
?>
</body>
</html>