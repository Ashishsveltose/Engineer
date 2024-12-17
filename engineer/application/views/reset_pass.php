<!DOCTYPE html>
<html lang="en">

<head>

	<title>Requester Panel</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="<?php echo base_url();?>home/assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="<?php echo base_url();?>home/assets/css/style.css">
	
	


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
            <div class="login-title">
                              	<td colspan="2"><?php echo @$error; ?></td>
                                   <?php if(isset($error) && !empty($error)){ ?>
  				                <div class="alert alert-danger" align="center">
                                  <strong><?php echo $error; ?></strong>
                                </div>
                                   <?php } ?>
                                   <?php if(isset($success) && !empty($success)){ 
                                     echo '<div class="alert alert-success alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-close"></i></button><h4><i class="fa fa-spinner fa-spin"></i>'.$success.'</h4></div>';
                                     echo '<meta http-equiv="refresh" content="2;url='.base_url('pageindex').'">';
                                    } ?>
                             </div>
							
				<div class="col-md-12">
                <form method="post">
					<div class="card-body">
						<!--<img src="<?php echo base_url();?>home/assets/images/chauffit.png" style="width:135px;height:129px;" alt="" class="img-fluid mb-4">-->
						<h4 class="mb-3 f-w-400">Forget Password</h4>
						<div class="form-group mb-3">
							<label class="floating-label" for="Email">New Password</label>
							<input type="text" class="form-control"  id="login-username" name="pwd" autocomplete="new-password" placeholder="password" value=""  placeholder="Enter New Password" >
						</div>
						<!--<div class="form-group mb-3">
							<label class="floating-label" for="Email">Confirm Password</label>
							<input type="text" class="form-control"   placeholder="Enter Confirm Password" >
						</div>-->
					
						<button  class="btn btn-block btn-primary mb-4" type="submit" name="login" value="login">Save Password</button>
					
						
						 
					</div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="<?php echo base_url();?>home/assets/js/vendor-all.min.js"></script>
<script src="<?php echo base_url();?>home/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>home/assets/js/ripple.js"></script>
<script src="<?php echo base_url();?>home/assets/js/pcoded.min.js"></script>



</body>

</html>
