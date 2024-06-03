<style>
    div.dataTables_wrapper div.dataTables_filter {
        text-align: right;
        position: absolute;
        right: 10px;
    }
</style>
<div class="container-xxl flex-grow-1 container-p-y">

    <!-- Complex Headers -->
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-header p-0">Login History</h5>

            </div>

            <div class="table-responsive tbl-padding">

                <table class="table text-left table-striped" id="example">
                    <thead>

                        <tr>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Login Date & Time</th>
                            <th>IP</th>
                            <th>OS</th>
                            <th>Browser </th>
                            <th>Device </th>
                            <th>Duration </th>
                            <th>Expire Session </th>
                            <th>Landing Page </th>
                            <!-- <th>Exit Page </th> -->
                            <th>Current Page </th>
                            <th>Active last time </th>
                            <th>Status </th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php $count = 1; ?>
                        <?php foreach ($list as $row1) : ?>
                            <tr>

                                <td><?php echo $count++; ?></td>
                                <td><?php echo $this->common->selectivename($row1['user_id'], 'name', 'user_login'); ?></td>
                                <td><?php echo $this->common->selectivename($row1['user_id'], 'role', 'user_login'); ?></td>
                                <td><?php echo date('d-M-Y h:i:s a', strtotime($row1['logintime'])); ?></td>
                                <td><?php echo $row1['ip_address']; ?></td>
                                <td><?php echo $row1['useragent']; ?></td>
                                <td><?php echo $row1['name']; ?></td>
                                <td><?php echo $row1['platform']; ?></td>
                                <td><?php
                                    IF ($row1['expire_time'] != '0000-00-00 00:00:00' && $row1['status'] == 'Expired') {


                                        $datetime1 = new DateTime($row1['logintime']);
                                        $datetime2 = new DateTime($row1['expire_time']);
                                        $interval = $datetime1->diff($datetime2);
//$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
                                        $elapsed = $interval->format('%y ');
                                        $elapsed1 = $interval->format('%m ');
                                        $elapsed2 = $interval->format('%a  ');
                                        $elapsed3 = $interval->format('%h ');
                                        $elapsed4 = $interval->format('%i ');
                                        $elapsed5 = $interval->format('%s ');

                                        if ($elapsed > 0) {
                                            echo $elapsed;
                                            if ($elapsed > 1) {
                                                echo 'years ';
                                            } else {
                                                echo 'year ';
                                            }
                                        }
                                        if ($elapsed1 > 0) {
                                            echo $elapsed1;
                                            if ($elapsed1 > 1) {
                                                echo 'months ';
                                            } else {
                                                echo 'month ';
                                            }
                                        }
                                        if ($elapsed2 > 0) {
                                            echo $elapsed2;
                                            if ($elapsed2 > 1) {
                                                echo 'days ';
                                            } else {
                                                echo 'day ';
                                            }
                                        }
                                        if ($elapsed3 > 0) {
                                            echo $elapsed3;
                                            if ($elapsed3 > 1) {
                                                echo 'hours ';
                                            } else {
                                                echo 'hour ';
                                            }
                                        }
                                        if ($elapsed4 > 0) {
                                            echo $elapsed4;
                                            if ($elapsed4 > 1) {
                                                echo 'minutes ';
                                            } else {
                                                echo 'minute ';
                                            }
                                        }
                                        if ($elapsed5 > 0) {
                                            echo $elapsed5;
                                            if ($elapsed5 > 1) {
                                                echo 'seconds ';
                                            } else {
                                                echo 'second ';
                                            }
                                        }
                                    } else {

                                        $date = date('Y-m-d H:i:s');

                                        $datetime1 = new DateTime($row1['logintime']);
                                        $datetime2 = new DateTime();
                                        $interval = $datetime1->diff($datetime2);
//$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
                                        $elapsed = $interval->format('%y ');
                                        $elapsed1 = $interval->format('%m ');
                                        $elapsed2 = $interval->format('%a  ');
                                        $elapsed3 = $interval->format('%h ');
                                        $elapsed4 = $interval->format('%i ');
                                        $elapsed5 = $interval->format('%s ');

                                        if ($elapsed > 0) {
                                            echo $elapsed;
                                            if ($elapsed > 1) {
                                                echo 'years ';
                                            } else {
                                                echo 'year ';
                                            }
                                        }
                                        if ($elapsed1 > 0) {
                                            echo $elapsed1;
                                            if ($elapsed1 > 1) {
                                                echo 'months ';
                                            } else {
                                                echo 'month ';
                                            }
                                        }
                                        if ($elapsed2 > 0) {
                                            echo $elapsed2;
                                            if ($elapsed2 > 1) {
                                                echo 'days ';
                                            } else {
                                                echo 'day ';
                                            }
                                        }
                                        if ($elapsed3 > 0) {
                                            echo $elapsed3;
                                            if ($elapsed3 > 1) {
                                                echo 'hours ';
                                            } else {
                                                echo 'hour ';
                                            }
                                        }
                                        if ($elapsed4 > 0) {
                                            echo $elapsed4;
                                            if ($elapsed4 > 1) {
                                                echo 'minutes ';
                                            } else {
                                                echo 'minute ';
                                            }
                                        }
                                        if ($elapsed5 > 0) {
                                            echo $elapsed5;
                                            if ($elapsed5 > 1) {
                                                echo 'seconds ';
                                            } else {
                                                echo 'second ';
                                            }
                                        }
                                    }
                                    ?></td>
                                <td><?php
                                    IF ($row1['expire_time'] != '0000-00-00 00:00:00') {


                                        echo date('d-M-Y h:i:s a', strtotime($row1['expire_time']));
                                    } ELSE {
                                        echo '-';
                                    }
                                    ?></td>
                                <td> <?php echo $row1['landing_page']; ?></td>
                                <!-- <td><?php //echo $row1['exit_page'];  ?></td>  -->
                                <td><?php echo $row1['page_url']; ?></td>
                                <td><?php echo $row1['createdDate'] ?></td>
                                <td><?php
                                    if ($row1['status'] == 1) {
                                        echo 'Active';
                                    } else {
                                        echo 'Deactive';
                                    };

                                    if ($row1['status'] == 1) {
                                        ?>
                                        <a class="btn btn-primary mr-1" href="<?php echo base_url(); ?>logoutdevice/<?php echo $row1['id'];
                                   $this->session->set_userdata('logoutid', $row1['id']);
                                        ?>">Logout</a>
                                           <?php
                                       }
                                       ?>
                                </td>




                            </tr>
<?php endforeach; ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>
</div>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>