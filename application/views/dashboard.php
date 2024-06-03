<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span><a href="<?php echo base_url(); ?>contact-enq" style="color:var(--bs-body-color);">Contact Enquiries</a></span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2"><?php echo $this->common->count('contact'); ?></h4>
                            </div>
                            <small>Lifetime</small>
                        </div>
                        <span class="badge bg-label-success rounded p-2">
                            <i class="menu-icon tf-icons bx bx bx-menu"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span><a href="<?php echo base_url(); ?>service-enquiryList" style="color:var(--bs-body-color);">Service Enquiries </a></span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2"><?php echo $this->common->count('enqury'); ?></h4>
                            </div>
                            <small>Lifetime</small>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                            <i class="menu-icon tf-icons bx bxl-blogger"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span><a href="<?php echo base_url(); ?>service-list" style="color:var(--bs-body-color);">Services </a></span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2"><?php echo $this->common->count('services'); ?></h4>
                            </div>
                            <small>Total Services</small>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                            <i class="menu-icon tf-icons bx bxl-blogger"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span><a href="<?php echo base_url(); ?>blog-list" style="color:var(--bs-body-color);">Blogs</a> </span>
                            <div class="d-flex align-items-end mt-2">
                                <h4 class="mb-0 me-2"><?php echo $this->common->count('blog'); ?></h4>
                            </div>
                            <small>Total Blogs</small>
                        </div>
                        <span class="badge bg-label-warning rounded p-2">
                            <i class="menu-icon tf-icons bx bxl-blogger"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>