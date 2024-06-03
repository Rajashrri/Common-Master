<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
<div class="row mb-4">
        <!-- Browser Default -->
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header">  <?php echo $page_name; ?>
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
                    <?php } ?> 
                    <form id="myform2" action="News/insert_news"   method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">Select News Category</label>
                                    <select class="form-control"  name="category_id">
                                        <option value="">Select News Category</option>

                                        <?php foreach ($newscategory_list as $value) : ?>

                                            <option value="<?php echo $value['id']; ?>">  <?php echo $value['category_name']; ?></option>

                                        <?php endforeach; ?>
                                    </select>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">News TITLE</label>
                                    <input type="text" class="form-control" name="title" placeholder="News TITLE">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name" >POSTED BY</label>
                                    <input type="text" class="form-control" placeholder="POSTED BY" name="posted_by"> 

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name" >DATE</label>
                                    <input type="date" class="form-control" placeholder="YYYY-MM-DD" name="date" id="flatpickr-date" > 

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Featured Image</label>
                                    <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension 850*650 px</span>
                                    <input type="file" id="file2" onchange="preview1()" class="form-control" accept="image/jpg, image/jpeg,image/webp" name="featured_image">

                                </div>
                                <div class="mb-3">                            
                                    <img id="thumb1" style="width: 100px" src="">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Main Image</label>
                                    <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension Size 1920*720 px</span>
                                    <input type="file" id="file" onchange="preview()" class="form-control" accept="image/jpg, image/jpeg,image/webp" name="main_img">
                                </div>
                                <div class="mb-3">                            
                                    <img id="thumb" style="width: 100px" src="">

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Brief Intro</label>
                                    <textarea class="form-control" name="briefintro" placeholder="Brief Intro" ></textarea>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="editor" class="form-label" for="bs-validation-name">Details</label>
                                    <textarea class="form-control editor-error-placement" id="description" name="details" placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="text-end">

                                    <a class="btn btn-secondary"   href="<?php echo base_url(); ?>news-list">Back</a>
                                    <button type="submit"   class="btn btn-primary">Add</button>

                                </div>
                            </div>
                        </div>

                </div>
                </form>

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>
<script>
                                        // ClassicEditor.create(document.querySelector("#blogDetail"));

                                        CKEDITOR.replace('description', {
                                            filebrowserUploadUrl: "<?php echo base_url(); ?>News/upload"
                                        });
                                        CKEDITOR.instances["description"].on('key', function () {
                                            checkEditorText('description');
                                        });

</script>

<script>

    jQuery.validator.addMethod('ckrequired', function (value, element, params) {
        var idname = jQuery(element).attr('id');
        var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
        return !params || messageLength.length !== 0;
    }, "Details field is required");
    $("#myform2").validate({
        ignore: [],

        rules: {

            category_id: {
                required: true,

            },
            title: {
                required: true,

            },
            posted_by: {
                required: true,

            },
            date: {
                required: true,

            },

            main_img: {
                required: true,
                extension: "jpg|jpeg|webp"

            },

            featured_image: {
                required: true,
                extension: "jpg|jpeg|webp"

            },

            briefintro: {
                required: true,

            },

            details: {
                ckrequired: true
            }

        },
        messages: {
            category_id: {
                required: "Category can not be empty"

            },
            title: {
                required: "Title can not be empty"

            },
            posted_by: {
                required: "Posted By can not be empty"

            },
            date: {
                required: "Date can not be empty"

            },

            main_img: {
                required: "Main Image is mandatory",
                extension: "Please select only jpg,jpeg, webp files"


            },

            featured_image: {
                required: "Featured Image is mandatory.",
                extension: "Please select only jpg,jpeg, webp files"
            },

            briefintro: {
                required: "Brief Intro can not be empty"

            }


        }
    });




</script>

<script>

    function preview() {
        var fileInput = document.getElementById('file');
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


<script>

    function preview1() {
        var fileInput = document.getElementById('file2');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.webp)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
            fileInput.value = '';
            return false;
        } else {
            //Image preview
            thumb1.src = URL.createObjectURL(event.target.files[0]);
        }
    }

</script>


