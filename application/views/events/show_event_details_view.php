<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Openfuel - Event</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/showevent.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/select2.css" />
		
		<script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
	</head>
	
	<body>
		
		<?php 
			
			$this->load->view('navigation');
			
			if(empty($event_details)) {
				echo "No such events found. Your event might not exist or might still be pending validation";
			}
			else {
				
			?>
			
			<?php
			if($this->session->userdata('user_type') == "user" && $participated == FALSE) { ?>
			<div class="md-modal md-effect-7" id="modal-7">
				<div class="md-content">
					<h3>Apply your project to this Event</h3>
					
					<div>
						<p>Select one of your projects from the dropdown list:</p><br><br>
						<form name="apply_project" method="post" action="<?php echo base_url(); ?>events/apply_project_to_event/<?php echo $event_details['event_id']; ?>">
							<input type="text" id="applied_project" name="applied_project" /><br>
							<input type="submit" id="submit" name="submit" value="Apply Project" class="button small" />
						</form>
					</div>
					<img class="md-close" src="<?php echo base_url(); ?>/assets/img/cross.png" style="height: 20px; width: 20px;" />
				</div>
			</div>
			<?php } ?>
		
			<div class="row">
				<div class="columns large-12 small-6">
					<div class="large-10 columns">
						<h1><?php echo $event_details['event_name']; ?></h1>
						<h5><i><?php echo $event_details['event_tagline']; ?></i></h5>
					</div>
					<?php if($this->session->userdata('user_type') == "user" && $participated == FALSE) { ?>
					<div class="large-2 columns">
						<button class="large button md-trigger" data-modal="modal-7"><i class="fa fa-share-square"></i></button>
						<p>Apply Project</p>
					</div>
					<?php } ?>
				</div>
				<hr>
			</div>
			
			<div class="row">
				<div class="large-12 columns">
					<div class="row">
						
						<div class="large-4 small-6 columns">
							<h4>Event Description:</h4> 
							<p><?php echo $event_details['event_description']; ?></p>
							<hr>
							<div id="event_date">
								<h4>Start Date:</h4> 
								<p><?php echo $event_details['event_start_date']; ?></p>
								<hr>
								<h4>End Date:</h4>
								<p><?php echo $event_details['event_end_date']; ?></p>
							</div>
							<hr>
							<h4>Location:</h4> 
							<p><?php echo $event_details['event_venue']; ?></p>  
						</div>
						
						
						<div class="large-8 small-6 columns">
							<ul data-orbit>
								<?php
									
									$imgs = json_decode($event_details['event_imgs'], TRUE);
									$baseurl = base_url() ."uploads/event_images/";
									$i = 1;
									
									foreach($imgs as $image) {
										echo "<li>";
										echo '<img src="' .$baseurl .$image['file_name'] .'" ' .'alt="slide ' .$i .'" />';
										echo "</li>";
									}
									
								?>
							</ul>
						</div>
						
					</div>
				</div>
				
				<div class="row">
					<div class="large-12 columns">
						<h3>Mentors</h3><hr>
					</div>
					
					<?php if(empty($mentors)) { ?>
						<p>No mentors are associated with this event.</p>
						<?php 
						} 
						else { 
							foreach($mentors as $mentor) {
							?>
							
							<div class="large-3 small-6 columns">
								<?php
									if($mentor['profile_image'] == "not_set") {
										echo '<img src="http://localhost/openfuel/assets/img/default_profile.png" width="300" height="300" />';
									}
									else { ?>
									<img src="<?php echo $mentor['profile_image']; ?>" height="300" width="300" />
								<?php } ?>
								<div class="panel">
									<p><?php echo $mentor['first_name'] ." " .$mentor['last_name']; ?></p>
								</div>
							</div>
							<?php } ?>
							
						</div>
						<!-- End of MENTORS -->
						<?php }
				}
				
				$this->load->view('includes/footer');
				
			?> 
			
			<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.topbar.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.dropdown.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/foundation.orbit.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
			<script src="<?php echo base_url(); ?>assets/js/modalEffects.js"></script>
			
			<script type="text/javascript">
				$(document).foundation();
				
				$('#applied_project').select2({
					placeholder: 'Add a project',
					minimumInputLength: 2,
					width: "75%",
					formatSearching: 'Searching',
					ajax: {
						url: 'http://localhost/openfuel/events/get_projects_by_user',
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