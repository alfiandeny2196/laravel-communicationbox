<?php 
require('conn.php');

	$rs_wd = mysql_query("SELECT SUM(ica_max_default) FROM undangan WHERE ica_bookweldin='1'");
	$row_wd = mysql_fetch_row($rs_wd);

	$rs_wd9 = mysql_query("SELECT COUNT(ica_code) FROM undangan where ica_bookweldin='1'");
	$row_wd9 = mysql_fetch_row($rs_wd9);

	$rs_wd1 = mysql_query("SELECT SUM(ica_arweldin) FROM undangan WHERE ica_bookweldin='1' ");
	$row_wd1 = mysql_fetch_row($rs_wd1);

	$rs_wd8 = mysql_query("SELECT COUNT(ica_code) FROM undangan where ica_bookweldin='1' AND ica_scanweldin='2' ");
	$row_wd8 = mysql_fetch_row($rs_wd8);

	$rs_wd2 = mysql_query("SELECT SUM(ica_max_default) FROM undangan");
	$row_wd2 = mysql_fetch_row($rs_wd2);

	$rs_wd3 = mysql_query("SELECT COUNT( ica_code) FROM undangan where ica_st=''");
	$row_wd3 = mysql_fetch_row($rs_wd3);

	$rs_wd4 = mysql_query("SELECT SUM(ica_arive) FROM undangan");
	$row_wd4 = mysql_fetch_row($rs_wd4);

	$rs_wd5 = mysql_query("SELECT COUNT(ica_code) FROM undangan where ica_scan='2'");
	$row_wd5 = mysql_fetch_row($rs_wd5);

	$rs_hotel2 = mysql_query("SELECT COUNT(ica_code) FROM undangan where ica_scan='2'");
	$row_hotel2 = mysql_fetch_row($rs_hotel5);

	$rs_wd6 = mysql_query("SELECT SUM(ica_arweldin) FROM undangan");
	$row_wd6 = mysql_fetch_row($rs_wd6);

	$rs_wd7 = mysql_query("SELECT COUNT(ica_code) FROM undangan where ica_scanweldin='2'");
	$row_wd7 = mysql_fetch_row($rs_wd7);

	$rs_hotel = mysql_query("SELECT COUNT(*) FROM undangan WHERE ica_scan = '2'");
	$row_hotel = mysql_fetch_row($rs_hotel);



	$total_booked_hotel	= $row_wd[0];
	$val_book_hotel	 	= $row_wd[0]-$row_wd1[0];


	$proc_booked_wd 	= number_format( (100* ($val_book_wd/$total_booked_wd) ),2)."%";
	$proc_used_wd 		= number_format( (100* ($row_wd1[0]/$total_booked_wd) ),2)."%";

?>
<table width="100%" height="100%" border="0" cellspacing="1" cellpadding="1" style="position:absolute;">
	<tr valign="top">
		<td width="50%">
			<?php require('chart-weldin1.php');?>
			<br/>
			<table width="90%" border="0">
			  <tr>
				<td colspan="2"><h1>Keterangan</h1></td>
			  </tr>
			  <tr>
				<td width="60%"><strong>Jumlah Round Table [Reserved] : </strong></td>
				<td align="right"><?php echo $total_booked_wd;?> Peserta [ <?php echo $row_wd9[0]; ?> Toko ] </td>
			  </tr>
			  <tr>
				<td width="60%"><strong>Jumlah Peserta Datang : </strong></td>
				<td align="right"><?php echo $row_wd1[0];?> Peserta [ <?php echo $row_wd8[0]; ?> Toko ] </td>
			  </tr>
			  <tr>
				<td colspan="2"><hr/></td>
			  </tr>
			  <tr>
				<td width="60%"><strong>SISA (Belum Datang) : </strong></td>
				<td align="right"><strong><?php echo $val_book_wd;?> Peserta [ <?php echo ($row_wd9[0]-$row_wd8[0]); ?> Toko ]</strong></td>
			  </tr>
			</table>
		</td>
		<td width="50%">
		&nbsp;
		</td>
	</tr>
</table>


		