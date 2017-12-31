<!DOCTYPE html>
<html>
	<head>
		<title>Openfuel | Change Password</title>
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
		
		?>
		
		<form action="<?php echo base_url(); ?>login/change_password" method="post" id="change_password" name="change_password">
			<div class="row">
				<div class="large-6 columns small-centered padded-form">
					<label for="password">New Password</label>
					<input type="password" id="password" name="password" maxlength="100" required />

					<label for="conf_password">Confirm New Password:</label>
					<input type="password" id="conf_password" name="conf_password" maxlength="100" required />

					<input type="submit" id="submit" name="submit" value="Change password" class="button small" />
					<input type="reset" id="reset" name="reset" value="Clear" class="button small" />
				</div>
			</div>
		</form>
	</body>
</html>