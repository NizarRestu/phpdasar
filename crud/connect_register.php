<?php
session_start();
include 'connect.php';

$email = $_POST['email'];
$password = md5( $_POST['password']);
$username = $_POST['username'];
$query = "SELECT * from admin where email = ? limit 1";

$stmt = $conn->stmt_init();

$stmt->prepare($query);

$stmt->bind_param('s', $email);

$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_array(MYSQLI_ASSOC);
if ($row == null) {
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
