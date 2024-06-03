<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Complex Headers -->
    <div class="card">

        <h5 class="card-header">Newsletter List</h5>
        <div class="card-body">
        </div>

        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Sr No
                        </th>

                        <th>Email</th>

                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    <?php foreach ($contact_list as $value) : ?>
                        <?php $count++; ?>
                        <tr>
                            <td></td>
                            <td> <?php echo $count; ?></td>



                            <td><?php echo $value['email']; ?></td>



                            <td><?php echo date('d-M-Y h:i:s A', strtotime($value['datetime'])); ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>
        </div>

    </div>

</div>
<div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLongTitle">Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>