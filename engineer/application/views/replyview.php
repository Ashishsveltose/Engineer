<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ticket Management System</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
    	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    	<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Favicon icon -->
    <!-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> -->

    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo base_url();?>home/assets/css/style.css">
     <style>
        .form-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        input[type="text"], button {
            padding: 8px;
            font-size: 16px;
        }

        /* Hide the file input */
        input[type="file"] {
            display: none;
        }

        /* Style for the upload icon */
        .upload-icon {
            cursor: pointer;
        }
    </style>
    

</head>
<body class="">
<?php  
  $session_userdata = $this->session->userdata(USER_SESSION); 
  ?>
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
                            <h5 class="m-b-10">Add Ticket</h5>
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
            <h5>Conversation</h5>
        </div>
        <div class="card-body">
        <div class="row" style="margin-bottom:10px">
       <?php
$printedIds = [];  // Array to track already printed reply_ids

if (!empty($taxlist)) {
    foreach ($taxlist as $getdata) {
        $reply_id = $getdata['reply_id'];  // Unique identifier

        // Check if this reply_id has already been printed
        if (in_array($reply_id, $printedIds)) {
            continue;  // Skip the block if reply_id was already printed
        }

        // Get record from ticket_list
        $category1 = $this->Common_model->getSingleRecordById('ticket_list', array('id' => $reply_id));
        
        // Output the block
        ?>
        <div class="row">
            <div class="col-md-2">
                <h6>ID : <?php echo 00;?><?php echo (!empty($category1['id']) ? $category1['id'] : 'none'); ?></h6>
            </div>
            <div class="col-md-4">
                <h6><?php echo (!empty($category1['ticket_subject']) ? $category1['ticket_subject'] : 'none'); ?></h6>
            </div>
            <div class="col-md-6">
                <div style="height:4rem; overflow-y: scroll; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;"> 
                    <p style="padding:5px">
<?php echo (!empty($category1['ticket_descript']) ? $category1['ticket_descript'] : 'none'); ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
        // Add this reply_id to the array so it won't be printed again
        $printedIds[] = $reply_id;
    }
}
?>


      <div class="row">
    <?php
    if (!empty($taxlist)) {
        foreach ($taxlist as $getdata) {
            // Determine if the user_id matches session user_id
            $id = $getdata['user_id']; 
            $isRightSide = ($id == $session_userdata['id']);  // True if message should be on the right

            $category1 = $this->Common_model->getSingleRecordById('org_list', array('id'=> $getdata['user_id']));
            ?>
            <div class="col-md-12">
                <div class="row <?php echo $isRightSide ? 'justify-content-end' : 'justify-content-start'; ?>">
                    <div class="col-md-6 <?php echo $isRightSide ? 'text-right' : 'text-left'; ?>">
                        <div style="margin-top:5px;padding: 10px 15px; display: inline-block; border-radius: 10px 20px; background-color: #4680ff; text-align: <?php echo $isRightSide ? 'right' : 'left'; ?>;">
                            <p style="color: white; margin: 0;">
                                <?php 
                                if (!empty($category1['full_name'])) {
                                    echo $category1['full_name'];
                                } else {
                                    echo (!empty($category1['c_name']) ? $category1['c_name'] : 'none');
                                }
                                ?>
                            </p>
                            <p style="color: white; margin: 5px 0;">
                                <?php echo (!empty($getdata['reply']) ? $getdata['reply'] : 'none'); ?>            
                            </p>
                            <div style="text-align:<?php echo $isRightSide ? 'right' : 'left'; ?>;">
                                <span style="color:white; font-size:12px;">
                                    <?php
                                    if (!empty($getdata['created_date'])) {
                                        // Convert the created_date to a timestamp and format it to show day, month, and time
                                        $formattedDate = date('d M h:i A', strtotime($getdata['created_date']));
                                        echo $formattedDate;
                                    } else {
                                        echo 'none';
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
        }
    }
    ?>
</div>
</div>
    
<div   style="padding:10px">
<form role="form" enctype="multipart/form-data" method="post" action="">

<div class="row" >
    <div class="col-md-10">
    <input type="text" placeholder="Enter your Reply..." value="<?php if(!empty($tax_data['reply'])){echo $tax_data['reply'];}else{echo '';}?>" name="reply" style="border: none;outline: none;width:100%;border-bottom:1px solid black">
    </div>
    <div class="col-md-2" style="margin-top:10px">
 
<!--<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708z"/>
  <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383m.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
</svg>-->
    <input type="hidden" name="id" value="<?php if(!empty($tax_data['id'])){echo $tax_data['id'];}else{echo "";}?>">

        <button type="submit" name="submit" class="btn btn-primary" style="padding-top:4px;padding-bottom:4px;margin-left:5px">Reply</button>
    </div>
</div>
 </form>  
    
        
        <!-- Hidden file input -->
        <input type="file" id="file-upload">
        
        <!-- SVG icon that will trigger the file input -->
      
    </div>
   <div style="margin :20px">
   <!--  <button type="button" class="btn btn-primary" onclick="branch()">Replay</button>-->
</div>

                    </div>
                            </div>
                        </div>
<!-- Modal HTML -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Your Reply</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Add a form for reply submission -->
        <form id="replyForm" method="post" action="">
          <input type="text" name="reply" style="width:100%;border:1px solid gray" placeholder="Enter Your Message"value="<?php if(!empty($tax_data['reply'])){echo $tax_data['reply'];}else{echo '';}?>" name="reply">
          <div class="form-group mt-3">
            <button type="submit" name="submit" class="btn btn-primary">Send Reply</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
    function branch() {
        // Get the current URL
        var currentUrl = window.location.href;
        
        // Extract the ID from the current URL
        var id = currentUrl.split('/').pop();
        
        // Construct the new URL with the extracted ID
        var newUrl = "https://chauffit.com/requester/addreply?id=" + id;
        
        // Redirect to the new URL
        window.location.href = newUrl;
    }
</script>
    <script src="<?php echo base_url();?>home/assets/js/vendor-all.min.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/ripple.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
<script src="<?php echo base_url();?>home/assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="<?php echo base_url();?>home/assets/js/pages/dashboard-main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Sample data for Managers and Engineers
    var managers = <?php echo json_encode($taxlist3); ?>;
    var engineers = <?php echo json_encode($taxlist4); ?>;

    function updateDropdowns() {
        var selectedBusinessArea = $('#busi_area').val();

        // Clear existing options
        $('#assign_man').empty().append('<option value="">--select option--</option>');
        $('#assign_engg').empty().append('<option value="">--select option--</option>');

        // Filter and populate Managers
        $.each(managers, function(index, manager) {
            if (manager.busi_area == selectedBusinessArea) {
                $('#assign_man').append('<option value="'+manager.id+'">'+manager.full_name+'</option>');
            }
        });

        // Filter and populate Engineers
        $.each(engineers, function(index, engineer) {
            if (engineer.busi_area == selectedBusinessArea) {
                $('#assign_engg').append('<option value="'+engineer.id+'">'+engineer.full_name+'</option>');
            }
        });
    }

    // Call the function on page load
    updateDropdowns();

    // Bind the function to the change event of the Business Area dropdown
    $('#busi_area').change(function() {
        updateDropdowns();
    });
});
</script>
  <script>
        document.getElementById('file-upload').addEventListener('change', function() {
            console.log(this.files[0]); // Log the selected file for example
        });
    </script>
</body>

</html>
