<?php include 'header.php'; ?>
<!-- Header Start -->
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Daftar</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Daftar</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Daftar</h6>
            <h1 class="mb-5">DAFTAR</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-12 col-md-12 wow fadeInUp my-auto" data-wow-delay="0.5s">
                <form enctype="multipart/form-data" method="post">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="mb-2">Nama </label>
                            <div class="form-group">
                                <input type="text" name="nama" placeholder="Nama Siswa" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-2">Email</label>
                            <div class="form-group">
                                <input type="text" name="email" placeholder="Email" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-2">Password</label>
                            <div class="form-group">
                                <input type="text" name="password" placeholder="Password Siswa" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-2">Jenis Kelamin</label>
                            <div class="form-group">
                                <select class="form-control" name="jeniskelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki - Laki">Laki - Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-2">Asal Sekolah</label>
                            <div class="form-group">
                                <input type="text" name="asalsekolah" placeholder="Asal Sekolah" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-2">Tempat Lahir</label>
                            <div class="form-group">
                                <input type="text" name="tempatlahir" value="" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-2">Tanggal Lahir</label>
                            <div class="form-group">
                                <input type="date" name="tanggallahir" value="" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-2">Alamat</label>
                            <div class="form-group">
                                <textarea class="form-control" name="alamat" id="alamat" rows="10"></textarea>
                                <script>
                                    CKEDITOR.replace('isi');
                                </script>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="mb-2">Foto Siswa (JPG, JPEG, PNG)</label>
                            <div class="form-group">
                                <input type="file" nname="foto" class="form-control">
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
      WHERE email='$email'");
    $akunyangcocok = $ambil->num_rows;
    if ($akunyangcocok >= 1) {
        $akun = $ambil->fetch_assoc();
        $_SESSION["pengguna"] = $akun;
        echo "<script> alert('Akun dengan email ini sudah terdaftar, mohon gunakan email lainnya');</script>";
    } else {
        $lokasifoto = $_FILES['foto']['tmp_name'];
        if (!empty($lokasifile)) {
            $namafoto = $_FILES['foto']['name'];
            move_uploaded_file($lokasifoto, "foto/" . $namafoto);
        } else {
            $namafoto = "default.png";
        }
        $koneksi->query("INSERT INTO siswa
            (nama,email,password,jeniskelamin,tempatlahir,tanggallahir,alamat,asalsekolah,foto,level)
            VALUES('$_POST[nama]','$_POST[email]','$_POST[password]','$_POST[jeniskelamin]','$_POST[tempatlahir]','$_POST[tanggallahir]','$_POST[alamat]','$_POST[asalsekolah]','$namafoto','Siswa')") or die(mysqli_error($koneksi));
        echo "<script> alert('Daftar Berhasil, SIlahkan Login');</script>";
        echo "<script> location ='login.php';</script>";
    }
}
?>
<?php
include 'footer.php';
?>