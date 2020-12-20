<html lang="en">

<head>
	<?php $this->load->view('components/header'); ?>
</head>

<body>
	<?php $this->load->view('components/navbar'); ?>
	<?php foreach ($burung_data as $burung) : ?>
		<?php foreach ($detail_burung as $detail) : ?>
			<?php foreach ($usia as $us) : ?>
				<?php if ($detail->usia_burung == $us->usia_burung) { ?>
					<div class="parallax-container">
						<div class="parallax">
							<h3 class="title-page"><?= $burung->nama_burung ?></h3>
							<img src="<?= base_url('assets/image/12080587033_fdcfa58f63_h_edited.jpg'); ?>">
						</div>
					</div>

					<div class="section white">
						<div class="row detail">
							<blockquote>
								<h4 class="header blurie mt-75">Detail Burung</h4>
							</blockquote>

							<div class="col l6 mt-10">
								<div class="row">
									<div class="col m12">
										<div class="card z-depth-0">
											<div class="card-image">
												<div class="overlay-title"></div>
												<img src="<?= base_url('assets/upload/' . $burung->img_burung); ?>">
												<span class="card-title top-6" id="birds"><?= $burung->nama_burung ?></span>
											</div>
											<div class="card-content detail">
												<?php
												$totalStok = 0;
												$count = 0;
												foreach ($detail_burung as $detail) {
													if ($detail->fk_burung == $burung->id_burung) {
														$totalStok += $detail->stok_burung;
														$count += 1;
													}
												}
												$totalBar = ($totalStok / $count) * 10;  ?>
												<div class="row mb-0">
													<div class="col s2">
														<h6 class="blurie">Stok: <?= $detail->stok_burung ?> <i class="fas fa-feather"></i></h6>
													</div>
													<div class="col s6">
														<h6 class="blurie">Usia: <?= $detail->usia_burung ?> Bulan</h6>
													</div>
													<div class="col s4">
														<h6 class="secondary-content blurie">Harga: Rp.<?= number_format($detail->harga_burung, 2) ?> </h6>
													</div>
												</div>
												<div class="progress detail">
													<?php $bar = (50 / $detail->stok_burung) * 100; ?>
													<div class="determinate" style="width: <?= $totalBar ?>%"></div>
												</div>
												<div class="section">
													<div class="row mb-0">
														<div class="col m1">
															<img src="<?= base_url('assets/image/icon/bird_about.svg'); ?>" width="auto" height="50">
														</div>
														<div class="col m11 detail">
															<h5 class="blurie">About</h5>
														</div>
													</div>

													<p class="blurie-text"><?= $burung->deskripsi_burung ?>
													</p>
												</div>

												<div class="divider"></div>
												<div class="section">
													<div class="row mb-0">
														<div class="col m1">
															<img src="<?= base_url('assets/image/icon/bird_howtocare.svg'); ?>" width="auto" height="50">
														</div>
														<div class="col m11 detail">
															<h5 class="blurie">Cara Merawat</h5>
														</div>
													</div>
													<h6 class="blurie">Perawatan Kandang</h6>
													<p class="blurie-text"><?= $burung->perawatan_kandang ?>
													</p>
													<h6 class="blurie">Perawatan Makan</h6>
													<p class="blurie-text"><?= $burung->perawatan_makan ?>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col l6 mt-10">
								<div class="row">
									<div class="col m12">
										<div class="card z-depth-0">
											<div class="card-content">
												<div class="progress no-bg mb-8">
													<div class="determinate blurie" style="width: 100%"></div>
													<div class="determinate yerie" style="width: 90%"></div>
												</div>
												<h5 class="blurie mt-0"><?= $burung->nama_burung ?> Documentation Video</h5>
												<div class="progress no-bg">
													<div class="determinate yerie" style="width: 100%"></div>
													<div class="determinate blurie" style="width: 90%"></div>
												</div>

												<div class="video-container">
													<iframe width="465" height="315" src="<?= $burung->vid_burung ?>" frameborder="0" allowfullscreen>
													</iframe>
												</div>

												<div class="progress no-bg mb-8 mt-20">
													<div class="determinate blurie" style="width: 100%"></div>
													<div class="determinate yerie" style="width: 90%"></div>
												</div>
												<h5 class="blurie mt-0">Gallery <?= $burung->nama_burung ?> Usia <?= $detail->usia_burung ?> Bulan</h5>
												<div class="progress no-bg">
													<div class="determinate yerie" style="width: 100%"></div>
													<div class="determinate blurie" style="width: 90%"></div>
												</div>

												<?php
												$dir_thumbs = './assets/upload/thumb/';
												$dir_images = './assets/upload/gallery/';
												$images = directory_map($dir_thumbs);
												foreach ($gallery_burung as $gallery) : ?>
													<?php if ($detail->id_detail_burung == $gallery->fk_detail_burung) { ?>
														<a class="gallery" href="<?= base_url($dir_images) . $gallery->foto_gallery; ?>">
															<img class="mt-20 mr-10 image" id="border-img" src="<?= base_url($dir_thumbs) . $gallery->foto_gallery; ?>" width="100" height="100">
														</a>
													<?php } ?>
												<?php endforeach; ?>

												<div class="progress no-bg mb-8 mt-20">
													<div class="determinate blurie" style="width: 100%"></div>
													<div class="determinate yerie" style="width: 90%"></div>
												</div>
												<h5 class="blurie mt-0">Usia <?= $burung->nama_burung ?> yang Tersedia</h5>
												<div class="progress no-bg">
													<div class="determinate yerie" style="width: 100%"></div>
													<div class="determinate blurie" style="width: 90%"></div>
												</div>

												<?php foreach ($detail_burung as $detail) : ?>
													<p class="radio-select">
														<label>
															<input onclick="location.href='<?= site_url('details/index/' . $burung->id_burung . '/' . $detail->usia_burung) ?>'" class="with-gap" name="usia" type="radio" />
															<span><?= $detail->usia_burung ?> Bulan</span>
														</label>
													</p>
												<?php endforeach; ?>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				<?php } ?>
			<?php endforeach; ?>
		<?php endforeach; ?>
	<?php endforeach; ?>
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