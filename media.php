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
                        "Pranata Komputer Utama",],
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
                        "Pranata Komputer Utama",],
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
