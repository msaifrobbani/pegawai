<?php
$aksi = "modul/user_admin/aksi_user.php";

switch ($_GET[act]) {

	default:
		$tampil=mysql_query("select * from user order by userid DESC");
		echo "<h2 class='head'>DATA USER - ADMIN</h2>
		<div>
		<input class='btn btn-primary' type='button' value='Tambah Data' onclick=\"window.location.href='?module=user_admin&act=input';\">
		</div>
                <table class='tabel'>
                <thead>
                <tr>
                    <td>No</td>
                    <td>User ID</td>
                    <td>Password</td>
                    <td>Level</td>
                    <td>Control</td>
                </tr>
                </thead>";
                $no++;
                while ($dt=mysql_fetch_array($tampil)) {
                    echo "<tr>
                        <td>$no</td>
                        <td>$dt[userid]</td>
                        <td>$dt[passid]</td>
                        <td>$dt[level_user]</td>
                        <td>
                        <span><a class='btn btn-success' href='?module=user_admin&act=edit&userID=$dt[userid]'><i class='glyphicon glyphicon-edit'></i></a></span><span>
	<a class='btn btn-danger' href=\"$aksi?module=user_admin&act=hapus&userID=$dt[userid]\" onClick=\"return confirm('Apakah Anda benar-benar mau menghapusnya?')\"><i class='glyphicon glyphicon-trash'></i></a></span>
                        </td>
                    </tr>";
                    $no++;
                }
                echo "</table>
                ";
		break;
                
                case "input":
                    echo "<h2 class='head'>Entry User</h2>
                        <form action='$aksi?module=user_admin&act=input' method='post'>
                            <table class='tabelform tabpad'>
                            <tr>
                                <td>User ID</td><td>:</td><td><input class='input' name='userID' type='text'></td>
                            </tr>
                            <tr>
                                <td>Password</td><td>:</td><td><input class='input' name='passID' type='password'></td>
                            </tr>
                            <tr>
                                <td>Level User</td><td>:</td><td><input class='input' name='levID' type='text'><span> Diisi dengan angka dari 1-3</span></td>
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
	$edit=mysql_query("select * from user where userid='$_GET[userID]'");
	$data=mysql_fetch_array($edit);
	echo "<h2>Entry Data Unit Kerja</h2>
	<form action='$aksi?module=user_admin&act=edit' method='post'>
	<table class='tabelform tabpad'>
	<tr>
	<td>User ID</td><td>:</td><td><input class='input' name='userID' type='text' value='$data[userid]'></td>
	</tr>
	<tr>
	<td>Password</td><td>:</td><td><input class='input' name='passID' type='text' value='$data[passid]'></td>
	</tr>
        <tr>
            <td>Level User</td><td>:</td><td><input class='input' name='levID' type='text' value='$data[level_user]'><span> Diisi dengan angka dari 1-3</span></td>
        </tr>        
	<tr>
	<td></td><td></td><td><input class='btn btn-primary' type=submit value=Update>
	<input type=button class='btn btn-danger' value=Batal onclick=self.history.back()>
	</td>
	</tr>
	</table>
	</form>";
	break;
}
?>