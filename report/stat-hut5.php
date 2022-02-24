<?php 
require('conn.php');

	$rs = mysql_query("SELECT COUNT(*) FROM tb_hut");
	$row = mysql_fetch_row($rs);

	$rs1 = mysql_query("SELECT COUNT(id) FROM tb_hut WHERE scan='2'");
	$row1 = mysql_fetch_row($rs1);

	$rs2 = mysql_query("SELECT COUNT(id) FROM tb_hut where comp='IWD PUSAT' ");
	$row2 = mysql_fetch_row($rs2);

	$rs6 = mysql_query("SELECT COUNT(id) FROM tb_hut where comp ='IWD PUSAT' and scan='2' ");
	$row6 = mysql_fetch_row($rs6);

	$rs3 = mysql_query("SELECT COUNT(id) FROM tb_hut where comp='INDAPLAS PUSAT' ");
	$row3 = mysql_fetch_row($rs3);

	$rs7 = mysql_query("SELECT COUNT(id) FROM tb_hut where comp ='INDAPLAS PUSAT' and scan='2' ");
	$row7 = mysql_fetch_row($rs7);

	$rs5 = mysql_query("SELECT COUNT(id) FROM tb_hut where comp='HARMONI' ");
	$row5 = mysql_fetch_row($rs5);

	$rs9 = mysql_query("SELECT COUNT(id) FROM tb_hut where comp ='HARMONI' and scan='2' ");
	$row9 = mysql_fetch_row($rs9);







	/*$rs9 = mysql_query("SELECT COUNT(ica_code) FROM tb_hut where ica_bookgaldin='1' and ica_code!='' ");
	$row9 = mysql_fetch_row($rs9);

	$rs1 = mysql_query("SELECT SUM(ica_argaldin) FROM tb_hut WHERE ica_bookgaldin='1'  and ica_code!='' ");
	$row1 = mysql_fetch_row($rs1);

	$rs8 = mysql_query("SELECT COUNT(ica_code) FROM tb_hut where ica_bookgaldin='1' AND ica_scangaladinner='2'  and ica_code!='' ");
	$row8 = mysql_fetch_row($rs8);

	$rs2 = mysql_query("SELECT SUM(ica_max_default) FROM tb_hut where ica_code!='' ");
	$row2 = mysql_fetch_row($rs2);

	$rs3 = mysql_query("SELECT COUNT( ica_code) FROM tb_hut where ica_st=''   and ica_code!='' ");
	$row3 = mysql_fetch_row($rs3);

	$rs4 = mysql_query("SELECT SUM(ica_arive) FROM tb_hut where ica_code!=''");
	$row4 = mysql_fetch_row($rs4);

	$rs5 = mysql_query("SELECT COUNT(ica_code) FROM tb_hut where ica_scan='2'   and ica_code!='' ");
	$row5 = mysql_fetch_row($rs5);

	$rs6 = mysql_query("SELECT SUM(ica_argaldin) FROM tb_hut where ica_code!=''");
	$row6 = mysql_fetch_row($rs6);

	$rs7 = mysql_query("SELECT COUNT(ica_code) FROM tb_hut where ica_scangaladinner='2'   and ica_code!=''");
	$row7 = mysql_fetch_row($rs7);*/


	$total_booked_hut= $row[0];
	$val_book_hut	 = $row5[0]-$row9[0];

	$proc_booked_hut 	= number_format( (100* ($val_book_hut/$total_booked_hut) ),2)."%";
	$proc_used_hut		= number_format( (100* ($row1[0]/$total_booked_hut) ),2)."%";

?>
<body>

<table width="100%" height="100%" border="0" cellspacing="1" cellpadding="1" style="position:absolute;">
		
	<tr valign="top">
		<td width="50%">
			<?php require('chart-hut5.php');?>
			<br/>
			<table width="90%" border="0">
			  <tr>
				<td colspan="2"><h1>Keterangan</h1></td>
			  </tr>
			  <!-<tr>
				<td width="60%"><strong>Jumlah Peserta : </strong></td>
				<td align="right"><?php echo $row5[0];?></td>
			  </tr>
			  <tr>
				<td width="60%"><strong>Jumlah Peserta Datang : </strong></td>
				<td align="right"><?php echo $row9[0];?></td>
			  </tr>
			  <tr>
				<td colspan="2"><hr/></td>
			  </tr>
			  <tr>
				<td width="60%"><strong>SISA (Belum Datang) : </strong></td>
				<td align="right"><strong><?php echo $val_book_hut;?></strong></td>
			  </tr>
			</table>
		</td>
		<td width="50%">
		</td>
	</tr>

</table>
</body>

		