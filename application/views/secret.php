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
        .bg-footer-theme {background-color: hwb(209deg 0% 0% / 50%) !important;color: #fff;}
        .bg-footer-theme .footer-link{color:#fff;}
        .my-tabs .my-color-box{width: 30%; padding: 0; border-radius: 0;}
        .btn-primary{background-color: #0083FF; color: #fff; background: linear-gradient(to right, #0083FF, #0083FF);}
        .btn-primary:hover{background-color: #002C83; color: #fff; background: linear-gradient(to right, #002C83, #002C83);}
        .preview-logo{width: 40px; height: 40px;}
        .preview-fav{width: 32px; height: 32px;}
        .this-box-padding-1{padding: 10px 20px 10px 70px;}
        .switch-secondary.switch .switch-input:checked~.switch-toggle-slider { background: #0083FF; color: #fff; }
    </style>
    
    <body>
        <div class="layout-wrapper ">
            <div class="layout-container">
                <div class="container">
                    <div class="content-wrapper">
                        <div class="row justify-content-center">
                            <div class="col-8 my-tabs">
                                <h4 class="text-dark text-center">
                                    <!--<img class="h-auto"  src="<?php // echo base_url(); ?>template/admin_assets/img/sidebaricon/installer.png">-->
                                    Admin Panel Setup
                                </h4>
                                
                                <div class="nav-align-top mb-3">
                                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button id="accdet" class="nav-link active" data-bs-toggle="tab" data-bs-target="#form-tabs-account" role="tab" aria-selected="false" tabindex="-1">Admin Login Credentials</button>
                                        </li>
                                        <li class="nav-item" role="tablist">
                                            <button id="webset" class="nav-link" data-bs-toggle="tab" data-bs-target="#form-tabs-webset" role="tab" aria-selected="false" tabindex="-1">Admin Panel Settings</button>
                                        </li>
                                        
                                        <li class="nav-item" role="tablist">
                                            <button id="pri" class="nav-link " data-bs-toggle="tab" data-bs-target="#form-tabs-privilege" role="tab" aria-selected="true">Admin Modules</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" style="padding: 30px 0;">
                                            <!-- Personal Info -->
                                            <?php  $session_data['token'] = bin2hex(random_bytes(16));
                                                $this->session->set_userdata($session_data); ?>
                                            
                                            <div class="tab-pane fade active show px-0 py-4" id="form-tabs-account" role="tabpanel">
                                                <form id="loginsetup-update-form" method="POST">
                                                    <?php foreach($keys as $value): ?>
                                                    <div class="row g-3 justify-content-center">
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <label class="col-sm-2 col-form-label text-start" for="formtabs-username">Company Name</label>
                                                                <div class="col-sm-10">
                                                                    <div class="input-group input-group-merge">
                                                                        <input type="text" id="username" value="<?php echo $value['name']; ?>" name="username" class="form-control" placeholder="">
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
                                                                        <input type="text" id="email" value="<?php echo $value['email'] ?>" name="email" class="form-control" placeholder="" aria-label="" aria-describedby="formtabs-email2">
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
                                                                <label class="col-sm-2 col-form-label"></label>
                                                                <div class="col-sm-10">
                                                                     <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                                                    <button type="submit" id="login-setup-update-btn" class="btn btn-primary me-sm-3 me-1">Next</button>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <?php endforeach; ?>
                                                </form>
                                            </div>
                                            
                                            
                                            <!-- Account Details -->
                                            <div class="tab-pane fade p-4" id="form-tabs-webset" role="tabpanel">
                                                <form id="webset-update-form" method="POST" action="webset-form" enctype="multipart/form-data">
                                                    <?php foreach($keys as $webset):?>
                                                    <div class="row g-3 justify-content-center">
                                                        
                                                        <div class="col-md-12">
                                                            <div class="row align-items-center">
                                                                <label class="col-sm-2 col-form-label text-sm-end" for="formtabs-facebook">Admin Panel logo</label>
                                                                <div class="col-sm-7">
                                                                    <input type="file"  onchange="preview()" id="formtabs-facebook" name="logo" class="form-control" >
                                                                </div>
                                                                <div class="col-sm-3" style="">
                                                                    <?php if ($value['logo'] != NULL) { ?>
                                                                    <img style="width: 100px" src="<?php echo base_url() ?>uploads/img/<?php echo $value['logo']; ?>" id="thumb">
                                                                    <?php }
                                                                        ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12">
                                                            <div class="row align-items-center">
                                                                <label class="col-sm-2 col-form-label text-sm-end" for="formtabs-facebook">Admin Panel Fav Icon</label>
                                                                <div class="col-sm-7">
                                                                    <input type="file" onchange="preview1()" id="formtabs-facebook" name="favicon" class="form-control">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <?php if ($value['favicon'] != NULL) { ?>
                                                                    <img style="width: 50px" src="<?php echo base_url() ?>uploads/img/<?php echo $value['favicon']; ?>" id="thumb1">
                                                                    <?php }
                                                                        ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <label class="col-sm-7 col-form-label text-sm-end" for="formtabs-twitter">Background Primary Color</label>
                                                                <div class="col-sm-5">
                                                                    <input type="color" id="formtabs-twitter"  value="<?php echo $webset['bpcolor'] ?>" name="bpcolor" class="form-control my-color-box" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <label class="col-sm-7 col-form-label text-sm-end" for="formtabs-facebook">Background Secondary Color</label>
                                                                <div class="col-sm-5">
                                                                    <input type="color" id="formtabs-facebook" value="<?php echo $webset['bscolor'] ?>" name="bscolor" class="form-control my-color-box" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                       
                                                        <div class="col-md-10">
                                                            <div class="row text-center">
                                                                <!--<label class="col-sm-2 col-form-label"></label>-->
                                                                <div class="col-sm-12">
                                                                       <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                                                    <button type="submit" id="web-setup-update-btn" class="btn btn-primary me-sm-3 me-1">Next</button>
                                                                 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <?php endforeach; ?>
                                                </form>
                                            </div>
                                            <!-- website-settings -->
                                            
                                            <div class="tab-pane fade " id="form-tabs-privilege" role="tabpanel">
                                                <div class="card-body">
                                                    <form id="privilege-setup-update" method="POST" >
                                                        <!-- <div class="row g-3"> -->
                                                        <?php foreach($privilege as $pri):?>
                                                        
                                                        <div class="row" style="display: flex; flex-wrap: nowrap;">
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                <?php if($pri['addp']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="product" value="1">
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
                                                                    <?php } else{?>
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
                                                                    <?php }?>
                                                                    <br><br>
                                                                    
                                                                    
                                                                    <?php if($pri['addproject']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="project" value="1">
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
                                                                    <?php } else{?>
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
                                                                    <?php }?>
                                                                    <br><br>
                                                                    <?php if($pri['adds']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="services" value="1">
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
                                                                    <?php } else{ ?>
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
                                                                    <?php }?>
                                                                    <br><br>
                                                                    <?php if($pri['addtest']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="testimonials" value="1">
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
                                                                    <?php }else{ ?>
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
                                                                    <?php } ?>
                                                                    <br><br>
                                                                    <?php if($pri['addb']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="blog" value="1">
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
                                                                    <?php }else{ ?>
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
                                                                    <?php }?>
                                                                    <br><br>
                                                                    <?php if($pri['addct']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="clientele" value="1">
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
                                                                    <?php }else{ ?>
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
                                                                    <?php } ?>
                                                                    <br><br>
                                                                    <?php if($pri['addg']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="gallery" value="1">
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
                                                                    <?php }else{?>
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
                                                                    <?php }?>
                                                                    <br><br>
                                                                    
                                                                   
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                <?php if($pri['addv']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="video" value="1">
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
                                                                    <?php }else{?>
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
                                                                    <?php }?>
                                                                    <br><br>

                                                                   <?php if($pri['addf']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="faq" value="1">
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
                                                                    <?php }else{?>
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
                                                                    <?php }?>
                                                                    <br><br>
                                                                    <?php if($pri['addj']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="job" value="1">
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
                                                                    <?php }else{ ?>
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
                                                                    <?php }?>
                                                                    <br><br>
                                                                    <?php if($pri['adde']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="event" value="1">
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
                                                                    <?php }else{?>
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
                                                                    <?php }?>
                                                                    <br><br>
                                                                    <?php if($pri['addn']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="news" value="1">
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
                                                                    <?php }else{ ?>
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
                                                                    <?php } ?>
                                                                    <br><br>
                                                                  
                                                                    <?php if($pri['addt']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="teams" value="1">
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
                                                                    <?php }else{?>
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
                                                                    <?php } ?>
                                                                   
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-4">
                                                                <div class="mb-3">
                                                                    <?php if($pri['addpd']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="pdf" value="1">
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
                                                                    <?php }else{ ?>
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
                                                                    <?php } ?>
                                                                    <br><br>
                                                                    <?php if($pri['addlink']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="link" value="1">
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
                                                                    <?php }else{?>
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
                                                                    <?php } ?>
                                                                    <br><br>
                                                                 
                                                                    <?php if($pri['slider']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="slider" value="1">
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
                                                                    <?php }else{ ?>
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
                                                                    <?php } ?>
                                                                    <br><br>
                                                                   
                                                                    <?php if($pri['loginhis']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="loginhis" value="1">
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
                                                                    <?php }else{ ?>
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
                                                                    <?php } ?>
                                                                    <br><br>
                                                                    <?php if($pri['activitylog']==1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="activitylog" value="1">
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
                                                                    <?php }else{ ?>
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
                                                                    <?php } ?>
                                                                    <br><br>
                                                                    <?php if($pri['users']== 1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="subadmin" value="1">
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
                                                                    <?php } else{ ?>
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
                                                                    <?php }?>
                                                                    <br><br>
                                                                    <?php if($pri['dashanly']== 1){ ?>
                                                                    <label class="switch switch-secondary">
                                                                    <input type="checkbox" class="switch-input" checked="" name="dashanly" value="1">
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
                                                                    <?php } else{ ?>
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
                                                                    <?php }?>
                                                                    
                                                                  
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                        
                                                        
                                                        <div class="row mt-4">
                                                            <div class="col-md-12">
                                                                <div class="row text-center justify-content-end">
                                                                    <div class="col-sm-12">
                                                                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                                                                        <button type="submit" id="privilege-setup-update-btn" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endforeach; ?>
                                                    </form>
                                                </div>
                                            </div>
                                        <!-- </div>
                                            </div>
                                            </div>
                                             
                                            </div> -->
                                        <?php $this->load->view('includes/footer'); ?>
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
            </div>
        </div>
        <!-- / Layout wrapper -->
        <!-- Core JS -->
        <?php $this->load->view('includes/footer_script'); ?>
    </body>
</html>