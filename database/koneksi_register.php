<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_sekolah";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$username = $_POST['username'];

$stmt = $pdo->prepare("SELECT * FROM admin WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$existingUser = $stmt->fetch();
if (!$existingUser) {
    $post = "INSERT INTO admin (email, password, username)
    VALUES ('$email', '$password', '$username')";
    if (mysqli_query($conn, $post)) {
        $_SESSION['sucsess'] = 0;
        header("Location: register.php");
    } else {
        echo "Error: " . $post . "<br>" . mysqli_error($conn);
    }
} else {
    $_SESSION['message'] = 0;
    header("Location: register.php");
}
