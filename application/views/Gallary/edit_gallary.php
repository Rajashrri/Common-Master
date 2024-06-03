<!-- Content -->
<?php foreach ($edit_details as $value) : ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">
                <div class="card">
                    <h5 class="card-header">Edit Image</h5>
                    <div class="card-body">
                        <form class="update-gal" method="post" enctype="multipart/form-data" >
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-country">Select Gallery Category</label>
                                <select class="form-select"  name="category_id">
                                    <option value="">Select Gallery Category</option>

                                    <?php foreach ($galcategory_list as $value1) : ?>

                                        <option value="<?php echo $value1['id']; ?>" <?php echo $value1['id'] == $value['category_id'] ? 'selected' : ''; ?>> <?php echo $value1['category_name']; ?></option>

                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback" id="categoryname1_error"> </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-name">Image Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $value['name']; ?>" placeholder="Enter Image Name" >

                                <div class="invalid-feedback" id="imgname1_error"> </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-file">Image</label>
                                <input type="file" onchange="preview()" class="form-control" name="featured_image" id="file1" >
                                <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg, webp) Note:Dimension Size 510*510px</span>

                                <div class="col-md-2">
                                    <img id="thumb" style="width: 100px" src="<?php echo base_url() ?>uploads/gallary/<?php echo $value['featured_image']; ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-end">
                                    <a href="<?php echo base_url(); ?>gallery-list" class="btn btn-secondary">Back</a>
                                    <button type="submit" id="updatgal-btn"  class="btn btn-primary">Update</button>
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

    function preview() {
        var fileInput = document.getElementById('file1');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.webp)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }
    }

</script>

