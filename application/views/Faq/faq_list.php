<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Complex Headers -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-header p-0">FAQ's List</h5>
            </div>       
            <div class="table-responsive  tbl-padding">
                <form id="statuslist" method="post" >
                    <input type="hidden" name="listtbl" value="faq_list">
                    <input type="hidden" name="page_name" value="FAQ">
                    <input type="hidden" id="url22" value="fetch-faqlist">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th colspan="8" class="px-0">
                                    <button type="submit" id="delete_all"  name="delete_all" value= "Delete" class="btn p-0" style="display: none;">
                                        <!--Delete-->
                                        <i class="menu-icon tf-icons bx bxs-trash mx-1"></i>
                                    </button>
                                    <!--<button type="submit" id="sta" class="btn btn-label-secondary btn-xs" disabled>Change Status</button> -->
                                    <button type="button" id="status" name="status" value="Status" class="btn btn-outline-success btn-xs" style="display:none;" >Change Status</button>
                                </th>
                            </tr>
                            <tr>
                                <th> 
                                    <input type="checkbox" id="toggle" value="Select All" onclick="toggle_check()" class="form-check-input">
                                </th>
                                <th >Sr No</th>
                                <th>Category Name</th>
                                <th>Questions</th>
                                <th>View Answer</th>
                                <th>Current Status</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach ($faqcategory_list as $value) : ?>
                                <tr>
                                    <td class="text-center"><input type="checkbox" name="checkbox_value[]" value="<?php echo $value['id']; ?>"></td> 

                                    <td>
                                        <?php echo $count++; ?>
                                    </td>
                                    <td><?php echo $this->common->cat_name($value['category_id'], 'category', 'faq_category') ?></td> 

                                    <td><?php echo $value['faq']; ?></td>     
                                    <td><button type="button" class="btn btn-primary btn-xs fetch-faq" data-id="<?php echo $value['id']; ?>" data-bs-toggle="modal" data-bs-target="#basicModal">View</button></td>

                                    <td>     <label class="switch switch-success">
                                            <?php if ($value['status'] == 1) { ?>
                                                <input type="checkbox" checked  data-id="<?php echo $value['id']; ?>"    data-status= "0"   class="switch-input status-faq"  />
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on">
                                                        <i class="bx bx-check"></i>
                                                    </span>
                                                </span>
                                                <?php
                                            } elseif ($value['status'] == 0) {
                                                ?>
                                                <input type="checkbox"  data-id="<?php echo $value['id']; ?>"    data-status=' 1 ' class="switch-input status-faq"  />
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-off">
                                                        <i class="bx bx-x" style="color:red;"></i>
                                                    </span>
                                                </span>
                                            <?php } ?>
                                        </label> 
                                    </td>
                                    <td><?php echo date("d-m-Y", strtotime($value['createdDate'])); ?></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <?php
                                            $rrr = $this->common->subside($this->session->userdata('user_id'));
                                            if ($rrr->num_rows() > 0) {
                                                $res = $this->common->eachcheckpri('editf', $this->session->userdata('brw_logged_type'));
                                                if ($res->num_rows() > 0) {
                                                    ?>
                                                    <a class="btn btn-info btn-actions btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" href="edit-faq/<?php echo $value['id']; ?>"><i class="far fa-edit font-14" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Edit" title="Edit"></i></a>
                                                    <?php
                                                } else {
                                                    
                                                }
                                            } else {
                                                ?>
                                                <a class="btn btn-info btn-actions btn-sm" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" href="edit-faq/<?php echo $value['id']; ?>"><i class="far fa-edit font-14" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Edit" title="Edit"></i></a>
                                                <?php
                                            }
                                            $del = $this->common->subside($this->session->userdata('user_id'));
                                            if ($del->num_rows() > 0) {
                                                $delres = $this->common->eachcheckpri('delf', $this->session->userdata('brw_logged_type'));
                                                if ($delres->num_rows() > 0) {
                                                    ?>
                                                    <button type="button" class="btn btn-info btn-actions btn-sm delete-faq" data-bs-toggle="tooltip" data-popup="tooltip-custom"  data-id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt font-14" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" title="Delete"></i></button>
                                                    <?php
                                                } else {
                                                    
                                                }
                                            } else {
                                                ?>
                                                <button type="button" class="btn btn-info btn-actions btn-sm delete-faq" data-bs-toggle="tooltip" data-popup="tooltip-custom"  data-id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt font-14" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" title="Delete"></i></button>
                                            <?php } ?>
                                            <?php if ($this->session->userdata('user_id') == '1') { ?>
                                                <button type="button" class="btn btn-info  btn-sm fetch-seqfaq" data-id="<?php echo $value['id']; ?>"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>
                                            <?php } ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>View Answers Details</b></h5>
                <button type="button" id="cat_name" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div><hr>
            <div class="modal-body">
                <span id="answer" ></span>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="seqeditauthor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="update-seqfaq" method="post">                   
            <input type="hidden" class="form-control" id="idcatpro" name="id">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Sequence</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Sequence Id</label>

                            <input type="text" class="form-control" placeholder="Enter Sequence Id" id="seq_id" name="seq_id">

                            <div class="invalid-feedback" id="seq_error"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="seq-btn" class="btn btn-primary m-t-15 waves-effect">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>