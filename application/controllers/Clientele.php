<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Clientele extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model', 'login');
        $this->load->model('Index_model', 'index');
        $this->load->model('Common_model', 'common');
        $this->load->model('Profile_model', 'pro');
        $this->login->is_logged_in();
        $this->index->activity_update();
    }

    public function index() {
        $data['page_name'] = 'Add Clientele';
        $this->index->activity_log('Add Clientele');
        $data['content_view'] = 'clientele/add_clientele';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
         $data['user_detail'] = $this->common->view1();
         $data['user_detail'] = $this->common->view1();
        $this->load->view('admin_template', $data);
    }
    public function fetch_seqcli() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'clientele');
            echo json_encode($data);
        }
    }

    public function edit_seqcli() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('clientele', $update_data, $id);

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
//Clientele Functionality

    public function add_client() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if (empty($_FILES['image']['name'])) {
            $this->form_validation->set_rules('image', 'Image', 'required');
        }

        if ($this->form_validation->run()) {
            $insert_data = array(
                'name' => $this->input->post('name'),
                'url' => $this->common->cleanStr($this->input->post('name')),
                'status' => '1',
                'createdDate' => DATE
            );

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp");

            if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                $extId = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId, $extensionResume) && (!empty($_FILES["image"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg,webp Format For Feature Image');
                    redirect('add-client');
                }
                if (($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                    redirect('add-client');
                }

                $image_data = $_FILES['image'];
                $path = './uploads/client/';
                $file_path_image = base_url() . 'uploads/client/';
                $image = $this->common->upload_image($image_data, 1, $path);
                $insert_data['image'] = $image;
                $insert_data['image_url'] = $file_path_image . $image;
            }

            $id = $this->common->insert_table('clientele', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'Clientele  Added successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'name_error' => form_error('name'),
                'clientimg_error' => form_error('image'),
            );
        }
        echo json_encode($array);
    }

    public function client_list() {
        $data['page_name'] = 'Clientele List';
        $this->index->activity_log('Clientele list');
        $data['client_list'] = $this->common->list('clientele');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
         $data['user_detail'] = $this->common->view1();


        $data['content_view'] = 'clientele/clientele_list';
        $this->load->view('admin_template', $data);
    }

    public function editclient($id) {
        if ($id == 'editclient') {
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');

            if ($this->form_validation->run()) {
                $id = $this->input->post('id');

                $update_data['name'] = $this->input->post('name');
                $update_data['url'] = $this->common->cleanStr($this->input->post('name'));

                $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp");
                if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    $extId = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $errors = array();
                    $maxsize = 26214400;
                    if (!in_array($extId, $extensionResume) && (!empty($_FILES["image"]["type"]))) {
                        $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg,webp Format For Feature Image');
                    }
                    if (($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {
                        $this->session->set_flashdata('error', 'Image Size Too Large');
                        redirect('add-client');
                    }

                    $image_data = $_FILES['image'];
                    $path = './uploads/client/';
                    $file_path_image = base_url() . 'uploads/client/';
                    $image = $this->common->upload_image($image_data, 1, $path);
                    $update_data['image'] = $image;
                    $update_data['image_url'] = $file_path_image . $image;

                    $query = $this->common->un($id,'clientele');
                    $row = $query->row();
                    $img = $row->image ;

                    if(file_exists("uploads/client/".$img)){
                        unlink("uploads/client/".$img);
                    }
                }
                $this->common->update_table('clientele', $update_data, $id);
                if($this->db->affected_rows() == 0){
                    $array = array(
                        'warning' => 'You have made no changes.'
                    );
                }else{
                $array = array(
                    'success' => 'Clientele Updated successfully.'
                );
            }
            } else {
                $array = array(
                    'error' => true,
                    'name1_error' => form_error('name'),
                );
            }
            echo json_encode($array);
        } else {
            $data['page_name'] = 'Edit Clientele';
            $this->index->activity_log('Edit Clientele');
            $data['edit_details'] = $this->common->view('clientele', $id);
            $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
             $data['user_detail'] = $this->common->view1();
            $data['content_view'] = 'clientele/edit_clientele';
            $this->load->view('admin_template', $data);
        }
    }

    public function delete_client() {
        $this->index->activity_log('Delete Clientele');
        $id = $this->input->post('id');

        $query = $this->common->un($id,'clientele');
        $row = $query->row();
        $img = $row->image ;
    
        if(file_exists("uploads/client/".$img)){
           unlink("uploads/client/".$img);
        }
     
        $this->common->delete_table('clientele', $id);
        $array = array(
            'success' => 'Clientele Deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_client() {
        $this->index->activity_log('Status Clientele');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('clientele', $delete_data, $id);
        $array = array(
            'success' => 'Clientele Status Updated successfully.'
        );
        echo json_encode($array);
    }

    public function fetch_clientlist(){
        $this->db->select('*');
        $this->db->from('clientele');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $row->name;
            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-client"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-client"  />
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
                    $res = $this->common->eachcheckpri('editct', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delct', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-clientele/'.$row->id.'"><i class="far fa-edit font-14"></i></a>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-client"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete clientele"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-clientele/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-client"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete clientele"></i></button>';
            } 
            
            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-seqcli" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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