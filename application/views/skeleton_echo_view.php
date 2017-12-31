<!DOCTYPE html>
<html>
  <head>
    <?php

    $this->load->view('includes/normalize');
    $this->load->view('includes/foundation');
	$this->load->view('includes/main');

    ?>
    <title><?php echo $title; ?></title>
  </head>
  
  <body>
    <?php

    $this->load->view('navigation');

    ?>
    <div class="row">
        <div id="oops">
          <h3><?php echo $message; ?></h3> 
      </div>
    </div>

    <?php 

    $this->load->view('includes/jquery');

    ?>

    <script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.js"></script>
    <script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.topbar.js"></script>
    <script type="text/javascript" src="http://localhost/openfuel/assets/js/foundation.dropdown.js"></script>

    <script type="text/javascript">
      $(document).foundation();
    </script>

  </body>
</html>