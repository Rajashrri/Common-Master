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
                    <form id="myform2" action="Event/insert_event"   method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-country">Select Event Category</label>
                                    <select class="form-control"  name="category_id">
                                        <option value="">Select Event Category</option>

                                        <?php foreach ($eventcategory_list as $value) : ?>

                                            <option value="<?php echo $value['id']; ?>">  <?php echo $value['category_name']; ?></option>

                                        <?php endforeach; ?>
                                    </select>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">EVENT TITLE</label>
                                    <input type="text" class="form-control" name="name" placeholder="EVENT TITLE">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name" > FROM DATE</label>
                                    <input type="date" class="form-control" id='Sdate'  min='' placeholder="DD-MM-YYYY" name="from_date" > 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name" >END DATE</label>
                                    <input type="date" class="form-control"  id='Edate' placeholder="DD-MM-YYYY" name="end_date" > 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">ENTRY FEE</label>
                                    <input type="number" min="0" class="form-control" name="entry_fee" placeholder="ENTRY FEE">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">TIMING</label>
                                    <input type="text" class="form-control" name="timing" placeholder="TIMING">
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Featured Image</label>
                                    <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension 850*650 px</span>
                                    <input type="file" id="file1" onchange="preview1()" class="form-control" accept="image/jpg, image/jpeg,image/webp" name="featured_image">

                                </div>
                                <div class="mb-3">                            
                                    <img id="thumb1" style="width: 100px" src="">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Main Image</label>
                                    <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension Size 1920*720 px</span>
                                    <input type="file" id="file" onchange="previewEvent()" class="form-control" accept="image/jpg, image/jpeg,image/webp" name="main_img">



                                </div>
                                <div class="mb-3">                            
                                    <img id="thumb" style="width: 100px" src="">

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">UPLOAD PDF</label>
                                    <span style="color:red;font-size:12px"></span>
                                    <input type="file" id="file3" onchange="preview3()" class="form-control" name="pdf">

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">TICKET LINK</label>
                                    <input type="text" class="form-control" name="link" placeholder="TICKET LINK">
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

                                    <a class="btn btn-secondary"   href="<?php echo base_url(); ?>event-list">Back</a>
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
                                            filebrowserUploadUrl: "<?php echo base_url(); ?>Event/upload"
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

    jQuery.validator.addMethod("greaterThan",
            function (value, element, params) {
                if (!/Invalid|NaN/.test(new Date(value))) {
                    return new Date(value) >= new Date($(params).val());
                }
                return isNaN(value) && isNaN($(params).val())
                        || (Number(value) >= Number($(params).val()));
            }, 'Must be greater than {0}.');

    $("#myform2").validate({
        ignore: [],

        rules: {

            category_id: {
                required: true,

            },
            name: {
                required: true,

            },
            from_date: {
                required: true,

            },
            end_date: {
                required: true,
                greaterThan: "#Sdate",
            },

            entry_fee: {
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
                ckrequired: true,
            }

        },
        messages: {
            category_id: {
                required: "Category can not be empty"

            },
            name: {
                required: "Event Title can not be empty"

            },
            from_date: {
                required: "From date can not be empty"

            },
            end_date: {
                required: "Please enter shipping delivery date",
                greaterThan: "End date Should be greater than start date ",

            },

            entry_fee: {
                required: "Entry fee is mandatory"

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

    function previewEvent() {
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

    function preview3() {
        var fileInput = document.getElementById('file3');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.pdf)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .pdf/ only.');
            fileInput.value = '';
            return false;
        }
    }

</script>
