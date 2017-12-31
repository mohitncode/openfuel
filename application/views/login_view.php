<!DOCTYPE html>
<html>
	<head>
		<title>Openfuel | Login</title>
		<?php
		
		$this->load->view('includes/normalize');
		$this->load->view('includes/foundation');
		
		?>

		<style>
			.padded-form {
				padding-top: 4em;
			}
		</style>
	</head>
	
	<body>
		<?php 
		
		$this->load->view('navigation');

		if(validation_errors() == TRUE) {
			echo validation_errors();
		}
		
		?>
		
		<form action="<?php echo base_url(); ?>login" method="post" id="login" name="login">
			<div class="row">
				<div class="large-6 columns small-centered padded-form">
					<label for="email_id">Email ID</label>
					<input type="email" id="email_id" name="email_id" maxlength="100" required />

					<label for="password">Password</label>
					<input type="password" id="password" name="password" maxlength="20" required />

					<input type="submit" id="submit" name="submit" value="Login" class="button small" />
					<input type="reset" id="reset" name="reset" value="Clear" class="button small" />
				</div>
			</div>
		</form>

		<script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.js"></script>
		<script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.topbar.js"></script>
		<script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.dropdown.js"></script>

		<script type="text/javascript">
			$(document).foundation();
		</script>
		
	</body>
</html>