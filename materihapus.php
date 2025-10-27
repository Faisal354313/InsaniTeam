<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM materi WHERE idmateri='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='materidaftar.php';</script>";
