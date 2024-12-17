
	 <?php  
  $session_userdata = $this->session->userdata(USER_SESSION); 
  //($session_userdata);//shop_id
  ?>
    
    
    <nav class="pcoded-navbar menu-light ">
		<div class="navbar-wrapper  ">
			<div class="navbar-content scroll-div " >
				
				<div class="">
					<div class="main-menu-header">
						<img class="img-radius" src="<?php echo base_url();?>home/assets/images/user/avatar-2.jpg" alt="User-Profile-Image">
						<div class="user-details">
							<div id="more-details">Engineer</div>
						</div>
					</div>
					<div class="collapse" id="nav-user-link">
						 
					</div>
				</div>
				<ul class="nav pcoded-inner-navbar ">
					 
					<li class="nav-item">
					    <a href="<?php echo base_url();?>pageindex" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
					</li>
                    <li class="nav-item">
					</li>
                    <li class="nav-item">
					    <a href="<?php echo base_url();?>ticketlist" class="nav-link"><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Ticket  </span></a>
					</li>
               <!--     <li class="nav-item">
					    <a href="<?php echo base_url();?>ticketreport" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Ticket Report</span></a>
					</li> -->
                    <li class="nav-item">
					    <a href="<?php echo base_url();?>welcome/editprofile/<?php echo $session_userdata['id']?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Edit Profile</span></a>
					</li>
                    <li class="nav-item">
					    <a href="<?php echo base_url();?>logout" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Log Out</span></a>
					</li>
					 <li class="nav-item">
					  <div style="display:flex; justify-content:center">
                      <img src="https://chauffit.com/requester/images/xytr.jpg" style="width:180px;height:80px" alt="24"/>
					  </div>
					</li>
				</ul>
				<div class="card text-center">
					<div class="card-block">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<i class="feather icon-sunset f-40"></i>
						<h6 class="mt-3">Download Pro</h6>
						<p>Getting more features with pro version</p>
						<a href="https://1.envato.market/qG0m5" target="_blank" class="btn btn-primary btn-sm text-white m-0">Upgrade Now</a>
					</div>
				</div>
				
			</div>
		</div>
	</nav>
