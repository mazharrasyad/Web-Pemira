<!DOCTYPE html>
<html>
<head>
	<title>Hasil Vote</title>
	<script type="text/javascript" src="../../assets/js/Chart.js"></script>
</head>
<body>
	<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>

	<center>
		<h2>Hasil Vote Calon Presma & Wapresma STT NF 2020</h2>
	</center>

	<?php 
		include '../../database/connection.php';
	?>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>

	<br/>
	<br/>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Calon 1", "Calon 2"],
				datasets: [{
					label: '',
					data: [
					<?php 
						$calon1 = mysqli_query($connect,"select * from voting where peserta_id = 1");
						echo mysqli_num_rows($calon1);
					?>, 
					<?php 
						$calon2 = mysqli_query($connect,"select * from voting where peserta_id = 2");
						echo mysqli_num_rows($calon2);
					?>
					],					
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)'
					],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)'
					],
					borderWidth: 1
				}]
			},
		});
	</script>
</body>
</html>