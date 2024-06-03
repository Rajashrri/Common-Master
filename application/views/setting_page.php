<style>

    .my-color-box {
        width: 30%;
        padding: 0;
        border-radius: 0;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row mb-4">
        <div class="col-md mb-4 mb-md-0">
            <div class="card">
                <h5 class="card-header">Admin Panel Setting Page</h5>

                <div class="card-body">
                    <form class="edit-setting" method="post">
                        <?php foreach ($user_details as $value) : ?>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="bs-validation-name">Admin Panel Logo</label>
                                    <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg) Note:Dimension Size 150*65px</span>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $value['id']; ?>">
                                    <div class="mb-3">
                                        <div class="form-group ">


                                            <input type="file" onchange="preview()" class="form-control" id="file" name="logo">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <?php if ($value['logo_url'] != NULL) { ?>
                                            <img  style="width: 200px;" src="<?php echo base_url(); ?>uploads/img/<?php echo $value['logo']; ?>" id="thumb">
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="bs-validation-name">Admin Panel Fav icon</label>
                                    <span style="color:red;font-size:12px">(Extension: JPG, JPEG, jpg, jpeg) Note:Dimension Size 150*65px</span>
                                    <div class="mb-3">

                                        <input type="file" onchange="preview1()" class="form-control" id="file1" name="favicon">
                                    </div>
                                    <div class="mb-3">
                                        <?php if ($value['fav_url'] != NULL) { ?>
                                            <img  src="<?php echo base_url(); ?>uploads/img/<?php echo $value['favicon']; ?>" id="thumb1" style="width: 100px;">
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                              
                                <h6>Color Settings</h6>
                                <div class="row color-box-div">
                                    <div class="col-md-4">
                                        <label class="form-label" for="bs-validation-name">Background Primary Color</label>
                                        <div class="mb-3">

                                            <input type="color" class="form-control color-style my-color-box" placeholder="Background Primary Color"
                                                   value="<?php echo $value['bpcolor']; ?>" name="bpcolor">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="bs-validation-name">Background Secondary Color</label>
                                        <div class="mb-3">

                                            <input type="color" class="form-control color-style my-color-box" placeholder="Background Secondary Color"
                                                   value="<?php echo $value['bscolor']; ?>" name="bscolor">
                                        </div>
                                    </div>


                                </div>

                                <hr>

                                <h6>SMTP Email Settings</h6>
                                <div class="row color-box-div">
                                    <div class="col-md-6">
                                        <label class="form-label" for="bs-validation-name">Host Name</label>
                                        <div class="mb-3">

                                            <input type="text" class="form-control" placeholder="SMTP Host Name"
                                                   value="<?php echo $value['smtp_host']; ?>" name="smtp_host">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="bs-validation-name">Port</label>
                                        <div class="mb-3">

                                            <input type="text" class="form-control" placeholder="SMTP Port"
                                                   value="<?php echo $value['smtp_port']; ?>" name="smtp_port">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="bs-validation-name">User Name</label>
                                        <div class="mb-3">

                                            <input type="text" class="form-control" placeholder="User Name"
                                                   value="<?php echo $value['smtp_user']; ?>" name="smtp_user">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label" for="bs-validation-name">Password</label>
                                        <div class="mb-3">

                                            <input type="text" class="form-control" placeholder="SMTP Password"
                                                   value="<?php echo $value['smtp_pass']; ?>" name="smtp_pass">
                                        </div>
                                    </div>

                                </div>
                                <div class="row p-0">
                                    <div class="col-12 text-end">
                                        <button type="submit" id="edit-setting-btn" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
    <script>
        function preview() {
            var fileInput = document.getElementById('file');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.webp|\.png)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                imgb.src = URL.createObjectURL(event.target.files[0]);
            }
        }

    </script>
    <script>
        function preview1() {
            var fileInput = document.getElementById('file1');
            var filePath = fileInput.value;
            var allowedExtensions = /(\.jpg|\.jpeg|\.webp|\.png)$/i;
            if (!allowedExtensions.exec(filePath)) {
                alert('Please upload file having extensions .jpeg/.jpg/.webp/ only.');
                fileInput.value = '';
                return false;
            } else {
                //Image preview
                imgbb.src = URL.createObjectURL(event.target.files[0]);
            }
        }
    </script>