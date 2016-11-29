<?php require_once('header.php'); ?>

<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">

		<!--SIDE NAVIGATION MENU-->
	<?php require_once('sidenav.php'); ?>

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
	<?php foreach ($job_post as $job_list) { ?>
						<li class="timeline-grey">
							<div class="timeline-time">
								<span class="date">
								<img width="100" height="100" class="avatar img-circle" src="<?php echo base_url().''.$job_list->pics; ?>" alt=""> </span> 
								
							</div>
							
							<div class="timeline-body">
								<h2><?php echo $job_list->company_name; ?></h2>
								<h4><?php echo $job_list->job_title; ?></h4>
								<div class="timeline-content">
									<br><h4>Qualification:</h4> <?php echo substr($job_list->qualification, 0, 50); ?> ...
								</div>
								<div class="timeline-footer">
									<?php $session_data = $this->session->userdata('logged_in'); 
										if ($session_data['type'] == "Company") { ?>
				
									<?php } ?>

								
									<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#myModal<?php echo $job_list->post_id;?>">
									  View More <i class="fa fa-plus"></i>
									</button>

								</div>
							</div>
						</li>
		<?php } ?>
<!-- END  FEEDS-->

					</ul>
				</div>
			</div>
			
			
			<?php foreach ($job_post as $job_list) { ?>
			<!-- Modal -->
				<div class="modal fade" id="myModal<?php echo $job_list->post_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				        <h4 class="modal-title" id="myModalLabel"><b><?php echo $job_list->job_title; ?></b></h4>
				      </div>
				      <div class="modal-body">
				        <h2><?php echo $job_list->company_name; ?></h2>
				        <h4>Qualification:</h4> <?php echo $job_list->qualification; ?>
				      </div>
				      <div class="modal-footer">
				        
						<?php $session_data = $this->session->userdata('logged_in'); 
						if ($session_data['type'] != "Company") { ?>	        
							        
							        <a href="<?php echo base_url('Main/book/').''.$user_id.'/'.$job_list->post_id.'/'.$job_list->id."/".$job_list->category_id; ?>" class="btn blue pull-right">Book <i class="fa fa-plus"></i></a>
							        <a href="<?php echo base_url('Main/notify/').''.$user_id.'/'.$job_list->post_id.'/'.$job_list->id."/apply"; ?>"><button type="button" class="btn green pull-right">Apply<i class="fa fa-check"></i></button></a>
						<?php } ?>

						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
			<?php } ?>
			
			
			
			
				
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>
<!-- END CONTAINER -->
<?php require_once('footer.php'); ?>
