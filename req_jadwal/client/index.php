<html>
<head>
	<title>Client Zoom Request</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
	<link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    
    <style>
    .container {
        border:10px;
        /* padding:10px */
    }

    .welcome{
        padding: 30px;    
    }

    #logout {
        color:black;
        text-align: right;
    }
	#divtabel{
		border:10px;
		padding:70px;
	}
    </style>

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav ml-auto">
        <a class="navbar-brand" href="logout.php" id="logout">Logout</a>
      </ul>
    </div>
  </div>
</nav>


<?php 
include '../config.php';

$link = mysqli_connect("localhost", "root", "", "kalender_zoom");

// mengaktifkan session
session_start();

// cek apakah user telah login, jika belum login maka di alihkan ke halaman login
if($_SESSION['status'] !="login"){
	header("location:../index.php");
}

// menampilkan pesan selamat datang
echo "<div class='welcome' style='text-align:right'>" . " <p>Hai, selamat datang ". $_SESSION['username'] . "</p></div>";

$user = $_SESSION['username'];
if(isset($_POST['submit'])) {
	// ambil dari input user
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$tanggal_mulai = $_POST['zoom-start-date'];
		$tanggal_selesai = $_POST['zoom-end-date'];
		$waktu_mulai = $_POST['zoom-start-time'];
		$waktu_selesai = $_POST['zoom-end-time'];
		$pengguna = $_POST['zoom-pengguna'];
		$deskripsi = $_POST['zoom-deskripsi'];
		$radioval = $_POST["zoom-radio"];
		if($radioval == "<50"){
			$jumlah_peserta = $radioval;
		} else {
			$jumlah_peserta = $radioval;
		}
		$host = $_POST['zoom-host'];
		
		// insert db 
		$sql = "INSERT INTO jadwal_zoom (tanggal_mulai, tanggal_selesai, waktu_mulai, waktu_selesai, pengguna, deskripsi, jumlah_peserta, host, username) VALUES ('$tanggal_mulai', '$tanggal_selesai', '$waktu_mulai', '$waktu_selesai', '$pengguna', '$deskripsi','$jumlah_peserta','$host','$user')";

		if(mysqli_query($link, $sql)){
			
			echo "Data berhasil direkam";

		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
		
	}
	// Close connection
	mysqli_close($link);

	header('Location: '.$_SERVER['PHP_SELF']);
	die;
	// $_POST['submit'] = array('');
}
	
?>



<br/>
<br/>




<div class="container">
  <h2>Form Request Zoom Meeting</h2>
  <br><br>
  <form id="myForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="form-group">
      <label class="form-label mt-4" for="startdate">Tanggal Mulai:</label>
	  <div class="form-floating mb-3">
      	<input type="date" class="form-control" id="startdate" placeholder="Masukkan tanggal mulai" name="zoom-start-date">
	  </div>
    </div>
    <div class="form-group">
      <label class="form-label mt-4" for="enddate">Tanggal Selesai:</label>
      <input type="date" class="form-control" id="enddate" placeholder="Masukkan tanggal selesai" name="zoom-end-date">
    </div>
	<div class="form-group">
      <label class="form-label mt-4" for="starttime">Waktu Mulai:</label>
      <input type="time" class="form-control" id="starttime" placeholder="Masukkan waktu mulai" name="zoom-start-time">
    </div>
	<div class="form-group">
      <label class="form-label mt-4" for="endtime">Waktu Selesai:</label>
      <input type="time" class="form-control" id="endtime" placeholder="Masukkan waktu selesai" name="zoom-end-time">
    </div>
	<div class="form-group">
      <label class="form-label mt-4" for="pengguna">Pengguna:</label>
	  <div class="form-floating mb-3">
		<?php if ($user == 'ipds6400' ) { ?>
			<input type="text" class="form-control" id="pengguna" name="zoom-pengguna" value="IPDS" readonly>
		<?php } ?>
		<?php if ($user == 'sosial6400' ) { ?>
			<input type="text" class="form-control" id="pengguna" name="zoom-pengguna" value="Sosial" readonly>
		<?php } ?>
		<?php if ($user == 'produksi6400' ) { ?>
			<input type="text" class="form-control" id="pengguna" name="zoom-pengguna" value="Produksi" readonly>
		<?php } ?>
		<?php if ($user == 'distribusi6400' ) { ?>
			<input type="text" class="form-control" id="pengguna" name="zoom-pengguna" value="Distribusi" readonly>
		<?php } ?>
		<?php if ($user == 'nerwilis6400' ) { ?>
			<input type="text" class="form-control" id="pengguna" name="zoom-pengguna" value="Nerwilis" readonly>
		<?php } ?>
		<?php if ($user == 'tu6400' ) { ?>
			<input type="text" class="form-control" id="pengguna" name="zoom-pengguna" value="TU" readonly>
		<?php } ?>
	  </div>
    </div>
	<div class="form-group">
      <label class="form-label mt-4" for="deskripsi">Deskripsi:</label>
      <input type="text" class="form-control" id="deskripsi" placeholder="Masukkan deskripsi kegiatan" name="zoom-deskripsi">
    </div>
	<div class="">
      <label for="less50">Jumlah Peserta:</label><br>
      <input type="radio" class="" id="less50" name="zoom-radio" value="<50">
	  <label for="less50">Kurang dari 50 peserta</label><br>
	  <input type="radio" class="" id="more50" name="zoom-radio" value=">50">
	  <label for="more50">Lebih dari 50 peserta</label><br>
    </div>
	<div class="form-group">
      <label class="form-label mt-4" for="host">Host:</label>
      <input type="text" class="form-control" id="host" placeholder="Masukkan nama host kegiatan" name="zoom-host">
    </div>
	<br>
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
</div>

<br><br><br>

<div id="divtabel">
	<h3 style="text-align:center;">Jadwal Zoom Meeting BPS Kaltim</h3>
	<br><br>
	<table class="table table-hover table-striped">
		<thead class="thead-dark">
			<th>ID</th>
			<th>Tanggal Mulai</th>
			<th>Tanggal Selesai </th>
			<th>Waktu Mulai </th>
			<th>Waktu Selesai</th>
			<th>Pengguna</th>
			<th>Deskripsi</th>
			<th>Jumlah Peserta</th>
			<th>Host</th>
			<th>Akun Zoom</th>
			<th>Id Meeting</th>
			<th>Password</th>
			<th>Link</th>
		</thead>
		
		<?php 
		$link = mysqli_connect("localhost", "root", "", "kalender_zoom");
		$user = $_SESSION['username'];
		$result = mysqli_query($link, "SELECT * FROM jadwal_zoom WHERE username='$user' ORDER BY id ASC"); // using mysqli_query instead
		while($res = mysqli_fetch_array($result)) {         
			echo "<tr>";
			echo "<td>".$res['id']."</td>";
			echo "<td>".$res['tanggal_mulai']."</td>";
			echo "<td>".$res['tanggal_selesai']."</td>";
			echo "<td>".$res['waktu_mulai']."</td>";    
			echo "<td>".$res['waktu_selesai']."</td>";
			echo "<td>".$res['pengguna']."</td>";
			echo "<td>".$res['deskripsi']."</td>";
			echo "<td>".$res['jumlah_peserta']."</td>";
			echo "<td>".$res['host']."</td>";
			echo "<td>".$res['akun_zoom']."</td>";
			echo "<td>".$res['id_meeting']."</td>";
			echo "<td>".$res['password']."</td>";
			echo "<td><a href='".$res['link']."'>". $res['link'] ."</a></td>";
			echo "</tr>";				
		}

		mysqli_close($link);
		?>
	</table>
</div>
<!-- <a href="logout.php">LOGOUT</a> -->
	

</body>
</html>
