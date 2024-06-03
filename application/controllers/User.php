<?php

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->load->model('Index_model', 'index');
        $this->login->is_logged_in();
        $this->index->activity_update();
    }

    public function index() {
        $data['page_name'] = 'User List';
        $this->index->activity_log('Sub admin privilege List');
        $data['user_detail'] = $this->common->view1();
        $data['content_view'] = 'user/user_list';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user'] = $this->common->list('admin_panel_roles');
        $this->load->view('admin_template', $data);
    }

    function fetch_privlist() {

        $this->load->model("crud_model");
        $table = "user_login";
        $select_column = array("id", "name", "role", "status");
        $order_column = array(null, "name", "role", "status", null);

        $fetch_data = $this->crud_model->make_datatables1($table, $select_column, $order_column);
        $data = array();
        $count = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $count++;
            $sub_array[] = $row->name;
            $sub_array[] = $row->role;
            if ($row->status == 1) {
                $checkstatus = '<label class="switch switch-success">
                <input type="checkbox" checked  data-id="' . $row->id . '" data-status="0" class="switch-input status-subadmin"  />
                             <span class="switch-toggle-slider">
                               <span class="switch-on">
                                 <i class="bx bx-check"></i>
                               </span>
                             </span>';
            } else {
                if ($row->status == 0) {
                    $checkstatus = '<label class="switch switch-success">
                 <input type="checkbox"  data-id="' . $row->id . '" data-status="1" class="switch-input status-subadmin"  />
                 <span class="switch-toggle-slider">
               <span class="switch-off">
                 <i class="bx bx-x" style="color:red;"></i>
               </span>
             </span>
             ';
                }
            }
            $sub_array[] = $checkstatus;
            $sub_array[] = '<div class="btn-group" role="group" aria-label="Basic example">
                           
                              
                                <button type="button" class="btn btn-info addp" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Add Privileges" data-id="' . $row->id . '" ><i class="fa fa-plus font-14"></i></button>
                                <a class="btn btn-info" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Edit Privileges" href="edit-privilege/' . $row->id . '"><i class="far fa-edit font-14"></i></a>
                                </div>';

            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->crud_model->get_all_data1($table),
            "recordsFiltered" => $this->crud_model->get_filtered_data1($table, $select_column, $order_column),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function privilege() {
        $data['page_name'] = 'User List';
        $this->index->activity_log('Sub admin privilege List');
        $id = $this->session->userdata('user_id');
        $data['user_detail'] = $this->common->view1();
        $data['privileges'] = $this->common->view('user_login', $id);
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));

        $data['content_view'] = 'user/privilege';

        $this->load->view('admin_template', $data);
    }

    // public function add_pri() {
    //     //  if($this->input->post('submit')){
    //     $id = $this->input->post('id');
    //     $result = $this->common->pri($id);
    //     if ($result == 'already_added') {
    //         $array = array(
    //             'error' => 'Already added privileges Go to edit ',
    //         );
    //     } else {
    //         $data = array(
    //             'catf' => $this->input->post('catf'),
    //             'addcf' => $this->input->post('addcf'),
    //             'editcf' => $this->input->post('editcf'),
    //             'addf' => $this->input->post('addf'),
    //             'editf' => $this->input->post('editf'),
    //             'listf' => $this->input->post('listf'),
    //             'addt' => $this->input->post('addt'),
    //             'editt' => $this->input->post('editt'),
    //             'listt' => $this->input->post('listt'),
    //             'cate' => $this->input->post('cate'),
    //             'adde' => $this->input->post('adde'),
    //             'edite' => $this->input->post('edite'),
    //             'adde' => $this->input->post('adde'),
    //             'edite' => $this->input->post('edite'),
    //             'liste' => $this->input->post('liste'),
    //             'catp' => $this->input->post('catp'),
    //             'addcp' => $this->input->post('addcp'),
    //             'editcp' => $this->input->post('editcp'),
    //             'subcatp' => $this->input->post('subcatp'),
    //             'addscp' => $this->input->post('addscp'),
    //             'editscp' => $this->input->post('editscp'),
    //             'addp' => $this->input->post('addp'),
    //             'editp' => $this->input->post('editp'),
    //             'listp' => $this->input->post('listp'),
    //             'authb' => $this->input->post('authb'),
    //             'authlistb' => $this->input->post('authlistb'),
    //             'catb' => $this->input->post('catb'),
    //             'addcb' => $this->input->post('addcb'),
    //             'editcb' => $this->input->post('editcb'),
    //             'addb' => $this->input->post('addb'),
    //             'editb' => $this->input->post('editb'),
    //             'listb' => $this->input->post('listb'),
    //             'catproject' => $this->input->post('catproject'),
    //             'addcproject' => $this->input->post('addcproject'),
    //             'editcproject' => $this->input->post('editcproject'),
    //             'addproject' => $this->input->post('addproject'),
    //             'editproject' => $this->input->post('editproject'),
    //             'delproject' => $this->input->post('delproject'),
    //             'cats' => $this->input->post('cats'),
    //             'addcs' => $this->input->post('addcs'),
    //             'editcs' => $this->input->post('editcs'),
    //             'subcats' => $this->input->post('subcats'),
    //             'addscs' => $this->input->post('addscs'),
    //             'editscs' => $this->input->post('editscs'),
    //             'adds' => $this->input->post('adds'),
    //             'edits' => $this->input->post('edits'),
    //             'lists' => $this->input->post('lists'),
    //             'catj' => $this->input->post('catj'),
    //             'editcj' => $this->input->post('editcj'),
    //             'addcj' => $this->input->post('addcj'),
    //             'addj' => $this->input->post('addj'),
    //             'editj' => $this->input->post('editj'),
    //             'listj' => $this->input->post('listj'),
    //             'catn' => $this->input->post('catn'),
    //             'addcn' => $this->input->post('addcn'),
    //             'editcn' => $this->input->post('editcn'),
    //             'addn' => $this->input->post('addn'),
    //             'editn' => $this->input->post('editn'),
    //             'listn' => $this->input->post('listn'),
    //             'addc' => $this->input->post('addc'),
    //             'editc' => $this->input->post('editc'),
    //             'listc' => $this->input->post('listc'),
    //             'addtest' => $this->input->post('addtest'),
    //             'edittest' => $this->input->post('edittest'),
    //             'listest' => $this->input->post('listest'),
    //             'addct' => $this->input->post('addct'),
    //             'editct' => $this->input->post('editct'),
    //             'listct' => $this->input->post('listct'),
    //             'catv' => $this->input->post('catv'),
    //             'addcv' => $this->input->post('addcv'),
    //             'editcv' => $this->input->post('editcv'),
    //             'addv' => $this->input->post('addv'),
    //             'editv' => $this->input->post('editv'),
    //             'listv' => $this->input->post('listv'),
    //             'addpd' => $this->input->post('addpd'),
    //             'editpd' => $this->input->post('editpd'),
    //             'listpd' => $this->input->post('listpd'),
    //             'catg' => $this->input->post('catg'),
    //             'addg' => $this->input->post('addg'),
    //             'editg' => $this->input->post('editg'),
    //             'addg' => $this->input->post('addg'),
    //             'editg' => $this->input->post('editg'),
    //             'listg' => $this->input->post('listg'),
    //             'linklis' => $this->input->post('linklis'),
    //             'link' => $this->input->post('link'),
    //             'slider' => $this->input->post('slider'),
    //             'addusers' => 1,
    //             'users' => 1,
    //             'listusers' => 1,
    //         );
    //         $r = $this->db->insert('privilege', $data);
    //         if ($r) {
    //             $array = array(
    //                 'success' => ' Data Added',
    //             );
    //         }
    //     }
    //     echo json_encode($array);
    // }

    public function edit($id) {
        // $id = $this->session->userdata('user_id');
        $data['page_name'] = 'User List';
        $this->index->activity_log('Sub admin Edit');
        $data['edit_details'] = $this->common->view('privilege', $id);
        $data['user_detail'] = $this->common->view1();
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['content_view'] = 'user/edit';

        $this->load->view('admin_template', $data);
    }

    public function update() {
        //  if($this->input->post('submit')){
        $id = $this->input->post('id');

        $data = array(
            //'user_id'=> $this->session->userdata('user_id'),
            'catf' => $this->input->post('catf'),
            'addcf' => $this->input->post('addcf'),
            'editcf' => $this->input->post('editcf'),
            'delcf' => $this->input->post('delcf'),
            'addf' => $this->input->post('addf'),
            'editf' => $this->input->post('editf'),
            'delf' => $this->input->post('delf'),
            'listf' => $this->input->post('listf'),
            'addt' => $this->input->post('addt'),
            'editt' => $this->input->post('editt'),
            'delt' => $this->input->post('delt'),
            'listt' => $this->input->post('listt'),
            'cate' => $this->input->post('cate'),
            'addce' => $this->input->post('addce'),
            'editce' => $this->input->post('editce'),
            'delce' => $this->input->post('delce'),
            'adde' => $this->input->post('adde'),
            'edite' => $this->input->post('edite'),
            'dele' => $this->input->post('dele'),
            'liste' => $this->input->post('liste'),
            'subcatp' => $this->input->post('subcatp'),
            'addscp' => $this->input->post('addscp'),
            'editscp' => $this->input->post('editscp'),
            'delscp' => $this->input->post('delscp'),
            'addp' => $this->input->post('addp'),
            'editp' => $this->input->post('editp'),
            'delp' => $this->input->post('delp'),
            'listp' => $this->input->post('listp'),
            'authb' => $this->input->post('authb'),
            'authlistb' => $this->input->post('authlistb'),
            'catb' => $this->input->post('catb'),
            'addcb' => $this->input->post('addcb'),
            'editcb' => $this->input->post('editcb'),
            'delcb' => $this->input->post('delcb'),
            'addb' => $this->input->post('addb'),
            'editb' => $this->input->post('editb'),
            'delb' => $this->input->post('delb'),
            'listb' => $this->input->post('listb'),
            
            
             'catproject' => $this->input->post('catproject'),
                'addcproject' => $this->input->post('addcproject'),
                'editcproject' => $this->input->post('editcproject'),
                'addproject' => $this->input->post('addproject'),
                'editproject' => $this->input->post('editproject'),
                'delproject' => $this->input->post('delproject'),
            
            'subcats' => $this->input->post('subcats'),
            'addscs' => $this->input->post('addscs'),
            'editscs' => $this->input->post('editscs'),
            'delscs' => $this->input->post('delscs'),
            'adds' => $this->input->post('adds'),
            'edits' => $this->input->post('edits'),
            'dels' => $this->input->post('dels'),
            'lists' => $this->input->post('lists'),
            'catj' => $this->input->post('catj'),
            'editcj' => $this->input->post('editcj'),
            'addcj' => $this->input->post('addcj'),
            'delcj' => $this->input->post('delcj'),
            'addj' => $this->input->post('addj'),
            'editj' => $this->input->post('editj'),
            'delj' => $this->input->post('delj'),
            'listj' => $this->input->post('listj'),
            'catn' => $this->input->post('catn'),
            'addcn' => $this->input->post('addcn'),
            'editcn' => $this->input->post('editcn'),
            'delcn' => $this->input->post('delcn'),
            'addn' => $this->input->post('addn'),
            'editn' => $this->input->post('editn'),
            'deln' => $this->input->post('deln'),
            'listn' => $this->input->post('listn'),
            'addc' => $this->input->post('addc'),
            'editc' => $this->input->post('editc'),
            'delc' => $this->input->post('delc'),
            'listc' => $this->input->post('listc'),
            'addtest' => $this->input->post('addtest'),
            'edittest' => $this->input->post('edittest'),
            'deltest' => $this->input->post('deltest'),
            'listest' => $this->input->post('listest'),
            'addct' => $this->input->post('addct'),
            'editct' => $this->input->post('editct'),
            'delct' => $this->input->post('delct'),
            'listct' => $this->input->post('listct'),
            'catv' => $this->input->post('catv'),
            'addcv' => $this->input->post('addcv'),
            'editcv' => $this->input->post('editcv'),
            'delcv' => $this->input->post('delcv'),
            'addv' => $this->input->post('addv'),
            'editv' => $this->input->post('editv'),
            'delv' => $this->input->post('delv'),
            'listv' => $this->input->post('listv'),
            'addpd' => $this->input->post('addpd'),
            'editpd' => $this->input->post('editpd'),
            'delpd' => $this->input->post('delpd'),
            'listpd' => $this->input->post('listpd'),
            'catg' => $this->input->post('catg'),
            'addcg' => $this->input->post('addcg'),
            'editcg' => $this->input->post('editcg'),
            'delcg' => $this->input->post('delcg'),
            'addg' => $this->input->post('addg'),
            'editg' => $this->input->post('editg'),
            'delg' => $this->input->post('delg'),
            'listg' => $this->input->post('listg'),
            'linklis' => $this->input->post('linklis'),
            'link' => $this->input->post('link'),
            'addlink' => $this->input->post('addlink'),
            'editlink' => $this->input->post('editlink'),
            'dellink' => $this->input->post('dellink'),
            'slider' => $this->input->post('slider'),
        );
        $r = $this->common->update_table('privilege', $data, $id);
        //  if($r){ 
        $array = array(
            'success' => 'Page Access to the Sub Admin updated successfully.',
        );
        //  } 
        echo json_encode($array);
    }

    public function add_subadmin() {
        $data['page_name'] = 'Add Sub Admin';
        $this->index->activity_log('Add Sub Admin');
        $data['user_detail'] = $this->common->view1();
        $data['adrole'] = $this->common->list('admin_panel_roles');
        $data['content_view'] = 'user/addsubad';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        // $data['user_details'] = $this->common->fetch_data($this->session->userdata('user_id'),'user_login');
        $data['user'] = $this->common->list('user_login');
        $this->load->view('admin_template', $data);
    }

    public function insert_subadmin() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user_login.email]', array('is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('role', 'role', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run()) {

            $email = $this->input->post('email');
            $result = $this->common->chksub($email);
            if ($result == 'already_exists') {
                $array = array(
                    'error' => 'Sub admin already exist.'
                );
            } else {
                $insert_data = array(
                    'name' => $this->input->post('name'),
                    'role' => $this->input->post('role'),
                    'email' => $this->input->post('email'),
                    'status' => '1',
                    'flag' => '1',
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    'createdDate' => DATE
                );

                $id = $this->common->insert_table('user_login', $insert_data);

                if ($id) {
                    $array = array(
                        'success' => 'Sub Admin Added successfully.'
                    );
                }
            }
        } else {
            $array = array(
                'error' => true,
                'name_error' => form_error('name'),
                'email_error' => form_error('email'),
                'role_error' => form_error('role'),
                'password_error' => form_error('password')
            );
        }
        echo json_encode($array);
    }

    public function fetch_subadmin() {
        $data['page_name'] = 'Sub Admin List';
        $this->index->activity_log('Sub Admin List');
        $data['user_detail'] = $this->common->view1();
        $data['content_view'] = 'user/sublist';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));

        $data['user'] = $this->common->role();
        $this->load->view('admin_template', $data);
    }

    function fetch_subad() {

        $this->load->model("crud_model");
        $table = "user_login";
        $select_column = array("id", "name", "role", "status");
        $order_column = array(null, "name", "role", "status", null);

        $fetch_data = $this->crud_model->make_datatables1($table, $select_column, $order_column);
        $data = array();
        $count = 1;
        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $count++;
            $sub_array[] = $row->name;
            $sub_array[] = $row->role;
            if ($row->status == 1) {
                $checkstatus = '<label class="switch switch-success">
                <input type="checkbox" checked  data-id="' . $row->id . '" data-status="0" class="switch-input status-subadmin"  />
                             <span class="switch-toggle-slider">
                               <span class="switch-on">
                                 <i class="bx bx-check"></i>
                               </span>
                             </span>';
            } else {
                if ($row->status == 0) {
                    $checkstatus = '<label class="switch switch-success">
                 <input type="checkbox"  data-id="' . $row->id . '" data-status="1" class="switch-input status-subadmin"  />
                 <span class="switch-toggle-slider">
               <span class="switch-off">
                 <i class="bx bx-x" style="color:red;"></i>
               </span>
             </span>
             ';
                }
            }
            $sub_array[] = $checkstatus;

            $sub_array[] = '<div class="btn-group" role="group" aria-label="Basic example">
                           
                              
                              
                                <a class="btn btn-info" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Edit Privileges" href="edit-subadmin/' . $row->id . '"><i class="far fa-edit font-14"></i></a>
                                <button type="button" class="btn btn-info delete-subadmin" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" Parker data-id="' . $row->id . '"><i class="far fa-trash-alt font-14"></i></button>
                                </div>';

            $data[] = $sub_array;
        }
        $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->crud_model->get_all_data1($table),
            "recordsFiltered" => $this->crud_model->get_filtered_data1($table, $select_column, $order_column),
            "data" => $data
        );
        echo json_encode($output);
    }

    public function edit_subadmin($id) {
        $data['user_detail'] = $this->common->view1();
        $data['adrole'] = $this->common->list('admin_panel_roles');
        $data['page_name'] = 'Sub Admin List';
        $this->index->activity_log('Sub Admin List');
        $data['details'] = $this->common->view('user_login', $id);
        $data['content_view'] = 'user/subedit';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $this->load->view('admin_template', $data);
    }

    public function update_subadmin() {
        $id = $this->input->post('id');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|callback_unique[user_login.email,user_login.id]');
        $this->form_validation->set_rules('role', 'role', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');

            $insert_data = array(
                'name' => $this->input->post('name'),
                'role' => $this->input->post('role'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'createdDate' => DATE
            );
            $id = $this->common->update_table('user_login', $insert_data, $id);
            //  if ($id) {
            $array = array(
                'success' => 'Sub Admin Updated successfully.',
            );
            // }
        } else {
            $array = array(
                'error' => 'Sub Admin Email id Already exist.',
            );
        }
        echo json_encode($array);
    }

    public function unique($value, $params) {
        // Allow for more than 1 parameter.
        $fields = explode(',', $params);

        // Extract the table and field from the first parameter.
        list($table, $field) = explode('.', $fields[0], 2);

        // Setup the db request.
        $this->db->select($field)
                ->from($table)
                ->where($field, $value)
                ->limit(1);

        // Check whether a second parameter was passed to be used as an
        // "AND NOT EQUAL" where clause
        // eg "select * from users where users.name='test' AND users.id != 4
        if (isset($fields[1])) {
            // Extract the table and field from the second parameter
            list($where_table, $where_field) = explode('.', $fields[1], 2);

            // Get the value from the post's $where_field. If the value is set,
            // add "AND NOT EQUAL" where clause.
            $where_value = $this->input->post($where_field);
            if (isset($where_value)) {
                $this->db->where("{$where_table}.{$where_field} <>", $where_value);
            }
        }

        // If any rows are returned from the database, validation fails
        $query = $this->db->get();
        if ($query->row()) {

            $this->form_validation->set_message('unique', $this->lang->line('form_validation_is_unique'));
            return false;
        }

        return true;
    }

    public function check_strong_password($str) {
        if (preg_match('#[0-9]#', $str) || preg_match('#[A-Z]#', $str) || preg_match('#[a-z]#', $str)) {
            return TRUE;
        }
        $this->form_validation->set_message('check_strong_password', 'The password field must be contains at least uppercase letter and one digit.');
        return FALSE;
    }

    public function status() {
        $id = $this->input->post('id');
        $this->index->activity_log('Sub Admin Status');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('user_login', $delete_data, $id);
        $array = array(
            'success' => 'Sub admin Status updated successfully.'
        );
        echo json_encode($array);
    }

    public function delete_subadmin() {

        $this->index->activity_log('Sub Admin Delete');
        $id = $this->input->post('id');

        $this->common->delete_table('user_login', $id);
//        $this->common->delete_table1('privilege','user_id', $id);
//        $this->common->delete_table1('admin_panel_setup','user_id', $id);
        $array = array(
            'success' => 'Sub Admin deleted successfully.'
        );
        echo json_encode($array);
    }

    // public function addp() {
    //     $id = $this->input->post('id');
    //     $result = $this->common->pri($id);
    //     if ($result == 'already_added') {
    //         $array = array(
    //             'error' => 'Already added privileges Go to edit ',
    //         );
    //     } else {
    //         $array = array(
    //             'success' => 'Proceed',
    //         );
    //         $this->session->set_userdata('sub', $id);
    //     }
    //     echo json_encode($array);
    // }

    public function practicepage() {
        $data['page_name'] = 'User List';
        $data['user_detail'] = $this->common->view1();
        $data['content_view'] = 'Slider/frontpage';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $this->load->view('admin_template', $data);
    }

    public function suggest() {
        $data1['legder_report'] = $this->common->lis('blog');
        $data = '';

        foreach ($data1['legder_report'] as $val) {

            $data .= '<div> 
 <span>' . $val['title'] . '</span>
   </div>';
        }
        echo json_encode($data);
    }

    public function roles() {
        $this->index->activity_log('Role List');
        $data['page_name'] = 'Roles';
        $data['admin_panel_roles'] = $this->common->list('admin_panel_roles');
        $data['user_detail'] = $this->common->view1();
        $data['content_view'] = 'user/addrole';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $this->load->view('admin_template', $data);
    }

    public function add_role() {

        $this->index->activity_log('Role Add');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('role', 'Role', 'trim|required|is_unique[admin_panel_roles.role]', array('is_unique' => 'This %s already exists.'));
        if ($this->form_validation->run()) {
            $insert_data = array(
                'role' => $this->input->post('role'),
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );
            $id = $this->common->insert_table('admin_panel_roles', $insert_data);
//            $lid = $this->db->insert_id();
            $insertdatap = array(
                'user_id' => $this->input->post('role'),
            );
            $this->db->insert('privilege', $insertdatap);
            // $this->db->select('*');
            // $this->db->where('user_id','admin');
            // $query= $this->db->get('admin_panel_setup');
            // $row=  $query->row();
            // $setupdata= array(
            // 'user_id'=>$this->input->post('role'),
            // 'subadmin' => $row->subadmin,
            // 'product' =>  $row->product,
            // 'blog' =>  $row->blog,
            // 'services' =>  $row->services,
            // 'faq' =>  $row->faq,
            // 'gallery' =>  $row->gallery,
            // 'event' =>  $row->event,
            // 'video' =>  $row->video,
            // 'job' =>  $row->job,
            // 'teams' =>  $row->teams,
            // 'pdf' =>  $row->pdf,
            // 'news' =>  $row->news,
            // 'testimonials' =>  $row->testimonials,
            // 'clientele' =>  $row->clientele,
            // 'link' =>  $row->link,
            // 'slider' => $row->slider,
            // );
            // $this->db->insert('admin_panel_setup', $setupdata);
            // if ($id) {
            $array = array(
                'success' => 'Role added successfully.'
            );
            // }
//            if ($id) {
//                $array = array(
//                    'success' => 'Role added successfully.'
//                );
//            }
        } else {
            $array = array(
                'error' => true,
                'role1_error' => form_error('role')
            );
        }
        echo json_encode($array);
    }

    public function fetch_role() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'admin_panel_roles');
            echo json_encode($data);
        }
    }

    function check_order_no($order_no) {
        if ($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->common->check_unique_order_no($order_no, 'admin_panel_roles', 'role', $id);
        if ($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_order_no', 'Role  already exist');
            $response = false;
        }
        return $response;
    }

    public function edit_role() {
        $id = $this->input->post('id');
        $this->index->activity_log('Role Edit');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('role', 'Role', 'required|callback_check_order_no');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'role' => $this->input->post('role'),
            );
            $this->common->update_table('admin_panel_roles', $update_data, $id);
            if ($this->db->affected_rows() == 0) {
                $array = array(
                    'warning' => 'You have made no changes.'
                );
            } else {
                $update_data['createdDate'] = DATE;
                $this->common->update_table('admin_panel_roles', $update_data, $id);
                $array = array(
                    'success' => 'Role updated successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'role_error' => form_error('role')
            );
        }
        echo json_encode($array);
    }

    public function delete_role() {
        $this->index->activity_log('Delete Role');
        $id = $this->input->post('id');
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('admin_panel_roles');
        $query = $this->db->get();
        $row = $query->row();
        $this->common->delete_table1('privilege', 'user_id', $row->role);
        $this->common->delete_table1('user_login', 'role', $row->role);
        $this->common->delete_table('admin_panel_roles', $id);
        $array = array(
            'success' => 'Role deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_pri() {

        $id = $this->input->post('id');

        $delete_data = array(
            $this->input->post('name') => $this->input->post('val'),
        );

        $this->common->update_table('privilege', $delete_data, $id);
        if ($this->input->post('val') == '0') {
            $delete_data['allpri'] = $this->input->post('val');
            $this->common->update_table('privilege', $delete_data, $id);
        } else {
            $this->common->checkpripage($this->input->post('napage'), $id);
        }

        $array = array(
            'success' => 'Privileges updated for the respective page .'
        );
        echo json_encode($array);
    }

    public function status_prim() {
        $id = $this->input->post('id');

        if ($this->input->post('val') == '0') {
            $delete_data['allpri'] = $this->input->post('val');
            $this->common->update_table('privilege', $delete_data, $id);
        } elseif ($this->input->post('val') == '1') {
            // $delete_data['allpri']= $this->input->post('val');
            // $this->common->update_table('privilege', $delete_data, $id);
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        if ($this->input->post('name') == 'faq') {

            $delete_data['addf'] = $this->input->post('val');
            $delete_data['editf'] = $this->input->post('val');
            $delete_data['listf'] = $this->input->post('val');
            $delete_data['delf'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'faqc') {
            $delete_data['addcf'] = $this->input->post('val');
            $delete_data['editcf'] = $this->input->post('val');
            $delete_data['catf'] = $this->input->post('val');
            $delete_data['delcf'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'video') {
            $delete_data['addv'] = $this->input->post('val');
            $delete_data['editv'] = $this->input->post('val');
            $delete_data['listv'] = $this->input->post('val');
            $delete_data['delv'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        if ($this->input->post('name') == 'videoc') {
            $delete_data['addcv'] = $this->input->post('val');
            $delete_data['editcv'] = $this->input->post('val');
            $delete_data['catv'] = $this->input->post('val');
            $delete_data['delcv'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        if ($this->input->post('name') == 'product') {
            $delete_data['addp'] = $this->input->post('val');
            $delete_data['editp'] = $this->input->post('val');
            $delete_data['listp'] = $this->input->post('val');
            $delete_data['delp'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        if ($this->input->post('name') == 'productc') {
            $delete_data['addscp'] = $this->input->post('val');
            $delete_data['editscp'] = $this->input->post('val');
            $delete_data['subcatp'] = $this->input->post('val');
            $delete_data['delscp'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        if ($this->input->post('name') == 'blog') {
            $delete_data['addb'] = $this->input->post('val');
            $delete_data['editb'] = $this->input->post('val');
            $delete_data['listb'] = $this->input->post('val');
            $delete_data['delb'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'blogc') {
            $delete_data['addcb'] = $this->input->post('val');
            $delete_data['editcb'] = $this->input->post('val');
            $delete_data['catb'] = $this->input->post('val');
            $delete_data['delcb'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }



        if ($this->input->post('name') == 'project') {
            $delete_data['addproject'] = $this->input->post('val');
            $delete_data['editproject'] = $this->input->post('val');
            $delete_data['listproject'] = $this->input->post('val');
            $delete_data['delproject'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'projectc') {
            $delete_data['addcproject'] = $this->input->post('val');
            $delete_data['editcproject'] = $this->input->post('val');
            $delete_data['catproject'] = $this->input->post('val');
            $delete_data['delcproject'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }



        if ($this->input->post('name') == 'service') {
            $delete_data['adds'] = $this->input->post('val');
            $delete_data['edits'] = $this->input->post('val');
            $delete_data['lists'] = $this->input->post('val');
            $delete_data['dels'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        if ($this->input->post('name') == 'servicec') {
            $delete_data['addscs'] = $this->input->post('val');
            $delete_data['editscs'] = $this->input->post('val');
            $delete_data['subcats'] = $this->input->post('val');
            $delete_data['delscs'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'event') {
            $delete_data['adde'] = $this->input->post('val');
            $delete_data['edite'] = $this->input->post('val');
            $delete_data['liste'] = $this->input->post('val');
            $delete_data['dele'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'eventc') {
            $delete_data['addce'] = $this->input->post('val');
            $delete_data['editce'] = $this->input->post('val');
            $delete_data['cate'] = $this->input->post('val');
            $delete_data['delce'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        if ($this->input->post('name') == 'job') {
            $delete_data['addj'] = $this->input->post('val');
            $delete_data['editj'] = $this->input->post('val');
            $delete_data['listj'] = $this->input->post('val');
            $delete_data['delj'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'jobc') {
            $delete_data['addcj'] = $this->input->post('val');
            $delete_data['editcj'] = $this->input->post('val');
            $delete_data['catj'] = $this->input->post('val');
            $delete_data['delcj'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'news') {
            $delete_data['addn'] = $this->input->post('val');
            $delete_data['editn'] = $this->input->post('val');
            $delete_data['listn'] = $this->input->post('val');
            $delete_data['deln'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'newsc') {
            $delete_data['addcn'] = $this->input->post('val');
            $delete_data['editcn'] = $this->input->post('val');
            $delete_data['catn'] = $this->input->post('val');
            $delete_data['delcn'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'gallery') {
            $delete_data['addg'] = $this->input->post('val');
            $delete_data['editg'] = $this->input->post('val');
            $delete_data['listg'] = $this->input->post('val');
            $delete_data['delg'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'galleryc') {
            $delete_data['addcg'] = $this->input->post('val');
            $delete_data['editcg'] = $this->input->post('val');
            $delete_data['catg'] = $this->input->post('val');
            $delete_data['delcg'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        if ($this->input->post('name') == 'testimonial') {
            $delete_data['addtest'] = $this->input->post('val');
            $delete_data['edittest'] = $this->input->post('val');
            $delete_data['listest'] = $this->input->post('val');
            $delete_data['deltest'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }
        if ($this->input->post('name') == 'clientele') {
            $delete_data['addct'] = $this->input->post('val');
            $delete_data['editct'] = $this->input->post('val');
            $delete_data['listct'] = $this->input->post('val');
            $delete_data['delct'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        if ($this->input->post('name') == 'pdf') {
            $delete_data['addpd'] = $this->input->post('val');
            $delete_data['editpd'] = $this->input->post('val');
            $delete_data['listpd'] = $this->input->post('val');
            $delete_data['delpd'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        if ($this->input->post('name') == 'team') {
            $delete_data['addt'] = $this->input->post('val');
            $delete_data['editt'] = $this->input->post('val');
            $delete_data['listt'] = $this->input->post('val');
            $delete_data['delt'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        if ($this->input->post('name') == 'link') {
            $delete_data['addlink'] = $this->input->post('val');
            $delete_data['editlink'] = $this->input->post('val');
            $delete_data['link'] = $this->input->post('val');
            $delete_data['dellink'] = $this->input->post('val');
            $this->common->checkpripage($this->input->post('name'), $id);
        }

        $this->common->update_table('privilege', $delete_data, $id);
        $array = array(
            'success' => 'Privileges updated for the respective page .'
        );
        echo json_encode($array);
    }

    public function statusall_prim() {
        $id = $this->input->post('id');
        $this->db->select('*');
        $this->db->where('user_id', 'admin');
        $this->db->from('privilege');
        $query = $this->db->get()->result_array();
        foreach ($query as $row):
            if ($row['addf'] == 1) {
                $delete_data['addf'] = $this->input->post('val');
                $delete_data['editf'] = $this->input->post('val');
                $delete_data['listf'] = $this->input->post('val');
                $delete_data['delf'] = $this->input->post('val');
            }
            if ($row['addcf'] == 1) {
                $delete_data['addcf'] = $this->input->post('val');
                $delete_data['editcf'] = $this->input->post('val');
                $delete_data['catf'] = $this->input->post('val');
                $delete_data['delcf'] = $this->input->post('val');
            }
            if ($row['addv'] == 1) {
                $delete_data['addv'] = $this->input->post('val');
                $delete_data['editv'] = $this->input->post('val');
                $delete_data['listv'] = $this->input->post('val');
                $delete_data['delv'] = $this->input->post('val');
            }
            if ($row['addcv'] == 1) {
                $delete_data['addcv'] = $this->input->post('val');
                $delete_data['editcv'] = $this->input->post('val');
                $delete_data['catv'] = $this->input->post('val');
                $delete_data['delcv'] = $this->input->post('val');
            }
            if ($row['addp'] == 1) {
                $delete_data['addp'] = $this->input->post('val');
                $delete_data['editp'] = $this->input->post('val');
                $delete_data['listp'] = $this->input->post('val');
                $delete_data['delp'] = $this->input->post('val');
            }
            if ($row['addscp'] == 1) {
                $delete_data['addscp'] = $this->input->post('val');
                $delete_data['editscp'] = $this->input->post('val');
                $delete_data['subcatp'] = $this->input->post('val');
                $delete_data['delscp'] = $this->input->post('val');
            }
            if ($row['addb'] == 1) {
                $delete_data['addb'] = $this->input->post('val');
                $delete_data['editb'] = $this->input->post('val');
                $delete_data['listb'] = $this->input->post('val');
                $delete_data['delb'] = $this->input->post('val');
            }
            if ($row['addcb'] == 1) {
                $delete_data['addcb'] = $this->input->post('val');
                $delete_data['editcb'] = $this->input->post('val');
                $delete_data['catb'] = $this->input->post('val');
                $delete_data['delcb'] = $this->input->post('val');
            }
            
            
             if ($row['addproject'] == 1) {
                $delete_data['addproject'] = $this->input->post('val');
                $delete_data['editproject'] = $this->input->post('val');
                $delete_data['listproject'] = $this->input->post('val');
                $delete_data['delproject'] = $this->input->post('val');
            }
            if ($row['addcproject'] == 1) {
                $delete_data['addcproject'] = $this->input->post('val');
                $delete_data['editcproject'] = $this->input->post('val');
                $delete_data['catproject'] = $this->input->post('val');
                $delete_data['delcproject'] = $this->input->post('val');
            }
            
            if ($row['adds'] == 1) {
                $delete_data['adds'] = $this->input->post('val');
                $delete_data['edits'] = $this->input->post('val');
                $delete_data['lists'] = $this->input->post('val');
                $delete_data['dels'] = $this->input->post('val');
            }
            if ($row['addscs'] == 1) {
                $delete_data['addscs'] = $this->input->post('val');
                $delete_data['editscs'] = $this->input->post('val');
                $delete_data['subcats'] = $this->input->post('val');
                $delete_data['delscs'] = $this->input->post('val');
            }
            if ($row['adde'] == 1) {
                $delete_data['adde'] = $this->input->post('val');
                $delete_data['edite'] = $this->input->post('val');
                $delete_data['liste'] = $this->input->post('val');
                $delete_data['dele'] = $this->input->post('val');
            }
            if ($row['addce'] == 1) {
                $delete_data['addce'] = $this->input->post('val');
                $delete_data['editce'] = $this->input->post('val');
                $delete_data['cate'] = $this->input->post('val');
                $delete_data['delce'] = $this->input->post('val');
            }
            if ($row['addj'] == 1) {
                $delete_data['addj'] = $this->input->post('val');
                $delete_data['editj'] = $this->input->post('val');
                $delete_data['listj'] = $this->input->post('val');
                $delete_data['delj'] = $this->input->post('val');
            }
            if ($row['addcj'] == 1) {
                $delete_data['addcj'] = $this->input->post('val');
                $delete_data['editcj'] = $this->input->post('val');
                $delete_data['catj'] = $this->input->post('val');
                $delete_data['delcj'] = $this->input->post('val');
            }
            if ($row['addn'] == 1) {
                $delete_data['addn'] = $this->input->post('val');
                $delete_data['editn'] = $this->input->post('val');
                $delete_data['listn'] = $this->input->post('val');
                $delete_data['deln'] = $this->input->post('val');
            }
            if ($row['addcn'] == 1) {
                $delete_data['addcn'] = $this->input->post('val');
                $delete_data['editcn'] = $this->input->post('val');
                $delete_data['catn'] = $this->input->post('val');
                $delete_data['delcn'] = $this->input->post('val');
            }
            if ($row['addg'] == 1) {
                $delete_data['addg'] = $this->input->post('val');
                $delete_data['editg'] = $this->input->post('val');
                $delete_data['listg'] = $this->input->post('val');
                $delete_data['delg'] = $this->input->post('val');
            }
            if ($row['addcg'] == 1) {
                $delete_data['addcg'] = $this->input->post('val');
                $delete_data['editcg'] = $this->input->post('val');
                $delete_data['catg'] = $this->input->post('val');
                $delete_data['delcg'] = $this->input->post('val');
            }
            if ($row['addtest'] == 1) {
                $delete_data['addtest'] = $this->input->post('val');
                $delete_data['edittest'] = $this->input->post('val');
                $delete_data['listest'] = $this->input->post('val');
                $delete_data['deltest'] = $this->input->post('val');
            }
            if ($row['addct'] == 1) {
                $delete_data['addct'] = $this->input->post('val');
                $delete_data['editct'] = $this->input->post('val');
                $delete_data['listct'] = $this->input->post('val');
                $delete_data['delct'] = $this->input->post('val');
            }
            if ($row['addpd'] == 1) {
                $delete_data['addpd'] = $this->input->post('val');
                $delete_data['editpd'] = $this->input->post('val');
                $delete_data['listpd'] = $this->input->post('val');
                $delete_data['delpd'] = $this->input->post('val');
            }
            if ($row['addt'] == 1) {
                $delete_data['addt'] = $this->input->post('val');
                $delete_data['editt'] = $this->input->post('val');
                $delete_data['listt'] = $this->input->post('val');
                $delete_data['delt'] = $this->input->post('val');
            }
            if ($row['addlink'] == 1) {
                $delete_data['addlink'] = $this->input->post('val');
                $delete_data['editlink'] = $this->input->post('val');
                $delete_data['link'] = $this->input->post('val');
                $delete_data['dellink'] = $this->input->post('val');
            }
            $delete_data['allpri'] = $this->input->post('val');
            $this->common->update_table('privilege', $delete_data, $id);
            $array = array(
                'success' => 'Privileges updated for all pages .'
            );
            echo json_encode($array);
        endforeach;
    }

    public function fetch_rolelist(){
        $this->db->select('*');
        $this->db->from('admin_panel_roles');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $count;
            $sub_array[] = $row->role;
            $sub_array[] = date("d-m-Y", strtotime($row->createdDate));
            $sub_array[]  ='<div class="btn-group align-items-center" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-info btn-actions btn-sm fetch-role" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>
                                <button type="button" class="btn btn-info btn-actions btn-sm delete-role"  data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="DELETE" data-bs-placement="top"><i class="far fa-trash-alt font-14"></i></button>
                                <div>
                                    <a href="edit-privilege/'.$this->common->selectivename2($row->role, 'id', 'privilege', 'user_id').'" class="theme-text-color">
                                        Set Privileges
                                    </a>
                                </div>
                            </div>';       
            $data[] = $sub_array;

            $count++;
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }

    public function fetch_subadminlist(){
        $this->db->select('*');
        $this->db->where('id','1');
        $this->db->from('user_login');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = $count;
            $sub_array[] = $row->name;
            $sub_array[] = $row->role;
            $status ='';
            $status .='<label class="switch switch-success">';
            if ($row->status == 1) {
            $status .='<input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-subadmin"  />
                        <span class="switch-toggle-slider">
                            <span class="switch-on">
                                <i class="bx bx-check"></i>
                            </span>
                        </span>';
            } elseif ($row->status == 0) {
            $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-subadmin"  />
                        <span class="switch-toggle-slider">
                            <span class="switch-off">
                                <i class="bx bx-x" style="color:red;"></i>
                            </span>
                        </span>';
            }
            $status .='</label>';
            $sub_array[] = $status;      
            $sub_array[] = date("d-m-Y", strtotime($row->createdDate));
            $sub_array[]  ='<div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-info btn-actions btn-sm" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Edit" href="edit-subadmin/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
                                <button type="button" class="btn btn-info btn-actions btn-sm delete-subadmin" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" Parker data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>
                            </div>';       
            $data[] = $sub_array;

            $count++;
        }
        $output = array(
            "data" => $data
        );
        echo json_encode($output);
    }
}

?>