
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">
        <!-- Browser Default -->
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold mb-0">
                        Profile Page
                    </h4>
                </div>

                <?php foreach ($user_details as $value) : ?>
                    <div class="card-body">
                        <form  class="edit-profile" method="post" enctype="multipart/form-data">
                            <!-- action="blog/insert_blog" -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Name</label>
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo $value['name']; ?>">
                                        <div id="name_error" class="invalid-feedback">
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Mobile</label>
                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact" value="<?php echo $value['contact']; ?>">
                                        <div id="contact_error" class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Email</label>
                                        <input id="thisupdateemail" name="email" type="hidden" value="<?php echo base64_encode($this->session->userdata('email')); ?>">

                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo $value['email']; ?>">
                                        <div id="email_error" class="invalid-feedback">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Profile Pic</label>
                                        <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg) Note:Dimension Size 16*16px</span>

                                        <input type="file" onchange="previewProfile()" class="form-control" id="file" name="pic">

                                        <div class="col-md-2">
                                            <?php if ($value['pic'] != NULL) { ?>
                                                <br>  <img  style="width: 100px" src="<?php echo base_url() ?>uploads/img/<?php echo $value['pic']; ?>" id="imgb">
                                            <?php }
                                            ?>

                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-end">

                                            <button type="submit" class="btn btn-primary mt-3" id="edit-profile-btn">Update</button>
                                        </div>
                                    </div>

                                </div>
                        </form>
                    </div>
                <?php endforeach; ?>       

            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold mb-0">
                        Reset Password
                    </h4>
                </div>
                <div class="card-body">
                    <form  class="feset-password" method="post" enctype="multipart/form-data">
                        <!-- action="blog/insert_blog" -->
                        <div class="row">
                            <div class="col-md-12">

                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="password">Current Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" style="border-right:0; border-radius:0;" id="current_password" class="form-control" name="current_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                        <div id="current_password_error" class="invalid-feedback">
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="bs-validation-name">New Password </label>
                                <div class="input-group input-group-merge">
                                    <input type="password" style="border-right:0; border-radius:0;" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                                    <div id="new_password_error" class="invalid-feedback">
                                    </div> 
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 form-password-toggle">
                                    <label class="form-label" for="bs-validation-name">Confirm Password</label>
                                    <div class="input-group input-group-merge">

                                        <input type="password" style="border-right:0; border-radius:0;" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password">
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>

                                        <div id="confirm_password_error" class="invalid-feedback">
                                        </div>                          
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12"> 
                                <div class="text-end">

                                    <button class="btn btn-primary mt-3" id="reset-btn" type="submit">Reset</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>

</div>
</div>

<script>

     function previewProfile() {
         var fileInput = document.getElementById('file');
         var filePath = fileInput.value;
         var allowedExtensions = /(\.jpg|\.jpeg|\.webp)$/i;
         if (!allowedExtensions.exec(filePath)) {
             alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
             fileInput.value = '';
             return false;
         } else {
             //Image preview
             imgb.src = URL.createObjectURL(event.target.files[0]);
         }
     }

</script>




