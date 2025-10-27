<?php
include 'koneksi.php';
session_start();
function tanggal($tgl)
{
  $tanggal = substr($tgl, 8, 2);
  $bulan = getBulan(substr($tgl, 5, 2));
  $tahun = substr($tgl, 0, 4);
  return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
  switch ($bln) {
    case 1:
      return "Januari";
      break;
    case 2:
      return "Februari";
      break;
    case 3:
      return "Maret";
      break;
    case 4:
      return "April";
      break;
    case 5:
      return "Mei";
      break;
    case 6:
      return "Juni";
      break;
    case 7:
      return "Juli";
      break;
    case 8:
      return "Agustus";
      break;
    case 9:
      return "September";
      break;
    case 10:
      return "Oktober";
      break;
    case 11:
      return "November";
      break;
    case 12:
      return "Desember";
      break;
  }
}
function wordlimiter($string, $limit)
{
  $word = explode(" ", $string);
  return implode(" ", array_splice($word, 0, $limit));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Insani</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="assets_home/lib/animate/animate.min.css" rel="stylesheet">
  <link href="assets_home/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="assets_home/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="assets_home/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <script src="assets/ckeditor/ckeditor.js"></script>
  <style>
    .form-group {
      margin-bottom: 10px;
    }
  </style>
  <!-- Tambahkan di <head> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

  <!-- Tambahkan sebelum </body> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <style>
    .futuristic-border {
      position: relative;
      padding: 2px;
      border-radius: 16px;
      background: linear-gradient(135deg, #00f2fe, #4facfe, #00f2fe);
      background-size: 300% 300%;
      animation: borderGlow 5s linear infinite;
    }

    .futuristic-border .single_blog {
      background-color: #fff;
      border-radius: 14px;
      padding: 15px;
      height: 100%;
    }

    @keyframes borderGlow {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    #chatbotModal {
      position: fixed;
      bottom: 20px;
      right: 90px;
      width: 350px;
      height: 500px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      z-index: 9999;
      overflow: hidden;
      display: none;
      flex-direction: column;
    }
  </style>
</head>

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- Spinner End -->
  <?php
  if (!empty($_SESSION["pengguna"])) {
    if ($_SESSION["pengguna"]['level'] == 'Admin') {
      $background = "(to right, #1a1393, #0463fa)";
    } else {
      $background = "(to right, #0d47a1, #1976d2)";
    }
  } else {
    $background = "(to right, #0d47a1, #1976d2)";
  }
  ?>

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg navbar-light shadow sticky-top p-0" style="background: linear-gradient<?= $background ?>">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
      <img style="height:60px;padding-right:7%;" src="foto/logo.png">
      <h2 class="m-0 text-white"> Insani</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto p-4 p-lg-0">
        <a href="index.php" class="nav-item nav-link text-white">Home</a>
        <?php
        if (!empty($_SESSION["pengguna"])) {
          if ($_SESSION["pengguna"]['level'] == 'Admin') {
        ?>
            <a href="siswadaftar.php" class="nav-item nav-link text-white">Siswa</a>
            <a href="materidaftar.php" class="nav-item nav-link text-white">Materi</a>
            <a href="videodaftar.php" class="nav-item nav-link text-white">Video</a>
            <a href="latihandaftar.php" class="nav-item nav-link text-white">Kuis</a>
          <?php
          } else { ?>
            <a href="materidaftar.php" class="nav-item nav-link text-white">Materi</a>
            <a href="videodaftar.php" class="nav-item nav-link text-white">Video</a>
            <a href="latihandaftar.php" class="nav-item nav-link text-white">Kuis</a>
          <?php }
        } else { ?>
        <?php } ?>
        <?php if (!isset($_SESSION["pengguna"])) { ?>
          <a href="daftar.php" class="nav-item nav-link text-white">Daftar</a>
          <a href="login.php" class="nav-item nav-link text-white">Login</a>
        <?php } else { ?>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown"><?= $_SESSION["pengguna"]['nama'] ?></a>
            <div class="dropdown-menu fade-down m-0">
              <a href="profil.php" class="dropdown-item">Profil</a>
              <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')" class="dropdown-item">Keluar</a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </nav>