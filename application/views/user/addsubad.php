<style>
    .invalid-tooltip{
        position: inherit;
        background-color: white;
        color: red;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">


    <div class="row mb-4">

        <!-- Browser Default -->

        <div class="col-md mb-4 mb-md-0">

            <div class="card">



                <div class="card-body">

                    <h4 class="fw-bold  mb-4">

                        <?php echo $page_name; ?>
                    </h4>


                    <form id="subadmin-form"  method="POST">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label class="form-label" for="bs-validation-name">Name</label>

                                    <input type="text" class="form-control" id="name"  name="name" placeholder="Enter Name" >
                                    <div class="invalid-feedback" id="name_error"> </div>


                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label class="form-label" for="bs-validation-country">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="">Select Role</option>
                                        <?php foreach ($adrole as $val): ?>
                                            <option value="<?php echo $val['role'] ?>"><?php echo $val['role'] ?></option>
                                        <?php endforeach; ?>                               
                                    </select>
                                    <div class="invalid-feedback" id="role_error"> </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">

                                    <label class="form-label" for="bs-validation-upload-file">Email id</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Id" >

                                    <div class="invalid-feedback" id="email_error"> </div>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3 " >
                                    <label class="form-label" for="bs-validation-bio">Password</label>
                                    <input type="text" id="password" class="form-control" style="border-right:0; border-radius:0;" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-end">

                                <a href="<?php echo base_url(); ?>subadminlist" class="btn btn-secondary">Back</a>
                                <button type="submit" id="add-subadmin"  class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {

        $('#showpass').on('click', function () {
            var passInput = $("#password");
            if (passInput.attr('type') === 'password')
            {
                passInput.attr('type', 'text');
                $('#showpass').removeClass('bx bx-hide');
                $('#showpass').addClass('bx bx-show');
            } else {
                passInput.attr('type', 'password');
                $('#showpass').removeClass('bx bx-show');
                $('#showpass').addClass('bx bx-hide');
            }
        })
    })
</script>