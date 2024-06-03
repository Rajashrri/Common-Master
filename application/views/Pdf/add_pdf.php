<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">
        <!-- Browser Default -->
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header">Add Pdf</h5>
                <div class="card-body">
                    <form class="add-pdf" method="post" enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-upload-file">PDF Name</label>
                                    <input type="text" id="name"  class="form-control" name="name">
                                    <div class="invalid-feedback" id="name_error"> </div>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="bs-validation-upload-file">UPLOAD PDF</label>
                                <input type="file" id="file1" onchange="preview1Pdf()" class="form-control" name="pdf">
                            </div>
                            <div class="invalid-feedback" id="pdf_error"> </div>
                        </div>

                        <div class="row">

                            <div class="col-12">
                                <div class="text-end">
                                    <a href="<?php echo base_url(); ?>pdf-list" class="btn btn-secondary">Back</a>
                                    <button type="submit" id="addpdf-btn"  class="btn btn-primary">Add</button>
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

    function preview1Pdf() {
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
