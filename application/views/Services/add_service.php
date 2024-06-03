<div class="container-xxl flex-grow-1 container-p-y">
<div class="row mb-4">
        <!-- Browser Default -->
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header"><?php echo $page_name; ?></h5>
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

                    <form id="myform2" action="<?php echo base_url(); ?>insert-service" method="post"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">Select Service
                                        Category</label>
                                    <select class="form-control" id="ser_cat" name="category_id">
                                        <option value="">Select Service Category</option>

                                        <?php foreach ($servicecategory_list as $value) : ?>
                                            <option value="<?php echo $value['id']; ?>">  <?php echo $value['subcategory_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                </div>


                            </div>
                             <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">Select Service SubCategory</label>
                                    <select class="form-control" id='sel_subser' name="subcategory_id">
                                        <option value="">Select Sub Category</option>
                                    </select>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Service Title</label>
                                    <input type="text" class="form-control" id="aa" name="name"
                                        placeholder="Enter Service Title">
                                    <div class="invalid-feedback" id="validemail"> </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Featured Image</label>
                                    <span style="color:red;font-size:11px">(Extension: jpg, jpeg,webp) Note:Dimension
                                        346*203 px</span>
                                    <input type="file" id="file1" onchange="preview1()" class="form-control"
                                        accept="image/jpg, image/jpeg,image/webp" name="featured_image">

                                </div>
                                <div class="mb-3">
                                    <img id="thumb1" style="width: 100px" src="">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Main Image</label>
                                    <span style="color:red;font-size:11px">(Extension: jpg, jpeg,webp) Note:Dimension
                                        Size 730*435 px</span>
                                    <input type="file" id="file" onchange="preview()" class="form-control"
                                        accept="image/jpg, image/jpeg,image/webp" name="main_img">
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
                                    <textarea class="form-control" name="briefintro"
                                        placeholder="BRIEF INTRO"></textarea>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="">
                                    <label class="form-label" for="bs-validation-name editor">Details</label>

                                    <textarea class="form-control editor-error-placement" id="details" name="details"
                                        placeholder="Description"></textarea>
                                    <label for="editor" name="details" generated="true" class="error"></label>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-end">
                                    <a href="<?php echo base_url(); ?>service-list" class="btn btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-primary">Add</button>

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
// ClassicEditor.create(document.querySelector("#blogDetail"));

CKEDITOR.replace('details', {
    filebrowserUploadUrl: "<?php echo base_url(); ?>Service/upload"
});
CKEDITOR.instances["details"].on('key', function() {
    checkEditorText('details');
});
</script>

<script>
jQuery.validator.addMethod('ckrequired', function(value, element, params) {
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

        name: {
            required: true,

        },

        main_img: {
            required: true,
            extension: "jpg|jpeg|webp"

        },

        featured_image: {
            required: true,

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

        name: {
            required: "Title is mandatory"

        },

        featured_image: {
            required: "Featured Image is mandatory"

        },

        main_img: {
            required: "Main Image is mandatory.",
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
    var fileInput = document.getElementById('file1');
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


<script>
function previewicon() {
    var fileInput = document.getElementById('fileicon');
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.webp|\.png|\.svg)$/i;

    if (!allowedExtensions.exec(filePath)) {
        alert('Please upload file having extensions .jpeg/.jpg/.webp/.png/.svg/ only.');
        fileInput.value = '';
        return false;
    } else {
        //Image preview
        thumbicon.src = URL.createObjectURL(event.target.files[0]);
    }
}
</script>