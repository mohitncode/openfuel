<!DOCTYPE html>
<html>
  <head>
    <?php

    $this->load->view('includes/normalize');
    $this->load->view('includes/foundation');
    $this->load->view('includes/main');

    ?>
    <title>Openfuel | Events</title>
  </head>
  
  <body>

      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <!-- Title Area -->
          <li class="name">
            <h1><a href="#"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Openfuel" height="30px" width="180px"></a></h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
     
        <section class="top-bar-section">
          <!-- Right Nav Section -->
          <ul class="right">
            <li class="divider"></li>
            <li class="has-dropdown">
              <a href="#">Events</a>
              <ul class="dropdown">
                <li><label>Filter Events</label></li>
                <li><a href="#">This Week</a></li>
                <li><a href="#">This Month</a></li>
                <li><a href="#">By Category</a></li>
                <li class="divider"></li>
                <li><a href="#">See all &rarr;</a></li>
              </ul>
            </li>
            <li class="divider"></li>
            <li class="has-dropdown">
            <?php 

            if($this->session->userdata('user_type') == 'organization')
            {
            
            ?>

              <a href="#">Organize</a>
              <ul class="dropdown">
                <li><a href="#">Event</a></li>
              </ul>

            <?php

            }
            elseif($this->session->userdata('user_type') == 'user')
            {
            
            ?>

              <a href="#">My Projects</a>
              <ul class="dropdown">
                <li><a href="#">Create Project</a></li>
                <li class="divider"></li>
                <li><a href="#">See all projects &rarr;</a></li>
              </ul>
            
            <?php

            }

            else
            {

            }

            ?>
            </li>
            <li class="divider"></li>
            <li class="has-dropdown">
              <a href="#">Profile</a>
              <ul class="dropdown">
                <li><a href="#">Edit Profile</a></li>
                <li><a href="#">Logout</a></li>
              </ul>
            </li>
          </ul>
        </section>
      </nav>

        <div class="row">
    <div class="large-12 columns">
 
    <!-- Content Slider -->
 
      <div class="row">
        <div class="large-12 hide-for-small">
 
          <div id="featured" data-orbit>
              <img src="http://placehold.it/1200x500&text=Slide Image 1" alt="slide image">
              <img src="http://placehold.it/1200x500&text=Slide Image 2" alt="slide image">
              <img src="http://placehold.it/1200x500&text=Slide Image 3" alt="slide image">
            </div>
 
      </div>
    </div>
 
    <!-- End Content Slider -->
 
    <!-- Mobile Header -->
 
      <div class="row">
        <div class="large-12 columns show-for-small">
 
          <img src="http://placehold.it/1200x700&text=Mobile Header">
 
        </div>
      </div><br>
 
    <!-- End Mobile Header -->
 
 
      <div class="row">
        <div class="large-12 columns">
          <div class="row">
            <!-- Shows -->
            <div class="large-4 small-6 columns">
 
              <h4>Upcoming Shows</h4><hr>
 
              <div class="row">
                <div class="large-1 column">
                  <img src="http://placehold.it/50x50&amp;text=[img]">
                </div>
 
                <div class="large-9 columns">
                  <h5><a href="#">Venue Name</a></h5>
                  <h6 class="subheader show-for-small">Doors at 00:00pm</h6>
                </div>
              </div><hr>
 
              <div class="hide-for-small">
                <div class="row">
                  <div class="large-1 column">
                    <img src="http://placehold.it/50x50&amp;text=[img]">
                  </div>
 
                  <div class="large-9 columns">
                    <h5 class="subheader"><a href="#">Venue Name</a></h5>
                  </div>
                </div><hr>
 
                <div class="row">
                  <div class="large-1 column">
                    <img src="http://placehold.it/50x50&amp;text=[img]">
                  </div>
 
                  <div class="large-9 columns">
                    <h5 class="subheader"><a href="#">Venue Name</a></h5>
                  </div>
                </div><hr>
 
                <div class="row">
                  <div class="large-1 column">
                    <img src="http://placehold.it/50x50&amp;text=[img]">
                  </div>
 
                  <div class="large-9 columns">
                    <h5 class="subheader"><a href="#">Venue Name</a></h5>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Shows -->
 
 
            <!-- Image -->
 
            <div class="large-4 small-6 columns">
              <img src="http://placehold.it/300x465&amp;text=Image">
            </div>
 
            <!-- End Image -->
 
 
            <!-- Feed -->
 
            <div class="large-4 small-12 columns">
 
              <h4>Blog</h4><hr>
              <div class="panel">
                <h5><a href="#">Post Title 1</a></h5>
 
                <h6 class="subheader">
                  Risus ligula, aliquam nec fermentum vitae, sollicitudin eget urna. Suspendisse ultrices ornare tempor...
                </h6>
 
                <h6><a href="#">Read More »</a></h6>
              </div>
 
              <div class="panel hide-for-small">
                <h5><a href="#">Post Title 2 »</a></h5>
              </div>
 
              <div class="panel hide-for-small">
                <h5><a href="#">Post Title 3 »</a></h5>
              </div>
 
              <a href="#" class="right">Go To Blog »</a>
 
            </div>
 
            <!-- End Feed -->
 
          </div>
        </div>
      </div>
 
    <!-- End Content -->
 
 
    <!-- Footer -->

 
    <!-- End Footer -->
 
    </div>
  </div>
 
  <script src="http://localhost/openfuel/assets/js/jquery-1.11.0.min.js"></script>
  <script src="http://localhost/openfuel/assets/js/foundation.js"></script>
  <script src="http://localhost/openfuel/assets/js/foundation.orbit.js"></script>
  <script src="http://localhost/openfuel/assets/js/foundation.min.js"></script>
  
  <script>
  document.write('<script src=js/vendor/' +
  ('__proto__' in {} ? 'zepto' : 'jquery') +
  '.js><\/script>')
  </script>

  <script>
    $(document).foundation();
  </script>

<!-- End Footer -->
    <script>
      $(document).foundation();
      var doc = document.documentElement;
      doc.setAttribute('data-useragent', navigator.userAgent);
    </script>

  </body>
</html>