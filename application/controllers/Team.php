<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Index_model', 'index');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->index->activity_update();

  $this->login->is_logged_in();
    }

    public function index() {
        $data['page_name'] = 'Add Team';
        $this->index->activity_log('Add Team');
        $data['content_view'] = 'Team/add_team';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $this->load->view('admin_template', $data);
    }
    public function fetch_seqteam() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'team');
            echo json_encode($data);
        }
    }

    public function edit_seqteam() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('team', $update_data, $id);

            $array = array(
                'success' => 'Sequence updated successfully.'
            );
        } else {
            $array = array(
                'error' => true,
                'seq_error' => form_error('seq_id')
            );
        }
        echo json_encode($array);
    }
//Team Functionality



    public function insert_team() {


        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('briefintro', 'Brief Intro', 'trim|required');
        $this->form_validation->set_rules('designation', 'Designation', 'trim|required');

        if ($this->form_validation->run()) {

            $insert_data = array(
                'name' => $this->input->post('name'),
                'designation' => $this->input->post('designation'),
                'briefintro' => $this->input->post('briefintro'),
                'url' => str_replace(' ', '-', strtolower($this->input->post('name'))),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

            if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
                $extId = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId, $extensionResume) && (!empty($_FILES["featured_image"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                    redirect('add-client');
                }
                if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                    redirect('add-client');
                }

                $image_data = $_FILES['featured_image'];
                $path = './uploads/team/';
                $file_path_image = base_url() . 'uploads/team/';
                $image = $this->common->upload_image($image_data, 1, $path);
                $insert_data['featured_image'] = $image;
                $insert_data['featured_imageurl'] = $file_path_image . $image;
            }
            $id = $this->common->insert_table('team', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'Team added successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'name_error' => form_error('name'),
                'shortinfo_error' => form_error('briefintro'),
                'designation_error' => form_error('designation')
            );
        }
        echo json_encode($array);
    }

    public function team_list() {

        $data['page_name'] = 'Team List';
        $this->index->activity_log('Team List');
        $data['team_list'] = $this->common->list('team');
        $data['content_view'] = 'Team/team_list';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $this->load->view('admin_template', $data);
    }

    public function edit_team($id) {
        if ($id == 'editteam') {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('briefintro', 'Brief Intro', 'trim|required');
            $this->form_validation->set_rules('designation', 'Designation', 'trim|required');

            if ($this->form_validation->run()) {


                $id = $this->input->post('id');

                $update_data['name'] = $this->input->post('name');
                $update_data['designation'] = $this->input->post('designation');
                $update_data['briefintro'] = $this->input->post('briefintro');
               

                $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

                if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
                    $extId = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
                    $errors = array();
                    $maxsize = 26214400;
                    if (!in_array($extId, $extensionResume) && (!empty($_FILES["featured_image"]["type"]))) {
                        $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                        redirect('add-client');
                    }
                    if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {
                        $this->session->set_flashdata('error', 'Image Size Too Large');
                        redirect('add-client');
                    }

                    $image_data = $_FILES['featured_image'];
                    $path = './uploads/team/';
                    $file_path_image = base_url() . 'uploads/team/';
                    $image = $this->common->upload_image($image_data, 1, $path);
                    $update_data['featured_image'] = $image;
                    $update_data['featured_imageurl'] = $file_path_image . $image;

                    $query = $this->common->un($id,'team');
                    $row = $query->row();
                    $img = $row->featured_image ;

                    if(file_exists("uploads/team/".$img)){
                        unlink("uploads/team/".$img);
                    }
                }
                $this->common->update_table('team', $update_data, $id);
                if($this->db->affected_rows() == 0){
                    $array = array(
                        'warning' => 'You have made no changes.'
                    );
                }else{
                    $update_data['createdBy'] = $this->session->userdata('user_id');
                    $update_data['createdDate'] = DATE;
                    $this->common->update_table('team', $update_data, $id);
                $array = array(
                    'success' => 'Team data successfully.'
                );
                }
            } else {
                $array = array(
                    'error' => true,
                    'nameteam_error' => form_error('name'),
                    'desoteam_error' => form_error('designation'),
                    'shortinfoteam_error' => form_error('briefintro')
                );
            }
            echo json_encode($array);
        } else {
            $data['page_name'] = 'Edit Team';
            $this->index->activity_log('Edit Team');
            $data['edit_details'] = $this->common->view('team', $id);
            $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();

            $data['content_view'] = 'Team/edit_team';

            $this->load->view('admin_template', $data);
        }
    }

    public function fetch_team() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'team');
            echo json_encode($data);
        }
    }

    public function delete_team() {

        $this->index->activity_log('Delete Team');
        $id = $this->input->post('id');

        $query = $this->common->un($id,'team');
        $row = $query->row();
        $img = $row->featured_image ;
  
        if(file_exists("uploads/team/".$img)){
           unlink("uploads/team/".$img);
        }

        $this->common->delete_table('team', $id);
        $array = array(
            'success' => 'Team deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_team() {
        $this->index->activity_log('Status Team');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('team', $delete_data, $id);
        $array = array(
            'success' => 'Team status updated successfully.'
        );
        echo json_encode($array);
    }

    public function fetch_teamlist(){
        $this->db->select('*');
        $this->db->from('team');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $row->name;
            $sub_array[] = $row->designation;
            $sub_array[] = '<button type="button" class="btn btn-primary btn-xs fetch-team" data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#basicModal">View</button>';

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-team"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-team"  />
                            <span class="switch-toggle-slider">
                                <span class="switch-off">
                                    <i class="bx bx-x" style="color:red;"></i>
                                </span>
                            </span>';
            }
            $status .='</label>';
            $sub_array[] = $status;
        
            $sub_array[] = date("d-m-Y", strtotime($row->createdDate));

            $action ='<div class="btn-group" role="group" aria-label="Basic example">';
            $rrr = $this->common->subside($this->session->userdata('user_id'));
            if ($rrr->num_rows() > 0) {
                    $res = $this->common->eachcheckpri('editt', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delt', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-team/'.$row->id.'"><i class="far fa-edit font-14"></i></a>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-team"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete team"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-team/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-team"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete team"></i></button>';
            } 
            
            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-team" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
            } 
            
            $sub_array[]  =  $action;       
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
