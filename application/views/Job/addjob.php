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
                    <form id="myform2" action="Job/insert_job"   method="post" enctype="multipart/form-data">
                        <!-- action="job/insert_job" -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">Select Job Category</label>
                                    <select class="form-control"  name="category_id">
                                        <option value="">Select Job Category</option>

                                        <?php foreach ($jobcategory_list as $value) : ?>

                                            <option value="<?php echo $value['id']; ?>">  <?php echo $value['category_name']; ?></option>

                                        <?php endforeach; ?>
                                    </select>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Job Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Job Title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Designation</label>
                                    <input type="text" class="form-control" name="designation" placeholder="Designation">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Salary Offered</label>
                                    <input type="text" class="form-control" name="salary" placeholder="Salary Offered">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Featured Image</label>
                                    <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension 850*650 px</span>
                                    <input type="file" id="file1" onchange="preview1Job()" class="form-control" accept="image/jpg, image/jpeg,image/webp" name="featured_image">
                                </div>
                                <div class="mb-3">                            
                                    <img id="thumb" style="width: 100px" src="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Experience </label>
                                    <input type="text" class="form-control" name="experience" placeholder="Experience">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Brief Intro</label>
                                    <textarea class="form-control" name="shortdescription" placeholder="Brief Intro" ></textarea>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="editor" class="form-label" for="bs-validation-name">Details</label>
                                    <textarea class="form-control editor-error-placement" id="description" name="description" placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="text-end">
                                    <a class="btn btn-secondary"   href="<?php echo base_url(); ?>job-list">Back</a>
                                    <button type="submit"   class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
// ClassicEditor.create(document.querySelector("#jobDetail"));

                                            CKEDITOR.replace('description', {
                                                filebrowserUploadUrl: "<?php echo base_url(); ?>Job/upload"
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
            designation: {
                required: true,

            },
            salary: {
                required: true,

            },
            experience: {
                required: true,

            },
            title: {
                required: true,

            },

            featured_image: {
                required: true,
                extension: "jpg|jpeg|webp"

            },

            shortdescription: {
                required: true,

            },

            description: {
                ckrequired: true
            }

        },
        messages: {
            category_id: {
                required: "Category can not be empty"

            },
            designation: {
                required: "Designation Name can not be empty"

            },
            salary: {
                required: "Salary Offered can not be empty"

            },
            experience: {
                required: "experience can not be empty"

            },

            title: {
                required: "Title is mandatory"

            },

            featured_image: {
                required: "Featured Image is mandatory",
                extension: "Please select only jpg,jpeg, webp files"


            },

            shortdescription: {
                required: "Brief Intro can not be empty"

            }

        }
    });




</script>


<script>

    function preview1Job() {
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




