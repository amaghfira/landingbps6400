<?php 
//include 'config.php';

//connect mysqli
$host = mysqli_connect("localhost","root","","kalender_zoom");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($host, "SELECT * FROM users WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	if ($_SESSION['username'] == 'bps6400') {
		header('location:https://docs.google.com/spreadsheets/d/1SXfIBjInzDiC_7FOTpo9cvjCVMgrkHFb/edit#gid=1440722190');
	} else {
		header("location:index.php");		
	}
} else {
	header("location:index.php");
}
?>