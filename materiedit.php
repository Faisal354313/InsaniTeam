<?php include 'header.php';
$ambil = $koneksi->query("SELECT * FROM materi WHERE idmateri='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Materi</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Materi</li>
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
            <h6 class="section-title bg-white text-center text-primary px-3">Edit Materi</h6>
            <h1 class="mb-5">Edit Materi</h1>
        </div>
        <div class="row g-4">

            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="gname">Judul</label>
                                        <input type="text" name="judul" value="<?= $data['judul'] ?>" placeholder="Judul Materi" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="gname">Tanggal</label>
                                        <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="gname">Isi Materi</label>
                                        <textarea class="form-control" name="isi" id="isi" rows="10"><?= $data['isi'] ?></textarea>
                                        <script>
                                            CKEDITOR.replace('isi');
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="gname">Foto Materi (JPG, JPEG, PNG)</label>
                                        <input type="file" name="foto" class="form-control">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <a class="btn btn-success" href="foto/<?= $data['foto'] ?>" target="_blank">Lihat Foto Materi</a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="gname">File Materi (PDF)</label>
                                        <input type="file" name="file" class="form-control">
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <a class="btn btn-success" href="foto/<?= $data['file'] ?>" target="_blank">Lihat File Materi</a>
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
        move_uploaded_file($lokasifoto, "foto/" . $namafoto);
    } else {
        $namafoto = $data['foto'];
    }
    $lokasifile = $_FILES['file']['tmp_name'];
    if (!empty($lokasifile)) {
        $namafile = $_FILES['file']['name'];
        move_uploaded_file($lokasifile, "foto/" . $namafile);
    } else {
        $namafile = $data['file'];
    }
    $koneksi->query("UPDATE materi SET judul='$_POST[judul]',isi='$_POST[isi]',tanggal='$_POST[tanggal]', foto='$namafoto', file='$namafile' WHERE idmateri='$_GET[id]'") or die(mysqli_error($koneksi));
    echo "<script>alert('Data Berhasil Di Edit');</script>";
    echo "<script>location='materidaftar.php';</script>";
}
?>
<?php
include 'footer.php';
?>