<html lang="en">

<head>
	<?php $this->load->view('components/header'); ?>
</head>

<body>
	<?php $this->load->view('components/navbar'); ?>

	<div class="slider">
		<ul class="slides">
			<li>
				<img class="slide-image" src="<?= base_url('assets/image/e6bf5661ed52ac320b814f6be96453d0.jpg'); ?>">
				<div class="caption center-align">
					<h3>Welcome To USBC</h3>
					<h4 class="light grey-text text-lighten-3">It's all about Chirp and Feather.!</h4>
					<h5 class="light grey-text text-lighten-3">“A bird does not sing because it has an answer. It sings because it has a song.”</h5>
				</div>
			</li>
			<li>
				<img class="slide-image" src="<?= base_url('assets/image/4943490719_d8cf512945_b.jpg'); ?>">
				<div class="caption left-align">
					<h3>Your Bird Pet, Your Store</h3>
					<h4 class="light grey-text text-lighten-3">Meet Zebra Dove!</h4>
					<h5 class="light grey-text text-lighten-3">The zebra dove may not be as popular as the diamond dove but it is a widely kept cage bird throughout the world. In Thailand farms exist that are devoted to raising the zebra dove to sell to people living in that country who believe that having a zebra dove in the home will bring the family good luck. Their call is so special that they have cooing contests every year in Thailand.</h5>
				</div>
			</li>
			<li>
				<img class="slide-image" src="<?= base_url('assets/image/5142434284_5b9363b8fc_b.jpg'); ?>">
				<div class="caption right-align">
					<h3>For Your Bird's All Natural Life</h3>
					<h5 class="light grey-text text-lighten-3">It's all about Chirp and Feather.</h5>
				</div>
			</li>
		</ul>
	</div>

	<div class="center">
		<h3 class="title mr-10">+1000</h3>
		<h5 class="subtitle">BIRDS CHIRP WITH US</h5>
		<h6 class="ml-18">We offers you the best quality in the bird universe.</h6>
	</div>

	<div class="row container mb-80">
		<div class="col m5">
			<div class="row">
				<div class="card white mt-75">
					<div class="card-content">
						<span class="card-title blurie"><b>REAL-TIME CHAT</b></span>
						<div class="row chat">
							<div class="col m4">
								<div class="card-image">
									<img src="<?= base_url('assets/image/icon/chat.svg'); ?>">
								</div>
							</div>
							<div class="col m8">
								<p>Have a question? Scared to be fooled? Don't worry, you can always contact us and stay
									connected with us.</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="card white">
					<div class="card-content">
						<span class="card-title blurie"><b>STOCK NEWS</b></span>
						<div class="row chat">
							<div class="col m4">
								<div class="card-image">
									<img src="<?= base_url('assets/image/icon/bird.svg'); ?>">
								</div>
							</div>
							<div class="col m8">
								<p>The latest bird stock website with outstanding service. We always update our stock
									every purchase.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col m2">
			<div class="line-mid mt-75 mr-70"></div>
		</div>

		<div class="col m5">
			<div class="card mt-75">
				<div class="card-image">
					<img src="<?= base_url('assets/image/97298991.jpg'); ?>">
				</div>
				<div class="card-content">
					<h4 class="bold-line">Meet ZEBRA DOVE</h3>
				</div>
			</div>
		</div>
	</div>

	<div class="parallax-container">
		<div class="parallax">
			<img src="<?= base_url('assets/image/12080587033_fdcfa58f63_h_edited.jpg'); ?>">
		</div>
		<div class="row container center">
			<div class="col l4">
				<div class="card-image">
					<img class="mt-60" src="<?= base_url('assets/image/icon/userCount.svg'); ?>" width="90"><br>
					<h4 class="white-text" style="font-weight: bold;">200+</h4>
					<h6 class="white-text" style="font-weight: bold;">Users Joined</h6>
				</div>
				<div class="card-image">
					<img class="mt-75" src="<?= base_url('assets/image/icon/birdCount.svg'); ?>" width="70"><br>
					<h4 class="white-text" style="font-weight: bold;">200+</h4>
					<h6 class="white-text" style="font-weight: bold;">Birds Reached</h6>
				</div>
			</div>
			<div class="col l4">
				<h4 class="white-text mt-75" style="font-weight: bold;">Certified By:</h4>
				<img class="mt-30 circle" src="<?= base_url('assets/image/logo-bbksda-jatim.png'); ?>" width="150" style="border: 5px solid white"><br>
				<h6 class="white-text mt-20">Balai Besar KSDA Jawa Timur</h6>
			</div>
			<div class="col l4">
				<h4 class="white-text mt-75" style="font-weight: bold;">Recent Gallery:</h4>
				<?php
				$dir_thumbs = './assets/upload/thumb/';
				$dir_images = './assets/upload/gallery/';
				$images = directory_map($dir_thumbs);
				foreach ($gallery_burung as $gallery) : ?>
					<a class="gallery" href="<?= base_url($dir_images) . $gallery->foto_gallery; ?>">
						<img class="mt-10 mr-10 image" src="<?= base_url($dir_thumbs) . $gallery->foto_gallery; ?>" width="100" height="100" style="border: 2px solid white">
					</a>
				<?php endforeach ?>
			</div>
		</div>
	</div>

	<div class="section white mb-80">
		<div class="row container mb-0">
			<blockquote>
				<h4 class="header blurie mt-75">Tentang Kami</h4>
			</blockquote>
			<div class="col l12 justify-text">
				<p class="yelrie-text">Usaha ternak burung merupakan kegiatan yang sudah lama berkembang di masyarakat yang berdasarkan para penghobi burung kicauan seperti Cucak Rowo dan Perkutut di berbagai daerah terutama di Jawa Timur, Surabaya. Meroketnya harga jual burung kicauan juga menjadi pemicu para penangkar / peternak untuk mengembangkannya secara maksimal dan mengubahnya menjadi suatu bisnis dalam usaha ternak burung. Cucak Rowo dan Perkutut juga menjadi topik yang saat ini sedang trend diperbincangkan dalam forum - forum offline maupun forum-forum online di internet. Faktor kepopuleran inilah yang menyebabkan harga burung semakin melonjak</p>
				<p class="blurie-text">Alasan lain yang membuat para penghobi tertarik untuk beternak Cucak Rowo dan Perkutut karena burung tersebut memiliki daya tarik tersendiri yaitu faktor dari suara kemudian warna dari tiap-tiap jenisnya beraneka ragam. Pada usaha rumahan ternak burung yang dinamakan USBC tidak hanya beternak Cucak Rowo dan Perkutut saja melainkan juga beternak burung Jalak Bali yang bertujuan untuk melestarikan burung tersebut dari kepunahan. Istimewanya beternak burung Jalak Bali di USBC ini memiliki sertifikat untuk penangkaran dan beternak burung langka seperti Jalak Bali.</p>
				<p class="blurie-text">Mengikuti perkembangan usaha-usaha perdagangan yang sangat pesat pada saat ini menjadikan informasi sebagai hal yang sangat penting perannya dalam menunjang jalannya operasi-operasi demi tercapainya tujuan yang diinginkan oleh usaha rumahan USBC.</p>
			</div>
		</div>
		<div class="row container">
			<div class="col l7">
				<blockquote>
					<h4 class="header blurie mt-75">Lihat di Peta:</h4>
				</blockquote>
			</div>
			<div class="col l5">
				<h4 class="header blurie mt-75 center">Hubungi Kami:</h4>
			</div>
		</div>
		<div class="row container">
			<div class="col l7">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.6473114736878!2d112.75551831472269!3d-7.28090999474476!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbcc0f52cd57%3A0xd814e67302d5ba0a!2sJl.%20Manyar%20Sambongan%20No.27%2C%20RT.002%2FRW.10%2C%20Kertajaya%2C%20Kec.%20Gubeng%2C%20Kota%20SBY%2C%20Jawa%20Timur%2060282!5e0!3m2!1sen!2sid!4v1574744622956!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
			</div>
			<div class="col l5" style="margin-bottom: 70px;">
				<ul class="left ml-95 blurie-text" style="margin-top: 0%;">
					<li class="mb-35">
						<p style="margin-top: 0%;">
							<i class="fas fa-map-marked-alt mr-10 mb-8" style="font-size: 20px; font-weight: bold;"></i>
							<strong style="font-size: 20px;">Alamat</strong><br>
							Jl. Manyar Sambongan 27, Surabaya.<br>
							<b>Kelurahan Kertajaya, Kecamatan Gubeng</b>
						</p>
					</li>
					<li class="mb-35">
						<p>
							<i class="fas fa-phone-alt mr-10 mb-8" style="font-size: 20px; font-weight: bold;"></i>
							<strong style="font-size: 20px;">Telepon</strong><br>
							USBC : 031-5024143
						</p>
					</li>
					<li class="mb-35">
						<p>
							<i class="fas fa-envelope mr-10 mb-8" style="font-size: 20px; font-weight: bold;"></i>
							<strong style="font-size: 20px;">Email</strong><br>
							<a style="font-style: none !important; color:black;" href="mailto:usbc_bird@rocketmail.com">usbc_bird@rocketmail.com</a>
						</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<?php $this->load->view('components/footer'); ?>
	<?php $this->load->view('components/tawk'); ?>
	<?php if ($this->session->userdata('logged_in') === true) {
		$this->load->view('components/chat_wa');
	} ?>
	<script type='text/javascript'>
		$(document).ready(function() {
			$('a.gallery').simpleLightbox();
		});
	</script>
</body>

</html>