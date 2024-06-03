<div class="container-xxl flex-grow-1 container-p-y">
 <!-- Complex Headers -->

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-header p-0">Role List</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                    Add Role 
                </button>
            </div>
            <div class="table-responsive tbl-padding">
                <form id="event_cat" method="post" >

                    <table class="table table-striped" id="example">

                        <thead>
                            <tr>

                            </tr>
                            <tr>

                                <th >

                                    Sr No

                                </th>

                                <th>Roles</th>
                                <th>Created Date</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php $count = 1; ?>

                            <?php foreach ($admin_panel_roles as $value) : ?>

                                <tr>
                                    <td>  <?php echo $count++; ?>  </td>
                                    <td><?php echo $value['role']; ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($value['createdDate'])); ?></td>
                                    <td>   
                                        <div class="btn-group align-items-center" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-info btn-actions btn-sm fetch-role" data-id="<?php echo $value['id']; ?>"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>
                                            <button type="button" class="btn btn-info btn-actions btn-sm delete-role"  data-id="<?php echo $value['id']; ?>"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="DELETE" data-bs-placement="top"><i class="far fa-trash-alt font-14"></i></button>
                                            <div>
                                                <a href="edit-privilege/<?php echo $this->common->selectivename2($value['role'], 'id', 'privilege', 'user_id') ?>" class="theme-text-color">
                                                    Set Privileges
                                                </a>
                                            </div>
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
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form class="update-role" method="post">                   
                <input type="hidden" class="form-control" id="id" name="id">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">Edit Role</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">

                                <label class="form-label" for="modalEditUserFirstName">Role</label>

                                <input type="text" class="form-control" placeholder="Enter Role" id="cat_name" name="role">

                                <div id="role_error" class="invalid-feedback"></div>

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="updatrole-btn" class="btn btn-primary m-t-15 waves-effect">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>


<div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="add-role" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Add Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Role</label>

                            <input type="text" class="form-control" placeholder="Enter Role" name="role">

                            <div id="role1_error" class="invalid-feedback"></div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addrole-btn" class="btn btn-primary m-t-15 waves-effect">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>