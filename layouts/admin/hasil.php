<!DOCTYPE html>
<html>
<head>
	<title>Hasil Vote</title>
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<script type="text/javascript" src="../../assets/js/Chart.js"></script>
	<script type="text/javascript" src="../../assets/js/chartjs-datalabels.min.js"></script>
</head>
<body style="background-color: #eff8f9ff">

	<?php 
		include '../../database/connection.php';
		$paslon = mysqli_query($connect, "SELECT suara FROM peserta where calon = 1 or calon = 2");
	?>

	<div class="">
		<div class="row" style="margin-top: 5%;" align="center">
			<div class="col-lg-12">
				<h1><b>Hasil Vote Presma & Wapresma BEM STT NF 2020</b></h1>
			</div>
		</div>
		<div class="row" style="margin-top: 5%;">
			<div class="col-md-3" align="center">
				<img src="../../image/paslon1.png" height="250px">  
				<br>
				Chairil Hilman Syah
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
				Shidqi Anshori Rabbani
				<br>
				Silmi Rizqi Ramadhani
				<br><br>
				<b>Simi-Simi</b>
			</div>
		</div>
	</div>

	<script>
		var data = [{		
			data: [<?php while ($p = mysqli_fetch_array($paslon)) { echo '"' . $p['suara'] . '",';}?>],					
			borderColor: [				
				'rgba(255,99,132,1)',		
				'rgba(54, 162, 235, 1)'						
			],
			backgroundColor: [			
				'rgba(255, 99, 132, 0.2)',		
				'rgba(54, 162, 235, 0.2)'						
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
					color: '#fff',
					anchor: 'end',
					align: 'start',
					offset: 20,
					borderWidth: 2,
					borderColor: '#fff',
					borderRadius: 25,
					backgroundColor: (context) => {
						return context.dataset.backgroundColor;
					},
					// backgroundColor: 'red',
					font: {
						weight: 'bold',
						size: '25'
					},
					formatter: (value) => {
						return value + ' Suara';
					}
				}
			}
		};

		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["1kutserta", "Simi-Simi"],
				datasets: data
			},
			options: options
		});
	</script>
</body>
</html>
