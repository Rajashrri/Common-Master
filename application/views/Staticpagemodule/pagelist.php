



<div class="container-xxl flex-grow-1 container-p-y">



    <!-- Complex Headers -->

    <div class="card">



       

        <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="card-header p-0">Static Page List</h5>
         
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#smallModal">
                Add Static Page Name
            </button>
        
        </div>



        <div class="table-responsive tbl-padding">
            <form id="blog_cat" method="post" >
                <table class="table table-striped " id="example">

                    <thead>
                       
                        <tr>
                           

                            <th >

                                Sr No

                            </th>

                            <th>Page Name</th>

                            <th>Created Date</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php $count = 1; ?>

                        <?php foreach ($list as $value) : ?>

                            <tr>
                                

                                <td>

                                    <?php echo $count++; ?>

                                </td>

                                <td><?php echo $value['pagename']; ?></td>


                               <td><?php echo date("d-m-Y", strtotime($value['createdDate'])); ?></td>

                                <td><div class="btn-group" role="group" aria-label="Basic example">
     
                                  
                                        <button type="button" class="btn btn-info btn-actions btn-sm fetch-page" data-id="<?php echo $value['id']; ?>"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>
                                    
                                   
                                          <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-page-static"  data-id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt font-14"></i></button>
                                    
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



<div class="modal fade" id="exampleModalEdit" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="update-page" method="post">                   
            <input type="hidden" class="form-control" id="id" name="id">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Edit Page Name</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Page Name</label>

                            <input type="text" class="form-control" placeholder="Enter Page Name" id="cat_name" name="pagename">

                            <div id="pagename1_error" class="invalid-feedback"></div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="updatepage-btn" class="btn btn-primary m-t-15 waves-effect">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <form class="add-page" method="post">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Add Page</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">

                            <label class="form-label" for="modalEditUserFirstName">Page Name</label>

                            <input type="text" class="form-control" placeholder="Enter Page Name" name="pagename">

                            <div id="pagename_error" class="invalid-feedback"></div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="addpage-btn" class="btn btn-primary m-t-15 waves-effect">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

