<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LAPORAN DATA PEGAWAI</title>
<link rel="stylesheet" href="css/print.css" type="text/css"  />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
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
 

	echo "<h2 class='head'>LAPORAN DATA PEGAWAI</h2>
	<form method='post' action='$_SERVER[PHP_SELF]' class='form-inline'>
		Cari Pegawai Based on Jabatan Fungsional : <select name='n_jab' class='form-control'>
			<option value=''>-- Jabatan Fungsional 	--</option>";
			$q = mysql_query("SELECT * FROM jabatan ORDER BY id_jab DESC");

			while ($row=mysql_fetch_array($q)) {
				# code...
				echo "<option value=$row[n_jab]>$row[n_jab]</option>";
			}
	echo "
		</select>
		<input type=submit value=Cari name='cari' class='btn btn-primary'>
	</form>";
	
	if (empty($_POST['n_jab'])) {
		# code...
		echo "
		<table class='tabel'>
			<thead>
			<tr>
				<td>Nip</td>
				<td>Nip Lama</td>
				<td>Nama Pegawai</td>
				<td>Tempat Lahir</td>
				<td>Tanggal Lahir</td>
				<td>Usia</td>
				<td>Jenis Kelamin</td>
				<td>Golongan/Ruang</td>
				<td>Jabatan</td>
				<td>Unit Kerja</td>
				<td>Status Kerja</td>
				<td>Action</td>
			</tr>	
			</thead>";
			$today=date('Y-m-d');
			$tampil=mysql_query("select * from pegawai,bagian,jabatan,gol_ruang,stat_kerja where pegawai.id_bag=bagian.id_bag and
pegawai.id_jab=jabatan.id_jab and pegawai.id_statkerja=stat_kerja.id_statkerja and pegawai.id_gol_pangkat=gol_ruang.id_gol_pangkat order by nip") or die(mysql_error);
			$no = 1;
			function jk($var){
				if($var=="P"){
					echo "P";
				}else {
					echo "L";
				}
			  }

			while ($dt = mysql_fetch_array($tampil)) {
				# code...
				$tgllahir=$dt['tgl_lahir'];
				$query="select datediff('$today','$tgllahir') as selisih";
				$usia=mysql_query($query);
				$data = mysql_fetch_array($usia);
				$thn=floor($data['selisih']/365);
				$bln = floor(($data['selisih']-($thn*365))/30);
				
				echo "
					<tr>
						<td>'$dt[nip]</td>
						<td>'$dt[niplama]</td>
						<td>$dt[nama]</td>
						<td>$dt[tmpt_lahir]</td>
						<td>"; echo tgl_indo($dt['tgl_lahir']); echo "</td>
						<td>$thn tahun/ $bln bulan</td>
						<td>";jk($dt['jenis_kelamin']); echo "</td>
						<td>$dt[nm_gol_pangkat]</td>
						<td>$dt[n_jab]</td>
						<td>$dt[n_bag]</td>
						<td>$dt[n_statkerja]</td>
						<td>[<a href='detail_laporan.php?id=$dt[nip]'>Detail Pegawai</a>]</td>
					</tr>
				";
			}
	echo "
		</table>
	";
	} else {
		# code...
		if (isset($_POST['cari'])) {
			# code...

			echo "
			<table class='tabel'>
			<thead>
			<tr>
				<td>Nip</td>
				<td>Nip Lama</td>
				<td>Nama Pegawai</td>
				<td>Tempat Lahir</td>
				<td>Tanggal Lahir</td>
				<td>Usia</td>
				<td>Jenis Kelamin</td>
				<td>Golongan/Ruang</td>
				<td>Jabatan</td>
				<td>Unit Kerja</td>
				<td>Status Kerja</td>
				<td>Action</td>
			</tr>	
			</thead>";
			$today=date('Y-m-d');
			$tampil=mysql_query("select * from 
			pegawai a
			left join bagian b 
					on a.id_bag=b.id_bag
			left join jabatan c
					on a.id_jab=c.id_jab
			left join gol_ruang d
					on a.id_gol_pangkat=d.id_gol_pangkat
			left join stat_kerja e
					on a.id_statkerja=e.id_statkerja
		where 
		c.n_jab like '%".$n_jab."%' order by a.nip DESC") or die(mysql_error);
	
			$no = 1;
			function jk($var){
				if($var=="P"){
					echo "P";
				}else {
					echo "L";
				}
			  }
			
			while ($dt=mysql_fetch_array($tampil)) {
				# code...
				$tgllahir=$dt['tgl_lahir'];
				$query="select datediff('$today','$tgllahir') as selisih";
				$usia=mysql_query($query);
				$data = mysql_fetch_array($usia);
				$thn=floor($data['selisih']/365);
				$bln = floor(($data['selisih']-($thn*365))/30);
	
				echo "
					<tr>
					<td>'$dt[nip]</td>
					<td>'$dt[niplama]</td>
					<td>$dt[nama]</td>
					<td>$dt[tmpt_lahir]</td>
					<td>"; echo tgl_indo($dt['tgl_lahir']); echo "</td>
					<td>$thn tahun/ $bln bulan</td>
					<td>";jk($dt['jenis_kelamin']); echo "</td>
					<td>$dt[nm_gol_pangkat]</td>
					<td>$dt[n_jab]</td>
					<td>$dt[n_bag]</td>
					<td>$dt[n_statkerja]</td>
					<td>[<a href='detail_laporan.php?id=$dt[nip]'>Detail Pegawai</a>]</td>
					</tr>
				";
			}
			echo "
				</table>
			";

		
		}
	}
	
?>
	<div style="text-align:center;padding:20px;">
            <span><a href='download_php.php'>Download</a></span>
	
	</div>
</div>
	
	
</body>
</html>
