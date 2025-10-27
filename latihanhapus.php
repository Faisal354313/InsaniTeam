<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM kuis WHERE idkuis='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='latihandaftar.php';</script>";
