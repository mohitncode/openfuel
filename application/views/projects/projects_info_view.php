<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Openfuel | Admin Panel</title>
		
		<?php
			
			$this->load->view('includes/normalize');
			$this->load->view('includes/foundation');
			
		?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/about.css">
		<script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
	</head>
	
	<body>
		<?php
			
			$this->load->view('navigation');

		?>

		<div class="large-12 columns">
		<hr>
			<div class="large-4 columns">
				<h2>PROJECTS</h2>
			</div>

			<div class="large-8 columns">
				<p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI. Efficiently unleash cross-media information without cross-media value. Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI. Efficiently unleash cross-media information without cross-media value.</p>
				<p>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
			</div>
			<hr>
		</div>

		<?php
			
			$this->load->view('includes/watermark');
			$this->load->view('includes/jquery');
			
		?>
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.topbar.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.dropdown.js"></script>
		

		<script type="text/javascript">
			$(document).foundation();
		</script>

		
	</body>
</html>