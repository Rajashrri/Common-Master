
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">
        <div class="card-body">
            <h5 class="">Privileges</h5>
            <p>The content will be visible to selected Sub admin after the box is checked</p>
            <div class="privileges-main-box">
                <form class="privilege" method="POST">
                <div class="table-responsive tbl-padding">
                    <table class="table table-bordered" >
                        <thead>
                            <tr>
                                <th class="text-center first-25" style="width: 25%;">
                                    <div class="make-in-line">
                                        Select All
                                        <div class="ms-2">
                                            <label class="form-check m-0">

                                                <?php
                                                foreach ($edit_details as $row) {
                                                    if ($row['allpri'] == 1) {
                                                        ?>

                                                        <input type="checkbox" checked class="form-check-input status-priall" data-val="0" data-id="<?php echo $row['id']; ?>">
                                                    <?php } else { ?>   
                                                        <input type="checkbox" class="form-check-input status-priall" data-val="1" data-id="<?php echo $row['id']; ?>">

                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </th>
                                <th>Add</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>List</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = $this->common->adminpriset1($this->session->userdata('brw_logged_type'));

                            foreach ($result as $key) {

                                foreach ($edit_details as $row):

                                    if ($key['catf'] == 1 || $key['addf'] == 1 || $key['listf'] == 1) {
                                        ?>
                                    <input type="hidden" name="id"  id="subid" value="<?php echo $row['id'] ?>">
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                FAQ's
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addf'] == 1 && $row['editf'] == 1 && $row['listf'] == 1 && $row['delf'] == 1) {
                                                            ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="faq" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else {
                                                            ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="faq" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>

                                            <div class="ms-2">
                                                <?php if ($row['addf'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>" data-napage="faq" data-id="0" data-name="addf" value="<?php echo $row['addf'] ?>" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-name="addf" data-id="1" unchecked data-napage="faq" data-subid="<?php echo $row['id'] ?>" value="1" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>

                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editf'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>" data-napage="faq" data-id="0" data-name="editf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"data-name="editf" data-id="1" unchecked data-napage="faq" data-subid="<?php echo $row['id'] ?>" value="1" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delf'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>" data-napage="faq" data-id="0" data-name="delf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="faq"data-name="delf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listf'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="faq" data-name="listf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="faq" data-name="listf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                FAQ's Category
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addcf'] == 1 && $row['editcf'] == 1 && $row['catf'] == 1 && $row['delcf'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="faqc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="faqc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addcf'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" checked data-subid="<?php echo $row['id'] ?>" data-id="0" data-napage="faqc" data-name="addcf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-subid="<?php echo $row['id'] ?>" data-id="1"  data-napage="faqc" data-name="addcf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editcf'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="faqc" data-name="editcf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="faqc" data-name="editcf"  class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delcf'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>" data-id="0" data-napage="faqc" data-name="delcf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="faqc" data-name="delcf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['catf'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>" data-id="0" data-napage="faqc" data-name="catf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="faqc" data-name="catf" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }

                                if ($key['addv'] == 1 || $key['catv'] == 1 || $key['listv'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Video
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addv'] == 1 && $row['editv'] == 1 && $row['listv'] == 1 && $row['delv'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="video" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="video" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addv'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>" data-id="0" data-napage="video" data-name="addv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="video" data-name="addv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editv'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>" data-id="0" data-napage="video" data-name="editv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="video" data-name="editv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delv'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>" data-id="0" data-napage="video" data-name="delv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="video" data-name="delv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listv'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>" data-id="0" data-napage="video" data-name="listv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="video" data-name="listv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Video Category
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addcv'] == 1 && $row['editcv'] == 1 && $row['catv'] == 1 && $row['delcv'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="videoc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="videoc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addcv'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>" data-id="0" data-napage="videoc" data-name="addcv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="videoc" data-name="addcv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editcv'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?> " data-id="0" data-napage="videoc" data-name="editcv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="videoc" data-name="editcv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delcv'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="videoc" data-name="delcv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="videoc" data-name="delcv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['catv'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="videoc" data-name="catv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="videoc" data-name="catv" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }

                                if ($key['subcatp'] == 1 || $key['addp'] == 1 || $key['listp'] == 1) {
                                    ?>

                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Product
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addp'] == 1 && $row['editp'] == 1 && $row['listp'] == 1 && $row['delp'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="product" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="product" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>

                                            <div class="ms-2">
                                                <?php if ($row['addp'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="product" data-name="addp" value="<?php echo $row['addp'] ?>" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-name="addp" data-id="1" unchecked data-napage="product" data-subid="<?php echo $row['id'] ?>" value="1" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>

                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editp'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="product" data-name="editp" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"data-name="editp" data-id="1" unchecked data-napage="product" data-subid="<?php echo $row['id'] ?>" value="1" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delp'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="product" data-name="delp" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="product" data-name="delp" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listp'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="product"  data-name="listp" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="product" data-name="listp" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Product Category
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addscp'] == 1 && $row['editscp'] == 1 && $row['subcatp'] == 1 && $row['delscp'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="productc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="productc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addscp'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" checked data-subid="<?php echo $row['id'] ?>" data-id="0" data-napage="productc" data-name="addscp" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="<?php echo $row['addscp']; ?>" data-name="addcf" data-napage="productc" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editscp'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="productc" data-name="editscp" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="productc" data-name="editscp"  class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delscp'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="productc" data-name="delscp" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="productc" data-name="delscp" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['subcatp'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="productc" data-name="subcatp" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="productc" data-name="subcatp" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }

                                if ($key['addb'] == 1 || $key['catb'] == 1 || $key['listb'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Blog
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addb'] == 1 && $row['editb'] == 1 && $row['listb'] == 1 && $row['delb'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="blog" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="blog" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addb'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="blog" data-name="addb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="blog" data-name="addb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editb'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="blog" data-name="editb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="blog" data-name="editb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delb'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="blog" data-name="delb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="blog" data-name="delb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listb'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="blog" data-name="listb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="blog" data-name="listb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Blog Category
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addcb'] == 1 && $row['editcb'] == 1 && $row['catb'] == 1 && $row['delcb'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="blogc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="blogc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addcb'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="blogc" data-name="addcb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="blogc" data-name="addcb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editcb'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="blogc" data-name="editcb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="blogc" data-name="editcb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delcb'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="blogc" data-name="delcb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="blogc" data-name="delcb" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['catb'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-name="catb" data-napage="blogc" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-name="catb" data-napage="blogc" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                if ($key['addproject'] == 1 || $key['catproject'] == 1 || $key['listproject'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Project
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addproject'] == 1 && $row['editproject'] == 1 && $row['listproject'] == 1 && $row['delproject'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="project" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="project" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addproject'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="project" data-name="addproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="project" data-name="addproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editproject'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="project" data-name="editproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="project" data-name="editproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delproject'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="project" data-name="delproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="project" data-name="delproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listproject'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="project" data-name="listproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="project" data-name="listproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Project Category
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addcproject'] == 1 && $row['editcproject'] == 1 && $row['catproject'] == 1 && $row['delcproject'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="projectc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="projectc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addcproject'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="projectc" data-name="addcproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="projectc" data-name="addcproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editcproject'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="projectc" data-name="editcproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="projectc" data-name="editcproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delcproject'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="projectc" data-name="delcproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="projectc" data-name="delcproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['catproject'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-name="catproject" data-napage="catproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-name="catproject" data-napage="catproject" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }

                                if ($key['adds'] == 1 || $key['subcats'] == 1 || $key['lists'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Service
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['adds'] == 1 && $row['edits'] == 1 && $row['lists'] == 1 && $row['dels'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="service" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="service" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['adds'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="service" data-name="adds" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="service" data-name="adds" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['edits'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="service" data-name="edits" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="service" data-name="edits" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['dels'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="service" data-name="dels" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="service" data-name="dels" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['lists'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="service" data-name="lists" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="service" data-name="lists" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Service Category
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addscs'] == 1 && $row['editscs'] == 1 && $row['subcats'] == 1 && $row['delscs'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="servicec" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="servicec" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addscs'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="servicec" data-name="addscs" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="servicec" data-name="addscs" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editscs'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="servicec" data-name="editscs" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="servicec" data-name="editscs" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delscs'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="servicec" data-name="delscs" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="servicec" data-name="delscs" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['subcats'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0"data-napage="servicec"  data-name="subcats" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>"data-napage="servicec"  data-name="subcats" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                if ($key['adde'] == 1 || $key['cate'] == 1 || $key['liste'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Event
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['adde'] == 1 && $row['edite'] == 1 && $row['liste'] == 1 && $row['dele'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="event" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="event" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['adde'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="event" data-name="adde" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="event"data-name="adde" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['edite'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="event"data-name="edite" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="event" data-name="edite" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['dele'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="event" data-name="dele" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="event" data-name="dele" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['liste'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="event" data-name="liste" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="event" data-name="liste" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Event Category
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addce'] == 1 && $row['editce'] == 1 && $row['cate'] == 1 && $row['delce'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="eventc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="eventc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addce'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="eventc" data-name="addce" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="eventc" data-name="addce" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editce'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="eventc" data-name="editce" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="eventc" data-name="editce" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delce'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="eventc" data-name="delce" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="eventc" data-name="delce" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['cate'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="eventc" data-name="cate" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>"data-napage="eventc"  data-name="cate" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                if ($key['addj'] == 1 || $key['catj'] == 1 || $key['listj'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Job
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addj'] == 1 && $row['editj'] == 1 && $row['listj'] == 1 && $row['delj'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="job" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="job" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addj'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="job" data-name="addj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="job" data-name="addj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editj'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="job" data-name="editj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="job" data-name="editj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delj'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="job" data-name="delj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="job" data-name="delj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listj'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="job" data-name="listj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="job" data-name="listj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Job Category
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addcj'] == 1 && $row['editcj'] == 1 && $row['catj'] == 1 && $row['delcj'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="jobc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="jobc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addcj'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="jobc" data-name="addcj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" unchecked  data-id="1"  data-subid="<?php echo $row['id'] ?>" data-napage="jobc" data-name="addcj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editcj'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="jobc" data-name="editcj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="jobc" data-name="editcj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delcj'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="jobc" data-name="delcj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="jobc" data-name="delcj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['catj'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="jobc" data-name="catj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="jobc" data-name="catj" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                if ($key['addn'] == 1 || $key['catn'] == 1 || $key['listn'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                News
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addn'] == 1 && $row['editn'] == 1 && $row['listn'] == 1 && $row['deln'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="news" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="news" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addn'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="news" data-name="addn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="news" data-name="addn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editn'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="news" data-name="editn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="news" data-name="editn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['deln'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="news" data-name="deln" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="news" data-name="deln" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listn'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="news" data-name="listn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="news" data-name="listn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                News Category
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addcn'] == 1 && $row['editcn'] == 1 && $row['catn'] == 1 && $row['delcn'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="newsc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="newsc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addcn'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="newsc" data-name="addcn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="newsc" data-name="addcn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editcn'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="newsc" data-name="editcn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="newsc" data-name="editcn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delcn'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="newsc" data-name="delcn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="newsc" data-name="delcn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['catn'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="newsc" data-name="catn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="newsc" data-name="catn" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                if ($key['addg'] == 1 || $key['catg'] == 1 || $key['listg'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Gallery
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addg'] == 1 && $row['editg'] == 1 && $row['listg'] == 1 && $row['delg'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="gallery" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="gallery" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addg'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="gallery" data-name="addg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="gallery" data-name="addg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editg'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="gallery" data-name="editg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="gallery" data-name="editg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delg'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="gallery" data-name="delg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="gallery" data-name="delg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listg'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="gallery" data-name="listg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="gallery" data-name="listg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Gallery Category
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addcg'] == 1 && $row['editcg'] == 1 && $row['catg'] == 1 && $row['delcg'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="galleryc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="galleryc" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addcg'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="galleryc" data-name="addcg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="galleryc" data-name="addcg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editcg'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="galleryc" data-name="editcg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="galleryc" data-name="editcg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delcg'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="galleryc" data-name="delcg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="galleryc" data-name="delcg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['catg'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="galleryc" data-name="catg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="galleryc" data-name="catg" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                if ($key['addtest'] == 1 || $key['listest'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Testimonial
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addtest'] == 1 && $row['edittest'] == 1 && $row['listest'] == 1 && $row['deltest'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="testimonial" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="testimonial" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addtest'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="testimonial" data-name="addtest" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="testimonial" data-name="addtest" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['edittest'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="testimonial" data-name="edittest" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="testimonial" data-name="edittest" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['deltest'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="testimonial" data-name="deltest" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="testimonial" data-name="deltest" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listest'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="testimonial" data-name="listest" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="testimonial" data-name="listest" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                if ($key['addct'] == 1 || $key['listct'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Clientele
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addct'] == 1 && $row['editct'] == 1 && $row['listct'] == 1 && $row['delct'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="clientele" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="clientele" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addct'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="clientele" data-name="addct" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="clientele" data-name="addct" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editct'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="clientele" data-name="editct" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="clientele" data-name="editct" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delct'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="clientele" data-name="delct" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="clientele" data-name="delct" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listct'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="clientele" data-name="listct" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="clientele" data-name="listct" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                if ($key['addpd'] == 1 || $key['listpd'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Pdf
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addpd'] == 1 && $row['editpd'] == 1 && $row['listpd'] == 1 && $row['delpd'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="pdf" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="pdf" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addpd'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="pdf" data-name="addpd" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="pdf" data-name="addpd" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editpd'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="pdf" data-name="editpd" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="pdf" data-name="editpd" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delpd'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="pdf" data-name="delpd" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="pdf" data-name="delpd" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listpd'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="pdf" data-name="listpd" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="pdf"data-name="listpd" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                if ($key['addt'] == 1 || $key['listt'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Teams
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addt'] == 1 && $row['editt'] == 1 && $row['listt'] == 1 && $row['delt'] == 1) { ?>
                                                            <input type="checkbox" checked class="form-check-input status-prim" data-val="0" data-name="team" data-id="<?php echo $row['id'] ?>">
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="team" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addt'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="team" data-name="addt" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="team" data-name="addt" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editt'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="team" data-name="editt" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="team" data-name="editt" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['delt'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="team" data-name="delt" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="team" data-name="delt" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['listt'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="team" data-name="listt" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="team" data-name="listt" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                if ($key['addlink'] == 1 || $key['link'] == 1) {
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="make-in-line">
                                                Link
                                                <div class="ms-2">
                                                    <label class="form-check m-0">
                                                        <?php if ($row['addlink'] == 1 && $row['editlink'] == 1 && $row['link'] == 1 && $row['dellink'] == 1) { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="0" data-name="link" data-id="<?php echo $row['id'] ?>" checked>
                                                        <?php } else { ?>
                                                            <input type="checkbox" class="form-check-input status-prim" data-val="1" data-name="link" data-id="<?php echo $row['id'] ?>">
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['addlink'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="link" data-name="addlink" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox" data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="link" data-name="addlink" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['editlink'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="link" data-name="editlink" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="link" data-name="editlink" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['dellink'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"   checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="link" data-name="dellink" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="link" data-name="dellink" class="switch-input status-pri">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="ms-2">
                                                <?php if ($row['link'] == 1) { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  checked data-subid="<?php echo $row['id'] ?>"data-id="0" data-napage="link" data-name="link" class="switch-input status-prim">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } else { ?>
                                                    <label class="switch switch-success">
                                                        <input type="checkbox"  data-id="1" unchecked data-subid="<?php echo $row['id'] ?>" data-napage="link" data-name="link" class="switch-input status-prim">
                                                        <span class="switch-toggle-slider">
                                                            <span class="switch-off">
                                                                <i class="bx bx-x" style="color:red;"></i>
                                                            </span>
                                                        </span>
                                                    </label>
                                                <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            endforeach;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                    
                    
                     </br>
                    <div class="row">

                            <div class="col-12 text-end">

                                <button type="submit" id="privilege-update_new" class="btn btn-primary">Update</button>
                                <a href="<?php echo base_url();?>roles" class="btn btn-secondary">Back</a>
                            </div>

                   </div>
                        </form>
            </div>

        </div>
    </div>
</div>
  <script>
        //  $(".status-pri").change(function(){  
        //  $(".status-pri").each(function(){
        //             $(this).prop("checked",false);
        //             $(".status-prim").each(function(){
        //             $(this).prop("checked",false);
        //        });
        //        });
        //  }); 
        $("#all").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
               $(".status-prim").each(function(){
                    $(this).prop("checked",true);
               });
               $(".status-pri").each(function(){
                    $(this).prop("checked",true);
               });
          }else{
               $(".status-prim").each(function(){
                    $(this).prop("checked",false);
               });
               $(".status-pri").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });

        $("#faqpc").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".faqpc").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".faqpc").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#vid").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".vid").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".vid").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#vidc").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".vidc").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".vidc").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#pro").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".pro").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".pro").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#proc").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".proc").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".proc").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#bl").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".bl").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".bl").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#blc").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".blc").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".blc").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#ser").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".ser").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".ser").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#serc").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".serc").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".serc").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#eve").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".eve").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".eve").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#evec").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".evec").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".evec").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#job").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".job").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".job").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#jobc").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".jobc").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".jobc").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#gal").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".gal").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".gal").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#galc").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".galc").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".galc").each(function(){
                    $(this).prop("checked",false);
               });
            }
        }); $("#test").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".test").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".test").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#pdf").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".pdf").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".pdf").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#lk").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".lk").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".lk").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#te").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".te").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".te").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#faq").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".faqp").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".faqp").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });
        $("#cl").change(function(){
          var checked = $(this).is(':checked');
          if(checked){
                $(".cl").each(function(){
                        $(this).prop("checked",true);
                });
            }else{
                $(".cl").each(function(){
                    $(this).prop("checked",false);
               });
            }
        });

 
    // Changing state of CheckAll checkbox 
    $(".status-prim").click(function(){
 
          if($(".status-prim").length == $(".status-prim:checked").length) {
                $("#all").prop("checked", true);
          } else {
                $("#all").prop("checked", false);
          }

    });
    
    $(".status-pri").click(function(){
 
    if($(".status-pri").length == $(".status-pri:checked").length) {
        $("#all").prop("checked", true);
    } else {
        $("#all").prop("checked", false);
    }

    });
    // $('input[type="checkbox"]:checked').each(function() {
    //     $('#all').prop("checked",true);
    // })
 
    
    </script>