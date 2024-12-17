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
                            <h5 class="m-b-10">Requestor List</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid" style="margin-top:10px">
            <div class="row">
                <!-- [ requestor-form ] start -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Requestor</h5>
                        </div>
                        <div class="card-body">
                            <form role="form" enctype="multipart/form-data" method="post" action="">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="customerName">Customer Name</label>
                                            <input type="text" class="form-control" id="customerName"value="<?php if(!empty($tax_data['c_name'])){echo $tax_data['c_name'];}else{echo '';}?>" name="c_name" placeholder="Enter customer name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="businessAddress">Business Address</label>
                                            <input type="text" class="form-control" id="businessAddress" value="<?php if(!empty($tax_data['busi_name'])){echo $tax_data['busi_name'];}else{echo '';}?>" name="busi_name" placeholder="Enter business address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="businessArea">Business Area</label>
    <select class="custom-select2 form-control"  name="busi_area" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1">
                                                <?php 
                    if(!empty($taxlist2)){
                      foreach($taxlist2 as $key=> $value){
                          $duration1='';
                                if($value['id'] ==  $tax_data['area_name'] ){
                                     $duration1= 'selected';
								}          
  ?>
              
                          

      <option    value="<?php echo $value['id'];  ?>" <?php echo  $duration1; ?> <?php echo !empty($area_data['area_name']) && $area_data['area_name']==$value['area_name']    ?> ><?php echo $value['area_name']  ;?></option>
     
                                            <?php
                      }
                    }
                  ?>
                                                            </select>                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="requestorName">Requestor Name</label>
                                            <input type="text" class="form-control" id="requestorName" placeholder="Enter requestor name" value="<?php if(!empty($tax_data['req_name'])){echo $tax_data['req_name'];}else{echo '';}?>" name="req_name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter email" value="<?php if(!empty($tax_data['email'])){echo $tax_data['email'];}else{echo '';}?>" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="phone">Phone No</label>
                                            <input type="text" class="form-control" id="phone" placeholder="Enter phone number" value="<?php if(!empty($tax_data['phone_no'])){echo $tax_data['phone_no'];}else{echo '';}?>" name="phone_no">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="city">City</label>
                                            <input type="text" class="form-control" id="city" placeholder="Enter city" value="<?php if(!empty($tax_data['city'])){echo $tax_data['city'];}else{echo '';}?>" name="city">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="pwd" placeholder="Enter password"value="<?php if(!empty($tax_data['pwd'])){echo $tax_data['pwd'];}else{echo '';}?>" name="pwd">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                    <input type="hidden" name="id" value="<?php if(!empty($tax_data['id'])){echo $tax_data['id'];}else{echo "";}?>">
     <button type="submit" name="submit"  class="btn btn-primary">Submit</button>                              

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- [ requestor-form ] end -->

                <!-- [ requestor-list ] start -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h5>Requestor List</h5>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="search" class="form-control" id="search" placeholder="Search">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>Customer Name</th>
                                            <th>Business Address</th>
                                            <th>Business Area</th>
                                            <th>Requestor Name</th>
                                            <th>Email ID</th>
                                            <th>Phone No</th>
                                            <th>City</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
$count = 1; 
if (!empty($taxlist)) {
    foreach ($taxlist as $getdata) {
    $category1 = $this->Common_model->getSingleRecordById('business_area',array('id'=> $getdata['busi_area']));    

       ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo (!empty($getdata['c_name']) ? $getdata['c_name'] : 'none'); ?></td>
                                            <td><?php echo (!empty($getdata['busi_name']) ? $getdata['busi_name'] : 'none'); ?></td>
                                            <td><?php echo (!empty($category1['area_name']) ? $category1['area_name'] : 'none'); ?></td>
                                            <td><?php echo (!empty($getdata['req_name']) ? $getdata['req_name'] : 'none'); ?></td>
                                            <td><?php echo (!empty($getdata['email']) ? $getdata['email'] : 'none'); ?></td>
                                            <td><?php echo (!empty($getdata['phone_no']) ? $getdata['phone_no'] : 'none'); ?></td>
                                            <td><?php echo (!empty($getdata['city']) ? $getdata['city'] : 'none'); ?></td>
                                            <td>Active</td>
                                            <td>
                                                <a class="btn btn-warning" style="margin-left:10px;" href="<?php echo base_url() ?>welcome/requesterlist/<?php echo $getdata['id']; ?>" title="Edit">
                        Edit</a>
                                 <a href="javascript:void(0)" href-data="<?php echo  $getdata['id']; ?>" class="dropdown-itemm"   title="Delete"><i class="dw dw-delete-3" aria-hidden="true"></i>Delete</a>
                                                </td>
                                        </tr>
                                        <?php 
        $count++;
    }
}
?>
                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ requestor-list ] end -->
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <!-- [ Main Content ] end -->
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
<script src="<?php echo base_url();?>home/assets/js/pages/dashboard-main.js"></script>
<script src="<?php echo base_url();?>home/assets/js/plugins/apexcharts.min.js"></script>


<!-- custom-chart js -->
<script src="<?php echo base_url();?>home/assets/js/pages/dashboard-main.js"></script>

<script src="<?php echo base_url();?>home/assets/vendors/scripts/core.js"></script>
        <script src="<?php echo base_url();?>home/assets/vendors/scripts/script.min.js"></script>
        <script src="<?php echo base_url();?>home/assets/vendors/scripts/process.js"></script>
        <script src="<?php echo base_url();?>home/assets/vendors/scripts/layout-settings.js"></script>
        <script src="<?php echo base_url();?>home/assets/src/plugins/datatables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url();?>home/assets/src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>home/assets/src/plugins/datatables/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url();?>home/assets/src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
        <!-- buttons for Export datatable -->
        <script src="<?php echo base_url();?>home/assets/src/plugins/datatables/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url();?>home/assets/src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
        <script src="<?php echo base_url();?>home/assets/src/plugins/datatables/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url();?>home/assets/src/plugins/datatables/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url();?>home/assets/src/plugins/datatables/js/buttons.flash.min.js"></script>
        <script src="<?php echo base_url();?>home/assets/src/plugins/datatables/js/pdfmake.min.js"></script>
        <script src="<?php echo base_url();?>home/assets/src/plugins/datatables/js/vfs_fonts.js"></script>
        <!-- Datatable Setting js -->
        <script src="<?php echo base_url();?>home/assets/vendors/scripts/datatable-setting.js"></script>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
                style="display: none; visibility: hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <!-- switchery js -->
        <script src="<?php echo base_url();?>home/assets/src/plugins/switchery/switchery.min.js"></script>
        <!-- bootstrap-tagsinput js -->
        <script src="<?php echo base_url();?>home/assets/src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
        <!-- bootstrap-touchspin js -->
        <script src="<?php echo base_url();?>home/assets/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
        <script src="<?php echo base_url();?>home/assets/vendors/scripts/advanced-components.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
  $(function () {

    $('#customertable').DataTable({

      "paging": true,

      "lengthChange": false,

      "searching": true,

      "ordering": true,

      "info": true,

      "autoWidth": false

    });
  });
  $(".dropdown-itemm").click(function(e){
    var val = confirm("Are you sure, you want to delete  requestlist ?");
    if (val == true){
     setTimeout(function(){location.reload()},1000);
    }
    
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>welcome/deleteRecord",
        data:{table:'org_list',id:id,status:3,colwhr:'id',whrstatuscol:'status',action:"Delete"},
        dataType:'json',
        success: function(response) {
          if (response.status == 1){
            $.notify(response.msg, "success");
            setTimeout(function(){location.reload()},1000);
          }else{
            $.notify(response.msg, "error");
          }
        }
      });
    }
  });
  $(".deactive").click(function(e){
        var val = confirm("Are you sure, you want to delete requester ?");
        if (val == true){
     setTimeout(function(){location.reload()},1000);
    }
    
        //e.preventDefault(); 
        var id = $(this).attr("href-data");
       
        if(val){
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>welcome/change_status",
              data:{tablename:'org_list',id:id,status:0,whrcol:'id',whrstatuscol:'status',action:"Deactive"},
              dataType:'json',
              success: function(response) {
                if (response.status == 1){
                  $.notify(response.msg, "success");
                  setTimeout(function(){location.reload()},1000);
                }else{
                  $.notify(response.msg, "error");
                }
              }
          });
        }
  });
  $(".useractive").click(function(e){
    var val = confirm("Are you, sure you want to activate requester?");
    if (val == true){
       setTimeout(function(){location.reload()},1000);
    }
    
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>welcome/change_status",
        data:{tablename:'org_list',id:id,status:1,whrcol:'id',whrstatuscol:'status',action:"Active"},
        dataType:'json',
        success: function(response) {
          if (response.status == 1){
            $.notify(response.msg, "success");
            setTimeout(function(){location.reload()},1000);
          }else{
            $.notify(response.msg, "error");
          }
        }
      });
    }
  });
});
</script>
</body>
</html>
