<?php 
session_start();
error_reporting(0);
include "timeout.php";


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard</title>
<link rel="shortcut icon" href="images/favicon.ico"></link>
<link rel="stylesheet" href="css/style.css" type="text/css"  />
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
<link rel="stylesheet" href="css/AdminLTE.min.css"></link>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<script src="assets/highcharts/code/highcharts-3d.js" type="text/javascript"></script>
<script src="assets/highcharts/code/highcharts.js" type="text/javascript"></script>
<script src="js/jquery-1.4.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script src="js/hoverIntent.js" type="text/javascript"></script>

	<script type="text/javascript">
      $(document).ready(function(){
			   $('ul.nav').superfish();
		  });
  </script>


</head>

    <body class="main page">
        <div id="container" style="color: ">
<div id="header">

    <div id="gambarheader"><img src="images/HEADER1.jpg"></img></div>
</div>

<div id="menu">
	<ul class="nav">
	<?php if ($_SESSION['leveluser']=='3'){ ?>
	<li><a class="border link linkback" href="?module=home">Home</a></li>
	<li><a class="border link linkback" href="?module=pegawai&act=detail&id=<?php echo "$_SESSION[namauser]";?>">Data Pegawai</a></li>
        
	<?php 
	}
	if ($_SESSION['leveluser']=='1'){
	?>
        <li><a class="border link linkback" href="?module=home">Home</a></li>
        
    	<li><a class="border link linkback" href="?module=pegawai">Data Pegawai</a>
        	<ul>
            <li><a href="?module=bagian" class="li">Data Unit Kerja</a></li>
            <li><a href="?module=jabatan" class="li">Data Jabatan Fungsional</a></li>
            </ul>
        </li>
        <li><a href="?module=user_admin" class="border link linkback">Manajemen User</a></li>
<!--        <li><a class="border link linkback" href="?module=kjb">Data Kenaikan Jabatan</a></li> -->
	<?php } 
	if($_SESSION['leveluser']=='1' or $_SESSION['leveluser']=='2'){
	?>
		<li><a class="border link linkback" href="#">Laporan</a>
        	<ul>
			<li><a href="laporan_pegawai.php" class="li" target="_blank">Laporan Data Pegawai</a></li>
<!--            <li><a href="laporan_kjp.php" target="_blank" class="li">Laporan Kenaikan Jabatan</a></li> -->
            </ul>
        </li>
                <li><a class="border link linkback" href="logout.php">Logout</a></li>
	<?php } ?>

        <li class="clear"></li>
    </ul>
</div>
<div id="content">
<div class="form">
	<?php include "data.php"; ?>  
        <?php include "./config/koneksi.php"; 
                        
            $sql        = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.3' AND id_statkerja='1'");
            $jafung     = mysql_fetch_array($sql);
            
            $sql1       = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.4' AND id_statkerja='1'");
            $jafung1    = mysql_fetch_array($sql1);
            
            $sql2       = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.5' AND id_statkerja='1'");
            $jafung2    = mysql_fetch_array($sql2);
            
            $sql3        = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.3' AND id_statkerja='2'");
            $bebas     = mysql_fetch_array($sql3);
            
            $sql4        = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.4' AND id_statkerja='2'");
            $bebas1     = mysql_fetch_array($sql4);
            
            $sql5        = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.5' AND id_statkerja='2'");
            $bebas2     = mysql_fetch_array($sql5);
            
         
        ?>
    <script>
        $(function (){
            var chart = new Highcharts.Chart({
                chart:  {
                    renderTo: 'pegawai',
                    type:   'bar',
                },
                title:{
                  text: 'Jumlah Pegawai Berdasarkan Jabatan Fungsional'  
                },
                subtitle:{
                  text: 'Sumber: Biro Organisasi dan Tata Laksana'  
                },
                xAxis: {
                    categories: ["Analis Kepeg Penyelia", "Analis Kepeg Pertama", "Analis Kepeg Muda"],
                    title: {
                        text: null
                    }
                },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'pegawai',
                                align: 'high'
                            },
                            labels: {
                                overflow: 'justify'
                            }
                        },
                tooltip: {
                    valueSuffix: ' pegawai'
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                legend: {
                    layout: 'vertical',
          align: 'right',
          verticalAlign: 'top',
          x: -40,
          y: 80,
          floating: true,
          borderWidth: 1,
          backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
          shadow: true
                },
                credits:{
                    enabled: false
                },
                series:[{
                        name: 'Aktif',
                        data: [
                            <?php echo $jafung['jafung'];?>,
                            <?php echo $jafung1['jafung'];?>,
                            <?php echo $jafung2['jafung'];?>
                        ],
                        color: '#FFB41A',
                },{
                    name: 'Bebas Sementara',
                    data: [
                        <?php echo $bebas['jafung'];?>,
                        <?php echo $bebas1['jafung'];?>,
                        <?php echo $bebas2['jafung'];?>
                    ],
                    color: 'orchid',
                }]
            });
        });
    </script>
</div>
</div>
<div id="footer">Hak Cipta &#169 2018 | Sekretariat Jenderal Kementrian PUPR</div>
</div>

</body>
</html>
