<!DOCTYPE html>
<html>
  <head>
    <?php

    $this->load->view('includes/normalize');
    $this->load->view('includes/foundation');
    
    ?>

    <title>Openfuel | <?php echo $full_name; ?></title>
    <link rel="stylesheet" text="text/css" href="<?php echo base_url(); ?>assets/css/profileview.css">
  </head>
  
  <body>
    <?php

    $this->load->view('navigation');

    ?>

    <div class="row" id="profile-row-1">
        <div class="large-12 columns">

          <div class="large-4 columns">
            <?php if($profile_image == "not_set") { ?>
            <img src="<?php echo base_url(); ?>assets/img/default_profile.png" alt="profile image"><br>
            <?php } else { ?>
            <img src="<?php echo $profile_image; ?>" alt="profile image"><br>
            <?php } ?>
          </div>

          <div class="large-8 columns">
            <div id="profile-info" class="row">
              <h4><?php echo $full_name; ?></h4>
              <p><i>City, Country</i></p>
              <hr>
              <p><i><?php echo $email_id; ?></i></p>
              <hr>
              <h4>About me</h4>
              <p><i>This is NOT a fake account.</i></p>
            </div>
          </div>
        </div>
    </div>

    
    <?php 

    $this->load->view('includes/footer');
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