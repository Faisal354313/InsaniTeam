<?php include 'header.php'; ?>
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Login</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Login</h6>
            <h1 class="mb-5">LOGIN</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-6 col-md-6 wow fadeInUp my-auto" data-wow-delay="0.3s">
                <img style="height:350px;" src="foto/flatlogin.png">
            </div>
            <div class="col-lg-6 col-md-12 wow fadeInUp my-auto" data-wow-delay="0.5s">
                <form action="" method="post">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="gname">Email</label>
                                <input type="text" name="email" value="" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cname">Password</label>
                                <input type="password" name="password" value="" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-12">
                            <button style="background-color: #0624cc;" class="btn btn w-100 py-3 text-white" type="submit" name="login" value="login">Masuk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php
if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ambil = $koneksi->query("SELECT * FROM pengguna
      WHERE email='$email' AND password='$password'");
    $akunyangcocok = $ambil->num_rows;
    if ($akunyangcocok >= 1) {
        $akun = $ambil->fetch_assoc();
        $_SESSION["pengguna"] = $akun;
        echo "<script> alert('Login Berhasil');</script>";
        echo "<script> location ='index.php';</script>";
    } else {
        $ambilsiswa = $koneksi->query("SELECT * FROM siswa
      WHERE email='$email' AND password='$password'");
        $datasiswa = $ambilsiswa->num_rows;
        if ($datasiswa >= 1) {
            $akunsiswa = $ambilsiswa->fetch_assoc();
            $_SESSION["pengguna"] = $akunsiswa;
            echo "<script> alert('Login Berhasil');</script>";
            echo "<script> location ='index.php';</script>";
        } else {
            echo "<script> alert('Email atau Password anda salah');</script>";
            echo "<script> location ='index.php';</script>";
        }
    }
}
?>
<?php
include 'footer.php';
?>