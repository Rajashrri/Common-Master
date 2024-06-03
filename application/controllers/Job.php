<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {

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
        $data['page_name'] = 'Job Category List';
        $this->index->activity_log('Job Category List');
        $data['jobcategory_list'] = $this->common->list('job_category');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Job/jobcategory_list';
        $this->load->view('admin_template', $data);
    }

    public function featured_job() {
        $id = $this->input->post('id');
        $this->index->activity_log('Job Featured');
        $delete_data = array(
            'alt_features' => $this->input->post('status_id'),
        );
        $this->job->update_table('job', $delete_data, $id);

        $array = array(
            'success' => 'Job featured status updated successfully.'
        );
        echo json_encode($array);
    }
 

    public function edit_seqjobcat() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('job_category', $update_data, $id);

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


    public function fetch_seqjob() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'job');
            echo json_encode($data);
        }
    }

    public function edit_seqjob() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('job', $update_data, $id);

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
    //job category

    public function jobcategory_list() {
        $data['page_name'] = 'Job Category List';
        $this->index->activity_log('Job Category List');
        $data['jobcategory_list'] = $this->common->list('job_category');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Job/jobcategory_list';
        $this->load->view('admin_template', $data);
    }

    public function add_jobcategory() {
        $this->index->activity_log('Add Job Category');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'job category Name', 'trim|required|is_unique[job_category.category_name]', array('is_unique' => 'This %s already exists.'));
        if ($this->form_validation->run()) {
            $insert_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => str_replace(' ', '-', strtolower($this->input->post('category_name'))),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );
            $id = $this->common->insert_table('job_category', $insert_data);

            if ($id) {

                $array = array(
                    'success' => 'Job Category added successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'categoryname_error' => form_error('category_name')
            );
        }
        echo json_encode($array);
    }

    public function fetch_jobcategory() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'job_category');
            echo json_encode($data);
        }
    }

    function check_order_no($order_no) {
        if ($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->common->check_unique_order_no($order_no, 'job_category', 'category_name', $id);
        if ($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_order_no', 'Category Name  already exist');
            $response = false;
        }
        return $response;
    }

    public function edit_jobcategory() {
        $id = $this->input->post('id');
        $this->index->activity_log('Edit Job Category');
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'category Name', 'required|callback_check_order_no');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => str_replace(' ', '-', strtolower($this->input->post('category_name'))),
            );
            $this->common->update_table('job_category', $update_data, $id);
            if ($this->db->affected_rows() == 0) {
                $array = array(
                    'warning' => 'You have made no changes..'
                );
            } else {
                $update_data['createdDate'] = DATE;
                $this->common->update_table('job_category', $update_data, $id);
                $array = array(
                    'success' => 'Job Category updated successfully.'
                );
            }
        } else {
            $array = array(
                'error' => true,
                'category_error' => form_error('category_name')
            );
        }
        echo json_encode($array);
    }

    public function delete_jobcategory() {

        $this->index->activity_log('Delete Job Category');
        $id = $this->input->post('id');

        $this->common->delete_table('job_category', $id);
        $this->common->delete_table1('job', 'category_id', $id);

        $array = array(
            'success' => 'Jobcategory deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_jobcategory() {
        $this->index->activity_log('Status Job Category');
        $id = $this->input->post('id');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('job_category', $delete_data, $id);
        $this->common->update_table1('job', $delete_data, 'category_id', $id);
        $array = array(
            'success' => 'Job Category status updated successfully.'
        );
        echo json_encode($array);
    }

    // Job Functionality

    public function addjob() {
        $data['page_name'] = 'Add Job';
        $this->index->activity_log('Add Job');
        $data['job_list'] = $this->common->list('job');
        $data['jobcategory_list'] = $this->common->list1('job_category', 'status', '1');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Job/addjob';
        $this->load->view('admin_template', $data);
    }

    public function job_list() {
        $data['page_name'] = 'Job List';
        $this->index->activity_log('Job List');
        $data['job_list'] = $this->common->list('job');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Job/job_list';
        $this->load->view('admin_template', $data);
    }

    public function upload() {
        $config['upload_path'] = './upload';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 1024;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('upload')) {
            echo json_encode(array('error' => $this->upload->display_errors()));
        } else {
            $upload_data = $this->upload->data();
            $url = base_url() . 'upload/' . $upload_data['file_name'];
            $message = '';
            $function_number = $this->input->get('CKEditorFuncNum');
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        }
    }

//ADD BLOG
    public function insert_job() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_id', 'category_id', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('designation', 'designation', 'trim|required');
        $this->form_validation->set_rules('shortdescription', 'shortdescription', 'trim|required');
        $this->form_validation->set_rules('experience', 'experience', 'trim|required');
        $this->form_validation->set_rules('salary', 'salary', 'trim|required');

        if ($this->form_validation->run()) {
            $this->index->activity_log('Add Job');
            $insert_data = array(
                'category_id' => $this->input->post('category_id'),
                'title' => $this->input->post('title'),
                'designation' => $this->input->post('designation'),
                'salary' => $this->input->post('salary'),
                'experience' => $this->input->post('experience'),
                'shortdescription' => $this->input->post('shortdescription'),
                'description' => $this->input->post('description'),
                'status' => '1',
                'url' => $this->common->cleanStr($this->input->post('title')),
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

            if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
                $extId2 = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId2, $extensionResume) && (!empty($_FILES["featured_image"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }
                if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }

                $image_data = $_FILES['featured_image'];
                $path = './uploads/job/';
                $file_path_image = base_url() . 'uploads/job/';
                $image = $this->common->upload_image($image_data, 2, $path);
                $insert_data['featured_image'] = $image;
                $insert_data['featured_image_url'] = $file_path_image . $image;
            }


//insert data into database table.  
            $id = $this->common->insert_table('job', $insert_data);
            $lid = $this->db->insert_id();

            $url = array(
                'column_id' => $lid,
                'type' => 'job',
                'old_url' => '',
                'new_url' => $this->common->cleanStr($this->input->post('title')),
            );

            $this->common->insert_table('url_redirections', $url);
            if ($id) {
                $this->session->set_flashdata('success', 'Job added successfully.');
                redirect("add-job");
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong');
            redirect("add-job");
        }
    }

    public function edit_job($id) {

        $data['page_name'] = 'Edit Job';
        $this->index->activity_log('Edit Job');
        $data['edit_details'] = $this->common->view('job', $id);
        $data['jobcategory_list'] = $this->common->list1('job_category', 'status', '1');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Job/editjob';
        $this->load->view('admin_template', $data);
    }

    public function editjob() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_id', 'category_id', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('designation', 'designation', 'trim|required');
        $this->form_validation->set_rules('shortdescription', 'shortdescription', 'trim|required');
        $this->form_validation->set_rules('experience', 'experience', 'trim|required');
        $this->form_validation->set_rules('salary', 'salary', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');

            $update_data = array(
                'category_id' => $this->input->post('category_id'),
                'title' => $this->input->post('title'),
                'url' => $this->common->cleanStr($this->input->post('title')),
                'designation' => $this->input->post('designation'),
                'salary' => $this->input->post('salary'),
                'experience' => $this->input->post('experience'),
                'shortdescription' => $this->input->post('shortdescription'),
                'description' => $this->input->post('description'),
            );

            $extensionResume = array("jpg", "jpeg", "JPG", "JPEG", "webp", "WEBP");

            if (isset($_FILES['featured_image']) && $_FILES['featured_image']['name'] != "") {
                $extId2 = pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION);
                $errors = array();
                $maxsize = 26214400;
                if (!in_array($extId2, $extensionResume) && (!empty($_FILES["featured_image"]["type"]))) {
                    $this->session->set_flashdata('error', 'Please Use only Jpg,Jpeg Format For Feature Image');
                }
                if (($_FILES['featured_image']['size'] >= $maxsize) || ($_FILES["featured_image"]["size"] == 0)) {
                    $this->session->set_flashdata('error', 'Image Size Too Large');
                }

                $image_data = $_FILES['featured_image'];
                $path = './uploads/job/';
                $file_path_image = base_url() . 'uploads/job/';
                $image = $this->common->upload_image($image_data, 2, $path);
                $update_data['featured_image'] = $image;
                $update_data['featured_image_url'] = $file_path_image . $image;

                $query = $this->common->un($id,'job');
                $row = $query->row();
                $img = $row->featured_image ;

                if(file_exists("uploads/job/".$img)){
                    unlink("uploads/job/".$img);
                }
            }

            $this->common->update_table('job', $update_data, $id);
            $ab = $this->db->affected_rows();

            
       
            
            $bb = $this->common->cleanStr($this->input->post('title'));
            $this->db->select('*');
            $this->db->where('column_id', $id);
            $this->db->where('type', 'job');

            $this->db->from('url_redirections');
            $query = $this->db->get();
            $row = $query->row();
            if ($row->new_url != $bb) {
                $url = array(
                    'old_url' => $row->new_url,
                    'new_url' => $bb,
                );
                $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'job');
            }
            if ($ab == 0) {
                $this->session->set_flashdata('warning', 'You have made no changes.');
                redirect("edit-job/" . $id);
            } else {
                $update_data['createdDate'] = DATE;
                $this->common->update_table('job', $update_data, $id);
                $this->session->set_flashdata('success', 'Job updated successfully !!!!! ');
                redirect("edit-job/" . $id);
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong');
            redirect("edit-job/" . $id);
        }
    }

    public function fetch_job() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'job');
            echo json_encode($data);
        }
    }

    public function delete_job() {

        $this->index->activity_log('Job Delete');
        $id = $this->input->post('id');

        $query = $this->common->un($id,'job');
        $row = $query->row();
        $img = $row->featured_image ;
  
        if(file_exists("uploads/job/".$img)){
           unlink("uploads/job/".$img);
        }
        

        $this->common->delete_table('job', $id);
        $this->common->delete_table2('url_redirections', 'column_id', $id, 'type', 'job');

        $array = array(
            'success' => 'Job deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_job() {
        $id = $this->input->post('id');
        $this->index->activity_log('Job status');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('job', $delete_data, $id);
        $array = array(
            'success' => 'Job status updated successfully.'
        );
        echo json_encode($array);
    }

    public function feature_job() {
        $id = $this->input->post('id');
        $this->index->activity_log('Job Featured');
       
         if ($this->input->post('status_id') == '1') {

            $this->db->select('*');

            $this->db->where('alt_featued', '1');

            $this->db->from('job');

            $query = $this->db->get();

            if ($query->num_rows() >= 3) {

                $array = array(
                    'error' => 'Only 3 Job can be featured.'
                );
            } else {

                $delete_data = array(
                    'alt_featued' => $this->input->post('status_id'),
                );

                $this->common->update_table('job', $delete_data, $id);

                $array = array(
            'success' => 'Job featured status updated successfully.'
                );
            }
        } else {

            $delete_data = array(
                'alt_featued' => $this->input->post('status_id'),
            );

            $this->common->update_table('job', $delete_data, $id);

            $array = array(
            'success' => 'Job featured status updated successfully.'
            );
        }


        echo json_encode($array);
    }

    public function editseo($id) {

        if ($id == 'editseo') {


            $id = $this->input->post('id');
            $update_data = array(
                'metatitle' => $this->input->post('metatitle'),
                'metadescr' => $this->input->post('metadescr'),
                'metakey' => $this->input->post('metakey'),
                'metadescr' => $this->input->post('metadescr'),
                'url' => $this->common->cleanStr($this->input->post('url')),
                'alttimage' => $this->input->post('alttimage'),
                'altfimage' => $this->input->post('altfimage'),
                'schemap' => $this->input->post('schemap'),
            );

            
         
            $bb = $this->common->cleanStr($this->input->post('url'));

            $this->db->select('*');

            $this->db->where('column_id', $id);

            $this->db->from('url_redirections');
            $this->db->where('type', 'job');

            $query = $this->db->get();

            $row = $query->row();

            if ($row->new_url != $bb) {

                $url = array(
                    'old_url' => $row->new_url,
                    'new_url' => $bb,
                );

                $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'job');
            }
            $this->common->update_table('job', $update_data, $id);
            if ($this->db->affected_rows() == 0) {
                $array = array(
                    'error' => 'You have made no changes.'
                );
            } else {
                $array = array(
                    'success' => 'SEO data Updated successfully.'
                );
            }
            echo json_encode($array);
        } else {
            $data['page_name'] = 'Update Job SEO';
            $this->index->activity_log('Job Seo');
            $data['edit_details'] = $this->common->view('job', $id);
            $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();

            $data['content_view'] = 'Job/seo';
            $this->load->view('admin_template', $data);
        }
    }

    public function fetch_jobcategorylist(){
        $this->db->select('*');
        $this->db->from('job_category');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $row->category_name;
            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-jobcategory"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-jobcategory"  />
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
                    $res = $this->common->eachcheckpri('editcj', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delcj', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<button type="button" class="btn btn-info btn-actions btn-sm fetch-jobcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-jobcategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<button type="button" class="btn btn-info btn-actions btn-sm fetch-jobcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-jobcategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
            } 
            if ($this->session->userdata('user_id') == '1') { 
            $action .= '<button type="button" class="btn btn-info  btn-sm fetch-jobcategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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

    public function fetch_joblist(){
        $this->db->select('*');
        $this->db->from('job');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $this->common->cat_name($row->category_id, 'category_name', 'job_category');
           
            $sub_array[] = $row->title;

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-job"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-job"  />
                            <span class="switch-toggle-slider">
                                <span class="switch-off">
                                    <i class="bx bx-x" style="color:red;"></i>
                                </span>
                            </span>';
            }
            $status .='</label>';
            $sub_array[] = $status;
           
            $featured = '';
            if($row->alt_featued =='1'){
            $featured .=   '<button type="button"  data-status="0"   class="btn btn-success btn-xs feature-job"  data-id="'.$row->id.'"><i class="fa fa-thumbs-up "></i></button>';
            }else{
            $featured .= '<button type="button"  data-status="1"   class="btn btn-danger btn-xs feature-job"  data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
            }
            $sub_array[] = $featured;

            $sub_array[] = date("d-m-Y", strtotime($row->createdDate));

            $action ='<div class="btn-group" role="group" aria-label="Basic example">';
            $rrr = $this->common->subside($this->session->userdata('user_id'));
            if ($rrr->num_rows() > 0) {
                    $res = $this->common->eachcheckpri('editj', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delj', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-job/'.$row->id.'"><i class="far fa-edit font-14"></i></a>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-job"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete job"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-job/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-job"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete job"></i></button>';
            } 
            
            $action .='<a class="btn btn-info btn-actions btn-sm" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Seo" href="'.base_url().'edit-jobseo/'.$row->id.'">SEO</i></a>';
            
            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-seqjob" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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