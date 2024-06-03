<!DOCTYPE html>

<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?php base_url(); ?>template/admin_assets/" data-template="vertical-menu-template">


    <!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/auth-forgot-password-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Aug 2022 09:19:17 GMT -->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>Forgot Password |  Admin Panel</title>

        <meta name="description" content="Admin Panel" />
        <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
        <!-- Canonical SEO -->
        <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">

        <?php
        foreach ($user_details as $value) :
            ?>


            <?php if ($value['favicon'] == '') { ?>
                <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>template/custom/img/default-favicon.png" />
            <?php } else { ?>                                  
                <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>uploads/img/<?php echo $value['favicon']; ?>" />
            <?php } ?>
        <?php endforeach; ?>




        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

        <!-- Icons -->
        <link rel="stylesheet" href="<?php base_url(); ?>template/admin_assets/vendor/fonts/boxicons.css" />
        <link rel="stylesheet" href="<?php base_url(); ?>template/admin_assets/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="<?php base_url(); ?>template/admin_assets/vendor/fonts/flag-icons.css" />

        <!-- Core CSS -->
        <link rel="stylesheet" href="<?php base_url(); ?>template/admin_assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="<?php base_url(); ?>template/admin_assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="<?php base_url(); ?>template/admin_assets/css/demo.css" />
        <link rel="stylesheet" href="<?php base_url(); ?>template/admin_assets/vendor/libs/sweetalert2/sweetalert2.css" />
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="<?php base_url(); ?>template/admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="<?php base_url(); ?>template/admin_assets/vendor/libs/typeahead-js/typeahead.css" />
        <!-- Vendor -->
        <link rel="stylesheet" href="<?php base_url(); ?>template/admin_assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />

        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="<?php base_url(); ?>template/admin_assets/vendor/css/pages/page-auth.css">
        <!-- Helpers -->
        <script src="<?php base_url(); ?>template/admin_assets/vendor/js/helpers.js"></script>

        <script src="<?php base_url(); ?>template/admin_assets/vendor/js/template-customizer.js"></script>
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="<?php base_url(); ?>template/admin_assets/js/config.js"></script>

        <script async="async" src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'GA_MEASUREMENT_ID');
        </script>
        <!-- Custom notification for demo -->
        <!-- beautify ignore:end -->

    </head>

    <?php
    $data = $this->common->list1('user_login', 'id', '1');
    foreach ($data as $row_data) {
        $color_bp = $row_data['bpcolor'];
        $color_bs = $row_data['bscolor'];
    }

    function hex2rgba($color, $opacity = false) {

        $defaultColor = 'rgb(0,0,0)';

        // Return default color if no color provided
        if (empty($color)) {
            return $defaultColor;
        }

        // Ignore "#" if provided
        if ($color[0] == '#') {
            $color = substr($color, 1);
        }

        // Check if color has 6 or 3 characters, get values
        if (strlen($color) == 6) {
            $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
        } elseif (strlen($color) == 3) {
            $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
        } else {
            return $default;
        }

        // Convert hex values to rgb values
        $rgb = array_map('hexdec', $hex);

        // Check if opacity is set(rgba or rgb)
        if ($opacity) {
            if (abs($opacity) > 1) {
                $opacity = 1.0;
            }
            $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
        } else {
            $output = 'rgb(' . implode(",", $rgb) . ')';
        }

        // Return rgb(a) color string
        return $output;
    }

    $hover_color = hex2rgba($color_bp, 0.3);
    $hover_color1 = hex2rgba($color_bp, 0.8);
    ?>
    <body style="--bg-color-primary:<?php echo $color_bp; ?>; --btn-text-color:<?php echo $color_bs; ?>; --bg-hover-color-primary:<?php echo $hover_color; ?>; --bg-hover-color-secondary:<?php echo $hover_color1; ?>;">

        <!-- Content -->

        <div class="container-xxl">
            <div class="authentication-wrapper authentication-basic container-p-y">
                <div class="authentication-inner py-4">

                    <!-- Forgot Password -->
                    <div class="card">
                        <div class="card-body">
                            <!-- Logo -->
                            <?php foreach ($user_detail as $value) : ?>

                                <div class="app-brand justify-content-center">
                                    <a href="<?php echo base_url(); ?>master" class="app-brand-link gap-2">
                                        <span class="app-brand-logo demo">

                                            <?php if ($value['logo'] == '') { ?>
                                                <img src="<?php echo base_url(); ?>template/custom/img/default-logo.png" alt style="width: 180px;">
                                            <?php } else { ?>                                  
                                                <img src="<?php echo base_url() ?>uploads/img/<?php echo $value['logo']; ?>" alt style="width: 180px;">
                                            <?php } ?>

                                        </span>

                                    </a>
                                </div>

                            <?php endforeach; ?>                           <!-- /Logo -->
                            <h4 class="mb-2 text-center">Forgot Password? </h4>
                            <p class="mb-4 text-center">Enter your email and we'll send you instructions to reset your password</p>
                            <form id="forgot-Form" method="POST">
                                <div class="mb-4">
                                    <div class="d-flex justify-content-between">
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" autofocus>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary d-grid w-100">Send Reset OTP</button>
                            </form>
                            <div class="text-center pt-2">
                                <a href="<?php echo base_url(); ?>master" class="d-flex align-items-center justify-content-center">
                                    <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                                    Back to login
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /Forgot Password -->
                </div>
            </div>
        </div>

        <!-- / Content -->





        <input type="hidden" id="call-post-url" value="<?php echo base_url(); ?>call-post">

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="<?php base_url(); ?>template/admin_assets/vendor/libs/jquery/jquery.js"></script>
        <script src="<?php base_url(); ?>template/admin_assets/vendor/libs/popper/popper.js"></script>
        <script src="<?php base_url(); ?>template/admin_assets/vendor/js/bootstrap.js"></script>
        <script src="<?php base_url(); ?>template/admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

        <script src="<?php base_url(); ?>template/admin_assets/vendor/libs/hammer/hammer.js"></script>
        <script src="<?php base_url(); ?>template/admin_assets/vendor/libs/i18n/i18n.js"></script>
        <script src="<?php base_url(); ?>template/admin_assets/vendor/libs/typeahead-js/typeahead.js"></script>

        <script src="<?php base_url(); ?>template/admin_assets/vendor/js/menu.js"></script>
        <!-- endbuild -->

        <!-- Vendors JS -->
        <script src="<?php base_url(); ?>template/admin_assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
        <script src="<?php base_url(); ?>template/admin_assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
        <script src="<?php base_url(); ?>template/admin_assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
        <script src="<?php echo base_url(); ?>template/admin_assets/vendor/libs/toast/jquery.toast.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/toast/jquery.toast.css" />
        <!-- Main JS -->
        <script src="<?php base_url(); ?>template/admin_assets/js/main.js"></script>
        <script src="<?php base_url(); ?>template/admin_assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
        <script src="<?php base_url(); ?>template/admin_assets/extended-ui-sweetalert2.js"></script>

        <!-- Page JS -->
        <script src="<?php base_url(); ?>template/admin_assets/js/pages-auth.js"></script>
        <script src="<?php echo base_url(); ?>template/custom/js/jquery.validate.min.js"></script>
        <script src="<?php echo base_url(); ?>template/custom/js/login.js"></script>
    </body>


    <!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/auth-forgot-password-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Aug 2022 09:19:17 GMT -->
</html>
