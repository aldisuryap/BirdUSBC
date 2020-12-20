<html lang="en">

<head>
	<?php $this->load->view('components/header'); ?>
</head>

<body>
	<?php $this->load->view('components/navbar'); ?>

	<div class="parallax-container">
		<div class="parallax">
			<h3 class="title-page">LIST BIRDS</h3>
			<img src="<?= base_url('assets/image/12080587033_fdcfa58f63_h_edited.jpg'); ?>">
		</div>
	</div>
	<div class="section white">
		<div class="row container">
			<blockquote>
				<h4 class="header blurie mt-75">The Most Talented Bird</h4>
			</blockquote>
			<?php $rowCount = 0; ?>
			<?php foreach ($burung_data as $list) : ?>
				<div class="col l4 mt-10" style="display:block;">
					<div class="row">
						<div class="col m12">
							<div class="card">
								<div class="card-image darker">
									<div class="overlay"></div>
									<img src="<?= base_url('assets/upload/list/' . $list->img_burung) ?>">
									<span class="card-title" id="lists"><?= $list->nama_burung ?></span>
								</div>
								<div class="card-content">
									<?php
									$totalStok = 0;
									$count = 0;
									foreach ($detail_burung as $detail) {
										if ($detail->fk_burung == $list->id_burung) {
											$totalStok += $detail->stok_burung;
											$count += 1;
										}
									}
									$totalBar = ($totalStok / $count) * 10;  ?>
									<div class="row mb-0">
										<div class="col s6">
											<p class="blurie-text">Total Stok: <?= $totalStok ?> <i class="fas fa-feather"></i></p>
										</div>
									</div>
									<div class="progress list">
										<div class="determinate" style="width: <?= $totalBar ?>%"></div>
									</div>
									<p style="text-align: justify;"><?= substr($list->deskripsi_burung, 0, 150) ?>...</p>
								</div>
								<div class="card-action center">
									<a class="btn waves-effect btn-login px-50" href="<?= site_url('details/index/' . $list->id_burung) ?>">CHECK NOW</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				$rowCount += 1;
				if ($rowCount % 3 == 0) { ?>
		</div>
		<div class="row container">
		<?php } ?>

	<?php endforeach; ?>
		</div>
	</div>
	<?php $this->load->view('components/footer'); ?>
	<?php $this->load->view('components/tawk'); ?>
	<?php if ($this->session->userdata('logged_in') === true) {
		$this->load->view('components/chat_wa');
	} ?>
</body>

</html>