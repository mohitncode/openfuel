<!DOCTYPE html>
<html>
	<head>
		<title>Openfuel | Forgot Password</title>
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
		
		if(isset($message)) {
			echo $message;
		}
		
		if(isset($token)) {
			echo $token;
			echo '<br />';
			echo base_url() ."login/reset_password/" .$token;
		}
		
		?>
		
		<form action="<?php echo base_url(); ?>login/display_password_token" method="post" id="forgot_password" name="forgot_password">
			<div class="row">
				<div class="large-6 columns small-centered padded-form">
					<label for="email_id">Email ID</label>
					<input type="email" id="email_id" name="email_id" maxlength="100" required />

					<label for="conf_email_id">Confirm Email ID:</label>
					<input type="email" id="conf_email_id" name="conf_email_id" maxlength="100" required />

					<input type="submit" id="submit" name="submit" value="Login" class="button small" />
					<input type="reset" id="reset" name="reset" value="Clear" class="button small" />
				</div>
			</div>
		</form>
	</body>
</html>