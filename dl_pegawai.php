<?php
    include 'koneksi.php';
    $ambil=mysql_query("select * from pegawai where nip='$_GET[id]'");
    $t=mysql_fetch_array($ambil);
?>
<h2 class="head">Data Pegawai</h2>
<div class="rp">
    <div class="foto">
        <?php
        if ($t[foto]=="") {
            echo "<img src='image_peg/no.jpg' width='200' height='240'/>";
        } else {
            echo "<img src='image_peg/small_$t[foto]' width='200' height='240' />";
        }
        ?>
    </div>
    <table class="tabelform tabpad">
        <tr>
            <td>NIP</td><td>:</td><td><?php $t[nip]; ?></td>
        </tr>
        <tr>
            <td>Nama Pegawai</td><td>:</td><td><?php $t[nama]; ?></td>
        </tr>
        <tr>
            <td>Tempat Lahir</td><td>:</td><td><?php $t[tmpt_lahir]; ?></td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td><td>:</td><td>
                <?php 
                        tgl_indo($t[tgl_lahir]);
                ?>
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td><td>:</td><td>
                <?php 
                if ($t[jenis_kelamin]=='L') {
                    echo 'Pria';
                } else {
                    echo 'Wanita';
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>Alamat</td><td>:</td><td><?php $t[alamat]; ?></td>
        </tr>
        <tr>
            <td>Tanggal Masuk</td><td>:</td><td>
                <?php tgl_indo($t[tgl_masuk]); ?>
            </td>
        </tr>
           
        <tr>
            <?php 
                $bag = mysql_query("SELECT * FROM bagian WHERE id_bag='$t[id_bag]'");
                $b = mysql_fetch_array($bag);
                ?>
            <td>Bagian</td><td>:</td><td>
                <?php $b[n_bag]; ?>
            </td>
        </tr>
        <tr>
            <?php 
                $jab = mysql_query("SELECT * FROM jabatan WHERE id_jab='$t[id_jab]'");
                $j = mysql_fetch_array($jab);
                ?>
            <td>Bagian</td><td>:</td><td>
                <?php $j[n_jab]; ?>
            </td>
        </tr>
        <tr>
            <td colspan="3">[ <a href="?module=pegawai&act=edit&id=<?php $t[nip] ?>">Edit Profil</a> ] | [ <a href="?module=pegawai&act=pwd&id=<?php $t[nip] ?>">Ganti Password</a> ]</td>
        </tr>
    </table>
    <div style="clear: both">
        <h2 class="head">Riwayat Pendidikan</h2>
        <table class="tabel">
            <thead>
            <td>Tahun</td>
            <td>Riwayat Pendidikan</td>
            </thead>
            <?php
               $nip = $_SESSION['namauser'];
               $ri = mysql_query("SELECT * FROM pendidikan WHERE nip='$_GET[id]' ORDER BY idp ASC");
               if (mysql_num_rows($ri)) {
                   ?>
            <tr>
                <td colspan="2">*Tidak Ada Data*</td>
            </tr>
                   <?php 
               } else {
                   while ($p = mysql_fetch_array($ri)) {
                       ?>
            <tr>
                <td><?php $p[t_pdk]; ?></td>
                <td><?php $p[d_pdk]; ?> [ <a href="?module=pegawai&act=rpedit&id=<?php $p[idp]; ?>">Edit</a> ] | [ <a href="$aksi?module=pegawai&act=rpdel&id=<?php $p[idp]; ?>&nip=<?php $p[nip]; ?>">Hapus</a> ]</td>
            </tr>
                       <?php
                   }
               }
            ?>
            <tr><td colspan="2"><a href="?module=pegawai&act=rp&id=<?php $_GET[id] ?>">Tambah Data</a></td></tr>
        </table>
    </div>
</div>
<div class="rp2">
    <h2 class="head">Pengalaman Kerja</h2>
    <table class="tabel">
        <thead>
            <tr>
                <td>Nama Pekerjaan</td>
                <td>Detail Pekerjaan</td>
            </tr>
        </thead>
        <?php
        $nip = $_SESSION['namauser'];
        $ri = mysql_query("SELECT * FROM pengalaman_kerja WHERE nip='$_GET[id]' ORDER BY id_peker ASC");
        if (mysql_num_rows($ri)==0) {
            ?>
        <tr>
            <td colspan="2">*Tidak Ada Data*</td>
        </tr>
                <?php
        } else {
            while ($p = mysql_fetch_array($ri)) {
                ?>
        <tr>
            <td><?php $p[nm_pekerjaan]; ?></td>
            <td><?php $p[d_pekerjaan]; ?> [<a href="?module=pegawai&act=pkedit&id=<?php $p[id_peker]; ?>" >Edit</a>|<a href="$aksi?module=pegawai&act=pkdel&id=<?php $p[id_peker]; ?>&nip=<?php $p[nip]; ?>">Hapus</a>]</td>
        </tr>
                    <?php
            }
        }
        ?>
        <tr>
            <td colspan="2"><a href="?module=pegawai&act=pk&id=<?php $_GET[id]; ?>"></a></td>
        </tr>
    </table>
</div>