<style>
    .invalid-tooltip{
        position: inherit;
        background-color: white;
        color: red;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">





<h4 class="fw-bold py-3 mb-4">

  <?php echo $page_name; ?>
</h4>

<div class="row mb-4">

    <!-- Browser Default -->

    <div class="col-md mb-4 mb-md-0">

        <div class="card">

            <div class="card-body">

              <?php  foreach($details as $value){ ?>
                <form id="update-subadmin"  method="POST">
                 <input type="hidden" name="id" id="subid" value="<?php echo $value['id'];?>">
                <div class="row">
                        <div class="col-md-6">
                    <div class="mb-3">

                        <label class="form-label" for="bs-validation-name">Name</label>

                        <input type="text" class="form-control" id="name" value="<?php echo $value['name'];?>" name="name" placeholder="Enter Name" >
                        <div class="invalid-feedback" id="name_error"> </div>


                    </div>
</div>


<div class="col-md-6">
                    <div class="mb-3">

                    <label class="form-label" for="bs-validation-country">Role</label>
                            <select class="form-control" id="role" value="Select Role" name="role">
                               
                                  <?php foreach($adrole as $val): ?>
                                <option value="<?php echo $val['role']?>"  <?php echo $val['role'] == $value['role'] ? 'selected' : ''; ?>><?php echo $val['role']?></option>
                                
                            <?php endforeach; ?>  
                              </select>
                              <div class="invalid-feedback" id="role_error"> </div>
                    </div>
</div>
</div>
                    <div class="row">
                        <div class="col-md-6">
                    <div class="mb-3">

                    <label class="form-label" for="bs-validation-upload-file">Email id</label>
                    <input type="text" class="form-control" value="<?php echo $value['email'];?>" name="email" id="email" placeholder="Enter Email Id" >

                    <div class="invalid-feedback" id="email_error"> </div>

                    </div>
</div>

<div class="col-md-6">
                    <div class="mb-3">

                        <label class="form-label" for="bs-validation-bio">Password</label>

                        <input type="text" class="form-control" id="password" value="" name="password" placeholder="Enter Password" >


                    </div> 

                    </div>
                    </div>



                    <div class="row">

                        <div class="col-12 text-end">

                            <button type="submit" id="edit-subadmin"  class="btn btn-primary">Update</button>
                            <a href="<?php echo base_url();?>subadminlist" class="btn btn-secondary">Back</a>
                        </div>

                    </div>

                </form>
                  <?php }?>
            </div>

        </div>

    </div>

</div>

</div>
