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
<?php
if ($_SESSION["pengguna"]['level'] == 'Admin') {
?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Daftar Materi</h6>
                <h1 class="mb-5">Daftar Materi</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="card">
                        <div class="card-body">
                            <a href="materitambah.php" class="btn btn-primary">Tambah Materi</a>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="tabel">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Judul</th>
                                            <th>Foto</th>
                                            <th>File</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 1;
                                        $ambildata = $koneksi->query("SELECT*FROM materi order by tanggal desc");
                                        while ($data = $ambildata->fetch_assoc()) { ?>
                                            <tr>
                                                <td><?php echo $nomor; ?></td>
                                                <td><?php echo tanggal($data['tanggal']) ?></td>
                                                <td><?php echo $data['judul'] ?></td>
                                                <td><img src="foto/<?= $data['foto'] ?>" width="150px" style="border-radius: 10px"></td>
                                                <td><a class="btn btn-success btn-sm" href="foto/<?= $data['file'] ?>" target="_blank">Download</a></td>
                                                <td>
                                                    <a href="materiedit.php?id=<?php echo $data['idmateri']; ?>" class="btn btn-warning btn-sm m-1">Edit</a>
                                                    <a href="materihapus.php?id=<?php echo $data['idmateri']; ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
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
<?php } else {
    $idsiswa = $_SESSION['pengguna']['idsiswa'];
    $ambilpengguna = $koneksi->query("SELECT *FROM siswa WHERE idsiswa='$idsiswa'");
    $pengguna = $ambilpengguna->fetch_assoc();
    if (!empty($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $ambildata = $koneksi->query("SELECT*FROM materi where judul like '$keyword%' order by tanggal desc");
    } else {
        $keyword = "";
        $ambildata = $koneksi->query("SELECT*FROM materi order by tanggal desc");
    }
    $cek = $ambildata->num_rows;
?>
    <div id="blog_page_area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="single_sidebar search_widget">
                        <h3 class="sdbr_title">Cari</h3>
                        <div class="sdbr_inner">
                            <form class="search_form" method="post">
                                <input type="text" class="form-control" name="keyword" value="<?= $keyword ?>" placeholder="Masukkan Keyword Anda">
                                <button type="submit" name="cari" value="cari" class="search_button"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xs-12">
                    <?php
                    if ($cek >= 1) {
                    ?>
                        <div class="row mt-5">
                            <?php
                            while ($data = $ambildata->fetch_assoc()) { ?>
                                <div class="col-md-4 col-12">
                                    <div class="futuristic-border">
                                        <div class="single_blog mb-5">
                                            <div class="single_blog_img">
                                                <a href="materidetail.php?id=<?= $data['idmateri'] ?>">
                                                    <img src="foto/<?= $data['foto'] ?>" width="100%">
                                                </a>
                                                <div class="blog_date text-left text-danger mt-2">
                                                    <div class="bd_day"><?= tanggal($data['tanggal']) ?></div>
                                                </div>
                                            </div>
                                            <div class="blog_content">
                                                <h4 class="post_title">
                                                    <a href="materidetail.php?id=<?= $data['idmateri'] ?>"><?= $data['judul'] ?></a>
                                                </h4>
                                                <p><?= wordlimiter($data['isi'], 10); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    } else { ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                Data tidak ditemukan
                            </div>
                            <div class="card-body">
                                <img src="foto/kosong.jpg" width="100%">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php
include 'footer.php';
?>