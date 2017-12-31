<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Openfuel | Events</title>
		
		<?php
			
			$this->load->view('includes/normalize');
			$this->load->view('includes/foundation');
			
		?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/eventsview.css">
		<script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
	</head>
	
	<body>
		<?php
			
			$this->load->view('navigation');

			if(!empty($featured_events)) {
			?>
			
			<div class="row" id="event_slider">
				<div class="large-12 columns">
					<ul data-orbit>
						<?php foreach($featured_events as $event) { ?>
							<li>
								<div class="large-6 columns">
									<?php
										
										$imgs = json_decode($event['event_imgs'], TRUE);
										$baseurl = base_url() ."uploads/event_images/";
										
										foreach($imgs as $image) {
											echo '<img src="' .$baseurl .$image['file_name'] .'" ' .'alt="slide ' .'1' .'" />';
											break;
										}
										
									?>
									<br>
								</div>
								
								<div class="large-6 columns">
									<h3 class="show-for-small"><?php echo $event['event_name']; ?><hr></h3>
									<h4 class="show-for-small"><?php echo $event['event_tagline']; ?><hr></h4>
									<div class="panel">
										<h4 class="hide-for-small"><?php echo $event['event_name']; ?><hr></h4>
										<i><h5 class="hide-for-small"><?php echo $event['event_tagline']; ?><hr></h5></i>
										<div id="event_details">
											<h5>From:</h5>
											<p><?php echo $event['event_start_date']; ?></p>&nbsp;&nbsp;&nbsp;&nbsp;
											<h5>To:</h5>
											<p><?php echo $event['event_end_date']; ?></p>
											<hr>
											<h5>Location:</h5>
											<p><?php echo $event['event_venue']; ?></p><hr>
										</div>
										<h5 class="subheader">
											<?php
												$description = substr($event['event_description'], 0, 300);
												echo $description ."..."; 
											?>
										</h5>
										<hr><a href="<?php echo base_url(); ?>events/show_event_details/<?php echo $event['event_id']; ?>" class="small button">Check this Event Out!</a>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		<?php } ?>

		<!--
		<div class="row event-category" id="recentevents">
			<div class="large-12 columns">
				<div class="row">
					<h4>All Events</h4>
				</div>
				<div class="row">
			 		<ul data-orbit>
			 		  <li>
			          <div class="large-6 columns">
			          	<div class="large-6 columns">
			            	<img src="http://placehold.it/400x400&text=Thumbnail">
			            </div>
			            <div class="large-6 columns panel">
			            	<p class="recent-event-dates"><i>From 12/12/12 To 12/12/12</i></p><br>
			              	<p>Description Description Description Description Description Description Description Description Description Description</p>
			              	<a href="<?php echo base_url(); ?>events/show_event_details/<?php echo $event['event_id']; ?>" class="tiny button">View Event</a>
			            </div>
			          </div>
			          <div class="large-6 columns">
			          	<div class="large-6 columns">
			            	<img src="http://placehold.it/400x400&text=Thumbnail">
			            </div>
			            <div class="large-6 columns panel">
			            	<p class="recent-event-dates"><i>From 12/12/12 To 12/12/12</i></p><br>
			              	<p>Description Description Description Description Description Description Description Description Description Description</p>
			              	<a href="<?php echo base_url(); ?>events/show_event_details/<?php echo $event['event_id']; ?>" class="tiny button">View Event</a>
			            </div>
			          </div>
			          </li>
			          <li>
			          <div class="large-6 columns">
			          	<div class="large-6 columns">
			            	<img src="http://placehold.it/400x400&text=Thumbnail">
			            </div>
			            <div class="large-6 columns panel">
			            	<p class="recent-event-dates"><i>From 12/12/12 To 12/12/12</i></p><br>
			              	<p>Description Description Description Description Description Description Description Description Description Description</p>
			              	<a href="<?php echo base_url(); ?>events/show_event_details/<?php echo $event['event_id']; ?>" class="tiny button">View Event</a>
			            </div>
			          </div>
			          <div class="large-6 columns">
			          	<div class="large-6 columns">
			            	<img src="http://placehold.it/400x400&text=Thumbnail">
			            </div>
			            <div class="large-6 columns panel">
			            	<p class="recent-event-dates"><i>From 12/12/12 To 12/12/12</i></p><br>
			              	<p>Description Description Description Description Description Description Description Description Description Description</p>
			              	<a href="<?php echo base_url(); ?>events/show_event_details/<?php echo $event['event_id']; ?>" class="tiny button">View Event</a>
			            </div>
			          </div>
			          </li>
			        </ul>
				</div>
			</div>
			
		</div>
		-->
		<?php
			
			$this->load->view('includes/footer');
			$this->load->view('includes/jquery');
			
		?>
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.topbar.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.dropdown.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/foundation.orbit.js"></script>
		<script type="text/javascript">
			$(document).foundation();
		</script>
		
	</body>
</html>