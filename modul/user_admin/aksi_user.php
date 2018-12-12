<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
include "../../config/class_paging.php";
include "../../config/kode_auto.php";

$module=$_GET['module'];
$act=$_GET['act'];

if($module=='user_admin' AND $act=='input' ){
        mysql_query("insert into user set userid='$_POST[userID]', passid='$_POST[passID]', level_user='$_POST[levID]'");
        echo "<script>
                alert('Data user dan password berhasil diinput');history.go(-2);
        </script>
        ";
} 

elseif ($module=='user_admin' AND $act=='edit' ) {
        mysql_query("update user set passid='$_POST[passID]', level_user='$_POST[levID]' where userid='$_POST[userID]'");
        header('location:../../media.php?module='.$module);
}

 elseif ($module=='user_admin' AND $act=='hapus' ) {
    mysql_query("delete from user where userid='$_GET[userID]'");
    header('location:../../media.php?module='.$module);
}
?>
