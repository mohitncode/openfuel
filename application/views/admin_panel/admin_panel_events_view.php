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
					<?php foreach($events as $event) { ?>
					<div class="large-12 columns event_row">
						<div class="large-1 columns">
							<h3><?php echo $event['event_id']; ?></h3>
						</div>
						<div class="large-2 columns">
							<?php
								$event_imgs = json_decode($event['event_imgs'], TRUE);
								foreach($event_imgs as $image) { ?>
									<img src="<?php echo base_url() .'uploads/event_images/' .$image['file_name']; ?>" width="200" height="150" />
								<?php break; } ?>
						</div>
						
						<div class=" large-7 columns">
							<h3><?php echo $event['event_name']; ?></h3>
							<p>
								<?php
									$description = substr($event['event_description'], 0, 100);
									echo $description ."...";
								?>
							</p>
						</div>
						
						<div class="large-2 columns">
							<div class="large-1 columns">
								<a class="tiny button approve_event" id="<?php echo $event['event_id']; ?>">Approve</a>
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
					var event_id = $(this).attr('id');
					console.log("Event approval tried. " +event_id);
					$.ajax({
						url: "http://localhost/openfuel/admin/approve_event/" +event_id
					}).done(function(data, textStatus) {
						if(textStatus = "Event validated successfully.") {
							console.log("Event validation successful");
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