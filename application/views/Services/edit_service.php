<!-- Content -->
<?php foreach ($edit_details as $value) : ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">
                <div class="card">
                    <h5 class="card-header">Edit Service</h5>
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

                        <form id="myform3" action="<?php echo base_url(); ?>editser" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-country">Select Service Category</label>
                                        <select class="form-control" id="category_id" name="category_id">
                                            <option value="">Select Service Category</option>

                                            <?php foreach ($servicecategory_list as $value1) : ?>

                                                <option value="<?php echo $value1['id']; ?>" <?php echo $value1['id'] == $value['category_id'] ? 'selected' : ''; ?>> <?php echo $value1['subcategory_name']; ?></option>

                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback" id="category_error"> </div>
                                    </div>


                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-country">Select Service sub Category</label>
                                        <select class="form-control"  id='sel_depart' name="subcategory_id">
                                            <option value="">Select Sub Category</option>
                                            <?php
                                            $subcategory_list = $this->common->list1('servicesubcategoory', 'category_id', $value['category_id']);
                                            foreach ($subcategory_list as $value2) :
                                                ?>
                                                <option value="<?php echo $value2['id']; ?>" <?php echo $value2['id'] == $value['subcategory_id'] ? 'selected' : ''; ?>> <?php echo $value2['subcategory_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Service Title</label>
                                        <input type="text" class="form-control" name="name"
                                               placeholder="Enter Service Title" value="<?php echo $value['name']; ?>"
                                               required>


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Featured Image</label>
                                        <span style="color:red;font-size:11px">(Extension: jpg, jpeg,webp) Note:Dimension
                                            346*203 px</span>

                                        <input type="file" onchange="preview1_ser2()" id="file1" class="form-control"
                                               accept="image/jpg, image/jpeg,image/webp" name="featured_image">
                                    </div>
                                    <div class="mb-3">
                                        <?php if ($value['featured_image'] != NULL) { ?>
                                            <img style="width: 100px"
                                                 src="<?php echo base_url() ?>uploads/service/<?php echo $value['featured_image']; ?>"
                                                 id="imgbb">
                                             <?php }
                                             ?>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Main Image</label>
                                        <span style="color:red;font-size:11px">(Extension: jpg, jpeg,webp) Note:Dimension
                                            Size 730*435 px</span>

                                        <input type="file" onchange="preview_ser()" id="file" class="form-control"
                                               accept="image/jpg, image/jpeg,image/webp" name="main_img">
                                    </div>

                                    <div class="mb-3">
                                        <?php if ($value['main_img'] != NULL) { ?>
                                            <img style="width: 100px"
                                                 src="<?php echo base_url() ?>uploads/service/<?php echo $value['main_img']; ?>"
                                                 id="imgb">
                                             <?php }
                                             ?>

                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Brief Intro</label>
                                        <textarea class="form-control" name="briefintro"
                                                  placeholder="BRIEF INTRO"><?php echo $value['briefintro']; ?></textarea>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Details</label>
                                        <textarea class="form-control" id="details" name="details"
                                                  placeholder="Description"><?php echo $value['details']; ?></textarea>

                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-end">
                                    <a href="<?php echo base_url(); ?>service-list" class="btn btn-secondary">Back</a>
                                    <button type="submit" id="updatser-btn" class="btn btn-primary">Update</button>

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
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>

<script>
                                            jQuery.validator.addMethod('ckrequired', function (value, element, params) {
                                                var idname = jQuery(element).attr('id');
                                                var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
                                                return !params || messageLength.length !== 0;
                                            }, "Details field is required");



                                            $("#myform3").validate({
                                                ignore: [],

                                                rules: {

                                                    category_id: {
                                                        required: true,

                                                    },

                                                    name: {
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
                                                        required: "Category is mandatory"

                                                    },

                                                    name: {
                                                        required: "Service Title can not be empty"


                                                    },

                                                    briefintro: {
                                                        required: "Brief Intro can not be empty"

                                                    },

                                                }
                                            });
</script>
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script>
// ClassicEditor.create(document.querySelector("#blogDetail"));

                                            CKEDITOR.replace('details', {
                                                filebrowserUploadUrl: "<?php echo base_url(); ?>Service/upload"
                                            });
                                            CKEDITOR.instances["details"].on('key', function () {
                                                checkEditorText('details');
                                            });
</script>
<script>
    function preview_ser() {
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
    function preview1_ser2() {
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
<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="category_id"]').on('change', function () {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    url: '<?php echo base_url(); ?>myformAjax1/' + stateID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="subcategory_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="subcategory_id"]').append(
                                    '<option value="">Select Sub Category</option>');
                            $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="subcategory_id"]').empty();
            }
        });
    });
</script>