<?php
include "config/koneksi.php";
include_once 'config/cek_sesi.php';

echo "<ul> 
        <li><a href=?module=home>Home</a></li>
		<li><a href=?module=guru>Data Guru</a></li>
		<li><a href=?module=sekolah>Data Sekolah</a></li>
		<li><a href=?module=jabatan>Jabatan</a></li>
		<li><a href=?module=golongan>Golongan</a></li>
		<li><a href=?module=pendidikan>Pendidikan</li>
		<li><a href=?module=mutasi>Mutasi Guru</li>
		<li><a href=?module=admin>Ubah Password</a></li>

</ul>";
 
?>
