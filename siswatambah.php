<?php include 'header.php'; ?>
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
            <h6 class="section-title bg-white text-center text-primary px-3">Tambah Siswa</h6>
            <h1 class="mb-5">Tambah Siswa</h1>
        </div>
        <div class="row g-4">

            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-body">
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
                                        <input type="file" nname="foto" required class="form-control">
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
    $namafoto = $_FILES['foto']['name'];
    $lokasifoto = $_FILES['foto']['tmp_name'];
    move_uploaded_file($lokasifoto, "foto/" . $namafoto);
    $koneksi->query("INSERT INTO siswa
		(nama,email,password,jeniskelamin,tempatlahir,tanggallahir,alamat,foto,level)
		VALUES('$_POST[nama]','$_POST[email]','$_POST[password]','$_POST[jeniskelamin]','$_POST[tempatlahir]','$_POST[tanggallahir]','$_POST[alamat]','$namafoto','Siswa')") or die(mysqli_error($koneksi));
    echo "<script>alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='siswadaftar.php';</script>";
}
?>
<?php
include 'footer.php';
?>