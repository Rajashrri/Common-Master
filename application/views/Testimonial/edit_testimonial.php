<?php foreach ($edit_details as $value) : ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">
                <div class="card">
                    <h5 class="card-header"> Edit Testimonials
                    </h5>

                    <div class="card-body">

                        <form class="update-testimonial" method="post" enctype="multipart/form-data" >
                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-name">Name</label>

                                <input type="text" class="form-control"  name="name" placeholder="Enter Name" value="<?php echo $value['name']; ?>">
                                <div class="invalid-feedback" id="nametest_error"> </div>


                            </div>
                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-upload-file">Designation</label>

                                <input type="text" class="form-control" name="designation" placeholder="Enter Designation" value="<?php echo $value['designation']; ?>">


                            </div>
                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-upload-file">Image</label>
                                <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension Size 1050*1050 px</span>
                                <input type="file" class="form-control" name="image" id="file" onchange="previewTest()">
                                <div class="invalid-feedback" id="msg1_error"> </div>

                            </div>
                            <div class="mb-3">
                                <?php if ($value['image'] != NULL) { ?>
                                    <img style="width: 100px" src="<?php echo base_url() ?>uploads/testimonials/<?php echo $value['image']; ?>" id="imgb">
                                <?php }
                                ?>

                            </div>  

                            <div class="mb-3">

                                <label class="form-label" for="bs-validation-bio">Feedback</label>

                                <textarea class="form-control" name="shortinfo" row="4" placeholder="Brief Intro"><?php echo $value['shortinfo']; ?></textarea>

                                <div class="invalid-feedback" id="shortinfotest_error"> </div>

                            </div> 
                            <div class="row">

                                <div class="col-12">
                                    <div class="text-end">
                                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $value['id']; ?>">
                                        <a href="<?php echo base_url(); ?>testimonial_list" class="btn btn-secondary">Back</a>
                                        <button type="submit" id="addteam-btn"  class="btn btn-primary">Update</button>
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

    function previewTest() {
        var fileInput = document.getElementById('file');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.webp)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            $('.button').removeClass("hidden");
            imgb.src = URL.createObjectURL(event.target.files[0]);
        }
    }

</script>
