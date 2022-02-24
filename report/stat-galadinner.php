<?php 
require('conn.php');

	$rs = mysql_query("SELECT SUM(ica_max_default) FROM undangan WHERE ica_bookgaldin='1' and ica_code!='' ");
	$row = mysql_fetch_row($rs);

	$rs9 = mysql_query("SELECT COUNT(ica_code) FROM undangan where ica_bookgaldin='1' and ica_code!='' ");
	$row9 = mysql_fetch_row($rs9);

	$rs1 = mysql_query("SELECT SUM(ica_argaldin) FROM undangan WHERE ica_bookgaldin='1'  and ica_code!='' ");
	$row1 = mysql_fetch_row($rs1);

	$rs8 = mysql_query("SELECT COUNT(ica_code) FROM undangan where ica_bookgaldin='1' AND ica_scangaladinner='2'  and ica_code!='' ");
	$row8 = mysql_fetch_row($rs8);

	$rs2 = mysql_query("SELECT SUM(ica_max_default) FROM undangan where ica_code!='' ");
	$row2 = mysql_fetch_row($rs2);

	$rs3 = mysql_query("SELECT COUNT( ica_code) FROM undangan where ica_st=''   and ica_code!='' ");
	$row3 = mysql_fetch_row($rs3);

	$rs4 = mysql_query("SELECT SUM(ica_arive) FROM undangan where ica_code!=''");
	$row4 = mysql_fetch_row($rs4);

	$rs5 = mysql_query("SELECT COUNT(ica_code) FROM undangan where ica_scan='2'   and ica_code!='' ");
	$row5 = mysql_fetch_row($rs5);

	$rs6 = mysql_query("SELECT SUM(ica_argaldin) FROM undangan where ica_code!=''");
	$row6 = mysql_fetch_row($rs6);

	$rs7 = mysql_query("SELECT COUNT(ica_code) FROM undangan where ica_scangaladinner='2'   and ica_code!=''");
	$row7 = mysql_fetch_row($rs7);


	$total_booked= $row[0];
	$val_book	 = $row[0]-$row1[0];

	$proc_booked 	= number_format( (100* ($val_book/$total_booked) ),2)."%";
	$proc_used 		= number_format( (100* ($row1[0]/$total_booked) ),2)."%";

?>
<table width="100%" height="100%" border="0" cellspacing="1" cellpadding="1" style="position:absolute;">
	<tr valign="top">
		<td width="50%">
			<?php require('chart-galdin1.php');?>
			<br/>
			<table width="90%" border="0">
			  <tr>
				<td colspan="2"><h1>Keterangan</h1></td>
			  </tr>
			  <tr>
				<td width="60%"><strong>Jumlah Undangan [Reserved] : </strong></td>
				<td align="right"><?php echo $total_booked;?> Peserta [ <?php echo $row9[0]; ?> Toko ] </td>
			  </tr>
			  <tr>
				<td width="60%"><strong>Jumlah Peserta Datang : </strong></td>
				<td align="right"><?php echo $row1[0];?> Peserta [ <?php echo $row8[0]; ?> Toko ] </td>
			  </tr>
			  <tr>
				<td colspan="2"><hr/></td>
			  </tr>
			  <tr>
				<td width="60%"><strong>SISA (Belum Datang) : </strong></td>
				<td align="right"><strong><?php echo $val_book;?> Peserta [ <?php echo ($row9[0]-$row8[0]); ?> Toko ]</strong></td>
			  </tr>
			</table>
		</td>
		<td width="50%">
			<?php require('chart-galdin2.php');?>
			<br/>
			<table width="90%" border="0">
			  <tr>
				<td colspan="2"><h1>Keterangan</h1></td>
			  </tr>
			  <tr>
				<td ><strong>Jumlah Undangan Resmi : </strong></td>
				<td align="right"><?php echo $row2[0];?> Peserta [ <?php echo $row3[0]; ?> Toko ] </td>
			  </tr>
			  <tr>
				<td ><strong>Jumlah Peserta Scan Gala Dinner : </strong></td>
				<td align="right"><?php echo $row6[0];?> Peserta [ <?php echo $row7[0]; ?> Toko ] </td>
			  </tr>
			  <tr>
				<td colspan="2"><hr/></td>
			  </tr>
			  <tr>
				<td width="60%"><strong>SISA (Belum Datang) : </strong></td>
				<td align="right"><strong><?php echo ($row2[0]-$row6[0]);?> Peserta [ <?php echo ($row3[0]-$row7[0]); ?> Toko ]</strong></td>
			  </tr>
			</table>
		</td>
	</tr>
</table>


		