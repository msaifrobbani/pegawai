<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=pejebat-fungsional.xls");

include "config/koneksi.php";

include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";

$today=date('Y-m-d');
$tampil=mysql_query("select * from pegawai,jabatan,bagian,stat_kerja where pegawai.id_jab=jabatan.id_jab
	and pegawai.id_bag=bagian.id_bag and pegawai.id_statkerja=stat_kerja.id_statkerja");

?>
<h2 class='head'>LAPORAN DATA PEGAWAI</h2>
<table class='tabel'>
    <thead>
        <tr>
            <td>NO</td>
            <td>NIP</td>
            <td>NIP LAMA</td>
            <td>NAMA PEGAWAI</td>
            <td>TEMPAT LAHIR</td>
            <td>TANGGAL LAHIR</td>
            <td>USIA</td>
            <td>TANGGAL MASUK</td>
            <td>JENIS KELAMIN</td>
            <td>JABATAN</td>
            <td>UNIT KERJA</td>
            <td>STATUS PEGAWAI</td>
        </tr>
    </thead>
<?php
$no=1;
  function jk($var){
	if($var=="P"){
		echo "Perempuan";
	}else {
		echo "Laki-Laki";
	}
  }
while ($dt=mysql_fetch_array($tampil)) {
    $tgllahir=$dt['tgl_lahir'];
    $query="select datediff('$today','$tgllahir') as selisih";
    $usia=mysql_query($query);
    $data = mysql_fetch_array($usia);
    $thn=floor($data['selisih']/365);
    $bln = floor(($data['selisih']-($thn*365))/30);
    ?>
    
        <tr>
            <td><?php echo "".$no.""; ?></td>
            <td>'<?php echo "".$dt[nip].""; ?></td>
            <td><?php echo "".$dt[niplama].""; ?></td>
            <td><?php echo "".$dt[nama].""; ?></td>
            <td><?php echo "".$dt[tmpt_lahir].""; ?></td>
            <td><?php echo tgl_indo($dt['tgl_lahir']); ?></td>
            <td><?php echo "".$thn.""; ?> thn/ <?php echo "".$bln.""; ?> bln</td>
            <td><?php echo tgl_indo($dt['tgl_masuk']); ?></td>
            <td><?php echo jk($dt['jenis_kelamin']) ?></td>
            <td><?php echo "".$dt[n_jab].""; ?></td>
            <td><?php echo "".$dt[n_bag].""; ?></td>
            <td><?php echo "".$dt[n_statkerja].""; ?></td>
        </tr>
    
    <?php
    $no++;
}
?>
</table>
