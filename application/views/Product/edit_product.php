<!-- Content -->
<?php foreach ($edit_details as $value) : ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">
                <div class="card">
                    <h5 class="card-header"> Edit Product</h5>
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

                        <form id="myform2" action="<?php echo base_url(); ?>edit-pro" method="post" enctype="multipart/form-data" >
                            <div class="row">
                                   <div class="col-md-6">
                             <div class="mb-3">
                                <label class="form-label" for="bs-validation-country">Select Product Category</label>
                                <select class="form-control"   id="sel_city"  name="category_id">
                                   <option value="">Select Product Category</option>
                                   <?php foreach ($category_list as $value1) : ?>
                                   <option value="<?php echo $value1['id']; ?>" <?php echo $value1['id'] == $value['category_id'] ? 'selected' : ''; ?>> <?php echo $value1['subcategory']; ?></option>
                                   <?php endforeach; ?>
                             </div>
                             </select>
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="mb-3">
                             <label class="form-label" for="bs-validation-country">Select Product sub Category</label>
                             <select class="form-control"  id='sel_depart' name="subcategory_id">
                                <option value="">Select Sub Category</option>
                                <?php
                                   $subcategory_list = $this->common->list1('tbl_subcategory', 'category_id', $value['category_id']);
                                   
                                   foreach ($subcategory_list as $value2) :
                                       ?>
                                <option value="<?php echo $value2['id']; ?>" <?php echo $value2['id'] == $value['subcategory_id'] ? 'selected' : ''; ?>> <?php echo $value2['subcategory']; ?></option>
                                <?php endforeach; ?>
                             </select>
                          </div>
                       </div>
                            
                   
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-name">Name</label>
                                <input type="text" class="form-control" value="<?php echo $value['name']; ?>" name="name" placeholder="Enter Product Name">
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-file">Main Image</label>
                                <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg, webp) Note:Dimension Size 1000*500px</span>
                                <input type="file" onchange="preview1()" id="file1"  class="form-control" name="image" >                         
                                <div class="invalid-feedback" id="msg_error"> </div>
                            </div>
                            <div class="mb-3">
                                <?php if ($value['image'] != NULL) { ?>
                                    <img style="width: 100px" src="<?php echo base_url() ?>uploads/product/<?php echo $value['image']; ?>" id="imgbb">
                                <?php }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-upload-file">Featured Image</label>
                                <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg, webp) Note:Dimension Size 510*632px</span>
                                <input type="file" onchange="preview()" id="file"  class="form-control" name="featured_image">
                            </div>
                            <div class="mb-3">
                                <?php if ($value['featured_image'] != NULL) { ?>
                                    <img style="width: 100px" src="<?php echo base_url() ?>uploads/product/<?php echo $value['featured_image']; ?>" id="imgb">
                                <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-bio">Brief Intro</label>
                                <textarea class="form-control" name="briefinfo" placeholder="Details"><?php echo $value['briefinfo']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label" for="bs-validation-bio">Description</label>
                                <textarea class="form-control " id="description1" name="description1" placeholder="Details" ><?php echo $value['description']; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                            <div class="card-footer p-0 text-end">
                                <a href="<?php echo base_url(); ?>product-list" class="btn btn-secondary">Back</a>
                                <button type="submit" id="updatpro-btn" class="btn btn-primary mr-1" type="submit">Update</button>

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

                                             name: {
                                                 required: true,

                                             },

                                             briefinfo: {
                                                 required: true,

                                             },
                                             description1: {
                                                 ckrequired: true
                                             },
                                             category_id: {
                                                 required: true,
                                             },
                                         },
                                         messages: {
                                             name: {
                                                 required: "Name can not be empty"

                                             },

                                             briefinfo: {
                                                 required: "Brief Intro Can Not be Empty."

                                             },
                                             category_id: {
                                                 required: "Category Can Not be Empty."

                                             },
                                         }
                                     });

</script>
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script>
                                     CKEDITOR.replace('description1', {
                                         height: 200,

                                         filebrowserUploadUrl: "<?php echo site_url('upload_ckeditor'); ?>"
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
            $('.button').removeClass("hidden");
            imgb.src = URL.createObjectURL(event.target.files[0]);
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
            $('.button').removeClass("hidden");
            imgbb.src = URL.createObjectURL(event.target.files[0]);
        }
    }

</script>
<script>
    function pdf(input) {
        debugger;
        var validExtensions = ['pdf', 'PDF'];
        //   var validExtensions = ['jpg','png','jpeg','JPG','JPEG','PNG']; //array of valid extensions
        var fileName = input.files[0].name;
        var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        if ($.inArray(fileNameExt, validExtensions) == -1) {
            input.type = ''
            input.type = 'file'
            $('#pdf').attr('src', "");
            alert("Only these file types are accepted : " + validExtensions.join(', '));
        } else
        {
            if (input.files && input.files[0]) {
                var filerdr = new FileReader();
                filerdr.onload = function (e) {
                    $('#pdf').attr('src', e.target.result);
                }
                filerdr.readAsDataURL(input.files[0]);
            }
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="category_id"]').on('change', function () {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    url: '<?php echo base_url(); ?>myformAjax/' + stateID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="subcategory_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="subcategory_id"]').append('<option value="">Select Sub Category</option>');
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory + '</option>');
                        });
                    }
                });
            } else {
                $('select[name="subcategory_id"]').empty();
            }
        });
    });
</script>