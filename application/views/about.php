<html lang="en">

<head>
	<?php $this->load->view('components/header'); ?>
</head>

<body>
	<?php $this->load->view('components/navbar'); ?>


	<?php $this->load->view('components/footer'); ?>
	<?php $this->load->view('components/tawk'); ?>
	<?php if ($this->session->userdata('logged_in') === true) {
		$this->load->view('components/chat_wa');
	} ?>
</body>

</html>