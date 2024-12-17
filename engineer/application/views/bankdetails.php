<!DOCTYPE html>
<html>

<head>
    <!-- End Google Tag Manager -->
</head>

<body>
    
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
                                    <form role="form" enctype="multipart/form-data" method="post" action="">
                                        <div class="row m-2">
                                            <div class="col-md-12 h2">
                                                Bank Details
                                            </div>
                                        </div>
                                        <div class="row m-2">
                                            <div class="col-md-6">
                                                <div class="form-group m-2">
                                                    <label>Customer Name</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Customer Name"value="<?php if(!empty($tax_data['customer_name'])){echo $tax_data['customer_name'];}else{echo '';}?>" name="customer_name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group m-2">
                                                    <label> Bank Account</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="  Bank Account"value="<?php if(!empty($tax_data['bank_account'])){echo $tax_data['bank_account'];}else{echo '';}?>" name="bank_account"  />
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group m-2">
                                                    <label> IFSC Code</label>
                                                    <input class="form-control" type="text" placeholder="IFSC Code" value="<?php if(!empty($tax_data['ifsc_code'])){echo $tax_data['ifsc_code'];}else{echo '';}?>" name="ifsc_code" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group m-2">
                                                    <label> Bank Name</label>
                                                    <input class="form-control" type="text" placeholder="Bank Name" value="<?php if(!empty($tax_data['bank_name'])){echo $tax_data['bank_name'];}else{echo '';}?>" name="bank_name" />
                                                </div>
                                            </div>

                                        </div>
                                       <input type="hidden" name="id" value="<?php if(!empty($tax_data['id'])){echo $tax_data['id'];}else{echo "";}?>">
               <button type="submit" name="submit"  class="btn btn-primary">Save</button>
              
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box pb-10">
                                    <table class="table nowrap">
                                        <thead>
                                            <tr>
                                                <th>Order Id</th>
                                                <th>Customer Name</th>
                                                <th>Bank Account</th>
                                                <th>IFSC Code</th>
                                                <th>Bank Name</th>
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
                      
                    <td><?php  echo (!empty($getdata['customer_name'])?$getdata['customer_name']:'none'); ?></td>
                      <td><?php  echo (!empty($getdata['bank_account'])?$getdata['bank_account']:'none'); ?></td>
                    <td><?php  echo (!empty($getdata['ifsc_code'])?$getdata['ifsc_code']:'none'); ?></td>
                     <td><?php  echo (!empty($getdata['bank_name'])?$getdata['bank_name']:'none'); ?></td> 
                        <td>
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
  $(".dropdown-item").click(function(e){
    var val = confirm("Are you sure, you want to delete Bank Details ?");
    if (val == true){
      window.location.reload();
    }
    
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>welcome/deleteRecord",
        data:{table:'bankdetails',id:id,status:3,colwhr:'id',whrstatuscol:'status',action:"Delete"},
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
        var val = confirm("Are you sure, you want to deactivate channels ?");
        if (val == true){
      window.location.reload();
    }
    
        //e.preventDefault(); 
        var id = $(this).attr("href-data");
        //alert(href);
        //var btn = this;
        if(val){
            $.ajax({
              type: "POST",
              url: "<?php echo base_url();?>admin/welcome/change_status",
              data:{tablename:'visafee',id:id,status:0,whrcol:'id',whrstatuscol:'status',action:"Deactive"},
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
    var val = confirm("Are you, sure you want to activate feedbacklist ?");
    if (val == true){
      window.location.reload();
    }
    
    var id = $(this).attr("href-data");
    if(val){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>admin/welcome/change_status",
        data:{tablename:'visafee',id:id,status:1,whrcol:'id',whrstatuscol:'status',action:"Active"},
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