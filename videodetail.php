<?php include 'header.php';
$ambil = $koneksi->query("SELECT * FROM video WHERE idvideo='$_GET[id]'");
$data = $ambil->fetch_assoc();
?>
<div class="container-fluid bg-primary py-5 mb-5 page-header">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="display-3 text-white animated slideInDown">Detail</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-xxl py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="single_blog">
                    <div class="single_blog_img">
                        <video width="100%" controls>
                            <source src="foto/<?= $data['file'] ?>" type="video/mp4">
                        </video>
                        <div class="blog_date text-left text-danger mt-2">
                            <div class="bd_day"><?= tanggal($data['tanggal']) ?></div>
                        </div>
                    </div>
                    <div class="blog_content">
                        <h4 class="post_title"><a href="videodetail.php?id=<?= $data['idvideo'] ?>"><?= $data['judul'] ?></a></h4>
                        <p class="blog_dtls_page"><?= $data['isi'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>