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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/adminpanel.css">
		<script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
	</head>
	
	<body>
		<?php
			
			$this->load->view('navigation');
		?>
		
		<div class="large-12 columns" id="admin-panel">    
			
			<div id="home" class="content">
				<?php foreach($mentors as $mentor) { ?>
					<div class="large-12 columns event_row">
						<div class="large-1 columns">
							<h3><?php echo $mentor['id']; ?></h3>
						</div>
						<div class="large-2 columns">
							<?php
								if($mentor['profile_image'] == "not_set") {
									echo '<img src="http://localhost/openfuel/assets/img/default_profile.png" height="100" width="100" />';
								}
								else { ?>
								<img src="<?php echo $mentor['profile_image']; ?>" height="100" width="100" />
							<?php } ?>						
						</div>
						
						<div class=" large-7 columns">
							<h3><?php echo $mentor['first_name'] ." " .$mentor['last_name']; ?></h3>
							<p>
								<?php
									$description = substr($mentor['about'], 0, 100);
									echo $description ."...";
								?>
							</p>
						</div>
						
						<div class="large-2 columns">
							<div class="large-1 columns">
								<a class="tiny button approve_event" id="<?php echo $mentor['id']; ?>">Approve</a>
							</div>
							<div class="large-1 columns">
								<a class="tiny alert button decide_later" >Later</a>
							</div>
						</div>
						<hr>
					</div>
				<?php } ?>
			</div>
		</div>
		
		<div id="header">
			<ul id="navigation">
				<li><a class="pageload-link" href="<?php echo base_url(); ?>admin/events">Approve Events</a></li>
				<li><a class="pageload-link" href="<?php echo base_url(); ?>admin/mentors">Approve Mentors</a></li>
				<li><a class="pageload-link" href="<?php echo base_url(); ?>admin/organizations">Approve Organizations</a></li>
			</ul>
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
			
			$('.approve_event').click(function() {
				var refDiv = $(this);
				var mentor_id = $(this).attr('id');
				console.log("Mentor approval tried. " +mentor_id);
				$.ajax({
					url: "http://localhost/openfuel/admin/approve_mentor/" +mentor_id
					}).done(function(data, textStatus) {
					if(textStatus = "Mentor validated successfully.") {
						console.log("Mentor validation successful");
						refDiv.closest('.event_row').fadeOut(800, function() {
							$(this).remove();
						})
					}
				})
			});
			
			$('.decide_later').click(function() {
				$(this).closest('.event_row').fadeOut(800, function() {
					$(this).remove();
				})
			});
		</script>
	</body>
</html>			