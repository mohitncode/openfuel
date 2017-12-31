<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Openfuel | My Projects</title>
		
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
			foreach($projects as $project) {
		?>

		<div class="large-12 columns">
			
			<div class="large-4 columns">
				<img src="<?php echo $project['project_cover_image']; ?>" height="400" width="400" />
			</div>

			<div class="panel large-8 columns">
				<h3><?php echo $project['project_name']; ?></h3>
				<hr>
				<h4>Project Description</h4>
				<p><?php echo $project['project_description']; ?></p>
				<a href="<?php echo base_url(); ?>projects/show_project_details/<?php echo $project['project_id']; ?>" class="small button">View Project</a>
 			</div>

		</div>
		
		<?php
		}
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

