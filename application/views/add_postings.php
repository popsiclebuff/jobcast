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
<?php foreach ($mydata as $val) {} echo $msg; ?>
<div class="container">
    <h1>Add Posting</h1>
  	
	<div class="row">
      <!-- left column -->

      <div class="col-md-3">
        <div class="text-center">
          <?php if ($val->pics != ""){ ?>
            <img width="150" height="150" src="<?php echo base_url().''.$val->pics; ?>" class="avatar img-circle" alt="avatar">
          <?php }else{ ?>
            <img  src="<?php echo base_url().'profile_img/pro.png'; ?>" class="avatar img-circle" alt="avatar">
          <?php } ?>

      <form class="form-horizontal" role="form" action="<?php echo base_url('Main/Add_posting');?>" method="post">
          <input type="hidden" name="comp_id" value="<?php echo $val->userID; ?>">
           <input type="hidden" name="comp_pics" value="<?php echo $val->pics; ?>">
          
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-8 personal-info">
      <?php if ($post_ret == "success") { ?>
        <div class="alert alert-success alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          Posting new Job Success!.
        </div>
     <?php }else{ ?>
        <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          Please make sure and check if the information is correct.
        </div>
      <?php }  ?>
        <h3>Details</h3>
         <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">Job Category : </label>
            <div class="col-lg-8">
              <select name="category">
              <option>Choose...</option>
              <?php foreach ($jobs as $category) { ?>
                <option value="<?php echo $category->cat_id; ?>"><?php echo $category->title; ?></option>
              <?php  } ?>
              </select>
            </div>
          </div>
          <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">Position : </label>
            <div class="col-lg-8">
              <input class="form-control" required type="text" name="position" placeholder="Position title">
            </div>
          </div>
   
           <div class="form-group col-lg-12">
            <label class="col-lg-3 control-label">Qualification : </label>
            <div class="col-lg-8">
            <textarea placeholder="Qualification" rows="9" cols="64" name="about"></textarea>
              
            </div>
          </div>
          <div class="form-group col-lg-12">
           
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" name="submitpost" value="Post Now">
              <a type="button" class="btn btn-default" href="<?php echo base_url(); ?>">Cancel</a> 
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
