<!DOCTYPE html>
<!-- beautify ignore:start -->
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="<?php base_url(); ?>template/admin_assets/" data-template="vertical-menu-template">


    <?php $this->load->view('includes/header_script'); ?>
    


    <?php $data = $this->common->list1('user_login','id','1'); 
        foreach ($data as $row_data) {
            $color_bp = $row_data['bpcolor'];
            $color_bs = $row_data['bscolor'];
        }
        function hex2rgba( $color, $opacity = false ) {

            $defaultColor = 'rgb(0,0,0)';
        
            // Return default color if no color provided
            if ( empty( $color ) ) {
                return $defaultColor;
            }
        
            // Ignore "#" if provided
            if ( $color[0] == '#' ) {
                $color = substr( $color, 1 );
            }
        
            // Check if color has 6 or 3 characters, get values
            if ( strlen($color) == 6 ) {
                $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
            } elseif ( strlen( $color ) == 3 ) {
                $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
            } else {
                return $default;
            }
        
            // Convert hex values to rgb values
            $rgb =  array_map( 'hexdec', $hex );
        
            // Check if opacity is set(rgba or rgb)
            if ( $opacity ) {
                if( abs( $opacity ) > 1 ) {
                    $opacity = 1.0;
                }
                $output = 'rgba(' . implode( ",", $rgb ) . ',' . $opacity . ')';
            } else {
                $output = 'rgb(' . implode( ",", $rgb ) . ')';
            }
        
            // Return rgb(a) color string
            return $output;
        
        }
        
        $hover_color = hex2rgba($color_bp,0.3);
        $hover_color1 = hex2rgba($color_bp,0.8);
        
    ?>
    <body style="--bg-color-primary:<?php echo $color_bp; ?>; --btn-text-color:<?php echo $color_bs; ?>; --bg-hover-color-primary:<?php echo $hover_color; ?>; --bg-hover-color-secondary:<?php echo $hover_color1; ?>;">
        
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar  ">
            <div class="layout-container">
                <!-- Menu -->

                <?php $this->load->view('includes/left_sidebar'); ?>
                <!-- / Menu -->



                <!-- Layout container -->
                <div class="layout-page">





                    <!-- Navbar -->



                    <?php $this->load->view('includes/header'); ?> 


                    <!-- / Navbar -->



                    <!-- Content wrapper -->
                    <div class="content-wrapper">

                        <!-- Content -->

                        <?php $this->load->view($content_view); ?>
                        <!-- / Content -->




                        <!-- Footer -->
                        <?php $this->load->view('includes/footer'); ?>
                        <!-- / Footer -->


                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>



            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>


            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>

        </div>
        <!-- / Layout wrapper -->

        <input type="hidden" id="call-post-url" value="<?php echo base_url();?>call-post">

        <!-- Core JS -->
        <?php $this->load->view('includes/footer_script'); ?>

    </body>


    <!-- Mirrored from demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/dashboards-crm.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 26 Aug 2022 09:18:34 GMT -->
</html>
