<?php

$aksi="modul/pegawai/aksi_pegawai.php";

switch($_GET[act]){
	default:

             echo"
                <h2 class='head'>DATA PEGAWAI</h2>
                <form method='get' action='$_SERVER[PHP_SELF]' class='form-inline'>
          <input type='hidden' name='module' value='pegawai'>
          Masukkan Nama Pegawai : <input type='text' name='nama' class='form-control' size='40' placeholder='Cari Disini...'> 
            <select name='kategori' class='form-control'>
                <option value=''>-- Cari Berdasarkan --</option>
                <option value='nip'>NIP</option>
                <option value='nama'>Nama Pegawai</option>
                <option value='n_jab'>Jabatan Fungsional</option>
            </select>
          <input type=submit value=Cari class='btn btn-primary'>
          </form><br>
         
          <input type=button class='btn btn-primary' value='Tambah Pegawai' onclick=\"window.location.href='?module=pegawai&act=input';\">
                ";
            if (empty($_GET['nama']) and empty($_GET['kategori'])) {
                echo "
                     <table class='tabel'>
    <thead>
            <tr>
            <td>No</td>
            <td>Nip</td>
            <td>Nama</td>
            <td>Tempat Lahir</td>
            <td>Tanggal Lahir</td>
            <td>Tgl Masuk</td>
            <td>Golongan/Pangkat</td>
            <td>Jabatan</td>
            <td>Unit Kerja</td>            
            <td>Status Kerja</td>
            <td>Control</td>
            </tr>
        </thead>";

        $p      = new Paging;
        $batas	= 15;
        $posisi	= $p->cariPosisi($batas);
        
                      
                  if ($_SESSION['leveluser']=='1') {

                    $tampil=mysql_query("select * from pegawai,bagian,jabatan,gol_ruang,stat_kerja where pegawai.id_bag=bagian.id_bag and
    pegawai.id_jab=jabatan.id_jab and pegawai.id_statkerja=stat_kerja.id_statkerja and pegawai.id_gol_pangkat=gol_ruang.id_gol_pangkat order by nip DESC LIMIT $posisi,$batas") or die(mysql_error);
                }
                $no=$posisi+1;

                while ($dt=mysql_fetch_array($tampil)){
                    echo "
                   <tr>
                <td>$no</td>
                <td>$dt[nip]</td>
                <td>$dt[nama]</td>
                <td>$dt[tmpt_lahir]</td>
                <td>".tgl_indo($dt['tgl_lahir'])."</td>
                <td>".tgl_indo($dt['tgl_masuk'])."</td>
                <td>$dt[nm_gol_pangkat]</td>
                <td>$dt[n_jab]</td>
                <td>$dt[n_bag]</td>
                <td>$dt[n_statkerja]</td>
                <td><span><a class='btn btn-success' href='?module=pegawai&act=edit&id=$dt[nip]'><i class='icon-edit'></i></a></span>
                    <span><a class='btn btn-info' href='?module=pegawai&act=detail&id=$dt[nip]'><i class='icon-zoom-in'></i></a></span>
                    <span><a class='btn btn-danger' href=\"$aksi?module=pegawai&act=hapus&id=$dt[nip]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash'></i></a></span>
                    </td>
                   </tr>
                ";
                    $no++;
                }
                echo "</table>";
                
                if ($_SESSION[leveluser]=='1') {
                    $jmldata=mysql_num_rows(mysql_query("select * from pegawai"));
                }
                
                $jmlhalaman     = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman    = $p->navHalaman($_GET[halaman], $jmlhalaman);
                
                echo "<br><div id='paging'>$linkHalaman</div><br>";
                break;
                
            }else{
                echo "
                    
                    <table class='tabel'>
    <thead>
            <tr>
            <td>No</td>
            <td>Nip</td>
            <td>Nama</td>
            <td>Tempat Lahir</td>
            <td>Tanggal Lahir</td>
            <td>Tgl Masuk</td>
            <td>Golongan/Pangkat</td>
            <td>Jabatan</td>
            <td>Unit Kerja</td>
            <td>Status Kerja</td>
            <td>Control</td>
            </tr>
        </thead>
                    ";
                
                $p      = new Paging9;
                $batas  = 15;
                $posisi = $p->cariPosisi($batas);
                
                if ($_SESSION['leveluser']=='1') {
                    
                    
                    
                    if($_GET[kategori]=="nama"){
//                        die("1");
                        $where="a.nama like '%".$_GET[nama]."%'";
                    }elseif ($_GET[kategori]=="nip") {
                        
//                        die("2");
                        $where="a.nip like '%".$_GET[nama]."%'";

                    }elseif ($_GET[kategori]=="n_jab") {
//                        die("3");

                        $where="c.n_jab like '%".$_GET[nama]."%'";
                    }
                    
                    $sql="select * from 
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
                        ".$where." order by a.nip DESC LIMIT $posisi,$batas";

//                    die($sql);
                    $tampil = mysql_query($sql);
                  
                $no=$posisi+1;
                while ($dt=mysql_fetch_array($tampil)) {
                   echo "
                       <tr>
                <td>$no</td>
                <td>$dt[nip]</td>
                <td>$dt[nama]</td>
                <td>$dt[tmpt_lahir]</td>
                <td>".tgl_indo($dt['tgl_lahir'])."</td>
                <td>".tgl_indo($dt['tgl_masuk'])."</td>
                <td>$dt[nm_gol_pangkat]</td>
                <td>$dt[n_jab]</td>
                <td>$dt[n_bag]</td>
                <td>$dt[n_statkerja]</td>
                <td><span><a class='btn btn-success' href='?module=pegawai&act=edit&id=$dt[nip]'><i class='icon-edit'></i></a></span>
                    <span><a class='btn btn-info' href='?module=pegawai&act=detail&id=$dt[nip]'><i class='icon-zoom-in'></i></a></span>
                    <span><a class='btn btn-danger' href=\"$aksi?module=pegawai&act=hapus&id=$dt[nip]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='icon-trash'></i></a></span>
                    </td>
                   </tr>
                       ";
                   $no++;
                }
                }
                
                echo "</table>";
                if ($_SESSION[leveluser]=='1') {
                    $jmldata    = mysql_num_rows(mysql_query("select * from 
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
                        ".$where.""));
                }
                $jmlhalaman     = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman    = $p->navHalaman($_GET[halaman], $jmlhalaman);
                
                echo "<br><div id='paging'>$linkHalaman</div><br>";
                
            }   
            break;
                
            
                
	case "input":
	echo "<h2 class='head'>Entry Data Pegawai</h2>
	<form action='$aksi?module=pegawai&act=input' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td>Nip</td><td>:</td><td><input name='nip' type='text'></td>
	</tr>
        <tr>
	<td>Nip Lama</td><td>:</td><td><input name='niplama' type='text'></td>
	</tr>
	<tr>
	<td>Nama Pegawai</td><td>:</td><td><input class='input' name='nama' type='text'></td>
	</tr>
	<tr>
	<td>Tempat Lahir</td><td>:</td><td><input class='input' name='tls' type='text'></td>
	</tr>
	<tr>
	<td>Tanggal Lahir</td><td>:</td><td>
	<select name='hari'>
                <option value='none' selected='selected'>Tgl*</option>";
			for($h=1; $h<=31; $h++) 
			{ 
				echo"<option value=",$h,">",$h,"</option>";
			} 
	echo"</select>
	<select name='bulan'>
            	<option value='none' selected='selected'>Bulan*</option>
				<option value='1'>Januari</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>Desember</option>
			</select>
	<select name='tahun'>
            <option value='none' selected='selected'>Tahun*</option>";
			$now =  date("Y");
			$saiki = 1965;
			for($l=$saiki; $l<=$now; $l++)
			{
				echo"<option value=",$l,">",$l,"</option>";
			}	
	echo "</select>
	</td>
	</tr>
	
	<tr>
	<td>Jenis Kelamin</td><td>:</td><td><input name='jk' type='radio' value='L' />Pria <input name='jk' type='radio' value='P' />Wanita</td>
	</tr>
	
	<tr>
	<td>Alamat</td><td>:</td><td><textarea name='almt' ></textarea></td>
	</tr>
	
	<tr>
	<td>Tanggal Masuk</td><td>:</td><td>
	<select name='hm'>
                <option value='none' selected='selected'>Tgl*</option>";
			for($h=1; $h<=31; $h++) 
			{ 
				echo"<option value=",$h,">",$h,"</option>";
			} 
	echo"</select>
	<select name='bm'>
            	<option value='none' selected='selected'>Bulan*</option>
				<option value='1'>Januari</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>Desember</option>
			</select>
	<select name='tm'>
            <option value='none' selected='selected'>Tahun*</option>";
			$now =  date("Y");
			$saiki = 1970;
			for($l=$saiki; $l<=$now; $l++)
			{
				echo"<option value=",$l,">",$l,"</option>";
			}	
	echo "</select>
	</td>
	</tr>
        
	<tr>
        <td>Golongan/Pangkat</td><td></td><td><select name='golpang'>
        <option value='' selected>Pilih Golongan/Pangkat</option>";
        $gol=mysql_query("select * from gol_ruang");
        while($g=mysql_fetch_array($gol)){
            echo "<option value='$g[id_gol_pangkat]'>$g[nm_gol_pangkat]</option>";
        }
        echo "</select>
        </td>
        </tr>

	<tr>
	<td>Unit Kerja</td><td>:</td><td><select name='bagian'>
	<option value='' selected >Pilih Unit Kerja</option>";
	$jab=mysql_query("select * from bagian");
	while($j=mysql_fetch_array($jab)){
	echo "<option value='$j[id_bag]'>$j[n_bag]</option>";
	}
	echo "</select></td>
	</tr>
	
	<tr>
	<td>Jabatan</td><td>:</td><td><select name='jabatan'>	
	<option value='' selected >Pilih Jabatan</option>";
	$jab=mysql_query("select * from jabatan");
	while($j=mysql_fetch_array($jab)){
	echo "<option value='$j[id_jab]'  >$j[n_jab]</option>";
	}
	echo "</select></td>
	</tr>
        
        <tr>
        <td colspan='3'>
        Dalam pengisian pendidikan, jika pendidikan tertinggi adalah S3, maka pendidikan terakhir 1 diisi dengan pendidikan terakhir
        ketika S2. Dan pendidikan terakhir 2, 
        otomatis diisi dengan pendidikan ketika S3. Begitu demikian halnya dengan pendidikan yang lain.
        Jika Pendidikan Terakhir hanya S1, maka untuk <b>Pendidikan Terakhir 2</b> cukup diisi dengan tanda strip (-).
        </td>
        </tr>

	<tr>
	<td>Pendidikan Terakhir 1</td><td>:</td><td><input class='input' name='pt1' type='text'> <span>Cth : S1 - Teknik Arsitektur</span></td>
	</tr>

	<tr>
	<td>Pendidikan Terakhir 2</td><td>:</td><td><input class='input' name='pt2' type='text'> <span>Cth : S2 - Perencanaan Wilayah dan Kota</span></td>
	</tr>

	<tr>
	<td>Foto</td><td>:</td><td><input name='fupload' type='file' /></td>
	</tr>
	
        <tr>
	<td>Status Kerja</td><td>:</td><td><select name='statkerja'>	
	<option value='' selected >Pilih Status Kerja</option>";
	$stat=mysql_query("select * from stat_kerja");
	while($s=mysql_fetch_array($stat)){
	echo "<option value='$s[id_statkerja]'  >$s[n_statkerja]</option>";
	}
	echo "</select></td>
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
	$ambil=mysql_query("select * from pegawai where nip='$_GET[id]'");
	$t=mysql_fetch_array($ambil);
	echo "<h2 class='head'>Edit Data Pegawai</h2>
	<form action='$aksi?module=pegawai&act=edit' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td>Nip</td><td>:</td><td><input name='nip' type='text' value='$t[nip]' readonly></td>
	</tr>
        <tr>
	<td>Nip Lama</td><td>:</td><td><input name='niplama' type='text' value='$t[niplama]' readonly></td>
	</tr>
	<tr>
	<td>Nama Pegawai</td><td>:</td><td><input class='input' name='nama' type='text' value='$t[nama]'></td>
	</tr>
	<tr>
	<td>Tempat Lahir</td><td>:</td><td><input class='input' name='tls' type='text' value='$t[tmpt_lahir]'></td>
	</tr>
	<tr>
	<tr>
	<td>Tanggal Lahir</td><td>:</td><td>"; 
	$tg=explode("-",$t['tgl_lahir']);
	$tl=$tg[0];
	$btl=$tg[1];
	$htl=$tg[2];
        $Y = date("Y");
	combotgl(1, 31, ttl, $htl);
	combonamabln(1,12,btl,$btl);
	combothn(1960, $Y, tl, $tl);
	echo "</td>
	</tr>
	
	<tr>
	<td>Jenis Kelamin</td><td>:</td><td>";
	echo "<input name='jk' type='radio' value='L'"; if($t['jenis_kelamin']=='L'){ echo "checked";} echo "/>Pria ";
	echo "<input name='jk' type='radio' value='P'"; if($t['jenis_kelamin']=='P'){ echo "checked";} echo "/>Wanita ";
	
	echo "</td></tr>
	
	<tr>
	<td>Alamat</td><td>:</td><td><textarea name='almt' >$t[alamat]</textarea></td>
	</tr>
	
	<tr>
	<td>Tanggal Masuk</td><td>:</td><td>";
	$ta=explode("-",$t['tgl_masuk']);
	$ttm=$ta[0];
	$btm=$ta[1];
	$htm=$ta[2];
	$now =  date("Y");
			$saiki = 1960;
	$ht="ht";
	$bt="bt";
	$tt="tt";
	combotgl(1, 31, $ht, $htm);
	combonamabln(1,12, $bt,$btm);
	combothn($saiki,$now, $tt,$ttm);
	
	echo "
	</td>
	</tr>
	
	<tr>
	<td>Golongan/Pangkat</td><td>:</td><td><select name='golpang'>
	<option value='' selected >Pilih Golongan/Pangkat</option>";
	$jab=mysql_query("select * from gol_ruang");
	while($j=mysql_fetch_array($jab)){
	if($t['id_gol_pangkat']==$j['id_gol_pangkat']){
	echo "<option value='$j[id_gol_pangkat]' selected='$t[id_gol_pangkat]'>$j[nm_gol_pangkat]</option>";
	} else {
	echo "<option value='$j[id_gol_pangkat]'>$j[nm_gol_pangkat]</option>";
	}
	}
	echo "</select></td>
	</tr>
        
	<tr>
	<td>Bagian</td><td>:</td><td><select name='bagian'>
	<option value='' selected >Pilih Bagian</option>";
	$jab=mysql_query("select * from bagian");
	while($j=mysql_fetch_array($jab)){
	if($t['id_bag']==$j['id_bag']){
	echo "<option value='$j[id_bag]' selected='$t[id_bag]'>$j[n_bag]</option>";
	} else {
	echo "<option value='$j[id_bag]'>$j[n_bag]</option>";
	}
	}
	echo "</select></td>
	</tr>
	
	<tr>
	<td>Jabatan</td><td>:</td><td><select name='jabatan'>	
	<option value='' selected >Pilih Jabatan</option>";
	$jab=mysql_query("select * from jabatan");
	while($j=mysql_fetch_array($jab)){
	if($t['id_jab']==$j['id_jab']){
	echo "<option value='$j[id_jab]' selected='$t[id_jab]'  >$j[n_jab]</option>";
	} else {
	echo "<option value='$j[id_jab]'>$j[n_jab]</option>";
	}
	}
	echo "</select></td>
	</tr>
        
        <tr>
        <td colspan='3'>
        Dalam pengisian pendidikan, jika pendidikan tertinggi adalah S3, maka pendidikan terakhir 1 diisi dengan pendidikan terakhir
        ketika S2. Dan pendidikan terakhir 2, 
        otomatis diisi dengan pendidikan ketika S3. Begitu demikian halnya dengan pendidikan yang lain.
        Jika Pendidikan Terakhir hanya S1, maka untuk <b>Pendidikan Terakhir 2</b> cukup diisi dengan tanda strip (-).
        </td>
        </tr>
        
	<tr>
	<td>Pendidikan Terakhir 1</td><td>:</td><td><input class='input' name='pt1' type='text' value='$t[pend_akhir_1]'> <span>Cth : S1 - Teknik Arsitektur</span></td>
	</tr>

	<tr>
	<td>Pendidikan Terakhir 2</td><td>:</td><td><input class='input' name='pt2' type='text' value='$t[pend_akhir_2]'> <span>Cth : S2 - Perencanaan Wilayah dan Kota</span></td>
	</tr>

	<tr>
	<td>Foto</td><td>:</td><td><img src='image_peg/small_$t[foto]' /></td>
	</tr>
	
	<tr>
	<td>Ganti Foto</td><td>:</td><td><input name='fupload' type='file' /></td>
	</tr>
	
        <tr>
	<td>Jabatan</td><td>:</td><td><select name='statkerja'>	
	<option value='' selected >Pilih Status Kerja</option>";
	$stat=mysql_query("select * from stat_kerja");
	while($s=mysql_fetch_array($stat)){
	if($t['id_statkerja']==$s['id_statkerja']){
	echo "<option value='$s[id_statkerja]' selected='$t[id_statkerja]'  >$s[n_statkerja]</option>";
	} else {
	echo "<option value='$s[id_statkerja]'>$s[n_statkerja]</option>";
	}
	}
	echo "</select></td>
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
	
	case "detail":
            $today=date('Y-m-d');
	$ambil=mysql_query("select * from pegawai where nip='$_GET[id]'");
	$t=mysql_fetch_array($ambil);
        
        $tgllahir = $t['tgl_lahir'];
        $query="SELECT datediff('$today', '$tgllahir')
	as selisih";
        $usia=mysql_query($query);
        $data = mysql_fetch_array($usia);
        $thn=floor($data['selisih']/365);
        $bln = floor(($data['selisih']-($thn*365))/30);
        
	echo "<h2 class='head'>Data Pegawai</h2>
	<div class='rp' >
	<div class='foto'>";
	if($t[foto]==""){
		echo "<img src='image_peg/no.jpg' width='150' height='200' />";
	} else {
	echo "<img src='image_peg/small_$t[foto]' width='150' height='200' />";
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
        <td>Usia</td><td>:</td><td>
        $thn tahun / $bln bulan
        </td>
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
	<td>Alamat</td><td>:</td><td>$t[alamat]</td>
	</tr>
	
	<tr>
	<td>Tanggal Masuk</td><td>:</td><td>";
	echo "".tgl_indo($t['tgl_masuk'])."";
	echo "
	</td>
	</tr>

        <tr>
        <td>Golongan/Pangkat</td><td>:</td><td>";
        $gol=mysql_query("select * from gol_ruang where id_gol_pangkat='$t[id_gol_pangkat]'");
        $g=mysql_fetch_array($gol);
        echo "$g[nm_gol_pangkat]";
        echo "</td>
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
        <td>Pendidikan Terakhir 1</td><td>:</td><td>$t[pend_akhir_1]</td>
        </tr>
        
        <tr>
        <td>Pendidikan Terakhir 2</td><td>:</td><td>$t[pend_akhir_2]</td>
        </tr>

        <tr>
	<td>Status Kerja</td><td>:</td><td>";
	$stat=mysql_query("select * from stat_kerja where id_statkerja='$t[id_statkerja]'");
	$s=mysql_fetch_array($stat);
	echo "$s[n_statkerja]";
	echo "</td>
	</tr>
        

            
	<tr>
	<td colspan='5'>[<a class='btn btn-link' href='?module=pegawai&act=edit&id=$t[nip]'> Edit Profil </a>]</td>
	</tr>
	
	</table>
	<div style='clear:both'></div>
       

	<h2 class='head'>Riwayat Angka Kredit</h2>
	<table class='tabel'>
	<thead>
	<tr>
	<td>Nomor PAK</td>
	<td>Tanggal PAK</td>
        <td>Angka Kredit</td>
        <td>Peringatan</td>
        <td>Control</td>
	</tr>
	</thead>";
	$nip=$_SESSION['namauser'];
	$ri=mysql_query("select *,DATE_ADD(tgl_pak,INTERVAL 3 YEAR) as tgl_peringatan from h_ak where nip='$_GET[id]' order by idh_ak ASC");
	if(mysql_num_rows($ri)==0){
	echo "<tr>
	<td colspan='5'>*Tidak Ada Data*</td>
	</tr>";
	} else {
	while($p=mysql_fetch_array($ri)){
	echo "
	<tr>
	<td>$p[no_pak]</td>
	<td>". tgl_indo($p['tgl_pak'])."</td>
        <td>$p[angka_kredit]</td>
        <td>". tgl_indo($p['tgl_peringatan'])."</td>
        <td><span><a class='btn btn-success' href='?module=pegawai&act=rakedit&id=$p[idh_ak]'><i class='icon-edit'></i></a></span>
                <span><a class='btn btn-danger' href='$aksi?module=pegawai&act=rakdel&id=$p[idh_ak]&nip=$p[nip]'><i class='icon-trash'></i></a></span</td>
	</tr>";
	}
	}
	echo "
	<tr><td colspan='5'><a class='btn btn-primary' href='?module=pegawai&act=rak&id=$_GET[id]'><i class='icon-plus'></i> Tambah Data</a></td></td>
	</table>
	</div>
	
	
	<div class='rp2'>
	<h2 class='head'>Riwayat Jabatan Fungsional</h2>
	<table class='tabel'>	
	<thead>
	<tr>
		<td>Jabatan Fungsional</td>
		<td>Nomor SK</td>
		<td>Tanggal SK</td>
		<td>TMT Jabatan</td>
		<td>Angka Kredit</td>
        <td>Control</td>
	</tr>	
	</thead>";
	$nip=$_SESSION['namauser'];
	$ri=mysql_query("select * from h_jabatan where nip='$_GET[id]' order by id_jbt ASC");
	if(mysql_num_rows($ri)==0){
	echo "<tr>
	<td colspan='6'>*Tidak Ada Data*</td>
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
        <td><span><a class='btn btn-success' href='?module=pegawai&act=pkedit&id=$p[id_jbt]'><i class='icon-edit'></i></a></span> 
	<span><a class='btn btn-danger' href='$aksi?module=pegawai&act=pkdel&id=$p[id_jbt]&nip=$p[nip]'><i class='icon-trash'></i></a></td></span>
	</tr>";
	}
	}
	echo "
	<tr><td colspan='6'><a class='btn btn-primary' href='?module=pegawai&act=pk&id=$_GET[id]'><i class='icon-plus'></i> Tambah Data</a></td></tr>
	</table>
	</div>
        
        <div style='clear:both'></div>
	";	
	break;
	
	case "rak":
	echo "<h2 class='head'>TAMBAH RIWAYAT ANGKA KREDIT</h2>
	<form action='$aksi?module=pegawai&act=rak' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td><input name='nip' type='hidden' value='$_GET[id]' readonly></td>
	</tr>
	<tr>
	<td>Nomor PAK</td><td>:</td><td><input class='input' name='nopak' type='text'></td>
	</tr>
	<tr>
	<td>Tanggal PAK</td><td>:</td><td>
        	<select name='hpak'>
                <option value='none' selected='selected'>Tgl*</option>";
			for($h=1; $h<=31; $h++) 
			{ 
				echo"<option value=",$h,">",$h,"</option>";
			} 
	echo"</select>
	<select name='bpak'>
            	<option value='none' selected='selected'>Bulan*</option>
				<option value='1'>Januari</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>Desember</option>
			</select>
	<select name='tpak'>
            <option value='none' selected='selected'>Tahun*</option>";
			$now =  date("Y");
			$saiki = 1970;
			for($l=$saiki; $l<=$now; $l++)
			{
				echo"<option value=",$l,">",$l,"</option>";
			}	
	echo "</select>
        </td>
        </tr>
        <tr>
        <td>Angka Kredit</td><td>:</td><td><input class='input' name='ak' type='text'></td>
        </tr>
	<tr>
	<td></td><td></td><td><input type=submit class='btn btn-primary' value=Simpan>
	<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
	break;
	
	case "rakedit":
	$edit=mysql_query("select * from h_ak where idh_ak='$_GET[id]' ");
	$e=mysql_fetch_array($edit);
	echo "<h2 class='head'>EDIT RIWAYAT ANGKA KREDIT</h2>
	<form action='$aksi?module=pegawai&act=rakedit' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td>
	<input name='nip' type='hidden' value='$e[nip]' readonly>
	<input name='idh_ak' type='hidden' value='$_GET[id]' readonly></td>
	</tr>
	<tr>
	<td>Nomor PAK</td><td>:</td><td><input class='input' name='nopak' type='text' value='$e[no_pak]'></td>
	</tr>
	<tr>
	<td>Tanggal PAK</td><td>:</td><td>";
        $trak= explode("-",$e['tgl_pak']);
        $tak=$trak[0]; //tahun angka kredit;
        $bak=$trak[1]; // bulan angka kredit;
        $hak=$trak[2]; // hari angka kredit;
        $now=date("Y");
        $saiki=1970;
        
        $hk="hk";
        $bk="bk";
        $tk="tk";
        
        combotgl(1, 31, $hk, $hak);
        combonamabln(1, 12, $bk, $bak);
        combothn($saiki, $now, $tk, $tak);
        
        echo "</td>
	</tr>
        <td>Angka Kredit</td><td>:</td><td><input class='input' name='ak' type='text' value='$e[angka_kredit]'></td>
        <tr>
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
	
	case "pk":
	echo "<h2 class='head'>TAMBAH DATA RIWAYAT JABATAN FUNGSIONAL</h2>
	<form action='$aksi?module=pegawai&act=pk' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td><input name='nip' type='hidden' value='$_GET[id]' readonly></td>
	</tr>
	<tr>
	<td>Jabatan Fungsional</td><td>:</td><td>
        <select name='jab'>
        <option value='' selected>Pilih Jabatan</option>";
            $jab=mysql_query("select * from jabatan");
            while($j=mysql_fetch_array($jab)){
                echo "<option value='$j[id_jab]'  >$j[n_jab]</option>";
            }
        echo "</select>
        </td>
	</tr>
	<tr>
		<td>Nomor SK</td><td>:</td><td>
			<input class='input' name='nosk_jafung' type='text'>
		</td>
	</tr>
	<tr>
		<td>Tanggal SK</td><td>:</td><td>
			<select name='hnosk'>
				<option value='none' selected='selected'>Tgl*</option>";
					for ($h=1; $h<=31; $h++) { 
						# code...
						echo"<option value=",$h,">",$h,"</option>";
					}
		echo "		
			</select>
			<select name='bnosk'>
				<option value='none' selected='selected'>Bulan*</option>
				<option value='1'>Januari</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>Desember</option>
			</select>
			<select name='tnosk'>
				<option value='none' selected='selected'>Tahun*</option>";
				$now =  date("Y");
				$saiki = 1970;
				for($l=$saiki; $l<=$now; $l++)
					{
						echo"<option value=",$l,">",$l,"</option>";
					}	
		echo "		
			</select>
		</td>
	</tr>
	<tr>
	<td>TMT Jabatan</td><td>:</td><td>
        	<select name='hjab'>
                <option value='none' selected='selected'>Tgl*</option>";
			for($h=1; $h<=31; $h++) 
			{ 
				echo"<option value=",$h,">",$h,"</option>";
			} 
	echo"</select>
	<select name='bjab'>
            	<option value='none' selected='selected'>Bulan*</option>
				<option value='1'>Januari</option>
				<option value='2'>Februari</option>
				<option value='3'>Maret</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>Juni</option>
				<option value='7'>Juli</option>
				<option value='8'>Agustus</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>Desember</option>
			</select>
	<select name='tjab'>
            <option value='none' selected='selected'>Tahun*</option>";
			$now =  date("Y");
			$saiki = 1970;
			for($l=$saiki; $l<=$now; $l++)
			{
				echo"<option value=",$l,">",$l,"</option>";
			}	
	echo "</select>        
        </td>
	</tr>
	<tr>
		<td>Angka Kredit</td><td>:</td><td>
			<input class='input' name='ak_jafung' type='text'>
		</td>
	</tr>
	<tr>
	<td></td><td></td><td><input type=submit class='btn btn-primary' value=Simpan>
	<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
	break;
	
	case "pkedit":
	$edit=mysql_query("select * from h_jabatan where id_jbt='$_GET[id]' ");
	$e=mysql_fetch_array($edit);
	echo "<h2 class='head'>EDIT DATA RIWAYAT JABATAN FUNGSIONAL</h2>
	<form action='$aksi?module=pegawai&act=pkedit' method='post' enctype='multipart/form-data' >
	<table class='tabelform tabpad'>
	<tr>
	<td></td><td></td><td><input name='nip' type='hidden' value='$e[nip]' readonly>
	<input name='id_jbt' type='hidden' value='$_GET[id]' readonly></td>
	</tr>
	<tr>
	<td>Jabatan Fungsional</td><td>:</td><td>
        <select name='jab'>
        <option value='' selected>Pilih Jabatan</option>";
        $jab=mysql_query("select * from jabatan");
        while($j=mysql_fetch_array($jab)){
            if($e['id_jab']==$j['id_jab']){
                echo "<option value='$j[id_jab]' selected='$e[id_jab]' >$j[n_jab]</option>";
            } else {
                echo "<option value='$j[id_jab]'>$j[n_jab]</option>";
            }
        }
        echo "</select>
        </td>
	</tr>
	<tr>
		<td>Nomor SK</td><td>:</td><td>
			<input class='input' name='nosk_jafung' type='text' value='$e[no_sk]'>
		</td>
	</tr>
	<tr>
		<td>Tanggal SK</td><td>:</td><td>";
			$tesk= explode("-", $e['tgl_sk']);
			$t_sk=$tesk[0];
			$b_sk=$tesk[1];
			$h_sk=$tesk[2];
			$now = date("Y");
			$today=1970;

			$hk="hk";
			$bk="bk";
			$tk="tk";

			combotgl(1, 31, $hk, $h_sk);
			combonamabln(1, 12, $bk, $b_sk);
			combothn($today, $now, $tk, $t_sk);
	echo"		
		</td>
	</tr>
	<tr>
	<td>TMT Jabatan</td><td>:</td><td>";
        $tejab= explode("-",$e['tmt_jab']);
        $t_ja=$tejab[0]; //tahun TMT Jabatan
        $b_ja=$tejab[1]; // bulan TMT Jabatan;
        $h_ja=$tejab[2]; // hari TMT Jabatan;
        $now=date("Y");
        $saiki=1970;
        
        $hk="hk";
        $bk="bk";
        $tk="tk";
        
        combotgl(1, 31, $hk, $h_ja);
        combonamabln(1, 12, $bk, $b_ja);
        combothn($saiki, $now, $tk, $t_ja);   
        
        echo "</td>
	</tr>
	<tr>
		<td>Angka Kredit</td><td>:</td><td>
			<input class='input' name='ak_jafung' type='text' value='$e[jab_ak]'>
		</td>
	</tr>
	<tr>
	<td></td><td></td><td><input type=submit class='btn btn-primary' value=Simpan>
	<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>
	";
	break;
	

}


?>