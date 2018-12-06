<?php
include "config/koneksi.php";

include "config/fungsi_indotgl.php";
include "config/class_paging.php";
include "config/kode_auto.php";
include "config/fungsi_combobox.php";
include "config/fungsi_nip.php";

	if ($_SESSION['leveluser']=='3'){
		if($_GET['module']=="home"){
                    echo "<div class='home'>
            <h4><p>Hai <i>$_SESSION[namauser]</i>...</h4>
                Selamat Datang di Halaman Administrator Sistem Informasi Jabatan Fungsional
                <br>
                <div>
                
                </div>
            </div>";
		} elseif ($_GET['module']=="pegawai") {
                    include "modul/pegawai/pegawai.php";
                }
	}
	
if ($_SESSION['leveluser']=='1'){
	if($_GET['module']=="home"){
            
            $sql        = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.3' AND id_statkerja='1'");
            $jafung     = mysql_fetch_array($sql);
            
            $sql1       = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.4' AND id_statkerja='1'");
            $jafung1    = mysql_fetch_array($sql1);
            
            $sql2       = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.5' AND id_statkerja='1'");
            $jafung2    = mysql_fetch_array($sql2);
            
            $sql3        = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.3' AND id_statkerja='2'");
            $bebas     = mysql_fetch_array($sql3);
            
            $sql4        = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.4' AND id_statkerja='2'");
            $bebas1     = mysql_fetch_array($sql4);
            
            $sql5        = mysql_query("SELECT COUNT(id_jab) AS jafung FROM pegawai WHERE id_jab='07.5' AND id_statkerja='2'");
            $bebas2     = mysql_fetch_array($sql5);
                        
            echo "
                <div class='row'>
                    <div class='col-md-10' style='padding:40px; padding-left: 30px;'>
                        <div class='box box-solid box-primary'>
                            <div class='box-body'>
                                <div class='chart'>
                                    <div id='pegawai'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ";
	}
	
	else if($_GET['module']=="bagian"){
	include "modul/bagian/bagian.php";
	}

	else if($_GET['module']=="jabatan"){
	include "modul/jabatan/jabatan.php";
	}

	else if($_GET['module']=="pegawai"){
	include "modul/pegawai/pegawai.php";
	}
        
	else if($_GET['module']=="user_admin"){
	include "modul/user_admin/user_admin.php";
	}
	
 }
 
?>