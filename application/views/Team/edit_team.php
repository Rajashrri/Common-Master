<?php foreach ($edit_details as $value) : ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">

            <!-- Browser Default -->

            <div class="col-md mb-4 mb-md-0">

                <div class="card">
                    <h5 class="card-header"> Edit Team
                    </h5>

                    <div class="card-body">

                        <form class="update-team" method="post" enctype="multipart/form-data" >

                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-name">Name</label>

                                <input type="text" class="form-control"  name="name" placeholder="Enter Name" value="<?php echo $value['name']; ?>">
                                <div class="invalid-feedback" id="nameteam_error"> </div>


                            </div>

                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-upload-file">Designation</label>

                                <input type="text" class="form-control" name="designation" placeholder="Enter Designation" value="<?php echo $value['designation']; ?>">
                                <div class="invalid-feedback" id="desoteam_error"> </div>


                            </div>
                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-upload-file">Image</label>
                                <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension Size 1050*1050 px</span>

                                <input type="file"  onchange="preview1EditTeam()" id="file1" class="form-control" accept="image/jpg, image/jpeg,image/webp" name="featured_image">
                            </div>

                            <div class="mb-3">
                                <?php if ($value['featured_image'] != NULL) { ?>
                                    <img style="width: 100px" src="<?php echo base_url() ?>uploads/team/<?php echo $value['featured_image']; ?>" id="imgbb">
                                <?php }
                                ?>

                            </div>  
                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-bio">Brief Intro</label>

                                <textarea class="form-control" name="briefintro" row="4" placeholder="Brief Intro"><?php echo $value['briefintro']; ?></textarea>

                                <div class="invalid-feedback" id="shortinfoteam_error"> </div>

                            </div> 
                            <div class="row">

                                <div class="col-12">
                                    <div class="text-end">
                                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $value['id']; ?>">

                                        <a class="btn btn-secondary"   href="<?php echo base_url(); ?>team_list">Back</a>

                                        <button type="submit" id="updateteam-btn"  class="btn btn-primary">Update</button>
                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


<?php endforeach; ?>
<script>

    function preview1EditTeam() {
        var fileInput = document.getElementById('file1');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.webp)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            $('.button').removeClass("hidden");
            imgbb.src = URL.createObjectURL(event.target.files[0]);
        }
    }

</script>


