<?php include 'header.php';
$ambil = $koneksi->query("SELECT * FROM kuis WHERE idkuis='$_GET[id]'");
$data = $ambil->fetch_assoc();
$idsiswa = $_SESSION['pengguna']['idsiswa'];
$ambiljawaban = $koneksi->query("SELECT * FROM jawaban left join siswa ON jawaban.idsiswa = siswa.idsiswa WHERE jawaban.idsiswa='$idsiswa' and idkuis='$_GET[id]'");
$jawaban = $ambiljawaban->fetch_assoc();
if ($_SESSION["pengguna"]['level'] == 'Siswa') {
    if (!empty($jawaban)) {
        echo "<script>location='latihanhasil.php?id=$_GET[id]';</script>";
    }
}
?>
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Kuis</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page"><?= $data['judul'] ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="judul" value="<?= $data['judul'] ?>" placeholder="Judul Kuis" readonly>
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="<?= $data['tanggal'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Kuis</label>
                                <textarea class="form-control" name="isi" id="isi" rows="10" readonly><?= $data['isi'] ?></textarea>
                                <script>
                                    CKEDITOR.replace('isi');
                                </script>
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
                        <h4>Jawab Kuis</h4>
                        <br>
                        <form method="post">
                            <?php $nomor = 1;
                            $ambildata = $koneksi->query("SELECT*FROM soal WHERE idkuis='$_GET[id]' order by idsoal asc");
                            while ($data = $ambildata->fetch_assoc()) { ?>
                                <input type="hidden" name="idsoal[]" value="<?php echo $data['idsoal']; ?>">
                                <input type="hidden" name="idkuis" value="<?php echo $data['idkuis']; ?>">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="10px"><?php echo $nomor ?>.</td>
                                                <td><?php echo $data['soal']; ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>A. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" value="A" required> <?php echo $data['a']; ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>B. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" value="B"> <?php echo $data['b']; ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>C. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" value="C"> <?php echo $data['c']; ?></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>D. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" value="D"> <?php echo $data['d']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                            <?php
                                $nomor++;
                            } ?>
                            <div class="form-group">
                                <button class="btn btn-primary float-right pull-right" type="submit" name="simpan" value="simpan" onclick="return confirm('Apakah anda yakin ingin mengsubmit jawaban ? Jawaban yang telah di submit tidak dapat dirubah kembali')">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST['simpan'])) {
    $idkuis = $_POST['idkuis'];
    $pilihan    = $_POST['pilihan'];
    $idsoal    = $_POST['idsoal'];
    $ambilkuis = $koneksi->query("SELECT * FROM soal
    WHERE idkuis='$idkuis'");
    $jumlah = $ambilkuis->num_rows;
    $score    = 0;
    $benar    = 0;
    $salah    = 0;
    $kosong    = 0;

    for ($i = 0; $i < $jumlah; $i++) {
        $nomor    = $idsoal[$i];
        if (empty($pilihan[$nomor])) {
            $kosong++;
        } else {
            $jawaban    = $pilihan[$nomor];
            $query    = mysqli_query($koneksi, "SELECT * FROM soal WHERE idsoal='$nomor' AND kunci='$jawaban'");
            $cek    = mysqli_num_rows($query);
            if ($cek) {
                $benar++;
            } else {
                $salah++;
            }
        }
        $score    = 100 / $jumlah * $benar;
        $hasil    = number_format($score, 2);
    }
    $koneksi->query("INSERT INTO jawaban
		(idsiswa,idkuis,benar,salah,nilai)
		VALUES('$idsiswa','$idkuis','$benar','$salah','$hasil')") or die(mysqli_error($koneksi));
    $idjawaban = $koneksi->insert_id;
    $nomor = 0;
    for ($i = 0; $i < $jumlah; $i++) {
        $nomor    = $idsoal[$i];
        if (empty($pilihan[$nomor])) {
            $kosong++;
        } else {
            $jawaban    = $pilihan[$nomor];
            $koneksi->query("INSERT INTO jawabandetail
            (idjawaban,idsoal,jawaban)
            VALUES('$idjawaban','$nomor','$jawaban')") or die(mysqli_error($koneksi));
        }
    }
    echo "<script>alert('Jawaban Anda Berhasil Di Simpan');</script>";
    echo "<script>location='latihanhasil.php?id=$idkuis';</script>";
}
include 'footer.php';
?>