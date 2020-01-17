<!DOCTYPE html>
<html>
<head>
	<title>Cek</title>
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<script type="text/javascript" src="../../assets/js/Chart.js"></script>
	<script type="text/javascript" src="../../assets/js/chartjs-datalabels.min.js"></script>
</head>
<body style="background-color: #eff8f9ff">
	<center>
	<?php 
		$peserta_id = '$2y$10$A4fDMBGLYCVc1WJ5k7vvgeVrFWVH6FIlVgJPYYIZYAOWtItd/qC.e';
		$paslon1 = 1;
		$paslon2 = 2;

		if(password_verify($paslon1, $peserta_id)){
			echo '<h1>Anda Telah Memilih 1kutserta</h1>';
		}
		else if(password_verify($paslon2, $peserta_id)){
			echo '<h1>Anda Telah Memilih Simi-Simi</h1>';
		}
		else{
			echo '<h1>Anda Belum Memilih</h1>';
		}
	?>
	</center>

</body>
</html>
