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
	if ($_SESSION['username'] == 'ipds6400') {
		header('location:https://s.bps.go.id/fra2021ipds');
	} else if ($_SESSION['username'] == 'sosial6400') {
		header("location: https://s.bps.go.id/fra2021sosial");		
	} else if ($_SESSION['username'] == 'produksi6400') {
		header("location: https://s.bps.go.id/fra2021produksi");		
	} else if ($_SESSION['username'] == 'neraca6400') {
		header("location: https://s.bps.go.id/fra2021newrwilis");		
	} else if ($_SESSION['username'] == 'distribusi6400') {
		header("location: https://s.bps.go.id/fra2021distribusi");		
	} else if ($_SESSION['username'] == 'tu6400') {
		header("location: https://s.bps.go.id/fra2021tu");		
	}
} else {
	header("location:index.php");
}
?>