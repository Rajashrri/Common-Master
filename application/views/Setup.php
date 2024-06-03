<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="<?php base_url(); ?>template/admin_assets/" data-template="vertical-menu-template">
    <?php $this->load->view('includes/header_script'); ?>
    <style>
        .layout-wrapper{background-color: #f5f5f9;}
        .layout-wrapper, .layout-container{align-items: center;}
        /*.content-wrapper{flex-direction: row;align-items: center;height: 100%;}*/
        .my-tabs .nav-tabs .nav-link.active, .my-tabs .nav-tabs .nav-item.show .nav-link{background-color: transparent;}
        .my-tabs .nav-align-top .nav-tabs .nav-link{box-shadow: unset;}
        .my-tabs .nav-tabs .nav-item .nav-link{font-weight: 600;}
        .my-tabs .nav-tabs .nav-link.active{color: #0083FF; border-bottom: 3px solid #0083FF;}
        .my-tabs .nav-tabs .nav-item .nav-link:not(.active){background-color: transparent;}
        .my-tabs .nav-align-top .nav-tabs .nav-item:not(:first-child) .nav-link{border-left: 0px !important;}
        .my-tabs .form-label, .my-tabs .col-form-label{font-size: 11px;}
        .bg-footer-theme {background-color: #0083ff !important;color: #fff;}
        .bg-footer-theme .footer-link{color:#fff;}
        .bg-footer-theme .footer-link:hover{color:#fff;}
        .my-tabs .my-color-box{width: 30%; padding: 0; border-radius: 0;}
        .btn-primary{background-color: #0083FF; color: #fff; background: linear-gradient(to right, #0083FF, #0083FF);}
        .btn-primary:hover{background-color: #002C83; color: #fff; background: linear-gradient(to right, #002C83, #002C83);}
        .preview-logo{width: 40px; height: 40px;}
        .preview-fav{width: 32px; height: 32px;}
        .this-box-padding-1{padding: 10px 20px 10px 70px;}
        .layout-container{flex-direction: column; justify-content: space-between;}
        .switch-secondary.switch .switch-input:checked~.switch-toggle-slider { background: #0083FF; color: #fff; }
    </style>
    <body>
        <div class="layout-wrapper ">
            <div class="layout-container">
                <div class="container">
                    <div class="content-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-10 col-sm-10 col-md-9 col-lg-9 col-xl-8 my-tabs">
                                <h4 class="text-dark text-center">
                                    <!--<img class="h-auto"  src="<?php // echo base_url(); ?>template/admin_assets/img/sidebaricon/installer.png">-->
                                    Admin Panel Setup
                                </h4>
                                <div class="nav-align-top mb-3">
                                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button id="accdet" class="nav-link active" data-bs-toggle="tab" data-bs-target="#form-tabs-account" role="tab" aria-selected="false" tabindex="-1" >Admin Login Credentials</button>
                                        </li>
                                        <li class="nav-item" role="tablist">
                                            <button id="webset" class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-webset" role="tab" aria-selected="false" tabindex="-1" >Admin Panel Settings</button>
                                        </li>
                                        <li class="nav-item" role="tablist">
                                            <button id="pri" class="nav-link " data-bs-toggle="tab" data-bs-target="#form-tabs-privilege" role="tab" aria-selected="true" >Admin Modules</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" style="padding: 30px 0;">
                                        <!-- Personal Info -->
                                        <?php  $session_data['token'] = bin2hex(random_bytes(16));
                                            $this->session->set_userdata($session_data); ?>
                                        <div class="tab-pane fade active show px-0 py-4" id="form-tabs-account" role="tabpanel" >
                                            <form id="loginsetup-form" method="POST" >
                                                <div class="row g-3 justify-content-center">
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <label class="col-sm-2 col-form-label text-start" for="formtabs-username">Company Name</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group input-group-merge">
                                                                    <input type="text" id="username" value="" name="username" class="form-control" placeholder="">
                                                                    <input type="hidden" id="token"  name="token" value="<?php echo $this->session->set_userdata('token') ?>" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <label class="col-sm-2 col-form-label text-start"  for="formtabs-email">Admin Login Email</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group input-group-merge">
                                                                    <input type="text" id="email" value="" name="email" class="form-control" placeholder="" aria-label="" aria-describedby="formtabs-email2">
                                                                    <!-- <span class="input-group-text" id="formtabs-email2">@example.com</span> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row form-password-toggle">
                                                            <label class="col-sm-2 col-form-label text-start" for="formtabs-password">Admin Password</label>
                                                            <div class="col-sm-10">
                                                                <div class="input-group input-group-merge">
                                                                    <input type="password" id="password" name="password" class="form-control" placeholder="············" aria-describedby="password" style="border-right:0; border-radius:0;">
                                                                    <span class="input-group-text cursor-pointer" id="formtabs-password2"><i class="bx bx-hide"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <!--<label class="col-sm-2 col-form-label"></label>-->
                                                            <div class="col-sm-12 text-end">
                                                                <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                                                <button type="submit" id="login-setup-update-btn" class="btn btn-primary">Next</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Account Details -->
                                        <div class="tab-pane fade this-box-padding-1" id="form-tabs-webset" role="tabpanel" >
                                            <form id="webset-form" method="POST" action="webset-form" enctype="multipart/form-data">
                                                <div class="row g-3 justify-content-center">
                                                    <div class="col-md-12">
                                                        <div class="row align-items-center">
                                                            <label class="col-sm-1 col-form-label text-left" for="formtabs-facebook">Logo</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" onchange="preview()" id="formtabs-facebook" name="logo" class="form-control" >
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <img id="thumb" alt="" src="">                                                                   
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row align-items-center">
                                                            <label class="col-sm-1 col-form-label text-sm-end" for="formtabs-facebook">Favicon</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" onchange="preview1()" id="formtabs-facebook" name="favicon" class="form-control">
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <img id="thumb1" style="" src="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <label class="col-sm-4 col-form-label text-left" for="formtabs-twitter">Primary Color</label>
                                                            <div class="col-sm-8">
                                                                <input type="color" id="formtabs-twitter"  value="" name="bpcolor" class="form-control my-color-box" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <label class="col-sm-5 col-form-label text-left" for="formtabs-facebook">Secondary Color</label>
                                                            <div class="col-sm-7">
                                                                <input type="color" id="formtabs-facebook" value="" name="bscolor" class="form-control my-color-box" placeholder="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="row">
                                                            <div class="col-sm-12 text-end p-0">
                                                                <button id="can" type="reset" class="btn btn-label-secondary">Cancel</button>
                                                                <button type="submit" id="web-setup-update-btn" class="btn btn-primary me-sm-3 me-1">Next</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- website-settings -->
                                        <div class="tab-pane fade " id="form-tabs-privilege" role="tabpanel">
                                            <div class="card-body">
                                                <form id="privilege-setup" method="POST" >
                                                    <!-- <div class="row g-3"> -->
                                                    <div class="row" style="display: flex; flex-wrap: nowrap;">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="product" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Product</b></span>
                                                                </label>
                                                                <br><br>
                                                                
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="project" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Project</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="services" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Services</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="testimonials" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Testimonials</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="blog" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Blog</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="clientele" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Clientele</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="gallery" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Gallery</b></span>
                                                                </label>
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="video" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Video</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="faq" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Faq</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="job" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Job</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="event" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Event</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="news" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>News</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="teams" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Teams</b></span>
                                                                </label>
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="pdf" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>PDF</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="link" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Link</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="slider" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Slider</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="loginhis" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Login History</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="activitylog" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Activity logs</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="subadmin" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Sub admin</b></span>
                                                                </label>
                                                                <br><br>
                                                                <label class="switch switch-secondary">
                                                                <input type="checkbox" class="switch-input" unchecked="" name="dashanly" value="1">
                                                                <span class="switch-toggle-slider">
                                                                <span class="switch-on">
                                                                <i class="bx bx-check"></i>
                                                                </span>
                                                                <span class="switch-off">
                                                                <i class="bx bx-x"></i>
                                                                </span>
                                                                </span>
                                                                <span class="switch-label"><b>Dashboard Analytics</b></span>
                                                                </label>
                                                                <br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-sm-12 text-end">
                                                                    <button type="reset" class="btn btn-label-secondary">Reset</button>
                                                                    <button type="submit" id="privilege-setup-btn" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- </div>
                                            </div>
                                            </div>
                                             
                                            </div> -->
                                        
                                        <!-- <div class="content-backdrop fade"></div> -->
                                    </div>
                                    <!-- Content wrapper -->
                                    <!-- / Layout page -->
                                </div>
                                <!-- Overlay -->
                                <!-- Drag Target Area To SlideIn Menu On Small Screens -->
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="content-footer footer bg-footer-theme w-100">
                    <div class="p-2">
                        <div class="mb-2 mb-md-0 text-center">
                            Copyright © <script>document.write(new Date().getFullYear())</script>
                            Common Admin Panel. All Rights Reserved. Powered By: 
                            <a href="https://www.digisupreme.in/" target="_blank" class="footer-link fw-bolder" title="DigiSupreme">DigiSupreme</a>
                        </div>
                    </div>
                </footer>
            </div>
                
        </div>
        <!-- / Layout wrapper -->
        <!-- Core JS -->
        <?php $this->load->view('includes/footer_script'); ?>
    </body>
</html>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"></script>
    <script src="https://ajax.aspnetCDN.com/ajax/jQuery/jQuery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="  https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>template/custom/js/adminsetup.js?v=5"></script> -->