<?php include 'header.php';
$idsiswa = $_SESSION['pengguna']['idsiswa'];
$ambil = $koneksi->query("SELECT * FROM kuis WHERE idkuis='$_GET[id]'");
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
<div id="page_item_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-left">
                <h3>Hasil Jawaban Kuis</h3>
            </div>
        </div>
    </div>
</div>
<div id="blog_page_area">
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
                        <h4>Hasil Jawaban Kuis</h4>
                        <br>
                        <?php
                        $ambiljawaban = $koneksi->query("SELECT * FROM jawaban left join siswa ON jawaban.idsiswa = siswa.idsiswa WHERE jawaban.idsiswa='$idsiswa' and idkuis='$_GET[id]'");
                        $jawaban = $ambiljawaban->fetch_assoc();
                        ?>
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
<?php
include 'footer.php';
?>