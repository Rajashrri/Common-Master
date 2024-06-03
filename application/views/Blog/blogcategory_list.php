<div class="container-xxl flex-grow-1 container-p-y">

    <div class="card">

        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-header p-0">Blog Category List</h5>
                <?php
                $rrr = $this->common->subside($this->session->userdata('user_id'));
                if ($rrr->num_rows() > 0) {
                    $res = $this->common->eachcheckpri('editcb', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) {
                        ?>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                            Add Blog Category
                        </button>
                        <?php
                    } else {
                        
                    }
                } else {
                    ?>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                        Add Blog Category
                    </button>
                <?php }
                ?>
            </div>

            <div class="table-responsive tbl-padding">
                <form id="statuscategory" method="post">
                    <input type="hidden" name="category_tbl" value="blogcategory">
                    <input type="hidden" name="listtbl" value="blog">
                    <input type="hidden" name="page_name" value="Blog Category">
                    <input type="hidden" id="url22" value="fetch-blogcategorylist">
                    <table class="table table-striped " id="example">

                        <thead>
                            <tr>
                                <th colspan="6" class="px-0">
                                    <button type="submit"  name="delete_all"  id="delete_all" value= "Delete" class="btn p-0" style="display:none;">
                                        <i class="menu-icon tf-icons bx bxs-trash mx-1"></i>
                                    </button>
                                    <button type="button" id="status" name="status" value="Status" class="btn btn-outline-success btn-xs" style="display:none;" >Change Status</button>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <input type="checkbox" id="toggle" value="Select All" onclick="toggle_check()" class="form-check-input">
                                </th>

                                <th >

                                    Sr No

                                </th>

                                <th>Category Name</th>

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

<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="update-blogcategory" method="post">                   
            <input type="hidden" class="form-control" id="id" name="id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Blog Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Blog Category Name</label>

                            <input type="text" class="form-control" placeholder="Enter Blog Category Name" id="cat_name" name="category_name">

                            <div id="category_error" class="invalid-feedback"></div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="updatblog-btn" class="btn btn-primary m-t-15 waves-effect">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="add-blogcategory" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Add Blog Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Blog Category Name</label>

                            <input type="text" class="form-control" placeholder="Enter Blog Category Name" name="category_name">

                            <div id="categoryname_error" class="invalid-feedback"></div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addblog-btn" class="btn btn-primary m-t-15 waves-effect">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="seqeditauthor" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="update-seqblogcat" method="post">                   
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

