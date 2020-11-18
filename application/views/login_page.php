<html lang="en">

<head>
	<?php $this->load->view('components/header'); ?>
</head>

<body class="bg-login">
	<div class="row container">
		<div class="col l6"></div>
		<div class="col l6">
			<div class="row">
				<?php if ($this->session->flashdata('success')) : ?>
					<div class="card-panel white blurie-text" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>
				<div class="col s12">
					<h2></h2>
					<ul class="tabs mt-100">
						<li class="tab col s3"><a class="<?= ($tabs == 'login') ? 'active' : ''; ?>" href="#login">LOGIN</a></li>
						<li class="tab col s1 bluder mx-15"></li>
						<li class="tab col s3"><a class="<?= ($tabs == 'signup') ? 'active' : ''; ?>" href="#signup">SIGN UP</a></li>
					</ul>
				</div>
			</div>
			<div class="card white" id="login">
				<form action="<?= site_url('login/login') ?>" method="post" autocomplete="off">
					<div class="card-content">
						<div class="row">
							<div class="col s12">
								<div class="row mb-0">
									<div class="input-field col offset-s1 s10">
										<input id="email" name="email" type="email" class="validate">
										<label for="email">Email</label>
										<div class="red-text"><?= form_error('email'); ?></div>
									</div>
								</div>
								<div class="row">
									<div class="input-field col offset-s1 s10">
										<input id="password" name="password" type="password" class="validate">
										<label for="password">Password</label>
										<div class="red-text"><?= form_error('password'); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action center">
						<button class="btn waves-effect btn-login px-50" type="submit">LOGIN</button>
					</div>
				</form>
			</div>

			<div class="card white" id="signup">
				<form action="<?= site_url('login/sendData') ?>" method="post" autocomplete="off">
					<div class="card-content">
						<div class="row">
							<div class="col s12">
								<div class="row mb-0">
									<div class="input-field col offset-s1 s10">
										<input id="username2" name="username" type="text" class="validate">
										<label for="username2">Username</label>
										<div class="red-text"><?= form_error('username'); ?></div>
									</div>
								</div>
								<div class="row mb-0">
									<div class="input-field col offset-s1 s10">
										<input id="password2" name="password2" type="password" class="validate">
										<label for="password2">Password</label>
										<div class="red-text"><?= form_error('password2'); ?></div>
									</div>
								</div>
								<div class="row">
									<div class="input-field col offset-s1 s10">
										<input id="email" name="email2" type="email" class="validate">
										<label for="email">E-mail</label>
										<div class="red-text"><?= form_error('email2'); ?></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-action center">
						<button class="btn waves-effect btn-login px-50" type="submit">SIGN UP</button>
					</div>
				</form>
			</div>

			<div class="center">
				<a href="<?= site_url('home/index') ?>" class="blurie">"Back to Explore the Birds"</a>
			</div>

		</div>
	</div>
	<?php $this->load->view('components/script'); ?>
</body>

</html>