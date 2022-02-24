<?php
$connected = "5";
$noupdate = "5";
$noact = "5";
$lost = "5";
$nodata = "5";
echo '
	[{
        "Date": "Connected ('.$connected.')",
        "Value": '.$connected.'
    },
	{
        "Date": "Not Update ('.$noupdate.')",
        "Value": '.$noupdate.'
    },
	{
        "Date": "No Activity ('.$noact.')",
        "Value": '.$noact.'
    },
	{
        "Date": "Lost Conn. ('.$lost.')",
        "Value": '.$lost.'
    },
	{
        "Date": "No Data ('.$nodata.')",
        "Value": '.$nodata.'
    }]
';
?>