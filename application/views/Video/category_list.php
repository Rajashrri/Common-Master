<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h4>Product Category List</h4>
                        <form action="<?php echo base_url() ?>category-list" method="POST" id="searchList">
                            <div class="input-group">
                                <input type="text" name="createdDate" value="<?php echo createdDate; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                </div>
                            </div>

                            <div class="card-body">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalAdd">Add Category</button>
                            </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                        <th >
                                            Sr No
                                        </th>
                                        <th>Category Name</th>
                                        <th>date</th>
                                        <th>Current Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1; ?>
                                    <?php foreach ($category_list as $value) : ?>

                                        <tr>
                                            <td>
                                                <?php echo $count++; ?>
                                            </td>
                                            <td><?php echo $value['category_name']; ?></td>               
                                            <td><?php echo date("d-m-Y", strtotime($value->createdDate)) ?></td>


                                            <td>
                                                <?php if ($value['status'] == '1') { ?>
                                                    <span class="badge bg-success">Active</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-danger">Deactivated</span>
                                                <?php } ?>
                                            </td>
                                            <td><?php echo date("d-m-Y", strtotime($value['createdDate'])); ?></td>
                                            <td><div class="btn-group" role="group" aria-label="Basic example">
                                                    <button type="button" class="btn btn-info fetch-category" data-id="<?php echo $value['id']; ?>" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"><i class="far fa-edit font-14"></i></button>
                                                    <button type="button" class="btn btn-info status-category" data-id="<?php echo $value['id']; ?>" data-status="<?php echo $value['status'] == '1' ? '0' : '1'; ?>"><i class="fa fa-wrench font-14"></i></button>
                                                    <button type="button" class="btn btn-info delete-category"  data-id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt font-14"></i></button>
                                                    <!--<button type="button" class="btn btn-info"><i class="far fa-trash-alt font-14"></i></button>-->
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="formModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add Product Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="add-category" method="post">
                    <input type="hidden" class="form-control" placeholder="Enter  Category id" name="id">
                    <div class="form-group" >
                        <div>
                            <label>Product Category</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Product Category Name" name="category_name">
                            <div class="invalid-feedback" id="category_error"></div>
                        </div>
                    </div>


                    <button id="addcat-btn" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="formModal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModal">Edit Product Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="update-category" method="post">
                    <input type="hidden" class="form-control" id="id" name="id">
                    <div class="form-group">
                        <div style="padding-bottom: 20px;">
                            <label>Product Category</label>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Enter Product Category Name" id="cat_name" name="category_name">
                            <div class="invalid-feedback" id="category_name_error"></div>
                        </div>
                    </div>


                    <button type="submit" id="addenq-btn" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();
            var link = jQuery(this).get(0).href;
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "category-list/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

