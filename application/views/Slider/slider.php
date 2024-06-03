<?php foreach ($edit_details as $value) : ?>
<div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">
                <div class="card"> <h5 class="card-header">  <?php echo $page_name; ?>
                    </h5>

                    <div class="card-body">
                        <form class="update-slider" method="post" enctype="multipart/form-data" >

                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $value['id']; ?>">

                            <h6>Slider1</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Slider title</label>
                                        <input type="text" name="slider1_title" value="<?php echo $value['slider1_title']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Description</label>
                                        <input type="text" name="slider1_des" value="<?php echo $value['slider1_des']; ?>" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Upload Image</label>
                                        <input type="file" class="form-control" name="slider1_img" id="file" onchange="previewSlider1()">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <?php if ($value['slider1_img'] != NULL) { ?>
                                            <img style="width: 100px" src="<?php echo base_url() ?>uploads/slider1/<?php echo $value['slider1_img']; ?>" id="imgb" alt="Silder 1">
                                        <?php }
                                        ?>

                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Button Name</label>
                                        <input type="text" name="slider1_btnname" value="<?php echo $value['slider1_btnname']; ?>" class="form-control">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Button Link</label>
                                        <input type="text" name="slider1_btnlink" value="<?php echo $value['slider1_btnlink']; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <h6>Slider2</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Slider title</label>
                                        <input type="text" name="slider2_title" value="<?php echo $value['slider2_title']; ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Description</label>
                                        <input type="text" name="slider2_des" value="<?php echo $value['slider2_des']; ?>" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Upload Image</label>
                                        <input type="file" class="form-control" name="slider2_img" id="file1" onchange="previewSlider2()">
                                    </div>
                                </div>
                                <div class="col-md-6">


                                    <div class="mb-3">
                                        <?php if ($value['slider2_img'] != NULL) { ?>
                                            <img style="width: 100px" src="<?php echo base_url() ?>uploads/slider2/<?php echo $value['slider2_img']; ?>" id="imgbb" alt="Silder 2">
                                        <?php }
                                        ?>

                                    </div>  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Button Name</label>
                                        <input type="text" name="slider2_btnname" value="<?php echo $value['slider2_btnname']; ?>" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Button Link</label>
                                        <input type="text" name="slider2_btnlink" value="<?php echo $value['slider2_btnlink']; ?>" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <h6>Slider3</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Slider title</label>
                                        <input type="text" name="slider3_title" value="<?php echo $value['slider3_title']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Description</label>
                                        <input type="text" name="slider3_des" value="<?php echo $value['slider3_des']; ?>" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Upload Image</label>
                                        <input type="file" class="form-control" name="slider3_img" id="file2" onchange="previewSlider3()">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <?php if ($value['slider3_img'] != NULL) { ?>
                                            <img style="width: 100px" src="<?php echo base_url() ?>uploads/slider3/<?php echo $value['slider3_img']; ?>" id="imgbbb" alt="Silder 3">
                                        <?php }
                                        ?>

                                    </div>  

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Button Name</label>
                                        <input type="text" name="slider3_btnname" value="<?php echo $value['slider3_btnname']; ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Button Link</label>
                                        <input type="text" name="slider3_btnlink" value="<?php echo $value['slider3_btnlink']; ?>" class="form-control">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-end">
                                    <button type="submit" id="updatslider-btn"  class="btn btn-primary">Add</button>
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

    function previewSlider1() {
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


    function previewSlider2() {
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

    function previewSlider3() {
        var fileInput = document.getElementById('file2');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.webp)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            $('.button').removeClass("hidden");
            imgbbb.src = URL.createObjectURL(event.target.files[0]);
        }
    }
</script>
