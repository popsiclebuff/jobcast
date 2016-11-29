<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<!-- <div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div> -->
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
				<?php if($this->uri->segment(2) == "company_main"){ ?>
				<li class="start active open">
				<?php }else{ ?>
				<li>
				<?php } ?>
					<a href="<?php echo base_url(); ?>">
					<i class="icon-home"></i>
					<span class="title">Home</span>
					<!-- <span class="selected"></span>
					<span class="arrow open"></span> -->
					</a>
				</li>

				<?php if($this->uri->segment(2) == "profile" || $this->uri->segment(2) == "edit_profile"){ ?>
				<li class="start active open">
				<?php }else{ ?>
				<li>
				<?php } ?>
					<a href="<?php echo base_url('Main/profile/').$user_id; ?>">
					<i class="icon-user"></i>
					<span class="title">Profile</span>
					</a>
				</li>
			<?php 
			$session_data = $this->session->userdata('logged_in'); 
			if ($session_data['type'] == "Company") { ?>
			
				<li>
					<a href="javascript:;">
					<i class="fa fa-pencil"></i>
					<span class="title">Postings</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="<?php echo base_url('Main/Add_posting/').$user_id; ?>">
							<span class="icon-plus"></span>
							Add Posting</a>
						</li>
					</ul>
				</li>
			<?php } ?>

				<li>
					<a href="<?php echo base_url('Main/notify'); ?>">
					<i class="icon-bell"></i>
					<span class="title">Notifications</span>
					<?php $session_data = $this->session->userdata('logged_in'); 
					if ($session_data['type'] != "Company") {
						echo "<font color='red'>( ".$noty." )</font>";
					}else{
						echo "<font color='red'>( ".$aply." )</font>";
						} ?>
					</a>
				</li>
	<?php if($session_data['type'] != "Company"){ ?>
				<li>
					<a href="<?php echo base_url('Main/book_manage'); ?>">
					<i class="fa fa-bookmark"></i>
					<span class="title">Bookmarks</span>
					</a>
				</li>
		<?php } if($session_data['type'] == "Company"){ ?>
				<li>
					<a href="<?php echo base_url('Main/book_manage'); ?>">
					<i class="fa fa-check"></i>
					<span class="title">Manage Applicants</span>
					</a>
				</li>
		<?php } ?>
				<li>
					<a href="<?php echo base_url('Main/changePass/').$user_id; ?>">
					<i class="fa fa-wrench"></i>
					<span class="title">Settings</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->