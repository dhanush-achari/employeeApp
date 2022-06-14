<style>
	.left-sidebar {
		background-color: #4285F4;
	}

	.profile-text h5,
	.profile-text a {
		color: #fff !important;
		font-weight: 700;
		font-size: 20px;
	}

	.profile-text {
		margin-bottom: 2rem;
	}

	.active .active {
		background-color: #85bfff !important;
		/* color: #111 !important; */
	}

	.sidebar-nav {
		background-color: #4285F4;
		color: #fff !important;
		font-weight: 400;
		font-family: Roboto;
	}

	#sidebarnav li a {
		background-color: #4285F4;
	}

	#sidebarnav li a:hover {
		background-color: #85bfff !important;
	}

	.sidebar-nav * {
		color: #fff !important;
	}

	.sidebar-nav li:hover {
		background-color: #85bfff !important;
	}
	.sidebar-nav .has-arrow:after {
    position: absolute;
    content: '';
    width: 7px;
    height: 7px;
    border-width: 1px 0 0 1px;
    border-style: solid;
    border-color: #fff !important;
    right: 1em;
    -webkit-transform: rotate(135deg) translate(0, -50%);
    -ms-transform: rotate(135deg) translate(0, -50%);
    -o-transform: rotate(135deg) translate(0, -50%);
    transform: rotate(135deg) translate(0, -50%);
    -webkit-transform-origin: top;
    -ms-transform-origin: top;
    -o-transform-origin: top;
    transform-origin: top;
    top: 47%;
    -webkit-transition: all .3s ease-out;
    -o-transition: all .3s ease-out;
    transition: all .3s ease-out
}
</style>
<aside class="left-sidebar">
	<!-- Sidebar scroll-->
	<div class="scroll-sidebar">
		<!-- User profile -->
		<?php
		$id = $this->session->userdata('user_login_id');
		$basicinfo = $this->employee_model->GetBasic($id);
		?>
		<div class="user-profile">
			<!-- User profile image -->
			<div class="profile-img"> <img src="<?php echo base_url(); ?>assets/images/users/<?php echo $basicinfo->em_image ?>" alt="user" />
				<!-- this is blinking heartbit-->
				<!-- <div class="notify setpos"> <span class="heartbit"></span> <span class="point"></span> </div> -->
			</div>

			<!-- User profile text-->
			<div class="profile-text">
				<h5><?php echo $basicinfo->first_name . ' ' . $basicinfo->last_name; ?></h5>
				<a href="<?php echo base_url(); ?>settings/Settings" class="dropdown-toggle u-dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="mdi mdi-settings"></i></a>
				<a href="<?php echo base_url(); ?>login/logout" class="" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
			</div>
		</div>
		<!-- End User profile text-->
		<!-- Sidebar navigation-->
		<nav class="sidebar-nav">
			<ul id="sidebarnav">
				<li class="nav-devider"></li>
				<li> <a href="<?php echo base_url(); ?>"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a></li>
				<?php if ($this->session->userdata('user_type') == 'EMPLOYEE') { ?>
					<li> <a class="has-arrow waves-effect waves-dark" href="<?php echo base_url(); ?>employee/view?I=<?php echo base64_encode($basicinfo->em_id); ?>" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Employees </span></a>
					</li>
					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-check"></i><span class="hide-menu">Projects </span></a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="<?php echo base_url(); ?>Projects/All_Projects">Projects </a></li>
							<li><a href="<?php echo base_url(); ?>Projects/All_Tasks"> Task List </a></li>
							<!--<li><a href="<?php #echo base_url(); 
																?>Projects/All_Tasks"> Field Visit</a></li>-->
						</ul>
					</li>
				<?php } else { ?>
					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building-o"></i><span class="hide-menu">Organization </span></a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="<?php echo base_url(); ?>organization/Department">Department </a></li>
							<li><a href="<?php echo base_url(); ?>organization/Designation">Designation</a></li>
						</ul>
					</li>
					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Employees </span></a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="<?php echo base_url(); ?>employee/Employees">Employees </a></li>
							<li><a href="<?php echo base_url(); ?>employee/Disciplinary">Disciplinary </a></li>
						</ul>
					</li>
					<li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-briefcase-check"></i><span class="hide-menu">Project </span></a>
						<ul aria-expanded="false" class="collapse">
							<li><a href="<?php echo base_url(); ?>Projects/All_Projects">Projects </a></li>
							<li><a href="<?php echo base_url(); ?>Projects/All_Tasks"> Task List </a></li>
							<li><a href="<?php echo base_url(); ?>Projects/Field_visit"> Field Visit</a></li>
						</ul>
					</li>
					<li> <a href="<?php echo base_url() ?>notice/All_notice"><i class="mdi mdi-clipboard"></i><span class="hide-menu">Notice <span class="hide-menu"></a></li>
					<li> <a href="<?php echo base_url(); ?>settings/Settings"><i class="mdi mdi-settings"></i><span class="hide-menu">Settings <span class="hide-menu"></a></li>
				<?php } ?>
			</ul>
		</nav>
		<!-- End Sidebar navigation -->
	</div>
	<!-- End Sidebar scroll-->
</aside>