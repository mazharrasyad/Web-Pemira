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
		<div class="row" style="margin-top: 5%;">
			<div class="col-md-3" align="center">
				<img src="../../image/paslon1.png" height="250px">  
				<br>
				<strong>Chairil Hilman Syah</strong>
				<br>
				Aditya Fitriadi
				<br><br>
				<b>1kutserta</b>
			</div>
			<div class="col-md-6" align="center">
				<canvas id="myChart"></canvas>
			</div>
			<div class="col-md-3" align="center">
				<img src="../../image/paslon2.png" height="250px">  
				<br>
				<strong>Shidqi Anshori Rabbani</strong>
				<br>
				Silmi Rizqi Ramadhani
				<br><br>
				<b>Simi-Simi</b>
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
						<th>Waktu</th>
					</tr>
					</thead>
					<?php foreach($rows as $row){ ?>
					<tr>
						<th><?php echo $row['id'] ?></th>
						<th><?php echo $row['nim'] ?></th>
						<th><?php echo $row['nama'] ?></th>
						<th><?php echo $row['waktu'] ?></th>
					</tr>		
					<?php } ?>		
				</table>
			</div>
		</div>
	</div>

	<script>
		var data = [{			
			data: [
				<?php 
					$belum_milih = mysqli_query($connect,"select * from pemilih where status = 0");
					echo mysqli_num_rows($belum_milih);
				?>, 
				<?php 
					$sudah_milih = mysqli_query($connect,"select * from pemilih where status = 1");
					echo mysqli_num_rows($sudah_milih);
				?>
			],					
			borderColor: [				
				'rgba(200,200,200,1)',		
				'rgba(50, 50, 50, 1)'						
			],
			backgroundColor: [			
				'rgba(255, 255, 255, 0.2)',		
				'rgba(0, 0, 0, 0.2)'						
			],
			borderWidth: 1
		}];

		var options = {
			responsive: true,
			legend: {
				position: 'bottom'
			},
			plugins: {
				datalabels: {
					color: '#000',
					anchor: 'end',
					align: 'start',
					offset: 20,
					borderWidth: 2,
					borderColor: '#000',
					borderRadius: 25,
					backgroundColor: (context) => {
						return context.dataset.backgroundColor;
					},
					// backgroundColor: 'red',
					font: {
						weight: 'bold',
						size: '18'
					},
					formatter: (value) => {
						return value + ' Mahasiswa';
					}
				}
			}
		};

		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Belum Memilih", "Sudah Memilih"],
				datasets: data
			},
			options: options
		});
	</script>
</body>
</html>
