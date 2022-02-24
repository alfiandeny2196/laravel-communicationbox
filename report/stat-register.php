<?php 
require('conn.php');

?>
<table width="100%" height="100%" border="0" cellspacing="1" cellpadding="1" style="position:absolute;">
	<tr valign="top">
		<td width="30%"><h3>By Group</h3>
			<table width="100%" border="0">
			  <?php
			  $i=1;
				  $rs_reg = mysql_query("SELECT DISTINCT(ica_group) FROM undangan where ica_group!=''");
				  while($row_reg = mysql_fetch_assoc($rs_reg)){

				  	$group = $row_reg['ica_group'];
				  	$rs_reg1 = mysql_query("SELECT SUM(ica_max_default) FROM undangan where ica_group='$group'");
					$row_reg1 = mysql_fetch_row($rs_reg1);
					$jml_peserta = $row_reg1[0];
					$total_peserta = $total_peserta + $jml_peserta;

			  ?>
			  	<tr>
					<td width="2%"><strong><?php echo $i;?>. </strong></td>
					<td width="50%"><strong><?php echo $row_reg['ica_group'];?></strong></td>
					<td width="48%" align="right"><strong> : <?php echo $row_reg1[0];?> Peserta</strong></td>
				</tr>
			  <?php $i++; } ?>
			  <tr>
				<td colspan="3"><hr/></td>
			  </tr>
			  <tr>
				<td colspan="2"><strong>TOTAL </strong></td>
				<td align="right">: <strong><?php echo $total_peserta; ?> Peserta</strong></td>
			  </tr>
			</table>
		</td>
		<td width="2%">&nbsp;</td>
		<td width="30%"><h3>By BUS</h3>
			<table width="100%" border="0">
			  <?php
			  $i=1;
				  $rs_reg_bus = mysql_query("SELECT DISTINCT(ica_bus) FROM undangan where ica_bus!=''  order by ica_bus");
				  while($row_reg_bus = mysql_fetch_assoc($rs_reg_bus)){

				  	$bus = $row_reg_bus['ica_bus'];
				  	$rs_reg1_bus = mysql_query("SELECT SUM(ica_max_default) FROM undangan where ica_bus='$bus'");
					$row_reg1_bus = mysql_fetch_row($rs_reg1_bus);
					$jml_peserta_bus = $row_reg1_bus[0];
					$total_peserta_bus = $total_peserta_bus + $jml_peserta_bus;

			  ?>
			  	<tr>
					<td width="2%"><strong><?php echo $i;?>. </strong></td>
					<td width="50%"><strong>Bus <?php echo $row_reg_bus['ica_bus'];?></strong></td>
					<td width="48%" align="right"><strong> : <?php echo $row_reg1_bus[0];?> Peserta</strong></td>
				</tr>
			  <?php $i++; } ?>
			  <tr>
				<td colspan="3"><hr/></td>
			  </tr>
			  <tr>
				<td colspan="2"><strong>TOTAL </strong></td>
				<td align="right">: <strong><?php echo $total_peserta_bus; ?> Peserta</strong></td>
			  </tr>
			</table>
		</td>
		<td width="2%">&nbsp;</td>
		<td width="30%"><h3></h3>
		</td>
	</tr>
</table>


		