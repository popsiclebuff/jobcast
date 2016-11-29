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
			
		<!--Profile Content-->
<div class="row">
<div class="col-md-4">


<!--My Profile-->
<?php foreach ($mydata as $val) {} ?>

<div class="container" id="my_profile">
    <h1>My Profile</h1>
  	
	<div class="row">
      <!-- left column -->

      <div class="col-md-3">
        <div class="text-center">
         <?php if ($val->pics != ""){ ?>
          	<img width="150" height="150" src="<?php echo base_url().''.$val->pics; ?>" class="avatar img-circle" alt="avatar">
          <?php }else{ ?>
			<img src="<?php echo base_url().'profile_img/pro.png'; ?>" class="avatar img-circle" alt="avatar">
          <?php } ?>
        
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-8 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          Edit your <strong>Profile</strong> for more information.
        </div>
        <h3>Personal info</h3>
        
 
          <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" disabled type="text" value="<?php echo $val->fname; ?>">
            </div>
          </div>
          <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" disabled type="text" value="<?php echo $val->lname; ?>">
            </div>
          </div>

<?php 
      $session_data = $this->session->userdata('logged_in');
      if ($session_data['type'] == "Company") { ?>

          <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">Company:</label>
            <div class="col-lg-8">
              <input class="form-control" disabled type="text" value="<?php echo $val->company_name; ?>">
            </div>
          </div>
    <?php }else{ ?>


      <?php } ?>
          <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" disabled type="text" value="<?php echo $val->email; ?>">
            </div>
          </div>
          <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">Contact No:</label>
            <div class="col-lg-8">
            <?php if ($val->contact_no == ""){ ?>
            	<input class="form-control" disabled type="text" placeholder="No Contact Number">
            <?php }else{ ?>
            	<input class="form-control" disabled type="text" value="<?php echo $val->contact_no; ?>">
              <?php } ?>
            </div>
          </div>
          
            
            <?php if ($val->about == ""){ ?>
            	
             <?php }else{ ?>
               <div class="form-group col-lg-12">
              <label class="col-lg-3 control-label">About Company</label>
            <div class="col-lg-8">
             	 <textarea disabled rows="9" cols="66"><?php echo $val->about; ?></textarea>
           
            </div>
          </div>
            <?php } ?>
          <div class="form-group col-lg-12">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" disabled type="text" value="<?php echo $val->username; ?>">
            </div>
          </div>
          <div class="form-group col-lg-12">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" disabled value="<?php echo $val->password; ?>">
            </div>
          </div>
          <div class="form-group col-lg-12">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
             <a href="<?php echo base_url('Main/edit_profile/').$user_id; ?>"><button class="btn btn-primary">Edit Profile</button></a>
            </div>
          </div>
      </div>
  </div>
</div>

<!--End My Profile-->
			</div>
			</div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>


<!-- END CONTAINER -->
<?php require_once('footer.php'); ?>
