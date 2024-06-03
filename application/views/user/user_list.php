<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Complex Headers -->
    <div class="card">
    <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="card-header p-0">Set Privileges</h5>
        
</div>
            <div class="table-responsive tbl-padding">

                <table  class="table table-striped" id="example">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            
                            <th>Role</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $count = 1; ?>
                        <?php foreach ($user as $value): ?>
                    <tbody>
                        
                        <td>  <?php echo $count++; ?></td>
                     
                        <td> <?php echo $value['role'];?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-info btn-actions btn-sm" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Edit Privileges" href="edit-privilege/<?php echo $this->common->selectivename2($value['role'],'id','privilege','user_id' )?>"><i class="far fa-edit font-14"></i></a>
                            </div>
                        </td>
                    
                    </tbody>
                    <?php endforeach ?>
                </table>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>