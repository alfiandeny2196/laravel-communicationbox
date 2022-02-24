<?php 
	$sisa_free_3 				= $row3[0]-$row7[0];
	$proc_totalkedatangan_3 	= number_format( (100* ($row7[0]/$row3[0]) ),2)."%";
	$proc_totalfree_3 		= number_format( (100* ($sisa_free_3/$row3[0]) ),2)."%";
?>
<h1>Kedatangan INDAPLAS</h1>
	<div style="width: 400px;height: 250px">
		<canvas id="myCharthut3"></canvas>
	</div>
 
	<script>
		var ctx = document.getElementById("myCharthut3").getContext('2d');
		var myCharthut3 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ["Total Booked : <?php echo $row3[0];?>","Belum Datang : <?php echo $sisa_free_3;?> [ <?php echo $proc_totalfree_3;?> ]  ", "Datang :  <?php echo $row7[0];?>  [ <?php echo $proc_totalkedatangan_3;?> ]"],
				datasets: [{
					label: '',
					data: [
					<?php 
						echo "0";
					?>, 
					<?php 
	    				echo $sisa_free_3 ;
					?>, 
					<?php 
	    				echo $row7[0];
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(50, 168, 82, 0.2)',
					'rgba(54, 162, 235, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(50, 168, 82, 1)',
					'rgba(54, 162, 235, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				},
				tooltips: {
			      enabled: true,
			      callbacks: {
			        label: function(tooltipItem, data) {
			          var label = data.labels[tooltipItem.index];
			          var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
			          return label;
			        }
			      }

			    }
			}
		});
	</script>