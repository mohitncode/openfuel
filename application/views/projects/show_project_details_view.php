<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Openfuel - Project</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/normalize.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/foundation.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/showproject.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
		<script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
	</head>
	
	<body>
		
		<?php 
			if(empty($project_details)) {
				$wrapper['message'] = "No such projects found. Your project might not exist or might have been removed due to discplinary purposes.";
				$this->load->view('skeleton_echo_view', $wrapper);
			}
			else {
				$this->load->view('navigation');
		?>
		
		<div class="row">
			<div class="columns large-12 small-6">
				<h1><?php echo $project_details['project_name']; ?></h1>
				<h5><i>Project launched on <?php echo $project_details['created_on']; ?></i></h5>
			</div>
			<hr>
		</div>
		
		<div class="row">
			<div class="large-12 columns">
				<div class="row">
					
					<div class="large-4 small-6 columns">
						<h4>Project Description:</h4> 
						<p><?php echo $project_details['project_description']; ?></p>
						<hr> 
					</div>
					
					
					<div class="large-8 small-6 columns">
						<img src="<?php echo $project_details['project_cover_image']; ?>" width="800" height="800" />
					</div>
					
				</div>
			</div>
			
			
			<!-- Project DOCS -->
			<div class="row">
				<div class="large-12 columns">
					<h3>Project Documents</h3><hr>
				</div>
				<div class="large-12 columns">
					<?php
						
						$project_docs = json_decode($project_details['project_docs'], TRUE);
						foreach($project_docs as $project_doc) {
						
					?>
					<div class="row">
						<div class="large-4 columns">
							<div class="large-8 columns">
								<ul>
									<li>
										<i class="fa fa-download"></i>
										<a href="<?php echo base_url(); ?>uploads/project_docs/<?php echo $project_doc['file_name']; ?>"><?php echo $project_doc['orig_name']; ?></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>  
				
			</div>
			<!-- End of Project DOCS -->
			
			<?php 
				}
				$this->load->view('includes/footer');
				
			?>
			
			<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
			<script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.js"></script>
			<script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.topbar.js"></script>
			<script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.dropdown.js"></script>
			
			<script type="text/javascript">
				$(document).foundation();
				
				
			</script>
			
		</body>
		</html>									