<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Openfuel</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/foundation.css" />
  <link rel="stylesheet" type="text/css" href="./assets/css/home_view.css" />
  <!--[if lte IE 8]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
</head>

<body>
  <div class="row" id="intro">
      <canvas class="canvas"></canvas>

      <div class="ui">
        <input class="ui-input" hidden />
      </div>

      <div class="overlay"></div>
  </div>

  <div id="nav">
  <?php

    $this->load->view('navigation');

  ?>
  </div>

  <div class="row" id="login_splash">
    <form action="./login" method="post" id="login" name="login">
      <div class="row">
        <div class="large-6 columns small-centered padded-form">
          <label for="email_id">Email ID</label>
          <input type="email" id="email_id" name="email_id" maxlength="100" required />

          <label for="password">Password</label>
          <input type="password" id="password" name="password" maxlength="20" required />
          <div class="row">
            <div class="large-3 columns">
              <input type="submit" id="submit" name="submit" value="Sign In" class="button small" />
            </div>
            <div class="large-5 columns">
              <a class="button small" id="signuplink" name="signuplink">Sign Up</a>
            </div>
            <div class="large-3 columns"></div>
            <div class="large-3 columns"></div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <div id="regsec">
    <div class="row" id="reg-content">
      <div class="large-12 columns">
        <hr><h1>Being an Openfueler is <i>Awesome</i>.</h1><hr>
      </div>
    </div>

    <div class="support-note"><!-- let's check browser support with modernizr -->
      <!--span class="no-cssanimations">CSS animations are not supported in your browser</span-->
      <span class="no-csstransforms">CSS transforms are not supported in your browser</span>
      <!--span class="no-csstransforms3d">CSS 3D transforms are not supported in your browser</span-->
      <span class="no-csstransitions">CSS transitions are not supported in your browser</span>
      <span class="note-ie">Sorry, only modern browsers.</span>
    </div>

  <div class="row" id="reg-sections">

    <ul class="ch-grid">
          <li>
            <div class="ch-item ch-img-1">
              <div class="ch-info-wrap">
                <div class="ch-info">
                  <div class="ch-info-front ch-img-1"></div>
                  <div class="ch-info-back">
                    <p>To showcase your projects & ideas to the world, sign up <a href="./register/user_registration">HERE</a></p>
                  </div>
                </div>
              </div>
            </div>
            <br><img src=".//assets/img/ajax-loader.gif">
          </li>
          <li>
            <div class="ch-item ch-img-2">
              <div class="ch-info-wrap">
                <div class="ch-info">
                  <div class="ch-info-front ch-img-2"></div>
                  <div class="ch-info-back">
                    <p>To let the world know about your event(s), to make it's news spread like fire, sign up <a href="./register/org_registration">HERE</a></p>
                  </div>
                </div>
              </div>
            </div>
            <br><img src=".//assets/img/ajax-loader.gif">
          </li>
          <li>
            <div class="ch-item ch-img-3">
              <div class="ch-info-wrap">
                <div class="ch-info">
                  <div class="ch-info-front ch-img-3"></div>
                  <div class="ch-info-back">
                    <p>To help budding enterpreneurs find direction with their start up, sign up <a href="./register/mentor_registration">HERE</a></p>
                  </div>
                </div>
              </div>
            </div>
            <br><img src=".//assets/img/ajax-loader.gif">
          </li>
        </ul>

   </div>

  </div>

  <?php $this->load->view('includes/footer'); ?>

  <div id="error_prompt" class="row">
    <?php

    if(validation_errors() == TRUE) {
        echo validation_errors();
      }

    ?>
 </div>

  <script type="text/javascript" src="./assets/js/shapeshifter.js"></script>
  <?php $this->load->view('includes/jquery'); ?>

  <script type="text/javascript">

      $('#intro').delay(12000).hide('slow');
      $('#nav').delay(12000).show();
      $('#login_splash').delay(13000).show();

      $('#signuplink').on('click', function() {
        $('#regsec').show();
        $('html, body').animate({
          scrollTop: $('#regsec').offset().top
        }, 2000);
      });

  </script>
</body>
</html>