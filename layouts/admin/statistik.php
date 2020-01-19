<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pemilih</title>
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<script type="text/javascript" src="../../assets/js/Chart.js"></script>
	<script type="text/javascript" src="../../assets/js/chartjs-datalabels.min.js"></script>
</head>
<body style="background-color: #eff8f9ff">

	<?php 
		include '../../database/connection.php';

		$rows = mysqli_query($connect, "SELECT voting.*, pemilih.nama as nama, pemilih.nim as nim FROM voting inner join pemilih on voting.pemilih_id = pemilih.id order by id desc");			
		$no = 0;	
	?>

	<div class="">
		<div class="row" style="margin-top: 5%;" align="center">
			<div class="col-lg-12">
				<h1><b>Daftar Pemilih Mahasiswa STT Terpadu NF 2020</b></h1>
			</div>
		</div>		
		<div class="row" style="margin-top: 2%;">
			<div class="col-md-2" align="center">				
				<img src="../../image/logo.png" width="150px">
			</div>
			<div class="col-md-8">
				<canvas id="myChart"></canvas>
			</div>
			<div class="col-md-2" align="center">
				<img src="../../image/logo.png" width="150px">
			</div>
		</div>		
	</div>

	<div class="">
		<div class="row" style="margin-top: 5%;" align="center">
			<div class="col-lg-12" style="padding-left: 5%; padding-right: 5%;">
				<table class="table">
					<thead class="thead-dark">
					<tr>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Prodi</th>
						<th>Angkatan</th>
						<th>Waktu</th>
					</tr>
					</thead>
					<?php foreach($rows as $row){ ?>
					<tr>
						<th><?php echo $row['id'] ?></th>
						<th><?php echo $row['nim'] ?></th>
						<th><?php echo $row['nama'] ?></th>
						<th>
							<?php
								if(substr($row['nim'], 3, 2) == "01"){
									echo 'SI';
								}else{
									echo 'TI';
								}							
							?>						
						</th>
						<th>
							<?php
								if(substr($row['nim'], -5, 2) == "19"){
									echo '2019';
								}else if(substr($row['nim'], -5, 2) == "18"){
									echo '2018';
								}else if(substr($row['nim'], -5, 2) == "17"){
									echo '2017';
								}else{
									echo '2016';
								}							
							?>						
						</th>
						<th><?php echo $row['waktu'] ?></th>
					</tr>		
					<?php } ?>		
				</table>
			</div>
		</div>
	</div>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Angkatan 2016", "Angkatan 2017", "Angkatan 2018", "Angkatan 2019"],
				datasets: [
					{
						label: 'Sudah Memilih',
						data: [
							<?php 
								$angkatan_2016 = mysqli_query($connect,"SELECT * FROM `pemilih` WHERE nim LIKE '%16___' AND status = 1;");
								echo mysqli_num_rows($angkatan_2016);
							?>, 
							<?php 
								$angkatan_2017 = mysqli_query($connect,"SELECT * FROM `pemilih` WHERE nim LIKE '%17___' AND status = 1;");
								echo mysqli_num_rows($angkatan_2017);
							?>, 
							<?php 
								$angkatan_2018 = mysqli_query($connect,"SELECT * FROM `pemilih` WHERE nim LIKE '%18___' AND status = 1;");
								echo mysqli_num_rows($angkatan_2018);
							?>, 
							<?php 
								$angkatan_2019 = mysqli_query($connect,"SELECT * FROM `pemilih` WHERE nim LIKE '%19___' AND status = 1;");
								echo mysqli_num_rows($angkatan_2019);
							?>
						],								
						borderColor: [					
							'rgba(80, 80, 80, 1)',
							'rgba(80, 80, 80, 1)',
							'rgba(80, 80, 80, 1)',
							'rgba(80, 80, 80, 1)'
						],
						backgroundColor: [				
							'rgba(0, 0, 0, 0.2)',
							'rgba(0, 0, 0, 0.2)',
							'rgba(0, 0, 0, 0.2)',
							'rgba(0, 0, 0, 0.2)'						
						],
						borderWidth: 2
					},{
						
						label: 'Belum Memilih',
						data: [
							<?php 
								$angkatan_2016 = mysqli_query($connect,"SELECT * FROM `pemilih` WHERE nim LIKE '%16___' AND status = 0;");
								echo mysqli_num_rows($angkatan_2016);
							?>, 
							<?php 
								$angkatan_2017 = mysqli_query($connect,"SELECT * FROM `pemilih` WHERE nim LIKE '%17___' AND status = 0;");
								echo mysqli_num_rows($angkatan_2017);
							?>, 
							<?php 
								$angkatan_2018 = mysqli_query($connect,"SELECT * FROM `pemilih` WHERE nim LIKE '%18___' AND status = 0;");
								echo mysqli_num_rows($angkatan_2018);
							?>, 
							<?php 
								$angkatan_2019 = mysqli_query($connect,"SELECT * FROM `pemilih` WHERE nim LIKE '%19___' AND status = 0;");
								echo mysqli_num_rows($angkatan_2019);
							?>
						],		
						borderColor: [				
							'rgba(100,100,100,1)',
							'rgba(100,100,100,1)',
							'rgba(100,100,100,1)',
							'rgba(100,100,100,1)'			
						],
						backgroundColor: [			
							'rgba(255, 255, 255, 0.2)',
							'rgba(255, 255, 255, 0.2)',
							'rgba(255, 255, 255, 0.2)',
							'rgba(255, 255, 255, 0.2)'					
						],
						borderWidth: 2
					}
				]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});

	</script>
</body>
</html>
