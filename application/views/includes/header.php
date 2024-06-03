<style>
    .tbl-padding div#example_wrapper{
        padding: 0;
    }
</style>

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">



    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>


    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


        <ul class="navbar-nav flex-row align-items-center ms-auto">


            <!-- User -->
            <?php foreach ($user_details as $value) : ?>
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="<?php echo base_url() ?>uploads/img/<?php echo $value['pic']; ?>" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">

                        <li>
                            <a class="dropdown-item" href="">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="<?php echo base_url() ?>uploads/img/<?php echo $value['pic']; ?>" alt class="w-px-40 h-auto rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block"><?php echo $value['name']; ?></span>
                                        <small class="text-muted">Admin</small>
                                    </div>
                                </div>
                            </a>
                        </li>


                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>profile-settings">
                                <i class="menu-icon tf-icons bx bx-user-check"></i>
                                <span class="align-middle">My Profile</span>
                            </a>
                        </li>
 <li>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>Dashboard/database_backup">
                                    <i class="menu-icon tf-icons bx bx-cog"></i>
                                    <span class="align-middle"> Database</span>
                                </a>
                            </li>
                        <?php if ($value['role'] == 'admin') { ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>settings">
                                    <i class="menu-icon tf-icons bx bx-cog"></i>
                                    <span class="align-middle"> Admin Panel Settings</span>
                                </a>
                            </li>
                        <?php }
                        ?>


                        <li>
                            <a class="dropdown-item" href="<?php echo base_url(); ?>logout">
                                <i class="menu-icon tf-icons bx bx-log-in-circle"></i>
                                <span class="align-middle">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>

            <?php endforeach; ?>
            <!--/ User -->


        </ul>
    </div>


    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper  d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
    </div>


</nav>
