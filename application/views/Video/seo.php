<!-- Content -->
<?php foreach ($edit_details as $value) : ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row mb-4">
            <!-- Browser Default -->
            <div class="col-md mb-4 mb-md-0">

                <div class="card">
                    <h5 class="card-header">  Edit SEO
                    </h5>
                    <div class="card-body">

                        <form class="editvideoseo" method="post" enctype="multipart/form-data" >
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Meta Title</label>

                                        <input type="text" class="form-control" name="meta_title" value="<?php echo $value['meta_title']; ?>" placeholder="Enter Meta Title">

                                        <div class="invalid-feedback" id="meta_title_error">

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label class="form-label" for="bs-validation-name">Meta Keywords</label>

                                        <textarea class="form-control" name="meta_keywords" placeholder="Meta Keywords" ><?php echo $value['meta_keywords']; ?></textarea>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label class="form-label" for="bs-validation-name">Meta Desctription</label>

                                        <textarea class="form-control" name="meta_description" placeholder="Meta Desctription" ><?php echo $value['meta_description']; ?></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label class="form-label" for="bs-validation-name">Alt Tag Main Image</label>

                                        <textarea class="form-control" name="alt_tag_main_img" placeholder="Alt Tag Main Image" ><?php echo $value['alt_tag_main_img']; ?></textarea>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label class="form-label" for="bs-validation-name">Alt Tag Featured Image</label>

                                        <textarea class="form-control" name="alt_tag_featured_img" placeholder="Alt Tag Featured Image" ><?php echo $value['alt_tag_featured_img']; ?></textarea>
                                    </div>

                                </div>

                            </div>
                            <div class="row">

                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label class="form-label" for="bs-validation-name">Schema Code</label>

                                        <textarea class="form-control" name="schemap" placeholder="Schema Code" ><?php echo $value['schemap']; ?></textarea>

                                    </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">

                                        <label class="form-label" for="bs-validation-name">URL</label>

                                        <textarea class="form-control" name="url" placeholder="URL" ><?php echo $value['url']; ?></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-end">
                                    <a class="btn btn-secondary"   href="<?php echo base_url(); ?>video-list">Back</a>
                                    <button type="submit" id="updatseo-btn"  class="btn btn-primary">Update</button>
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