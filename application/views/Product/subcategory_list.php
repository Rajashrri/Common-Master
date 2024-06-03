<style>
    .tbl-padding div#example_wrapper{
        padding: 0;
    }
</style>

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Complex Headers -->
    <div class="card">

        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-header p-0">Product category List</h5>
                <?php
                $rrr = $this->common->subside($this->session->userdata('user_id'));
                if ($rrr->num_rows() > 0) {
                    $res = $this->common->eachcheckpri('addscp', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) {
                        ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">Add Category</button>
                        <?php
                    } else {
                        
                    }
                } else {
                    ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalAdd">Add Category</button>
                <?php }
                ?>
            </div>

            <div class="table-responsive tbl-padding">
                <form id="statuscategory" method="post" >
                    <input type="hidden" name="category_tbl" value="tbl_subcategory">
                    <input type="hidden" name="listtbl" value="product">
                    <input type="hidden" name="page_name" value="Product Category/Sub Category">
                    <input type="hidden" id="url22" value="fetch-productsubcategorylist">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th colspan="7" class="px-0">
                                    <!--<button type="submit"  name="delete_all" value= "Delete" class="btn btn-danger btn-xs">Delete</button>-->
                                    <!--<button type="submit" name="status" value="Status" class="btn btn-success btn-xs">Status</button>       -->
                                    <button type="submit" id="delete_all" name="delete_all" value= "Delete" class="btn p-0" style="display:none;">
                                        <!--Delete-->
                                        <i class="menu-icon tf-icons bx bxs-trash mx-1"></i>
                                    </button>
                                    <!--<button type="submit" id="sta" class="btn btn-label-secondary btn-xs">Change Status</button> -->

                                    <button type="button" id="status" name="status" value="Status" class="btn btn-outline-success btn-xs" style="display:none;">Change Status</button>
                                </th>
                            </tr>
                            <tr>
                                <th> 
                                    <input type="checkbox" id="toggle" value="Select All" onclick="toggle_check()" class="form-check-input">
                                </th>
                                <th>
                                    Sr No
                                </th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Current Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </form>
            </div>

        </div>                        
    </div>
</div>



<div class="modal fade" id="editauthor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="update-subcategory" method="post">                   
            <input type="hidden" class="form-control" id="id" name="id">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Product Category Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label" for="modalEditUserFirstName">Select Category </label>
                            <select class="form-control"  name="category_id" id="e_category_id">

                                <option value="0">Select Category</option>
                                <?php foreach ($category_list as $value) : ?>

                                    <option value="<?php echo $value['id']; ?>">  <?php echo $value['subcategory']; ?></option>

                                <?php endforeach; ?>


                            </select>
                            <div class="invalid-feedback" id="categoryproedit_error"></div>
                        </div>

                    </div>  
                    <div class="row">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Product Category Name</label>

                            <input type="text" class="form-control" placeholder="Enter Product Category Name" id="subcat_name" name="subcategory">

                            <div class="invalid-feedback" id="subcategorycat_error"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="updatsub-btn" class="btn btn-primary m-t-15 waves-effect">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="exampleModalAdd" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="add-subcategory" method="post">                   
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Add Product Category Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label" for="bs-validation-country">Select Product Category</label>
                            <select class="form-select" name="category_id">
                                <option value="0">Select Category</option>

                                <?php foreach ($category_list as $value) : ?>

                                    <option value="<?php echo $value['id']; ?>">  <?php echo $value['subcategory']; ?></option>

                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback" id="categorypro_error"> </div>
                        </div>

                    </div>  
                    <div class="row">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Product Category Name</label>

                            <input type="text" class="form-control" placeholder="Enter Product Category Name" id="subcat_name" name="subcategory">

                            <div class="invalid-feedback" id="subcategory_error"></div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addsubcat-btn" class="btn btn-primary m-t-15 waves-effect">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="seqeditauthor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="update-seqprocat" method="post">                   
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






