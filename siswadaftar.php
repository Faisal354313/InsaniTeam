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
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Daftar Siswa</h6>
            <h1 class="mb-5">Daftar Siswa</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-12 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-body">
                        <a href="siswatambah.php" class="btn btn-primary">Tambah Siswa</a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="tabel">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Asal Sekolah</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat, Tanggal Lahir</th>
                                        <th>File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $nomor = 1;
                                    $ambildata = $koneksi->query("SELECT*FROM siswa order by nama asc");
                                    while ($data = $ambildata->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['email'] ?></td>
                                            <td><?php echo $data['asalsekolah'] ?></td>
                                            <td><?php echo $data['jeniskelamin'] ?></td>
                                            <td><?php echo $data['tempatlahir'] . ', ' . tanggal($data['tanggallahir']) ?></td>
                                            <td><img src="foto/<?= $data['foto'] ?>" width="150px" style="border-radius: 10px"></td>
                                            <td>
                                                <a href="siswaedit.php?id=<?php echo $data['idsiswa']; ?>" class="btn btn-warning btn-sm m-1">Edit</a>
                                                <a href="siswahapus.php?id=<?php echo $data['idsiswa']; ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')">Hapus</a>
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
<?php
include 'footer.php';
?>