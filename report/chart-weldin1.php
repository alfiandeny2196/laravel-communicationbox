<h1>Kedatangan Reserved</h1>
	<div style="width: 400px;height: 200px">
		<canvas id="myWeldin1"></canvas>
	</div>
 
	<script>
		var ctx = document.getElementById("myWeldin1").getContext('2d');
		var myWeldin1 = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: ["Total Booked","Free : <?php echo $val_book_wd;?> [ <?php echo $proc_booked_wd;?> ]", "Used : <?php echo $row_wd1[0];?>  [ <?php echo $proc_used_wd;?> ]"],
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