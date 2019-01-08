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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
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
	<?php if ($_SESSION['leveluser'] == '3') { ?>
	<li><a class="border link linkback" href="?module=home">Home</a></li>
	<li><a class="border link linkback" href="?module=pegawai&act=detail&id=<?php echo "$_SESSION[namauser]"; ?>">Data Pegawai</a></li>
        
	<?php 
}
if ($_SESSION['leveluser'] == '1') {
    ?>
        <li><a class="border link linkback" href="?module=home">Home</a></li>
        
    	<li><a class="border link linkback" href="?module=pegawai">Data Pegawai</a>
        	<ul>
            <li><a href="?module=bagian" class="li">Data Unit Kerja</a></li>
            <li><a href="?module=jabatan" class="li">Data Jabatan Fungsional</a></li>
            </ul>
        </li>
        <li><a href="?module=user_admin" class="border link linkback">Manajemen User</a></li>
	<?php 
}
if ($_SESSION['leveluser'] == '1' or $_SESSION['leveluser'] == '2') {
    ?>
		<li><a class="border link linkback" href="#">Laporan</a>
        	<ul>
			<li><a href="laporan_pegawai.php" class="li" target="_blank">Laporan Data Pegawai</a></li>
            </ul>
        </li>
                <li><a class="border link linkback" href="logout.php">Logout</a></li>
	<?php 
} ?>

        <li class="clear"></li>
    </ul>
</div>
<div id="content">
<div class="form">
	<?php include "data.php"; ?>  
        <?php 
        include_once "./config/koneksi.php";
        // arsiparis aktif
        $arsip1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.1' AND id_statkerja='1'");
        $ar1 = mysqli_fetch_array($arsip1);

        $arsip2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.2' AND id_statkerja='1'");
        $ar2 = mysqli_fetch_array($arsip2);

        $arsip3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.3' AND id_statkerja='1'");
        $ar3 = mysqli_fetch_array($arsip3);

        $arsip4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.4' AND id_statkerja='1'");
        $ar4 = mysqli_fetch_array($arsip4);

        $arsip5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.5' AND id_statkerja='1'");
        $ar5 = mysqli_fetch_array($arsip5);

        $arsip6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.6' AND id_statkerja='1'");
        $ar6 = mysqli_fetch_array($arsip6);

        $arsip7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.7' AND id_statkerja='1'");
        $ar7 = mysqli_fetch_array($arsip7);

        // arsiparis bebas
        $arsip8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.1' AND id_statkerja='2'");
        $arb1 = mysqli_fetch_array($arsip8);

        $arsip9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.2' AND id_statkerja='2'");
        $arb2 = mysqli_fetch_array($arsip9);

        $arsip10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.3' AND id_statkerja='2'");
        $arb3 = mysqli_fetch_array($arsip10);

        $arsip11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.4' AND id_statkerja='2'");
        $arb4 = mysqli_fetch_array($arsip11);

        $arsip12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.5' AND id_statkerja='2'");
        $arb5 = mysqli_fetch_array($arsip12);

        $arsip13 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.6' AND id_statkerja='2'");
        $arb6 = mysqli_fetch_array($arsip13);

        $arsip14 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='06.7' AND id_statkerja='2'");
        $arb7 = mysqli_fetch_array($arsip14);

        //analis kepegawaian aktif
        $analis1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.1' AND id_statkerja='1'");
        $ankep1 = mysqli_fetch_array($analis1);

        $analis2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.2' AND id_statkerja='1'");
        $ankep2 = mysqli_fetch_array($analis2);

        $analis3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.3' AND id_statkerja='1'");
        $ankep3 = mysqli_fetch_array($analis3);

        $analis4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.4' AND id_statkerja='1'");
        $ankep4 = mysqli_fetch_array($analis4);

        $analis5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.5' AND id_statkerja='1'");
        $ankep5 = mysqli_fetch_array($analis5);

        $analis6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.6' AND id_statkerja='1'");
        $ankep6 = mysqli_fetch_array($analis6);

        //analis kepegawaian bebas
        $analis7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.1' AND id_statkerja='2'");
        $bkep1 = mysqli_fetch_array($analis7);

        $analis8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.2' AND id_statkerja='2'");
        $bkep2 = mysqli_fetch_array($analis8);

        $analis9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.3' AND id_statkerja='2'");
        $bkep3 = mysqli_fetch_array($analis9);

        $analis10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.4' AND id_statkerja='2'");
        $bkep4 = mysqli_fetch_array($analis10);

        $analis11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.5' AND id_statkerja='2'");
        $bkep5 = mysqli_fetch_array($analis11);

        $analis12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.6' AND id_statkerja='2'");
        $bkep6 = mysqli_fetch_array($analis12);

        //auditor pelaksana aktif
        $audit1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.1' AND id_statkerja='1'");
        $akdit1 = mysqli_fetch_array($audit1);

        $audit2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.2' AND id_statkerja='1'");
        $akdit2 = mysqli_fetch_array($audit2);

        $audit3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.3' AND id_statkerja='1'");
        $akdit3 = mysqli_fetch_array($audit3);

        $audit4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.4' AND id_statkerja='1'");
        $akdit4 = mysqli_fetch_array($audit4);

        $audit5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.5' AND id_statkerja='1'");
        $akdit5 = mysqli_fetch_array($audit5);

        $audit6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.6' AND id_statkerja='1'");
        $akdit6 = mysqli_fetch_array($audit6);

        $audit7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.7' AND id_statkerja='1'");
        $akdit7 = mysqli_fetch_array($audit7);

        //auditor pelaksana bebas
        $audit8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.1' AND id_statkerja='2'");
        $bedit1 = mysqli_fetch_array($audit8);

        $audit9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.2' AND id_statkerja='2'");
        $bedit2 = mysqli_fetch_array($audit9);

        $audit10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.3' AND id_statkerja='2'");
        $bedit3 = mysqli_fetch_array($audit10);

        $audit11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.4' AND id_statkerja='2'");
        $bedit4 = mysqli_fetch_array($audit11);

        $audit12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.5' AND id_statkerja='2'");
        $bedit5 = mysqli_fetch_array($audit12);

        $audit13 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.6' AND id_statkerja='2'");
        $bedit6 = mysqli_fetch_array($audit13);

        $audit14 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='08.7' AND id_statkerja='2'");
        $bedit7 = mysqli_fetch_array($audit14);
        ?>
    <script>
        $(function (){
            var chart = new Highcharts.Chart({
                chart:  {
                    renderTo: 'pegawainon',
                    type:   'column',
                },
                title:{
                  text: 'Jumlah Pejabat Fungsional Non~PUPR'  
                },
                subtitle:{
                  text: 'Sumber: Biro Organisasi dan Tata Laksana'  
                },
                xAxis: {
                    categories: ["Arsiparis Pelaksana/Terampil",
                        "Arsiparis Pelaksana Lanjutan/Mahir",
                        "Arsiparis Penyelia",
                        "Arsiparis Ahli Pertama",
                        "Arsiparis Ahli Muda",
                        "Arsiparis Ahli Madya",
                        "Arsiparis Utama",
                        "Analis Kepegawaian Pelaksana/Terampil",
                        "Analis Kepegawaian Pelaksana Lanjutan/Mahir",
                        "Analis Kepegawaian Penyelia", 
                        "Analis Kepegawaian Pertama", 
                        "Analis Kepegawaian Muda",
                        "Analis Kepegawaian Madya",
                        "Auditor Pelaksana/Terampil",
                        "Auditor Pelaksana Lanjutan/Mahir",
                        "Auditor Penyelia",
                        "Auditor Pertama",
                        "Auditor Muda",
                        "Auditor Madya",
                        "Auditor Utama",
                        "Dokter Pertama",
                        "Dokter Muda",
                        "Dokter Madya",
                        "Dokter Utama",
                        "Dokter Gigi Pertama",
                        "Dokter Gigi Muda",
                        "Dokter Gigi Madya",
                        "Dokter Gigi Utama",
                        "Perancang Peraturan Perundang-Undangan Pertama",
                        "Perancang Peraturan Perundang-Undangan Muda",
                        "Perancang Peraturan Perundang-Undangan Madya",
                        "Perancang Peraturan Perundang-Undangan Utama",
                        "Pranata Humas Pemula",
                        "Pranata Humas Pelaksana/Terampil",
                        "Pranata Humas Pelaksana Lanjutan/Mahir",
                        "Pranata Humas Penyelia",
                        "Pranata Humas Pertama",
                        "Pranata Humas Muda",
                        "Pranata Humas Madya",
                        "Pranata Komputer Pemula",
                        "Pranata Komputer Pelaksana/Terampil",
                        "Pranata Komputer Pelaksana Lanjutan/Mahir",
                        "Pranata Komputer Penyelia",
                        "Pranata Komputer Pertama",
                        "Pranata Komputer Muda",
                        "Pranata Komputer Madya",
                        "Pranata Komputer Utama",
                        "Pustakawan Pelaksana/Terampil",
                        "Pustakawan Pelaksana Lanjutan/Mahir",
                        "Pustakawan Penyelia",
                        "Pustakawan Pertama",
                        "Pustakawan Muda",
                        "Pustakawan Madya",
                        "Pustakawan Utama",
                        "Perawat Pemula",
                        "Perawat Pelaksana/Terampil",
                        "Perawat Pelaksana Lanjutan/Mahir",
                        "Perawat Penyelia",
                        "Perawat Pertama",
                        "Perawat Muda",
                        "Perawat Madya",
                        "Perawat Gigi Pemula",
                        "Perawat Gigi Pelaksana/Terampil",
                        "Perawat Gigi Pelaksana Lanjutan/Mahir",
                        "Perawat Gigi Penyelia"],
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
                    layout: 'horizontal',
          align: 'right',
          verticalAlign: 'top',
          x: 10,
          y: 20,
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
                            <?php echo $ar1['jafung']; ?>,
                            <?php echo $ar2['jafung']; ?>,
                            <?php echo $ar3['jafung']; ?>,
                            <?php echo $ar4['jafung']; ?>,
                            <?php echo $ar5['jafung']; ?>,
                            <?php echo $ar6['jafung']; ?>,
                            <?php echo $ar7['jafung']; ?>,
                            <?php echo $ankep1['jafung']; ?>,
                            <?php echo $ankep2['jafung']; ?>,
                            <?php echo $ankep3['jafung']; ?>,
                            <?php echo $ankep4['jafung']; ?>,
                            <?php echo $ankep5['jafung']; ?>,
                            <?php echo $ankep6['jafung']; ?>,
                            <?php echo $akdit1['jafung']; ?>,
                            <?php echo $akdit2['jafung']; ?>,
                            <?php echo $akdit3['jafung']; ?>,
                            <?php echo $akdit4['jafung']; ?>,
                            <?php echo $akdit5['jafung']; ?>,
                            <?php echo $akdit6['jafung']; ?>,
                            <?php echo $akdit7['jafung']; ?>
                        ],
                        color: '#FFB41A',
                },{
                    name: 'Bebas Sementara',
                    data: [
                        <?php echo $arb1['jafung']; ?>,
                        <?php echo $arb2['jafung']; ?>,
                        <?php echo $arb3['jafung']; ?>,
                        <?php echo $arb4['jafung']; ?>,
                        <?php echo $arb5['jafung']; ?>,
                        <?php echo $arb6['jafung']; ?>,
                        <?php echo $arb7['jafung']; ?>,
                        <?php echo $bkep1['jafung']; ?>,
                        <?php echo $bkep2['jafung']; ?>,
                        <?php echo $bkep3['jafung']; ?>,
                        <?php echo $bkep4['jafung']; ?>,
                        <?php echo $bkep5['jafung']; ?>,
                        <?php echo $bkep6['jafung']; ?>,
                        <?php echo $bedit1['jafung']; ?>,
                        <?php echo $bedit2['jafung']; ?>,
                        <?php echo $bedit3['jafung']; ?>,
                        <?php echo $bedit4['jafung']; ?>,
                        <?php echo $bedit5['jafung']; ?>,
                        <?php echo $bedit6['jafung']; ?>,
                        <?php echo $bedit7['jafung']; ?>
                    ],
                    color: 'orchid',
                }]
            });
        });
    </script>

    <?php 
    include_once "./config/koneksi.php";

    $sql = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.3' AND id_statkerja='1'");
    $jafung = mysqli_fetch_array($sql);

    $sql1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.4' AND id_statkerja='1'");
    $jafung1 = mysqli_fetch_array($sql1);

    $sql2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.5' AND id_statkerja='1'");
    $jafung2 = mysqli_fetch_array($sql2);

    $sql3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.3' AND id_statkerja='2'");
    $bebas = mysqli_fetch_array($sql3);

    $sql4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.4' AND id_statkerja='2'");
    $bebas1 = mysqli_fetch_array($sql4);

    $sql5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.5' AND id_statkerja='2'");
    $bebas2 = mysqli_fetch_array($sql5);


    ?>
    <script>
    $(function (){
            var chart = new Highcharts.Chart({
                chart:  {
                    renderTo: 'pegawainon2',
                    type:   'column',
                },
                title:{
                  text: 'Jumlah Pejabat Fungsional Non~PUPR'  
                },
                subtitle:{
                  text: 'Sumber: Biro Organisasi dan Tata Laksana'  
                },
                xAxis: {
                    categories: [
                        "Radiografer Pelaksana/Terampil",
                        "Radiografer Pelaksana Lanjutan/Mahir",
                        "Radiografer Penyelia",
                        "Pranata Laboratorium Kesehatan Pemula",
                        "Pranata Laboratorium Kesehatan Pelaksana/Terampil",
                        "Pranata Laboratorium Kesehatan Pelaksana Lanjutan/Mahir",
                        "Pranata Laboratorium Kesehatan Penyelia",
                        "Pranata Laboratorium Kesehatan Pertama",
                        "Pranata Laboratorium Kesehatan Muda",
                        "Pranata Laboratorium Kesehatan Madya",
                        "Bidan Pelaksana/Terampil",
                        "Bidan Pelaksana Lanjutan/Mahir",
                        "Bidan Penyelia",
                        "Bidan Pertama",
                        "Bidan Muda",
                        "Bidan Madya",
                        "Apoteker Pemula",
                        "Apoteker Pelaksana/Terampil",
                        "Apoteker Pelaksana Lanjutan/Mahir",
                        "Apoteker Penyelia",
                        "Penerjemah Pertama",
                        "Penerjemah Muda",
                        "Penerjemah Madya",
                        "Penerjemah Utama",
                        "Widyaiswara Pertama",
                        "Widyaiswara Muda",
                        "Widyaiswara Madya",
                        "Widyaiswara Utama",
                        "Auditor Kepegawaian Pertama",
                        "Auditor Kepegawaian Muda",
                        "Auditor Kepegawaian Madya",
                        "Auditor Kepegawaian Utama",
                        "Pengelola Pengadaan Barang/Jasa Pertama",
                        "Pengelola Pengadaan Barang/Jasa Muda",
                        "Pengelola Pengadaan Barang/Jasa Madya",
                        "Pengelola Pengadaan Barang/Jasa Utama",
                        "Pengawas Penyelenggaraan Urusan Pemerintah Di Daerah Pertama",
                        "Pengawas Penyelenggaraan Urusan Pemerintah Di Daerah Muda",
                        "Pengawas Penyelenggaraan Urusan Pemerintah Di Daerah Madya",
                        "Pengawas Penyelenggaraan Urusan Pemerintah Di Daerah Utama"],
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
                    layout: 'horizontal',
          align: 'right',
          verticalAlign: 'top',
          x: 10,
          y: 20,
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
                            <?php echo $jafung['jafung']; ?>,
                            <?php echo $jafung1['jafung']; ?>,
                            <?php echo $jafung2['jafung']; ?>,
                            <?php echo $jafung['jafung']; ?>,
                            <?php echo $jafung1['jafung']; ?>,
                            <?php echo $jafung2['jafung']; ?>,
                            <?php echo $jafung['jafung']; ?>,
                            <?php echo $jafung1['jafung']; ?>,
                            <?php echo $jafung2['jafung']; ?>,
                            <?php echo $jafung2['jafung']; ?>,
                            <?php echo $jafung['jafung']; ?>,
                            <?php echo $jafung1['jafung']; ?>,
                            <?php echo $jafung2['jafung']; ?>
                        ],
                        color: '#FFB41A',
                },{
                    name: 'Bebas Sementara',
                    data: [
                        <?php echo $bebas['jafung']; ?>,
                        <?php echo $bebas1['jafung']; ?>,
                        <?php echo $bebas2['jafung']; ?>,
                        <?php echo $bebas['jafung']; ?>,
                        <?php echo $bebas1['jafung']; ?>,
                        <?php echo $bebas2['jafung']; ?>,
                        <?php echo $bebas['jafung']; ?>,
                        <?php echo $bebas1['jafung']; ?>,
                        <?php echo $bebas2['jafung']; ?>,
                        <?php echo $bebas2['jafung']; ?>,
                        <?php echo $bebas['jafung']; ?>,
                        <?php echo $bebas1['jafung']; ?>,
                        <?php echo $bebas2['jafung']; ?>
                    ],
                    color: 'orchid',
                }]
            });
        });
    </script>
        <?php 
        include "./config/koneksi.php";

        $sql = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.3' AND id_statkerja='1'");
        $aktif = mysqli_fetch_array($sql);

        $sql1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.4' AND id_statkerja='1'");
        $aktif1 = mysqli_fetch_array($sql1);

        $sql2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.5' AND id_statkerja='1'");
        $aktif2 = mysqli_fetch_array($sql2);

        $sql3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.3' AND id_statkerja='2'");
        $bebas3 = mysqli_fetch_array($sql3);

        $sql4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.4' AND id_statkerja='2'");
        $bebas4 = mysqli_fetch_array($sql4);

        $sql5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.5' AND id_statkerja='2'");
        $bebas5 = mysqli_fetch_array($sql5);


        ?>
    <script>
        $(function (){
            var chart = new Highcharts.Chart({
                chart:  {
                    renderTo: 'pegawaipu',
                    type:   'column',
                },
                title:{
                  text: 'Jumlah Pejabat Fungsional PUPR'  
                },
                subtitle:{
                  text: 'Sumber: Biro Organisasi dan Tata Laksana'  
                },
                xAxis: {
                    categories: ["Teknik Tata Bangunan dan Perumahan Penyelia", 
                                "Teknik Tata Bangunan dan Perumahan Pertama", 
                                "Teknik Tata Bangunan dan Perumahan Muda"],
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
          x: 10,
          y: 30,
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
                            <?php echo $aktif['jafung']; ?>,
                            <?php echo $aktif1['jafung']; ?>,
                            <?php echo $aktif2['jafung']; ?>
                        ],
                        color: '#FFB41A',
                },{
                    name: 'Bebas Sementara',
                    data: [
                        <?php echo $bebas3['jafung']; ?>,
                        <?php echo $bebas4['jafung']; ?>,
                        <?php echo $bebas5['jafung']; ?>
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
