<body class='bg-gradient-danger'>
	<p class='text-light'>
		<?= 'Halaman ini dieksekusi dalam waktu '.$this->benchmark->elapsed_time();?>
		<?= ' dengan penggunaan memori sebesar '.$this->benchmark->memory_usage(); ?>
	</p>
	<p class='card bg-gradient-warning'>
		<h7>NPM: <?=$this->session->userdata('npm')?></h7>
		<h7>Nama: <?=$this->session->userdata('nama')?></h7>
		<h7>Lvl: <?=$this->session->userdata('lvl')?></h7>
		<h7>Logged: <?=$this->session->userdata('logged')?></h7>
		<h7>Session: <?=$this->session->userdata('sess')?></h7>
		<h7>Uname: <?=$this->session->userdata('uname')?></h7>
	</p>
</body>