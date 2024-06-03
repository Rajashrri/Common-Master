<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">

        <!-- Browser Default -->

        <div class="col-md mb-4 mb-md-0">

            <div class="card">
                <h5 class="card-header">Add Clientele</h5>

                <div class="card-body">

                    <form class="add-clientele" method="post" enctype="multipart/form-data" >

                        <div class="row">
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label" for="bs-validation-name">Client Name</label>

                                    <input type="text" class="form-control"   name="name" placeholder="Enter Name">
                                    <div class="invalid-feedback" id="name_error"> </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">

                                    <label class="form-label" for="bs-validation-upload-file">Client Logo</label>
                                    <span style="color:red;font-size:12px">(Extension:webp, jpg, jpeg) Note:Dimension Size 10*15px</span>
                                    <input type="file" onchange="preview()" class="form-control" name="image" id="file"   accept="image/jpg,image/webp, image/jpeg">
                                    <div class="invalid-feedback" id="clientimg_error"> </div>


                                </div>
                                <div class="mb-3">                            
                                    <img id="thumb" style="width: 100px" src="">

                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12">
                                <div class="text-end">
                                    <a href="<?php echo base_url(); ?>client-list" class="btn btn-secondary">Back</a>
                                    <button type="submit" id="addclient-btn"  class="btn btn-primary">Add</button>
                                </div>
                            </div>

                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>    

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
            thumb.src = URL.createObjectURL(event.target.files[0]);
        }
    }

</script>
