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

			<div class="col l4 mt-10" style="display:block;">
				<div class="row">
					<div class="col m12">
						<div class="card">
							<div class="card-image darker">
								<div class="overlay"></div>
								<img src="https://dummyimage.com/600x400/000/fff">
								<span class="card-title" id="lists">Burung Dummy</span>
							</div>
							<div class="card-content">

								<div class="row mb-0">
									<div class="col s6">
										<p class="blurie-text">Total Stok: 100 <i class="fas fa-feather"></i></p>
									</div>
								</div>
								<div class="progress list">
									<div class="determinate" style="width: 20%"></div>
								</div>
								<p style="text-align: justify;">Burung dummy adalah...</p>
							</div>
							<div class="card-action center">
								<a class="btn waves-effect btn-login px-50" href="<?= site_url('details/index/') ?>">CHECK NOW</a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="row container">
		</div>
	</div>
	<?php $this->load->view('components/footer'); ?>
	<!-- <?php $this->load->view('components/tawk'); ?>
	<?php if ($this->session->userdata('logged_in') === true) {
		$this->load->view('components/chat_wa');
	} ?> -->
</body>

</html>