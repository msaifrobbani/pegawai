<?php

$aksi="modul/jabatan/aksi_jabatan.php";

switch($_GET[act]){
	default:
	
	echo "<h2 class='head'>DATA JABATAN FUNGSIONAL PEGAWAI</h2>
	<div>
	<input class='btn btn-primary' type=button value='Tambah Data' onclick=\"window.location.href='?module=jabatan&act=input';\">
	</div>
	<table class='tabel'>
	<thead>
  <tr>
    <td>No</td>
    <td>Id Jabatan</td>
    <td>Jabatan</td>
	<td>Control</td>
  </tr>
  </thead>";
        $p      = new Paging;
        $batas	= 15;
        $posisi	= $p->cariPosisi($batas);
        $tampil=mysql_query("select * from jabatan order by id_jab DESC LIMIT $posisi,$batas");
  $no=$posisi+1;
  while($dt=mysql_fetch_array($tampil)){
  echo "<tr>
    <td>$no</td>
    <td>$dt[id_jab]</td>
    <td>$dt[n_jab]</td>
	<td><span><a class='btn btn-success' href='?module=jabatan&act=edit&id=$dt[id_jab]'><i class='icon-edit'></i></a></span><span>
	<a class='btn btn-danger' href=\"$aksi?module=jabatan&act=hapus&id=$dt[id_jab]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash'></i></a></span></td>
  </tr>";
  $no++;
  }
echo "  
</table>
	";
	if ($_SESSION[leveluser]=='1') {
                    $jmldata=mysql_num_rows(mysql_query("select * from jabatan"));
                }
                $jmlhalaman     = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman    = $p->navHalaman($_GET[halaman], $jmlhalaman);
                
                echo "<br><div id='paging'>$linkHalaman</div><br>";
                
	break;
	
	case "input":
	echo "<h2 class='head'>Entry Data Jabatan</h2>
	<form action='$aksi?module=jabatan&act=input' method='post'>
	<table class='tabelform tabpad'>
	<tr>
	<td>ID JABATAN</td><td>:</td><td><input class='input' name='id' type='text'></td>
	</tr>
	<tr>
	<td>JABATAN</td><td>:</td><td><input class='input' name='nama' type='text'></td>
	</tr>
	<tr>
	<td></td><td></td><td><input class='btn btn-primary' type=submit value=Simpan>
	<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
	break;
	
	case "edit":
	$edit=mysql_query("select * from jabatan where id_jab='$_GET[id]'");
	$data=mysql_fetch_array($edit);
	echo "<h2 class='head'>Entry Data Jabatan</h2>
	<form action='$aksi?module=jabatan&act=edit' method='post'>
	<table class='tabelform tabpad'>
	<tr>
	<td>ID BAGIAN</td><td>:</td><td><input class='input' name='id' type='text' value='$data[id_jab]' disabled></td>
	</tr>
	<tr>
	<td>NAMA BAGIAN</td><td>:</td><td><input class='input' name='nama' type='text' value='$data[n_jab]'></td>
	</tr>
	<tr>
	<td></td><td></td><td><input class='btn btn-primary' type=submit value=Update>
	<input class='btn btn-danger' type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>";
	break;
	
}


?>