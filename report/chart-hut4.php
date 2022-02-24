<?php 
	$sisa_free_4 				= $row4[0]-$row8[0];
	$proc_totalkedatangan_4 	= number_format( (100* ($row8[0]/$row4[0]) ),2)."%";
	$proc_totalfree_4 		= number_format( (100* ($sisa_free_4/$row4[0]) ),2)."%";
?>
<h1>Kedatangan WAHYU JAYA</h1>
	<div style="width: 400px;height: 250px">
		<canvas id="myCharthut4"></canvas>
	</div>
 
	<script>
		var ctx = document.getElementById("myCharthut4").getContext('2d');
		var myCharthut4 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ["Total Booked : <?php echo $row4[0];?>","Belum Datang : <?php echo $val_book_hut;?> [ <?php echo $proc_totalfree_4;?> ]  ", "Datang :  <?php echo $row8[0];?>  [ <?php echo $proc_totalkedatangan_4;?> ]"],
				datasets: [{
					label: '',
					data: [
					<?php 
						echo "0";
					?>, 
					<?php 
	    				echo $val_book_hut;
					?>, 
					<?php 
	    				echo $row8[0];
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