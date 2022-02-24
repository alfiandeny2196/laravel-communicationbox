<?php 
session_start();
$level = $_SESSION['level'];
$xsesuserid = $_SESSION['username'];
if (!isset($_SESSION['username'])){
        header("Location: login.php");
    }

else {
    include "conn.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" 
      type="image/png" 
      href="image/favicon.png" />
    <meta charset="UTF-8">
    <title>:: BSM-Bima Sukses Mandiri</title>
        <link rel="stylesheet" type="text/css" href="jeasyui/themes/metro-orange/easyui.css">
        <link rel="stylesheet" type="text/css" href="jeasyui/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="jeasyui/demo/demo.css">
        <script type="text/javascript" src="jquery/jquery-1.9.1.min.js"></script>
        <script type="text/javascript" src="jeasyui/jquery.easyui.min.js"></script>
         <script type="text/javascript" src="js/script.js"></script>
    
    <STYLE type="text/css">
        #fm{ margin:0; }
        .ftitle{  font-size:14px;  font-weight:bold; padding:5px 0; margin-bottom:10px; border-bottom:1px solid #ccc; }
        .fi{ margin-bottom:5px; }
        .fi label{  display:inline-block; width:150px; }
        .fi input{ width:120px; }
        .fi select{ width:125px; }
    </STYLE>

</head>

<style type="text/css">
    
body{
    width: 100%;
    height: 100%;
    overflow: hidden;
    background-color: #fff;
}
.putar{
    width: 100px;
    height: 100px;
 
    border:4px solid #f3f3f3;
    border-top:5px solid #3498db;
    border-radius: 100%;
 
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin:auto;
 
    animation: putar 1s infinite linear;
}
 
@keyframes putar{
    from{
        transform:
        rotate(0deg);
    }to{
        transform: rotate(360deg);
    }
}
 
#overlay{
    height: 100%;
    width: 100%;
    background: #FFF;
    position: fixed;
    left: 0;
    top: 0;
    z-index: 99;
}
</style>


<body class="easyui-layout">
    <div id="overlay"><!--sebagai id yang akan kita ambil untuk javascriptnya-->
        <h1 style="color: black; text-align: center"></h1>
        <div class="putar"></div><!--animasi preloader-->
    </div>



    <div data-options="region:'north',border:false" style="height:80px;background:url(image/orn.jpg);padding:5px">
        <table width="574" style="height:40px">
            <tr>
                <td width="43"  style="padding-left:15px" ><a href="index.php"><img src="image/bsm2.png" alt="bar" style="width : 110px" /></a></td>
                
            </tr>
      </table>
    </div>
    <!-- menu  -->
    <?php include "menu2.php";?>

    <!-- akhir menu  -->        
    </div>
    
    <div  style="height:50%; background-color: #fff;" data-options="region:'center',border:false" align="center">

                 <?php 
                              if(isset($_GET['page'])){
                                $page = $_GET['page'];
                             
                                switch ($page) {
                                  case 'home':
                                    include "hal-awal.php";
                                    break;
                                    
                                    case 'faktur':
                                    include "page/faktur/mod-faktur.php";
                                    break;

                                    case 'faktur_old':
                                    include "page/faktur_old/mod-faktur.php";
                                    break;

                                    case 'penagihan':
                                    include "page/penagihan/mod-penagihan.php";
                                    break;

                                     case 'perhitungan':
                                    include "page/perhitungan/mod-perhitungan.php";
                                    break;

                                    case 'pembayaran':
                                    include "page/pembayaran/mod-pembayaran.php";
                                    break;

                                    case 'barang':
                                    include "page/master_barang/mod-master.php";
                                    break;

                                    case 'user':
                                    include "page/user/mod-master.php";
                                    break;

                                    case 'pelanggan':
                                    include "page/master_pelanggan/mod-master.php";
                                    break;

                                    case 'sales':
                                    include "page/master_sales/mod-master.php";
                                    break;

                                    case 'user':
                                    include "page/master_user/mod-master.php";
                                    break;

                                    case 'report':
                                    include "page/barang_keluar/mod-master.php";
                                    break;

                                    case 'retur':
                                    include "page/retur3/mod-retur.php";
                                    break;

                                    case 'retur2':
                                    include "page/cashback/mod-retur.php";
                                    break;
                                    
                                    echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                                    break;
                                }
                              }else{
                                include "hal-awal.php";
                              }
                             
                          ?>
    
                <?php
                }
                ?>

</div>
<div style="height:auto;background:url(image/orn.jpg);padding:10px;" data-options="region:'south',border:false" align="center">
        <strong><font color="white">&copy; Bima Sukses Mandiri Suported by Syntaxis</font></strong>
    </div>

<script>
var load = document.getElementById("overlay"); /* untuk mengambil elemen berdasarkan id yang ada id html */

window.addEventListener('load', function()
{
    load.style.display = 'none';
})


function myformatter(date){
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    return (d<10?('0'+d):d)+'/'+(m<10?('0'+m):m)+'/'+y;
}
function myparser(s){
    if (!s) return new Date();
    var ss = (s.split('/'));
    var y = parseInt(ss[0],10);
    var m = parseInt(ss[1],10);
    var d = parseInt(ss[2],10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
        return new Date(d,m-1,y);
    } else {
        return new Date();
    }
}
function mFormatterYMD(date){
    var y = date.getFullYear();
    var m = date.getMonth()+1;
    var d = date.getDate();
    return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
}
function mParserYMD(s){
    if (!s) return new Date();
    var ss = s.split('-');
    var y = parseInt(ss[0],10);
    var m = parseInt(ss[1],10);
    var d = parseInt(ss[2],10);
    if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
        return new Date(y,m-1,d);
    } else {
        return new Date();
    }
} 

</script>

</body>
</html>
