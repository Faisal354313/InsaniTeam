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
            <h6 class="section-title bg-white text-center text-primary px-3">Data Penjawab</h6>
            <h1 class="mb-5">Data Penjawab</h1>
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row g-4">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="tabel">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Nilai</th>
                                        <th>Benar</th>
                                        <th>Salah</th>
                                        <th>Waktu Submit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1;
                                    $ambildata = $koneksi->query("SELECT*FROM jawaban left join siswa ON jawaban.idsiswa = siswa.idsiswa where idkuis = '$idkuis'");
                                    while ($data = $ambildata->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['email'] ?></td>
                                            <td><?php echo $data['nilai'] ?></td>
                                            <td><?php echo $data['benar'] ?></td>
                                            <td><?php echo $data['salah'] ?></td>
                                            <td><?php echo tanggal(date('Y-m-d', strtotime($data['waktu']))) . ' ' . date('H:i', strtotime($data['waktu'])) ?></td>
                                            <td>
                                                <a href="latihanhasiljawaban.php?id=<?php echo $data['idjawaban']; ?>&idkuis=<?php echo $_GET['id']; ?>" class="btn btn-success btn-sm m-1">Jawaban</a>
                                                <a href="jawabanhapus.php?id=<?php echo $data['idjawaban']; ?>&idkuis=<?php echo $_GET['id']; ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
                                            </td>
                                        </tr>
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
include 'footer.php';
?>