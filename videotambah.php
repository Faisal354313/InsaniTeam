<?php include 'header.php'; ?>
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Video</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Video</li>
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
            <h6 class="section-title bg-white text-center text-primary px-3">Tambah Video</h6>
            <h1 class="mb-5">Tambah Video</h1>
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
                                        <input type="text" name="judul" placeholder="Judul Video" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="gname">Tanggal</label>
                                        <input type="date" name="tanggal" value="<?= date('Y-m-d') ?>" required class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Isi Video</label>
                                        <textarea class="form-control" name="isi" id="isi" rows="10"></textarea>
                                        <script>
                                            CKEDITOR.replace('isi');
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="gname">File Video (MP4, MKV)</label>
                                        <input type="file" name="file" required class="form-control">
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
    $namafile = $_FILES['file']['name'];
    $lokasifile = $_FILES['file']['tmp_name'];
    move_uploaded_file($lokasifile, "foto/" . $namafile);
    $koneksi->query("INSERT INTO video
		(judul,isi,tanggal,file)
		VALUES('$_POST[judul]','$_POST[isi]','$_POST[tanggal]','$namafile')") or die(mysqli_error($koneksi));
    echo "<script>alert('Data Berhasil Di Simpan');</script>";
    echo "<script> location ='videodaftar.php';</script>";
}
?>
<?php
include 'footer.php';
?>