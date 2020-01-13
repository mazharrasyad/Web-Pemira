<!DOCTYPE html>
<html>
<head>
	<title>Hasil Vote</title>
	<link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
	<script type="text/javascript" src="../../assets/js/Chart.js"></script>
</head>
<body style="background-color: #eff8f9ff">

	<?php 
		include '../../database/connection.php';
	?>

	<div class="">
		<div class="row" style="border: 1px solid black" align="center">
			<div class="col-lg-12">
				Hasil Vote Presma & Wapresma BEM STT NF 2020
			</div>
		</div>
		<div class="row">
			<div class="col-md-3" align="center"><img src="../../image/paslon1.png" height="150px">  </div>
			<div class="col-md-6" valign="center"><canvas id="pie-chart"></canvas></div>
			<div class="col-md-3" align="center"><img src="../../image/paslon2.png" height="150px">  </div>
		</div>
	</div>

<script>
var data = [{
   data: [50, 55, 60, 33],
   labels: ["India", "China", "US", "Canada"],
   backgroundColor: [
     "#4b77a9",
     "#5f255f",
     "#d21243",
     "#B27200"
   ],
   borderColor: "#fff"
 }];

 var options = {
   tooltips: {
     enabled: false
   },
   plugins: {
     datalabels: {
       formatter: (value, ctx) => {

         let datasets = ctx.chart.data.datasets;

         if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
           let sum = datasets[0].data.reduce((a, b) => a + b, 0);
           let percentage = Math.round((value / sum) * 100) + '%';
           return percentage;
         } else {
           return percentage;
         }
       },
       color: '#fff',
     }
   }
 };


 var ctx = document.getElementById("pie-chart").getContext('2d');
 var myChart = new Chart(ctx, {
   type: 'pie',
   data: {
     datasets: data
   },
   options: options
 });
</script>

</body>
</html>