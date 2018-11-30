<?php

$aksi="modul/bagian/aksi_bagian.php";

switch($_GET[act]){
        default:
	echo "<h2 class='head'>DATA UNIT KERJA</h2>
	<div>
	<input class='btn btn-primary' type=button value='Tambah Data' onclick=\"window.location.href='?module=bagian&act=input';\">
	</div>
	<table class='tabel'>
	<thead>
  <tr>
    <td>No</td>
    <td>Kode Unit Kerja</td>
    <td>Nama Unit Kerja</td>
    <td>Control</td>
  </tr>
  </thead>";
        $p      = new Paging;
        $batas	= 5;
        $posisi	= $p->cariPosisi($batas);
        $tampil=mysql_query("select * from bagian order by id_bag DESC LIMIT $posisi,$batas");
  $no=$posisi+1;
  while($dt=mysql_fetch_array($tampil)){
  echo "<tr>
    <td>$no</td>
    <td>$dt[id_bag]</td>
    <td>$dt[n_bag]</td>
	<td><span><a class='btn btn-success' href='?module=bagian&act=edit&id=$dt[id_bag]'><i class='icon-edit'></i></a></span><span>
	<a class='btn btn-danger' href=\"$aksi?module=bagian&act=hapus&id=$dt[id_bag]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash'></i></a></span></td>
  </tr>";
  $no++;
  }
echo "  
</table>
	";

	if ($_SESSION[leveluser]=='1') {
                    $jmldata=mysql_num_rows(mysql_query("select * from bagian"));
                }
                
                $jmlhalaman     = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman    = $p->navHalaman($_GET[halaman], $jmlhalaman);
                
                echo "<br><div id='paging'>$linkHalaman</div><br>";
	break;
	
	case "input":
	echo "<h2 class='head'>Entry Data Unit Kerja</h2>
	<form action='$aksi?module=bagian&act=input' method='post'>
	<table class='tabelform tabpad'>
	<tr>
	<td>ID UNIT KERJA</td><td>:</td><td><input class='input' name='id' type='text'></td>
	</tr>
	<tr>
	<td>NAMA UNIT KERJA</td><td>:</td><td><input class='input' name='nama' type='text'></td>
	</tr>
	<tr>
	<td></td><td></td><td><input class='btn btn-primary' type=submit value=Simpan>
	<input class='btn btn-danger' type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
	break;
	
	case "edit":
	$edit=mysql_query("select * from bagian where id_bag='$_GET[id]'");
	$data=mysql_fetch_array($edit);
	echo "<h2 class='head'>Entry Data Unit Kerja</h2>
	<form action='$aksi?module=bagian&act=edit' method='post'>
	<table class='tabelform tabpad'>
	<tr>
	<td>ID UNIT KERJA</td><td>:</td><td><input class='input' name='id' type='text' value='$data[id_bag]' disabled></td>
	</tr>
	<tr>
	<td>NAMA UNIT KERJA</td><td>:</td><td><input class='input' name='nama' type='text' value='$data[n_bag]'></td>
	</tr>
	<tr>
	<td></td><td></td><td><input class='btn btn-primary' type=submit value=Update>
	<input class='btn btn-danger' type=button value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>";
	break;
	
	case "hapus":
	
	break;
}


?>