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
					<ul class="timeline">
						
<!-- FEEDS-->
<?php $session_data = $this->session->userdata('logged_in'); 
			if ($session_data['type'] != "Company") { 
			 foreach ($notyposted as $job_list) { ?>
						<li class="timeline-grey">
							<div class="timeline-time">
								<span class="date">
								<img width="30" height="30" class="avatar img-circle" src="<?php echo base_url().''.$job_list->pics; ?>" alt=""> </span> 
								
							</div>
							
							<div class="timeline-body">
								<?php echo "<b>".$job_list->job_title."</b><br><br>".$job_list->qualification.'<br>'; ?>
								
								<div class="timeline-footer">
<!-- 
								<a class="btn red pull-right" href="<?php echo base_url('Main/manage_app/').''.$user_id.'/'.$job_list->post_id.'/'.$job_list->id.'/del'; ?>">
									Delete <i class="fa fa-close"></i>
									</a> -->
							
								<!-- <a href="<?php echo base_url('Main/manage_app/').'decline/'.$user_id ?>"><button type="button" class="btn btn-danger">Delete<i class="fa fa-close"></i></button></a> -->


								<a class="btn green pull-right" href="<?php echo base_url('Main/notify/').''.$user_id.'/'.$job_list->post_id.'/'.$job_list->id."/apply"; ?>" >
									Apply Now <i class="fa fa-check"></i>
									</a>
									
								</div>
							</div>
						</li>
		<?php } }else{
			 foreach ($aplicnt as $apl) { ?>
			 	<li class="timeline-grey">
							<div class="timeline-time">
								<span class="date">
								<img width="30" height="30" class="avatar img-circle" src="<?php echo base_url().''.$apl->pics; ?>" alt=""> </span> 
								
							</div>
							
							<div class="timeline-body">
								<?php echo "<b>Applicant Name: ".$apl->fname." ".$apl->lname. "</b><br>Applying for: ".$apl->job_title; ?>
								<div class="timeline-footer">

								
	
									<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal<?php echo $apl->apply_id;?>">
									 View Profile <i class="fa fa-check"></i>
									</button>
									
								</div>
							</div>
						</li>
				
		<?php } }?>
<!-- END  FEEDS-->

					</ul>
				</div>
			</div>

<?php 
			$session_data = $this->session->userdata('logged_in'); 
			if ($session_data['type'] == "Company") { 
			 foreach ($aplicnt as $apl) { ?>
			<!-- Modal -->
				<div class="modal fade" id="myModal<?php echo $apl->apply_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				        <h4 class="modal-title" id="myModalLabel"><b><?php echo $apl->job_title; ?></b></h4>
				      </div>
				      <div class="modal-body">

				      <img width="100" height="100" class="avatar img-square" src="<?php echo base_url().''.$apl->pics; ?>" alt="">
				        <h2><?php echo $apl->fname." ". $apl->lname; ?></h2>

				        <b>Course: </b> <?php echo $apl->program; ?> <br>
				        <b>Contact No: </b> <?php echo $apl->contact_no; ?> <br>
				        <b>Email Address: </b> <?php echo $apl->email; ?> <br>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<!-- <a href="<?php echo base_url('Main/manage_app/').'decline/'.$apl->apply_id ?>"><button type="button" class="btn btn-danger">Delete<i class="fa fa-close"></i></button></a> -->
			
				      </div>
				    </div>
				  </div>
				</div>
			<?php } } ?>
		
			
				
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
<?php require_once('footer.php'); ?>
