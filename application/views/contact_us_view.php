<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Openfuel | Contact Us</title>
		
		<?php
			
			$this->load->view('includes/normalize');
			$this->load->view('includes/foundation');
			
		?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/contactus.css">
		<script src="<?php echo base_url(); ?>assets/js/modernizr.js"></script>
	</head>
	
	<body>
		<?php
			
			$this->load->view('navigation');

		?>

		<div class="large-12 columns">
			<header class="contact-header">
				<h1>We Are All Ears <span>Contact us with your query.</span></h1>	
			</header>
			<section>
				<form id="theForm" class="simform" autocomplete="off">
					<div class="simform-inner">
						<ol class="questions">
							<li>
								<span><label for="q1">May we know your name?</label></span>
								<input id="q1" name="q1" type="text"/>
							</li>
							<li>
								<span><label for="q2">And your city?</label></span>
								<input id="q2" name="q2" type="text"/>
							</li>
							<li>
								<span><label for="q3">What would be your message?</label></span>
								<input id="q3" name="q3" type="text"/>
							</li>
							<li>
								<span><label for="q4">Lastly, may we know your email-id?</label></span>
								<input id="q4" name="q4" type="text"/>
							</li>
						</ol><!-- /questions -->
						<button class="submit" type="submit">Send</button>
						<div class="controls">
							<button class="next"><!-- <i class="fa fa-long-arrow-right"></i> --></button>
							<div class="progress"></div>
							<span class="number">
								<span class="number-current"></span>
								<span class="number-total"></span>
							</span>
							<span class="error-message"></span>
						</div><!-- / controls -->
					</div><!-- /simform-inner -->
					<span class="final-message"></span>
				</form><!-- /simform -->			
			</section>
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
		<script src="<?php echo base_url(); ?>assets/js/classie.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/stepsForm.js"></script>
		<script>
			var theForm = document.getElementById( 'theForm' );

			new stepsForm( theForm, {
				onSubmit : function( form ) {
					// hide form
					classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );

					/*
					form.submit()
					or
					AJAX request (maybe show loading indicator while we don't have an answer..)
					*/

					// let's just simulate something...
					var messageEl = theForm.querySelector( '.final-message' );
					messageEl.innerHTML = 'Thank you! We\'ll be in touch.';
					classie.addClass( messageEl, 'show' );
				}
			} );
		</script>
		
	</body>
</html>