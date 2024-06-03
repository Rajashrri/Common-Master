<?php foreach ($edit_details as $value) : ?>
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">
                <div class="card">
                    <h5 class="card-header">  Edit Event
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
                        <?php } elseif($this->session->flashdata('warning')) { ?>
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <?php echo $this->session->flashdata('warning'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                                <div class="form_error">
                                    <?php echo validation_errors(); ?>
                                </div>
                            </div>
                        <?php } ?>  
                        <form id="myform2"  action="<?php echo base_url(); ?>editeventupdate" method="post"  enctype="multipart/form-data" >
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Select Event Category</label>
                                        <select class="form-control"  name="category_id" >
                                            <option value="">Select Event Category</option>
                                            <?php foreach ($eventcategory_list as $value3) : ?>
                                                <option value="<?php echo $value3['id']; ?>" <?php echo $value3['id'] == $value['category_id'] ? 'selected' : ''; ?>> <?php echo $value3['category_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">EVENT TITLE</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo $value['name']; ?>" placeholder="EVENT TITLE">
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name" > FROM DATE</label>
                                        <input type="date" class="form-control" id="Sdate" placeholder="YYYY-MM-DD" value="<?php echo $value['from_date']; ?>" name="from_date"  > 

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name" >END DATE</label>
                                        <input type="date" class="form-control" id="Edate" placeholder="YYYY-MM-DD" name="end_date" value="<?php echo $value['end_date']; ?>"  > 

                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">ENTRY FEE</label>
                                        <input type="number" min="0" class="form-control" name="entry_fee" value="<?php echo $value['entry_fee']; ?>" placeholder="ENTRY FEE">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">TIMING</label>
                                        <input type="text" class="form-control" name="timing" value="<?php echo $value['timing']; ?>" placeholder="TIMING">
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Featured Image</label>
                                        <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension 850*650 px</span>

                                        <input type="file" onchange="previewEditEvent()" id="file1" class="form-control" accept="image/jpg, image/jpeg,image/webp" name="featured_image" >
                                    </div>
                                    <div class="mb-3">
                                        <?php if ($value['featured_image'] != NULL) { ?>
                                            <img style="width: 100px" src="<?php echo base_url() ?>uploads/events/<?php echo $value['featured_image']; ?>" id="imgbb">
                                        <?php }
                                        ?>

                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Main Image</label>
                                        <span style="color:red;font-size:12px">(Extension: jpg, jpeg,webp) Note:Dimension Size 1920*720 px</span>

                                        <input type="file"  onchange="previewEditEvent2()" id="file" class="form-control" accept="image/jpg, image/jpeg,image/webp" name="main_img">
                                    </div>

                                    <div class="mb-3">
                                        <?php if ($value['main_img'] != NULL) { ?>
                                            <img style="width: 100px" src="<?php echo base_url() ?>uploads/events/<?php echo $value['main_img']; ?>" id="imgb">
                                        <?php }
                                        ?>

                                    </div>  

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">UPLOAD PDF</label>
                                        <span style="color:red;font-size:12px"></span>
                                        <input type="file" id="file3" onchange="preview3()" class="form-control" name="pdf">
                                        <?php if ($value['pdf'] != NULL) { ?>
                                            <a href="../uploads/events/pdf/<?php echo $value['pdf']; ?>" target="_blank">Download</a>
                                        <?php }
                                        ?>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">TICKET LINK</label>
                                        <input type="text" class="form-control" name="link" value="<?php echo $value['link']; ?>" placeholder="TICKET LINK">
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
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Details</label>
                                        <textarea class="form-control"  id="editor11" name="details" placeholder="Description" required ><?php echo $value['details']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-end">
                                        
                                        <a class="btn btn-secondary"   href="<?php echo base_url(); ?>event-list">Back</a>
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
    </div>
<?php endforeach; ?>


<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>


<script>
// ClassicEditor.create(document.querySelector("#blogDetail"));

                                            CKEDITOR.replace('editor11', {
                                                filebrowserUploadUrl: "<?php echo base_url(); ?>Event/upload"
                                            });
                                            CKEDITOR.instances["editor11"].on('key', function () {
                                                checkEditorText('editor11');
                                            });

</script>
<script>
    jQuery.validator.addMethod('ckrequired', function (value, element, params) {
        var idname = jQuery(element).attr('id');
        var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
        return !params || messageLength.length !== 0;
    }, "Details field is required");

 jQuery.validator.addMethod("greaterThan", 
             function(value, element, params) {
         if (!/Invalid|NaN/.test(new Date(value))) {
            return new Date(value) >= new Date($(params).val());
          }
           return isNaN(value) && isNaN($(params).val()) 
           || (Number(value) >= Number($(params).val())); 
         },'Must be greater than {0}.');

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
                    required:"Please enter shipping delivery date",
                    greaterThan:"End date Should be greater than start date ",
             },
            entry_fee: {
                required: "Entry fee is mandatory"

            },

            briefintro: {
                required: "Brief Intro can not be empty"

            }


        }
    });




</script>

<script>

    function previewEditEvent2() {
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



<script>

    function previewEditEvent() {
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
