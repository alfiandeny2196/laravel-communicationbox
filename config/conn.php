<?php
$conn = @mysql_connect('localhost','indasoft','DB@1nd4c0');
if (!$conn) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db('bsm_db', $conn);
 
?>