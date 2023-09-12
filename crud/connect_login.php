<?php
session_start();

include "connect.php";
$user = [
	'email' => $_POST['email'],
	'password' => $_POST['password'],
];
$query = "SELECT * from admin where email = ? limit 1";

$stmt = $conn->stmt_init();

$stmt->prepare($query);

$stmt->bind_param('s', $user['email']);

$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_array(MYSQLI_ASSOC);

if($row != null){     
	if(md5($user['password']) == $row['password']){
		$_SESSION['login'] = true;
		$_SESSION['email'] =  $user['email'];
		$_SESSION['username'] =  $row['username'];
		header('Location:../../phpdasar/relasi/siswa.php');
	}else{
		$_SESSION['error'] = 'Password anda salah.';
		header('Location: login.php');
	}

}else{
	$_SESSION['error'] = 'Username dan password anda tidak ditemukan.';
	header("Location: login.php");
}



?>