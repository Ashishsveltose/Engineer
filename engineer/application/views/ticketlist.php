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
    <meta name="author" content="Phoenixcoded"/>
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
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Ticket List</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="container-fluid" style="margin-top:10px">
            <div class="row">
                <!-- [ business-area-table ] start -->
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">

                                <div class="col-md-4">
<!--<button type="button" class="btn btn-primary" onclick="business()">Add Ticket</button>-->
<a href='https://supporthub.xytr.org/ticket_admin/exportuserreport' class="btn btn-primary">Export</a> 

                                </div>
                                
                                <div class="col-md-4 mt-4">
                                    <div class="form-group">
                                    <!--    <input type="search" class="form-control" placeholder="Search">-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-border-style">

                         <div style="display:flex; float:right">
                         <label for="start_date" style="margin-right:5px">Start Date:</label>
<input type="date" id="start_date" style="margin-right:5px">
<label for="end_date" style="margin-right:5px">End Date:</label>
<input type="date" id="end_date" style="margin-right:5px">
<button id="filter" style="border:none; background-color:#4680ff;padding-left:15px;padding-right:15px;border-radius:3px;color:white">Filter</button>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL No</th>
                                            <th>TICKET ID</th>
                                             <th>Date</th>
                                           <th>Subject</th>
                                           <th>Status</th>
                                           <th>Reply</th>
                                            <th>REQUESTOR NAME</th>
                                            <th>Manager NAME</th>
                                            <th>BUSINESS AREA</th>
                                            <th>Attechment</th>
                                            <th>Action</th>
                                        </tr>
                                   </thead>
                                <?php
$count = 1; 
if (!empty($taxlist)) {
    foreach ($taxlist as $getdata) { 
        $category1 = $this->Common_model->getSingleRecordById('business_area',array('id'=> $getdata['busi_area']));
        $category2 = $this->Common_model->getSingleRecordById('org_list',array('id'=> $getdata['assign_man']));
        $category3 = $this->Common_model->getSingleRecordById('org_list',array('id'=> $getdata['assign_engg']));
        $category4 = $this->Common_model->getSingleRecordById('org_list',array('id'=> $getdata['req_name']));
       ?>
                                          <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo 00;?><?php echo (!empty($getdata['id']) ? $getdata['id'] : 'none'); ?></td>
                                            <td><?php echo (!empty($getdata['created_date']) ? $getdata['created_date'] : 'none'); ?></td>
                                            <td><?php echo (!empty($getdata['ticket_subject']) ? $getdata['ticket_subject'] : 'none'); ?></td>

                                            
 <?php if($getdata['status'] == 0){ ?>
                          <td>To be assigned</td>
                        <?php } if($getdata['status'] == 1){?>
                          <td>work in progress</td>
                          <?php } if($getdata['status'] == 2){?>
                          <td>On Hold</td>
<?php } if($getdata['status'] == 3){?>
                          <td>Waiting for confirmation</td>
<?php } if($getdata['status'] == 4){?>
                          <td>resolved</td>
                          <?php } if($getdata['status'] == 5){?>
                          <td>Duplicate Ticket</td>
                          <?php } if($getdata['status'] == 6){?>
                          <td>Cancalled</td>
                        <?php } ?>      
                          <td>
     <a href="https://supporthub.xytr.org/engineer/welcome/replyview/<?php echo htmlspecialchars($getdata['id']); ?>">
    
    <svg xmlns="http://www.w3.org/2000/svg" width="25" color="green" height="25" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
  <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576zm6.787-8.201L1.591 6.602l4.339 2.76z"/>
</svg>
</a>

                                          </td>                                 
                                            <td><?php echo (!empty($category4['req_name']) ? $category4['req_name'] : 'none'); ?></td>
                                            <td><?php echo (!empty($category2['full_name']) ? $category2['full_name'] : 'none'); ?></td>
                                            <td><?php echo (!empty($category1['area_name']) ? $category1['area_name'] : 'none'); ?></td>
                                           <td>
<a href="https://supporthub.xytr.org/requester//upload/channels/<?php echo urlencode($getdata['attachment']); ?>" target="_blank">
    <i class="fa fa-download" style="font-size: 18px; margin-left: 10px; cursor: pointer;" title="Download"></i>
</a>


</td>
                                            <td>
<a   style="margin-left:10px;" href="<?php echo base_url() ?>welcome/addticket/<?php echo $getdata['id']; ?>" title="Edit">
                         <svg xmlns="http://www.w3.org/2000/svg"   width="25" height="25" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
</svg></a>
     <!--                   
<a href="javascript:void(0)" href-data="<?php echo  $getdata['id']; ?>" class="dropdown-itemm"   title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="25" color="red" height="25" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></a>
                                            </td>-->
                                        </tr>

  <?php 
        $count++;
    }
}
?>
 </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ business-area-table ] end -->
            </div>
        </div>
    </div>
</div>

<!-- Add Business Area Modal -->
<div class="modal fade" id="addBusinessAreaModal" tabindex="-1" role="dialog" aria-labelledby="addBusinessAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBusinessAreaModalLabel">Add Business Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="businessAreaName">Business Area Name</label>
                        <input type="text" class="form-control" id="businessAreaName" placeholder="Enter business area name">
                    </div>
                    <div class="form-group">
                        <label for="businessAreaNote">Note</label>
                        <textarea class="form-control" id="businessAreaNote" rows="3" placeholder="Enter a note"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Business Area Modal -->
<div class="modal fade" id="editBusinessAreaModal" tabindex="-1" role="dialog" aria-labelledby="editBusinessAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBusinessAreaModalLabel">Edit Business Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="editBusinessAreaName">Business Area Name</label>
                        <input type="text" class="form-control" id="editBusinessAreaName" placeholder="Enter business area name">
                    </div>
                    <div class="form-group">
                        <label for="editBusinessAreaNote">Note</label>
                        <textarea class="form-control" id="editBusinessAreaNote" rows="3" placeholder="Enter a note"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    function business() {
        // Redirect to the desired URL
        window.location.href = 'https://supporthub.xytr.org/ticket_admin/addticket';
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

 <script src="<?php echo base_url();?>home/assets/js/vendor-all.min.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/plugins/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/ripple.js"></script>
    <script src="<?php echo base_url();?>home/assets/js/pcoded.min.js"></script>

<!-- Apex Chart -->
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
    var val = confirm("Are you sure, you want to delete ticket?");
    if (val == true){
     setTimeout(function(){location.reload()},1000);
    }
    
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>welcome/deleteRecord",
        data:{table:'ticket_list',id:id,status:3,colwhr:'id',whrstatuscol:'status',action:"Delete"},
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
        var val = confirm("Are you sure, you want to user ?");
        if (val == true){
     setTimeout(function(){location.reload()},1000);
    }
    
        //e.preventDefault(); 
        var id = $(this).attr("href-data");
        //alert(href);
        //var btn = this;
        if(val){
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>welcome/change_status",
              data:{tablename:'ticket_list',id:id,status:0,whrcol:'id',whrstatuscol:'status',action:"Deactive"},
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
    var val = confirm("Are you, sure you want to activate ticket?");
    if (val == true){
       setTimeout(function(){location.reload()},1000);
    }
    
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>welcome/change_status",
        data:{tablename:'ticket_list',id:id,status:1,whrcol:'id',whrstatuscol:'status',action:"Active"},
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#start_date, #end_date').change(function() {
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val();
        
        if (start_date && end_date) {
            $.ajax({
                url: '<?php echo base_url("welcome/filterTickets"); ?>', // Replace with your actual URL
                method: 'POST',
                data: { start_date: start_date, end_date: end_date },
                dataType: 'json',
                success: function(response) {
                    var tableBody = $('.table-striped tbody');
                    tableBody.empty();
                    
                    $.each(response.tickets, function(index, ticket) {
                        var row = '<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + (ticket.created_date ? ticket.created_date : 'none') + '</td>' +
                                    '<td>' + (ticket.ticket_id ? ticket.ticket_id : 'none') + '</td>' +
                                    '<td>' + (ticket.ticket_details ? ticket.ticket_details : 'none') + '</td>' +
                                    '<td>' + (ticket.customer_name ? ticket.customer_name : 'none') + '</td>' +
                                    '<td>' + (ticket.req_name ? ticket.req_name : 'none') + '</td>' +
                                    '<td>' + (ticket.area_name ? ticket.area_name : 'none') + '</td>' +
                                    '<td>' + (ticket.assign_man ? ticket.assign_man : 'none') + '</td>' +
                                    '<td>' + (ticket.assign_engg ? ticket.assign_engg : 'none') + '</td>' +
                                    '<td>Open</td>' +
                                    '<td>' + 
                                        (ticket.status == 0 ? 
                                            '<a href="javascript:void(0)" href-data="' + ticket.id + '" class="useractive" title="Change status"><i class="fa fa-toggle-off" aria-hidden="true"></i>Deactive</a>' :
                                            '<a href="javascript:void(0)" href-data="' + ticket.id + '" class="deactive" title="Change status"><i class="fa fa-toggle-on" aria-hidden="true"></i>Active</a>'
                                        ) +
                                    '</td>' +
                                    '<td>' +
                                        '<button type="button" class="btn btn-info">View</button>' +
                                        '<a class="btn btn-warning" style="margin-left:10px;" href="<?php echo base_url(); ?>welcome/addticket/' + ticket.id + '" title="Edit">Edit</a>' +
                                        '<a href="javascript:void(0)" href-data="' + ticket.id + '" class="dropdown-itemm" title="Delete"><i class="dw dw-delete-3" aria-hidden="true"></i>Delete</a>' +
                                    '</td>' +
                                  '</tr>';
                        tableBody.append(row);
                    });
                }
            });
        }
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('.table').DataTable();

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();
            var createdDate = new Date(data[1]); // Assuming created_date is the second column

            if (
                (startDate === "" && endDate === "") ||
                (startDate === "" && createdDate <= new Date(endDate)) ||
                (endDate === "" && createdDate >= new Date(startDate)) ||
                (createdDate >= new Date(startDate) && createdDate <= new Date(endDate))
            ) {
                return true;
            }
            return false;
        }
    );

    $('#filter').click(function() {
        table.draw();
    });
});
</script>

</body>

</html>
