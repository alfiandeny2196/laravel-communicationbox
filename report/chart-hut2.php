<?php 
	$sisa_free 				= $row2[0]-$row6[0];
	$proc_totalkedatangan 	= number_format( (100* ($row6[0]/$row2[0]) ),2)."%";
	$proc_totalfree 		= number_format( (100* ($sisa_free/$row2[0]) ),2)."%";
?>
<h1>Kedatangan IWD</h1>
	<div style="width: 400px;height: 200px">
		<canvas id="myCharthut2"></canvas>
	</div>
 
	<script>
		var ctx = document.getElementById("myCharthut2").getContext('2d');
		var myCharthut2 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ["Total IWD : <?php echo $row2[0];?>","Belum Datang :  <?php echo $sisa_free;?> [ <?php echo $proc_totalfree;?> ] ","Datang : <?php echo $row6[0];?>  [ <?php echo $proc_totalkedatangan;?> ]"],
				datasets: [{
					label: '',
					data: [
					<?php 
						echo "0";
					?>, 
					<?php 
	    				echo $sisa_free ;
					?>, 
					<?php 
	    				echo $row6[0];
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