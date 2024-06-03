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
                    <h5 class="card-header">Edit Pdf</h5>
                    <div class="card-body">
                        <form class="update-pdf" method="post" enctype="multipart/form-data" >
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                            <div class="row">    
                                <div class="col-md-12">
                                    <label class="form-label" for="bs-validation-upload-file">PDF Name</label>
                                    <input type="text" id="name"value="<?php echo $value['name'] ?>" class="form-control" name="name">
                                    <div class="invalid-feedback" id="name1_error"> </div>

                                </div> 
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-upload-file">UPLOAD PDF</label>
                                        <input type="file" id="file1" onchange="preview1Editpdf()" class="form-control" name="pdf">
                                        <a  href="../uploads/pdf/<?php echo $value['pdf']; ?>" target="_blank" >Download</a>
                                        <div class="invalid-feedback" id="pdf1_error"> </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">    
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-12 text-end">
                                            <a href="<?php echo base_url(); ?>pdf-list" class="btn btn-secondary">Back</a>
                                            <button type="submit" id="updatpdf-btn"  class="btn btn-primary">Update</button>

                                        </div>
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

    function preview1Editpdf() {
        var fileInput = document.getElementById('file1');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.pdf)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Please upload file having extensions .pdf/ only.');
            fileInput.value = '';
            return false;
        }
    }

</script>
