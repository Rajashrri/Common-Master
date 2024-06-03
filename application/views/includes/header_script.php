<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $page_name; ?> |  Admin Panel </title>

    <meta name="description" content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/">


    <?php
    foreach ($user_detail as $value) :
        ?>


        <?php if ($value['favicon'] == '') { ?>
            <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>template/custom/img/default-favicon.png" />
        <?php } else { ?>                                  
            <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>uploads/img/<?php echo $value['favicon']; ?>" />
        <?php } ?>
    <?php endforeach; ?>

  
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/css/datatables.min.css">
    <!-- Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/typeahead-js/typeahead.css" />


    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/flatpickr/flatpickr.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/jquery-timepicker/jquery-timepicker.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/pickr/pickr-themes.css" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/css/pages/page-auth.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/vendor/libs/toast/jquery.toast.css" />

    <link rel="stylesheet" href="<?php echo base_url(); ?>template/admin_assets/css/all.min.css" />

    <!-- Form Validation -->
    <?php if ($page_name == 'Dashboard') { ?>

        <link href="<?php echo base_url(); ?>template/admin_assets/css/app.css" rel="stylesheet" data-theme-light="<?php echo base_url(); ?>template/admin_assets/css/app.css" data-theme-dark="<?php echo base_url(); ?>template/admin_assets/css/app.dark.css" data-theme-target="href">
        <script src="<?php echo base_url(); ?>template/admin_assets/js/app.js" defer></script>
        <script src="<?php echo base_url(); ?>template/admin_assets/js/app.extras.js" defer></script>
    <?php } ?>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?php echo base_url(); ?>template/admin_assets/vendor/js/helpers.js"></script>

 
    <script src="<?php echo base_url(); ?>template/admin_assets/js/config.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
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
