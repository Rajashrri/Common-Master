<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Testinomial extends CI_Controller {

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
        $data['page_name'] = 'Add Testimonials';
        $this->index->activity_log('Add Testimonials');
        $data['content_view'] = 'Testimonial/add_testimonials';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $this->load->view('admin_template', $data);
    }

//Testinomials Functionality


    public function upload1() {
        if ($_FILES["upload"]['name'] == '') {
            $this->form_validation->set_rules('featured_image', 'featured_image ', 'trim|required');
        } else {
            if (isset($_FILES['upload']['name'])) {
                $file = $_FILES['upload']['tmp_name'];
                $file_name = $_FILES['upload']['name'];
                $file_name_array = explode(".", $file_name);
                $extension = end($file_name_array);
                $new_image_name = rand() . '.' . $extension;
                chmod('upload', 0777);
                $allowed_extension = array("jpg","jpeg", "gif", "png");
                if (in_array($extension, $allowed_extension)) {
                    move_uploaded_file($file, './upload1/' . $new_image_name);
                    $function_number = $_GET['CKEditorFuncNum'];
                    $url = base_url() . 'upload1/' . $new_image_name;
                    $message = '';
                    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
                }
            }
        }
    }
    public function fetch_seqtest() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'testimonial');
            echo json_encode($data);
        }
    }

    public function edit_seqtest() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('testimonial', $update_data, $id);

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
    public function insert_testimonials() {


        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('shortinfo', 'Feebback', 'trim|required');

        if ($this->form_validation->run()) {

            $insert_data = array(
                'name' => $this->input->post('name'),
                'designation' => $this->input->post('designation'),
                'shortinfo' => $this->input->post('shortinfo'),
                // 'url' => str_replace(' ', '-', strtolower($this->input->post('blogtitle'))),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

            if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                $extId = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId, $extensionResume) && (!empty($_FILES["image"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                    redirect('add-client');
                }
                if (($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                    redirect('add-client');
                }

                $image_data = $_FILES['image'];
                $path = './uploads/testimonials/';
                $file_path_image = base_url() . 'uploads/testimonials/';
                $image = $this->common->upload_image($image_data, 1, $path);
                $insert_data['image'] = $image;
                $insert_data['image_url'] = $file_path_image . $image;
            }
            $id = $this->common->insert_table('testimonial', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'Testimonials added successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'name_error' => form_error('name'),
                'shortinfo_error' => form_error('shortinfo'),
            );
        }
        echo json_encode($array);
    }

    public function testimonial_list() {
        $this->index->activity_log('Testimonial List');

        $data['page_name'] = 'Testimonial List';
        $data['testimonial_list'] = $this->common->list('testimonial');
        $data['content_view'] = 'Testimonial/testimonials_list';
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $this->load->view('admin_template', $data);
    }

    public function edit_testimonial($id) {
        if ($id == 'edittestimonial') {
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('shortinfo', 'Feebback', 'trim|required');

            if ($this->form_validation->run()) {


                $id = $this->input->post('id');

                $update_data['name'] = $this->input->post('name');
                $update_data['designation'] = $this->input->post('designation');
                $update_data['shortinfo'] = $this->input->post('shortinfo');
               

                $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

                if (isset($_FILES['image']) && $_FILES['image']['name'] != "") {
                    $extId = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                    $errors = array();
                    $maxsize = 26214400;
                    if (!in_array($extId, $extensionResume) && (!empty($_FILES["image"]["type"]))) {
                        $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                        redirect('add-client');
                    }
                    if (($_FILES['image']['size'] >= $maxsize) || ($_FILES["image"]["size"] == 0)) {
                        $this->session->set_flashdata('error', 'Image Size Too Large');
                        redirect('add-client');
                    }

                    $image_data = $_FILES['image'];
                    $path = './uploads/testimonials/';
                    $file_path_image = base_url() . 'uploads/testimonials/';
                    $image = $this->common->upload_image($image_data, 1, $path);
                    $update_data['image'] = $image;
                    $update_data['image_url'] = $file_path_image . $image;

                    $query = $this->common->un($id,'testimonial');
                    $row = $query->row();
                    $img = $row->image ;

                    if(file_exists("uploads/testimonials/".$img)){
                        unlink("uploads/testimonials/".$img);
                    }
                }
                $this->common->update_table('testimonial', $update_data, $id);
                if($this->db->affected_rows()== 0){
                    $array = array(
                        'warning' => 'You have made no changes.'
                    );
                }else{
                    $update_data['createdBy'] = $this->session->userdata('user_id');
                    $update_data['createdDate'] = DATE;
                    $this->common->update_table('testimonial', $update_data, $id);
                $array = array(
                    'success' => 'Testimonial updated successfully.'
                );
            }
            } else {
                $array = array(
                    'error' => true,
                    'nametest_error' => form_error('name'),
                    'shortinfotest_error' => form_error('shortinfo')
                );
            }
            echo json_encode($array);
        } else {
            $data['page_name'] = 'Edit Testimonial';
            $this->index->activity_log('Edit Testimonials');
            $data['edit_details'] = $this->common->view('testimonial', $id);
            $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();

            $data['content_view'] = 'Testimonial/edit_testimonial';

            $this->load->view('admin_template', $data);
        }
    }

    public function fetch_test() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'testimonial');
            echo json_encode($data);
        }
    }

    public function delete_testimonial() {
      
        $this->index->activity_log('Delete Testimonial');

        $id = $this->input->post('id');

        $query = $this->common->un($id,'testimonial');
        $row = $query->row();
        $img = $row->image ;
  
        if(file_exists("uploads/testimonials/".$img)){
           unlink("uploads/testimonials/".$img);
        }

        $this->common->delete_table('testimonial', $id);
        $array = array(
            'success' => 'Testimonial deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_testimonial() {
        $this->index->activity_log('Status Testimonial');

        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('testimonial', $delete_data, $id);
        $array = array(
            'success' => 'Testimonial status updated successfully.'
        );
        echo json_encode($array);
    }

    public function fetch_testimoniallist(){
        $this->db->select('*');
        $this->db->from('testimonial');
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
            $sub_array[] = '<button type="button" class="btn btn-primary btn-xs fetch-test" data-id='.$row->id.'" data-bs-toggle="modal" data-bs-target="#basicModal">View</button>';

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-testimonial"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-testimonial"  />
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
                    $res = $this->common->eachcheckpri('edittest', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('deltest', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-testimonial/'.$row->id.'"><i class="far fa-edit font-14"></i></a>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-testimonial"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete testimonial"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-testimonial/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-testimonial"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete testimonial"></i></button>';
            } 
            
            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-test" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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
