<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header">Add FAQ's</h5>
                <div class="card-body">
                    <form class="add-faq" method="post">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="mb-3">
                                    <label>Select Category</label>
                                    <select class="form-control" id="cat_name" name="category_id">
                                        <option value="">Select Category</option>

                                        <?php foreach ($faqcategory_list as $value) : ?>

                                            <option value="<?php echo $value['id']; ?>"> <?php echo $value['category']; ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                    <div id="cat_error" class="invalid-feedback"></div>

                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="mb-3">
                                    <div class="form-group ">
                                        <label>Question</label>
                                        <input type="text" class="form-control" id="faq" name="faq" placeholder="Question">
                                        <div id="faq_error" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12">

                                <div class="mb-3">
                                    <label>Answers</label>
                                    <textarea class="form-control" id="answer" name="answer" placeholder="Answers"></textarea>
                                    <div id="answer_error" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12">

                                <div class="text-end">

                                    <a href="<?php echo base_url(); ?>faq-list" class="btn btn-secondary">Back</a>
                                    <button type="submit" id="addfaqcat-btn" class="btn btn-primary">Add</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>