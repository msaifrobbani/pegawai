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
<div id="wrapper2">
<?php
include "config/koneksi.php";

include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";

$ambil=mysql_query("select * from pegawai where nip='$_GET[id]'");
	$t=mysql_fetch_array($ambil);
	echo "<h2 class='head'>Data Pegawai</h2>
	
	<div class='foto'>";
	if($t['foto']==""){
		echo "<img src='image_peg/no.jpg' width='200' height='240' />";
	} else {
	echo "<img src='image_peg/small_$t[foto]' width='200' height='240' />";
	}
	echo "</div>
	<table class='tabelform tabpad'>
	<tr>
	<td>Nip</td><td>:</td><td>$t[nip]</td>
	</tr>
	<tr>
	<td>Nip Lama</td><td>:</td><td>$t[niplama]</td>
	</tr>
	<tr>
	<td>Nama Pegawai</td><td>:</td><td>$t[nama]</td>
	</tr>
	<tr>
	<td>Tempat Lahir</td><td>:</td><td>$t[tmpt_lahir]</td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td><td>:</td><td>"; 
	echo "".tgl_indo($t['tgl_lahir'])."";
	echo "</td>
	</tr>
	
	<tr>
	<td>Jenis Kelamin</td><td>:</td><td>";
	if($t['jenis_kelamin']=='L'){
	echo "Pria";
	} else {
	echo "Wanita";
	}	
	echo "</td></tr>
	
	<tr>
	<td>Golongan/Pangkat</td><td>:</td><td>";
	$gol=mysql_query("select * from gol_ruang where id_gol_pangkat='$t[id_gol_pangkat]'");
	$g=mysql_fetch_array($gol);
	echo "$g[nm_gol_pangkat]";	
	echo "</td>
	</tr>

	<tr>
	<td>TMT Golongan/Pangkat</td><td>:</td><td>";
	echo "".tgl_indo($t['tmt_gol_pangkat'])."";
	echo "
	</td>
	</tr>

	<tr>
	<td>Unit Kerja</td><td>:</td><td>";
	$bag=mysql_query("select * from bagian where id_bag='$t[id_bag]'");
	$b=mysql_fetch_array($bag);
	echo "$b[n_bag]";	
	echo "</td>
	</tr>
	
	<tr>
	<td>Jabatan</td><td>:</td><td>";
	$jab=mysql_query("select * from jabatan where id_jab='$t[id_jab]'");
	$j=mysql_fetch_array($jab);
	echo "$j[n_jab]";
	echo "</td>
	</tr>

	<tr>
	<td>Status Kerja</td><td>:</td><td>";
	$stat=mysql_query("select * from stat_kerja where id_statkerja='$t[id_statkerja]'");
	$st=mysql_fetch_array($stat);
	echo "$st[n_statkerja]";
	echo "</td>
	</tr>
	
	</table>
	<div class='rp' >
	<div style='clear:both'></div>
	<h2 class='head'>Riwayat Angka Kredit</h2>
	<table class='tabel'>
	<thead>
	<tr>
		<td>Nomor PAK</td>
		<td>TMT Angka Kredit</td>
        <td>Angka Kredit</td>
        <td>Batas PAK</td>
	</tr>
	</thead>";
	$ri=mysql_query("select *,DATE_ADD(tgl_pak,INTERVAL 3 YEAR) as tgl_peringatan from h_ak where nip='$_GET[id]' order by idh_ak ASC");
	if(mysql_num_rows($ri)==0){
	echo "<tr>
	<td colspan='4'>*Tidak Ada Data*</td>
	</tr>";
	} else {
	while($p=mysql_fetch_array($ri)){
	echo "
	<tr>
	<td>$p[no_pak]</td>
	<td>". tgl_indo($p['tgl_pak'])."</td>
        <td>$p[angka_kredit]</td>
        <td>". tgl_indo($p['tgl_peringatan'])."</td>
	</tr>";
	}
	}
	echo "
	
	</table>
	</div>
	
	
	<div class='rp2'>
	<h2 class='head'>RIWAYAT JABATAN FUNGSIONAL</h2>
	<table class='tabel'>	
	<thead>
	<tr>
		<td>Jabatan Fungsional</td>
		<td>Nomor SK</td>
		<td>Tanggal SK</td>
		<td>TMT Jabatan</td>
		<td>Angka Kredit</td>
	</tr>	
	</thead>";
	$ri=mysql_query("select * from h_jabatan where nip='$_GET[id]' order by id_jbt ASC");
	if(mysql_num_rows($ri)==0){
	echo "<tr>
	<td colspan='5'>*Tidak Ada Data*</td>
	</tr>";
	} else {
	while($p=mysql_fetch_array($ri)){
	echo "
	<tr>
	<td>";
        $jab=mysql_query("select * from jabatan where id_jab='$p[id_jab]'");
        $j=mysql_fetch_array($jab);
        echo "$j[n_jab]";
        echo "</td>
        <td>$p[no_sk]</td>
    	<td>". tgl_indo($p['tgl_sk'])."</td>    
		<td>". tgl_indo($p['tmt_jab'])."</td>
		<td>$p[jab_ak]</td>
        
	</tr>";
	}
	}
	echo "
	</table>
	</div>
		<div style='clear:both'></div>
	";	
	?>
	<div style="text-align:center;padding:20px;">
	<input class="noPrint" type="button" value="Cetak Halaman" onclick="window.print()">
	<?php echo "<input type=button value=Batal onclick=self.history.back()>";?>
	</div>
</div>
</body>
</html>
