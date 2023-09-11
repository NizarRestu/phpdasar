<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Nama: <input type="text" name="name">
    <br>
    <br>
    Umur: <input type="text" name="age">
  <input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $age = $_POST['age'];
  if (empty($name) && empty($age)) {
    echo "<br>Name or Age is empty";
  } else {
    echo "<br>Nama saya adalah $name <br>" ;
    echo"Umur saya sekarang  $age tahun" ;
  }
}
?>
</body>
</html>