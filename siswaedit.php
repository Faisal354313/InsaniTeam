<?php include 'header.php';
$ambil = $koneksi->query("SELECT * FROM siswa WHERE idsiswa='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Siswa</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Siswa</li>
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
            <h6 class="section-title bg-white text-center text-primary px-3">Edit Siswa</h6>
            <h1 class="mb-5">Edit Siswa</h1>
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
                                        <input type="text" name="nama" placeholder="Nama Siswa" value="<?= $data['nama'] ?>" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Email</label>
                                        <input type="text" name="email" value="<?= $data['email'] ?>" placeholder="Email" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">password</label>
                                        <input type="text" name="password" value="<?= $data['password'] ?>" placeholder="Password Siswa" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Jenis Kelamin</label>
                                        <select class="form-control" name="jeniskelamin" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option <?php if ($data['jeniskelamin'] == 'Laki - Laki') echo 'selected'; ?> value="Laki - Laki">Laki - Laki</option>
                                            <option <?php if ($data['jeniskelamin'] == 'Perempuan') echo 'selected'; ?> value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Asal Sekolah</label>
                                        <input type="text" name="asalsekolah" value="<?= $data['asalsekolah'] ?>" placeholder="Asal Sekolah" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Tempat Lahir</label>
                                        <input type="text" name="tempatlahir" value="<?= $data['tempatlahir'] ?>" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Tanggal Lahir</label>
                                        <input type="date" name="tanggallahir" value="<?= $data['tanggallahir'] ?>" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat" rows="10"><?= $data['alamat'] ?></textarea>
                                        <script>
                                            CKEDITOR.replace('isi');
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Foto Siswa (JPG, JPEG, PNG)</label>
                                        <input type="file" nname="foto" required class="form-control">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <a class="btn btn-success" href="foto/<?= $data['foto'] ?>" target="_blank">Lihat Foto</a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary float-end py-2" type="submit" name="simpan" value="simpan">Simpan</button>
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
<?php
if (isset($_POST['simpan'])) {
    $lokasifoto = $_FILES['foto']['tmp_name'];
    if (!empty($lokasifoto)) {
        $namafoto = $_FILES['foto']['name'];
    } else {
        $namafoto = $data['foto'];
        move_uploaded_file($lokasifoto, "foto/" . $namafoto);
    }
    $koneksi->query("UPDATE siswa SET nama='$_POST[nama]',email='$_POST[email]',password='$_POST[password]',foto='$namafoto',jeniskelamin='$_POST[jeniskelamin]',tempatlahir='$_POST[tempatlahir]',tanggallahir='$_POST[tanggallahir]',alamat='$_POST[alamat]' WHERE idsiswa='$_GET[id]'") or die(mysqli_error($koneksi));
    echo "<script>alert('Data Berhasil Di Edit');</script>";
    echo "<script>location='siswadaftar.php';</script>";
}
?>
<?php
include 'footer.php';
?>