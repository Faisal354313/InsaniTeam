<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM jawaban WHERE idjawaban='$_GET[id]'");
$koneksi->query("DELETE FROM jawabandetail WHERE idjawaban='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='latihanpenjawab.php?id=$_GET[idkuis]';</script>";
