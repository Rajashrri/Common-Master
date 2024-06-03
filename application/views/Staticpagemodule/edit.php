

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="row mb-4">
        <!-- Browser Default -->
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header"> Edit Seo For Static Pages
                </h5>
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
                    <?php } ?> 
                    <form id="update-statseo"  method="post" enctype="multipart/form-data">
                        <?php foreach($edit_details as $val) :?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                <label class="form-label" for="bs-validation-name">Pagename</label>
                                
                                  <select id="pagename" name="pagename" class="form-control">
                                       <option value="">Select Page name</option>
                                       <?php foreach ($pagename as $value) : ?>
                                          <option value="<?php echo $value['id']; ?>" <?php echo $value['id'] == $val['pagename'] ? 'selected' : ''; ?>> <?php echo $value['pagename']; ?></option>
                                        <?php endforeach; ?>
                                  </select>
                               </div>
                               <div class="invalid-feedback" id="pagename1_error"> </div>
                                
                               
                            </div> 
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Meta Title</label>
                                    <input type="text" class="form-control" id="metatitle" name="metatitle" value="<?php echo $val['metatitle']; ?>" placeholder="Enter Meta Title">
                                    <div class="invalid-feedback" id="metatitle1_error"> </div>
                                </div>
                               
                            </div>
                            
                            <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Alt Featured Image</label>
                                        <input type="text" class="form-control" id="canonical" value="<?php echo $val['altfeatured']; ?>" name="ogtags" placeholder="Enter Alt Featured Image">
                                        <div class="invalid-feedback" id="canonical1_error"> </div>
                                    </div>
                                   
                                </div>
                            
                            
                        </div>
                        
                        <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Meta Desc</label>
                                        <!--<input type="text" class="form-control" >-->
                                        
                                        <textarea class="form-control" id="metadesc" name="metadesc" placeholder="Enter Meta Desc" ><?php echo $val['metadesc'] ?></textarea>
                                        <div class="invalid-feedback" id="metadesc1_error"> </div>
                                    </div>
                                  
                                </div>
                           
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="bs-validation-name">Schema Code</label>
                                        <textarea class="form-control" id="schemacode"  name="schemacode" placeholder="Enter Schema Code" ><?php echo $val['schemacode'] ?></textarea>
                                        <div class="invalid-feedback" id="schemacode1_error"> </div>
                                    </div>
                                    
                                </div>
                        </div>
                                    <input type="hidden" name="id" value="<?php echo $val['id']; ?>">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-end">
                                        
                                        <a class="btn btn-secondary"   href="<?php echo base_url(); ?>static-list">Back</a>
                                        <button type="submit" id="add-statseo" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>








<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.js"></script>









