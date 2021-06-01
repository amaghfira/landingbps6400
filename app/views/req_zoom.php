<div class="container">
  <h2>Form Request Zoom Meeting</h2>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="form-group">
      <label for="startdate">Tanggal Mulai:</label>
      <input type="date" class="form-control" id="startdate" placeholder="Masukkan tanggal mulai" name="zoom-start-date">
    </div>
    <div class="form-group">
      <label for="enddate">Tanggal Selesai:</label>
      <input type="date" class="form-control" id="enddate" placeholder="Masukkan tanggal selesai" name="zoom-end-date">
    </div>
	<div class="form-group">
      <label for="starttime">Waktu Mulai:</label>
      <input type="time" class="form-control" id="starttime" placeholder="Masukkan waktu mulai" name="zoom-start-time">
    </div>
	<div class="form-group">
      <label for="endtime">Waktu Selesai:</label>
      <input type="time" class="form-control" id="endtime" placeholder="Masukkan waktu selesai" name="zoom-end-time">
    </div>
	<div class="form-group">
      <label for="pengguna">Pengguna:</label>
      <input type="text" class="form-control" id="pengguna" placeholder="Masukkan nama pengguna (eg. IPDS)" name="zoom-pengguna">
    </div>
	<div class="form-group">
      <label for="deskripsi">Deskripsi:</label>
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
      <label for="host">Host:</label>
      <input type="text" class="form-control" id="host" placeholder="Masukkan nama host kegiatan" name="zoom-host">
    </div>
	<br>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

<br><br><br>

<h3>Jadwal Zoom Meeting BPS Kaltim</h3>
<table class="table">
	<thead class="thead-dark">
		<td>Tanggal Mulai</td>
		<td>Tanggal Selesai </td>
		<td>Waktu Mulai </td>
		<td>Waktu Selesai</td>
		<td>Pengguna</td>
		<td>Deskripsi</td>
		<td>Jumlah Peserta</td>
		<td>Host</td>
		<td>Akun Zoom</td>
		<td>Id Meeting</td>
		<td>Password</td>
		<td>Link</td>
	</thead>
