<?php require_once('header.php'); ?>

<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">

		<!--SIDE NAVIGATION MENU-->
	<?php require_once('sidenav.php'); 
	echo $msg;
	?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			<!-- END PAGE HEADER-->
			<div class="clearfix">
			</div>
			<div class="row">
				<div class="col-md-12">
				
						
<!-- FEEDS-->
	

					
						        <h3>Change Password <span class="extra-title muted"></span></h3>
					<form method="POST" action="<?php echo base_url('Main/changePass/').$user_id;?>" >
						    <div class="col-md-12 personal-info"><br>
						        <div class="form-group col-lg-12">
						            <label for="current_password" class="col-lg-3 control-label">Current Password</label>
						            <div class="col-lg-8">
						                <input class="form-control" type="password" name="current_password">
						            </div>
						        </div>
						        <div class="form-group col-lg-12">
						            <label for="new_password" class="col-lg-3 control-label">New Password</label>
						            <div class="col-lg-8">
						                <input class="form-control" type="password" name="new_password">
						            </div>
						        </div>
						        <div class="form-group col-lg-12">
						            <label for="confirm_password" class="col-lg-3 control-label">Confirm Password</label>
						            <div class="col-lg-8">
						                <input class="form-control" type="password" name="confirm_password">
						            </div>
						        </div>      
						    </div>
						    <div class="modal-footer">
						        <button href="#" class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

		<?php $session_data = $this->session->userdata('logged_in'); 
			if ($session_data['type'] == "Company") { //Company ?>
						<input type="submit" class="btn btn-primary" name="save_change_comp" value="Save Changes">
				<?php }else{ //Applicant ?>
						<input type="submit" class="btn btn-primary" name="save_change_app" value="Save Changes">
					<?php } ?>
						    </div>
						
				</form>



								
								
<!-- END  FEEDS-->


				</div>
			</div>
			
			
				
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
<?php require_once('footer.php'); ?>
