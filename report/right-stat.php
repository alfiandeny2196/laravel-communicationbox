<?php
require("../../_config/config-main.php");
require("../../_func/sys-function.php");

function countEmpValue($value,$value2,$company,$isout,$path){
require(@$path."_config/config-main.php"); 
$sql = @mysql_query("SELECT COUNT($value) FROM $TEmp WHERE $value = '$value2' AND emp_void!='void' AND emp_approval != 'not approved' AND emp_mothercompany = '$company' AND emp_isout = '$isout' AND emp_fullname NOT LIKE 'sheet%'", $conn) or die ("Query #countEmpValue Error");
$row=mysql_fetch_row($sql);
mysql_close($conn);
	return @$row[0]; 
}

$value = date("d/m");
$a0018 = 0;		$w0003  = 0;
$a1925 = 0;		$w0312  = 0;
$a2630 = 0;		$w1236  = 0;
$a3135 = 0;		$w3660	= 0;
$a3640 = 0;		$w60120 = 0;
$a4145 = 0;		$w12099 = 0;
$a4650 = 0;
$a5099 = 0;

			$sql = @mysql_query("SELECT id,emp_born,emp_workdate FROM $TEmp WHERE emp_approval = 'approved' AND emp_mothercompany = '7' AND emp_isout = 'no'", $conn) or die ("Query #countEmpAge Error");
			while ($row = mysql_fetch_assoc($sql)) {
				$age = number_format(daysBetween(date("Y-m-d"),changeDateFormatYMD($row['emp_born'],"/","-"))/365);
					if ($age <= 18){
						$a0018++;
					}elseif(($age > 18) && ($age <= 25)){
						$a1925++;
					}elseif(($age > 25) && ($age <= 30)){
						$a2630++;
					}elseif(($age > 30) && ($age <= 35)){
						$a3135++;
					}elseif(($age > 35) && ($age <= 40)){
						$a3640++;
					}elseif(($age > 40) && ($age <= 45)){
						$a4145++;
					}elseif(($age > 45) && ($age <= 50)){
						$a4650++;
					}else{
						$a5099++;
					}

				$workdate = number_format(daysBetween(date("Y-m-d"),changeDateFormatYMD($row['emp_workdate'],"/","-"))/30);
					if ($workdate <= 3){
						$w0003++;
					}elseif(($workdate > 3) && ($workdate <= 12)){
						$w0312++;
					}elseif(($workdate > 12) && ($workdate <= 36)){
						$w1236++;
					}elseif(($workdate > 36) && ($workdate <= 60)){
						$w3660++;
					}elseif(($workdate > 60) && ($workdate <= 120)){
						$w60120++;
					}else{
						$w12099++;
					}
			}

mysql_close($conn);
/*		
$by_gen_male 	= countEmpValue("emp_gender","male",7,"no","../../");
$by_gen_female 	= countEmpValue("emp_gender","female",7,"no","../../");
$total_emp	= $by_gen_male + $by_gen_female;
*/
$total_active	=  countEmpValue("emp_gender","male",7,"no","../../") + countEmpValue("emp_gender","female",7,"no","../../");
$total_resign	= countEmpValue("emp_gender","male",7,"yes","../../") + countEmpValue("emp_gender","female",7,"yes","../../");

$by_edu_0 	= countEmpValue("emp_lastedu","sd",7,"no","../../");
$by_edu_1 	= countEmpValue("emp_lastedu","smp",7,"no","../../");
$by_edu_2 	= countEmpValue("emp_lastedu","sma",7,"no","../../");
$by_edu_3 	= countEmpValue("emp_lastedu","d1",7,"no","../../");
$by_edu_4 	= countEmpValue("emp_lastedu","d3",7,"no","../../");
$by_edu_5 	= countEmpValue("emp_lastedu","d4",7,"no","../../");
$by_edu_6 	= countEmpValue("emp_lastedu","s1",7,"no","../../");
$by_edu_7 	= countEmpValue("emp_lastedu","s2",7,"no","../../");
$by_edu_8 	= countEmpValue("emp_lastedu","s3",7,"no","../../");
$by_edu_9 	= countEmpValue("emp_lastedu","",7,"no","../../");

/*
$by_health_smoke_yes	= countEmpValue("emp_issmoke","yes",7,"no","../../");
$by_health_smoke_no		= countEmpValue("emp_issmoke","no",7,"no","../../");
$by_health_glasses_yes	= countEmpValue("emp_isglasses","yes",7,"no","../../");
$by_health_glasses_no	= countEmpValue("emp_isglasses","no",7,"no","../../");

$by_province1	= countEmpValue("emp_prov","33",7,"no","../../");
$by_province2	= countEmpValue("emp_prov","32",7,"no","../../");
$by_province3	= countEmpValue("emp_prov","35",7,"no","../../");
$by_province4	= countEmpValue("emp_prov","31",7,"no","../../");
$by_province5	= countEmpValue("emp_prov","34",7,"no","../../");
$by_province6	= countEmpValue("emp_prov","30",7,"no","../../");
$by_province7	= ($total_emp - $by_province1 - $by_province2 - $by_province3 - $by_province4 - $by_province5 - $by_province6);
*/

echo '
	{"total":36,"rows":[
		{"name":"<strong>Pegawai Aktif</strong>","value":"<strong>'.$total_active.' orang</strong>","group":"PEGAWAI"},
		{"name":"Pegawai Resign","value":"'.$total_resign.' orang","group":"PEGAWAI"},
		
		{"name":"Pegawai Tetap","value":"'.countEmpValue("emp_empstatus","fix",7,"no","../../").' orang","group":"STATUS PEGAWAI"},
		{"name":"Pegawai Kontrak","value":"'.countEmpValue("emp_empstatus","contract",7,"no","../../").' orang","group":"STATUS PEGAWAI"},
		{"name":"Pegawai Harian","value":"'.countEmpValue("emp_empstatus","daily",7,"no","../../").' orang","group":"STATUS PEGAWAI"},
		
		{"name":"Pria","value":"'.countEmpValue("emp_gender","male",7,"no","../../").' orang","group":"JENIS KELAMIN"},
		{"name":"Wanita","value":"'.countEmpValue("emp_gender","female",7,"no","../../").' orang","group":"JENIS KELAMIN"},

		{"name":"< 18 tahun","value":"'.$a0018.' orang","group":"UMUR"},
		{"name":"18 - 25 tahun","value":"'.$a1925.' orang","group":"UMUR"},
		{"name":"26 - 30 tahun","value":"'.$a2630.' orang","group":"UMUR"},
		{"name":"31 - 35 tahun","value":"'.$a3135.' orang","group":"UMUR"},
		{"name":"36 - 40 tahun","value":"'.$a3640.' orang","group":"UMUR"},
		{"name":"41 - 45 tahun","value":"'.$a4145.' orang","group":"UMUR"},
		{"name":"45 - 50 tahun","value":"'.$a4650.' orang","group":"UMUR"},
		{"name":"> 50 tahun","value":"'.$a5099.' orang","group":"UMUR"},
		
		{"name":"Belum Menikah","value":"'.countEmpValue("emp_maritalstatus","single",7,"no","../../").' orang","group":"STATUS PERNIKAHAN"},
		{"name":"Menikah","value":"'.countEmpValue("emp_maritalstatus","married",7,"no","../../").' orang","group":"STATUS PERNIKAHAN"},
		{"name":"Janda/Duda/Cerai","value":"'.countEmpValue("emp_maritalstatus","divorced",7,"no","../../").' orang","group":"STATUS PERNIKAHAN"},
		
		{"name":"SD","value":"'.$by_edu_0.' orang","group":"PENDIDIKAN TERAKHIR"},
		{"name":"SMP","value":"'.$by_edu_1.' orang","group":"PENDIDIKAN TERAKHIR"},
		{"name":"SMA/K","value":"'.$by_edu_2.' orang","group":"PENDIDIKAN TERAKHIR"},
		{"name":"DIPLOMA","value":"'.($by_edu_3 + $by_edu_4 + $by_edu_5).' orang","group":"PENDIDIKAN TERAKHIR"},
		{"name":"S1","value":"'.$by_edu_6.' orang","group":"PENDIDIKAN TERAKHIR"},
		{"name":"S2","value":"'.$by_edu_7.' orang","group":"PENDIDIKAN TERAKHIR"},
		{"name":"S3","value":"'.$by_edu_8.' orang","group":"PENDIDIKAN TERAKHIR"},
		{"name":"Lainnya","value":"'.$by_edu_9.' orang","group":"PENDIDIKAN TERAKHIR"},
		
		{"name":"Training","value":"'.$w0003.' orang","group":"MASA KERJA"},
		{"name":"< 1 tahun","value":"'.$w0312.' orang","group":"MASA KERJA"},
		{"name":"1-3 tahun","value":"'.$w1236.' orang","group":"MASA KERJA"},
		{"name":"3-5 tahun","value":"'.$w3660.' orang","group":"MASA KERJA"},
		{"name":"5-10 tahun","value":"'.$w60120.' orang","group":"MASA KERJA"},
		{"name":"> 10 tahun","value":"'.$w12099.' orang","group":"MASA KERJA"},
		
		{"name":"Islam","value":"'.countEmpValue("emp_religion","islam",7,"no","../../").' orang","group":"AGAMA"},
		{"name":"Kristen","value":"'.countEmpValue("emp_religion","christian",7,"no","../../").' orang","group":"AGAMA"},
		{"name":"Katholik","value":"'.countEmpValue("emp_religion","catholic",7,"no","../../").' orang","group":"AGAMA"},
		{"name":"Hindu","value":"'.countEmpValue("emp_religion","hindu",7,"no","../../").' orang","group":"AGAMA"},
		{"name":"Buddha","value":"'.countEmpValue("emp_religion","budda",7,"no","../../").' orang","group":"AGAMA"},
		{"name":"Konghucu","value":"'.countEmpValue("emp_religion","confucius",7,"no","../../").' orang","group":"AGAMA"}
	]}
';
?>