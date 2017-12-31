<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Openfuel | All events</title>
		 
		<?php
			
			$this->load->view('includes/normalize');
			$this->load->view('includes/foundation');
			
		?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/myprojects.css">
	</head>
	
	<body>
		<?php
			
			$this->load->view('navigation');
			foreach($events as $event) {
		?>

		<div class="large-12 columns">
			<div class="large-4 columns">
				<?php
					$event_imgs = json_decode($event['event_imgs'], TRUE);
					foreach($event_imgs as $image) { ?>
						<img src="<?php echo base_url() .'uploads/event_images/' .$image['file_name']; ?>" width="400" height="300" />
				<?php break; } ?>
			</div>

			<div class="panel large-8 columns">
				<h3><?php echo $event['event_name']; ?></h3>
				<hr>
				<h4>Event Description</h4>
				<p>
					<?php
						$description = substr($event['event_description'], 0, 300);
						echo $description ."...";
					?>
				</p>
				<hr><a href="<?php echo base_url(); ?>events/show_event_details/<?php echo $event['event_id']; ?>" class="small button">View event</a>
			</div>

		</div>

		<?php
			}
			$this->load->view('includes/footer');
			$this->load->view('includes/watermark');
			$this->load->view('includes/jquery');
			
		?>
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.topbar.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/foundation.dropdown.js"></script>
		<script type="text/javascript">
			$(document).foundation();
		</script>
		
	</body>
</html>

