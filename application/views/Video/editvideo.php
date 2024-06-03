<?php foreach ($edit_details as $value) : ?>
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">
                <div class="card">
                    <h5 class="card-header">  Edit Video
                    </h5>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <?php echo $this->session->flashdata('success'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                                <div class="form_error">
                                    <?php echo validation_errors(); ?>
                                </div>
                            </div>
                        <?php } elseif ($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <?php echo $this->session->flashdata('warning'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                                <div class="form_error">
                                    <?php echo validation_errors(); ?>
                                </div>
                            </div>
                        <?php } ?>
                        <form id="myform2"  action="<?php echo base_url(); ?>editvideoupdate" method="post"  enctype="multipart/form-data" >
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Select Video Category</label>
                                        <select class="form-control"  name="category_id" >
                                            <option value="">Select Video Category</option>
                                            <?php foreach ($videocategory_list as $value3) : ?>
                                                <option value="<?php echo $value3['id']; ?>" <?php echo $value3['id'] == $value['category_id'] ? 'selected' : ''; ?>> <?php echo $value3['category_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Title</label>

                                        <input type="text" class="form-control" name="title" value="<?php echo $value['title']; ?>" placeholder="Author Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">UPLOAD IMAGE</label>
                                        <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension 850*650 px</span>
                                        <input type="file" id="file1" onchange="preview1EditVideo()" class="form-control" accept="image/jpg, image/jpeg,image/webp" name="featured_image">

                                    </div>
                                    <div class="mb-3">
                                        <?php if ($value['featured_image'] != NULL) { ?>
                                            <img style="width: 100px" src="<?php echo base_url() ?>uploads/videos/<?php echo $value['featured_image']; ?>" id="imgbb">
                                        <?php }
                                        ?>

                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">YT LINK  </label>
                                        <input type="text" class="form-control" name="link" value="<?php echo $value['link']; ?>"  placeholder="YT LINK ">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Brief Intro</label>
                                        <textarea class="form-control"  name="briefintro" required><?php echo $value['briefintro']; ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-end">

                                        <a class="btn btn-secondary"   href="<?php echo base_url(); ?>video-list">Back</a>
                                        <button type="submit"  class="btn btn-primary">Update</button>
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


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>





<script>


                                            $("#myform2").validate({
                                                rules: {

                                                    category_id: {
                                                        required: true,

                                                    },
                                                    link: {
                                                        required: true,

                                                    },

                                                    title: {
                                                        required: true,

                                                    },

                                                    briefintro: {
                                                        required: true,

                                                    }



                                                },
                                                messages: {
                                                    category_id: {
                                                        required: "Category can not be empty"

                                                    },
                                                    link: {
                                                        required: "Link can not be empty"

                                                    },

                                                    title: {
                                                        required: "Title is mandatory"

                                                    },

                                                    briefintro: {
                                                        required: "Brief Intro can not be empty"

                                                    }

                                                }
                                            });




</script>
<script>

    function preview1EditVideo() {
        var fileInput = document.getElementById('file1');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.webp)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            imgbb.src = URL.createObjectURL(event.target.files[0]);
        }
    }

</script>




