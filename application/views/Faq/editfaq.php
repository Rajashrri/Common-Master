<?php foreach ($edit_details as $value) : ?>
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row mb-4">
            <div class="col-md mb-4 mb-md-0">

                <div class="card">
                    <h5 class="card-header">Edit FAQ's</h5>

                    <form class="update-faq" method="post">
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">


                        <div class="card-body ">

                            <div class="row">

                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label>Select Category</label>
                                        <select class="form-control" id="category_id" name="category_id">
                                            <option value="">Select Category</option>

                                            <?php foreach ($faqcategory_list as $value1) : ?>

                                                <option value="<?php echo $value1['id']; ?>" <?php echo $value1['id'] == $value['category_id'] ? 'selected' : ''; ?>> <?php echo $value1['category']; ?></option>

                                            <?php endforeach; ?>
                                        </select>                                 
                                        <div id="cat1_error" class="invalid-feedback"></div>


                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="mb-3">
                                        <label>Questions</label>
                                        <input type="text" class="form-control"  name="faq" id="faq" value="<?php echo $value['faq']; ?>"  placeholder="Questions">
                                        <div id="faq1_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-12">

                                    <div class="mb-3">
                                        <label>Answer</label>
                                        <textarea class="form-control"  id="answer" name="answer" placeholder="Answer"> <?php echo $value['answer']; ?></textarea>
                                        <div id="answer1_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-end">

                                    <a href="<?php echo base_url(); ?>faq-list" class="btn btn-secondary">Back</a>
                                    <button type="submit" id="updatfaq-btn" class="btn btn-primary ">Update</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>