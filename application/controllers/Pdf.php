<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

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
        $data['page_name'] = 'Add Pdf';
        $this->index->activity_log('Add Pdf');
        $data['content_view'] = 'Pdf/add_pdf';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();
        $this->load->view('admin_template', $data);
    }

//Pdf Functionality

    public function add_pdf() {
        $this->index->activity_log('Add Pdf');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        if (empty($_FILES['pdf']['name'])) {
            $this->form_validation->set_rules('pdf', 'Pdf', 'required');
        }
        if ($this->form_validation->run()) {
        $insert_data = array(
            'status' => '1',
            'createdDate' => DATE, 
            'createdBy' => $this->session->userdata('user_id'),
            'name' => $this->input->post('name'),
        );

        $extensionResume = array("pdf");

        if (isset($_FILES['pdf']) && $_FILES['pdf']['name'] != "") {
            $extId = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId, $extensionResume) && (!empty($_FILES["pdf"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg,webp Format For Feature Image');
                redirect('add-client');
            }
            if (($_FILES['pdf']['size'] >= $maxsize) || ($_FILES["pdf"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
                redirect('add-client');
            }

            $image_data = $_FILES['pdf'];
            $path = './uploads/pdf/';
            $file_path_image = base_url() . 'uploads/pdf/';
            $image = $this->common->upload_image($image_data, 1, $path);
            $insert_data['pdf'] = $image;
            $insert_data['pdf_url'] = $file_path_image . $image;
        }

        $id = $this->common->insert_table('pdf', $insert_data);
        if ($id) {
            $array = array(
                'success' => 'Pdf added successfully.'
            );
        }
    }else{
        $array = array(
            'error' => true,
            'name_error' => form_error('name'),
            'pdf_error' => form_error('pdf')
        );
    }

        echo json_encode($array);
    }

    public function pdf_list() {
        $data['page_name'] = 'Pdf List';
        $this->index->activity_log('Pdf List');
        $data['pdf_list'] = $this->common->list('pdf');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Pdf/pdf_list';
        $this->load->view('admin_template', $data);
    }

    public function editpdf($id) {
       
        if ($id == 'editpdf') {
            $this->index->activity_log('Add Pdf');
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            
            if ($this->form_validation->run()) {
           
                $id = $this->input->post('id');
 
                $update_data['createdBy'] = $this->session->userdata('user_id');
                $update_data['createdDate'] =DATE;
                $update_data['name']= $this->input->post('name');
                 $extensionResume = array("pdf");

        if (isset($_FILES['pdf']) && $_FILES['pdf']['name'] != "") {
            $extId = pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION);
            $errors = array();
            $maxsize = 26214400;
            if (!in_array($extId, $extensionResume) && (!empty($_FILES["pdf"]["type"]))) {
                $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg,webp Format For Feature Image');
                redirect('add-client');
            }
            if (($_FILES['pdf']['size'] >= $maxsize) || ($_FILES["pdf"]["size"] == 0)) {
                $this->session->set_flashdata('error', 'Image Size Too Large');
                redirect('add-client');
            }

            $image_data = $_FILES['pdf'];
            $path = './uploads/pdf/';
            $file_path_image = base_url() . 'uploads/pdf/';
            $image = $this->common->upload_image($image_data, 1, $path);
            $update_data['pdf'] = $image;
            $update_data['pdf_url'] = $file_path_image . $image;

            $query = $this->common->un($id,'pdf');
            $row = $query->row();
            $img = $row->pdf ;

            if(file_exists("uploads/pdf/".$img)){
                unlink("uploads/pdf/".$img);
            }
        }

                $this->common->update_table('pdf', $update_data, $id);
                $array = array(
                    'success' => 'Pdf updated successfully.'
                );
            }else{
                $array = array(
                    'error' => true,
                    'name1_error' => form_error('name'),
                    'pdf1_error' => form_error('pdf')
                );
            }
            echo json_encode($array);
        } else {
            $data['page_name'] = 'Edit Pdf';
            $data['edit_details'] = $this->common->view('pdf', $id);
            $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();
            $this->index->activity_log('Pdf Edit');
            $data['content_view'] = 'Pdf/edit_pdf';
            $this->load->view('admin_template', $data);
        }
    }

    public function delete_pdf() {
        $this->index->activity_log('Pdf Delete');
        $id = $this->input->post('id');

        $query = $this->common->un($id,'pdf');
        $row = $query->row();
        $img = $row->pdf ;

        if(file_exists("uploads/pdf/".$img)){
           unlink("uploads/pdf/".$img);
        }

        $this->common->delete_table('pdf', $id);
        $array = array(
            'success' => 'Pdf deleted successfully.'
        );
        echo json_encode($array);
    }

    public function fetch_seqpdf() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'pdf');
            echo json_encode($data);
        }
    }

    public function edit_seqpdf() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('pdf', $update_data, $id);

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
    public function status_pdf() {
        $this->index->activity_log('Pdf Status');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('pdf', $delete_data, $id);
        $array = array(
            'success' => 'Pdf status updated successfully.'
        );
        echo json_encode($array);
    }

    public function fetch_pdflist(){
        $this->db->select('*');
        $this->db->from('pdf');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $row->name;
            $sub_array[] = '<a href="'.base_url().'uploads/pdf/'.$row->id.'>" target="_blank" >DOWNLOAD</a>';

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input  status-pdf"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input  status-pdf"  />
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
                    $res = $this->common->eachcheckpri('editpd', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delpd', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-pdf/'.$row->id.'"><i class="far fa-edit font-14"></i></a>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-pdf"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete gallery"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-pdf/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-pdf"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete gallery"></i></button>';
            } 
                        
            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-seqpdf" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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