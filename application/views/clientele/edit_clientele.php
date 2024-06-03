<style>
    .hidden {
        display: none;
    }
</style>

<?php foreach ($edit_details as $value) : ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">

            <!-- Browser Default -->

            <div class="col-md mb-4 mb-md-0">

                <div class="card">
                    <h5 class="card-header">Edit Clientele</h5>

                    <div class="card-body">

                        <form class="update-client" method="post" enctype="multipart/form-data" >

                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                            <div class="row">    
                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label class="form-label" for="bs-validation-name">Client Name</label>

                                        <input type="text" class="form-control"  id="name" value="<?php echo $value['name']; ?>"  name="name" >
                                        <div class="invalid-feedback" id="name1_error"> </div>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-upload-file">Client Logo</label>
                                        <input type="file" onchange="previewClient()" class="form-control" name="image" id="file"  accept="image/jpg,image/webp,image/jpeg">
                                        <div class="invalid-feedback" id="clientimg_error"> </div>

                                    </div>
                                    <div class="mb-3">
                                        <?php if ($value['image'] != NULL) { ?>
                                            <img  style="width: 100px" src="<?php echo base_url() ?>uploads/client/<?php echo $value['image']; ?>" id="imgb">
                                        <?php }
                                        ?>

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-end">
                                        <a href="<?php echo base_url(); ?>client-list" class="btn btn-secondary">Back</a>
                                        <button type="submit" id="updatc-btn"  class="btn btn-primary">Update</button>
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




<script>

    function previewClient() {
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
