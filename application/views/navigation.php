<nav class="top-bar" data-topbar>
    <ul class="title-area">
		<!-- Title Area -->
		<li class="name">
			<h1><a href="./"><img src="./assets/img/logo.png" alt="Openfuel" height="30px" width="180px"></a></h1>
		</li>
		<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	</ul>

    <section class="top-bar-section">
		<!-- Right Nav Section -->
		<ul class="right">

			<?php

				if($this->session->userdata('user_type') == 'organization')
				{

				?>
				<!-- <li id="sb-search" class="sb-search">
					<form>
					<input class="sb-search-input" placeholder="Search Event..." type="search" value="" name="search" id="search">
					<input class="sb-search-submit" type="submit" value="">
					<span class="sb-icon-search"></span>
					</form>
				</li> -->
				<li class="divider"></li>
				<li class="has-dropdown">
					<a href="./events/">Events</a>
					<ul class="dropdown">
						<li><label>Filter Events</label></li>
						<li><a href="#">This Week</a></li>
						<li><a href="#">This Month</a></li>
						<li class="divider"></li>
						<li><a href="#">See all &rarr;</a></li>
					</ul>
				</li>
				<li class="divider"></li>
				<li class="has-dropdown">
					<a href="./events/events_info">Organize</a>
					<ul class="dropdown">
						<li><a href="./events/create_event">Event</a></li>
					</ul>
					<li class="divider"></li>
				</li>
				<li class="has-dropdown">
					<a href="./profile">Profile</a>
					<ul class="dropdown">
						<li><a href="./profile/edit_profile">Edit Profile</a></li>
						<li><a href="./login/logout">Logout</a></li>
					</ul>
				</li>

				<?php

				}
				elseif($this->session->userdata('user_type') == 'user')
				{

				?>
				<!-- <li id="sb-search" class="sb-search">
					<form>
					<input class="sb-search-input" placeholder="Enter your search term..." type="search" value="" name="search" id="search">
					<input class="sb-search-submit" type="submit" value="">
					<span class="sb-icon-search"></span>
					</form>
				</li> -->

				<li class="divider"></li>
				<li class="has-dropdown">
					<a href="./events/">Events</a>
					<ul class="dropdown">
						<li><label>Filter Events</label></li>
						<li><a href="#">This Week</a></li>
						<li><a href="#">This Month</a></li>
						<li class="divider"></li>
						<li><a href="#">See all &rarr;</a></li>
					</ul>
				</li>
				<li class="divider"></li>
				<li class="has-dropdown">
					<a href="./projects/my_projects">Projects</a>
					<ul class="dropdown">
						<li><a href="./projects/create_project">Create Project</a></li>
						<li class="divider"></li>
						<li><a href="./projects/my_projects">View my projects &nbsp &rarr;</a></li>
					</ul>
				</li>
				<li class="divider"></li>
				<li class="has-dropdown">
					<a href="./profile">Profile</a>
					<ul class="dropdown">
						<li><a href="./profile/edit_profile">Edit Profile</a></li>
						<li><a href="./login/logout">Logout</a></li>
					</ul>
				</li>

				<?php

				}
				elseif($this->session->userdata('user_type') == 'mentor')
				{

				?>
				<!-- <li id="sb-search" class="sb-search">
					<form>
					<input class="sb-search-input" placeholder="Enter your search term..." type="search" value="" name="search" id="search">
					<input class="sb-search-submit" type="submit" value="">
					<span class="sb-icon-search"></span>
					</form>
				</li> -->
				<li class="divider"></li>
				<li class="has-dropdown">
					<a href="./events/">Events</a>
					<ul class="dropdown">
						<li><label>Filter Events</label></li>
						<li><a href="#">This Week</a></li>
						<li><a href="#">This Month</a></li>
						<li class="divider"></li>
						<li><a href="#">See all &rarr;</a></li>
					</ul>
				</li>
				<li class="divider"></li>
				<li class="has-dropdown">
					<a href="#">My RECOs</a>
					<ul class="dropdown">
						<li><a href="#">Pending RECOs</a></li>
					</ul>
				</li>
				<li class="divider"></li>
				<li class="has-dropdown">
					<a href="./profile">Profile</a>
					<ul class="dropdown">
						<li><a href="./profile/edit_profile">Edit Profile</a></li>
						<li><a href="./login/logout">Logout</a></li>
					</ul>
				</li>

				<?php

				}
			?>

		</ul>
	</section>
</nav>