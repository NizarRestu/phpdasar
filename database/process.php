<?php
session_start();

include "koneksi.php";

//dapatkan data user dari form
$user = [
	'email' => $_POST['email'],
	'password' => $_POST['password'],
];

//check apakah user dengan username tersebut ada di table users
$query = "SELECT * from admin where email = ? limit 1";

$stmt = $mysqli->stmt_init();

$stmt->prepare($query);

$stmt->bind_param('s', $user['email']);

$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_array(MYSQLI_ASSOC);

if($row != null){
	//username ditemukan
	//kita cek apakah password dengan hash password sesuai.      
	if(password_verify($user['password'], $row['password'])){
		$_SESSION['login'] = true;
		$_SESSION['email'] =  $user['email'];
		$_SESSION['username'] =  $row['username'];
		$_SESSION['message']  = 'Berhasil login ke dalam sistem.';
		header("Location: index.php");
	}else{
		$_SESSION['error'] = 'Password anda salah.';
		header("Location: login.php");
	}

}else{
	$_SESSION['error'] = 'Username dan password anda tidak ditemukan.';
	header("Location: login.php");
}



?>