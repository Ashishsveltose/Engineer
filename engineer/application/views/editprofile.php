<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ticket Management System</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <!-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> -->

    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo base_url();?>home/assets/css/style.css">
    
    

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	<?php 
include('header.php');
    ?>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<!-- <img src="assets/images/logo.png" alt="" class="logo">
						<img src="assets/images/logo-icon.png" alt="" class="logo-thumb"> -->
					</a>
					<a href="#!" class="mob-toggler">
						<i class="feather icon-more-vertical"></i>
					</a>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a href="#!" class="pop-search"><i class="feather icon-search"></i></a>
							<div class="search-bar">
								<input type="text" class="form-control border-0 shadow-none" placeholder="Search hear">
								<button type="button" class="close" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
						</li>
					</ul>
					<ul class="navbar-nav ml-auto">
						<li>
							<div class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i></a>
								<div class="dropdown-menu dropdown-menu-right notification">
									<div class="noti-head">
										<h6 class="d-inline-block m-b-0">Notifications</h6>
										<div class="float-right">
											<a href="#!" class="m-r-10">mark as read</a>
											<a href="#!">clear all</a>
										</div>
									</div>
									<ul class="noti-body">
										<li class="n-title">
											<p class="m-b-0">NEW</p>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>John Doe</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>5 min</span></p>
													<p>New ticket Added</p>
												</div>
											</div>
										</li>
										<li class="n-title">
											<p class="m-b-0">EARLIER</p>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
													<p>Prchace New Theme and make payment</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
													<p>currently login</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>30 min</span></p>
													<p>Prchace New Theme and make payment</p>
												</div>
											</div>
										</li>
									</ul>
									<div class="noti-footer">
										<a href="#!">show all</a>
									</div>
								</div>
							</div>
						</li>
						<li>
							<div class="dropdown drp-user">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="feather icon-user"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right profile-notification">
									<div class="pro-head">
										<img src="assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
										<span>John Doe</span>
										<a href="auth-signin.html" class="dud-logout" title="Logout">
											<i class="feather icon-log-out"></i>
										</a>
									</div>
									<ul class="pro-body">
										<li><a href="user-profile.html" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>
										<li><a href="email_inbox.html" class="dropdown-item"><i class="feather icon-mail"></i> My Messages</a></li>
										<li><a href="auth-signin.html" class="dropdown-item"><i class="feather icon-lock"></i> Lock Screen</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div style="margin:10px; background-color:white;padding:5px">
       <h3 style="margin-left:20px;margin-right:20px;margin-top:5px">XYTR Support Hub</h3>
        </div>
			
	</header>
	<!-- [ Header ] end -->
	
	

<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Add Tax</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Components</a></li>
                            <li class="breadcrumb-item"><a href="#!">Form Elements</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
            <!-- [ form-element ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Profile Information</h5>
                    </div>
                    <div class="card-body">
                    
<form role="form" enctype="multipart/form-data" method="post" action="">

<div class="row">
 <div class="col-md-6">
 <label for="exampleInputEmail1">Full Name
</label>
<input type="text" class="form-control" id="exampleInputEmail1"value="<?php if(!empty($tax_data['full_name'])){echo $tax_data['full_name'];}else{echo '';}?>" name="full_name" aria-describedby="emailHelp" placeholder="Enter Full name">
                                    
    </div>
	
	 <div class="col-md-6">
 <label for="exampleInputEmail1">Phone No
</label>
<input type="text" class="form-control" id="exampleInputEmail1"value="<?php if(!empty($tax_data['phone'])){echo $tax_data['phone'];}else{echo '';}?>" name="phone" aria-describedby="emailHelp" placeholder="Enter Phone Number">
       </div>
    <div class="col-md-6">
 <label for="exampleInputEmail1">Email address
</label>
<input type="text" class="form-control" id="exampleInputEmail1"value="<?php if(!empty($tax_data['email'])){echo $tax_data['email'];}else{echo '';}?>" name="email" aria-describedby="emailHelp" placeholder="Enter Email">
                                    
    </div>
	 <div class="col-md-6">
 <label for="exampleInputEmail1">Address
</label>
<input type="text" class="form-control" id="exampleInputEmail1"value="<?php if(!empty($tax_data['address'])){echo $tax_data['address'];}else{echo '';}?>" name="address" aria-describedby="emailHelp" placeholder="Enter Address">
                                    
    </div>
	 <div class="col-md-6">
 <label for="exampleInputEmail1">City
</label>
<input type="text" class="form-control" id="exampleInputEmail1"value="<?php if(!empty($tax_data['city'])){echo $tax_data['city'];}else{echo '';}?>" name="city" aria-describedby="emailHelp" placeholder="Enter city">
                                    
    </div>
	    <input type="hidden" name="id" value="<?php if(!empty($tax_data['id'])){echo $tax_data['id'];}else{echo "";}?>">
     <button type="submit" name="submit"  class="btn btn-primary mt-5">Save Changes</button>                              
                     

                                </form>    
								 <div class="mt-3">
								 
								 <h5>Change Password</h5>
 <hr>
 <form method="post" action="https://chauffit.com/engineer/welcome/editprofile1/<?php echo $session_userdata['id']; ?>">
    <div class="row">
        <!-- Current Password -->
        <div class="col-md-6">
            <label>Current Password</label>
            <div class="input-group">
                <input type="password" name="current_password" id="current-password" 
                       class="form-control" placeholder="Enter Current Password" required>
                <span class="input-group-text" onclick="togglePasswordVisibility('current-password')">
                    <i class="bi bi-eye" style="cursor: pointer;"></i>
                </span>
            </div>
        </div>

        <!-- New Password -->
        <div class="col-md-6">
            <label>New Password</label>
            <div class="input-group">
                <input type="password" name="new_password" id="new-password" 
                       class="form-control" placeholder="Enter New Password" required>
                <span class="input-group-text" onclick="togglePasswordVisibility('new-password')">
                    <i class="bi bi-eye" style="cursor: pointer;"></i>
                </span>
            </div>
        </div>

        <!-- Confirm Password -->
        <div class="col-md-6">
            <label>Confirm Password</label>
            <div class="input-group">
                <input type="password" name="confirm_password" id="confirm-password" 
                       class="form-control" placeholder="Enter Confirm Password" required>
                <span class="input-group-text" onclick="togglePasswordVisibility('confirm-password')">
                    <i class="bi bi-eye" style="cursor: pointer;"></i>
                </span>
            </div>
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary mt-5">Save Password</button>
</form>

<script>
function togglePasswordVisibility(fieldId) {
    const field = document.getElementById(fieldId);
    field.type = field.type === 'password' ? 'text' : 'password';
}
</script>

<script>
    // Function to toggle password visibility
    function togglePasswordVisibility(fieldId) {
        const inputField = document.getElementById(fieldId);
        inputField.type = inputField.type === 'pwd' ? 'text' : 'pwd';
    }
</script>
					  </div>       
								    </div>
                            </div>
                        </div>



    <!-- Required Js -->
	  <script>
        // Toggle for Current Password
        const toggleCurrentPassword = document.querySelector('#toggleCurrentPassword');
        const currentPassword = document.querySelector('#current-password');
        
        toggleCurrentPassword.addEventListener('click', function () {
            const type = currentPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            currentPassword.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    
        // Toggle for New Password
        const toggleNewPassword = document.querySelector('#toggleNewPassword');
        const newPassword = document.querySelector('#new-password');
        
        toggleNewPassword.addEventListener('click', function () {
            const type = newPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            newPassword.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    
        // Toggle for Confirm Password
        const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
        const confirmPassword = document.querySelector('#confirm-password');
        
        toggleConfirmPassword.addEventListener('click', function () {
            const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPassword.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    </script>
    
    <script src="<?php echo base_url();?>home/assets/js/vendor-all.min.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/ripple.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="<?php echo base_url();?>home/assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="<?php echo base_url();?>home/assets/js/pages/dashboard-main.js"></script>
</body>

</html>
