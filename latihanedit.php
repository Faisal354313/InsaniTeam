<?php include 'header.php';
$idkuis = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM kuis WHERE idkuis='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Kuis</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Kuis</li>
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
            <h6 class="section-title bg-white text-center text-primary px-3">Edit Kuis</h6>
            <h1 class="mb-5">Edit Kuis</h1>
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
                                        <input type="text" name="judul" placeholder="Judul Kuis" value="<?= $data['judul'] ?>" required class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Tanggal</label>
                                        <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" required class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Deskripsi Kuis</label>
                                        <textarea class="form-control" name="isi" id="isi" rows="10"><?= $data['isi'] ?></textarea>
                                        <script>
                                            CKEDITOR.replace('isi');
                                        </script>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn btn-primary float-end py-2" type="submit" name="simpan" value="simpan">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4>Tambah Soal</h4>
                        <br>
                        <a href="#" data-toggle="modal" data-target="#tambahkuis" class="btn btn-primary">Tambah Soal</a>
                        <div class="modal fade" id="tambahkuis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="kuis"><span class="text-danger">*</span>Soal</label>
                                                <textarea name="soal" value="" class="form-control" id="soal"></textarea>
                                                <script>
                                                    CKEDITOR.replace('soal');
                                                </script>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kuis"><span class="text-danger">*</span>Jawaban A</label>
                                                        <input type="text" name="a" value="" class="form-control" id="a" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kuis"><span class="text-danger">*</span>Jawaban B</label>
                                                        <input type="text" name="b" value="" class="form-control" id="b" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="kuis"><span class="text-danger">*</span>Jawaban C</label>
                                                        <input type="text" name="c" value="" class="form-control" id="c" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kuis"><span class="text-danger">*</span>Jawaban D</label>
                                                        <input type="text" name="d" value="" class="form-control" id="d" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="kuis"><span class="text-danger">*</span>Kunci Jawaban</label>
                                                <select name="kunci" value="" class="form-control" id="kunci">
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary float-right pull-right" type="submit" name="tambah" value="tambah">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="tabel">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Soal</th>
                                        <th>A</th>
                                        <th>B</th>
                                        <th>C</th>
                                        <th>D</th>
                                        <th>Kunci</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1;
                                    $ambildata = $koneksi->query("SELECT*FROM soal where idkuis = '$idkuis' order by idsoal asc") or die(mysqli_error($koneksi));
                                    while ($data = $ambildata->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $data['soal'] ?></td>
                                            <td><?php echo $data['a'] ?></td>
                                            <td><?php echo $data['b'] ?></td>
                                            <td><?php echo $data['c'] ?></td>
                                            <td><?php echo $data['d'] ?></td>
                                            <td><?php echo $data['kunci'] ?></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#edit<?= $nomor ?>" class="btn btn-warning btn-sm m-1">Edit Soal</a>
                                                <a href="soalhapus.php?id=<?= $data['idsoal'] ?>&idkuis=<?= $data['idkuis'] ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="edit<?= $nomor ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Soal</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="kuis"><span class="text-danger">*</span>Soal <?= $nomor ?></label>
                                                                <textarea name="soal" value="" class="form-control" id="soal<?= $nomor ?>"><?= $data['soal'] ?></textarea>
                                                                <input type="hidden" name="idsoal" class="form-control" value="<?= $data['idsoal'] ?>">
                                                                <script>
                                                                    CKEDITOR.replace('soal<?= $nomor ?>');
                                                                </script>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="kuis"><span class="text-danger">*</span>Jawaban A</label>
                                                                        <input type="text" name="a" value="<?= $data['a'] ?>" class="form-control" id="a" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="kuis"><span class="text-danger">*</span>Jawaban B</label>
                                                                        <input type="text" name="b" value="<?= $data['b'] ?>" class="form-control" id="b" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="kuis"><span class="text-danger">*</span>Jawaban C</label>
                                                                        <input type="text" name="c" value="<?= $data['c'] ?>" class="form-control" id="c" />
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="kuis"><span class="text-danger">*</span>Jawaban D</label>
                                                                        <input type="text" name="d" value="<?= $data['d'] ?>" class="form-control" id="d" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kuis"><span class="text-danger">*</span>Kunci Jawaban</label>
                                                                <select name="kunci" value="" class="form-control" id="kunci">
                                                                    <option <?php if ($data['kunci'] == 'A') echo 'selected'; ?> value="A">A</option>
                                                                    <option <?php if ($data['kunci'] == 'B') echo 'selected'; ?> value="B">B</option>
                                                                    <option <?php if ($data['kunci'] == 'C') echo 'selected'; ?> value="C">C</option>
                                                                    <option <?php if ($data['kunci'] == 'D') echo 'selected'; ?> value="D">D</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <button class="btn btn-primary float-right pull-right" type="submit" name="edit" value="edit">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        $nomor++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php
if (isset($_POST['simpan'])) {
    $koneksi->query("UPDATE kuis SET judul='$_POST[judul]',isi='$_POST[isi]',tanggal='$_POST[tanggal]' WHERE idkuis='$_GET[id]'") or die(mysqli_error($koneksi));
    echo "<script>alert('Data Berhasil Di Edit');</script>";
    echo "<script>location='latihanedit.php?id=$_GET[id]';</script>";
}
if (isset($_POST['tambah'])) {
    $koneksi->query("INSERT INTO soal
(idkuis,soal,a,b,c,d,kunci)
VALUES('$_GET[id]','$_POST[soal]','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[kunci]')") or die(mysqli_error($koneksi));
    echo "<script>alert('Data Berhasil Di Simpan');</script>";
    echo "<script>location='latihanedit.php?id=$_GET[id]';</script>";
}
if (isset($_POST['edit'])) {
    $koneksi->query("UPDATE soal SET soal='$_POST[soal]',a='$_POST[a]',b='$_POST[b]',c='$_POST[c]', d='$_POST[d]', kunci='$_POST[kunci]' WHERE idsoal='$_POST[idsoal]'") or die(mysqli_error($koneksi));
    echo "<script>alert('Data Berhasil Di Edit');</script>";
    echo "<script>location='latihanedit.php?id=$_GET[id]';</script>";
}
include 'footer.php';
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>