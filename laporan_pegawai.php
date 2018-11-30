<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LAPORAN DATA PEGAWAI</title>
<link rel="stylesheet" href="css/print.css" type="text/css"  />
</head>
<style>
@media print {
input.noPrint { display: none; }
}
</style>


<body class="body">
<div id="wrapper">
<?php

include "config/koneksi.php";

include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";


$today=date('Y-m-d');
$tampil=mysql_query("select * from pegawai,jabatan,bagian,stat_kerja where pegawai.id_jab=jabatan.id_jab
	and pegawai.id_bag=bagian.id_bag and pegawai.id_statkerja=stat_kerja.id_statkerja");
	echo "<h2 class='head'>LAPORAN DATA PEGAWAI</h2>
	<table class='tabel'>
	<thead>
  <tr>
	<td>No</td>
        <td>Nip</td>
        <td>Nip Lama</td>
	<td>Nama Pegawai</td>
	<td>Tempat Lahir</td>
	<td>Tanggal Lahir</td>
	<td>Usia</td>
        <td>Tanggal Masuk</td>
	<td>Jenis Kelamin</td>
	<td>Jabatan</td>
	<td>Unit Kerja</td>
	<td>Status Pegawai</td>
	<td>Action</td>
  </tr>
  </thead>";
  $no=1;
  function jk($var){
	if($var=="P"){
		echo "Perempuan";
	}else {
		echo "Laki-Laki";
	}
  }
  while($dt=mysql_fetch_array($tampil)){
  	$tgllahir=$dt['tgl_lahir'];
  	$query="select datediff('$today','$tgllahir') as selisih";
  	$usia=mysql_query($query);
        $data = mysql_fetch_array($usia);
        $thn=floor($data['selisih']/365);
        $bln = floor(($data['selisih']-($thn*365))/30);
  echo "<tr>
	<td>$no</td>
        <td>'$dt[nip]</td>
        <td>'$dt[niplama]</td>
        <td>$dt[nama]</td>
        <td>$dt[tmpt_lahir]</td>
        <td>"; echo tgl_indo($dt['tgl_lahir']); echo "</td>
        <td>$thn tahun/ $bln bulan</td>
        <td>"; echo tgl_indo($dt['tgl_masuk']); echo "</td>
	<td>";jk($dt['jenis_kelamin']); echo "</td>
	<td>$dt[n_jab]</td>
	<td>$dt[n_bag]</td>
	<td>$dt[n_statkerja]</td>
	<td>[<a href='detail_laporan.php?id=$dt[nip]'>Detail Pegawai</a>]</td>
  </tr>";
  $no++;
  }
echo "  
</table>

	";
	?>
	<div style="text-align:center;padding:20px;">
            <span><a href='download_php.php'>Download</a></span>
	
	</div>
</div>
	
	
</body>
</html>
