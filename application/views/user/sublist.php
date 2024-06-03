
<div class="container-xxl flex-grow-1 container-p-y">
 

    <!-- Complex Headers -->
    <div class="card">
    <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="card-header p-0">Sub Admin List</h5>
        
        </div>

        <div class="table-responsive tbl-padding">
<!--                                  <input type="hidden" name="url" id="url" value="fetch-subad">-->
<!--                      <table id ="data_table" class="table table-striped" id="table-1">-->
            <table  class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th >
                            Sr No
                        </th>
                        <th>Name</th>

                        <th>Role</th>
                        <th>Current Status</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    <?php foreach ($user as $value) : ?>
                        <?php $count++; ?>
                        <tr>
                            <td> <?php echo $count; ?></td>
                            <td><?php echo $value['name']; ?></td> 

                            <td><?php echo $value['role']; ?></td>



                            <td>     
                                <label class="switch switch-success">
                                    <?php if ($value['status'] == 1) { ?>
                                        <input type="checkbox" checked  data-id="<?php echo $value['id']; ?>"    data-status= "0"   class="switch-input status-subadmin"  />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <i class="bx bx-check"></i>
                                            </span>
                                        </span>
                                        <!-- <span class="switch-label">Active</span> -->
                                        <?php
                                    } elseif ($value['status'] == 0) {
                                        ?>
                                        <input type="checkbox"  data-id="<?php echo $value['id']; ?>"    data-status=' 1 ' class="switch-input status-subadmin"  />
                                        <span class="switch-toggle-slider">
                                            <span class="switch-off">
                                                <i class="bx bx-x" style="color:red;"></i>
                                            </span>
                                        </span>
                                        <!-- <span class="switch-label">Deactivated</span>-->
                                    <?php } ?>
                                </label> 
                            </td>
                            <td><?php echo date("d-m-Y", strtotime($value['createdDate'])); ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">



                                    <a class="btn btn-info btn-actions btn-sm" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Edit" href="edit-subadmin/<?php echo $value["id"]; ?>"><i class="far fa-edit font-14"></i></a>
                                    <button type="button" class="btn btn-info btn-actions btn-sm delete-subadmin" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" Parker data-id="<?php echo $value["id"]; ?>"><i class="far fa-trash-alt font-14"></i></button>
                                </div>
                            </td>



                        </tr>
                    <?php endforeach ?>
                </tbody>


            </table>
        </div>

    </div>
    </div>

</div>



<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>