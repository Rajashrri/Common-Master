<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

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
        $data['page_name'] = 'Video Category List';
        $this->index->activity_log('Video Category List');
        $data['videocategory_list'] = $this->common->list('video_category');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Video/videocategory_list';
        $this->load->view('admin_template', $data);
    }

    //video category

    public function videocategory_list() {
        $data['page_name'] = 'Video Category List';
        $this->index->activity_log('Video Category List');
        $data['videocategory_list'] = $this->common->list('video_category');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Video/videocategory_list';
        $this->load->view('admin_template', $data);
    }

    public function add_videocategory() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'video category Name', 'trim|required|is_unique[video_category.category_name]', array('is_unique' => 'This %s already exists.'));
        if ($this->form_validation->run()) {
            $insert_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => str_replace(' ', '-', strtolower($this->input->post('category_name'))),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'createdDate' => DATE
            );
            $id = $this->common->insert_table('video_category', $insert_data);
            if ($id) {
                $array = array(
                    'success' => 'Video Category added successfully.'
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

    public function fetch_videocategory() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'video_category');
            echo json_encode($data);
        }
    }

    function check_order_no($order_no) {
        if ($this->input->post('id'))
            $id = $this->input->post('id');
        else
            $id = '';
        $result = $this->common->check_unique_order_no($order_no, 'video_category', 'category_name', $id);
        if ($result == 0)
            $response = true;
        else {
            $this->form_validation->set_message('check_order_no', 'Category Name  already exist');
            $response = false;
        }
        return $response;
    }

    public function edit_videocategory() {
        $id = $this->input->post('id');

        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_name', 'category Name', 'required|callback_check_order_no');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'category_name' => $this->input->post('category_name'),
                'url' => str_replace(' ', '-', strtolower($this->input->post('category_name'))),
            );
            $this->common->update_table('video_category', $update_data, $id);
            if ($this->db->affected_rows() == 0) {
                $array = array(
                    'warning' => 'You have made no changes.'
                );
            } else {
                $update_data['createdDate'] = DATE;
                $this->common->update_table('video_category', $update_data, $id);
                $array = array(
                    'success' => 'Video Category data updated successfully.'
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

    public function delete_videocategory() {
        $this->index->activity_log('Video Category Delete');

        $id = $this->input->post('id');

        $this->common->delete_table('video_category', $id);
        $this->common->delete_table1('videos', 'category_id', $id);

        $array = array(
            'success' => 'Video Category data deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_videocategory() {
        $id = $this->input->post('id');
        $this->index->activity_log('Video Category Status');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('video_category', $delete_data, $id);
        $this->common->update_table1('videos', $delete_data, 'category_id', $id);
        $array = array(
            'success' => 'Video Category status updated successfully.'
        );
        echo json_encode($array);
    }

    // Video Functionality

    public function addvideo() {
        $data['page_name'] = 'Add Video';
        $this->index->activity_log('Add Video');
        $data['videocategory_list'] = $this->common->list1('video_category', 'status', '1');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Video/addvideo';
        $this->load->view('admin_template', $data);
    }

    public function video_list() {
        $data['page_name'] = 'Video List';
        $this->index->activity_log('Video List');
        $data['video_list'] = $this->common->list('videos');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Video/video_list';
        $this->load->view('admin_template', $data);
    }

//ADD Video
    public function insert_video() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_id', 'category_id', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('link', 'link', 'trim|required');

        if ($this->form_validation->run()) {
            $insert_data = array(
                'category_id' => $this->input->post('category_id'),
                'title' => $this->input->post('title'),
                'url' => $this->common->cleanStr($this->input->post('title')),
                'link' => $this->input->post('link'),
                'briefintro' => $this->input->post('briefintro'),
                'status' => '1',
                'createdBy' => $this->session->userdata('user_id'),
                'conical' => $this->common->cleanStr($this->input->post('title')),
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
                $path = './uploads/videos/';
                $file_path_image = base_url() . 'uploads/videos/';
                $image = $this->common->upload_image($image_data, 2, $path);
                $insert_data['featured_image'] = $image;
                $insert_data['featured_imageurl'] = $file_path_image . $image;
            }


//insert data into database table.  
            $id = $this->common->insert_table('videos', $insert_data);

            $lid = $this->db->insert_id();

            $url = array(
                'column_id' => $lid,
                'type' => 'video',
                'old_url' => '',
                'new_url' => $this->common->cleanStr($this->input->post('title')),
            );

            $this->common->insert_table('url_redirections', $url);

            if ($id) {
                $this->session->set_flashdata('success', 'Video added successfully.');
                redirect("add-video");
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong');
            redirect("add-video");
        }
    }

    public function edit_video($id) {

        $data['page_name'] = 'Edit Video';
        $this->index->activity_log('Video Edit');
        $data['edit_details'] = $this->common->view('videos', $id);
        $data['videocategory_list'] = $this->common->list1('video_category', 'status', '1');
        $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
        $data['user_detail'] = $this->common->view1();

        $data['content_view'] = 'Video/editvideo';
        $this->load->view('admin_template', $data);
    }

    public function editvideo() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('category_id', 'category_id', 'trim|required');
        $this->form_validation->set_rules('title', 'title', 'trim|required');
        $this->form_validation->set_rules('link', 'link', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');

            $update_data = array(
                'category_id' => $this->input->post('category_id'),
                'title' => $this->input->post('title'),
                'url' => $this->common->cleanStr($this->input->post('title')),
                'link' => $this->input->post('link'),
                'briefintro' => $this->input->post('briefintro'),
                'conical' => $this->common->cleanStr($this->input->post('title')),
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
                $path = './uploads/videos/';
                $file_path_image = base_url() . 'uploads/videos/';
                $image = $this->common->upload_image($image_data, 2, $path);
                $update_data['featured_image'] = $image;
                $update_data['featured_imageurl'] = $file_path_image . $image;

                $query = $this->common->un($id,'videos');
                $row = $query->row();
                $img = $row->featured_image ;

                if(file_exists("uploads/videos/".$img)){
                    unlink("uploads/videos/".$img);
                }
            }

            $this->common->update_table('videos', $update_data, $id);
            $hn = $this->db->affected_rows();
            $bb = $this->common->cleanStr($this->input->post('title'));

            $this->db->select('*');

            $this->db->where('column_id', $id);

            $this->db->from('url_redirections');
            $this->db->where('type', 'video');

            $query = $this->db->get();

            $row = $query->row();

            if ($row->new_url != $bb) {

                $url = array(
                    'old_url' => $row->new_url,
                    'new_url' => $bb,
                );

                $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'video');
            }




            if ($hn == 0) {
                $this->session->set_flashdata('warning', 'You have made no changes.');
                redirect("edit-video/" . $id);
            } else {
                $update_data['createdDate'] = DATE;
                $update_data['createdBy'] = $this->session->userdata('user_id');
                $this->common->update_table('videos', $update_data, $id);
                $this->session->set_flashdata('success', 'Video updated successfully');
                redirect("edit-video/" . $id);
            }
        } else {
            $this->session->set_flashdata('error', 'Something went wrong');
            redirect("edit-video/" . $id);
        }
    }

    public function fetch_video() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'videos');
            echo json_encode($data);
        }
    }

    public function delete_video() {

        $this->index->activity_log('Video Delete');
        $id = $this->input->post('id');

        $query = $this->common->un($id,'videos');
        $row = $query->row();
        $img = $row->featured_image ;

        if(file_exists("uploads/videos/".$img)){
           unlink("uploads/videos/".$img);
        }
       

        $this->common->delete_table('videos', $id);
        $this->common->delete_table2('url_redirections', 'column_id', $id, 'type', 'video');

        $array = array(
            'success' => 'Video deleted successfully.'
        );
        echo json_encode($array);
    }

    public function status_video() {
        $id = $this->input->post('id');
        $this->index->activity_log('Video Status');
        $delete_data = array(
            'status' => $this->input->post('status_id'),
        );
        $this->common->update_table('videos', $delete_data, $id);
        $array = array(
            'success' => 'Video status updated successfully.'
        );
        echo json_encode($array);
    }

    public function feature_video() {
        $id = $this->input->post('id');
        $this->index->activity_log('Video featured');
        
         if ($this->input->post('status_id') == '1') {

            $this->db->select('*');

            $this->db->where('alt_featued', '1');

            $this->db->from('videos');

            $query = $this->db->get();

            if ($query->num_rows() >= 3) {

                $array = array(
                    'error' => 'Only 3 videos can be featured.'
                );
            } else {

                $delete_data = array(
                    'alt_featued' => $this->input->post('status_id'),
                );

                $this->common->update_table('videos', $delete_data, $id);

                $array = array(
                   'success' => 'Video feature Updated successfully.'
                );
            }
        } else {

            $delete_data = array(
                'alt_featued' => $this->input->post('status_id'),
            );

            $this->common->update_table('videos', $delete_data, $id);

            $array = array(
                'success' => 'Video feature Updated successfully.'
            );
        }

        
        echo json_encode($array);
    }
  

    public function edit_seqvideocat() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('video_category', $update_data, $id);

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


    public function fetch_seqvideo() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');
            $data = $this->common->fetch_data($id, 'videos');
            echo json_encode($data);
        }
    }

    public function edit_seqvideo() {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('seq_id', 'Sequence ID', 'trim|required');

        if ($this->form_validation->run()) {
            $id = $this->input->post('id');
            $update_data = array(
                'seq_id' => $this->input->post('seq_id'),
            );

            $this->common->update_table('videos', $update_data, $id);

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
    public function editvideoseo($id) {

        if ($id == 'editvideoseo') {


            $id = $this->input->post('id');
            $update_data = array(
                'meta_title' => $this->input->post('meta_title'),
                'meta_keywords' => $this->input->post('meta_keywords'),
                'meta_description' => $this->input->post('meta_description'),
                'url' => $this->common->cleanStr($this->input->post('url')),
                'alt_tag_featured_img' => $this->input->post('alt_tag_featured_img'),
                'alt_tag_main_img' => $this->input->post('alt_tag_main_img'),
                'schemap' => $this->input->post('schemap'),
            );

            $bb = $this->common->cleanStr($this->input->post('url'));

            $this->db->select('*');

            $this->db->where('column_id', $id);

            $this->db->from('url_redirections');
            $this->db->where('type', 'video');

            $query = $this->db->get();

            $row = $query->row();

            if ($row->new_url != $bb) {

                $url = array(
                    'old_url' => $row->new_url,
                    'new_url' => $bb,
                );

                $this->common->update_table2('url_redirections', $url, 'column_id', $id, 'type', 'video');
            }

            $this->common->update_table('videos', $update_data, $id);
            if ($this->db->affected_rows() == 0) {
                $array = array(
                    'error' => 'You have made no changes.'
                );
            } else {
                $array = array(
                    'success' => 'SEO data updated successfully.'
                );
            }
            echo json_encode($array);
        } else {
            $data['page_name'] = 'Update Video SEO';
            $this->index->activity_log('Video Seo');
            $data['edit_details'] = $this->common->view('videos', $id);
            $data['user_details'] = $this->common->view('user_login', $this->session->userdata('user_id'));
            $data['user_detail'] = $this->common->view1();

            $data['content_view'] = 'Video/seo';
            $this->load->view('admin_template', $data);
        }
    }

    public function fetch_videocategorylist(){
        $this->db->select('*');
        $this->db->from('video_category');
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
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input status-videocategory"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input status-videocategory"  />
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
                    $res = $this->common->eachcheckpri('editcv', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delcv', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<button type="button" class="btn btn-info btn-actions btn-sm fetch-videocategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-videocategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<button type="button" class="btn btn-info btn-actions btn-sm fetch-videocategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="EDIT" data-bs-placement="top"><i class="far fa-edit font-14"> <span class="stretched-link" data-bs-toggle="modal" data-bs-target="#exampleModalEdit"></span></i></button>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete"  class="btn btn-info btn-actions btn-sm delete-videocategory"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14"></i></button>';
            } 
            if ($this->session->userdata('user_id') == '1') { 
            $action .= '<button type="button" class="btn btn-info  btn-sm fetch-videocategory" data-id="'.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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

    public function fetch_videolist(){
        $this->db->select('*');
        $this->db->from('videos');
        $this->db->order_by('id', 'desc');
        $fetch_data= $this->db->get()->result();
        
        $count = 1;
        $data = array();

        foreach ($fetch_data as $row) {
            $sub_array = array();
            $sub_array[] = '<input type="checkbox" name="checkbox_value[]" value="'.$row->id.'">';
            $sub_array[] = $count;
            $sub_array[] = $this->common->cat_name($row->category_id, 'category_name', 'video_category');
           
            $sub_array[] = $row->title;

            $status ='<label class="switch switch-success">';
            if($row->status=='1'){
                $status .='   <input type="checkbox" checked  data-id="'.$row->id.'"    data-status= "0"   class="switch-input  status-video"  />
                                <span class="switch-toggle-slider">
                                    <span class="switch-on">
                                        <i class="bx bx-check"></i>
                                    </span>
                                </span>';
            }elseif($row->status=='0'){
                $status .='<input type="checkbox"  data-id="'.$row->id.'"    data-status="1" class="switch-input  status-video"  />
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
            $featured .=   '<button type="button"  data-status="0"   class="btn btn-success btn-xs feature-video"  data-id="'.$row->id.'"><i class="fa fa-thumbs-up "></i></button>';
            }else{
            $featured .= '<button type="button"  data-status="1"   class="btn btn-danger btn-xs feature-video"  data-id="'.$row->id.'"><i class="fa fa-thumbs-down"></i></button>';
            }
            $sub_array[] = $featured;

            $sub_array[] = date("d-m-Y", strtotime($row->createdDate));

            $action ='<div class="btn-group" role="group" aria-label="Basic example">';
            $rrr = $this->common->subside($this->session->userdata('user_id'));
            if ($rrr->num_rows() > 0) {
                    $res = $this->common->eachcheckpri('editv', $this->session->userdata('brw_logged_type'));
                    $del = $this->common->eachcheckpri('delv', $this->session->userdata('brw_logged_type'));
                    if ($res->num_rows() > 0) { 
                    $action .='<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-video/'.$row->id.'"><i class="far fa-edit font-14"></i></a>';
                    } else{} ;
                    if($del->num_rows() > 0){ 
                    $action .='<button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-video"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete video"></i></button>';
                    }else{ };
                   
                } else {  
            $action .= '<a class="btn btn-info btn-actions btn-sm" popup="tooltip-custom" data-bs-toggle="tooltip" placement="top" title="Edit" href="'.base_url().'edit-video/'.$row->id.'"><i class="far fa-edit font-14"></i></a>
                        <button type="button" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Delete" class="btn btn-info btn-actions btn-sm delete-video"  data-id="'.$row->id.'"><i class="far fa-trash-alt font-14" title="Delete video"></i></button>';
            } 
            
            $action .='<a class="btn btn-info btn-actions btn-sm" data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" data-bs-original-title="Seo" href="'.base_url().'edit-videoseo/'.$row->id.'">SEO</i></a>';
            
            if ($this->session->userdata('user_id') == '1') { 
             $action .= ' <button type="button" class="btn btn-info  btn-sm fetch-seqvideo" data-id='.$row->id.'"  data-bs-toggle="tooltip" data-bs-trigger="hover" title="Seq" data-bs-placement="top">Seq<span class="stretched-link" data-bs-toggle="modal" data-bs-target="#seqeditauthor"></span></button>';
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