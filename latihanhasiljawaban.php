<?php include 'header.php';
$idjawaban = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM kuis WHERE idkuis='$_GET[idkuis]'");
$data = $ambil->fetch_assoc();
?>
<style>
    input[type="radio"]:disabled {
        -webkit-appearance: none;
        display: inline-block;
        width: 12px;
        height: 12px;
        padding: 0px;
        background-clip: content-box;
        border: 2px solid #bbbbbb;
        background-color: white;
        border-radius: 50%;
    }

    input[type="radio"]:checked {
        background-color: black;
    }
</style>
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
            <h6 class="section-title bg-white text-center text-primary px-3">Hasil Jawaban Kuis</h6>
            <h1 class="mb-5">Hasil Jawaban Kuis</h1>
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
                                        <input type="text" name="judul" placeholder="Judul Kuis" value="<?= $data['judul'] ?>" readonly class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Tanggal</label>
                                        <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>" readonly class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-2">Deskripsi Kuis</label>
                                        <textarea class="form-control" name="isi" id="isi" rows="10" readonly><?= $data['isi'] ?></textarea>
                                        <script>
                                            CKEDITOR.replace('isi');
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Hasil Jawaban Kuis</h6>
            <h1 class="mb-5">Hasil Jawaban Kuis</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $ambiljawaban = $koneksi->query("SELECT * FROM jawaban left join siswa ON jawaban.idsiswa = siswa.idsiswa WHERE idjawaban='$idjawaban'");
                        $jawaban = $ambiljawaban->fetch_assoc();
                        ?>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td width="15%">Nama</td>
                                        <td>: <?= $jawaban['nama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Email</td>
                                        <td>: <?= $jawaban['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Nilai</td>
                                        <td>: <?= $jawaban['nilai'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Benar</td>
                                        <td>: <?= $jawaban['benar'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Salah</td>
                                        <td>: <?= $jawaban['salah'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Waktu Submit</td>
                                        <td><?php echo tanggal(date('Y-m-d', strtotime($jawaban['waktu']))) . ' ' . date('H:i', strtotime($jawaban['waktu'])) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <?php
                            $nomor = 1;
                            $ambildata = $koneksi->query("SELECT*FROM soal where idkuis='$_GET[id]' order by idsoal asc");
                            while ($data = $ambildata->fetch_assoc()) {
                                $ambiljawabandetail = $koneksi->query("SELECT * FROM jawabandetail WHERE idjawaban='$jawaban[idjawaban]' and idsoal='$data[idsoal]'");
                                $jawabandetail = $ambiljawabandetail->fetch_assoc();
                            ?>
                                <input type="hidden" name="idsoal[]" value="<?php echo $data['idsoal']; ?>">
                                <input type="hidden" name="idkuis" value="<?php echo $data['idkuis']; ?>">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td width="5%"><?php echo $nomor ?>.</td>
                                                <td><?php echo $data['soal']; ?></td>
                                                <td width="10%"></td>
                                            </tr>
                                            <tr>
                                                <!-- <td class="<?php if ($data['kunci'] == "A") echo 'bg-success text-white'; ?>"></td> -->
                                                <td></td>
                                                <td>A. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" <?php if ($jawabandetail['jawaban'] == 'A') echo 'checked'; ?> value="A" disabled> <?php echo $data['a']; ?> </td>
                                                <td>
                                                    <?php if ($data['kunci'] == "A") {
                                                        echo '<i class="fa fa-check text-success"></i>';
                                                    } else {
                                                        echo '<i class="fa fa-times text-danger"></i>';
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>B. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" <?php if ($jawabandetail['jawaban'] == 'B') echo 'checked'; ?> value="B" disabled> <?php echo $data['b']; ?></td>
                                                <td>
                                                    <?php if ($data['kunci'] == "B") {
                                                        echo '<i class="fa fa-check text-success"></i>';
                                                    } else {
                                                        echo '<i class="fa fa-times text-danger"></i>';
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>C. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" <?php if ($jawabandetail['jawaban'] == 'C') echo 'checked'; ?> value="C" disabled> <?php echo $data['c']; ?>
                                                </td>
                                                <td>
                                                    <?php if ($data['kunci'] == "C") {
                                                        echo '<i class="fa fa-check text-success"></i>';
                                                    } else {
                                                        echo '<i class="fa fa-times text-danger"></i>';
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>D. <input name="pilihan[<?php echo $data['idsoal'] ?>]" type="radio" <?php if ($jawabandetail['jawaban'] == 'D') echo 'checked'; ?> value="D" disabled> <?php echo $data['d']; ?>
                                                </td>
                                                <td>
                                                    <?php if ($data['kunci'] == "D") {
                                                        echo '<i class="fa fa-check text-success"></i>';
                                                    } else {
                                                        echo '<i class="fa fa-times text-danger"></i>';
                                                    } ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                            <?php
                                $nomor++;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php
include 'footer.php';
?>