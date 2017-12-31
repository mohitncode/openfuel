<!DOCTYPE html>
<html>
	<head>
		<title>Openfuel | Create New Event</title>
		<?php
			
			$this->load->view('includes/normalize');
			$this->load->view('includes/foundation');
			
			
		?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/create_event.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/foundation-datepicker.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/select2.css" />
	</head>
	
	<body>
		<?php
			
			$this->load->view('navigation');
			
		?>
		
		<div class="row">
			<h4>Hosting an event is as simple as A, B, C!</h4>
			<p><i>Simply fill in the event details and hit 'Submit' and voila, your event will be published to be read by all our users right on the home page!</i></p> 
		</div>
		
		<div class="row">
			<div class="large-12 columns">
				<form enctype="multipart/form-data" action="<?php echo base_url(); ?>events/create_event" method="post" id="create_event" name="create_event">
					<div class="large-8 columns">
						<fieldset>
							
							<legend>Event Details:</legend>
							
							<label for="event_name">Event Name:</label>
							<input type="text" id="event_name" name="event_name" value="<?php echo set_value('event_name'); ?>" maxlength="200" required />
							
							<label for="event_tagline">Event Tagline:</label>
							<input type="text" id="event_tagline" name="event_tagline" value="<?php echo set_value('event_tagline') ?>" maxlength="500" />
							
							<label for="event_description">Event Description:</label>
							<textarea id="event_description" name="event_description" rows="10" value="<?php echo set_value('event_description'); ?>" maxlength="10000" required>
							</textarea>
							
							<label for="event_venue">Event Venue:</label>
							<input type="text" id="event_venue" name="event_venue" value="<?php echo set_value('event_venue'); ?>" maxlength="300" />
							
							<div class="row">
								<div class="large-6 columns">
									<label for="event_start_date">Event Start Date:</label>
									<input type="text" id="event_start_date" name="event_start_date" value="<?php echo set_value('event_start_date'); ?>" maxlength="100" required />
								</div>
								<div class="large-6 columns">
									<label for="event_end_date">Event End Date:</label>
									<input type="text" id="event_end_date" name="event_end_date" value="<?php echo set_value('event_end_date')?>" maxlength="100" />			
								</div>
							</div>
							
							<label for="add_mentor">Add mentor:</label>
							<input type="text" id="add_mentor" name="add_mentor" />
						</fieldset>
						
						<fieldset>
							<legend>Event Images:</legend>
							
							<p>Press Ctrl while selecting images to select multiple images</p>
							
							<input type="file" id="event_images[]" name="event_images[]" multiple required />
						</fieldset>
						
						<!-- <fieldset>
							<legend>Event Docs:</legend>
							
							<p>Press Ctrl while selecting files to select multiple files</p>
						</fieldset> -->
						
						<input type="submit" id="submit" name="submit" value="Create event" class="button small" />
						<input type="reset" id="reset" name="reset" value="Clear" class="button small" />
						
					</div>
					
					<div class="large-4 columns">
						<fieldset>
							<legend id="mentor-list">Added Mentors:</legend>						
						</fieldset>
					</div>			
					
				</form>
			</div>
			
			<div class="large-4 columns">
				<?php
					
					if(validation_errors() == TRUE) {
						echo '<div class="row">
						<div class="row">
                        
						<i class="fa fa-meh-o fa-5x"></i>
                        
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
				
			</div>
			
			<div id="watermark">
				<img src="<?php echo base_url(); ?>assets/img/openfuel-bg.png" alt="Openfuel"> 
			</div>
			
			<?php 
				
				$this->load->view('includes/footer');
				$this->load->view('includes/jquery');
				
			?>
			
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.topbar.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.dropdown.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation-datepicker.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2.js"></script>
			
			<script type="text/javascript">
				function add_mentor_div(mentor) {
					var imgurl = "";
					if(mentor.profile_image === "not_set") {
						imgurl = "http://localhost/openfuel/assets/img/default_profile.png";
					}
					else {
						imgurl = mentor.profile_image;
					}
					
					var mentor_div = "<div class=\"large-6 small-4 columns\">" +
										"<img src=\"" +imgurl +"\" width=\"96\" height=\"96\" />" +
										"<div class=\"panel\">" +
											"<p>" +mentor.text +"</p>" +
										"</div>" +
									"</div>";				
					$('#mentor-list').after(mentor_div);
				}
				
				$(document).foundation();
				
				$('#event_start_date, #event_end_date').fdatepicker({
					format: 'yyyy-mm-dd',
				});
				
				$('#add_mentor').select2({
					placeholder: 'Add a mentor',
					width: "100%",
					minimumInputLength: 2,
					maximumSelectionSize: 4,
					formatSearching: 'Searching',
					multiple: true,
					ajax: {
						url: 'http://localhost/openfuel/events/get_mentor_list',
						dataType: 'json',
						data: function(term, page) {
							return { searchq: term };
						},
						results: function(data, page) {
							return {
								results: data
							};
						}
					}
				});
				
				$('#add_mentor').on("change", function(item) {
					add_mentor_div(item.added);
				});
			</script>
			
		</body>
	</html>	