<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM siswa WHERE idsiswa='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='siswadaftar.php';</script>";
