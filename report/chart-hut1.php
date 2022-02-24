<h1>Kedatangan Total</h1>
	<div style="width: 400px;height: 250px">
		<canvas id="myCharthut"></canvas>
	</div>
 
	<script>
		var ctx = document.getElementById("myCharthut").getContext('2d');
		var myCharthut = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ["Total Booked : <?php echo $total_booked_hut;?>","Belum Datang : <?php echo $val_book_hut;?> [ <?php echo $proc_booked_hut;?> ]  ", "Datang :  <?php echo $row1[0];?>  [ <?php echo $proc_used_hut;?> ]"],
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
	    				echo $row1[0];
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