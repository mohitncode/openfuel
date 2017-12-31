<!DOCTYPE html>
<html>
	<head>
		<?php
			
			$this->load->view('includes/normalize');
			$this->load->view('includes/foundation');
			
		?>
		
		<title>Openfuel | <?php echo $full_name; ?></title>
		<link rel="stylesheet" text="text/css" href="<?php echo base_url(); ?>assets/css/profileview.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
	</head>
	
	<body>
		<?php
			
			$this->load->view('navigation');
			
		?>
		
		<!-- <div class="row" id="profile-welcome">
			<h4>Hello <?php echo $full_name; ?>! This is how your profile looks.</h4>
		</div> -->
		
		<div class="row" id="profile-row-1">
			<div class="large-12 columns">
				
				<div class="large-4 columns">
					<?php if($profile_image == "not_set") { ?>
						<img src="<?php echo base_url(); ?>assets/img/default_profile.png" alt="profile image" height="300" width="300"><br>
						<?php } else { ?>
						<img src="<?php echo $profile_image; ?>" alt="profile image"><br>
					<?php } ?>
				</div>
				
				<div class="large-8 columns">
					<div id="profile-info" class="row">
						<h4><?php echo $full_name; ?></h4>
						<p><i>City, Country</i></p>
						<hr>
						<p><i><?php echo $email_id; ?></i></p>
						<hr>
						<h4>About me</h4>
						<p><i><?php echo $about; ?></i></p>
					</div>
				</div>
			</div>
		</div>
		
		<?php if($this->session->userdata('user_type') == "user") { ?>
		<div class="row" id="profile-row-2">
			<div class="large-12 columns">
				<div id="profile-recos">
					
					<div class="large-4 columns">
						<div class="large-5 columns">
							<i class="fa fa-edit fa-5x"></i>
						</div>
						<div class="large-7 columns">
							<br>
							<a href="<?php echo base_url(); ?>profile/my_participations">
								<h2><i><?php echo $participations ?></i></h2>
							</a>
							<p><i>participations</i></p>
						</div>
					</div>
					
					<div class="large-4 columns">
						<div class="large-5 columns">
							<i class="fa fa-lightbulb-o fa-5x"></i>
						</div>
						<div class="large-7 columns">
							<br>
							<a href="<?php echo base_url(); ?>projects/my_projects">
								<h2><i><?php echo $created_projects ?></i></h2>
							</a>
							<p><i>projects</i></p>
						</div>
					</div>
					
					<div class="large-4 columns">
						<div class="large-5 columns">
							<i class="fa fa-star fa-5x"></i>
							
						</div>
						<div class="large-7 columns">
							<br>
							<h2><i>19</i></h2>
							<p><i>RECOs</i></p>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<?php 
			}
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