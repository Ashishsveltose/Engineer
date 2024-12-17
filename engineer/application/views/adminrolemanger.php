<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

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
  
        <li>
            <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-archive"></span><span class="mtext"> Create Day</span>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-command"></span><span class="mtext">Create Schedule</span>
            </a>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-pie-chart"></span><span class="mtext">Order Pending</span>
            </a>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-file-earmark-text"></span><span class="mtext">All Order</span>
            </a>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-bug"></span><span class="mtext">All Notifications</span>
            </a>
        </li>

        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-back"></span><span class="mtext">Payout History</span>
            </a>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-hdd-stack"></span><span class="mtext">Review</span>
            </a>
        </li>
        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-file-earmark-text"></span><span class="mtext">Report List</span>
            </a>
        </li>
        <!-- <li class="dropdown">
              <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-hdd-stack"></span
                ><span class="mtext">Profile</span>
              </a>
            </li> -->

        <li class="dropdown">
            <a href="javascript:;" class="dropdown-toggle no-arrow">
                <span class="micon bi bi-table"></span><span class="mtext">Profile Verify</span>
            </a>
        </li>
        </ul>
    </div>
    </div> -->
    </div>
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
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Role</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>1</td>
                                                <td>Admin Two</td>
                                                <td> <img src="vendors/images/coming-soon.png" alt="" /></td>
                                                <td>Admin</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                            href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i>
                                                                View</a>


                                                            <a class="dropdown-item" href="#"><i
                                                                    class="dw dw-delete-3"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>2</td>
                                                <td>Admin Two</td>
                                                <td> <img src="vendors/images/coming-soon.png" alt="" /></td>
                                                <td>Admin</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                            href="#" role="button" data-toggle="dropdown">
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div
                                                            class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="#"><i class="dw dw-eye"></i>
                                                                View</a>


                                                            <a class="dropdown-item" href="#"><i
                                                                    class="dw dw-delete-3"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="footer-wrap pd-20 mb-20 card-box">
                    DeskApp - Bootstrap 4 Admin Template By
                    <a href="https://github.com/dropways" target="_blank">Sveltose Technology</a>
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
                        data-color-scheme="no-preference: dark; light: light; dark: light;"
                        data-icon="octicon-repo-forked" data-size="large" data-show-count="true"
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