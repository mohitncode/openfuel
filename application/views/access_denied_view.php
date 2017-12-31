<!DOCTYPE html>
<html>
	<head>
		<?php

		$this->load->view('includes/normalize');
		$this->load->view('includes/foundation');
		$this->load->view('includes/main');

		?>
		<title>Access Denied</title>
	</head>
	
	<body>
		<?php

		$this->load->view('navigation');

		?>
		<div class="row">
  			<div id="oops">
  				<h1>Access Denied.</h1>
  				<!-- 
  					<img src="<?php echo base_url(); ?>assets/img/access.png" alt="Access Denied!">
  				-->
			
				<h3>You do not have permission to access this page. Please contact the site admin.</h3>
			</div>
		</div>

		<?php 

		$this->load->view('includes/watermark');
		$this->load->view('includes/footer');
		$this->load->view('includes/jquery');

		?>

		<script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.js"></script>
		<script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.topbar.js"></script>
		<script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.dropdown.js"></script>

		<script type="text/javascript">
			$(document).foundation();
		</script>

	</body>
</html>