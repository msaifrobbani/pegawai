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
                <canvas id='myChart' width='800' height='600'></canvas>
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
                    <div class='col-md-6'>
                        <div class='box box-solid box-primary'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'>Jumlah Pegawai Berdasarkan Jabatan Fungsional</h3>
                            </div>
                        
                            <div class='box-body'>
                                <div class='chart'>
                                    <canvas id='myChart' style='height:500px'></canvas>
                                </div>
                            </div>
                        </div>
                            <table class='tabel'>
                                <thead>
                                    <tr>
                                    <td>Jafung</td>
                                    <td>Analis Kepeg Penyelia</td>
                                    <td>Analis Kepeg Pertama</td>
                                    <td>Analis Kepeg Muda</td>
                                    </tr>
                                </thead>
                                <tr>
                                    <td>Aktif</td>
                                    <td>$jafung[jafung]</td>
                                    <td>$jafung1[jafung]</td>
                                    <td>$jafung2[jafung]</td>
                                </tr>
                                <tr>
                                    <td>Bebas Sementara</td>
                                    <td>$bebas[jafung]</td>
                                    <td>$bebas1[jafung]</td>
                                    <td>$bebas2[jafung]</td>
                                </tr>
                            </table> <br>
                            
                        <div class='box box-solid box-primary'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'>Jumlah Pegawai Berdasarkan Jabatan Fungsional 2</h3>
                            </div>
                        
                            <div class='box-body'>
                                <div class='chart'>
                                    <canvas id='myChart' style='height:500px'></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-6'>
                        <div class='box box-solid box-success'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'>Jumlah Pegawai Berdasarkan Jabatan Fungsional</h3>
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