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
            echo "
                <div class='row'>
                    <div class='col-md-12' style='padding:40px;'>
                        <div class='box box-solid box-primary'>
                            <div class='box-body'>
                                <div class='chart'>
                                    <div id='pegawainon'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-12' style='padding:40px;'>
                        <div class='box box-solid box-primary'>
                            <div class='box-body'>
                                <div class='chart'>
                                    <div id='pegawaipu'></div>
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