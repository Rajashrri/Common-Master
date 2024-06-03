<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Link extends CI_Controller {

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
        $data['page_name'] = 'Link List';
        $this->index->activity_log('Link list');
        $data['link_list'] = $this->common->list('link');
        $data['user_detail'] = $this->common->view1();
        $data['content_view'] = 'Link/link_list';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $this->load->view('admin_template', $data);
    }
    public function fetch_seqlink() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'link');
            echo json_encode($data);
        }
    }

    public function edit_seqlink() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('link', $update_data, $id);

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
//GallaryFunctionality

    public function add_link() {
        $this->index->activity_log('link Add');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Title', 'trim|required');
        $this->form_validation->set_rules('link', 'link', 'trim|required');

        if ($this->form_validation->run()) {
            $insert_data = array(
                'name' => $this->input->post('name'),
                'link' => $this->input->post('link'),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );
            $id = $this->common->insert_table('link', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'link added successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'title_error' => form_error('name'),
                'name_error' => form_error('link'),
            );
        }
        echo json_encode($array);
    }

    public function fetch_link() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'link');
            echo json_encode($data);
        }
    }

    public function edit_link() {
        $this->index->activity_log('Edit Link');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Title', 'trim|required');
        $this->form_validation->set_rules('link', 'link', 'trim|required');
        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'name' => $this->input->post('name'),
                'link' => $this->input->post('link'),
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );
            $this->common->update_table('link', $update_data, $id);
            $array = array(
                'success' => 'link updated successfully.'
            );
        } else {
            $array = array(
                'error' => true,
                'title11_error' => form_error('name'),
                'name11_error' => form_error('link')
            );
        }
        echo json_encode($array);
    }

    public function delete_link() {
        $this->index->activity_log('Link Delete');
        $id = $this->input->post('id');

        $this->common->delete_table('link', $id);
        $array = array(
            'success' => 'link deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_link() {
        $this->index->activity_log('Link Status');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('link', $delete_data, $id);
        $array = array(
            'success' => 'link status updated successfully.'
        );
        echo json_encode($array);
    }

    public function fetch_linklist(){
        $this->db->select('*');
        $this->db->from('link');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $row->name;
            $sub_array[] = $row->link;

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input  status-link"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input  status-link"  />
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
                    $res = $this->common->eachcheckpri('editlink', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('dellink', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<button type="button" class="btn btn-info btn-actions btn-sm fetch-link" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editauthor" title="Edit"><i class="far fa-edit font-14"><span class="stretched-link" data-bs-toggle="modal" data-bs-target="#editauthor"></span></i></button>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" class="btn btn-info btn-actions btn-sm delete-link" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<button type="button" class="btn btn-info btn-actions btn-sm fetch-link" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  data-id="'.$row->id.'" data-bs-toggle="modal" data-bs-target="#editauthor" title="Edit"><i class="far fa-edit font-14"><span class="stretched-link" data-bs-toggle="modal" data-bs-target="#editauthor"></span></i></button>
                        <button type="button" class="btn btn-info btn-actions btn-sm delete-link" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
            } 
                        
            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-seqlink" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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
