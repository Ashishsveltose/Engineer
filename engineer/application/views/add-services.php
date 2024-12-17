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
                                    <form role="form" enctype="multipart/form-data" method="post" action="">
                                        <div class="row m-2">
                                            <div class="col-md-4">
                                                <div class="form-group m-2">
                                                    <label>Select Main Category</label>
                                                    <select class="custom-select2 form-control" value="<?php if(!empty($tax_data['category'])){echo $tax_data['category'];}else{echo '';}?>" name="category"
                                                        style="width: 100%; height: 38px">
                                                        <optgroup label="Select Category">
                                                            <option value="Electronic">Electronic</option>
                                                            <option value="Cleaning">Cleaning</option>
                                                            <option value="Home">Home Move</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group m-2">
                                                    <label>Select Sub Category</label>
                                                    <select class="custom-select2 form-control" value="<?php if(!empty($tax_data['subcategory'])){echo $tax_data['subcategory'];}else{echo '';}?>" name="subcategory"
                                                        style="width: 100%; height: 38px">
                                                        <optgroup>
                                                            <option value="Electronic">Auto Mobile</option>
                                                            <option value="Cleaning">Ac Repair</option>
                                                            <option value="Home">Repair</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group m-2">
                                                    <label>Select Seller</label>
                                                    <select class="custom-select2 form-control" value="<?php if(!empty($tax_data['seller_name'])){echo $tax_data['seller_name'];}else{echo '';}?>" name="seller_name"
                                                        style="width: 100%; height: 38px">
                                                        <optgroup label="Select Category">
                                                            <option value="Electronic">Abc</option>
                                                            <option value="Cleaning">abc1</option>
                                                            <option value="Home">abc2</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group m-2">
                                                    <label>Service Title*</label>
                                                    <input class="form-control" type="text"
                                                        placeholder="Service Title"value="<?php if(!empty($tax_data['service_title'])){echo $tax_data['service_title'];}else{echo '';}?>" name="service_title" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group m-2">
                                                    <label>Video URL</label>
                                                    <input class="form-control" type="text" placeholder="Video URL" value="<?php if(!empty($tax_data['video_url'])){echo $tax_data['video_url'];}else{echo '';}?>" name="video_url"/>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Upload Main Image </label>
                                                    <input type="file"
                                                        class="form-control-file form-control height-auto"value="<?php if(!empty($tax_data['image'])){echo $tax_data['image'];}else{echo '';}?>" name="image" />
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label>Upload Gallery Image </label>
                                                    <input type="file"
                                                        class="form-control-file form-control height-auto"value="<?php if(!empty($tax_data['gallary_image'])){echo $tax_data['gallary_image'];}else{echo '';}?>" name="gallary_image" />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="pd-ltr-20 xs-pd-20-10">
                                            <div class="min-height-200px">
                                                <div class="html-editor pd-20 card-box mb-30">
                                                    <h4 class="h4 text-blue">Service Description*</h4>
                                                    <!-- <p>Simple, beautiful wysiwyg editors</p> -->
                                                    <textarea class="textarea_editor form-control border-radius-0"
                                                        placeholder="Enter text ..."value="<?php if(!empty($tax_data['description'])){echo $tax_data['description'];}else{echo '';}?>" name="description"></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?php if(!empty($tax_data['id'])){echo $tax_data['id'];}else{echo "";}?>">
               <button type="submit" name="submit"  class="btn btn-primary">Save</button>
              
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