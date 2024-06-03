<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">
        <!-- Browser Default -->
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header"> <?php echo $page_name; ?></h5>
                <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <?php echo $this->session->flashdata('error'); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                        <div class="form_error">
                            <?php echo validation_errors(); ?>
                        </div>
                    </div>
                <?php } ?> 
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

                    <form id="myform2" action="Product/insert_product" method="post" enctype="multipart/form-data" >

                        <div class="row">
                           <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">Select Product Category</label>
                                    <select class="form-select" id='sel_city'  name="category_id">
                                        <option value="">Select Product Category</option>
                                        <?php foreach ($category_list as $value) : ?>
                                        <option value="<?php echo $value['id']; ?>">  <?php echo $value['subcategory']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback" id="category_error"> </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">Select Product SubCategory</label>
                                    <select class="form-control" id='sel_depart' name="subcategory_id">
                                        <option value="">Select Sub Category</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Product Name">
                                    <div class="invalid-feedback" id="name_error"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-upload-file">Main Image</label>
                                    <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg, webp) Note:Dimension Size 1000*500px</span>
                                    <input type="file" id="file1" onchange="preview1()" accept="image/jpg, image/jpeg,image/webp" class="form-control" name="image">
                                </div>
                                <div class="mb-3">                            
                                    <img id="thumb1" style="width: 100px" src="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-upload-file">Featured Image</label>
                                    <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg, webp) Note:Dimension Size 510*632px</span>
                                    <input type="file" class="form-control" id="file" onchange="preview()" accept="image/jpg, image/jpeg,image/webp" name="featured_image"  >
                                </div>
                                <div class="mb-3">                            
                                    <img id="thumb" style="width: 100px" src="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-bio">Brief Intro</label>
                                    <textarea class="form-control" name="briefinfo"  placeholder="Details"></textarea>
                                    <div class="invalid-feedback" id="description11_error"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-bio">Description</label>
                                    <textarea class="form-control" id="description" name="description" row="4" placeholder="Details"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="text-end">
                                    <a href="<?php echo base_url(); ?>product-list" class="btn btn-secondary">Back</a>
                                    <button type="submit" id="addproduct-btn"  class="btn btn-primary">Add</button>

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

                                                name: {
                                                    required: true,

                                                },

                                                image: {
                                                    required: true,

                                                },
                                                featured_image: {
                                                    required: true,

                                                },
                                                briefinfo: {
                                                    required: true,

                                                },
                                                description: {
                                                    ckrequired: true,
                                                }
                                            },
                                            messages: {
                                                name: {
                                                    required: "Name can not be empty"

                                                },

                                                image: {
                                                    required: "Main Image is mandatory."

                                                },
                                                featured_image: {
                                                    required: "Featured image is mandatory."

                                                },
                                                briefinfo: {
                                                    required: "Brief Intro Can Not be Empty."

                                                },

                                            }
                                        });

</script>

<script>
    function GetTextFromHtml(html) {

        var dv = document.createElement("DIV");
        dv.innerHTML = html;
        return dv.textContent || dv.innerText || "";
    }
</script>

<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        height: 200,

        filebrowserUploadUrl: "<?php echo base_url(); ?>Product/upload"
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
