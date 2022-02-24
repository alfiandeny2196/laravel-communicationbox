<?php 
	$sisa_free_wd 				= $row_wd2[0]-$row_wd6[0];
	$proc_totalkedatangan_wd 	= number_format( (100* ($row_wd6[0]/$row_wd2[0]) ),2)."%";
	$proc_totalfree_wd 		= number_format( (100* ($sisa_free_wd/$row_wd2[0]) ),2)."%";
?>
<h1>Kedatangan Total</h1>
	<div style="width: 400px;height: 200px">
		<canvas id="myWeldin2"></canvas>
	</div>
 
	<script>
		var ctx = document.getElementById("myWeldin2").getContext('2d');
		var myWeldin2 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ["Total : <?php echo $row_wd2[0];?>","Sisa : <?php echo $sisa_free_wd;?> [ <?php echo $proc_totalfree_wd;?> ]", "Scan : <?php echo $row_wd6[0];?>  [ <?php echo $proc_totalkedatangan_wd;?> ]"],
				datasets: [{
					label: '',
					data: [
					<?php 
						echo "0";
					?>, 
					<?php 
	    				echo $val_book_wd;
					?>, 
					<?php 
	    				echo $row_wd1[0];
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