<?php include 'header.php'; ?>
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
            <h6 class="section-title bg-white text-center text-primary px-3">Tambah Materi</h6>
            <h1 class="mb-5">Tambah Materi</h1>
        </div>
        <div class="row g-4">

            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post">
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Judul</label>
                                        <input type="text" name="judul" placeholder="Judul Materi" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Tanggal</label>
                                        <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Isi Materi</label>
                                        <textarea class="form-control" name="isi" id="isi" rows="10"></textarea>
                                        <script>
                                            CKEDITOR.replace('isi');
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Foto Materi (JPG, JPEG, PNG)</label>
                                        <input type="file" name="foto" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">File Materi (PDF)</label>
                                        <input type="file" name="file" class="form-control">
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
    if (!empty($namafoto)) {
        move_uploaded_file($lokasifoto, "foto/" . $namafoto);
    }

    $namafile = $_FILES['file']['name'];
    $lokasifile = $_FILES['file']['tmp_name'];
    if (!empty($namafile)) {
        move_uploaded_file($lokasifile, "foto/" . $namafile);
    }

    // jika kosong, isi kolom dengan NULL atau string kosong sesuai kebutuhan
    $namafoto = !empty($namafoto) ? $namafoto : '';
    $namafile = !empty($namafile) ? $namafile : '';

    $koneksi->query("INSERT INTO materi
        (judul, isi, tanggal, foto, file)
        VALUES(
            '$_POST[judul]',
            '$_POST[isi]',
            '$_POST[tanggal]',
            '$namafoto',
            '$namafile'
        )") or die(mysqli_error($koneksi));

    echo "<script>alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='materidaftar.php';</script>";
}

?>
<?php
include 'footer.php';
?>