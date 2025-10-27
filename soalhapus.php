<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM soal WHERE idsoal='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='latihanedit.php?id=$_GET[idkuis]';</script>";
