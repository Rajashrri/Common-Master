<!DOCTYPE html>

<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?php base_url(); ?>template/admin_assets/" data-template="vertical-menu-template">


    <!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/auth-login-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Aug 2022 09:19:14 GMT -->
    <?php $this->load->view('login/header'); ?>
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
                <div class="authentication-inner">
                    <!-- Register -->
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

                            <?php endforeach; ?>

                            <!-- /Logo -->
                            <h4 class="mb-2 text-center">Welcome to Admin! </h4>
                            <!-- <p class="mb-4">Please sign-in to your account and start the adventure</p> -->
                            <?php if ($this->session->flashdata('flash_message') != "") { ?>
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                            <span>×</span>
                                        </button>
                                        <?php echo $this->session->flashdata('flash_message'); ?>
                                    </div>
                                </div>  
                            <?php } ?>
                            <?php
                            
                            $session_data['token'] = bin2hex(random_bytes(16));
                            $this->session->set_userdata($session_data);
                            ?>
                            <form id="login-Form" class="mb-3" method="POST">
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your email">
                                    </div>
                                </div>
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" style="border-right:0; border-radius: .375rem 0rem 0rem .375rem;" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                    <div class="text-end my-1">
                                        <a href="<?php echo base_url(); ?>forgot-password">
                                            <small>Forgot Password?</small>
                                        </a>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <input id="token" name="token" type="hidden" value="<?php echo $this->session->userdata('token'); ?>">
                                    <button class="btn btn-primary d-grid w-100" id="login-btn" type="submit">Sign in</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->



    <input type="hidden" id="call-post-url" value="<?php echo base_url(); ?>call-post">


    <?php $this->load->view('login/footer'); ?>
</body>

</html>
