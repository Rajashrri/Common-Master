

<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Complex Headers -->

    <div class="card">

        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-header p-0">Static Pages Seo List</h5>

              
            </div>    

      

        <div class="table-responsive tbl-padding">
            <form id="news" method="post" >

                <table class="table table-striped" id="example">

                    <thead>
                        <!-- <tr>
                        <th colspan="7" class="px-0">
                                    <button type="submit"  name="delete_all" value= "Delete" class="btn p-0">
                                       
                                        <i class="menu-icon tf-icons bx bxs-trash mx-1"></i>
                                    </button>
                                    <button type="submit" id="sta" class="btn btn-label-secondary btn-xs" disabled>Change Status</button> 
                                    <button type="button" id="status" name="status" value="Status" class="btn btn-outline-success btn-xs" style="display:none;" >Change Status</button>
                                </th>
                        </tr> 
                        <tr>-->
                            <!-- <th> 
                                <input type="button" id="toggle" value="Select All" onclick="toggle_check()" class="btn btn-info btn-xs">
                            </th> -->

                            <th >Sr No</th>

                            <th>Pagename</th>

                            <th>Meta Title</th>

                            <th>Meta Desc</th>
                            

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>
                        <?php $count = 1; ?>
                        <?php foreach ($plist as $value) : ?>

                            <tr>
                                <!-- <td class="text-center"><input type="checkbox" name="checkbox_value[]" value="<?php echo $value['id']; ?>"></td>  -->

                                <td> <?php echo $count++; ?></td>
                                <td><?php echo $this->common->selectivename($value['pagename'],'pagename','pagename');?></td> 


                                <td><?php echo $value['metatitle']; ?></td>
                                <td><?php echo $value['metadesc']; ?></td>
                               


                               

                                <td>

                                    <div class="btn-group" role="group" aria-label="Basic example">

                                        <a class="btn btn-info btn-actions btn-sm"  popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="<?php echo base_url(); ?>edit-staticseo/<?php echo $value["id"]; ?>"><i class="far fa-edit font-14"></i></a>


                                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-page"  data-id="<?php echo $value['id']; ?>"><i class="far fa-trash-alt font-14" title="Delete"></i></button>


                                    </div>


                                </td>


                            </tr>

                        <?php endforeach ?>

                    </tbody>



                </table>
            </form>
        </div>


        </div>
    </div>

</div>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>











