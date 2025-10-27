<?php
include 'header.php';
if (!isset($_SESSION["pengguna"])) {
    echo "<script> alert('Harap login terlebih dahulu');</script>";
    echo "<script> location ='login.php';</script>";
}
if ($_SESSION["pengguna"]['level'] == 'Admin') {
    $id = $_SESSION["pengguna"]['id'];
    $ambil = $koneksi->query("SELECT *FROM pengguna WHERE id='$id'");
    $pecah = $ambil->fetch_assoc(); ?>
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Profil</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Profil</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Profil</h6>
                <h1 class="mb-5">Profil</h1>
            </div>
            <div class="row g-4">

                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="card">
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="post">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mb-2">Nama</label>
                                            <input type="text" name="nama" value="<?php echo $pecah['nama']; ?>" required class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mb-2">Email</label>
                                            <input type="email" name="email" value="<?php echo $pecah['email']; ?>" readonly class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mb-2">Telepon</label>
                                            <input value="<?php echo $pecah['telepon']; ?>" type="number" class="form-control" name="telepon">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mb-2">Alamat</label>
                                            <textarea value="<?php echo $pecah['alamat']; ?>" class="form-control" name="alamat" id="alamat" rows="10"><?php echo $pecah['alamat']; ?></textarea>
                                            <script>
                                                CKEDITOR.replace('alamat');
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mb-2">Password</label>
                                            <input type="text" class="form-control" name="password">
                                            <input type="hidden" class="form-control" name="passwordlama" value="<?php echo $pecah['password']; ?>">
                                            <span class="text-danger">Kosongkan Password jika tidak ingin mengganti</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary float-end py-2" type="submit" name="ubah">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
<?php } else {
    $id = $_SESSION["pengguna"]['idsiswa'];
    $ambil = $koneksi->query("SELECT *FROM siswa WHERE idsiswa='$id'");
    $data = $ambil->fetch_assoc(); ?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Profil</h6>
                <h1 class="mb-5">Profil</h1>
            </div>
            <div class="row g-4">

                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="card">
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="post">
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="mb-2">Nama</label>
                                        <div class="form-group">
                                            <input type="text" name="nama" value="<?= $data['nama'] ?>" placeholder="Nama Siswa" required class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-2">Email</label>
                                        <div class="form-group">
                                            <input type="text" name="email" value="<?= $data['email'] ?>" placeholder="Email" readonly class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-2">Jenis Kelamin</label>
                                        <div class="form-group">
                                            <select class="form-control" name="jeniskelamin" required>
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option <?php if ($data['jeniskelamin'] == 'Laki - Laki') echo 'selected'; ?> value="Laki - Laki">Laki - Laki</option>
                                                <option <?php if ($data['jeniskelamin'] == 'Perempuan') echo 'selected'; ?> value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-2">Asal Sekolah</label>
                                        <div class="form-group">
                                            <input type="text" name="asalsekolah" value="<?= $data['asalsekolah'] ?>" placeholder="Asal Sekolah" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-2">Tempat Lahir</label>
                                        <div class="form-group">
                                            <input type="text" name="tempatlahir" value="<?= $data['tempatlahir'] ?>" required class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-2">Tanggal Lahir</label>
                                        <div class="form-group">
                                            <input type="date" name="tanggallahir" value="<?= $data['tanggallahir'] ?>" required class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-2">Alamat</label>
                                        <div class="form-group">
                                            <textarea class="form-control" name="alamat" id="alamat" rows="10"><?= $data['alamat'] ?></textarea>
                                            <script>
                                                CKEDITOR.replace('isi');
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-2">Foto Siswa (JPG, JPEG, PNG)</label>
                                        <div class="form-group">
                                            <input type="file" name="foto" class="form-control">

                                        </div>
                                        <div class="form-group">
                                            <a class="btn btn-success" href="foto/<?= $data['foto'] ?>" target="_blank">Lihat Foto</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-2">Password</label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="password">
                                            <input type="hidden" class="form-control" name="passwordlama" value="<?php echo $data['password']; ?>">
                                            <span class="text-danger">Kosongkan Password jika tidak ingin mengganti</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary float-end py-2" type="submit" name="ubah">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
if (isset($_POST['ubah'])) {
    if ($_POST['password'] == "") {
        $password = $_POST['passwordlama'];
    } else {
        $password = $_POST['password'];
    }
    if ($_SESSION["pengguna"]['level'] == 'Admin') {
        $koneksi->query("UPDATE pengguna SET password='$password',nama='$_POST[nama]', email='$_POST[email]',telepon='$_POST[telepon]', alamat='$_POST[alamat]' WHERE id='$id'") or die(mysqli_error($koneksi));
        echo "<script>alert('Profil Berhasil Di Ubah');</script>";
        echo "<script>location='profil.php';</script>";
    } else {
        $lokasifoto = $_FILES['foto']['tmp_name'];
        if (!empty($lokasifoto)) {
            $namafoto = $_FILES['foto']['name'];
        } else {
            $namafoto = $data['foto'];
            move_uploaded_file($lokasifoto, "foto/" . $namafoto);
        }
        $koneksi->query("UPDATE siswa SET nama='$_POST[nama]',email='$_POST[email]',password='$password',foto='$namafoto',jeniskelamin='$_POST[jeniskelamin]',tempatlahir='$_POST[tempatlahir]',tanggallahir='$_POST[tanggallahir]',alamat='$_POST[alamat]',asalsekolah='$_POST[asalsekolah]' WHERE idsiswa='$id'") or die(mysqli_error($koneksi));
        echo "<script>alert('Profil Berhasil Di Ubah');</script>";
        echo "<script>location='profil.php';</script>";
    }
}
include 'footer.php';
?>