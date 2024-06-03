<style>
    .modal-simple .btn-close {
        position: absolute;
        top: 0;
        right: 6px !important;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Complex Headers -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-header p-0">Links</h5>
                <?php
                $rrr = $this->common->subside($this->session->userdata('user_id'));
                if ($rrr->num_rows() > 0) {
                    $res = $this->common->eachcheckpri('addlink', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) {
                        ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">Add Links</button>
                        <?php
                    } else {
                        
                    }
                } else {
                    ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">Add Links</button>
                <?php }
                ?>
            </div>

            <div class="table-responsive tbl-padding">

                <form id="statuslist" method="post" >   
                   <input type="hidden" name="listtbl" value="link">
                    <input type="hidden" name="page_name" value="Link"> 
                    <input type="hidden" id="url22" value="fetch-linklist">   
                    <table  class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th colspan="7" class="px-0">
                                    <button type="submit"  name="delete_all" id="delete_all" value= "Delete" class="btn p-0" style="display:none;">
                                        <!--Delete-->
                                        <i class="menu-icon tf-icons bx bxs-trash mx-1"></i>
                                    </button>
                                    <button type="button" id="status" name="status" value="Status" class="btn btn-outline-success btn-xs" style="display:none;" >Change Status</button>
                                </th>
                            </tr>
                            <tr>
                                <th> 
                                    <input type="checkbox" id="toggle" value="Select All" onclick="toggle_check()" class="form-check-input">
                                </th>
                                <th>
                                    Sr No
                                </th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Current Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $count = 1; ?>
                            <?php foreach ($link_list as $value) : ?>
                                <tr>
                                    <td class="text-center"><input type="checkbox" name="checkbox_value[]" value="<?php echo $value['id']; ?>"></td> 
                                    <td>
                                        <?php echo $count++; ?>
                                    </td>
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['link']; ?></td>

                                    <td>     <label class="switch switch-success">
                                            <?php if ($value['status'] == 1) { ?>
                                                <input type="checkbox" checked  data-id="<?php echo $value['id']; ?>"    data-status= "0"   class="switch-input status-link"  />
                                                <span class="switch-toggle-slider">
                                                    <span class="switch-on">
                                                        <i class="bx bx-check"></i>
                                                    </span>
                                                </span>
                                                <?php
                                            } elseif ($value['status'] == 0) {
                                                ?>
                                                <input type="checkbox"  data-id="<?php echo $value['id']; ?>"    data-status=' 1 ' class="switch-input status-link"  />
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
                                                $res = $this->common->eachcheckpri('editlink', $this->session->userdata('brw_logged_type'));
                                                if ($res->num_rows() > 0) {
                                                    ?>
                                                    <button type="button" class="btn btn-info btn-actions btn-sm fetch-link" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  data-id="<?php echo $value['id']; ?>" data-bs-toggle="modal" data-bs-target="#editauthor" title="Edit"><i class="far fa-edit font-14"><span class="stretched-link" data-bs-toggle="modal" data-bs-target="#editauthor"></span></i></button>
                                                    <?php
                                                } else {
                                                    
                                                }
                                            } else {
                                                ?>
                                                <button type="button" class="btn btn-info btn-actions btn-sm fetch-link" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  data-id="<?php echo $value['id']; ?>" data-bs-toggle="modal" data-bs-target="#editauthor" title="Edit"><i class="far fa-edit font-14"><span class="stretched-link" data-bs-toggle="modal" data-bs-target="#editauthor"></span></i></button>
                                                <?php
                                            }
                                            $del = $this->common->subside($this->session->userdata('user_id'));
                                            if ($del->num_rows() > 0) {
                                                $delres = $this->common->eachcheckpri('dellink', $this->session->userdata('brw_logged_type'));
                                                if ($delres->num_rows() > 0) {
                                                    ?>
                                                    <button type="button" class="btn btn-info btn-actions btn-sm delete-link" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  data-id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt font-14"></i></button>
                                                    <?php
                                                } else {
                                                    
                                                }
                                            } else {
                                                ?>
                                                <button type="button" class="btn btn-info btn-actions btn-sm delete-link" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  data-id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt font-14"></i></button>

                                            <?php } ?>

                                            <?php if ($this->session->userdata('user_id') == '1') { ?>
                                                <button type="button" class="btn btn-info  btn-sm fetch-seqlink" data-id="<?php echo $value['id']; ?>"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>
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
<div class="modal fade" id="editauthor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-simple modal-edit-user">
        <div class="modal-content p-1">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3>Edit Link</h3>
                </div>
                <form class="update-link" method="post">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="modalEditUserFirstName">Title</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <div class="invalid-feedback" id="title11_error"></div>
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="modalEditUserFirstName">Link</label>
                        <input type="text" class="form-control" id="link" name="link">
                        <div class="invalid-feedback" id="name11_error"></div>
                    </div>
                    <br>
                    <div class="col-12 text-center g-3">
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        <button type="submit" id="updalink-btn" class="btn btn-primary me-sm-3 me-1">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-simple modal-edit-user">
        <div class="modal-content p-1">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3>Add Links</h3>
                </div>
                <form class="add-link" method="post" enctype="multipart/form-data" class="row mb-3">
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="modalEditUserFirstName">Title</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <div class="invalid-feedback" id="title_error"></div>
                    </div>
                    <div class="col-12 col-md-12">
                        <label class="form-label" for="modalEditUserFirstName">Link</label>
                        <input type="text" class="form-control" id="link" name="link">
                        <div class="invalid-feedback" id="name_error"></div>
                    </div>
                    <br>
                    <div class="col-12 text-center mb-3">
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                        <button type="submit" id="addlink-btn" class="btn btn-primary me-sm-3 me-1">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="seqeditauthor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="update-seqlink" method="post">                   
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