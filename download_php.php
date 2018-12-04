<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 


 
header("Content-Type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=pejebat-fungsional ".date('dmY').".xls");

include './laporan_pegawai.php';
?>
