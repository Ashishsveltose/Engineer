 <?php  
  $session_userdata = $this->session->userdata(USER_SESSION); 
  ?>

<!DOCTYPE html>
<html lang="en">



<head>
    <title>Ticket Management System</title>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    
    <link rel="stylesheet" href="<?php echo base_url();?>home/assets/css/style.css">
    
    

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>

<?php
include('header.php');
?>
	<header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
		
			
				<div class="m-header">
					<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
					<a href="#!" class="b-brand">
						<!-- ========   change your logo hear   ============ -->
						<img src="assets/images/logo.png" alt="" class="logo">
						<img src="assets/images/logo-icon.png" alt="" class="logo-thumb">
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
												<img class="img-radius" src="<?php echo base_url();?>home/assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
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
												<img class="img-radius" src="<?php echo base_url();?>home/assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Joseph William</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>10 min</span></p>
													<p>Prchace New Theme and make payment</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="<?php echo base_url();?>home/assets/images/user/avatar-1.jpg" alt="Generic placeholder image">
												<div class="media-body">
													<p><strong>Sara Soudein</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>12 min</span></p>
													<p>currently login</p>
												</div>
											</div>
										</li>
										<li class="notification">
											<div class="media">
												<img class="img-radius" src="<?php echo base_url();?>home/assets/images/user/avatar-2.jpg" alt="Generic placeholder image">
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
										<img src="<?php echo base_url();?>home/assets/images/user/avatar-1.jpg" class="img-radius" alt="User-Profile-Image">
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
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
             
                    <div class="col-sm-4 col-xl-4 col-lg-4">
                        <div class="card support-bar overflow-hidden">
                            <div class="card-body pb-0">
                             <div class="row">
                                    <div class="col-md-8 col-xl-8 col-lg-8">
                                <h4 class="m-0"><?php echo $pd =  $this->Common_model->getRecordCount('business_area',array('status'=>'0'));?></h4>
                               
 <h5 class=" ">Business Area</h5>
                                <p class="mb-3 mt-3"></p>
                                    </div>
                                    <div class="col-md-4 col-xl-4 col-lg-4">
                                        <div style="float:right;diplay:flex;justify-content:end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
  <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/>
  <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
</svg>
                                        </div>
                                    </div>
                                </div>
                               


                            </div>
                            <div id="support-chart"></div>
                            <div class="card-footer  text-white" style="background-color:#e3c4c5">
                                <div class="row text-center">
                                    <div class="col">
                                        <h4 class="m-0 text-white"></h4>
                                        <span></span>
                                    </div>
                                    <div class="col">
                                        <h4 class="m-0 text-white"></h4>
                                        <span></span>
                                    </div>
                                    <div class="col">
                                        <h4 class="m-0 text-white"3</h4>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    



                    <div class="col-sm-4 col-xl-4 col-lg-4">
                        <div class="card support-bar overflow-hidden">
                            <div class="card-body pb-0">
                             <div class="row">
                                    <div class="col-md-8 col-xl-8 col-lg-8">
<h4 class=" ">
<?php echo $pd =  $this->Common_model->getRecordCount('ticket_list',array('assign_engg'=>$session_userdata['id'],'status'=>0));?>
</h4>                                <h5 class=" ">To Be Assigned</h5>
                                                          <p class="mb-3 mt-3"></p>
                                    </div>
                                    <div class="col-md-4 col-xl-4 col-lg-4">
                                        <div style="float:right;diplay:flex;justify-content:end">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill-check" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
</svg>
                                        </div>
                                        
                                    </div>
                                </div>


                            </div>
                            <div id="support-chart1"></div>
                            <div class="card-footer   text-white" style="background-color:yellow">
                                <div class="row text-center">
                                    <div class="col">
                                        <h4 class="m-0 text-white"></h4>
                                        <span></span>
                                    </div>
                                    <div class="col">
                                        <h4 class="m-0 text-white"></h4>
                                        <span></span>
                                    </div>
                                    <div class="col">
                                        <h4 class="m-0 text-white"></h4>
                                        <span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
                <!-- support-section end -->
           
            
                <!-- page statustic card start -->
                 
                    <div class="col-sm-4 col-xl-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
<h4 class=" ">
<?php echo $pd =  $this->Common_model->getRecordCount('ticket_list',array('assign_engg'=>$session_userdata['id'],'status'=>1));?>

</h4>
                                        <h5 class="  m-b-0">Work in Progress</h5>
                                    </div>
                                    <div class="col-4 text-right">
                                           <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-reception-4" viewBox="0 0 16 16">
                                                <path d="M0 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v11a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5z"/>
                                              </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-c-yellow"  >
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0"></p>
                                    </div>
                                    <div class="col-3 text-right">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xl-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
<h4 class="">
<?php echo $pd =  $this->Common_model->getRecordCount('ticket_list',array('assign_engg'=>$session_userdata['id'],'status'=>2));?>

</h4>                                         <h5 class="m-b-0">On Hold</h5>
                                    </div>
                                    <div class="col-4 text-right">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-slash-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M11.354 4.646a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708l6-6a.5.5 0 0 1 .708 0"/>
</svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer  " style="background-color:#aedfed">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0"></p>
                                    </div>
                                    <div class="col-3 text-right">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xl-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-9">
<h4 class=" ">
<?php echo $pd =  $this->Common_model->getRecordCount('ticket_list',array('assign_engg'=>$session_userdata['id'],'status'=>3));?>

</h4>                                         <h5 class="  m-b-0">Waiting for Confirmation</h5>
                                    </div>
                                    <div class="col-3 text-right">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425z"/>
</svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer   " style="background-color:#a5ed97">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0"></p>
                                    </div>
                                    <div class="col-3 text-right">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xl-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
<h4 class="">
<?php echo $pd =  $this->Common_model->getRecordCount('ticket_list',array('assign_engg'=>$session_userdata['id'],'status'=>4));?>

</h4>                                         <h5 class=" m-b-0">Resolved</h5>
                                    </div>
                                    <div class="col-4 text-right">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
</svg>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer  bg-c-green"  >
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0"></p>
                                    </div>
                                    <div class="col-3 text-right">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-4 col-xl-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
<h4 class=" ">
<?php echo $pd =  $this->Common_model->getRecordCount('ticket_list',array('assign_engg'=>$session_userdata['id'],'status'=>5));?>

</h4>                                         <h5 class="  m-b-0">Duplicate Ticket</h5>
                                    </div>
                                    <div class="col-4 text-right">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
</svg>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer   " style="background-color:#ebcccc">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0"></p>
                                    </div>
                                    <div class="col-3 text-right">
                                       
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                     <div class="col-sm-4 col-xl-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-8">
<h4 class=" ">
<?php echo $pd =  $this->Common_model->getRecordCount('ticket_list',array('assign_engg'=>$session_userdata['id'],'status'=>6));?>

 
</h4>                                         <h5 class="  m-b-0">Cancelled</h5>
                                    </div>
                                    <div class="col-4 text-right">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
</svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="card-footer   " style="background-color:#ebcccc">
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <p class="text-white m-b-0"></p>
                                    </div>
                                    <div class="col-3 text-right">
                                       
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    
                    </div>
                              
    <!-- Required Js -->
    <script src="<?php echo base_url();?>home/assets/js/vendor-all.min.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/ripple.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="<?php echo base_url();?>home/assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="assets/js/pages/dashboard-main.js"></script>
</body>

</html>
