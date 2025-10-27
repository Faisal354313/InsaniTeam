<?php include 'header.php'; ?>
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
	<div class="owl-carousel header-carousel position-relative">
		<div class="owl-carousel-item position-relative">
			<img class="img-fluid" style="height:800px;" src="foto/bg.avif" alt="">
			<div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
				<div class="container">
					<div class="row justify-content-start">
						<div class="col-sm-10 col-lg-8">
							<h5 class="text-primary text-uppercase mb-3 animated slideInDown">Selamat Datang Di Website</h5>
							<h1 class="display-3 text-white animated slideInDown">INSANI MUDA</h1>
							<p class="fs-5 text-white mb-4 pb-2">Pendidikan adalah paspor untuk masa depan, karena hari esok adalah milik mereka yang mempersiapkannya hari ini.</p>
							<?php
							if (empty($_SESSION["pengguna"])) { ?>
								<a href="login.php" style="background-color: #0624cc;" class="btn btn py-md-3 px-md-5 me-3 animated slideInLeft text-white">Login</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="owl-carousel-item position-relative">
			<img class="img-fluid" style="height:800px;" src="foto/bg.avif" alt="">
			<div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
				<div class="container">
					<div class="row justify-content-start">
						<div class="col-sm-10 col-lg-8">
							<h5 class="text-primary text-uppercase mb-3 animated slideInDown">Selamat Datang Di Website</h5>
							<h1 class="display-3 text-white animated slideInDown">Mulai Belajar</h1>
							<p class="fs-5 text-white mb-4 pb-2">Pendidikan adalah paspor untuk masa depan, karena hari esok adalah milik mereka yang mempersiapkannya hari ini..</p>
							<?php
							if (empty($_SESSION["pengguna"])) { ?>
								<a href="login.php" style="background-color: #0624cc;" class="btn btn py-md-3 px-md-5 me-3 animated slideInLeft text-white">Login</a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-xxl py-5">
	<div class="container">
		<div class="row g-5">
			<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
				<div class="position-relative h-100">
					<img class="img-fluid position-absolute" src="foto/flathome.png" alt="">
				</div>
			</div>
			<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
				<h6 class="section-title bg-white text-start text-primary pe-3">Tentang</h6>
				<h1 class="mb-4">Insani</h1>
				<p class="mb-4 text-justify" style="text-align: justify;">Perkembangan teknologi tak terasa semakin hari semakin dahsyat. Era digital kini
					telah memasuki smart society 5.0, dimana teknologi sangat berperan penting dalam
					meningkatkan kualitas hidup masyarakat (Azhari & Sutabri, 2024). Dengan kata lain society
					5.0 merupakan konsep tentang bagaimana masyarakat digital yang dibangun dengan
					memanfaatkan teknologi terkini untuk memecahkan masalah-masalah yang ada. Teknologi
					yang ada tidak hanya berfungsi sebagai alat, namun juga sebagai mitra dalam menciptakan
					solusi inovatif untuk berbagai masalah sosial (Cevin Taraya & Wibawa, 2022). Hal ini
					menjadi tantangan kepada generasi muda, bagaimana pemanfaatan teknologi agar terus
					memberikan dampak positif bagi kehidupan.
				</p>
				<?php
				if (empty($_SESSION["pengguna"])) { ?>
					<a style="background-color: #0624cc;" class="btn btn py-3 px-5 mt-2 text-white" href="login.php">Login</a>
				<?php } ?>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-12">
				<p style="text-align: justify;">
					Pemanfaatan teknologi terus dikembangkan agar dampak positif semakin luas
					kepada masyarakat. Namun tidak bisa dipungkiri, teknologi yang ada ternyata juga
					membawa angin negatif yang menjadikan ancaman bagi masyarakat, khususnya generasi
					muda (Febri et al., 2025). Anak-anak dan remaja dengan mudahnya mengakses dunia
					digital, akibatnya mereka sering terpapar oleh beragam informasi yang tidak mendukung
					untuk perkembangan karakter yang baik. Konten yang merusak, hoaks, serta perilaku
					cyberbullying dapat mempengaruhi pengembangan karakter mereka secara signifikan.
					Banyak dari mereka tidak menyadari hal itu, mereka merasa bahwa teknologi membawa
					kebaikan namun pada kenyataannya karakter merekalah yang menjadi taruhannya
					(Sundahry et al., 2023).
					<br>
					<br>
					Penggunaan teknologi yang berlebihan dapat mengakibatkan kecanduan digital
					bahkan berdampak pada kesehatan mental. Tak sedikit dari mereka yang menghabiskan
					banyak waktu dengan perangkat digital daripada bermain atau berinteraksi dengan orang
					sekitar (Febri et al., 2025.). Interaksi sosial yang kurang akan berakibat pada hubungan
					interpersonal serta pengembangan keterampilan emosional anak. Padahal dua aspek
					tersebut merupakan bagian penting dalam mengembangkan karakter mereka. Hal lain juga
					berdampak seperti pada aktivitas fisik dan keterampilan praktis anak, karena
					ketergantungan terhadap perangkat digital (Tauhid & Sabila, 2024a). Menyadari dampak
					tersebut, pendidikan karakter menjadi semakin penting dalam konteks smart society 5.0.
					Pendidikan karakter tidak hanya melibatkan pembekalan nilai-nilai moral dan etika kepada
					anak, tetapi juga pembekalan terkait keterampilan sosial yang diperlukan untuk berinteraksi
					dengan dunia digital (Sagala et al., 2024). Melalui pendidikan karakter yang efektif, anak
					dapat mengerti dan paham bagaimana menggunakan teknologi dengan bijak dan
					bertanggung jawab, sehingga mereka tidak hanya menjadi individu yang cerdas akan
					teknologi, melainkan juga memiliki karakter yang baik. Pembentukan karakter anak di era
					digital ini sangat memerlukan perhatian yang serius. Lingkungan digital yang terus
					berkembang menjadi tantangan agar setiap individu mampu beradaptasi secara positif. Oleh
					karenanya pendidikan karakter harus diintegrasikan ke dalam kurikulum pendidikan formal
					maupun non-formal (Annisa et al., 2020). Pemerintah juga telah memperkuat dengan
					program Penguatan Pendidikan karakter (PPK), yang tercantum dalam Peraturan Presiden
					nomor 87 pasal 2 tahun 2017. Hal ini menunjukkan bahwa pembekalan karakter menjadi
					salah satu aspek terpenting dalam dunia pendidikan.
					<br>
					<br>
					Pendidikan karakter menjadi kunci utama agar anak dapat memiliki integritas yang
					tinggi (Tauhid & Sabila, 2024). Pendidikan ini juga akan membantu anak dalam memahami
					konsekuensi dari apa yang mereka lakukan dan pentingnya empati serta toleransi terhadap
					orang lain. Pembekalan karakter menjadi momen paling kritis, terutama pada usia dini.
					Artinya jika usia dini gagal menanamkan karakter, maka akan membentuk pribadi yang
					bermasalah dewasanya kelak (Riris setiawati et al., 2024). Maka dari itu, penting bagi setiap
					anak mendapat pendidikan karakter agar generasi yang ada memiliki jiwa karakter yang baik
					dan mampu menghadapi dinamika perubahan di masa depan.
				</p>
			</div>
		</div>
	</div>
</div>
<?php
include 'footer.php';
?>