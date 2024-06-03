<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<div class="row mb-4">
        <!-- Browser Default -->
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header"> <?php echo $page_name; ?></h5>
                <div class="card-body">
                    <form class="add-gal" method="post" enctype="multipart/form-data" >
                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-country">Select Gallary Category</label>
                            <select class="form-select"  name="category_id">
                                <option value="">Select Gallery Category</option>

                                <?php foreach ($galcategory_list as $value) : ?>

                                    <option value="<?php echo $value['id']; ?>">  <?php echo $value['category_name']; ?></option>

                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback" id="categoryname_error"> </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-name">Image Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Image Name">

                            <div class="invalid-feedback" id="imgname_error"> </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="bs-validation-upload-file">Image</label>
                            <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg, webp) Note:Dimension Size 510*510px</span>

                            <input type="file" onchange="preview()" id="file1" class="form-control" name="featured_image" accept="image/jpg,image/webp,image/jpeg">

                            <div class="invalid-feedback" id="img_error"> </div>
                            <img id="thumb" style="width: 100px" src="">

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-end">

                                    <a href="<?php echo base_url(); ?>gallery-list" class="btn btn-secondary">Back</a>
                                    <button type="submit" id="addgal-btn"  class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



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
