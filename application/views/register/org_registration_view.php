<!DOCTYPE html> 
<html>
	<head>
		<meta charset="UTF-8">
		<title>Openfuel - Organization Registration Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/registration.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
	</head>
	<body>
		
		<?php 
			
			$this->load->view('navigation');
			
		?>
		
		<div class="row">
			<div class="columns large-5">
				
				<h2>Organization Registration</h2><br>
				
				<form action="<?php echo base_url(); ?>register/org_registration" method="post" id="org_registration" name="org_registration" enctype="multipart/form-data">
					<label for="email_id">Organization Email:</label>
					<input type="email" id="email_id" name="email_id" value="<?php echo set_value('email_id'); ?>" maxlength="100" required />
					
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" maxlength="20" required />
					
					<label for="conf_password">Confirm Password:</label>
					<input type="password" id="conf_password" name="conf_password" maxlength="20" required />
					
					<label for="org_name">Organization Name:</label>
					<input type="text" id="org_name" name="org_name" value="<?php echo set_value('org_name'); ?>" maxlength="100" required />
					
					<label for="org_address">Organization Address:</label>
					<textarea id="org_address" name="org_address" value="<?php echo set_value('org_address'); ?>" rows="3" maxlength="500" required></textarea>
					
					<label for="org_type">Designation:</label>
					<input type="text" id="org_type" name="org_type" value="<?php echo set_value('org_type'); ?>" maxlength="100" required />
					
					<label for="profile_image">Profile Image:</label>
					<input type="file" id="profile_image" name="profile_image" required />
					
					<input type="submit" id="submit" name="submit" value="Register" class="button" />
					<input type="reset" id="reset" name="reset" value="Clear" class="button" />
				</form>
			</div>
			
			<div class="columns large-6">
				
				<?php
					
					if(validation_errors() == TRUE) {
						echo '<div class="row">
					<div class="row">
					<div class="columns large-4">
					<i class="fa fa-meh-o fa-5x"></i>
					</div>
					<div class="columns large-8">
					<h2>Errors</h2>
					</div>
					</div>
					<div class="row">
					<ul>';
					echo validation_errors();
					echo '</ul>
                    </div>
					</div>
					<hr>';
					}
					
					?>
					
					
					<div class="row">
					<div class="row">
					<div class="columns large-4">
					<i class="fa fa-pencil-square-o fa-5x"></i>
					</div>
					<div class="columns large-8">
					<h2>Entrepreneur</h2>
					</div>
					</div>
					<div class="row">
					<h6>Have an amazing idea?</h6>
					<p>To showcase your projects and ideas to the world, to start up as an enterpreneur, sign up <a href="<?php echo base_url();?>register/user_registration">HERE</a>.</p>
					</div>
					</div>
					<hr>
					<div class="row">
					<div class="columns large-4">
					<i class="fa fa-compass fa-5x"></i>
					</div>
					<div class="columns large-8">
					<h2>Mentor</h2>
					</div>
					</div>
					<div class="row">
					<h6>Have an eagle's eye?</h6>
					<p>To provide your expertise and help budding enterpreneurs find direction with their start up, sign up <a href="<?php echo base_url(); ?>register/mentor_registration">HERE</a>.</p>
					</div>
					
					</div>
					</div>
					
					<?php $this->load->view('includes/watermark'); ?>
					
					</body>
					</html> 					