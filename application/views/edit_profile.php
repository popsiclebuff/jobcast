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


<!--Edit Profile-->
<?php foreach ($mydata as $val) {}
  echo $msg;
  echo $mgs;
   $session_data = $this->session->userdata('logged_in');
 ?>
<div class="container">
    <h1>Edit Profile</h1>
  	
	<div class="row">
      <!-- left column -->

      <div class="col-md-3">
        <div class="text-center">
          <?php if ($val->pics != ""){ ?>
            <img width="150" height="150" src="<?php echo base_url().''.$val->pics; ?>" class="avatar img-circle" alt="avatar">
          <?php }else{ ?>
            <img  src="<?php echo base_url().'profile_img/pro.png'; ?>" class="avatar img-circle" alt="avatar">
          <?php } ?>
          <h6>Upload a different photo...</h6>
     
      <form enctype='multipart/form-data' class="form-horizontal" role="form" action="<?php echo base_url('Main/edit_profile');?>" method="post">
          <input type="hidden" name="img" value="<?php echo $val->pics; ?>">
           <input type="hidden" name="logging" value="<?php echo $session_data['type']; ?>">
         
          <input type="file" class="form-control" name="file_upload">

    
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-8 personal-info">
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          Please make sure and check if the information is correct.
        </div>
        <h3>Personal info</h3>
        
        
          <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" required type="text" value="<?php echo $val->fname; ?>" name="fname">
            </div>
          </div>
          <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" required type="text" value="<?php echo $val->lname; ?>" name="lname">
            </div>
          </div>

          <?php  if ($session_data['type'] == "Company") { ?>
          <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">Company:</label>
            <div class="col-lg-8">
              <input class="form-control" required type="text" value="<?php echo $val->company_name; ?>" name="compname">
            </div>
          </div>
 <?php }else{ ?>
      <?php } ?>

          <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" required type="text" value="<?php echo $val->email; ?>" name="email">
            </div>
          </div>
          <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">Contact No:</label>
            <div class="col-lg-8">
              <input class="form-control" required type="text" placeholder="xx-xx-xxx" value="<?php echo $val->contact_no; ?>" name="contno">
            </div>
          </div>
 <?php if ($val->about == ""){ ?>
              
             <?php }else{ ?>

           <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">About Company</label>
            <div class="col-lg-8">
            <textarea placeholder="About your Company" rows="9" cols="66" name="about"><?php echo $val->about; ?></textarea>
              
            </div>
          </div>
     <?php } ?>
          <div class="form-group col-lg-12">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" disabled required type="text" value="<?php echo $val->username; ?>" name="username">
            </div>
          </div>
       
          <div class="form-group col-lg-12">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" name="save_change" value="Save Changes">
              <a type="button" class="btn btn-default" href="<?php echo base_url('Main/profile/').$user_id; ?>">Cancel</a> 
            </div>
          </div>
        </form>
      </div>
  </div>
</div>

<!--End Edit Profile-->
			</div>
			</div>
			</div>
		</div>
	</div>
	<!-- END CONTENT -->
	
</div>


<!-- END CONTAINER -->
<?php require_once('footer.php'); ?>
