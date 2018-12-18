<?php 
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/class_paging.php";
include "../../config/kode_auto.php";
include "../../config/fungsi_thumb.php";

$module=$_GET['module'];
$act=$_GET['act'];

if($module=='pegawai' AND $act=='hapus' ){ 
	mysql_query("delete from pegawai where nip='$_GET[id]'");
	header('location:../../media.php?module='.$module);
}

if($module=='pegawai' AND $act=='input' ){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;
	if (!empty($lokasi_file)){  
	$tll="$_POST[tahun]-$_POST[bulan]-$_POST[hari]";
	$tmt_golpang="$_POST[tm]-$_POST[bm]-$_POST[hm]";
	Uploadfoto($nama_file_unik);
	mysql_query("insert into pegawai set nip='$_POST[nip]',
                                                                niplama='$_POST[niplama]',
										 nama='$_POST[nama]',
										 tmpt_lahir='$_POST[tls]',
										 tgl_lahir='$tll',
										 jenis_kelamin='$_POST[jk]',
																id_gol_pangkat='$_POST[golpang]',
																tmt_gol_pangkat='$tmt_golpang',
										 id_bag='$_POST[bagian]',
										 id_jab='$_POST[jabatan]',
                                                                pend_akhir_1='$_POST[pt1]',
                                                                pend_akhir_2='$_POST[pt2]',
										 foto='$nama_file_unik',
                                                                id_statkerja='$_POST[statkerja]'
										 ");
	
	header('location:../../media.php?module='.$module);
	} else {
	$tll="$_POST[tahun]-$_POST[bulan]-$_POST[hari]";
	$tmt_golpang="$_POST[tm]-$_POST[bm]-$_POST[hm]";
	mysql_query("insert into pegawai set nip='$_POST[nip]',
                                                                niplama='$_POST[niplama]',
										 nama='$_POST[nama]',
										 tmpt_lahir='$_POST[tls]',
										 tgl_lahir='$tll',
										 jenis_kelamin='$_POST[jk]',
																id_gol_pangkat='$_POST[golpang]',
																tmt_gol_pangkat='$tmt_golpang',
										 id_bag='$_POST[bagian]',
										 id_jab='$_POST[jabatan]',
                                                                pend_akhir_1='$_POST[pt1]',
                                                                pend_akhir_2='$_POST[pt2]',
                                                                id_statkerja='$_POST[statkerja]'
										 ");
	
	header('location:../../media.php?module='.$module);
	}
}

elseif($module=='pegawai' AND $act=='edit' ){
  $lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(000000,999999);
  $nama_file_unik = $acak.$nama_file;
	if (!empty($lokasi_file)){  
	$tll="$_POST[tl]-$_POST[btl]-$_POST[htl]";
	$tmt_golpang="$_POST[tt]-$_POST[bt]-$_POST[ht]";
	Uploadfoto($nama_file_unik);
	mysql_query("update pegawai set 	 nama='$_POST[nama]',
										 tmpt_lahir='$_POST[tls]',
										 tgl_lahir='$tll',
										 jenis_kelamin='$_POST[jk]',
										 id_gol_pangkat='$_POST[golpang]',
																tmt_gol_pangkat='$tmt_golpang',
										 id_bag='$_POST[bagian]',
										 id_jab='$_POST[jabatan]',
                                                                pend_akhir_1='$_POST[pt1]',
                                                                pend_akhir_2='$_POST[pt2]',
										 foto='$nama_file_unik',
                                                                id_statkerja='$_POST[statkerja]'
										 where nip='$_POST[nip]' and niplama='$_POST[niplama]'");
	
	header('location:../../media.php?module=pegawai&act=detail&id='.$_POST['nip']);
	} else {
	$tll="$_POST[tl]-$_POST[btl]-$_POST[ttl]";
	$tmt_golpang="$_POST[tt]-$_POST[bt]-$_POST[ht]";
	mysql_query("update pegawai set 	 nama='$_POST[nama]',
										 tmpt_lahir='$_POST[tls]',
										 tgl_lahir='$tll',
										 jenis_kelamin='$_POST[jk]',
																	id_gol_pangkat='$_POST[golpang]',
																	tmt_gol_pangkat='$tmt_golpang',
										 id_bag='$_POST[bagian]',
										 id_jab='$_POST[jabatan]',
                                                                    pend_akhir_1='$_POST[pt1]',
                                                                    pend_akhir_2='$_POST[pt2]',
                                                                    id_statkerja='$_POST[statkerja]'
										 where nip='$_POST[nip]' and niplama='$_POST[niplama]'");
	header('location:../../media.php?module=pegawai&act=detail&id='.$_POST['nip']);
	}
}

elseif($module=='pegawai' AND $act=='hapus' ){
	mysql_query("delete from pegawai where nip = '$_GET[id]'");
	header('location:../../media.php?module='.$module);
}

elseif($module=='pegawai' AND $act=='rak' ){
        $tgl_ak="$_POST[tpak]-$_POST[bpak]-$_POST[hpak]";
        mysql_query("insert into h_ak set nip='$_POST[nip]', no_pak='$_POST[nopak]', tgl_pak='$tgl_ak', angka_kredit='$_POST[ak]'");
        header('location:../../media.php?module=pegawai&act=detail&id='.$_POST['nip']);
}

elseif($module=='pegawai' AND $act=='rakedit' ){      
        $etgl_ak="$_POST[tk]-$_POST[bk]-$_POST[hk]";
        mysql_query("update h_ak set no_pak='$_POST[nopak]', tgl_pak='$etgl_ak', angka_kredit='$_POST[ak]' where idh_ak='$_POST[idh_ak]'");
        header('location:../../media.php?module=pegawai&act=detail&id='.$_POST['nip']);
}

elseif($module=='pegawai' AND $act=='rakdel' ){
	mysql_query("delete from h_ak where idh_ak = '$_GET[id]'");
	header('location:../../media.php?module=pegawai&act=detail&id='.$_GET['nip']);
}


elseif($module=='pegawai' AND $act=='pk' ){
        $tgl_jab="$_POST[tjab]-$_POST[bjab]-$_POST[hjab]";
        $tgl_sk="$_POST[tnosk]-$_POST[bnosk]-$_POST[hnosk]";

        mysql_query("insert into h_jabatan set nip='$_POST[nip]', id_jab='$_POST[jab]', no_sk='$_POST[nosk_jafung]', tgl_sk='$tgl_sk', tmt_jab='$tgl_jab', jab_ak='$_POST[ak_jafung]'");
        header('location:../../media.php?module=pegawai&act=detail&id='.$_POST['nip']);
}

elseif($module=='pegawai' AND $act=='pkedit' ){
        $etgl_jab="$_POST[tk]-$_POST[bk]-$_POST[hk]";
        $tgl_sk="$_POST[tk]-$_POST[bk]-$_POST[hk]";

        mysql_query("update h_jabatan set id_jab='$_POST[jab]', no_sk='$_POST[nosk_jafung]', tgl_sk='$tgl_sk', tmt_jab='$etgl_jab', jab_ak='$_POST[ak_jafung]' where id_jbt='$_POST[id_jbt]'");
        header('location:../../media.php?module=pegawai&act=detail&id='.$_POST['nip']);
}

elseif($module=='pegawai' AND $act=='pkdel' ){
	mysql_query("delete from h_jabatan where id_jbt='$_GET[id]'");
	header('location:../../media.php?module=pegawai&act=detail&id='.$_GET['nip']);
}


?>