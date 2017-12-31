<!DOCTYPE html> 
<html>
	<head>
		<meta charset="UTF-8">
		<title>Openfuel - Entrepreneur Registration Form</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/registration.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/select2-foundation.css" />
	</head>
	<body>
		
		<?php 
			
			$this->load->view('navigation');
			
		?>
		
		<div class="row">
			<div class="columns large-5">
				
				<h2>User Registration</h2><br>
				
				<form action="<?php echo base_url(); ?>register/user_registration" method="post" id="user_registration" name="user_registration" enctype="multipart/form-data">
					<label for="email_id">Email:</label>
					<input type="email" id="email_id" name="email_id" value="<?php echo set_value('email_id'); ?>" maxlength="100" required />
					
					<label for="password">Password:</label>
					<input type="password" id="password" name="password" maxlength="20" required />
					
					<label for="conf_password">Confirm Password:</label>
					<input type="password" id="conf_password" name="conf_password" maxlength="20" required />
					
					<label for="first_name">First Name:</label>
					<input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" maxlength="100" required />
					
					<label for="last_name">Last Name:</label>
					<input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" maxlength="100" required />
					
					<label for="state">State:</label>
					<input type="text" name="state" id="state" />
					
					<label for="city">City:</label>
					<input type="text" name="city" id="city" />
					
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
							<i class="fa fa-bullhorn fa-5x"></i>
						</div>
						<div class="columns large-8">
							<h2>Organization</h2>
						</div>
					</div>
					<div class="row">
						<h6>Have an amazing event to host?</h6>
						<p>To let the world know about your event(s), to make it's news spread like fire, sign up <a href="<?php echo base_url(); ?>register/org_registration">HERE</a>.</p>
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
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2.js"></script>
		<script>
			$('#city').select2({
				placeholder: 'Search for a city',
				minimumInputLength: 2,
				ajax: {
					url: 'http://localhost/openfuel/register/get_cities/',
					dataType: 'json',
					formatSearching: 'Searching',
					data: function(term, page) {
						return {
							searchq: term,
							stateq: term
						};
					},
					results: function(data, page) {
						return {
							results: data
						};
					}
				},
				id: function(object) {
					return object.text;
				}
			});
			
			$('#state').select2({
				placeholder: 'Search for a state',
				minimumInputLength: 2,
				formatSearching: 'Searching',
				ajax: {
					url: 'http://localhost/openfuel/register/get_states',
					dataType: 'json',
					data: function(term, page) {
						return { searchq: term };
					},
					results: function(data, page) {
						return {
							results: data
						};
					}
				},
				id: function(object) {
					return object.text;
				}
			});
		</script>
	
	</body>
	</html> 	