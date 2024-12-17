<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Admin</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>home/assets/vendors/images/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>home/assets/vendors/images/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>home/assets/vendors/images/favicon-16x16.png" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home/assets/vendors/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home/assets/vendors/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home/assets/src/plugins/datatables/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home/assets/src/plugins/datatables/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home/assets/vendors/styles/style.css" />

    <!-- bootstrap-tagsinput css start-->
    <!-- switchery css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>home/assets/src/plugins/switchery/switchery.min.css" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-GBZ3SGGX85"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag("js", new Date());

        gtag("config", "G-GBZ3SGGX85");
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({ "gtm.start": new Date().getTime(), event: "gtm.js" });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="<?php echo base_url();?>home/assets/vendors/images/deskapp-logo.svg" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div>
<?php 
  include('header.php');
  ?>
  <?php 
  include('sidebar.php');
  ?>
    <div class="mobile-menu-overlay"></div>

    <div class="main-container">

        <div class="xs-pd-20-10 pd-ltr-20">

            <div class="title pb-20">
            </div>
            <div class="pd-ltr-20 xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="card-box mb-30">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box pb-10">
                                    <table class="table nowrap">
                                        <thead>
                                            <tr>
                                              <th>S.No</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Fullname</th>
                                                <th>Gender</th>
                                              <th>City</th>
                                              <th>State</th>
                                              <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php
                                          $count = 1; 
                  if(!empty($taxlist)){
                    foreach ($taxlist as $getdata) { 
                  ?>
                    <tr>
                      <td><?php echo $count; ?>
                      </td>
                      
                    <td><?php  echo (!empty($getdata['email'])?$getdata['email']:'none'); ?></td>
                      <td><?php  echo (!empty($getdata['username'])?$getdata['username']:'none'); ?></td>
                    <td><?php  echo (!empty($getdata['fullname'])?$getdata['fullname']:'none'); ?></td>
                     <td><?php  echo (!empty($getdata['gender'])?$getdata['gender']:'none'); ?></td> 
                      <td><?php  echo (!empty($getdata['city'])?$getdata['city']:'none'); ?></td> 
                           <td><?php  echo (!empty($getdata['state'])?$getdata['state']:'none'); ?></td>
                        <td>
                          
                          <?php if($getdata['status'] == 0){ ?>
                          <a href="javascript:void(0)" href-data="<?php echo  $getdata['id']; ?>" class="useractive" title="Change status"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>
                        <?php } if($getdata['status'] == 1){?>
                          <a href="javascript:void(0)" href-data="<?php echo  $getdata['id']; ?>" class="deactive" title="Change status"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>
                        <?php } ?>
                      </td><td>

                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                            href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i>
                                                                View</a>


                                                            <a href="javascript:void(0)" href-data="<?php echo  $getdata['id']; ?>" class="dropdown-item" title="Delete"><i class="dw dw-delete-3" aria-hidden="true"></i>Delete</a>
                                                        </div>
                                                    </div>       
                      </td>
                                          </tr>
                                           
                                         <?php $count++; 
                  }
                }
                ?>    

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div style="padding: 0px 22px;">
                <div class="footer-wrap pd-20 mb-20 card-box ">
                    DeskApp - Bootstrap 4 Admin Template By
                    <a href="https://github.com/dropways" target="_blank">Sveltose Technology</a>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome modal start -->
    <div class="welcome-modal">
        <button class="welcome-modal-close">
            <i class="bi bi-x-lg"></i>
        </button>
        <iframe class="w-100 border-0" src="https://embed.lottiefiles.com/animation/31548"></iframe>
        <div class="text-center">
            <h3 class="h5 weight-500 text-center mb-2">
                Open source
                <span role="img" aria-label="gratitude">❤️</span>
            </h3>
            <div class="pb-2">
                <a class="github-button" href="" data-color-scheme="no-preference: dark; light: light; dark: light;"
                    data-icon="octicon-star" data-size="large" data-show-count="true"
                    aria-label="Star dropways/deskapp dashboard on GitHub">Star</a>
                <a class="github-button" href="/fork"
                    data-color-scheme="no-preference: dark; light: light; dark: light;" data-icon="octicon-repo-forked"
                    data-size="large" data-show-count="true"
                    aria-label="Fork dropways/deskapp dashboard on GitHub">Fork</a>
            </div>
        </div>
        <div class="text-center mb-1">
            <div>
                <a href="" target="_blank" class="btn btn-light btn-block btn-sm">
                    <span class="text-danger weight-600">STAR US</span>
                    <span class="weight-600">ON GITHUB</span>
                    <i class="fa fa-github"></i>
                </a>
            </div>
            <script async defer="defer" src="https://buttons.github.io/buttons.js"></script>
        </div>
        <a href="" target="_blank" class="btn btn-success btn-sm mb-0 mb-md-3 w-100">
            DOWNLOAD
            <i class="fa fa-download"></i>
        </a>
        <p class="font-14 text-center mb-1 d-none d-md-block">
            Available in the following technologies:
        </p>
        <div class="d-none d-md-flex justify-content-center h1 mb-0 text-danger">
            <i class="fa fa-html5"></i>
        </div>
    </div>

    <!-- welcome modal end -->
    <!-- js -->
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
    <script src="vendors/scripts/datatable-setting.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0"
            style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- switchery js -->
    <script src="src/plugins/switchery/switchery.min.js"></script>
    <!-- bootstrap-tagsinput js -->
    <script src="src/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
    <!-- bootstrap-touchspin js -->
    <script src="src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
    <script src="vendors/scripts/advanced-components.js"></script>
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
  $(".dropdown-item").click(function(e){
    var val = confirm("Are you sure, you want to delete buyer list ?");
    if (val == true){
      window.location.reload();
    }
    
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>welcome/deleteRecord",
        data:{table:'register',id:id,status:3,colwhr:'id',whrstatuscol:'status',action:"Delete"},
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
        var val = confirm("Are you sure, you want to deactivate buyer  ?");
        if (val == true){
      window.location.reload();
    }
    
        //e.preventDefault(); 
        var id = $(this).attr("href-data");
        
        if(val){
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>welcome/change_status",
              data:{tablename:'register',id:id,status:0,whrcol:'id',whrstatuscol:'status',action:"Deactive"},
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
    var val = confirm("Are you, sure you want to activate buyer ?");
    if (val == true){
      window.location.reload();
    }
    
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>welcome/change_status",
        data:{tablename:'register',id:id,status:1,whrcol:'id',whrstatuscol:'status',action:"Active"},
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