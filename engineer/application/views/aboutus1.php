<!DOCTYPE html>
<html>

<head>
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
                                   <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <?php if(!empty($tax_data)) { 
      ?>
      <h4>Edit About us</h4>
      <?php 
        }
        else
        {
      ?>
      <h4>Add About us</h4>
      <?php 
        }
      ?>
   
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <?php 
            if(isset($success) && !empty($success))
            {
              ?>
              <div class="alert alert-success" align="center">
              <strong><?php echo $success; ?></strong>
              </div>
            <?php   
            }
            if(isset($error) && !empty($error)){
            ?>
                <div class="alert alert-danger" align="center">
                <strong><?php echo $error; ?></strong>
                </div>
            <?php } ?>
          
               
                                    <form role="form" enctype="multipart/form-data" method="post" action="">
                                        <div class="row m-2">
                                           
                                           <div class="col-md-6">
                                                <div class="form-group m-2">
                                                    <label>*Title</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="title" value="<?php if(!empty($tax_data['title'])){echo $tax_data['title'];}else{echo '';}?>" name="title" />
                                                </div>
                                            </div>
                                            
                                           <div class="col-md-6">
                                                <div class="form-group m-2">
                                                    <label>*description</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="description" value="<?php if(!empty($tax_data['description'])){echo $tax_data['description'];}else{echo '';}?>" name="description" />
                                                </div>
                                            </div>
                                             </div>
                                            <input type="hidden" name="id" value="<?php if(!empty($tax_data['id'])){echo $tax_data['id'];}else{echo "";}?>">
               <button  class="btn btn-primary">Next</button>
              
                                        </div>
                                </div>
                                </form>
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
</body>

</html>




