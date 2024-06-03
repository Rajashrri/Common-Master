

<?php foreach ($edit_details as $value) : ?>


    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            Update Contact
        </h4>
        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">
                <div class="card">
                    <div class="card-body">
                        <form class="update-contact" method="post" enctype="multipart/form-data" >

                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $value['id']; ?>">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Contact Number 1</label>
                                        <input type="tel" name="mob1" value="<?php echo $value['mob1']; ?>" class="form-control">
                                        <div class="invalid-feedback" id="mobile1_error">

                                        </div>                         
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Contact Number 2</label>
                                        <input type="tel" name="mob2" value="<?php echo $value['mob2']; ?>" class="form-control">

                                        <div class="invalid-feedback" id="mobile2_error">

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Email 1</label>
                                        <input type="email" name="email1" value="<?php echo $value['email1']; ?>" class="form-control">
                                        <div class="invalid-feedback" id="email1_error">

                                        </div>                         
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Email 2</label>
                                        <input type="email" name="email2" value="<?php echo $value['email2']; ?>" class="form-control">

                                        <div class="invalid-feedback" id="email2_error">

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Address </label>
                                        <textarea class="form-control" name="address" placeholder="address"><?php echo $value['address']; ?></textarea>                                <div class="invalid-feedback" id="email1_error">

                                        </div>                         
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Google Map Link</label>
                                        <input type="text" name="link" value="<?php echo $value['link']; ?>" class="form-control">

                                        <div class="invalid-feedback" id="map_error">

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" id="updatcon-btn"  class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>
<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1', {
        height: 200,

        filebrowserUploadUrl: "<?php echo site_url('upload_ckeditor'); ?>"
    });

</script>





