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

        //Dokter Aktif
        $dktr1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='09.1' AND id_statkerja='1'");
        $adktr1 = mysqli_fetch_array($dktr1);
        $dktr2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='09.2' AND id_statkerja='1'");
        $adktr2 = mysqli_fetch_array($dktr2);
        $dktr3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='09.3' AND id_statkerja='1'");
        $adktr3 = mysqli_fetch_array($dktr3);
        $dktr4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='09.4' AND id_statkerja='1'");
        $adktr4 = mysqli_fetch_array($dktr4);

        //dokter bebas
        $dktr5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='09.1' AND id_statkerja='2'");
        $bedktr1 = mysqli_fetch_array($dktr5);
        $dktr6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='09.2' AND id_statkerja='2'");
        $bedktr2 = mysqli_fetch_array($dktr6);
        $dktr7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='09.3' AND id_statkerja='2'");
        $bedktr3 = mysqli_fetch_array($dktr7);
        $dktr8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='09.4' AND id_statkerja='2'");
        $bedktr4 = mysqli_fetch_array($dktr8);

        //dokter gigi aktif
        $dktrgg1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='10.1' AND id_statkerja='1'");
        $adktrgg1 = mysqli_fetch_array($dktrgg1);
        $dktrgg2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='10.2' AND id_statkerja='1'");
        $adktrgg2 = mysqli_fetch_array($dktrgg2);
        $dktrgg3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='10.3' AND id_statkerja='1'");
        $adktrgg3 = mysqli_fetch_array($dktrgg3);
        $dktrgg4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='10.4' AND id_statkerja='1'");
        $adktrgg4 = mysqli_fetch_array($dktrgg4);

        //dokter gigi bebas
        $dktr5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='10.1' AND id_statkerja='2'");
        $bedktrgg1 = mysqli_fetch_array($dktr5);
        $dktr6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='10.2' AND id_statkerja='2'");
        $bedktrgg2 = mysqli_fetch_array($dktr6);
        $dktr7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='10.3' AND id_statkerja='2'");
        $bedktrgg3 = mysqli_fetch_array($dktr7);
        $dktr8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='10.4' AND id_statkerja='2'");
        $bedktrgg4 = mysqli_fetch_array($dktr8);
        
        //perancang perpu aktif
    $perpu1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='15.1' AND id_statkerja='1'");
    $aperpu1 = mysqli_fetch_array($perpu1);
    $perpu2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='15.2' AND id_statkerja='1'");
    $aperpu2 = mysqli_fetch_array($perpu2);
    $perpu3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='15.3' AND id_statkerja='1'");
    $aperpu3 = mysqli_fetch_array($perpu3);
    $perpu4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='15.4' AND id_statkerja='1'");
    $aperpu4 = mysqli_fetch_array($perpu4);
    
    //perancang perpu bebas
    $perpu5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='15.1' AND id_statkerja='2'");
    $beperpu1 = mysqli_fetch_array($perpu5);
    $perpu6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='15.2' AND id_statkerja='2'");
    $beperpu2 = mysqli_fetch_array($perpu6);
    $perpu7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='15.3' AND id_statkerja='2'");
    $beperpu3 = mysqli_fetch_array($perpu7);
    $perpu8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='15.4' AND id_statkerja='2'");
    $beperpu4 = mysqli_fetch_array($perpu8);
    
     //pranata humas aktif
    $humas1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.1' AND id_statkerja='1'");
    $ahum1 = mysqli_fetch_array($humas1);
    $humas2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.2' AND id_statkerja='1'");
    $ahum2 = mysqli_fetch_array($humas2);
    $humas3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.3' AND id_statkerja='1'");
    $ahum3 = mysqli_fetch_array($humas3);
    $humas4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.4' AND id_statkerja='1'");
    $ahum4 = mysqli_fetch_array($humas4);
    $humas5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.5' AND id_statkerja='1'");
    $ahum5 = mysqli_fetch_array($humas5);
    $humas6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.6' AND id_statkerja='1'");
    $ahum6 = mysqli_fetch_array($humas6);
    $humas7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.7' AND id_statkerja='1'");
    $ahum7 = mysqli_fetch_array($humas7);
    
    //pranata humas bebas
    $humas8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.1' AND id_statkerja='2'");
    $behum1 = mysqli_fetch_array($humas8);
    $humas9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.2' AND id_statkerja='2'");
    $behum2 = mysqli_fetch_array($humas9);
    $humas10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.3' AND id_statkerja='2'");
    $behum3 = mysqli_fetch_array($humas10);
    $humas11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.4' AND id_statkerja='2'");
    $behum4 = mysqli_fetch_array($humas11);
    $humas12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.5' AND id_statkerja='2'");
    $behum5 = mysqli_fetch_array($humas12);
    $humas13 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.6' AND id_statkerja='2'");
    $behum6 = mysqli_fetch_array($humas13);
    $humas14 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='18.7' AND id_statkerja='2'");
    $behum7 = mysqli_fetch_array($humas14);
    
    //pranata komputer aktif
    $prakom1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.1' AND id_statkerja='1'");
    $akom1 = mysqli_fetch_array($prakom1);
    $prakom2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.2' AND id_statkerja='1'");
    $akom2 = mysqli_fetch_array($prakom2);
    $prakom3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.3' AND id_statkerja='1'");
    $akom3 = mysqli_fetch_array($prakom3);
    $prakom4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.4' AND id_statkerja='1'");
    $akom4 = mysqli_fetch_array($prakom4);
    $prakom5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.5' AND id_statkerja='1'");
    $akom5 = mysqli_fetch_array($prakom5);
    $prakom6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.6' AND id_statkerja='1'");
    $akom6 = mysqli_fetch_array($prakom6);
    $prakom7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.7' AND id_statkerja='1'");
    $akom7 = mysqli_fetch_array($prakom7);
    $prakom8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.8' AND id_statkerja='1'");
    $akom8 = mysqli_fetch_array($prakom8);
    
    //pranata komputer bebas
    $prakom9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.1' AND id_statkerja='2'");
    $bekom1 = mysqli_fetch_array($prakom9);
    $prakom10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.2' AND id_statkerja='2'");
    $bekom2 = mysqli_fetch_array($prakom10);
    $prakom11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.3' AND id_statkerja='2'");
    $bekom3 = mysqli_fetch_array($prakom11);
    $prakom12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.4' AND id_statkerja='2'");
    $bekom4 = mysqli_fetch_array($prakom12);
    $prakom13 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.5' AND id_statkerja='2'");
    $bekom5 = mysqli_fetch_array($prakom13);
    $prakom14 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.6' AND id_statkerja='2'");
    $bekom6 = mysqli_fetch_array($prakom14);
    $prakom15 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.7' AND id_statkerja='2'");
    $bekom7 = mysqli_fetch_array($prakom15);
    $prakom16 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='19.8' AND id_statkerja='2'");
    $bekom8 = mysqli_fetch_array($prakom16);
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
                        "Pranata Komputer Utama"],
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
                            <?php echo $akdit7['jafung']; ?>,
                            <?php echo $adktr1['jafung']; ?>,
                            <?php echo $adktr2['jafung']; ?>,
                            <?php echo $adktr3['jafung']; ?>,
                            <?php echo $adktr4['jafung']; ?>,
                            <?php echo $adktrgg1['jafung']; ?>,
                            <?php echo $adktrgg2['jafung']; ?>,
                            <?php echo $adktrgg3['jafung']; ?>,
                            <?php echo $adktrgg4['jafung']; ?>,
                            <?php echo $aperpu1['jafung']; ?>,
                            <?php echo $aperpu2['jafung']; ?>,
                            <?php echo $aperpu3['jafung']; ?>,
                            <?php echo $aperpu4['jafung']; ?>,
                            <?php echo $ahum1['jafung']; ?>,
                            <?php echo $ahum2['jafung']; ?>,
                            <?php echo $ahum3['jafung']; ?>,
                            <?php echo $ahum4['jafung']; ?>,
                            <?php echo $ahum5['jafung']; ?>,
                            <?php echo $ahum6['jafung']; ?>,
                            <?php echo $ahum7['jafung']; ?>,
                            <?php echo $akom1['jafung']; ?>,
                            <?php echo $akom2['jafung']; ?>,
                            <?php echo $akom3['jafung']; ?>,
                            <?php echo $akom4['jafung']; ?>,
                            <?php echo $akom5['jafung']; ?>,
                            <?php echo $akom6['jafung']; ?>,
                            <?php echo $akom7['jafung']; ?>,
                            <?php echo $akom8['jafung']; ?>
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
                        <?php echo $bedit7['jafung']; ?>,
                        <?php echo $bedktr1['jafung']; ?>,
                        <?php echo $bedktr2['jafung']; ?>,
                        <?php echo $bedktr3['jafung']; ?>,
                        <?php echo $bedktr4['jafung']; ?>,
                        <?php echo $bedktrgg1['jafung']; ?>,
                        <?php echo $bedktrgg2['jafung']; ?>,
                        <?php echo $bedktrgg3['jafung']; ?>,
                        <?php echo $bedktrgg4['jafung']; ?>,
                        <?php echo $beperpu1['jafung']; ?>,
                        <?php echo $beperpu2['jafung']; ?>,
                        <?php echo $beperpu3['jafung']; ?>,
                        <?php echo $beperpu4['jafung']; ?>,
                        <?php echo $behum1['jafung']; ?>,
                        <?php echo $behum2['jafung']; ?>,
                        <?php echo $behum3['jafung']; ?>,
                        <?php echo $behum4['jafung']; ?>,
                        <?php echo $behum5['jafung']; ?>,
                        <?php echo $behum6['jafung']; ?>,
                        <?php echo $behum7['jafung']; ?>,
                        <?php echo $bekom1['jafung']; ?>,
                        <?php echo $bekom2['jafung']; ?>,
                        <?php echo $bekom3['jafung']; ?>,
                        <?php echo $bekom4['jafung']; ?>,
                        <?php echo $bekom5['jafung']; ?>,
                        <?php echo $bekom6['jafung']; ?>,
                        <?php echo $bekom7['jafung']; ?>,
                        <?php echo $bekom8['jafung']; ?>
                    ],
                    color: 'orchid',
                }]
            });
        });
    </script>

    <?php 
    include_once "./config/koneksi.php";

    //pustakawan aktif
    $pustaka1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.1' AND id_statkerja='1'");
    $apus1 = mysqli_fetch_array($pustaka1);
    $pustaka2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.2' AND id_statkerja='1'");
    $apus2 = mysqli_fetch_array($pustaka2);
    $pustaka3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.3' AND id_statkerja='1'");
    $apus3 = mysqli_fetch_array($pustaka3);
    $pustaka4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.4' AND id_statkerja='1'");
    $apus4 = mysqli_fetch_array($pustaka4);
    $pustaka5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.5' AND id_statkerja='1'");
    $apus5 = mysqli_fetch_array($pustaka5);
    $pustaka6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.6' AND id_statkerja='1'");
    $apus6 = mysqli_fetch_array($pustaka6);
    $pustaka7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.7' AND id_statkerja='1'");
    $apus7 = mysqli_fetch_array($pustaka7);

    //pustakawan bebas
    $pustaka8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.1' AND id_statkerja='2'");
    $bepus1 = mysqli_fetch_array($pustaka8);
    $pustaka9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.2' AND id_statkerja='2'");
    $bepus2 = mysqli_fetch_array($pustaka9);
    $pustaka10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.3' AND id_statkerja='2'");
    $bepus3 = mysqli_fetch_array($pustaka10);
    $pustaka11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.4' AND id_statkerja='2'");
    $bepus4 = mysqli_fetch_array($pustaka11);
    $pustaka12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.5' AND id_statkerja='2'");
    $bepus5 = mysqli_fetch_array($pustaka12);
    $pustaka13 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.6' AND id_statkerja='2'");
    $bepus6 = mysqli_fetch_array($pustaka13);
    $pustaka14 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='20.7' AND id_statkerja='2'");
    $bepus7 = mysqli_fetch_array($pustaka14);
    
    //perawat gigi aktif
    $pergi1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='23.1' AND id_statkerja='1'");
    $akpergi1 = mysqli_fetch_array($pergi1);
    $pergi2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='23.2' AND id_statkerja='1'");
    $akpergi2 = mysqli_fetch_array($pergi2);
    $pergi3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='23.3' AND id_statkerja='1'");
    $akpergi3 = mysqli_fetch_array($pergi3);
    $pergi4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='23.4' AND id_statkerja='1'");
    $akpergi4 = mysqli_fetch_array($pergi4);
    
     //perawat gigi bebas
    $pergi8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='23.1' AND id_statkerja='2'");
    $bapergi1 = mysqli_fetch_array($pergi8);
    $pergi9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='23.2' AND id_statkerja='2'");
    $bapergi2 = mysqli_fetch_array($pergi9);
    $pergi10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='23.3' AND id_statkerja='2'");
    $bapergi3 = mysqli_fetch_array($pergi10);
    $pergi11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='23.4' AND id_statkerja='2'");
    $bapergi4 = mysqli_fetch_array($pergi11);
    
    //perawat aktif
    $per1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.1' AND id_statkerja='1'");
    $akper1 = mysqli_fetch_array($per1);
    $per2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.2' AND id_statkerja='1'");
    $akper2 = mysqli_fetch_array($per2);
    $per3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.3' AND id_statkerja='1'");
    $akper3 = mysqli_fetch_array($per3);
    $per4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.4' AND id_statkerja='1'");
    $akper4 = mysqli_fetch_array($per4);
    $per5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.5' AND id_statkerja='1'");
    $akper5 = mysqli_fetch_array($per5);
    $per6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.6' AND id_statkerja='1'");
    $akper6 = mysqli_fetch_array($per6);
    $per7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.7' AND id_statkerja='1'");
    $akper7 = mysqli_fetch_array($per7);
    
    //perawat bebas
    $per8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.1' AND id_statkerja='2'");
    $baper1 = mysqli_fetch_array($per8);
    $per9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.2' AND id_statkerja='2'");
    $baper2 = mysqli_fetch_array($per9);
    $per10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.3' AND id_statkerja='2'");
    $baper3 = mysqli_fetch_array($per10);
    $per11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.4' AND id_statkerja='2'");
    $baper4 = mysqli_fetch_array($per11);
    $per12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.5' AND id_statkerja='2'");
    $baper5 = mysqli_fetch_array($per12);
    $per13 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.6' AND id_statkerja='2'");
    $baper6 = mysqli_fetch_array($per13);
    $per14 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='22.7' AND id_statkerja='2'");
    $baper7 = mysqli_fetch_array($per14);
    
    //radiografer aktif
    $rad1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='24.1' AND id_statkerja='1'");
    $arad1 = mysqli_fetch_array($rad1);
    $rad2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='24.2' AND id_statkerja='1'");
    $arad2 = mysqli_fetch_array($rad2);
    $rad3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='24.3' AND id_statkerja='1'");
    $arad3 = mysqli_fetch_array($rad3);

    //radiografer bebas
    $rad4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='24.1' AND id_statkerja='2'");
    $barad1 = mysqli_fetch_array($rad4);
    $rad5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='24.2' AND id_statkerja='2'");
    $barad2 = mysqli_fetch_array($rad5);
    $rad6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='24.3' AND id_statkerja='2'");
    $barad3 = mysqli_fetch_array($rad6);
    
    //pranata lab. kes. aktif
    $pralab1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.1' AND id_statkerja='1'");
    $apralab1 = mysqli_fetch_array($pralab1);
    $pralab2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.2' AND id_statkerja='1'");
    $apralab2 = mysqli_fetch_array($pralab2);
    $pralab3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.3' AND id_statkerja='1'");
    $apralab3 = mysqli_fetch_array($pralab3);
    $pralab4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.4' AND id_statkerja='1'");
    $apralab4 = mysqli_fetch_array($pralab4);
    $pralab5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.5' AND id_statkerja='1'");
    $apralab5 = mysqli_fetch_array($pralab5);
    $pralab6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.6' AND id_statkerja='1'");
    $apralab6 = mysqli_fetch_array($pralab6);
    $pralab7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.7' AND id_statkerja='1'");
    $apralab7 = mysqli_fetch_array($pralab7);

    //pranata lab. kes. bebas
    $pralab8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.1' AND id_statkerja='2'");
    $bepralab1 = mysqli_fetch_array($pralab8);
    $pralab9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.2' AND id_statkerja='2'");
    $bepralab2 = mysqli_fetch_array($pralab9);
    $pralab10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.3' AND id_statkerja='2'");
    $bepralab3 = mysqli_fetch_array($pralab10);
    $pralab11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.4' AND id_statkerja='2'");
    $bepralab4 = mysqli_fetch_array($pralab11);
    $pralab12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.5' AND id_statkerja='2'");
    $bepralab5 = mysqli_fetch_array($pralab12);
    $pralab13 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.6' AND id_statkerja='2'");
    $bepralab6 = mysqli_fetch_array($pralab13);
    $pralab14 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='25.7' AND id_statkerja='2'");
    $bepralab7 = mysqli_fetch_array($pralab14);
    
    //bidan aktif
    $bidan1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.1' AND id_statkerja='1'");
    $abid1 = mysqli_fetch_array($bidan1);
    $bidan2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.2' AND id_statkerja='1'");
    $abid2 = mysqli_fetch_array($bidan2);
    $bidan3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.3' AND id_statkerja='1'");
    $abid3 = mysqli_fetch_array($bidan3);
    $bidan4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.4' AND id_statkerja='1'");
    $abid4 = mysqli_fetch_array($bidan4);
    $bidan5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.5' AND id_statkerja='1'");
    $abid5 = mysqli_fetch_array($bidan5);
    $bidan6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.6' AND id_statkerja='1'");
    $abid6 = mysqli_fetch_array($bidan6);

    //bidan bebas
    $bidan8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.1' AND id_statkerja='2'");
    $bebid1 = mysqli_fetch_array($bidan8);
    $bidan9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.2' AND id_statkerja='2'");
    $bebid2 = mysqli_fetch_array($bidan9);
    $bidan10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.3' AND id_statkerja='2'");
    $bebid3 = mysqli_fetch_array($bidan10);
    $bidan11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.4' AND id_statkerja='2'");
    $bebid4 = mysqli_fetch_array($bidan11);
    $bidan12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.5' AND id_statkerja='2'");
    $bebid5 = mysqli_fetch_array($bidan12);
    $bidan13 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='26.6' AND id_statkerja='2'");
    $bebid6 = mysqli_fetch_array($bidan13);
    
    //apoteker aktif
    $apo1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.1' AND id_statkerja='1'");
    $aptif1 = mysqli_fetch_array($apo1);
    $apo2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.2' AND id_statkerja='1'");
    $aptif2 = mysqli_fetch_array($apo2);
    $apo3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.3' AND id_statkerja='1'");
    $aptif3 = mysqli_fetch_array($apo3);
    $apo4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.4' AND id_statkerja='1'");
    $aptif4 = mysqli_fetch_array($apo4);

    //apoteker bebas
    $apo5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.1' AND id_statkerja='2'");
    $bepo1 = mysqli_fetch_array($apo5);
    $apo6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.2' AND id_statkerja='2'");
    $bepo2 = mysqli_fetch_array($apo6);
    $apo7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.3' AND id_statkerja='2'");
    $bepo3 = mysqli_fetch_array($apo7);
    $apo8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.4' AND id_statkerja='2'");
    $bepo4 = mysqli_fetch_array($apo8);
    ?>
    <script>
    $(function (){
            var chart = new Highcharts.Chart({
                chart:  {
                    renderTo: 'pegawainon1',
                    type:   'column',
                },
                title:{
                  text: 'Jumlah Pejabat Fungsional Non~PUPR (lanjutan 1)'  
                },
                subtitle:{
                  text: 'Sumber: Biro Organisasi dan Tata Laksana'  
                },
                xAxis: {
                    categories: [
                        "Pustakawan Pelaksana/Terampil",
                        "Pustakawan Pelaksana Lanjutan/Mahir",
                        "Pustakawan Penyelia",
                        "Pustakawan Pertama",
                        "Pustakawan Muda",
                        "Pustakawan Madya",
                        "Pustakawan Utama",
                        "Perawat Gigi Pemula",
                        "Perawat Gigi Pelaksana/Terampil",
                        "Perawat Gigi Pelaksana Lanjutan/Mahir",
                        "Perawat Gigi Penyelia",
                        "Perawat Pemula",
                        "Perawat Pelaksana/Terampil",
                        "Perawat Pelaksana Lanjutan/Mahir",
                        "Perawat Penyelia",
                        "Perawat Pertama",
                        "Perawat Muda",
                        "Perawat Madya",
                        "Radiografer Pelaksana/Terampil",
                        "Radiografer Pelaksana Lanjutan/Mahir",
                        "Radiografer Penyelia",
                        "Pranata Lab. Kes. Pemula",
                        "Pranata Lab. Kes. Pelaksana/Terampil",
                        "Pranata Lab. Kes. Pelaksana Lanjutan/Mahir",
                        "Pranata Lab. Kes. Penyelia",
                        "Pranata Lab. Kes. Pertama",
                        "Pranata Lab. Kes. Muda",
                        "Pranata Lab. Kes. Madya",
                        "Bidan Pelaksana/Terampil",
                        "Bidan Pelaksana Lanjutan/Mahir",
                        "Bidan Penyelia",
                        "Bidan Pertama",
                        "Bidan Muda",
                        "Bidan Madya",
                        "Apoteker Pemula",
                        "Apoteker Pelaksana/Terampil",
                        "Apoteker Pelaksana Lanjutan/Mahir",
                        "Apoteker Penyelia"
                    ],
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
                            <?php echo $apus1['jafung']; ?>,
                            <?php echo $apus2['jafung']; ?>,
                            <?php echo $apus3['jafung']; ?>,
                            <?php echo $apus4['jafung']; ?>,
                            <?php echo $apus5['jafung']; ?>,
                            <?php echo $apus6['jafung']; ?>,
                            <?php echo $apus7['jafung']; ?>,
                            <?php echo $akpergi1['jafung']; ?>,
                            <?php echo $akpergi2['jafung']; ?>,
                            <?php echo $akpergi3['jafung']; ?>,
                            <?php echo $akpergi4['jafung']; ?>,
                            <?php echo $akper1['jafung']; ?>,
                            <?php echo $akper2['jafung']; ?>,
                            <?php echo $akper3['jafung']; ?>,
                            <?php echo $akper4['jafung']; ?>,
                            <?php echo $akper5['jafung']; ?>,
                            <?php echo $akper6['jafung']; ?>,
                            <?php echo $akper7['jafung']; ?>,
                            <?php echo $arad1['jafung']; ?>,
                            <?php echo $arad2['jafung']; ?>,
                            <?php echo $arad3['jafung']; ?>,
                            <?php echo $apralab1['jafung']; ?>,
                            <?php echo $apralab2['jafung']; ?>,
                            <?php echo $apralab3['jafung']; ?>,
                            <?php echo $apralab4['jafung']; ?>,
                            <?php echo $apralab5['jafung']; ?>,
                            <?php echo $apralab6['jafung']; ?>,
                            <?php echo $apralab7['jafung']; ?>,
                            <?php echo $abid1['jafung']; ?>,
                            <?php echo $abid2['jafung']; ?>,
                            <?php echo $abid3['jafung']; ?>,
                            <?php echo $abid4['jafung']; ?>,
                            <?php echo $abid5['jafung']; ?>,
                            <?php echo $abid6['jafung']; ?>,
                            <?php echo $aptif1['jafung']; ?>,
                            <?php echo $aptif2['jafung']; ?>,
                            <?php echo $aptif3['jafung']; ?>,
                            <?php echo $aptif4['jafung']; ?>
                        ],
                        color: '#FFB41A',
                },{
                    name: 'Bebas Sementara',
                    data: [
                        <?php echo $bepus1['jafung']; ?>,
                        <?php echo $bepus2['jafung']; ?>,
                        <?php echo $bepus3['jafung']; ?>,
                        <?php echo $bepus4['jafung']; ?>,
                        <?php echo $bepus5['jafung']; ?>,
                        <?php echo $bepus6['jafung']; ?>,
                        <?php echo $bepus7['jafung']; ?>,
                        <?php echo $bapergi1['jafung']; ?>,
                        <?php echo $bapergi2['jafung']; ?>,
                        <?php echo $bapergi3['jafung']; ?>,
                        <?php echo $bapergi4['jafung']; ?>,
                        <?php echo $baper1['jafung']; ?>,
                        <?php echo $baper2['jafung']; ?>,
                        <?php echo $baper3['jafung']; ?>,
                        <?php echo $baper4['jafung']; ?>,
                        <?php echo $baper5['jafung']; ?>,
                        <?php echo $baper6['jafung']; ?>,
                        <?php echo $baper7['jafung']; ?>,
                        <?php echo $barad1['jafung']; ?>,
                        <?php echo $barad2['jafung']; ?>,
                        <?php echo $barad3['jafung']; ?>,
                        <?php echo $bepralab1['jafung']; ?>,
                        <?php echo $bepralab2['jafung']; ?>,
                        <?php echo $bepralab3['jafung']; ?>,
                        <?php echo $bepralab4['jafung']; ?>,
                        <?php echo $bepralab5['jafung']; ?>,
                        <?php echo $bepralab6['jafung']; ?>,
                        <?php echo $bepralab7['jafung']; ?>,
                        <?php echo $bebid1['jafung']; ?>,
                        <?php echo $bebid2['jafung']; ?>,
                        <?php echo $bebid3['jafung']; ?>,
                        <?php echo $bebid4['jafung']; ?>,
                        <?php echo $bebid5['jafung']; ?>,
                        <?php echo $bebid6['jafung']; ?>,
                        <?php echo $bepo1['jafung']; ?>,
                        <?php echo $bepo2['jafung']; ?>,
                        <?php echo $bepo3['jafung']; ?>,
                        <?php echo $bepo4['jafung']; ?>
                    ],
                    color: 'orchid',
                }]
            });
        });
    </script>
    <?php
        include_once "./config/koneksi.php";
        
        //penerjemah aktif
    $jemah1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='28.1' AND id_statkerja='1'");
    $ajemah1 = mysqli_fetch_array($jemah1);
    $jemah2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='28.2' AND id_statkerja='1'");
    $ajemah2 = mysqli_fetch_array($jemah2);
    $jemah3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='28.3' AND id_statkerja='1'");
    $ajemah3 = mysqli_fetch_array($jemah3);
    $jemah4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='28.4' AND id_statkerja='1'");
    $ajemah4 = mysqli_fetch_array($jemah4);
        
        //penerjemah bebas
    $jemah8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.1' AND id_statkerja='2'");
    $bjemah1 = mysqli_fetch_array($jemah8);
    $jemah9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.2' AND id_statkerja='2'");
    $bjemah2 = mysqli_fetch_array($jemah9);
    $jemah10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.3' AND id_statkerja='2'");
    $bjemah3 = mysqli_fetch_array($jemah10);
    $jemah11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='27.4' AND id_statkerja='2'");
    $bjemah4 = mysqli_fetch_array($jemah11);

    //widyaiswara aktif
    $widya1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='29.1' AND id_statkerja='1'");
    $awidya1 = mysqli_fetch_array($widya1);
    $widya2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='29.2' AND id_statkerja='1'");
    $awidya2 = mysqli_fetch_array($widya2);
    $widya3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='29.3' AND id_statkerja='1'");
    $awidya3 = mysqli_fetch_array($widya3);
    $widya4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='29.4' AND id_statkerja='1'");
    $awidya4 = mysqli_fetch_array($widya4);

    //widyaiswara bebas
    $widya8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='29.1' AND id_statkerja='2'");
    $bwidya1 = mysqli_fetch_array($widya8);
    $widya9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='29.2' AND id_statkerja='2'");
    $bwidya2 = mysqli_fetch_array($widya9);
    $widya10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='29.3' AND id_statkerja='2'");
    $bwidya3 = mysqli_fetch_array($widya10);
    $widya11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='29.4' AND id_statkerja='2'");
    $bwidya4 = mysqli_fetch_array($widya11);

    //auditor kepegawaian aktif
    $ditpeg1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.1' AND id_statkerja='1'");
    $aditpeg1 = mysqli_fetch_array($ditpeg1);
    $ditpeg2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.2' AND id_statkerja='1'");
    $aditpeg2 = mysqli_fetch_array($ditpeg2);
    $ditpeg3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.3' AND id_statkerja='1'");
    $aditpeg3 = mysqli_fetch_array($ditpeg3);
    $ditpeg4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.4' AND id_statkerja='1'");
    $aditpeg4 = mysqli_fetch_array($ditpeg4);

    //auditor kepegawaian bebas
    $ditpeg8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.1' AND id_statkerja='2'");
    $bditpeg1 = mysqli_fetch_array($ditpeg8);
    $ditpeg9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.2' AND id_statkerja='2'");
    $bditpeg2 = mysqli_fetch_array($ditpeg9);
    $ditpeg10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.3' AND id_statkerja='2'");
    $bditpeg3 = mysqli_fetch_array($ditpeg10);
    $ditpeg11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.4' AND id_statkerja='2'");
    $bditpeg4 = mysqli_fetch_array($ditpeg11);

    //pengelola pengadaan barang/jasa aktif
    $ppbj1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.1' AND id_statkerja='1'");
    $appbj1 = mysqli_fetch_array($ppbj1);
    $ppbj2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.2' AND id_statkerja='1'");
    $appbj2 = mysqli_fetch_array($ppbj2);
    $ppbj3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.3' AND id_statkerja='1'");
    $appbj3 = mysqli_fetch_array($ppbj3);
    $ppbj4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.4' AND id_statkerja='1'");
    $appbj4 = mysqli_fetch_array($ppbj4);

    //pengelola pengadaan barang/jasa bebas
    $ppbj5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.1' AND id_statkerja='2'");
    $bppbj1 = mysqli_fetch_array($ppbj5);
    $ppbj6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.2' AND id_statkerja='2'");
    $bppbj2 = mysqli_fetch_array($ppbj6);
    $ppbj7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.3' AND id_statkerja='2'");
    $bppbj3 = mysqli_fetch_array($ppbj7);
    $ppbj8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='30.4' AND id_statkerja='2'");
    $bppbj4 = mysqli_fetch_array($ppbj8);

    //ppupd aktif
    $ppupd1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='33.1' AND id_statkerja='1'");
    $appupd1 = mysqli_fetch_array($ppupd1);
    $ppupd2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='33.2' AND id_statkerja='1'");
    $appupd2 = mysqli_fetch_array($ppupd2);
    $ppupd3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='33.3' AND id_statkerja='1'");
    $appupd3 = mysqli_fetch_array($ppupd3);
    $ppudp4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='33.4' AND id_statkerja='1'");
    $appupd4 = mysqli_fetch_array($ppupd4);

    //ppupd bebas
    $ppupd5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='33.1' AND id_statkerja='2'");
    $bppupd1 = mysqli_fetch_array($ppupd5);
    $ppupd6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='33.2' AND id_statkerja='2'");
    $bppupd2 = mysqli_fetch_array($ppupd6);
    $ppupd7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='33.3' AND id_statkerja='2'");
    $bppupd3 = mysqli_fetch_array($ppupd7);
    $ppudp8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='33.4' AND id_statkerja='2'");
    $bppupd4 = mysqli_fetch_array($ppupd8);
    ?>
    <script>
        $(function (){
            var chart = new Highcharts.Chart({
                chart:  {
                    renderTo: 'pegawainon2',
                    type:   'column',
                },
                title:{
                  text: 'Jumlah Pejabat Fungsional Non~PUPR (lanjutan 2)'  
                },
                subtitle:{
                  text: 'Sumber: Biro Organisasi dan Tata Laksana'  
                },
                xAxis: {
                    categories: [
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
                        "Pengawas Penyelenggaraan Urusan Pemerintah Di Daerah Utama"
                        ],
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
                            <?php echo $ajemah1['jafung']; ?>,
                            <?php echo $ajemah2['jafung']; ?>,
                            <?php echo $ajemah3['jafung']; ?>,
                            <?php echo $ajemah4['jafung']; ?>,
                            <?php echo $awidya1['jafung']; ?>,
                            <?php echo $awidya2['jafung']; ?>,
                            <?php echo $awidya3['jafung']; ?>,
                            <?php echo $awidya4['jafung']; ?>,
                            <?php echo $aditpeg1['jafung']; ?>,
                            <?php echo $aditpeg2['jafung']; ?>,
                            <?php echo $aditpeg3['jafung']; ?>,
                            <?php echo $aditpeg4['jafung']; ?>,
                            <?php echo $appbj1['jafung']; ?>,
                            <?php echo $appbj2['jafung']; ?>,
                            <?php echo $appbj3['jafung']; ?>,
                            <?php echo $appbj4['jafung']; ?>,
                            <?php echo $appupd1['jafung']; ?>,
                            <?php echo $appupd2['jafung']; ?>,
                            <?php echo $appupd3['jafung']; ?>,
                            <?php echo $appupd4['jafung']; ?>
                        ],
                        color: '#FFB41A',
                },{
                    name: 'Bebas Sementara',
                    data: [
                            <?php echo $bjemah1['jafung']; ?>,
                        <?php echo $bjemah2['jafung']; ?>,
                        <?php echo $bjemah3['jafung']; ?>,
                        <?php echo $bjemah4['jafung']; ?>,
                        <?php echo $bwidya1['jafung']; ?>,
                        <?php echo $bwidya2['jafung']; ?>,
                        <?php echo $bwidya3['jafung']; ?>,
                        <?php echo $bwidya4['jafung']; ?>,
                        <?php echo $bditpeg1['jafung']; ?>,
                        <?php echo $bditpeg2['jafung']; ?>,
                        <?php echo $bditpeg3['jafung']; ?>,
                        <?php echo $bditpeg4['jafung']; ?>,
                        <?php echo $bppbj1['jafung']; ?>,
                        <?php echo $bppbj2['jafung']; ?>,
                        <?php echo $bppbj3['jafung']; ?>,
                        <?php echo $bppbj4['jafung']; ?>,
                        <?php echo $bppupd1['jafung']; ?>,
                        <?php echo $bppupd2['jafung']; ?>,
                        <?php echo $bppupd3['jafung']; ?>,
                        <?php echo $bppupd4['jafung']; ?>
                    ],
                    color: 'orchid',
                }]
            });
        });
    </script>
        <?php 
        include_once "./config/koneksi.php";
        
        //teknik pengairan aktif
        $tp1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.1' AND id_statkerja='1'");
        $atp1 = mysqli_fetch_array($tp1);
        $tp2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.2' AND id_statkerja='1'");
        $atp2 = mysqli_fetch_array($tp2);
        $tp3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.3' AND id_statkerja='1'");
        $atp3 = mysqli_fetch_array($tp3);
        $tp4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.4' AND id_statkerja='1'");
        $atp4 = mysqli_fetch_array($tp4);
        $tp5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.5' AND id_statkerja='1'");
        $atp5 = mysqli_fetch_array($tp5);
        $tp6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.6' AND id_statkerja='1'");
        $atp6 = mysqli_fetch_array($tp6);
        $tp7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.7' AND id_statkerja='1'");
        $atp7 = mysqli_fetch_array($tp7);
        
        //teknik pengairan bebas
        $tp8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.1' AND id_statkerja='2'");
        $btp1 = mysqli_fetch_array($tp8);
        $tp9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.2' AND id_statkerja='2'");
        $btp2 = mysqli_fetch_array($tp9);
        $tp10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.3' AND id_statkerja='2'");
        $btp3 = mysqli_fetch_array($tp10);
        $tp11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.4' AND id_statkerja='2'");
        $btp4 = mysqli_fetch_array($tp11);
        $tp12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.5' AND id_statkerja='2'");
        $btp5 = mysqli_fetch_array($tp12);
        $tp13 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.6' AND id_statkerja='2'");
        $btp6 = mysqli_fetch_array($tp13);
        $tp14 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='01.7' AND id_statkerja='2'");
        $btp7 = mysqli_fetch_array($tp14);
        
        //teknik jalan jembatan aktif
        $jatan1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.1' AND id_statkerja='1'");
        $ajatan1 = mysqli_fetch_array($jatan1);
        $jatan2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.2' AND id_statkerja='1'");
        $ajatan2 = mysqli_fetch_array($jatan2);
        $jatan3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.3' AND id_statkerja='1'");
        $ajatan3 = mysqli_fetch_array($jatan3);
        $jatan4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.4' AND id_statkerja='1'");
        $ajatan4 = mysqli_fetch_array($jatan4);
        $jatan5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.5' AND id_statkerja='1'");
        $ajatan5 = mysqli_fetch_array($jatan5);
        $jatan6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.6' AND id_statkerja='1'");
        $ajatan6 = mysqli_fetch_array($jatan6);
        $jatan7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.7' AND id_statkerja='1'");
        $ajatan7 = mysqli_fetch_array($jatan7);
        
        //teknik jalan jembatan bebas
        $jatan8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.1' AND id_statkerja='2'");
        $bejatan1 = mysqli_fetch_array($jatan8);
        $jatan9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.2' AND id_statkerja='2'");
        $bejatan2 = mysqli_fetch_array($jatan9);
        $jatan10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.3' AND id_statkerja='2'");
        $bejatan3 = mysqli_fetch_array($jatan10);
        $jatan11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.4' AND id_statkerja='2'");
        $bejatan4 = mysqli_fetch_array($jatan11);
        $jatan12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.5' AND id_statkerja='2'");
        $bejatan5 = mysqli_fetch_array($jatan12);
        $jatan13 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.6' AND id_statkerja='2'");
        $bejatan6 = mysqli_fetch_array($jatan13);
        $jatan14 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='02.7' AND id_statkerja='2'");
        $bejatan7 = mysqli_fetch_array($jatan14);
        
        //instruktur aktif
        $ins1 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.1' AND id_statkerja='1'");
        $ains1 = mysqli_fetch_array($ins1);
        $ins2 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.2' AND id_statkerja='1'");
        $ains2 = mysqli_fetch_array($ins2);
        $ins3 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.3' AND id_statkerja='1'");
        $ains3 = mysqli_fetch_array($ins3);
        $ins4 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.4' AND id_statkerja='1'");
        $ains4 = mysqli_fetch_array($ins4);
        $ins5 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.5' AND id_statkerja='1'");
        $ains5 = mysqli_fetch_array($ins5);
        $ins6 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.6' AND id_statkerja='1'");
        $ains6 = mysqli_fetch_array($ins6);
        
        //instruktur bebas
        $ins7 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.1' AND id_statkerja='2'");
        $bins1 = mysqli_fetch_array($ins7);
        $ins8 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.2' AND id_statkerja='2'");
        $bins2 = mysqli_fetch_array($ins8);
        $ins9 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.3' AND id_statkerja='2'");
        $bins3 = mysqli_fetch_array($ins9);
        $ins10 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.4' AND id_statkerja='2'");
        $bins4 = mysqli_fetch_array($ins10);
        $ins11 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.5' AND id_statkerja='2'");
        $bins5 = mysqli_fetch_array($ins11);
        $ins12 = mysqli_query($con, "SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='11.6' AND id_statkerja='2'");
        $bins6 = mysqli_fetch_array($ins12);
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
                    categories: ["Teknik Pengairan Pelaksana/Terampil", 
                                "Teknik Pengairan Pelaksana Lanjutan/Mahir",
                                "Teknik Pengairan Penyelia",
                                "Teknik Pengairan Pertama",
                                "Teknik Pengairan Muda",
                                "Teknik Pengairan Madya",
                                "Teknik Pengairan Utama",
                                "Teknik Jalan dan Jembatan Pelaksana/Terampil",
                                "Teknik Jalan dan Jembatan Pelaksana Lanjutan/Mahir",
                                "Teknik Jalan dan Jembatan Penyelia",
                                "Teknik Jalan dan Jembatan Pertama",
                                "Teknik Jalan dan Jembatan Muda",
                                "Teknik Jalan dan Jembatan Madya",
                                "Teknik Jalan dan Jembatan Utama",
                                "Instruktur Pelaksana/Terampil",
                                "Instruktur Pelaksana Lanjutan/Mahir",
                                "Instruktur Penyelia",
                                "Instruktur Pertama",
                                "Instruktur Muda",
                                "Instruktur Madya"],
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
                            <?php echo $atp1['jafung']; ?>,
                            <?php echo $atp2['jafung']; ?>,
                            <?php echo $atp3['jafung']; ?>,
                            <?php echo $atp5['jafung']; ?>,
                            <?php echo $atp6['jafung']; ?>,
                            <?php echo $atp7['jafung']; ?>,
                            <?php echo $ajatan1['jafung']; ?>,
                            <?php echo $ajatan2['jafung']; ?>,
                            <?php echo $ajatan3['jafung']; ?>,
                            <?php echo $ajatan5['jafung']; ?>,
                            <?php echo $ajatan6['jafung']; ?>,
                            <?php echo $ajatan7['jafung']; ?>,
                            <?php echo $ains1['jafung']; ?>,
                            <?php echo $ains2['jafung']; ?>,
                            <?php echo $ains3['jafung']; ?>,
                            <?php echo $ains5['jafung']; ?>,
                            <?php echo $ains6['jafung']; ?>
                        ],
                        color: '#FFB41A',
                },{
                    name: 'Bebas Sementara',
                    data: [
                        <?php echo $btp1['jafung']; ?>,
                        <?php echo $btp2['jafung']; ?>,
                        <?php echo $btp3['jafung']; ?>,
                        <?php echo $btp4['jafung']; ?>,
                        <?php echo $btp5['jafung']; ?>,
                        <?php echo $btp6['jafung']; ?>,
                        <?php echo $btp7['jafung']; ?>,
                        <?php echo $bejatan1['jafung']; ?>,
                        <?php echo $bejatan2['jafung']; ?>,
                        <?php echo $bejatan3['jafung']; ?>,
                        <?php echo $bejatan4['jafung']; ?>,
                        <?php echo $bejatan5['jafung']; ?>,
                        <?php echo $bejatan6['jafung']; ?>,
                        <?php echo $bejatan7['jafung']; ?>,
                        <?php echo $bins1['jafung']; ?>,
                        <?php echo $bins2['jafung']; ?>,
                        <?php echo $bins3['jafung']; ?>,
                        <?php echo $bins4['jafung']; ?>,
                        <?php echo $bins5['jafung']; ?>,
                        <?php echo $bins6['jafung']; ?>
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