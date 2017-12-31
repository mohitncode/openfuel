<!DOCTYPE html>
<html>
	<head>
		<title>Openfuel | Create Project</title>
		<?php
		
		$this->load->view('includes/normalize');
		$this->load->view('includes/foundation');

		
		?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/create_event.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
	</head>
	
	<body>
		<?php
		
		$this->load->view('navigation');
		
		?>

		<div class="row">
			<h4>Good luck for your new project idea!</h4>
			<p><i>A half-baked idea is okay as long as it's in the oven.</i></p> 
		</div>

		<div class="row">
		<div class="large-8 columns">
		<form enctype="multipart/form-data" action="<?php echo base_url(); ?>projects/create_project" method="post" id="create_project" name="create_project">
			<fieldset>
				<legend>Project Details:</legend>

				<label for="project_name">Project Name:</label>
				<input type="text" id="project_name" name="project_name" value="<?php echo set_value('project_name'); ?>" maxlength="200" required />

				<label for="project_description">Project Description:</label>
				<textarea id="project_description" name="project_description" rows="10" value="<?php echo set_value('project_description'); ?>" maxlength="10000" required>
				</textarea>

			</fieldset>
			
			<fieldset>
				<legend>Project Cover Image:</legend>
				<input type="file" id="project_cover_image" name="project_cover_image" required />
			</fieldset>
			
			<fieldset>
				<legend>Project Docs:</legend>
				<p>Press Ctrl while selecting files to select multiple files</p>
				<input type="file" id="project_docs[]" name="project_docs[]" required />
			</fieldset>
			
			<input type="submit" id="submit" name="submit" value="Launch Project" class="button small" />
			<input type="reset" id="reset" name="reset" value="Clear" class="button small" />
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
		</div>

		<div id="watermark">
			<img src="<?php echo base_url(); ?>assets/img/openfuel-bg.png" alt="Openfuel"> 
		</div>

    <?php 

    $this->load->view('includes/watermark');
    $this->load->view('includes/footer');
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